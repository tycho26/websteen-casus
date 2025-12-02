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


@endsection