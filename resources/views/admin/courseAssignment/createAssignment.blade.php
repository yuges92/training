@extends('layouts.adminLayout')
@section('title', 'New Assignment')

@section('content')
  <div class="">

    <div class="col-12 row mx-auto">
        <div class=" col-md-8">
          <div class="box">
            <div class="box-body">

      <form class="" action="/admin/assignments" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}

      <div class="form-group row">
          <label for="course" class="col-sm-2 col-form-label">Course:</label>
          <div class="col-sm-10">
            <select id="course" class="form-control select2" name="course_id">
              <option value="">Select a course</option>
              @foreach ($courses as $course)
              <option {{ (old('course_id')==$course->id) ? 'selected':$course_id==$course->id ? 'selected' :''}}
                value="{{$course->id}}">{{$course->title}}</option>
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
            <option {{ (old('type')=='onSite') ? 'selected':''}} value="onSite">Class Room Work</option>
            <option {{ (old('type')=='post') ? 'selected':''}} value="post">Post Course</option>
          </select>
        </div>
      </div>

      <div class="form-group row float-right mt-3 p-3">
        <input class="btn btn-primary px-5" type="submit" value="Add">
      </div>


    </form>
  </div>
</div>
</div>
</div>
</div>

@endsection
