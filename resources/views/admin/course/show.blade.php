@extends('layouts.adminLayout') 
@section('title', $course->title) 
@section('content')
<div class="my-2 container-fluid">
    <a class="btn btn-info" href="{{route('createCourse')}}"> <i class="fas fa-plus"></i> Add Class</a>
    <a class="btn btn-info" href="{{route('createCourse')}}"> <i class="fas fa-plus"></i> Classes</a>
    <a class="btn btn-info" href="{{route('createCourse')}}"> <i class="fas fa-plus"></i> Assignments</a>
    <a class="btn btn-info" href="{{route('createCourse')}}"> <i class="fas fa-plus"></i> Add new course body</a>

    <a class="btn btn-info btn-lg rounded" href="{{route('editCourse', $course->id)}}">
        <i class="col-12 fas fa-edit fa-5x"></i> 
        <span class="col-12">Edit</span>
    </a>
</div>


{{--
<div class="col-12">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">

            <li><a href="#detail" data-toggle="tab" class="active" aria-expanded="true">Info </a></li>
            <li><a href="#additionalDetail" data-toggle="tab" class="" aria-expanded="false">Additional Details</a></li>
            <li><a href="#addresses" data-toggle="tab" class="" aria-expanded="false">Addresses</a></li>
            <li><a href="#bookings" data-toggle="tab" class="" aria-expanded="false">Bookings</a></li>
            <li><a href="#gdpr" data-toggle="tab" class="" aria-expanded="false">GDPR</a></li>
            <li><a href="#courses" data-toggle="tab" class="" aria-expanded="false">Courses</a></li>
        </ul>

        <div class="tab-content">

            <div class="tab-pane active" id="detail" aria-expanded="false">
                <div class="  ">
                    <div class=" ">
                        <form class="" action="{{route('storeCourse')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-12 row mx-auto">

                                <div class=" col-md-8">
                                    <div class="box">
                                        <div class="box-body">

                                            <div class="form-group row">
                                                <label for="title" class="col-sm-2 col-form-label">Title: </label>
                                                <div class="col-sm-10">
                                                    <input name="title" type="text" class="form-control" id="title" value="{{ $course->title }}" placeholder="Title">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="course_code" class="col-sm-2 col-form-label">Course Code: </label>
                                                <div class="col-sm-10">
                                                    <input name="course_code" type="text" class="form-control" id="course_code" value="{{ $course->course_code }}" placeholder="Course Code">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="course_type_id" class="col-sm-2 col-form-label">Course Type: </label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="course_type_id" id="course_type_id">
                                                                <option value="">Please select a course type</option>
                                                                    @if (isset($courseTypes))
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
                                                    <textarea id="description" class="form-control" name="description" rows="4" cols="80" maxlength="300">{{$course->description }}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="textareaEditor" class="col-sm-2 col-form-label">Body:</label>
                                                <div class="col-sm-10">
                                                    <textarea id="ckEditor" class="form-control summernote" name="body" rows="8" cols="80">{{ $course->body }}</textarea>
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
                                                                <option {{ ($course->status=='publish') ? 'selected' : '' }} value="publish">Publish</option>
                                                                <option {{ ($course->status=='draft') ? 'selected' : '' }} value="draft">Draft</option>
                                                                <option {{ ($course->status=='private') ? 'selected' : '' }} value="private">private</option>
                                                            </select>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <div class="col">
                                                    <input name="enable_megamenu" type="checkbox" id="enable_megamenu" class="filled-in chk-col-blue" {{$course->enable_megamenu==1
                                                    ? 'checked':''}} value="1">
                                                    <label for="enable_megamenu">Display on MegaMenu</label>
                                                </div>
                                            </div>

                                            <div class="form-group" id="passwordDiv">
                                                <label for="position" class="col-sm-2 col-form-label">Position:</label>
                                                <div class="col">
                                                    <div class="">
                                                        <input name="position" type="number" class="form-control" id="position" value="{{ $course->position }}" placeholder="Position">
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="form-group" id="passwordDiv" style="display:none">
                                                <label for="password" class="col-sm-2 col-form-label">Password:</label>
                                                <div class="col">
                                                    <div class="">
                                                        <input name="password" type="text" class="form-control" id="password" value="{{ $course->password }}" placeholder="Password">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="inputPassword" class="col-sm-2 col-form-label">Image:</label>
                                                <div class="col">
                                                    <div class="">

                                                        <input type="file" name="image" class="dropify" data-min-height="200" data-min-width="300" data-default-file="{{ $course->getImage() }}"
                                                            data-allowed-file-extensions="png JPEG jpg" data-max-file-size="1MB">

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
                </div>
            </div>

        </div>
    </div>
</div> --}}
@endsection