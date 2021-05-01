<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;
use App\Models\CatalogCategory;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catalogs = Catalog::orderBy('id','DESC')->get();
        return view('backend.catalog.index',compact('catalogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CatalogCategory::all();
        return view('backend.catalog.create', compact('categories'));
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
            'name'=>'string|required',
            'catalog-slug'=>'string|nullable',
            'category_id'=>'nullable|exists:catalog_categories,id',
            'photo'=>'image|nullable|mimes:png,jpg,jpeg,svg,gif',
            'pdf_file' => 'required|max:10000',
            'status'=>'required|in:active,inactive'
        ]);
        $data = $request->all();

        if($request->hasFile('photo')){
            if($file=$request->file('photo')){
                $imageName = time() .".". $file->getClientOriginalExtension();
                $file->move(public_path('/backend/assets/images/catalog/') , $imageName);
                $data['image_name']=$imageName;
                $data['image_path']='/backend/assets/images/catalog/'.$imageName;
            }
        }

        if($request->hasFile('pdf_file')){
            if($file=$request->file('pdf_file')){
                $fileName = time() .".". $file->getClientOriginalExtension();
                $file->move(public_path('/backend/assets/images/catalog/') , $fileName);
                $data['pdf_path']='/backend/assets/images/catalog/'. $fileName;
            }
        }

        // dd($data);

        $status =  Catalog::create($data);
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
        $category = Catalog::find($id);
        $categories = CatalogCategory::orderBy('title','ASC')->get();
        if($category){
            return view('backend.catalog.edit',compact(['category','parent_cats']));
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
        $category = Catalog::find($id);
        if($category){
            $this->validate($request,[
                'title'=>'string|required',
                'description'=>'string|nullable',
                'parent_id'=>'nullable|exists:catalog_categories,id',
                'status'=>'required|in:active,inactive'
            ]);

            $data = $request->all();
            if($request->hasFile('photo')){
                if($file=$request->file('photo')){
                    $imageName = time() .".". $file->getClientOriginalExtension();
                    $file->move(public_path('/backend/assets/images/catalog/') , $imageName);
                    $data['image_name']=$imageName;
                    $data['image_path']='/backend/assets/images/catalog/'.$imageName;
                }
            }

            if($request->hasFile('pdf_file')){
                if($file=$request->file('pdf_file')){
                    $fileName = time() .".". $file->getClientOriginalExtension();
                    $file->move(public_path('/backend/assets/images/catalog/') , $fileName);
                    $data['pdf_path']='/backend/assets/images/catalog/'. $fileName;
                }
            }
            $status = $category->fill($data)->save();
            if($status){
                return redirect()->route('catalogs.index')->with('success','Category successfully updated');
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
