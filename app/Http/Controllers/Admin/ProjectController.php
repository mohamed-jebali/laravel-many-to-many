<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::paginate(15);

        return view('admin.projects.index',compact('projects'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.projects.create',compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectStoreRequest $request)
    {
        $newProject = new Project ();
        $data = $request->validated();
        $newProject->fill($data);
        $newProject->type_id = $request->input('type_id');

        if ($request->hasFile('image')){
            $img_path = Storage::disk('public')->put('uploads/projects', $data['image']);
            $newProject->image = $img_path;
        }

        $newProject->slug = Str::of("$newProject->id " . $data['title'])->slug('-');
        $newProject->save();


        return redirect()->route('admin.projects.index')->with('created', $newProject->title);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        // dd($project);
        return view ('admin.projects.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        // @dd($project);
        $types = Type::all();
        return view ('admin.projects.edit',compact('project','types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectUpdateRequest $request, Project $project)
    {
        $data = $request->all();

        if ($request->hasFile('image')){
            Storage::delete($project->image);
            $img_path = Storage::put('uploads/projects', $request['image']);
            $data['image'] = $img_path;
        }

        $data['slug'] = Str::of("$project->id " . $data['title'])->slug('-');
        $project->type_id = $request->input('type_id');
        $project->update($data);

        return redirect()->route('admin.projects.index', compact('project'))->with('update',$project->title);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {

        $project->delete();
        return redirect()->route('admin.projects.index')->with('delete',$project->title);
    }

    public function softDelete (){

        $projects = Project::onlyTrashed()->paginate(5);
        return view('admin.projects.trashed', compact('projects'));

    }
    public function restore (string $slug){

        $project = Project::withTrashed()->findOrFail($slug);
        $project->restore();

        return redirect()->route('admin.projects.index')->with('restored',$project->title);
    }

    public function hardDelete (string $slug){
        
        $project = Project::onlyTrashed()->findOrFail($slug);
        Storage::delete($project->image);
        $project->forceDelete();

        return redirect()->route('admin.projects.index')->with('removed',$project->title);

    }
}