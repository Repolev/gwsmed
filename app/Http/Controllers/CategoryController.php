<?php

namespace App\Http\Controllers;

use App\Models\Display;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::orderBy('id','DESC')->get();
        return view('backend.category.index',compact('categories'));
    }

    public function categoryStatus(Request $request){
        if($request->mode=='true'){
            DB::table('categories')->where('id',$request->id)->update(['status'=>'active']);
        }
        else{
            DB::table('categories')->where('id',$request->id)->update(['status'=>'inactive']);
        }
        return response()->json(['msg'=>'Successfully updated status','status'=>true]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_cats=Category::orderBy('title','ASC')->get();
        return view('backend.category.create',compact('parent_cats'));
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
            'description'=>'string|nullable',
            'is_parent'=>'sometimes|in:1',
            'is_featured'=>'sometimes|in:1',
            'photo'=>'image|nullable|mimes:png,jpg,jpeg,svg,gif',
            'parent_id'=>'nullable|exists:categories,id',
            'status'=>'required|in:active,inactive'
        ]);
        $data=$request->all();
        if($request->hasFile('photo')){
            if($file=$request->file('photo')){
                $imageName = time() .".". str_replace(' ', '-', $file->getClientOriginalName());
                $product_image = Image::make($file);
                $product_image->resize(300, 400);
                $image_path = public_path('/backend/assets/images/category/' . $imageName);
                $product_image->save($image_path);
                $data['photo']=$imageName;
                $data['image_path']='backend/assets/images/category/'.$imageName;
            }
        }

        if($request->hasFile('banner')){
            if($file=$request->file('banner')){
                $imageName = time() .".". str_replace(' ', '-', $file->getClientOriginalName());
                $product_image = Image::make($file);
                $product_image->resize(1920, 230);
                $image_path = public_path('/backend/assets/images/category/' . $imageName);
                $product_image->save($image_path);
                $data['banner_path']='backend/assets/images/category/'.$imageName;
            }
        }
        $slug = $request->input('slug');
        $slug_count = Category::where('slug',$slug)->count();
        if($slug_count>0){
            $slug = time().'-'.$slug;
        }
        $data['slug']=$slug;
        $data['is_parent']=$request->input('is_parent',0);
        $data['on_menu']=$request->input('on_menu',0);

        if($data['is_parent'] == 0){
            $get_parent = Category::find($request->parent_id);
            $data['level'] = $get_parent->level + 1;
        } else {
            $data['level'] = 0;
        }

//        $data['is_featured']=$request->input('is_featured',0);
//        return $data;

        $status=Category::create($data);
        if($status){
            return redirect()->route('category.index')->with('success','Category successfully created');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::find($id);
        $parent_cats=Category::orderBy('title','ASC')->get();
        if($category){
            return view('backend.category.edit',compact(['category','parent_cats']));
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
        $category=Category::find($id);
        if($category){
            $this->validate($request,[
                'title'=>'string|required',
                'description'=>'string|nullable',
                'is_parent'=>'sometimes|in:1',
                'photo'=>'image|nullable|mimes:png,jpg,jpeg,svg,gif',
                'is_featured'=>'sometimes|in:1',
                'parent_id'=>'nullable|exists:categories,id',
            ]);

            $data=$request->all();

            if($request->hasFile('photo')){
                if($file=$request->file('photo')){
                    $imageName = time() .".". str_replace(' ', '-', $file->getClientOriginalExtension());
                    $product_image = Image::make($file);
                    $product_image->resize(300, 400);
                    $image_path = public_path('/backend/assets/images/category/' . $imageName);
                    $product_image->save($image_path);
                    $data['photo']=$imageName;
                    $data['image_path']='backend/assets/images/category/'.$imageName;
                }
            }

            if($request->hasFile('banner')){
                if($file=$request->file('banner')){
                    $imageName = time() .".". str_replace(' ', '-', $file->getClientOriginalName());
                    $product_image = Image::make($file);
                    $product_image->resize(1920, 230);
                    $image_path = public_path('/backend/assets/images/category/' . $imageName);
                    $product_image->save($image_path);
                    $data['banner_path']='backend/assets/images/category/'.$imageName;
                }
            }
            if($request->is_parent==1){
                $data['parent_id']=null;
            }
            if($request->on_menu==1){
                $data['on_menu']=null;
            }

            $slug = $request->input('slug');
            $slug_count = Category::where('slug',$slug)->count();
            if($slug_count>0){
                $slug = time().'-'.$slug;
            }
            $data['slug'] = $slug;
            $data['is_parent']=$request->input('is_parent',0);
            $data['on_menu']=$request->input('on_menu',0);
            $status=$category->fill($data)->save();
            if($status){
                return redirect()->route('category.index')->with('success','Category successfully updated');
            }
            else{
                return back()->with('error','Something went wrong!');
            }
        }
        else{
            return back()->with('error','Category not found');
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
        $category=Category::find($id);
        $child_cat_id=Category::where('parent_id',$id)->pluck('id');
        if($category){
            $status=$category->delete();
            if($status){
                if(count($child_cat_id)>0){
                    Category::shiftChild($child_cat_id);
                }
                return redirect()->route('category.index')->with('success','Category successfully deleted');
            }
            else{
                return back()->with('error','Something went wrong!');
            }
        }
        else{
            return back()->with('error','Data not found');
        }
    }

    public function getChildByParentID(Request $request,$id){
        $category=Category::find($id);
        if($category){
            $child_id=Category::getChildByParentID($request->cat_id);
            if(count($child_id)<=0){
                return response()->json(['status'=>false,'data'=>null,'msg'=>'']);
            }
            return response()->json(['status'=>true,'data'=>$child_id,'msg'=>'']);
        }
        else{
            return response()->json(['status'=>false,'data'=>null,'msg'=>'Category not found']);
        }
    }
}
