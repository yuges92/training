@extends('layouts.adminLayout')

@section('content')
  <h1>Classes Trainers <small>({{$class->getFormattedStartDate().' - '.$class->endDate->format('j F Y')}})</small></h1>
  <div class="my-2">
    <a class="btn btn-info" href="{{route('classTrainer.create')}}">Add New</a>

  </div>
  @if ($class)
    @if (count($class->trainers)>0)

    <table class="table table-hover table-responsive-sm">
      <thead>
        <tr>
          <th scope="col">Trainer ID</th>
          <th scope="col">Trainer Fullname</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($class->trainers as $trainer)

          <tr>
            <th scope="row">{{$trainer->id}}</th>
            <td>{{$trainer->getFullname()}}</td>
            <td>
              <form class="deleteForm" action="{{route('classTrainer.destroy',[$class->id, $trainer->id])}}" method="post">
                {{ csrf_field() }}
                @method('Delete')
                <input class="btn btn-danger" type="submit" value="Delete">
              </form>
            </td>
          </tr>
        @endforeach

      </tbody>
    </table>
  @endif

  @else
    <div class="text-center">

      <span class="text-danger">No courses found!</span>
    </div>
  @endif

@endsection
