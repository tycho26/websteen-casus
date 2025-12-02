<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\FormBuilderTrait;

class ProjectController extends Controller
{
    use FormBuilderTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(bool $isAdmin = true)
    {
        if ($isAdmin) {
            $projects = Project::all();
        } else {
            $projects = Project::where('projectPublic', 1)->get();
        }

        return view('project.index', compact(['projects', 'isAdmin']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create('App\Forms\ProjectForm', [
            'url' => route('project.store'),
            'method' => 'POST',
        ]);

        return view('project.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $project = new Project;
        $project->projectPublic = $request->projectPublic;
        $project->projectTitle = $request->projectTitle;
        $project->projectDescription = $request->projectDescription;
        $project->projectSlug = Str::slug($request->projectTitle, '-');

        $project->save();

        return redirect(route('project.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project, FormBuilder $formBuilder)
    {
        // $project = Project::findOrFail($id);
        
        $form = $formBuilder->create('App\Forms\ProjectForm', [
            'url' => route('project.update',['project'=>$project]),
            'method' => 'PUT',
            'model' => $project
        ]);

        return view('project.create', compact('form'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        // $project = Project::findOrFail($id);
        // dd($request->input());
        $project->fill($request->input());
        // dd($project);
        if($project->isDirty("projectTitle"))
        {
            $project->projectSlug = Str::slug($request->projectTitle, '-');
        }
        $project->save();
        return redirect(route('project.index'));
    }   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect(route('project.index'));
    }
}
