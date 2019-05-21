@extends('layouts.master')
@push('css')
<style>
  body{
    min-height: 100vh;
  }
    .footer {
      position: relative;
    bottom: 0;
    left: 0;
    right: 0;
    height:100px;
    background:#ccc;
    }
    </style>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

@endpush


@section('body')
  @include('includes.topNav')
  @include('includes.navBar')
  @include('includes.messages')

  @yield('content')

<footer class="footer">

  <div class="jumbotron mb-0">
    <div class="container">
      <h1 class="display-3">Footer</h1>
      <p></p>
    </div>
  </div>
</footer>
@endsection


@push('js')
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{ asset('js/lms.js') }}" defer></script>
@endpush
