<?php

namespace App\Http\Controllers;

use App\Models\project;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = DB::select(/** @lang text */ 'select * from projects');
        return view('project',[
            'project' => $projects
        ]);
    }
    public function create()
    {
        return view('add-project');
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
//        $attributes['thumbnail']= request()->file('thumbnail')->store('thumbnails');
        project::create($attributes);
        return redirect('/project');
    }
    public function edit(Project $project)
    {
        return view('project-edit',['project' => $project ]);
    }
    public function update(Request $request,Project $project)
    {
        $attributes = request()->validate([
            'project_name' => 'required',
            'project_description' => 'required',
            'company_name' => 'required',
            'project_leader' => 'required',
            'status' => 'required',
            'project_process'=> 'required',
        ]);
        $project->update($attributes);
        return redirect('/project');
    }
    public function destroy(Project $project)
    {
        $project->delete();
        return back();
    }
}
