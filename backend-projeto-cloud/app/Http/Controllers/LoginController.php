<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class LoginController extends Controller
{
    use HasApiTokens, HasFactory, Notifiable;

    public function auth(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        $login = Auth::attempt($data);
        if($login){
            return response()->json(['data' => 'User logged successfully', 'status' => true], 200);
        }else{
            return response()->json(["data" => 'Invalid crendecials, please try again', 'status' => false], 401);
        }
    }

    // public function auth(Request $request)
    // {
    //     $data = $request->only('email', 'password');
    //     if(Auth::attempt($data)){
    //         $user = $request->user();
    //         // Session::put('user', $user);
    //         $token = $user->createToken('auth_token')->plainTextToken;
    //         return response()->json(['access_token' => $token, 'token_type' => 'Bearer'], 200);
    //     }else{    
    //         return response()->json(['data' => 'Invalid user, please try again', 'status' => false], 401);
    //     }
    // }
}