@extends('layouts.master')
@push('css')
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

@endpush


@section('body')
  @include('includes.topNav')
  @include('includes.navBar')
  @include('includes.messages')

  @yield('content')

@endsection

@push('js')
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{ asset('js/lms.js') }}" defer></script>
@endpush
