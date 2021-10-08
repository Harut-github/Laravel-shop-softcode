@extends('pages.layout')
  @section('title', 'BloProductg Single')
@section('content')
<div class="container">
<h1>Product Single</h1>
</div>
<section>
<div class="container">
    <div class="card mb-3">
        <div class="col-3">
          <img class="card-img-top" src="/{{ $products->image ?? 'default-image.jpg' }}" alt="Card image cap" >
        </div>
        <div class="card-body">
          <h5 class="card-title">{{$products->title}}</h5>
          <h6 class="card-title">{{$products->price}} $</h6>
          <p class="card-text">{{$products->text}}</p>
           <p class="card-text"><small class="text-muted">Post time {{$products->created_at->format('m/d/Y')}} </small></p>
          <p class="card-text"><small class="text-muted">Last updated {{$products->updated_at}} </small></p>
        </div>
    </div>
</div>
@endsection
