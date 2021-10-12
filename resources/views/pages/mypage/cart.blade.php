
@extends('pages.layout')
@section('title', 'Wish List')
@section('content')
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
<div class="container">
<h1>Cart</h1>

<div class="container">
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
	</div>
</div>

<div class="container">
	<div class="row">
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
</div>
</div>
<section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div id="smart-button-container">
                    <div style="text-align: center"><label for="description"> </label><input type="text" name="descriptionInput" id="description" maxlength="127" value=""></div>
                      <p id="descriptionError" style="visibility: hidden; color:red; text-align: center;">Please enter a description</p>
                    <div style="text-align: center"><label for="amount"> </label><input name="amountInput" type="number" id="amount" value="" ><span> USD</span></div>
                      <p id="priceLabelError" style="visibility: hidden; color:red; text-align: center;">Please enter a price</p>
                    <div id="invoiceidDiv" style="text-align: center; display: none;"><label for="invoiceid"> </label><input name="invoiceid" maxlength="127" type="text" id="invoiceid" value="" ></div>
                      <p id="invoiceidError" style="visibility: hidden; color:red; text-align: center;">Please enter an Invoice ID</p>
                    <div style="text-align: center; margin-top: 0.625rem;" id="paypal-button-container"></div>
                  </div>
                  <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
                  <script>
                  function initPayPalButton() {
                    var description = document.querySelector('#smart-button-container #description');
                    var amount = document.querySelector('#smart-button-container #amount');
                    var descriptionError = document.querySelector('#smart-button-container #descriptionError');
                    var priceError = document.querySelector('#smart-button-container #priceLabelError');
                    var invoiceid = document.querySelector('#smart-button-container #invoiceid');
                    var invoiceidError = document.querySelector('#smart-button-container #invoiceidError');
                    var invoiceidDiv = document.querySelector('#smart-button-container #invoiceidDiv');

                    var elArr = [description, amount];

                    if (invoiceidDiv.firstChild.innerHTML.length > 1) {
                      invoiceidDiv.style.display = "block";
                    }

                    var purchase_units = [];
                    purchase_units[0] = {};
                    purchase_units[0].amount = {};

                    function validate(event) {
                      return event.value.length > 0;
                    }

                    paypal.Buttons({
                      style: {
                        color: 'gold',
                        shape: 'rect',
                        label: 'paypal',
                        layout: 'vertical',

                      },

                      onInit: function (data, actions) {
                        actions.disable();

                        if(invoiceidDiv.style.display === "block") {
                          elArr.push(invoiceid);
                        }

                        elArr.forEach(function (item) {
                          item.addEventListener('keyup', function (event) {
                            var result = elArr.every(validate);
                            if (result) {
                              actions.enable();
                            } else {
                              actions.disable();
                            }
                          });
                        });
                      },

                      onClick: function () {
                        if (description.value.length < 1) {
                          descriptionError.style.visibility = "visible";
                        } else {
                          descriptionError.style.visibility = "hidden";
                        }

                        if (amount.value.length < 1) {
                          priceError.style.visibility = "visible";
                        } else {
                          priceError.style.visibility = "hidden";
                        }

                        if (invoiceid.value.length < 1 && invoiceidDiv.style.display === "block") {
                          invoiceidError.style.visibility = "visible";
                        } else {
                          invoiceidError.style.visibility = "hidden";
                        }

                        purchase_units[0].description = description.value;
                        purchase_units[0].amount.value = amount.value;

                        if(invoiceid.value !== '') {
                          purchase_units[0].invoice_id = invoiceid.value;
                        }
                      },

                      createOrder: function (data, actions) {
                        return actions.order.create({
                          purchase_units: purchase_units,
                        });
                      },

                      onApprove: function (data, actions) {
                        return actions.order.capture().then(function (orderData) {

                          // Full available details
                          console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                          // Show a success message within this page, e.g.
                          const element = document.getElementById('paypal-button-container');
                          element.innerHTML = '';
                          element.innerHTML = '<h3>Thank you for your payment!</h3>';

                          // Or go to another URL:  actions.redirect('thank_you.html');

                        });
                      },

                      onError: function (err) {
                        console.log(err);
                      }
                    }).render('#paypal-button-container');
                  }
                  initPayPalButton();
                  </script>
            </div>
        </div>
    </div>
</section>


@endsection
