@extends('layouts.master')
@push('css')
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endpush
@section('body')
  <header>
    <a class="btn-brand" href="{{ url('/') }}">
      {{ config('app.name', 'Laravel') }}
    </a>
  </header>
  <main class="learnerMainsss">
    @include('layouts.learnerSideNavBar')
    <div class="mainContents">
      @include('includes.messages')

      @yield('content')
    </div>
  </main>

@endsection

@push('js')
  <script src="{{ asset('js/app.js') }}" defer></script>

@endpush
