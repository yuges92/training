@extends('layouts.adminLayout')

@section('content')
  <div class="container p-sm-0 px-md-5 ">
    <h1 class="mb-5">Edit Course</h1>
    <form class="" action="{{route('updateCourse',[$course->slug])}}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      @method('PUT')
      <div class="form-group row">
        <label for="title" class="col-sm-2 col-form-label">Title:</label>
        <div class="col-sm-10">
          <input name="title" type="text" class="form-control" id="title" value="{{$course->title}}" placeholder="Title">
        </div>
      </div>

      <div class="form-group row">
        <label for="type" class="col-sm-2 col-form-label">Type:</label>
        <div class="col-sm-10">
          <select class="form-control" name="type" id="type">
            <option {{($course->type=="course") ? 'selected' :''}} value="course">Course</option>
            <option {{($course->type=="conference") ? 'selected' :''}} value="conference">Conference</option>
            <option {{($course->type=="refresher") ? 'selected' :''}} value="refresher">Refresher</option>
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Description:</label>
        <div class="col-sm-10">
          <textarea class="form-control" name="description" rows="8" cols="80">{{$course->description}}</textarea>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Body:</label>
        <div class="col-sm-10">
          <textarea id="textareaEditor" class="form-control" name="body" rows="8" cols="80">{{$course->body}}</textarea>
        </div>
      </div>



      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Course Downloads:</label>
        <div class="col-sm-10">
          @if (Storage::disk('public')->exists($course->file))
            <div class="mb-3" id="fileDiv">
              <a href="{{Storage::url($course->file)}}" class="btn btn-info">{{$course->originFileName}}</a>
              <button class="btn btn-danger"type="button" name="button" id="removeFileBtn" onclick="">Remove File</button>
              <input name="oldFile" type="hidden" value="1">
            </div>
          @endif

          <div class="" {{Storage::disk('public')->exists($course->file) ? 'hidden':''}} id="fileUploadDiv">
            <div class="">
              <input name="file" type="file" class="" id="" >
            </div>
          </div>

        </div>
      </div>

      <div class="form-group row float-right mt-3 p-3">
        <input class="btn btn-secondary px-5" type="submit" value="Update">
      </div>


    </form>
  </div>

@endsection
