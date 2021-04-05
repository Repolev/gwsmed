<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //user login
    public function login(Request $request){
        $loginData=$request->validate([
            'email'=>'email|required',
            'password'=>'required',
        ]);

        if(!auth()->attempt($loginData)){
            return response(['message'=>'Invalid Credentials']);
        }

        $accessToken=auth()->user()->createToken('authToken')->accessToken;

        return response(['user'=>auth()->user(),'access_token'=>$accessToken]);
    }

    //user registration
    public function register(Request $request){
        $validateData=$request->validate([
            'full_name'=>'string|required',
            'username'=>'string|nullable',
            'email'=>'email|required|unique:users,email',
            'photo'=>'nullable|image|mimes:png,jpg,gif,jpeg,svg',
            'password'=>'min:6|required',
            'phone'=>'string|nullable',
            'address'=>'string|nullable',
            'status'=>'required|in:active,inactive',
        ]);
        $validateData['password']=Hash::make($request->password);
        $user=\App\Models\User::create($validateData);
        $accessToken=$user->createToken('authToken')->accessToken;
        return response(['user'=>$user,'access_token'=>$accessToken]);
    }

    //user logout
    public function logout(Request $request){
        $token=$request->user()->token();
        $token->revoke();
        $response=['message'=>"You have been successfully logout"];
        return response()->json([
            'data'=>$response,
            'statusCode'=>200
        ]);
    }



}
