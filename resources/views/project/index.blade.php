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
          <div class="btn-group" role="group">
            <a class="btn btn-primary" href="{{route('project.edit',['project'=>$project->projectID])}}">Bewerken</a>
            <form method='POST' action="{{route('project.destroy',['project'=>$project->projectID])}}">
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