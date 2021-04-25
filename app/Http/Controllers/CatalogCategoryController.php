<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CatalogCategory;
use Illuminate\Support\Facades\DB;

class CatalogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=CatalogCategory::orderBy('id','DESC')->get();
        return view('backend.catalog_category.index',compact('categories'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_cats = CatalogCategory::orderBy('title','ASC')->get();
        return view('backend.catalog_category.create',compact('parent_cats'));
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
            'slug' =>'string|required',
            'parent_id'=>'nullable|exists:catalog_categories,id',
            'status'=>'required|in:active,inactive'
        ]);
        $data=$request->all();
        $slug = $request->input('slug');
        $slug_count = CatalogCategory::where('slug',$slug)->count();
        if($slug_count > 0){
            $slug = $slug.'-'.Str::random(5);
        }
        $data['slug'] = $slug;

        $status=CatalogCategory::create($data);
        if($status){
            return redirect()->route('catalog-category.index')->with('success','Catalog Category successfully created');
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
        $category = CatalogCategory::find($id);
        $parent_cats = CatalogCategory::where('id', '!=', $id)->orderBy('title','ASC')->get();
        if($category){
            return view('backend.catalog_category.edit',compact(['category','parent_cats']));
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
        $category = CatalogCategory::find($id);
        if($category){
            $this->validate($request,[
                'title'=>'string|required',
                'description'=>'string|nullable',
                'parent_id'=>'nullable|exists:catalog_categories,id',
                'status'=>'required|in:active,inactive'
            ]);

            $data=$request->all();

            $slug = $request->input('slug');
            $check_slug = CatalogCategory::where('slug', $slug)->first();
            if($check_slug){
                if($check_slug->id != $id){
                    $slug = $slug.'-'.Str::random(5);
                }
            }
            $data['slug'] = $slug;
            $status = $category->fill($data)->save();
            if($status){
                return redirect()->route('catalog-category.index')->with('success','Category successfully updated');
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
        $category=CatalogCategory::find($id);
        $child_cat_id=CatalogCategory::where('parent_id',$id)->pluck('id');
        if($category){
            $status=$category->delete();
            if($status){
                if(count($child_cat_id)>0){
                    CatalogCategory::shiftChild($child_cat_id);
                }
                return redirect()->route('catalog-category.index')->with('success','Category successfully deleted');
            }
            else{
                return back()->with('error','Something went wrong!');
            }
        }
        else{
            return back()->with('error','Data not found');
        }
    }

    public function categoryStatus(Request $request){
        if($request->mode=='true'){
            DB::table('catalog_categories')->where('id',$request->id)->update(['status'=>'active']);
        }
        else{
            DB::table('catalog_categories')->where('id',$request->id)->update(['status'=>'inactive']);
        }
        return response()->json(['msg'=>'Successfully updated status','status'=>true]);
    }
}
