<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function enquiryForm(Request $request){
        $this->validate($request,[
            'full_name'=>'string|required',
            'email'=>'email|required',
            'phone'=>'required',
            'country'=>'nullable|string',
            'subject'=>'string|required',
            'message'=>'string|nullable'
        ]);
        $data=$request->all();
        $status=Enquiry::create($data);
        if($status){
            toastr()->success('Thank you for submitting enquiry','Success');
            return back();
        }
        else{
            toastr()->error('Something went wrong','Error');
            return back();
        }
    }
}
