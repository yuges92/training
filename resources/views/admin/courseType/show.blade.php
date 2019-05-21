@extends('layouts.adminLayout') 

@push('css')

@endpush
@section('title', 'New Course Type')
    
@section('content')
<div class="container-fluid p-sm-0 px-md-5 ">
  <form class="" action="{{route('storeCourse')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="col-12 row mx-auto">

      
      
      <div class=" col-md-8">
        <div class="box">
          <div class="box-body">

        <div class="form-group row">
          <label for="title" class="col-sm-2 col-form-label">Title:</label>
          <div class="col-sm-10">
            <input name="title" type="text" class="form-control" id="title" value="{{ old('title') }}" placeholder="Title">
          </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Aims:</label>
            <div class="col-sm-10">
              <textarea id="description" class="form-control" name="description" rows="8" cols="80">{{ old('description') }}</textarea>
            </div>
          </div>


        <div class="form-group row">
          <label for="description" class="col-sm-2 col-form-label">Description:</label>
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
            <label for="inputPassword" class="col-sm-2 col-form-label">Image:</label>
            <div class="col-sm-10">
              <div class="">
                <input name="file" type="file" class="" id="validatedCustomFile">
  
              </div>
            </div>
          </div>

        <div class="form-group row">
          <label for="inputPassword" class="col-sm-2 col-form-label">Course Downloads:</label>
          <div class="col-sm-10">
            <div class="">
              <input name="file" type="file" class="" id="validatedCustomFile">

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
      <div class="col-md-4 fixed ">
        <div class="box">
          <div class="box-header">

            <h2>Settings</h2>
          </div>
          <div class="box-body">

            <div class="form-group ">
              <label for="type" class="col col-form-label">Publish:</label>
              <div class="col">
                <select class="form-control" name="type" id="type">
                  <option {{ (old('description')=='course') ? 'selected' : '' }} value="course">Publish</option>
                  <option {{ (old('description')=='conference') ? 'selected' : '' }} value="conference">Draft</option>
                  <option {{ (old('description')=='refresher') ? 'selected' : '' }} value="refresher">private</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group row float-right mt-3 p-3">
              <button class="btn btn-success rounded px-5" type="submit"><i class="far fa-save fa-2x"></i> Save</button>
            </div>
        </div>
      </div>
    </div>




  </form>
</div>
@endsection

@push('js')
    
@endpush

