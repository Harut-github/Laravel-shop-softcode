@extends('pages.layout')
  @section('title', 'login page')
@section('content')
<div class="container">
<h1>Login</h1>
</div>
<section>
<div class="container">
	<div class="row">
        <form action="{{route('checkLogin')}}" method="post">
            @csrf
            <div class="col-sm-12 col-md-12 col-lg-12">
                <input type="text" placeholder="email" name="email">
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
