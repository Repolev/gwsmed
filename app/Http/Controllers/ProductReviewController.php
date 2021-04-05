<?php

namespace App\Http\Controllers;

use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function productReview(Request $request){
        $this->validate($request,[
            'rate'=>'required|numeric',
            'reason'=>'nullable|string',
            'review'=>'nullable|string',
        ]);

        $data['status']='accept';
        $data=$request->all();
        $status=ProductReview::create($data);
        if($status){
            return back()->with('success','Thanks for your feedback');
        }
        else{
            return back()->with('error','Please try again!');
        }


    }
    public function index()
    {
        $reviews=ProductReview::orderBy('id','DESC')->get();
        return view('backend.review.index',compact('reviews'));
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
        $review=ProductReview::findOrFail($id);
//        return $order;
        if($review){
            return view('backend.review.show',compact('review'));
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
        //
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
        $review=ProductReview::findOrFail($id);
        if($review){
            $status=$review->update(['status'=>$request->input('status')]);
            if($status){
                return redirect()->route('reviews.index')->with('success','Successfully updated the product review');
            }
            else{
                return back()->with('error','There is something wrong, Please try again');
            }
        }
        return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review=ProductReview::find($id);
        if($review){
            $status=$review->delete();
            if($status){
                return redirect()->route('reviews.index')->with('success','Review successfully deleted');
            }
            else{
                return back()->with('error','Something went wrong!');
            }
        }
        else{
            return back()->with('error','Data not found');
        }
    }
}
