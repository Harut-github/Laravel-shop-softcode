
@extends('pages.layout')
@section('title', 'Wish List')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

@if(!$carts->isEmpty())
<div class="container">
    <h1>Cart</h1>
    <div class="row">
        <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Link</th>
            <th>Img</th>
            <th>Price</th>
            <th>Count</th>
            <th>Delete</th>
        </tr>
        @foreach($carts as $cart)
            <tr>
                <td>{{$cart->product_id}}</td>
                <td>{{$cart->product_title}}</td>
                <td>
                    <a href="/products/{{$cart->product_slug}}">{{$cart->product_title}}</a>
                </td>
                <td>{{$cart->product_image}}</td>
                <td>{{ $cart->product_price }} $</td>
                <td>{{$cart->product_count}}</td>
                <td>
                    <form action="{{ route('cart.destroy', $cart->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                        <button>
                            <svg fill="#000000" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" width="24px" height="24px"><path d="M 4.9902344 3.9902344 A 1.0001 1.0001 0 0 0 4.2929688 5.7070312 L 10.585938 12 L 4.2929688 18.292969 A 1.0001 1.0001 0 1 0 5.7070312 19.707031 L 12 13.414062 L 18.292969 19.707031 A 1.0001 1.0001 0 1 0 19.707031 18.292969 L 13.414062 12 L 19.707031 5.7070312 A 1.0001 1.0001 0 0 0 18.980469 3.9902344 A 1.0001 1.0001 0 0 0 18.292969 4.2929688 L 12 10.585938 L 5.7070312 4.2929688 A 1.0001 1.0001 0 0 0 4.9902344 3.9902344 z"/></svg>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </table>
        <div class="col-6"></div>
        <div class="col-6">
            <table>
                <tr>
                    <th>Total Price</th>
                </tr>
                <tr>
                    <td>
                        {{$total}} $
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <br><br><br>
    <div class="row">
        <div class="col-6">
            <form action="/cart" method="POST">
             @csrf

             @if($message = Session::get('success'))
             <div class="alert alert-success" role="alert">
                {{ $message }}
             </div>
             @endif
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label for="name">
                            Your Name:</label>
                        <input type="text" class="form-control" id="name" name="name" >
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="col-sm-6 form-group">
                        <label for="email">
                            Email:</label>
                        <input type="email" class="form-control" id="email" name="email" >
                    </div>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label for="message">
                            Message:</label>
                        <textarea class="form-control" type="textarea" name="message" id="message" maxlength="6000" rows="4"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 form-group">
                        <button type="submit" class="btn btn-lg btn-default pull-right" >Send →</button>
                    </div>
                </div>

            </form>
        </div>
        <div class="col-6">
            {{-- Start paypal   --}}
            <script src="https://www.paypal.com/sdk/js?client-id=Adk7R1B2LPUNjnSrhcrl_FeyT7oK0pYNnZND2MKD2AcbHqS_8lVAcYKsX3tVw-GplUhxQotSmdYKGC7x&components=messages,buttons">
            </script>

            <div id="paypal-button-container"></div>
            <script>
                paypal.Buttons({
                createOrder: function(data, actions) {
                    // This function sets up the details of the transaction, including the amount and line item details.
                    return actions.order.create({
                    purchase_units: [{
                        amount: {
                        value: '{{$total}}'
                        }
                    }]
                    });
                },
                onApprove: function(data, actions) {
                    // This function captures the funds from the transaction.
                    return actions.order.capture().then(function(details) {

                        $.ajax({
                            method:"GET",
                            url:"/delete_cart_items",
                            success:function(response){
                                window.location.href = '/thanks';
                            }
                        });

                    });
                }
                }).render('#paypal-button-container');
                //This function displays Smart Payment Buttons on your web page.
            </script>

            <div data-pp-message data-pp-amount="{{$total}}"></div>
            {{-- End paypal   --}}

        </div>
    </div>
</div>
@else
<h1>Your Shopping Cart is empty</h1>
@endif
@endsection
