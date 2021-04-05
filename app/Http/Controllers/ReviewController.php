<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $reviews=Review::orderBy('id','DESC')->get();
        return view('backend.review.index',compact('reviews'));
    }

    public function reviewStatus(Request $request){
        if($request->mode=='true'){
            DB::table('reviews')->where('id',$request->id)->update(['status'=>'active']);
        }
        else{
            DB::table('reviews')->where('id',$request->id)->update(['status'=>'inactive']);
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
        return view('backend.review.create');

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
            'address'=>'string|nullable',
            'rate'=>'required',
            'review'=>'string|nullable',
            'status'=>'required|in:active,inactive',
        ]);
        $data=$request->all();
        $status=Review::create($data);
        if($status){
            return redirect()->route('reviews.index')->with('success','Successfully created review');
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
        $review=Review::find($id);
        if($review){
            return view('backend.review.edit',compact('review'));
        }
        else{
            return back()->with('error','Data not found');
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
        $review=Review::find($id);
        if($review){
            $this->validate($request,[
                'name'=>'string|required',
                'address'=>'string|nullable',
                'rate'=>'required',
                'review'=>'string|nullable',
                'status'=>'required|in:active,inactive',
            ]);
            $data=$request->all();


            $status=$review->fill($data)->save();
            if($status){
                return redirect()->route('reviews.index')->with('success','Successfully updated review');
            }
            else{
                return back()->with('error','Something went wrong!');
            }
        }
        else{
            return back()->with('error','Data not found');
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
