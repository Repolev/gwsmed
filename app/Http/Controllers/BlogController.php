<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $blogs=Blog::orderBy('id','DESC')->get();
        return view('backend.blogs.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blogs.create');
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
            'slug'=>'string|required',
            'content'=>'string',
            'blog_image'=>'required|image|mimes:png,jpg,gif,jpeg,svg',
        ]);
        $data = $request->all();
        $data['user_id'] = Auth::guard('admin')->user()->id;
        if($file=$request->file('blog_image')){
            $imageName = time() ."-". str_replace(' ', '-', $file->getClientOriginalExtension());
            $blog_image = Image::make($file->getRealPath());
            $blog_image->resize(320, 240);
            $blog_image->save(public_path('storage/backend/assets/images/blogs/'. $imageName, 100));
            $data['image']=$imageName;
            $data['image_path'] = 'storage/backend/assets/images/blogs/'.$imageName;
        }
        $data['slug']=str_replace(' ','-',$request->slug);
        $status = Blog::create($data);
        if($status){
            return redirect()->route('blogs.index')->with('success', 'Successfully created Blogs');
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
        $blog = Blog::findOrFail($id);
        return view('backend.blogs.edit', compact('blog'));
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
        $blog = Blog::findOrFail($id);
        $this->validate($request,[
            'title'=>'string|required',
            'slug'=>'string|required',
            'summary'=>'string',
        ]);
        $data = $request->all();
        $data['user_id'] = Auth::guard('admin')->user()->id;

        if($file=$request->file('blog_image')){
            $imageName = time() ."-". str_replace(' ', '-', $file->getClientOriginalExtension());
            $blog_image = Image::make($file->getRealPath());
            $blog_image->resize(320, 240);
            $blog_image->save(public_path('storage/backend/assets/images/blogs/'. $imageName, 100));
            $data['image']=$imageName;
            $data['image_path'] = 'storage/backend/assets/images/blogs/'.$imageName;
        }

        $status = $blog->fill($data)->save();
        if($status){
            return redirect()->route('blogs.index')->with('success','Successfully updated Blogs');
        }
        else{
            return back()->with('error','Something went wrong!');
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
        $blog = Blog::findOrFail($id);
        $status = $blog->delete();
        if($status){
            return redirect()->route('banner.index')->with('success','Banner successfully deleted');
        }
        else{
            return back()->with('error','Something went wrong!');
        }
    }
}
