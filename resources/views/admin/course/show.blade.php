@extends('layouts.adminLayout') 
@section('title', $course->title) 
@section('content') {{--
<div class="my-2 container-fluid d-flex justify-content-around">

    <a class="btn btn-info btn-lg rounded" href="{{route('editCourse', $course->id)}}">
        <i class="col-12 fas fa-edit  fa-5x"></i> 
        <span class="col-12">Edit</span>
    </a>
    <a class="btn btn-info btn-lg rounded" href="{{route('editCourse', $course->id)}}">
        <i class="col-12 fa fa-calendar fa-5x"></i>
        <span class="col-12">Classes</span>
    </a>
    <a class="btn btn-info btn-lg rounded" href="{{route('editCourse', $course->id)}}">
        <i class="col-12 fa fa-tasks fa-5x"></i>
        <span class="col-12">Assignments</span>
    </a>
    <a class="btn btn-info btn-lg rounded" href="{{route('editCourse', $course->id)}}">
        <i class="col-12 fas fa-paragraph fa-5x"></i>
        <span class="col-12">Course body content</span>
    </a>
    <a class="btn btn-info btn-lg rounded" href="{{route('editCourse', $course->id)}}">
        <i class="col-12 fas fa-edit fa-5x"></i> 
        <span class="col-12">Edit</span>
    </a>
</div> --}}



<div class="col-12">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">

            <li><a href="#detail" data-toggle="tab" class="active" aria-expanded="true">Course Detail </a></li>
            <li><a href="#content" data-toggle="tab" class="" aria-expanded="false">Course Content</a></li>
            <li><a href="#assignments" data-toggle="tab" class="" aria-expanded="false">Assignments</a></li>
            <li><a href="#classes" data-toggle="tab" class="" aria-expanded="false">Classes</a></li>
        </ul>

        <div class="tab-content">

            <div class="tab-pane active" id="detail" aria-expanded="false">
                <div class="  ">
                    <div class=" ">
                        <form class="" action="{{route('updateCourse', $course->id)}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }} @method('PUT')
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
                                                      @if (($courseTypes))
                                                      @foreach ($courseTypes as $courseType)
                                                      <option {{ ($course->course_type_id==$courseType->id) ? 'selected' : '' }} value="{{$courseType->id}}">{{$courseType->title}}</option>
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
                                            <button class="btn btn-success rounded px-5" type="submit"><i class="far fa-save "></i> Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>

            <div class="tab-pane " id="content" aria-expanded="false">
                Course Content
            </div>

            <div class="tab-pane " id="assignments" aria-expanded="false">
                Course Documents
            </div>

            <div class="tab-pane " id="classes" aria-expanded="false">
                @if ($classes= $course->classes)
                <div class="p-2">
                    <div class="">
                        <div>

                            <a class="btn btn-info" href="{{route('editCourse', $course->id)}}">
                                    <i class="fas fa-plus"></i>
                                    <span class="">Add</span>
                                </a>
                        </div>
                        <table class="table table-hover table-responsive-sm dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Start Date</th>
                                    {{--
                                    <th scope="col">End Date</th> --}}
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($classes as $class)

                                <tr>
                                    <th scope="row">{{$class->id}}</th>
                                    <td>{{$class->title}}</td>
                                    <td>{{$class->getFormattedStartDate()}}</td>
                                    {{--
                                    <td>{{$class->endDate->format('j F Y')}}</td> --}}
                                    <td class="row"><a class="btn btn-success mr-1" href="{{route('class.show', $class->id)}}">Edit</a>
                                        <form class="deleteForm" action="{{route('class.destroy',[$class->id])}}" method="post">
                                            {{ csrf_field() }} @method('Delete')
                                            <input class="btn btn-danger" type="submit" value="Delete">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

                @else
                <div class="text-center">

                    <span class="text-danger">No courses found!</span>
                </div>
                @endif
            </div>

        </div>
    </div>
</div>
@endsection