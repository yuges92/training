@extends('layouts.adminLayout') 
@section('title', 'Classes') 
@section('content')
<div class="my-2">
  <a class="btn btn-info" href="{{route('classes.create')}}">Add New</a>

</div>
@if (count($classes)>0)
<div class="box">
  <div class="box-body">

    <table class="table table-hover table-responsive-sm dataTable">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Course</th>
          <th scope="col">Start Date</th>
          {{--
          <th scope="col">End Date</th> --}}
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($classes as $class)

        <tr>
          <th scope="row">{{$class->id}}</th>
          <td>{{'(#'.$class->course->id.') '.$class->course->title}}</td>
          {{-- <td>{{$class->getFormattedStartDate()}}</td> --}}
          <td></td>
          {{--
          <td>{{$class->endDate->format('j F Y')}}</td> --}}
          <td class="row"><a class="btn btn-success mr-1" href="{{route('classes.show', $class->id)}}">Edit</a>
            <form class="deleteForm" action="{{route('classes.destroy',[$class->id])}}" method="post">
              {{ csrf_field() }} @method('Delete')
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