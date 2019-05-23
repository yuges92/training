@extends('layouts.adminLayout') 
@section('title', $course->title) 
@section('content') 
<div id="app">
    <course-component :course_id={{ $course->id}}></course-component>
</div>
@endsection

@push('js')
<script src="{{ asset('js/app.js') }}"></script>

<script src="{{asset('js/course.js')}}"></script>
@endpush
