<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogComment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function commentBlog(Request $request, $id)
    {
        $get_blog = Blog::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|max:210',
            'email' => 'required|max:210|email',
            'comment' => 'required',
        ]);

        $data = $request->all();
        $data['blog_id'] = $get_blog->id;
        $data['status']='pending';
        $create_blog_comment = BlogComment::create($data);
        if($create_blog_comment){
            toastr()->success('Thank you for feedback, Your comment will be approved as soon as possible','Success');
            return redirect()->route('blog.detail', $get_blog->slug);
        } else {
            toastr()->error('Something went wrong','Error');
            return back();
        }
    }
    public function index()
    {
        $comments=BlogComment::with('blog')->latest()->get();
        return view('backend.comments.index',compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $comment=BlogComment::findOrFail($id);
        return view('backend.comments.edit',compact('comment'));
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
        $get_blog = Blog::findOrFail($id);
        $comment = BlogComment::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|max:210',
            'email' => 'required|max:210|email',
            'comment' => 'required',
            'status'=>'required|in:pending,accept,reject'
        ]);

        $data = $request->all();
        $data['blog_id'] = $get_blog->id;
        $create_blog_comment = $comment->fill($data)->save();
        if($create_blog_comment){
            return redirect()->route('comments.index')->with('success','Successfully updated status');
        } else {
            return back()->with('error','Something went wrong');
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
        //
    }
}
