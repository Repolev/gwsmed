<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

//    //    user auth
//    public function userLogin(){
//        return view('frontend.auth.login');
//    }
//
//    public function userRegister(){
//        return view('frontend.auth.register');
//    }
//
//    public function loginSubmit(Request $request){
//        $this->validate($request,[
//            'email'=>'email|required|exists:users,email',
//            'password'=>'required|min:4',
//        ]);
//        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'status'=>'active'])){
//
//            Toastr::success('Post added successfully :)','Success');
//            return redirect()->intended(route('user.dashboard'));
//
//        }
//        else{
//            return back()->with('error','Invalid email & password!');
//        }
//    }
//
//    public function registerSubmit(Request $request){
//        $this->validate($request,[
//            'username'=>'nullable|string',
//            'full_name'=>'required|string',
//            'email'=>'required|email|unique:users,email',
//            'password'=>'min:4|required|confirmed',
//        ]);
//        $data=$request->all();
//        $check=$this->create($data);
//        Session::put('user',$data['email']);
//        Auth::login($check);
//        if($check){
//            return redirect()->intended(route('home'))->with('success','Successfully registered');
//        }
//        else{
//            return back()->with('error',['Please check your credentials']);
//        }
//
//    }
//
//    private function create(array $data){
//        return User::create([
//            'full_name'=>$data['full_name'],
//            'username'=>$data['username'],
//            'email'=>$data['email'],
//            'password'=>Hash::make($data['password']),
//        ]);
//    }
//
//    public function userLogout(){
//        Auth::logout();
//        notify()->success('You successfully logout');
//        return \redirect()->route('home');
//    }
}
