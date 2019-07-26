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
    <div class="container ">
        <section>
            {!! html_entity_decode($courseType->body)!!}

        </section>
    </div>

    <div class="container my-3 row mx-auto">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header text-center">
                    <h2>content</h2>

                </div>
                <div class="card-body">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos ratione non nemo at, voluptatem,
                    libero provident tempora atque
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
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos ratione non nemo at, voluptatem,
                    libero provident tempora atque
                    ex eum voluptas ipsum molestias suscipit nesciunt commodi cupiditate placeat eaque quo?
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h2 class="display-4">Courses</h2>
        <div class="row mx-auto">
            @foreach ($courseType->courses as $course)
            @if ($course->isPublic())


            <div class="card m-2" style="width: 18rem; ">
                <img style="height: 13rem;" class="card-img-top" src="{{$course->getImage()}}" alt="Card image cap">
                <div class="card-body">
                    <div class="card-title">
                        <h2>{{$course->title}}</h2>
                    </div>
                    <div class="card-text">
                        <p>
                            {{ str_limit($course->description, $limit = 150, $end = '...') }}<a href=""> find more</a>
                        </p>
                    </div>

                </div>
                <div class="card-footer">

                    <a href="{{route('course', [$courseType->slug, $course->slug])}}" class="btn btn-info col-12">Full
                        Info</a>
                </div>
            </div>
            @endif
            @endforeach
        </div>

        <hr>

    </div>
    <!-- /container -->

</main>
@endsection
