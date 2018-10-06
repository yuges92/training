@extends('layouts.adminLayout')

@section('content')
  <div class="container p-sm-0 px-md-5 ">
    <h1 class="mb-5">Edit Course Assignment</h1>

    <form class="" action="{{route('assignments.update', [$assignment->id])}}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      @method('PUT')

      <div class="form-group row">
        <label for="title" class="col-sm-2 col-form-label">Course:</label>
        <div class="col-sm-10">
          <select class="form-control" name="course_id">
            <option value="">Select a course</option>
            @foreach ($courses as $course)
              <option {{ ($assignment->course_id==$course->id) ? 'selected':''}} value="{{$course->id}}">{{$course->title}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="title" class="col-sm-2 col-form-label">Title:</label>
        <div class="col-sm-10">
          <input name="title" type="text" class="form-control" id="title" value="{{ $assignment->title }}" placeholder="Title">
        </div>
      </div>

      <div class="form-group row">
        <label for="title" class="col-sm-2 col-form-label">Type:</label>
        <div class="col-sm-10">
          <select class="form-control" name="type">
            <option value="">Select assignment type</option>
            <option {{ ($assignment->type=='pre') ? 'selected':''}} value="pre">Pre Course</option>
            <option {{ ($assignment->type=='onSite') ? 'selected':''}} value="onSite">onSite</option>
            <option {{ ($assignment->type=='post') ? 'selected':''}} value="post">Post Course</option>
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="textareaEditor" class="col-sm-2 col-form-label">Description:</label>
        <div class="col-sm-10">
          <textarea id="textareaEditor" class="form-control" name="description" rows="8" cols="80">{!! $assignment->description !!}</textarea>
        </div>
      </div>



      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Course Downloads:</label>
        <div class="col-sm-10">
          @if (Storage::disk('public')->exists($assignment->file))
            <div class="mb-3" id="fileDiv">
              <a href="{{Storage::url($assignment->file)}}" class="btn btn-info">{{$assignment->originFileName}}</a>
              <button class="btn btn-danger"type="button" name="button" id="removeFileBtn" onclick="">Remove File</button>
              <input name="oldFile" type="hidden" value="1">
            </div>
          @endif

          <div class="" {{Storage::disk('public')->exists($assignment->file) ? 'hidden':''}} id="fileUploadDiv">
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
