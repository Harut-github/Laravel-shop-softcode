
@extends('pages.layout')
@section('title', 'my page')
@section('content')
<div class="container">
<h1>My Page</h1>
<ul>
<li>id- > {{$user->id }}</li>
<li>name -> {{$user->name }} </li>
<li>email -> {{$user->email }}</li>
<li>role -> @if($user->status == 1) Admin @elseif($user->status == 2) Auther @else User @endif</li>
</ul>
</div>
<section>



@endsection
