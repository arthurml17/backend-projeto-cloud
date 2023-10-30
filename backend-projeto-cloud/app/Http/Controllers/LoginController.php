<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

// 1|yk5AwNElO5IJf1m01gnpQc6pPgBXg1vXkR2db2iP1fe4aedf

class LoginController extends Controller
{
    use HasApiTokens, HasFactory, Notifiable;

    public function auth(Request $request)
    {
        $data = $request->only('email', 'password');
        if(Auth::attempt($data)){
            $user = $request->user();
            $user = User::find($user->id);
            $token = $user->createToken('auth_token');
            return response()->json([
                'data' => 'User logged successfully', 
                'token_id' => $token->accessToken->id, 
                'auth_token' => $token->plainTextToken, 
                'token_type' => 'Bearer'
            ], 200);
        }else{    
            return response()->json(['data' => 'Invalid user, please try again', 'status' => false], 401);
        }
    }

    public function logout(Request $request){  
        $user = $request->user();
        $data = $request->all();
        $user->tokens()->where('id', $data['token_id'])->delete();
        return response()->json(['data' => 'User logged out successfully', 'status' => true], 200);
    }

}