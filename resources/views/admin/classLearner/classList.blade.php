@extends('layouts.adminLayout')

@section('content')
  <h1> {{$course->title}}</h1>
  {{-- <div class="my-2">
    <a class="btn btn-info" href="{{route('classTrainer.create')}}">Add New</a>
  </div> --}}
  @if ($course)
    {{-- <div class="form-group">
    <label for="class_id">Example select</label>
    <select name="class_id" class="form-control" id="class_id">
    <option>Please select a class/event</option>
    @foreach ($course->classes as $class)
    <option class="{{$class->id}}">{{'#'.$class->id.' '.$class->getStartEndDate()}}</option>
  @endforeach
</select>
</div> --}}
<div class="row mx-auto">

@foreach ($course->classes as $class)
  <a href="/admin/attendance/class/{{$class->id}}" class="custom-card mx-auto m-md-1 mt-2">
    <div class="card">
      <div class="card-body">
        <h2 class="card-title text-center">{{'#'.$class->id}}</h2>
        <div class="">
          <p>Start Date: {{$class->startDate->format('j F Y')}}</p>
          <p>End Date: {{$class->endDate->format('j F Y')}}</p>
        </div>
      </div>
    </div>
  </a>
@endforeach
</div>
@endif


@endsection
