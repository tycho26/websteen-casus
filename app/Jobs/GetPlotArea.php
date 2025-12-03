<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Http;
use App\Models\Plot;

class GetPlotArea implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Plot $plot)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        
        $response = Http::withUrlParameters([
            'endpoint' => 'https://service.pdok.nl/kadaster/kadastralekaart/wfs/v5_0',
            'service' => 'WFS',
            'request' => 'GetFeature',
            'version' => '2.0.0',
            'srsName' => 'EPSG:4326',
            'typenames' => 'kadastralekaartv4:perceel',
            'outputFormat' => 'application/json',
            'filter' => sprintf("<Filter><And><PropertyIsEqualTo><ValueReference>kadastraleGemeenteWaarde</ValueReference><Literal>%s</Literal></PropertyIsEqualTo><PropertyIsEqualTo><ValueReference>sectie</ValueReference><Literal>%s</Literal></PropertyIsEqualTo><PropertyIsEqualTo><ValueReference>perceelnummer</ValueReference><Literal>%u</Literal></PropertyIsEqualTo></And></Filter>",$this->plot->plotMunicipality, $this->plot->plotSection, $this->plot->plotNum),
        ])->get('{+endpoint}?service={service}&request={request}&version={version}&srsName={srsName}&typenames={typenames}&outputFormat={outputFormat}&filter={filter}');
        if($response->ok()){
            $this->plot->plotArea = $response['features'][0]['properties']['kadastraleGrootteWaarde'];
            // $response
        }

        // $this->plot->plotTitle = "job";
        $this->plot->save();
    }
}
