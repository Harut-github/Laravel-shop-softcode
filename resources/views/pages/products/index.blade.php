@extends('pages.layout')
  @section('title', 'Products page')
@section('content')
<div class="container">
<h1>Products</h1>
</div>
<section>
<div class="container">
	<div class="row">
	@foreach($products as $product)
		<div class="col-sm-12 col-md-4 col-lg-4">
		 	<div class="card">
			    <img class="card-img-top" src="/{{ $product->image ?? 'default-image.jpg' }}" alt="Card image">
			    <div class="card-body">
			      <h4 class="card-title">{{$product->title}}</h4>
                  <h3>{{$product->price}} $</h3>
                  <div class="d-flex align-items-center justify-content-between">
                     <a href="/products/{{$product->slug}}" class="btn btn-primary">See page</a>
                    <form action="/products" method="POST">
                     @csrf

                    <div
                        class="js_click_praduct"
                        style="cursor:pointer"
                        data-praduct="{{$product->id}}"
                        data-title="{{$product->title}}"
                        data-slug="{{$product->slug}}"
                        data-price="{{$product->price}}"
                        data-img="{{$product->image}}"
                    >
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <input type="hidden" name="product_title" value="{{$product->title}}">
                    <input type="hidden" name="product_slug" value="{{$product->slug}}">
                    <input type="hidden" name="product_price" value="{{$product->price}}">
                    <input type="hidden" name="product_img" value="{{$product->image}}">

                    <button> <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M12 21.593c-5.63-5.539-11-10.297-11-14.402 0-3.791 3.068-5.191 5.281-5.191 1.312 0 4.151.501 5.719 4.457 1.59-3.968 4.464-4.447 5.726-4.447 2.54 0 5.274 1.621 5.274 5.181 0 4.069-5.136 8.625-11 14.402m5.726-20.583c-2.203 0-4.446 1.042-5.726 3.238-1.285-2.206-3.522-3.248-5.719-3.248-3.183 0-6.281 2.187-6.281 6.191 0 4.661 5.571 9.429 12 15.809 6.43-6.38 12-11.148 12-15.809 0-4.011-3.095-6.181-6.274-6.181"/></svg>
                    </button>
                    </div>
                </form>
                  </div>
			    </div>
			 </div>
		</div>
	@endforeach
	</div>
</div>
</section>

@endsection

