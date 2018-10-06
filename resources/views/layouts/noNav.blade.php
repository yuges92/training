@extends('layouts.master')
@push('css')
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

@endpush


@section('body')
  @include('includes.messages')

  @yield('content')

@endsection

@push('js')
  <script src="{{ asset('js/app.js') }}" defer></script>

@endpush
