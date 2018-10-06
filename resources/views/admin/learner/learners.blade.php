@extends('layouts.adminLayout')

@section('content')
  <h1>Learners</h1>
  <div class="my-2">
    <a class="btn btn-info" href="{{route('users.create')}}">Add New Learner</a>
  </div>
  @if (count($learners)>0)
  <table class="table table-hover table-responsive-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Fullname</th>
        <th scope="col">Email</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($learners as $learner)

        <tr>
          <th scope="row">{{$learner->id}}</th>
          <td>{{$learner->getFullname()}}</td>
          <td>{{$learner->email}}</td>
          <td class="row"><a class="btn btn-success mr-1" href="{{route('learners.edit', [$learner->id])}}">View</a>

          </td>
          </tr>
        @endforeach

      </tbody>
    </table>
  @else
    <div class="text-center">

      <span class="text-danger">No courses found!</span>
    </div>
  @endif

  @endsection
