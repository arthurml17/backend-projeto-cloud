<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();
        if($users){
            return response()->json(['data' => $users, 'status' => true], 200);
        }else{
            return response()->json(['data' => 'Failed to show users', 'status' => false], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                 'data' => "Fill in all fields",
                 'status' => false
            ], 400);
        }

        $data = $request->all();
        $user = User::create($data);
        if($user){
            return response()->json(['data' => 'User created successfully', 'status' => true], 200);
        }else{
            return response()->json(['data' => 'Failed to create user', 'status' => false], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $user = User::find($id);
        if($user){
            return response()->json(['data' => $user, 'status' => true], 200);
        }else{
            return response()->json(['data' => 'Failed to show user', 'status' => false], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->all();
        $user = User::find($id);
        if($user){
            $user->update($data);
            return response()->json(['data' => 'User updated successfully', 'status' => true], 200);
        }else{
            return response()->json(['data' => 'Failed to update user', 'status' => false], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::find($id);
        if($user){
            $user->delete();
            return response()->json(['data' => 'User deleted successfully', 'status' => true], 200);
        }else{
            return response()->json(['data' => 'Failed to delete user', 'status' => false], 500);
        }
    }
}
