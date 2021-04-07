<?php

namespace App\Http\Controllers;

use App\Models\Display;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DisplayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $displays=Display::orderBy('id','DESC')->get();
        return view('backend.display.index',compact('displays'));
    }

    public function displayStatus(Request $request){
        if($request->mode=='true'){
            DB::table('displays')->where('id',$request->id)->update(['status'=>'active']);
        }
        else{
            DB::table('displays')->where('id',$request->id)->update(['status'=>'inactive']);
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
        return view('backend.display.create');

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
            'position'=>'numeric|required',
            'status'=>'required|in:active,inactive',
        ]);
        $data=$request->all();
        $status=Display::create($data);
        if($status){
            return redirect()->route('display.index')->with('success','Successfully created home page menu');
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
        $display=Display::find($id);
        if($display){
            return view('backend.display.edit',compact('display'));
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
        $display=Display::find($id);
        if($display){
            $this->validate($request,[
                'title'=>'string|required',
                'position'=>'numeric|required',
                'status'=>'required|in:active,inactive',
            ]);
            $data=$request->all();

            $status=$display->fill($data)->save();
            if($status){
                return redirect()->route('display.index')->with('success','Successfully updated display');
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
        $display=Display::find($id);
        if($display){
            $status=$display->delete();
            if($status){
                return redirect()->route('display.index')->with('success','Home page menu successfully deleted');
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
