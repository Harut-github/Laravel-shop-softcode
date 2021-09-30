@extends('pages.layout')
  @section('title', 'Blog Single')
@section('content')
<div class="container">
<h1>Blog Single</h1>
</div>
<section>
<div class="card mb-3">
  <div class="col-3">
    <img class="card-img-top" src="/{{ $posts->image ?? 'default-image.jpg' }}" alt="Card image cap" >
  </div>
  <div class="card-body">
    <h5 class="card-title">{{$posts->title}}</h5>
    <p class="card-text">{{$posts->text}}</p>
     <p class="card-text"><small class="text-muted">Post time {{$posts->created_at->format('m/d/Y')}} </small></p>
    <p class="card-text"><small class="text-muted">Last updated {{$posts->updated_at}} </small></p>
  </div>
</div>
@endsection
