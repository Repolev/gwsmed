<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Display;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductAttribute;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products=Product::orderBy('id','DESC')->get();
        return view('backend.product.index',compact('products'));
    }

    public function productStatus(Request $request){
        if($request->mode=='true'){
            DB::table('products')->where('id',$request->id)->update(['status'=>'active']);
        }
        else{
            DB::table('products')->where('id',$request->id)->update(['status'=>'inactive']);
        }
        return response()->json(['msg'=>'Successfully updated status','status'=>true]);
    }

    public function todaysDeal(Request $request){
        if($request->mode=='true'){
            DB::table('products')->where('id',$request->id)->update(['todays_deal'=>1]);
        }
        else{
            DB::table('products')->where('id',$request->id)->update(['todays_deal'=>0]);
        }
        return response()->json(['msg'=>'Successfully change deals of the day','status'=>true]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::where('status','active')->where('is_parent',1)->orderBy('id','DESC')->get();

        $home_page_menus=Display::where('status','active')->latest()->get();
        return view('backend.product.create',compact('home_page_menus','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'string|required',
            'is_featured'=>'sometimes|in:1',
            'model_number'=>'alpha_num|unique:products:model_number',
            'summary'=>'string|nullable',
            'description'=>'string|nullable',
            'stock'=>'nullable|numeric',
            'price'=>'nullable|numeric',
            'discount'=>'nullable|numeric',
            'photo.*'=>'required|image|mimes:png,jpg,jpeg,svg,gif',
            'tags'=>'nullable',
            'category_id'=>'required|exists:categories,id',
            'status'=>'required|in:active,inactive',
        ]);

        $data=$request->all();

        // photo
        if($request->hasFile('photo')){
            if($files=$request->file('photo')){
                foreach($files as $file){
                    $imageName = str_replace(' ', '_', $request->input('title')) . Str::random(10) .".". $file->getClientOriginalExtension();
                    $product_image = Image::make($file);
                    $product_image->resize(253, 253);
                    $image_path = public_path('/backend/assets/images/product/' . $imageName);
                    $product_image->save($image_path);
                    $photos[]=$imageName;
                    $photos_path[]='backend/assets/images/product/'.$imageName;
                }
                $image=implode(',',$photos);
                $image_path=implode(',',$photos_path);
                $data['photo']=$image;
                $data['image_path']=$image_path;
            }
        }

        // product variants photo
        if($request->hasFile('variants')){
            if($files=$request->file('variants')){
               foreach($files as $file){
                   $imageName = $request->input('title').Str::random(4) ."-". str_replace(' ', '-', $file->getClientOriginalName());
                   $file->storeAs('public/backend/assets/images/product/', $imageName);
                   $vphotos[]=$imageName;
                   $variant_path[]='storage/backend/assets/images/product/'.$imageName;

               }
                $vphoto=implode(',',$vphotos);
                $variant_paths=implode(',',$variant_path);
                $data['variants']=$vphoto;
                $data['variants_path']=$variant_paths;
            }
        }

        $data['is_featured']=$request->input('is_featured',0);

        $slug = $request->input('slug');
        $slug_count = Product::where('slug',$slug)->count();
        if($slug_count>0){
            $slug = time().'-'.$slug;
        }
        $data['slug']=$slug;

        $data['offer_price']=($request->price-(($request->price*$request->discount)/100));

//          return $data;
        $status=Product::create($data);
        $category_ids = $request->category_id;
        $status->categories()->attach($category_ids);
        if($status){
            return redirect()->route('product.index')->with('success','Product successfully created');
        }
        else{
            return back()->with('error','Something went wrong!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::find($id);
        $productattr=ProductAttribute::where('product_id',$id)->orderBy('id','DESC')->get();
        if($product){
            return view('backend.product.product-attribute',compact(['product','productattr']));
        }
        else{
            return back()->with('error','Product not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $home_page_menus=Display::where('status','active')->latest()->get();
        $categories=Category::where('status','active')->where('is_parent',1)->orderBy('id','DESC')->get();
        $product=Product::find($id);
        $product_categories = ProductCategory::where('product_id', $id)->get();
        if($product){
            return view('backend.product.edit',compact(['product','home_page_menus','categories', 'product_categories']));
        }
        else{
            return back()->with('error','Category not found');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=Product::find($id);
        if($product){
            $this->validate($request,[
                'title'=>'string|required',
                'summary'=>'string|nullable',
                'description'=>'string|nullable',
                'specification'=>'string|nullable',
                'stock'=>'nullable|numeric',
                'price'=>'nullable|numeric',
                'discount'=>'nullable|numeric',
                'photo.*'=>'required|image|mimes:png,jpg,jpeg,svg,gif',
                'variants.*'=>'nullable|image|mimes:png,jpg,jpeg,svg,gif',
                'tags'=>'nullable',
                'category_id'=>'required|exists:categories,id',
                'conditions'=>'nullable',
                'status'=>'required|in:active,inactive',
            ]);

            $data=$request->all();
            $data['offer_price']=($request->price-(($request->price*$request->discount)/100));
            $slug = $request->input('slug');
            $slug_count = Product::where('slug',$slug)->count();
            if($slug_count>0){
                $slug = time().'-'.$slug;
            }
            $data['slug']=$slug;

            // photo
            if($request->hasFile('photo')){
                if($files=$request->file('photo')){
                    foreach($files as $file){
                        $imageName = str_replace(' ', '_', $request->input('title')) . Str::random(4) .".". $file->getClientOriginalExtension();
                        $product_image = Image::make($file);
                        $product_image->resize(253, 253);
                        $image_path = public_path('/backend/assets/images/product/' . $imageName);
                        $product_image->save($image_path);
                        $photos[]=$imageName;
                        $photos_path[]='backend/assets/images/product/'.$imageName;
                    }
                    $image=implode(',',$photos);
                    $image_path=implode(',',$photos_path);
                    $data['photo']=$image;
                    $data['image_path']=$image_path;
                }
            }

            // product variants photo
            if($request->hasFile('variants')){
                if($files=$request->file('variants')){
                    foreach($files as $file){
                        $imageName = $request->input('title').Str::random(4) ."-". str_replace(' ', '-', $file->getClientOriginalName());
                        $file->storeAs('public/backend/assets/images/product/', $imageName);
                        $vphotos[]=$imageName;
                        $variant_path[]='storage/backend/assets/images/product/'.$imageName;
                    }
                    $vphoto=implode(',',$vphotos);
                    $variant_paths=implode(',',$variant_path);
                    $data['variants']=$vphoto;
                    $data['variants_path']=$variant_paths;
                }
            }
            if($request->is_featured==1){
                $data['is_featured']=null;
            }
            $data['is_featured']=$request->input('is_featured',0);


//            return $data;
            $status=$product->fill($data)->save();
            $category_ids = $request->category_id;
            $product->categories()->sync($category_ids);
            if($status){
                return redirect()->route('product.index')->with('success','Product successfully updated');
            }
            else{
                return back()->with('error','Something went wrong!');
            }
        }
        else{
            return back()->with('error','Product not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        if($product){
            $status=$product->delete();
            if($status){
                return redirect()->route('product.index')->with('success','Product successfully deleted');
            }
            else{
                return back()->with('error','Something went wrong!');
            }
        }
        else{
            return back()->with('error','Data not found');
        }
    }

 public function addProductAttributeDelete($id)
    {
        $productattr=ProductAttribute::find($id);
        if($productattr){
            $status=$productattr->delete();
            if($status){
                return redirect()->back()->with('success','Product attribute successfully deleted');
            }
            else{
                return back()->with('error','Something went wrong!');
            }
        }
        else{
            return back()->with('error','Data not found');
        }
    }

    public function addProductAttribute(Request $request,$id){

        $data= $request->all();

        foreach($data['original_price'] as $key=>$val){
            if(!empty($val)){
                $attribute=new ProductAttribute;
                $attribute['original_price']=$val;
                $attribute['offer_price']=$data['offer_price'][$key];
                $attribute['stock']=$data['stock'][$key];
                $attribute['product_id']=$id;
                $attribute['size']=$data['size'][$key];
                $attribute->save();

            }
        }
        return redirect()->back()->with('success','Product attribute successfully added');
    }

    public function filterPriceWithSize(Request $request,$id){
        $productAttr=ProductAttribute::where(['product_id'=>$id,'size'=>$request->size])->first();
        return response()->json(['status'=>true,'msg'=>'Success','data'=>$productAttr]);
    }
}
