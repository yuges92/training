@extends('layouts.adminLayout') @push('css') 
@endpush 
@section('title', 'New Course') 
@section('content')
<div class="container-fluid p-sm-0 px-md-5 ">
    {{--
    <div class="my-3 container">
        <button class="btn btn-success" id="addBodyContent"> <i class="fas fa-plus"></i> Add body content</button>
    </div> --}}
    <form class="" action="{{route('storeCourse')}}" method="post" enctype="multipart/form-data">
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
                                <label for="course_code" class="col-sm-2 col-form-label">Course Code: </label>
                                <div class="col-sm-10">
                                    <input name="course_code" type="text" class="form-control" id="course_code" value="{{ old('course_code') }}" placeholder="Course Code">
                                </div>
                            </div>

                        <div class="form-group row">
                            <label for="course_type_id" class="col-sm-2 col-form-label">Course Type: </label>
                            <div class="col-sm-10">
                                <select class="form-control" name="course_type_id" id="course_type_id">
                                    <option value="">Please select a course type</option>
                                        @if ($courseTypes)
                                        @foreach ($courseTypes as $courseType)
                                        <option {{ (old('course_type_id')==$courseType->id) ? 'selected' : '' }} value="{{$courseType->id}}">{{$courseType->title}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label" data-toggle="tooltip" data-placement="top" title="Add course type description eg: "> Short Description:</label>
                            <div class="col-sm-10">
                                <textarea id="description" class="form-control" name="description" rows="4" cols="80" maxlength="300">{{ old('description') }}</textarea>
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <label for="textareaEditor" class="col-sm-2 col-form-label">Body:</label>
                            <div class="col-sm-10">
                                <textarea id="ckEditor" class="form-control summernote" name="body" rows="8" cols="80">{{ old('body') }}</textarea>
                            </div>
                        </div> --}}


                        {{--
                        <div class="form-group row" id="bodyDiv">
                            <label for="textareaEditor" class="col-sm-2 col-form-label">Content:</label>
                            <div class="col-sm-10">
                                <div class="card">
                                    <div class="card-header">
                                        <input name="contenTitle[]" type="text" class="form-control" id="title" value="{{ old('title') }}" placeholder="Title">
                                    </div>
                                </div>
                                <textarea id="ckEditor" class=" summernote" name="content[]" rows="8" cols="80">{{ old('body') }}</textarea>
                            </div>
                        </div> --}} {{--
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Course Type Document:</label>
                            <div class="col-sm-10">
                                <div class="">
                                    <input type="file" name="document" class="dropify" data-min-height="200" data-min-width="300" data-allowed-file-extensions="pdf doc docx ">
                                </div>
                            </div>
                        </div> --}}
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
                                    <option {{ (old('status')=='password_protected') ? 'selected' : '' }} value="password_protected">Password Protected</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group ">
                                <div class="col">
                                  <input name="enable_megamenu" type="checkbox" id="enable_megamenu" class="filled-in chk-col-blue" checked="" value="1">
                                  <label for="enable_megamenu">Display on MegaMenu</label>
                                </div>
                              </div>

                              <div class="form-group" >
                                    <label for="position" class="col-sm-2 col-form-label">Position:</label>
                                    <div class="col">
                                        <div class="">
                                            <input name="position" type="number" class="form-control" id="position" value="{{ old('position') }}" placeholder="Position">
                                        </div>
                                    </div>
                                </div>

                              

                        <div class="form-group" id="passwordDiv" style="{{ (old('status')=='password_protected') ? '' : 'display:none' }}">
                            <label for="password" class="col-sm-2 col-form-label">Password:</label>
                            <div class="col">
                                <div class="">
                                    <input name="password" type="text" class="form-control" id="password" value="{{ old('password') }}" placeholder="Password">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Image:</label>
                            <div class="col">
                                <div class="">
                                    <input type="file" name="image" class="dropify" data-min-height="200" data-min-width="300" data-allowed-file-extensions="png JPEG jpg"
                                        data-max-file-size="1MB">
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
        height: 300,
        codemirror: { // codemirror options
    theme: 'monokai'
}
      });

$('#addBodyContent').on('click', function(){
    $("#bodyDiv").clone().insertAfter("div#bodyDiv:last");

});

$('#status').change(function () { 
   if($(this).val()=='password_protected'){
$('#passwordDiv').show();
   }else{
$('#passwordDiv').hide();

   }    
});
      
});

</script>

@endpush