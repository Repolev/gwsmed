<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::orderBy('id','DESC')->get();
        return view('backend.user.index',compact('users'));
    }

    public function userStatus(Request $request){
        if($request->mode=='true'){
            DB::table('users')->where('id',$request->id)->update(['status'=>'active']);
        }
        else{
            DB::table('users')->where('id',$request->id)->update(['status'=>'inactive']);
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
        return view('backend.user.create');
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
            'full_name'=>'string|required',
            'username'=>'string|nullable',
            'email'=>'email|required|unique:users,email',
            'photo'=>'nullable|image|mimes:png,jpg,gif,jpeg,svg',
            'password'=>'min:4|required',
            'phone'=>'string|nullable',
            'address'=>'string|nullable',
            'status'=>'required|in:active,inactive',
        ]);
        $data= $request->all();

        if($request->hasFile('photo')){
            if($file=$request->file('photo')){
                $imageName = time() ."-". str_replace(' ', '-', $file->getClientOriginalName());
                $file->storeAs('public/backend/assets/images/user/', $imageName);
                $data['photo']=$imageName;
            }
        }

        $data['password']=Hash::make($request->password);

//        return $data;
        $status=User::create($data);
        if($status){
            return redirect()->route('user.index')->with('success','User successfully created');
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
        $user=User::find($id);
        if($user){
            return view('backend.user.edit',compact(['user']));
        }
        else{
            return back()->with('error','User not found');
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
        $user=User::find($id);
        if($user){
            $this->validate($request,[
                'full_name'=>'string|required',
                'username'=>'string|nullable',
                'email'=>'email|required|exists:users,email',
                'photo'=>'required|image|mimes:png,jpg,gif,jpeg,svg',
                'phone'=>'string|nullable',
                'address'=>'string|nullable',
                'status'=>'required|in:active,inactive',
            ]);

            $data=$request->all();

            if($request->hasFile('photo')){
                if($file=$request->file('photo')){
                    $imageName = time() ."-". str_replace(' ', '-', $file->getClientOriginalName());
                    $file->storeAs('public/backend/assets/images/user/', $imageName);
                    $data['photo']=$imageName;
                }
            }

            $status=$user->fill($data)->save();
            if($status){
                return redirect()->route('user.index')->with('success','User successfully updated');
            }
            else{
                return back()->with('error','Something went wrong!');
            }
        }
        else{
            return back()->with('error','User not found');
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
        $user=User::find($id);
        if($user){
            $status=$user->delete();
            if($status){
                return redirect()->route('user.index')->with('success','User successfully deleted');
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
