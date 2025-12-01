@extends('layouts.main')

@section('content')

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titel</th>
      <th scope="col">Gepubliceerd</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($projects as $project)
    <tr>
      <td>{{$project->projectID}}</td>
      <td>{{$project->projectTitle}}</td>
      <td>{{$project->isPublicString()}}</td>
      @if ($isAdmin)
        <td>
            <form method='POST' action="{{route('project.destroy',['project'=>$project->projectID])}}">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger" type="submit">Verwijder</button></td>
            </form>
      @endif
    </tr>
    @endforeach
  </tbody>
</table>

@endsection