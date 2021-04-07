<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BannerResource;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners=Banner::all();
        return response(['banners'=>BannerResource::collection($banners),'message'=>'Retrived Successfully'],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
        $validator=Validator::make($data,[
            'title'=>'string|required',
            'slug'=>'string|nullable',
            'description'=>'string|nullable',
            'photo'=>'required|image|mimes:png,jpg,gif,jpeg,svg',
            'position'=>'nullable|in:top,middle,bottom,footer',
            'condition'=>'nullable|in:banner,promo',
            'status'=>'required|in:active,inactive',
        ]);

        if($validator->fails()){
            return response(['error'=>$validator->errors(),'Validator Error']);
        }
        if($request->hasFile('photo')){
            if($file=$request->file('photo')){
                $imageName = time() ."-". str_replace(' ', '-', $file->getClientOriginalName());
                $file->storeAs('public/backend/assets/images/banner/', $imageName);
                $data['photo']=$imageName;
                $data['image_path']='storage/backend/assets/images/banner/'.$imageName;
            }
        }
        $banner=Banner::create($data);
        return response(['banner'=>new BannerResource($banner),'message'=>'Banner successfully created'],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        return response(['banner'=>new BannerResource($banner),'message'=>'Retrived successfully'],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {

        $data=$request->all();

        if($request->hasFile('photo')){
            if($file=$request->file('photo')){
                $imageName = time() ."-". str_replace(' ', '-', $file->getClientOriginalName());
                $file->storeAs('public/backend/assets/images/banner/', $imageName);
                $data['photo']=$imageName;
                $data['image_path']='storage/backend/assets/images/banner/'.$imageName;
            }
        }
        $banner->update($data);
        return response(['banner'=>new BannerResource($banner),'message'=>'Banner updated'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return response(['message'=>'Banner deleted successfully']);
    }
}
