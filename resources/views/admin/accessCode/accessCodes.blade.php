@extends('layouts.adminLayout')

@section('content')
  <h1>Access Codes</h1>
  <div class="my-2">
    <a class="btn btn-info" href="{{route('accessCode.create')}}">Add New</a>
  </div>
  @if (count($accessCodes)>0)
  <table class="table table-hover table-responsive-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($accessCodes as $accessCode)

        <tr>
          <th scope="row">{{$accessCode->id}}</th>
          <td class="">
            <a class="btn btn-success mr-1" href="{{route('classAddress.edit', $accessCode->id)}}">Edit</a>
          </td>
          <td class="">
            <form class="deleteForm" action="{{route('classAddress.destroy',$accessCode->id)}}" method="post">
              {{ csrf_field() }}
              @method('Delete')
              <input class="btn btn-danger" type="submit" value="Delete">
            </form>
          </td>
          </tr>
        @endforeach

      </tbody>
    </table>
  @else
    <div class="text-center">

      <span class="text-danger">No courses found!</span>
    </div>
  @endif

  @endsection
