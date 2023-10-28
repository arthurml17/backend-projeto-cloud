<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    
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
}