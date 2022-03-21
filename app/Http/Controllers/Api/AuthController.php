<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     //https://github.com/fruitcake/laravel-cors this link is cros port enable
    public function login(Request $request)
    {

        if(Auth::attempt($request->only('email', 'password'))){
            $user = Auth::user();
            $token = $user->createToken('app')->accessToken;

            return response([
                'message'=>'successfully login',
                'token'=>$token->token,
                'user'=>$user
            ]);
        }else{
            return response([
                'message'=>'successfully not login',
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ], 400);
        $token = $user->createToken('app')->accessToken;

        return response([
            'message'=> 'successfully registration',
            'token'=>$token->token,
            'user'=>$user
        ]);
    }

    public function user_info()
    {
        $user = Auth::user();
        return response([
            'user'=>$user,
        ]);
    }


}
