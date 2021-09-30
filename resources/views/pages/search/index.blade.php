@extends('pages.layout')
  @section('title', 'Search')
@section('content')
<div class="container">
<h1>Search</h1>
</div>

<div class="container">
<div class="row">
@foreach($posts as $post)
<div class="col-sm-12 col-md-4 col-lg-4">
    <div class="card bg-light mb-3">
      <div class="card-header">ID {{$post->id}}</div>
      <div class="card-body">
        <h5 class="card-title">{{$post->title}}</h5>
        <p class="card-text">
            {{$post->description}}
        </p>
      </div>
    </div>
</div>
@endforeach

</div>
</div>

@endsection
