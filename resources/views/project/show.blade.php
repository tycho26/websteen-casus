@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col">
            <span class="d-inline-flex"><p class="fw-bold">Titel:</p><p>{{$project->projectTitle}}</p></span>
    </div>
</div>
<div class="row">
    <div class="col">
            <span class="d-inline-flex"><p class="fw-bold">Beschrijving:</p><p>{{$project->projectDescription}}</p></span>
    </div>
</div>
    <div class="row">
        <div class="col-2">
            <h2 class="h2">Percelen</h2>
        </div>
        @if($isAdmin)
        <div class="col">
            <a class="btn btn-primary" href="{{route('project.plot.create',$project)}}">Nieuw perceel</a>
        </div>
        @endif
    </div>
<div class="row">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titel</th>
                <th scope="col">Gemeente</th>
                <th scope="col">Sectie</th>
                <th scope="col">Perceel Nummer</th>
                <th scope="col">Oppervlakte</th>
                <th scope="col"></th>
            </tr>
        </thead>  
        <tbody>
            @foreach($project->plots as $plot)
    <tr>
      <th scope="row">{{$plot->plotID}}</th>
      <td>{{$plot->plotTitle}}</td>
      <td>{{$plot->plotMunicipality}}</td>
      <td>{{$plot->plotSection}}</td>
      <td>{{$plot->plotNum}}</td>
      <td>{{$plot->plotArea}}</td>
      <td>N/A</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>


@endsection