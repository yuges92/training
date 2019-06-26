@extends('layouts.adminLayout')
@section('title', 'Course Assignment')
@section('content')

<div id="app">
  <class-component :assignment_id={{$assignment->id}} :course_id={{$assignment->course_id}}></class-component>
</div>


@endsection

@push('js')
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/vueApp.js') }}"></script>
@endpush