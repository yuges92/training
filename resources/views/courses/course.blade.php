@extends('layouts.app') 
@section('content')
<div class="">
  <div class="jumbotron mb-0">
    <div class="container">
      <h1 class="display-3">{{$course->title}}</h1>
      <p>{{$course->description}}</p>
    </div>
  </div>

  <div class="container">
    <h2>Pre-requisites </h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
      Perspiciatis optio vero velit aliquid accusantium adipisci sit animi fugiat, 
      ipsa maxime temporibus? Dolores esse doloribus laboriosam dolore inventore fugit sit porro!
      Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
      Corporis nisi eveniet aut maiores harum doloremque delectus, cupiditate unde pariatur tenetur, 
      a mollitia, hic sed voluptates consequatur ab magni similique! Ullam.
      <ul>
        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia dolor repellat in perferendis eaque maxime nihil quidem ullam atque neque. </li>
        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia dolor repellat in perferendis eaque maxime nihil quidem ullam atque neque. </li>
        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia dolor repellat in perferendis eaque maxime nihil quidem ullam atque neque. </li>
        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia dolor repellat in perferendis eaque maxime nihil quidem ullam atque neque. </li>
        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia dolor repellat in perferendis eaque maxime nihil quidem ullam atque neque. </li>
      </ul>
    </p>
  </div>
  <div class="container">
    <h2>learning outcome </h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
        Perspiciatis optio vero velit aliquid accusantium adipisci sit animi fugiat, 
        ipsa maxime temporibus? Dolores esse doloribus laboriosam dolore inventore fugit sit porro!
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
        Corporis nisi eveniet aut maiores harum doloremque delectus, cupiditate unde pariatur tenetur, 
        a mollitia, hic sed voluptates consequatur ab magni similique! Ullam.
        <ul>
          <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia dolor repellat in perferendis eaque maxime nihil quidem ullam atque neque. </li>
          <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia dolor repellat in perferendis eaque maxime nihil quidem ullam atque neque. </li>
          <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia dolor repellat in perferendis eaque maxime nihil quidem ullam atque neque. </li>
          <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia dolor repellat in perferendis eaque maxime nihil quidem ullam atque neque. </li>
          <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia dolor repellat in perferendis eaque maxime nihil quidem ullam atque neque. </li>
        </ul>
      </p>
  </div>

  <div class="container">
    <h2>who the course is aimed at </h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
        Perspiciatis optio vero velit aliquid accusantium adipisci sit animi fugiat, 
        ipsa maxime temporibus? Dolores esse doloribus laboriosam dolore inventore fugit sit porro!
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
        Corporis nisi eveniet aut maiores harum doloremque delectus, cupiditate unde pariatur tenetur, 
        a mollitia, hic sed voluptates consequatur ab magni similique! Ullam.
        <ul>
          <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia dolor repellat in perferendis eaque maxime nihil quidem ullam atque neque. </li>
          <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia dolor repellat in perferendis eaque maxime nihil quidem ullam atque neque. </li>
          <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia dolor repellat in perferendis eaque maxime nihil quidem ullam atque neque. </li>
          <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia dolor repellat in perferendis eaque maxime nihil quidem ullam atque neque. </li>
          <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia dolor repellat in perferendis eaque maxime nihil quidem ullam atque neque. </li>
        </ul>
      </p>
  </div>

  <div class="container">
    <h2>assignment requirements </h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
        Perspiciatis optio vero velit aliquid accusantium adipisci sit animi fugiat, 
        ipsa maxime temporibus? Dolores esse doloribus laboriosam dolore inventore fugit sit porro!
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
        Corporis nisi eveniet aut maiores harum doloremque delectus, cupiditate unde pariatur tenetur, 
        a mollitia, hic sed voluptates consequatur ab magni similique! Ullam.
        <ul>
          <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia dolor repellat in perferendis eaque maxime nihil quidem ullam atque neque. </li>
          <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia dolor repellat in perferendis eaque maxime nihil quidem ullam atque neque. </li>
          <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia dolor repellat in perferendis eaque maxime nihil quidem ullam atque neque. </li>
          <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia dolor repellat in perferendis eaque maxime nihil quidem ullam atque neque. </li>
          <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia dolor repellat in perferendis eaque maxime nihil quidem ullam atque neque. </li>
        </ul>
      </p>
  </div>

  <div class="container">
      <h2>the length of the course </h2>
    </div>
  
    <div class="container">
        
      <a href="" class="display-4"><i class="far fa-file-pdf" style="font-size:5rem;"></i>Download  </a>
    </div>
  <div class="container-fluid ">

    <div class="upcoming-courses mx-auto">
      <h2>Upcoming Courses</h2>
      <div class="row mx-auto">
        @foreach ($course->classes as $class)
        <div class="card m-2 " style="width: 19rem;">
          <div class="card-body">
            <h3 class="card-title">{{$course->title}}</h3>
            <p class="card-text"> {!!$class->getStartEndDate() !!}</p>
            <p>
              <span><strong>{{$class->availableSpace}}</strong> space(s) remaining</span>
            </p>
          </div>
          <div class="px-5">
            <span><strong class="price">£{{$class->price}}</strong>(ex VAT)</span>
          </div>
          <div class="card-footer row mx-auto">
            {{-- <a href="{{route('addToBasket', $class->id)}}" class="btn btn-primary">Add to Basket</a> --}}
            <form method="POST" action="{{route('cart.store')}}">

              {{ csrf_field() }}
              <input type="hidden" name="class_id" value="{{$class->id}}">
              <input type="hidden" name="quantity" value="1">
              <button type="submit" class="btn btn-{{Cart::checkIfExist($class->id)?'success' : 'primary'}} add-to-cart" {{Cart::checkIfExist($class->id)?'disabled' : ''}}>
                      <i class="fa fa-shopping-cart"></i>
                      {{Cart::checkIfExist($class->id)?'Added to cart' : 'Add to cart'}}
                      
                    </button>
            </form>
            <a class="ml-1 btn btn-info" href="{{route('showClassDetail', $class->id)}}">View Full Detail</a>
          </div>
        </div>
        @endforeach
      </div>
    </div>

    
  </div>
</div>
@endsection