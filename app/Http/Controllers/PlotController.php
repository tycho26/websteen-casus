<?php

namespace App\Http\Controllers;

use App\Models\Plot;
use App\Models\Project;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use Illuminate\Support\Facades\Http;   
use App\Jobs\GetPlotArea;

class PlotController extends Controller
{
    use FormBuilderTrait;

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project, FormBuilder $formBuilder)
    {
        $form = $formBuilder->create('App\Forms\PlotForm', [
            'url' => route('project.plot.store',$project),
            'method' => 'POST',
        ]);
        return view('plot.create',compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Project $project, Request $request)
    {
        $plot = new Plot();
        $plot->fill($request->input());
        $project->plots()->save($plot);
        
        GetPlotArea::dispatch($plot);
        return redirect(route('project.show',$project));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project, Plot $plot, FormBuilder $formBuilder)
    {
        $form = $formBuilder->create('App\Forms\PlotForm', [
            'url' => route('project.plot.update',['project'=>$project, 'plot'=>$plot]),
            'method' => 'PUT',
            'model' => $plot
        ]);

        return view('project.create', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project, Plot $plot)
    {
        // $project = Project::findOrFail($id);
        // dd($request->input());
        $plot->fill($request->input());
        // dd($project);
        $plot->save();
        GetPlotArea::dispatch($plot);
        return redirect(route('project.show',$project));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project, Plot $plot)
    {
        $plot->delete();

        return redirect(route('project.show',$project));
    }
}
