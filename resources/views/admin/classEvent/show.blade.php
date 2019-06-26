@extends('layouts.adminLayout')
@section('title', 'Classes')
@section('content')

<div id="app">
  <assignment-component :class_id={{$class->id}}></assignment-component>
</div>


@endsection

@push('js')
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/vueApp.js') }}"></script>
@endpush