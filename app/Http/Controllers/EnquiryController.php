<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Enquiry;
use App\Models\Product;
use Mail;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function enquiryForm(Request $request){
        $this->validate($request,[
            'full_name'=>'string|required',
            'email'=>'email|required',
            'phone'=>'required',
            'country'=>'nullable|string',
            'subject'=>'string|nullable',
            'message'=>'string|nullable',
            'cats'=>'required',
        ]);
        $data=$request->all();
        $enquiry=new Enquiry();
        $enquiry['full_name']=$request->full_name;
        $enquiry['email']=$request->email;
        $enquiry['phone']=$request->phone;
        $enquiry['country']=$request->country;
        $enquiry['address']=$request->address;
        $enquiry['subject']=$request->subject;
        $enquiry['message']=$request->message;

        \Illuminate\Support\Facades\Mail::to('prajwal.iar@gmail.com')->send(new \App\Mail\Enquiry($data));
        $status=$enquiry->save();

        $category=Category::find($request->cats);
        $enquiry->categories()->attach($category);

        if($status){
            toastr()->success('Thank you for submitting enquiry','Success');
            return back();
        }
        else{
            toastr()->error('Something went wrong','Error');
            return back();
        }
    }

    public function index(){
        $enquiries=Enquiry::latest()->get();
        return view('backend.enquiry.index',compact('enquiries'));
    }

    public function destroy($id){
        $enquiry=Enquiry::findOrFail($id);
        if($enquiry){
            $status=$enquiry->delete();
            if($status){
                toastr()->success('Enquiry successfully deleted','Success');
                return back();
            }
            else{
                toastr()->error('Something went wrong','Error');
                return back();
            }
        }
    }
}
