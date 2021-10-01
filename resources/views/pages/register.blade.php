@extends('pages.layout')
  @section('title', 'Register page')
@section('content')
<div class="container">
<h1>Register</h1>
</div>
<section>
<div class="container">
	<div class="row">
        <form action="{{route('register')}}" method="post">
            {{csrf_field()}}
            <div class="col-sm-12 col-md-12 col-lg-12">
                <input type="text" placeholder="name" name="name" value="{{old('name')}}">
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="col-sm-12 col-md-12 col-lg-12">
                <input type="text" placeholder="email" value="{{old('email')}}" name="email">
            </div>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="col-sm-12 col-md-12 col-lg-12">
                <input type="password" placeholder="password" name="password">
            </div>
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="col-sm-12 col-md-12 col-lg-12">
                <button>Send</button>
            </div>

        </form>
    </div>
</div>
</section>




@endsection
