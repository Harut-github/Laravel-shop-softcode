
@extends('pages.layout')
@section('title', 'Wish List')
@section('content')
<div class="container">
<h1>Cart</h1>

<div class="container">
	<div class="row">
	@foreach($carts as $cart)
		<div class="col-sm-12 col-md-4 col-lg-4">
		 	<div class="card">
			    <img class="card-img-top" src="/{{ $product->image ?? 'default-image.jpg' }}" alt="Card image">
			    <div class="card-body">
			        <a href="/products/{{$cart->product_slug}}">
                        <h4 class="card-title">{{$cart->product_title}}</h4>
                    </a>
                   <div class="d-flex align-items-center justify-content-between">
                    <h3>{{$cart->product_price}} $</h3>
                    <h4>Count - {{$cart->product_count}}</h4>
                   </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <form action="{{ route('cart.destroy', $cart->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                            <button>
                                <svg fill="#000000" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" width="24px" height="24px"><path d="M 4.9902344 3.9902344 A 1.0001 1.0001 0 0 0 4.2929688 5.7070312 L 10.585938 12 L 4.2929688 18.292969 A 1.0001 1.0001 0 1 0 5.7070312 19.707031 L 12 13.414062 L 18.292969 19.707031 A 1.0001 1.0001 0 1 0 19.707031 18.292969 L 13.414062 12 L 19.707031 5.7070312 A 1.0001 1.0001 0 0 0 18.980469 3.9902344 A 1.0001 1.0001 0 0 0 18.292969 4.2929688 L 12 10.585938 L 5.7070312 4.2929688 A 1.0001 1.0001 0 0 0 4.9902344 3.9902344 z"/></svg>
                            </button>
                        </form>
                    </div>
			    </div>
			</div>
		</div>
	@endforeach
	</div>
</div>

</div>
<section>



@endsection
