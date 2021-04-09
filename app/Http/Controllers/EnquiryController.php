<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Enquiry;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function enquiryCategoryForm(Request $request){

        $this->validate($request,[
            'full_name'=>'string|required',
            'email' => 'email|required',
            'phone' => 'required',
            'country'=>'nullable|string',
            'cats' => 'required',
            'message' => 'string|nullable',
        ]);
        $data = $request->all();
        $category_id = $request->cats;
        $categories = Category::findMany($category_id);
        $data['categories'] = $categories;
        Mail::to('gwssurgicalsllp@gmail.com')->cc('info@gwsmed.com')->cc('reehoodayush@gmail.com')->send(new \App\Mail\CategoryEnquiry($data));
       // check for failures
        if (Mail::failures()) {
            toastr()->error('Something went wrong','Error');
            return back();
        } else {
            toastr()->success('Thank you for submitting enquiry','Success');
            return back();
        }
    }

    public function enquiryProductForm(Request $request){

        $this->validate($request,[
            'full_name'=>'string|required',
            'email'=>'email|required',
            'phone'=>'required',
            'country'=>'nullable|string',
            'product' => 'required|string',
            'message'=>'string|nullable',
        ]);
        $data=$request->all();
        Mail::to('gwssurgicalsllp@gmail.com')->cc('info@gwsmed.com')->cc('reehoodayush@gmail.com')->send(new \App\Mail\ProductEnquiry($data));

        // check for failures
        if (Mail::failures()) {
            toastr()->error('Something went wrong','Error');
            return back();
        } else {
            toastr()->success('Thank you for submitting enquiry','Success');
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
