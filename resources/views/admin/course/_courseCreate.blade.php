@extends('layouts.adminLayout')

@section('content')
  <div class="container p-sm-0 px-md-5 ">
    <h1 class="mb-5">New Course</h1>

      <form class="" action="{{route('storeCourse')}}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}

      <div class="form-group row">
        <label for="title" class="col-sm-2 col-form-label">Title:</label>
        <div class="col-sm-10">
          <input name="title" type="text" class="form-control" id="title" value="{{ old('title') }}" placeholder="Title">
        </div>
      </div>
      <div class="form-group row">
        <label for="type" class="col-sm-2 col-form-label">Type:</label>
        <div class="col-sm-10">
          <select class="form-control" name="type" id="type">
            <option {{ (old('description')=='course') ? 'selected' : '' }} value="course">Course</option>
            <option {{ (old('description')=='conference') ? 'selected' : '' }} value="conference">Conference</option>
            <option {{ (old('description')=='refresher') ? 'selected' : '' }} value="refresher">Refresher</option>
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label" >Description:</label>
        <div class="col-sm-10">
          <textarea id="description" class="form-control" name="description" rows="8" cols="80">{{ old('description') }}</textarea>
        </div>
      </div>

      <div class="form-group row">
        <label for="textareaEditor" class="col-sm-2 col-form-label">Body:</label>
        <div class="col-sm-10">
          <textarea id="textareaEditor" class="form-control" name="body" rows="8" cols="80">{{ old('body') }}</textarea>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Course Downloads:</label>
        <div class="col-sm-10">
          <div class="">
            <input name="file" type="file" class="" id="validatedCustomFile" >

          </div>
        </div>
      </div>

      <div class="form-group row float-right mt-3 p-3">
        <input class="btn btn-secondary px-5" type="submit" value="Add">
      </div>


    </form>
  </div>

@endsection
