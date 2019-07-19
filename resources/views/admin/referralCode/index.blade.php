@extends('layouts.adminLayout')
@section('title', 'Referral Codes')
@section('content')
<div id="app">
    <referralcode-component></referralcode-component>

</div>
@endsection

@push('js')
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/vueApp.js') }}"></script>
@endpush
