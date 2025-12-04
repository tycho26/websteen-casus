<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Http;
use App\Jobs\GetPlotArea;
use App\Models\Project;
use App\Models\Plot;
use Tests\TestCase;


class PlotIntegrationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
    */
    public function test_perceel(): void
    {
        Queue::fake();
        Http::fake();
        $project = Project::factory()->create();

        $request = [
            'plotTitle'=>'testPlot',
            'plotMunicipality'=>'Almere',
            'plotSection'=>'C',
            'plotNum'=>2234
        ];

        $response = $this->post(route('project.plot.store', $project), $request);

        $response->assertRedirect(route('project.show', $project));
        
        
        Queue::assertPushed(GetPlotArea::class, function ($job) use ($project) {
            return $job->plot->project_id === $project->id;
        });

        $this->assertDatabaseHas('plots', [
            'plotTitle' => 'testPlot',
            'plotMunicipality' => 'Almere',
            'plotSection' => 'C',
            'plotNum' => 2234
        ]);
    }
}
