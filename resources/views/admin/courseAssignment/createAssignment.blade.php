@extends('layouts.adminLayout')

@section('content')
  <div class="container p-sm-0 px-md-5 ">
    <h1 class="mb-5">New Course Assignment</h1>

      <form class="" action="/admin/assignments" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}

      <div class="form-group row">
        <label for="title" class="col-sm-2 col-form-label">Course:</label>
        <div class="col-sm-10">
          <select class="form-control" name="course_id">
            <option value="">Select a course</option>
            @foreach ($courses as $course)
              <option {{ (old('course_id')==$course->id) ? 'selected':''}} value="{{$course->id}}">{{$course->title}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="title" class="col-sm-2 col-form-label">Title:</label>
        <div class="col-sm-10">
          <input name="title" type="text" class="form-control" id="title" value="{{ old('title') }}" placeholder="Title">
        </div>
      </div>

      <div class="form-group row">
        <label for="title" class="col-sm-2 col-form-label">Type:</label>
        <div class="col-sm-10">
          <select class="form-control" name="type">
            <option value="">Select assignment type</option>
            <option {{ (old('type')=='pre') ? 'selected':''}} value="pre">Pre Course</option>
            <option {{ (old('type')=='onSite') ? 'selected':''}} value="onSite">onSite</option>
            <option {{ (old('type')=='post') ? 'selected':''}} value="post">Post Course</option>
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="textareaEditor" class="col-sm-2 col-form-label">Description:</label>
        <div class="col-sm-10">
          <textarea id="textareaEditor" class="form-control" name="description" rows="8" cols="80">{!! old('description') !!}</textarea>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Course Downloads:</label>
        <div class="col-sm-10">
          <div class="">
            <input name="file" type="file" class="" id="" >
          </div>
        </div>
      </div>

      <div class="form-group row float-right mt-3 p-3">
        <input class="btn btn-secondary px-5" type="submit" value="Add">
      </div>


    </form>
  </div>

@endsection
