<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Catalog::orderBy('id','DESC')->get();
        return view('backend.catalog.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.catalog.create');
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
            'parent_id'=>'nullable|exists:catalog_categories,id',
            'status'=>'required|in:active,inactive'
        ]);
        $data=$request->all();

        $status=Catalog::create($data);
        if($status){
            return redirect()->route('catalogs.index')->with('success','Catalogs successfully created');
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
        $category=Catalog::find($id);
        $parent_cats=Catalog::orderBy('title','ASC')->get();
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
        $category=Catalog::find($id);
        if($category){
            $this->validate($request,[
                'title'=>'string|required',
                'description'=>'string|nullable',
                'parent_id'=>'nullable|exists:catalog_categories,id',
                'status'=>'required|in:active,inactive'
            ]);

            $data=$request->all();
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
        $catalog = Catalog::findOrFail($id);
        $catalog->delete();
        return redirect()->route('catalogs.index')->with('success','Catalog successfully deleted');
    }
}
