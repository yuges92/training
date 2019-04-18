@extends('layouts.adminLayout')

@section('content')
  <h1>Courses</h1>
  <div class="my-2">
    <a class="btn btn-info" href="{{route('createCourse')}}"> <i class="fas fa-plus"></i> Add New</a>

  </div>

  @if (count($courses)>0)
  <div class="box">
      <div class="box-body">
  <table class="table table-hover table-responsive-sm dataTable" id="table_id">
    <thead >
      <tr >
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Status</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($courses as $course)

        <tr>
          <th scope="row">{{$course->id}}</th>
          <td>{{$course->title}}</td>
          <td>{{$course->status}}</td>
          <td class="row"><a class="btn btn-success mr-1" href="{{route('editCourse', [$course->id])}}"><i class="fas fa-eye fa-1x"></i></a>
            <form class="deleteForm" action="{{route('deleteCourse',[$course->id])}}" method="post">
              {{ csrf_field() }}
              @method('Delete')
              <button class="btn btn-danger" type="submit"> <i class="fas fa-trash-alt"></i></button>
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
