@extends('pages.layout')
  @section('title', 'Json')
@section('content')
<div class="container">
<h1>Json</h1>
</div>

<div class="container">
<div class="row">

@foreach ($users as $user)
<div class="col-sm-12 col-md-3 col-lg-3">
    <div class="card text-white bg-info mb-3">
      <div class="card-header">{{$user->username}}</div>
      <div class="card-body">
        <h5 class="card-title">{{$user->name}}</h5>
        <p class="card-text">{{$user->email}}</p>
        <ul>
            <li><strong>Address</strong></li>
            <li>{{$user->address->city}}</li>
            <li>{{$user->address->street}}</li>
        </ul>
      </div>
    </div>
</div>
@endforeach

<hr>

@foreach ($jsons as $json)
<div class="col-sm-12 col-md-4 col-lg-4">
    <div class="card bg-light mb-3">
      <div class="card-header">ID {{$json->id}}</div>
      <div class="card-body">
        <h5 class="card-title">{{$json->title}}</h5>
        <p class="card-text">
            {{$json->body}}
        </p>
      </div>
    </div>
</div>
@endforeach

</div>
</div>

@endsection
