@extends('layouts.adminLayout')
@section('title', 'Assignments')
@section('content')

<div id="app">
    <div class="d-flex justify-content-start row mx-auto">
        <a href="/admin/users" class="custom-icon-card mx-auto">
          <div class="card-body mx-auto text-center">
              <h5 class="card-title">All Assignments</h5>
            <i class="far fa-list-alt custom-icon"></i>
          </div>
        </a>
        
        <a href="/admin/learners" class="custom-icon-card mx-auto">
          <div class="card-body mx-auto text-center">
              <h5 class="card-title">Add New Assignment</h5>
            <i class="fas fa-plus custom-icon"></i>
          </div>
        </a>

        <a href="/admin/learners" class="custom-icon-card mx-auto">
            <div class="card-body mx-auto text-center">
                <h5 class="card-title">All Assignment Criterias</h5>
              <i class="fas fa-tasks custom-icon"></i>
            </div>
          </a>
        
          <a href="/admin/learners" class="custom-icon-card mx-auto">
            <div class="card-body mx-auto text-center">
                <h5 class="card-title">Add Assignment Criteria</h5>
              <i class="fas fa-plus custom-icon"></i>
            </div>
          </a>    
        
        </div>
</div>


@endsection

@push('js')
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/vueApp.js') }}"></script>
@endpush