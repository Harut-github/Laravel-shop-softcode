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
                        <div class="js_click_praduct" style="cursor:pointer">
                            <input type="hidden" name="product_wishlist_id" value="{{$product->id}}">
                            <button><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M12 21.593c-5.63-5.539-11-10.297-11-14.402 0-3.791 3.068-5.191 5.281-5.191 1.312 0 4.151.501 5.719 4.457 1.59-3.968 4.464-4.447 5.726-4.447 2.54 0 5.274 1.621 5.274 5.181 0 4.069-5.136 8.625-11 14.402m5.726-20.583c-2.203 0-4.446 1.042-5.726 3.238-1.285-2.206-3.522-3.248-5.719-3.248-3.183 0-6.281 2.187-6.281 6.191 0 4.661 5.571 9.429 12 15.809 6.43-6.38 12-11.148 12-15.809 0-4.011-3.095-6.181-6.274-6.181"/></svg>
                            </button>
                        </div>
                    </form>
                    <form action="/products" method="POST">
                        @csrf
                           <div class="js_click_praduct" style="cursor:pointer">
                               <input type="hidden" name="product_cart_id" value="{{$product->id}}">
                               <button>
                                <svg width="24px" height="24px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                width="902.86px" height="902.86px" viewBox="0 0 902.86 902.86" style="enable-background:new 0 0 902.86 902.86;"
                                xml:space="preserve">
                                <path d="M671.504,577.829l110.485-432.609H902.86v-68H729.174L703.128,179.2L0,178.697l74.753,399.129h596.751V577.829z
                                M685.766,247.188l-67.077,262.64H131.199L81.928,246.756L685.766,247.188z"/>
                                <path d="M578.418,825.641c59.961,0,108.743-48.783,108.743-108.744s-48.782-108.742-108.743-108.742H168.717
                                c-59.961,0-108.744,48.781-108.744,108.742s48.782,108.744,108.744,108.744c59.962,0,108.743-48.783,108.743-108.744
                                c0-14.4-2.821-28.152-7.927-40.742h208.069c-5.107,12.59-7.928,26.342-7.928,40.742
                                C469.675,776.858,518.457,825.641,578.418,825.641z M209.46,716.897c0,22.467-18.277,40.744-40.743,40.744
                                c-22.466,0-40.744-18.277-40.744-40.744c0-22.465,18.277-40.742,40.744-40.742C191.183,676.155,209.46,694.432,209.46,716.897z
                                M619.162,716.897c0,22.467-18.277,40.744-40.743,40.744s-40.743-18.277-40.743-40.744c0-22.465,18.277-40.742,40.743-40.742
                                S619.162,694.432,619.162,716.897z"/></svg>
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

