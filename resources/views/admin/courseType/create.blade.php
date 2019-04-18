@extends('layouts.adminLayout') @push('css') 
@endpush 
@section('title', 'New Course Type') 
@section('content')
<div class="container-fluid p-sm-0 px-md-5 ">
  <form class="" action="{{route('courseTypes.store')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="col-12 row mx-auto">

      <div class=" col-md-8">
        <div class="box">
          <div class="box-body">

            <div class="form-group row">
              <label for="title" class="col-sm-2 col-form-label">Title: </label>
              <div class="col-sm-10">
                <input name="title" type="text" class="form-control" id="title" value="{{ old('title') }}" placeholder="Title">
              </div>
            </div>

            <div class="form-group row">
              <label for="description" class="col-sm-2 col-form-label" data-toggle="tooltip" data-placement="top" title="Add course type description eg: "> Short Description:</label>
              <div class="col-sm-10">
                <textarea id="description" class="form-control" name="description" rows="4" cols="80" maxlength="300">{{ old('description') }}</textarea>
              </div>
            </div>


            <div class="form-group row">
              <label for="textareaEditor" class="col-sm-2 col-form-label">Body:</label>
              <div class="col-sm-10">
                <textarea id="ckEditor" class="form-control summernote" name="body" rows="8" cols="80">{{ old('body') }}</textarea>
              </div>
            </div>

            <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">Course Type Document:</label>
              <div class="col-sm-10">
                <div class="">
                  <input type="file" name="document" class="dropify" data-min-height="200" data-min-width="300" data-allowed-file-extensions="pdf doc docx " multiple data-multiple>
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
              <label for="status" class="col col-form-label">Publish:</label>
              <div class="col">
                <select class="form-control" name="status" id="status">
                  <option {{ (old('status')=='publish') ? 'selected' : '' }} value="publish">Publish</option>
                  <option {{ (old('status')=='draft') ? 'selected' : '' }} value="draft">Draft</option>
                  <option {{ (old('status')=='private') ? 'selected' : '' }} value="private">private</option>
                </select>
              </div>
            </div>

            <div class="form-group">
                <label for="inputPassword" class="col-sm-2 col-form-label">Image:</label>
                <div class="col">
                  <div class="">
                    <input type="file" name="image" class="dropify" data-min-height="200" data-min-width="300" data-allowed-file-extensions="png JPEG jpg" data-max-file-size="1MB">
                  </div>
                </div>
              </div>
          </div>
          <div class="form-group row float-right mt-3 p-3">
            <button class="btn btn-success rounded px-5" type="submit"><i class="far fa-save "></i> Save</button>
          </div>
        </div>
      </div>
    </div>


  </form>
</div>

<div id="summernote"></div>
@endsection
 @push('js')
<script>

document.addEventListener("DOMContentLoaded", function(event) { 
  $('.summernote').summernote({
        placeholder: '',
        tabsize: 2,
        height: 300
      });

      
});
</script>

@endpush