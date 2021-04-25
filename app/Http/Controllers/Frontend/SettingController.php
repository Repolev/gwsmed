<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function settings(){
        $setting=Setting::first();
        return view('backend.setting.index',compact('setting'));
    }

    public function settingsUpdate(Request $request,$id){
        $setting=Setting::findOrFail($id);
        $this->validate($request,[
            'title'=>'string|required',
            'url'=>'url|nullable',
            'logo'=>'image|nullable|mimes:png,jpg,svg,gif,jpeg',
            'favicon'=>'image|nullable|mimes:png,jpg,svg,gif,jpeg',
            'email'=>'email|required',
            'phone'=>'required',
            'about'=>'required|string',
            'short_intro'=>'required|string',
            'ofice_time'=>'nullable',
            'footer'=>'string|required',
        ]);

        $data=$request->all();
        //logo
        if($request->hasFile('logo')){
            if($file=$request->file('logo')){
                $imageName = str_replace(' ','-',$request->input('title')).'-'.$file->getClientOriginalName();
                $file->storeAs('storage/frontend/images/settings/',$imageName);
                $data['logo']=$imageName;
            }
        }
        //favicon
        if($request->hasFile('favicon')){
            if($file=$request->file('favicon')){
                $imageName=time().'-'.$file->getClientOriginalName();
                $file->storeAs('public/frontend/images/settings/',$imageName);
                $data['favicon']=$imageName;
            }
        }

        $status=$setting->update($data);
        if($status){
            return back()->with('success','General settings successfully updated');
        }
        else{
            return back()->with('error','Please try later');
        }
     }
}
