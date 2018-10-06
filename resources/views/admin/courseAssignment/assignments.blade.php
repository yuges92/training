@extends('layouts.adminLayout')

@section('content')
  <h1>Assignments</h1>
  <div class="my-2">
    <a class="btn btn-info" href="assignments/create">Add New</a>

  </div>
  <table class="table table-hover table-responsive-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($assignments as $assignment)

        <tr>
          <th scope="row">{{$assignment->id}}</th>
          <td>{{$assignment->title}}</td>
          <td class="row"><a class="btn btn-success mr-1" href="{{route('assignments.edit', [$assignment->id])}}">Edit</a>
            <form class="deleteForm" action="{{route('assignments.destroy',[$assignment->id])}}" method="post">
              {{ csrf_field() }}
              @method('Delete')
              <input class="btn btn-danger" type="submit" value="Delete">
            </form>
          </td>
          </tr>
        @endforeach

      </tbody>
    </table>
  @endsection
