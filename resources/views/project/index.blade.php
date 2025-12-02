@extends('layouts.main')

@section('content')

<a class="btn btn-primary" href="{{route('project.create')}}">Nieuw project</a>

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
      <td><a href="{{route('project.show',['project'=>$project])}}">{{$project->projectTitle}}</a></td>
      <td>{{$project->isPublicString()}}</td>
      @if ($isAdmin)
        <td>
          <div class="btn-group" role="group">
            <a class="btn btn-primary" href="{{route('project.edit',['project'=>$project])}}">Bewerken</a>
            <form method='POST' action="{{route('project.destroy',['project'=>$project])}}">
                @method('DELETE')
                @csrf
              <button class="btn btn-danger" type="submit">Verwijder</button>
            </form>
          </div>
      </td>
      @endif
    </tr>
    @endforeach
  </tbody>
</table>

@endsection