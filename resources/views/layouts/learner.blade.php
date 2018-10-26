@extends('layouts.master')
@push('css')
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endpush
@section('body')
  <div class="learnerMain">
    @include('layouts.learnerSideNavBar')
    <div class="mainContents">
      @include('includes.messages')

      @yield('content')
    </div>
  </div>

@endsection

@push('js')
  <script src="{{ asset('js/app.js') }}" defer></script>

@endpush
