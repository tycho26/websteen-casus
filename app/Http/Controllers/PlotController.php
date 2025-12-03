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
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

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
        // dd($plot);
        
        GetPlotArea::dispatch($plot);
        return redirect(route('project.show',$project));
    }

    /**
     * Display the specified resource.
     */
    public function show(Plot $plot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plot $plot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plot $plot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plot $plot)
    {
        //
    }
}
