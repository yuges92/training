@extends('layouts.app') 
@section('content')
<main role="main">

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron mb-0">
        <div class="container">
            <h1 class="display-3">{{$courseType->title}}</h1>
            <p>{{$courseType->description}}</p>
        </div>
    </div>

    <div class="container my-3 row mx-auto">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header text-center">
                    <h2>content</h2>

                </div>
                <div class="card-body">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos ratione non nemo at, voluptatem, libero provident tempora atque
                    ex eum voluptas ipsum molestias suscipit nesciunt commodi cupiditate placeat eaque quo?
                </div>
            </div>
        </div>
        <div class="col-md-6">

            <div class="card">
                <div class="card-header text-center">
                    <h2>content</h2>

                </div>
                <div class="card-body">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos ratione non nemo at, voluptatem, libero provident tempora atque
                    ex eum voluptas ipsum molestias suscipit nesciunt commodi cupiditate placeat eaque quo?
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h2 class="display-4">Courses</h2>
        <div class="row mx-auto">
            @foreach ($courseType->courses as $course)

            <div class="card mx-auto mx-md-0" style="width: 18rem;">
                <img class="card-img-top h-50" src="//imgplaceholder.com/420x320/ff7f7f/333333/fa-image" alt="Card image cap">
                <div class="card-body">
                    <div class="card-title">
                        <h2>{{$course->title}}</h2>
                    </div>
                    <div class="card-text">
                        <p>{{$course->description}}</p>
                    </div>

                </div>
                <div class="card-footer">
                    <a href="{{route('course', [$courseType->slug, $course->slug])}}" class="btn btn-info col-12">Full Info</a>
                </div>
            </div>
            @endforeach
        </div>

        <hr>

    </div>
    <!-- /container -->

</main>
@endsection