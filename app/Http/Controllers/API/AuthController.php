<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class AuthController extends Controller
{
    public function login(Request $request){
        if(Auth::attempt($request->only('email', 'password'))){
            $token = $request->user()->createToken('api');

            return [ 'token' => $token->plainTextToken];
        }
        // return 'ooops :(';
    }
    
    // public function register(Request $request){
    //         $user = User::create($request->all());
    //         $token = $user->createToken('api');

    //         return [ 'token' => $token->plainTextToken, 'user' => $user];
        
    //     // return 'ooops :(';
    // }
}
