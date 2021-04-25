<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\User;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Banner;
use App\Models\Review;
use App\Models\Display;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Category;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class IndexController extends Controller
{
    public function home(){
        $banners=Banner::where(['status'=>'active'])->orderBy('id','DESC')->get();
//        $promo_banner=Banner::where(['status'=>'active','condition'=>'promo','position'=>'footer'])->latest()->first();
//        $top_promo_banner=Banner::where(['status'=>'active','condition'=>'promo','position'=>'top'])->orderBy('id','DESC')->limit(2)->get();
//
//        $middle_top_promo_banner=Banner::where(['status'=>'active','condition'=>'promo','position'=>'middle','inner_position'=>'top'])->orderBy('id','DESC')->first();
//        $middle_middle_promo_banner=Banner::where(['status'=>'active','condition'=>'promo','position'=>'middle','inner_position'=>'middle'])->orderBy('id','DESC')->limit(2)->get();
//        $middle_right_promo_banner=Banner::where(['status'=>'active','condition'=>'promo','position'=>'middle','inner_position'=>'right'])->orderBy('id','DESC')->first();
//
//        $footer_promo_banner=Banner::where(['status'=>'active','condition'=>'promo','position'=>'bottom'])->latest()->first();

        //deal of the day
        $categories=Category::where(['status'=>'active','is_parent'=>1])->limit(3)->orderBy('id',"DESC")->get();
        $featured_products=\App\Models\Product::with(['categories','productReviews'])->where(['status'=>'active','is_featured'=>1])->orderBy('id','DESC')->get();
        $new_products= Product::with(['categories','productReviews'])->where(['status'=>'active','tags'=>'new'])->latest()->limit(10)->get();
        $featured_category = [];
//        $featured_categories=Category::with('products')->where(['status'=>'active','is_featured'=>1,'is_parent'=>1])->orderBy('id','DESC')->get();
//        foreach($featured_categories as $featured_category){
//            if(count($featured_category->products) > 0){
//                $featured_category = $featured_category;
//                break;
//            }
//        }
//
//        $home_page_category_one=Display::where('status','active')->with('products')->take(1)->get();
//        $home_page_category_two=Display::where('status','active')->with('products')->skip(1)->take(2)->get();
//        $home_page_category_three=Display::where('status','active')->with('products')->skip(3)->take(2)->get();
//        $brands=Brand::where(['status'=>'active'])->orderBy('id','DESC')->get();
        $cat_gallery_first = Category::where('on_menu', 1)->with('subcategories')->first();
        $cat_gallery_second = Category::where('on_menu', 1)->with('subcategories')->skip(1)->first();
        $cat_gallery_third = Category::where('on_menu', 1)->with('subcategories')->skip(2)->first();
        return view('frontend.index',compact([
            'banners',

//            'promo_banner',
//            'top_promo_banner',
//            'footer_promo_banner',
//            'middle_top_promo_banner',
//            'middle_middle_promo_banner',
//            'middle_right_promo_banner',
            'categories',
            'featured_products',
            'new_products',
            'cat_gallery_first',
            'cat_gallery_second',
            'cat_gallery_third',
//            'featured_category',
//            'brands',
//            'home_page_category_one',
//            'home_page_category_two',
//            'home_page_category_three',
            ]));
    }

    /**
     * Download the Catalog
     */
    public function downloadCatalogPdf($id)
    {
        $product = Product::findOrFail($id);
        $pdf = PDF::loadView('frontend.pages.download_catalog', compact('product'));
        return $pdf->download('GWSmed-catalog.pdf');
    }

    public function hotOffer(Request $request){

        $products=Product::query();

        if(!empty($_GET['category'])){
            $slugs=explode(',',$_GET['category']);
            $cat_ids=Category::select('id')->whereIn('slug',$slugs)->pluck('id')->toArray();
            $products=$products->whereIn('cat_id',$cat_ids);
        }

        //brand filter
        if(!empty($_GET['brand'])){
            $slugs=explode(',',$_GET['brand']);
            $brand_ids=Brand::select('id')->whereIn('slug',$slugs)->pluck('id')->toArray();
            $products=$products->whereIn('brand_id',$brand_ids);
        }

        //size filter

        if(!empty($_GET['size'])){
            $products=$products->where('size',$_GET['size']);
        }
        if(!empty($_GET['sortBy'])){
            if($_GET['sortBy']=='priceAsc'){
                $products=$products->where(['status'=>'active'])->orderBy('offer_price','ASC');
            }
            if($_GET['sortBy']=='priceDesc'){
                $products=$products->where(['status'=>'active'])->orderBy('offer_price','DESC');
            }
            if($_GET['sortBy']=='discAsc'){
                $products=$products->where(['status'=>'active'])->orderBy('price','ASC');
            }
            if($_GET['sortBy']=='discDesc'){
                $products=$products->where(['status'=>'active'])->orderBy('price','DESC');
            }
            if($_GET['sortBy']=='titleAsc'){
                $products=$products->where(['status'=>'active'])->orderBy('title','ASC');
            }
            if($_GET['sortBy']=='titledesc'){
                $products=$products->where(['status'=>'active'])->orderBy('title','DESC');
            }
        }

        if(!empty($_GET['price'])){
            $price=explode('-',$_GET['price']);
            $price[0]=floor($price[0]) ;
            $price[1]=ceil($price[1]) ;
            $products=$products->whereBetween('offer_price',$price)->where('status','active')->paginate(12);
        }
        else{
            $products=$products->where(['status'=>'active','tags'=>'hot'])->paginate(16);
        }
        $brands=Brand::where('status','active')->orderBy('title','ASC')->with('products')->get();
        $categories=Category::where(['status'=>'active','is_parent'=>1])->with('products')->orderBy('title','ASC')->get();

        return view('frontend.pages.product.hot',compact('products','categories','brands'));
    }

    public function productFilter(Request $request,$slug){
        $data=$request->all();
        // Category filter
        $catUrl='';
        if(!empty($data['category'])){
            foreach($data['category'] as $category){
                if(empty($catUrl)){
                    $catUrl .='&category='.$category;
                }
                else{
                    $catUrl .=','.$category;
                }
            }
        }

        //sort filter
        $sortByUrl="";
        if(!empty($data['sortBy'])){
            $sortByUrl .=$data['sortBy'];
        }

        //price filter
        $price_range_Url="";
        if(!empty($data['price_range'])){
            $price_range_Url .=$data['price_range'];
        }

//        dd('dd');

        //brand filter

        $brandUrl="";
        if(!empty($data['brand'])){
            foreach($data['brand'] as $brand){
                if(empty($brandUrl)){
                    $brandUrl .=$brand;
                }
                else{
                    $brandUrl .=','.$brand;
                }
            }
        }
        return \redirect()->route('product.category',['slug'=>$slug,'sortBy'=>$sortByUrl,'price'=>$price_range_Url,'brand'=>$brandUrl]);
    }

    //product filter in subcategory
    public function productSubFilter(Request $request,$slug,$cat_slug){
        $data=$request->all();
        // Category filter
        $catUrl='';
        if(!empty($data['category'])){
            foreach($data['category'] as $category){
                if(empty($catUrl)){
                    $catUrl .='&category='.$category;
                }
                else{
                    $catUrl .=','.$category;
                }
            }
        }

        //sort filter
        $sortByUrl="";
        if(!empty($data['sortBy'])){
            $sortByUrl .=$data['sortBy'];
        }

        //price filter
        $price_range_Url="";
        if(!empty($data['price_range'])){
            $price_range_Url .=$data['price_range'];
        }

//        dd('dd');

        //brand filter

        $brandUrl="";
        if(!empty($data['brand'])){
            foreach($data['brand'] as $brand){
                if(empty($brandUrl)){
                    $brandUrl .=$brand;
                }
                else{
                    $brandUrl .=','.$brand;
                }
            }
        }
        return \redirect()->route('product.subcategory',['slug'=>$slug,'cat_slug'=>$cat_slug,'sortBy'=>$sortByUrl,'price'=>$price_range_Url,'brand'=>$brandUrl]);
    }

    //hot product filter here
    public function hotProductFilter(Request $request){
        $data= $request->all();
        $sortByURL='';
        if(!empty($data['sortBy'])){
            $sortByURL .='&sortBy='.$data['sortBy'];
        }

        $catURL="";
        if(!empty($data['category'])){
            foreach($data['category'] as $category){
                if(empty($catURL)){
                    $catURL .='&category='.$category;
                }
                else{
                    $catURL .=','.$category;
                }
            }
        }

        $brandURL="";
        if(!empty($data['brand'])){
            foreach($data['brand'] as $brand){
                if(empty($brandURL)){
                    $brandURL .='&brand='.$brand;
                }
                else{
                    $brandURL .=','.$brand;
                }
            }
        }
        // return $brandURL;

        $priceRangeURL="";
        if(!empty($data['price_range'])){
            $priceRangeURL .='&price='.$data['price_range'];
        }
        return redirect()->route('hot.offer',$catURL.$brandURL.$priceRangeURL.$sortByURL);
    }
    //autosearch
    public function autoSearch(Request $request){

        $query = $request->get('term','');
        $products = Product::where('title','LIKE','%'.$query.'%')->get();

        $data=array();
        foreach($products as $product){
            $data[]=array('value'=>$product->title,'id'=>$product->id);
        }
        if(count($data)){
            return $data;
        }
        else{
            return ['value'=>"No Result Found",'id'=>''];
        }
    }

    //search product
    public function search(Request $request){
        $query = $request->input('query');
        $products = Product::where('status','active')->where('title','LIKE','%'.$query.'%')->orderBy('id','DESC')->paginate(16);
        return view('frontend.pages.product.search-product',compact('products'));
    }

    //product by category
    public function productCategory(Request $request,$slug){
        $products=Product::query();

        $category=Category::with('subcategories','products')->where(['status'=>'active','slug'=>$slug])->first();
        //brand filter
//        if(!empty($_GET['brand'])){
//            $slugs=explode(',',$_GET['brand']);
//            $brand_ids=Brand::select('id')->whereIn('slug',$slugs)->pluck('id')->toArray();
//            $products->whereIn('brand_id',$brand_ids);
//        }
        if(!empty($_GET['sortBy'])){
            if($_GET['sortBy']=='priceAsc'){
                $products->where(['status'=>'active','cat_id' => $category->id])->orderBy('offer_price','ASC');
            }
            if($_GET['sortBy']=='priceDesc'){
                $products->where(['status'=>'active','cat_id'=>$category->id])->orderBy('offer_price','DESC');
            }
            if($_GET['sortBy']=='discAsc'){
                $products->where(['status'=>'active','cat_id'=>$category->id])->orderBy('discount','ASC');
            }
            if($_GET['sortBy']=='discDesc'){
                $products->where(['status'=>'active','cat_id'=>$category->id])->orderBy('discount','DESC');
            }
            if($_GET['sortBy']=='titleAsc'){
                $products->where(['status'=>'active','cat_id'=>$category->id])->orderBy('title','ASC');
            }
            if($_GET['sortBy']=='titledesc'){
                $products->where(['status'=>'active','cat_id'=>$category->id])->orderBy('title','DESC');
            }
        }
        else{
            $products->where(['status'=>'active']);

        }
        $products=$products->paginate(16);

//        return $products;

//        return $brands;
        $categories=Category::where('status','active')->orderBy('title','ASC')->with('subcategories')->with('products')->get();
        return view('frontend.pages.product.product-category',compact(['category','categories','products']));
    }

    //product by sub category
    public function productSubCategory(Request $request,$slug){

        $products=Product::query();

        $category=Category::with('subcategories','products')->where(['status'=>'active','slug'=>$slug])->first();
        //brand filter
//        if(!empty($_GET['brand'])){
//            $slugs=explode(',',$_GET['brand']);
//            $brand_ids=Brand::select('id')->whereIn('slug',$slugs)->pluck('id')->toArray();
//            $products->whereIn('brand_id',$brand_ids);
//        }
        if(!empty($_GET['sortBy'])){
            if($_GET['sortBy']=='priceAsc'){
                $products->where(['status'=>'active','cat_id' => $category->id])->orderBy('offer_price','ASC');
            }
            if($_GET['sortBy']=='priceDesc'){
                $products->where(['status'=>'active','cat_id'=>$category->id])->orderBy('offer_price','DESC');
            }
            if($_GET['sortBy']=='discAsc'){
                $products->where(['status'=>'active','cat_id'=>$category->id])->orderBy('discount','ASC');
            }
            if($_GET['sortBy']=='discDesc'){
                $products->where(['status'=>'active','cat_id'=>$category->id])->orderBy('discount','DESC');
            }
            if($_GET['sortBy']=='titleAsc'){
                $products->where(['status'=>'active','cat_id'=>$category->id])->orderBy('title','ASC');
            }
            if($_GET['sortBy']=='titledesc'){
                $products->where(['status'=>'active','cat_id'=>$category->id])->orderBy('title','DESC');
            }
        }
        else{
            $products->where(['status'=>'active']);

        }
        $products=$products->paginate(16);

//        return $products;

//        return $brands;
        $categories=Category::where('status','active')->orderBy('title','ASC')->with('subcategories')->with('products')->get();

        return view('frontend.pages.product.product-subcategory',compact(['category','categories',   'products']));
    }

    //    Product detail
    public function productDetail($slug){
        $product=Product::with('categories')->where('slug',$slug)->first();
        $categories=Category::where(['status'=>'active','is_parent'=>1])->latest()->get();
        if($product){
            return view('frontend.pages.product.product-detail',compact('product','categories'));
        }
        else{
            return 'Product detail not found';
        }
    }

    //  contact page
    public function contactUs(){
        return view('frontend.pages.contact');
    }

    //  contact page
    public function aboutUs(){
        return view('frontend.pages.about');
    }

    // Company Profile
    public function companyProfile()
    {
        return view('frontend.pages.company_profile');
    }

    // Infrastructure
    public function infrastructure()
    {
        return view('frontend.pages.infrastructure');
    }

    // Certification
    public function certification()
    {
        return view('frontend.pages.certification');
    }


    public function userDashboard(){
        $user=Auth::user();

        return view('frontend.user.dashboard',compact('user'));
    }
    public function userOrder(){
        $user=Auth::user();
        $orders=Order::where('user_id',$user->id)->get();
        return view('frontend.user.order',compact('user','orders'));
    }
    public function userAddress(){
        $user=Auth::user();

        return view('frontend.user.address',compact('user'));
    }
    public function userAccount(){
        $user=Auth::user();

        return view('frontend.user.account',compact('user'));
    }

    public function billingAddress(Request $request,$id){
        $this->validate($request,[
            'country'=>'string|nullable',
            'address'=>'string|required',
            'address2'=>'string|nullable',
            'state'=>'string|nullable',
            'postcode'=>'numeric|nullable',
            'country'=>'string|nullable',
        ]);
        $user=User::where('id',$id)->update(['country'=>$request->country,'address2'=>$request->address2,'postcode'=>$request->postcode,'address'=>$request->address,'state'=>$request->state]);
        if($user){
            toastr()->success('Billing address successfully updated!','Success');
            return back();
        }
        else{
            toastr()->error('Something went wrong','Error');

            return back();
        }
    }
    public function shippingAddress(Request $request,$id){
        $this->validate($request,[
            'scountry'=>'string|nullable',
            'saddress'=>'string|required',
            'saddress2'=>'string|nullable',
            'sstate'=>'string|nullable',
            'spostcode'=>'numeric|nullable',
            'scountry'=>'string|nullable',
        ]);
        $user=User::where('id',$id)->update(['scountry'=>$request->scountry,'saddress2'=>$request->saddress2,'spostcode'=>$request->spostcode,'saddress'=>$request->saddress,'sstate'=>$request->sstate]);
        if($user){
            toastr()->success('Shipping address successfully updated!','Success');
            return back();
        }
        else{
            toastr()->error('Something went wrong','Error');
        }
    }

    public function updateAccount(Request $request,$id){
        $this->validate($request,[
            'full_name'=>'required|string',
            'designation'=>'nullable|string',
            'phone'=>'nullable|min:8',
            'email'=>'email|unique:users,email',
            'permanent_address'=>'string|nullable',
            'shipping_address'=>'string|nullable',
        ]);
        $user=User::find($id);
        $data=$request->all();
        $user->fill($data);
        $user->save();
//        User::where('id',$id)->update([
//            'full_name'=>$request->full_name,
//            'designation'=>$request->designation,
//            'phone'=>$request->phone,
//            'email'=>$request->email,
//            'permanent_address'=>$request->permanent_address,
//            'shipping_address'=>$request->shopping_address,
//        ]);
        toastr()->success('Account successfully updated','Succcess');
        return back();

    }

    //blog
    public function blog(){
        $blogs=Blog::orderBy('id','DESC')->paginate(6);
        return view('frontend.pages.blog',compact('blogs'));
    }

    //blog single
    public function blogDetail(Request $request,$url){
        $blogs=Blog::latest()->get();
        $blog=Blog::where('slug',$url)->with('comments')->first();
        return view('frontend.pages.blog-single',compact('blog','blogs'));
    }

    //enquiry
    public function enquiry(){
        return view('frontend.pages.enquiry');
    }

}
