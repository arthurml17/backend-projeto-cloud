<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Kernel;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $projects = Project::all();
        if($projects){
            return response()->json(['data' => $projects, 'status' => true], 200);
        }else{
            return response()->json(['data' => 'Failed to show projects', 'status' => true], 500);
        }
    }

    public function getActive()
    {
        $projects = Project::where('status', 1)->get();
        if($projects){
            return response()->json(['data' => $projects, 'status' => true], 200);
        }else{
            return response()->json(['data' => 'Failed to show projects', 'status' => true], 500);
        }
    }

    public function getInactive()
    {
        $projects = Project::where('status', 0)->get();
        if($projects){
            return response()->json(['data' => $projects, 'status' => true], 200);
        }else{
            return response()->json(['data' => 'Failed to show projects', 'status' => true], 500);
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
        $data = $request->all();
        $project = Project::create($data);
        if($project){
            return response()->json(['data' => 'Project added successfully', 'status' => true], 200);
        }else{
            return response()->json(['data' => 'Failed to add project', 'status' => false], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $project = Project::find($id);
        if($project){
            return response()->json(['data' => $project, 'status' => true], 200);
        }else{
            return response()->json(['data' => 'Failed to show project', 'status' => true], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->all();
        $project = Project::find($id);
        if($project){
            $project->update($data);
            return response()->json(['data' => 'Project updated successfully', 'status' => true], 200);
        }else{
            return response()->json(['data' => 'Failed to update project', 'status' => true], 500);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $project = Project::find($id);
        if($project){
            $project->delete();
            return response()->json(['data' => 'Project deleted successfully', 'status' => true], 200);
        }else{
            return response()->json(['data' => 'Failed to delete project', 'status' => true], 500);
        }
    }
}
