@extends('layouts.adminLayout')

@section('content')
  <h1>Courses</h1>
  <div class="my-2">
    <a class="btn btn-info" href="{{route('createCourse')}}">Add New</a>

  </div>

  @if (count($courses)>0)
  <div class="box">
      <div class="box-body">
  <table class="table table-hover table-responsive-sm" id="table_id">
    <thead >
      <tr >
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($courses as $course)

        <tr>
          <th scope="row">{{$course->id}}</th>
          <td>{{$course->title}}</td>
          <td class="row"><a class="btn btn-success mr-1" href="{{route('editCourse', [$course->slug])}}"><i class="fas fa-edit"></i> Edit</a>
            <form class="deleteForm" action="{{route('deleteCourse',[$course->id])}}" method="post">
              {{ csrf_field() }}
              @method('Delete')
              <input class="btn btn-danger" type="submit" value="Delete">
            </form>
          </td>
          </tr>
        @endforeach

      </tbody>
    </table>
  </div>
</div>
  @else
    <div class="text-center">

      <span class="text-danger">No courses found!</span>
    </div>
  @endif

  @endsection
