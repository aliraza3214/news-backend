<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\project;

class ProjectController extends Controller
{
    public function index()
    {
        return response()->json([
            project::all()
        ]);
    }
    public function store()
    {

        $attributes = request()->validate([
            'project_name' => 'required',
            'project_description' => 'required',
            'company_name' => 'required',
            'project_leader' => 'required',
            'status' => 'required',
            'project_process'=> 'required',
        ]);
        project::create($attributes);
        return redirect('/project');
    }
}
