
@extends('pages.layout')
@section('title', 'my page')
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
      padding: 5px;
      font-size: 12px;
    }
    tr:nth-child(even) {
      background-color: #dddddd;
    }
</style>
<div class="container">
    <a href="/messages">Chat</a>
</div>

<div class="container">
    <div class="row">
        <div class="col-6">
            <h1>My Page</h1>
            <ul>
            <li>id- > {{$user->id }}</li>
            <li>name -> {{$user->name }} </li>
            <li>email -> {{$user->email }}</li>
            <li>role -> @if($user->status == 1) Admin @elseif($user->status == 2) Auther @else User @endif</li>
            </ul>
        </div>
        <div class="col-6">
            <h1>History of orders</h1>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Link</th>
                    <th>Img</th>
                    <th>Price</th>
                    <th>Price Total</th>
                    <th>Count</th>
                    <th>Date</th>
                    <th>Delete</th>
                </tr>
                @foreach($carthistories->reverse() as $carthistory)
                    <tr>
                        <td>{{$carthistory->product_id}}</td>
                        <td>{{$carthistory->product_title}}</td>
                        <td>
                            <a href="/products/{{$carthistory->product_slug}}">{{$carthistory->product_title}}</a>
                        </td>
                        <td>{{$carthistory->product_image}}</td>
                        <td>{{ $carthistory->product_price }} $</td>
                        <td>{{ $carthistory->product_price_total }} $</td>
                        <td>{{$carthistory->product_count}}</td>
                        <td>{{$carthistory->created_at}}</td>
                        <td>
                            <form action="{{ route('mypage.destroy', $carthistory->id)}}" method="POST">
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
</div>
<section>
<div class="container">
    <div class="row">
        <div class="col-6">
            <h2>Weather</h2>
            <ul>
                <li><strong>City -> </strong>{{ $weather_user->name }}</li>
                <li><strong>Weather -> </strong>{{ $weather_user->weather[0]->description}} <img src="http://openweathermap.org/img/wn/{{ $weather_user->weather[0]->icon }}@2x.png" alt="">{{$weather_user->main->temp}}</li>
            </ul>
        </div>
        <div class="col-6">

        </div>
    </div>
</div>

@endsection
