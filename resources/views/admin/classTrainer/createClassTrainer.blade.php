@extends('layouts.adminLayout')

@section('content')
  <div class="container p-sm-0 px-md-5 ">
    <h1 class="mb-5">New Class Trainer</h1>

    <form class="" action="{{route('classTrainer.store')}}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}


      <div class="form-group row">
        <label for="course_id" class="col-sm-2 col-form-label">Course:</label>
        <div class="col-sm-10">
          <select id="course_id" class="form-control" name="course_id">
            <option value="">Select a course</option>
            @foreach ($courses as $course)
              <option {{ (old('course_id')==$course->id) ? 'selected':''}} value="{{$course->id}}">{{$course->title}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="course_id" class="col-sm-2 col-form-label">Class/Event:</label>
        <div class="col-sm-10">
          <select id="class_id" class="form-control" name="class_id">
            <option value="">Select a class</option>
            @foreach ($classess as $class)
              <option {{ (old('class_id')==$class->id) ? 'selected':''}} value="{{$class->id}}">{{$class->getFormattedStartDate()}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="course_id" class="col-sm-2 col-form-label">Trainer:</label>
        <div class="col-sm-10">
          <select id="user_id" class="form-control" name="user_id">
            <option value="">Select a class</option>
            @foreach ($trainers as $trainer)
              <option {{ (old('user_id')==$trainer->id) ? 'selected':''}} value="{{$trainer->id}}">{{$trainer->getFullname()}}</option>
            @endforeach
          </select>
        </div>
      </div>



      <div class="form-group row float-right mt-3 p-3">
        <input class="btn btn-secondary px-5" type="submit" value="Add">
      </div>


    </form>
  </div>

@endsection
