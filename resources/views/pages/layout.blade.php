<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/">Logo</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/blog">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/json">Json</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/products">Products</a>
        </li>
        @if (Auth::check())
        <li class="nav-item">
            <a class="nav-link" href="/mypage">My Page</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/wishlist">My whish List
              <sup>
              <span style="color: red;border-radius: 50%;width: 20px;height: 20px; background: white;text-align: center;line-height: normal;" class="badge badge-light count_wishlist">0</span>
              </sup>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/cart">Cart
              <sup>
              <span style="color: red;border-radius: 50%;width: 20px;height: 20px; background: white;text-align: center;line-height: normal;" class="badge badge-light count_cart">{{$countcart}}</span>
              </sup>
            </a>
        </li>
        @endif
      </ul>
      <form class="d-flex" action="/search" method="GET" >
      {{ csrf_field() }}
        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <div>
        @guest
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            @if (Route::has('register'))
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
        @else
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} - {{ Auth::user()->status }} <span class="caret"></span>
            </a>

            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endguest
       </div>
    </div>
  </div>
</nav>

@yield('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

$( document ).ready(function() {

  // count wishlist this user
  $.ajax({
    method:"GET",
    url:"/load-wishlist-count",
    success:function(response){
      $('.count_wishlist').html(response.count);
    }
  })

});
</script>

<script>// reange js fileter product for thml
const
  range = document.getElementById('range'),
  rangeV = document.getElementById('rangeV'),
  setValue = ()=>{
    const
      newValue = Number( (range.value - range.min) * 100 / (range.max - range.min) ),
      newPosition = 10 - (newValue * 0.2);
    rangeV.innerHTML = `<span>${range.value}</span>`;
    rangeV.style.left = `calc(${newValue}% + (${newPosition}px))`;
  };
document.addEventListener("DOMContentLoaded", setValue);
range.addEventListener('input', setValue);
</script>

<script>

    $( ".chat_list" ).first().addClass('active_chat');

    $( ".msg_send_btn" ).click(function() {
        let friend_id = $('.friend_id').val();
        let sms = $('.write_msg').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
        method:"POST",
        url:"/messages",
        data:{friend_id:friend_id, sms:sms},
            success:function(response){
                $('.msg_history').html('');
                $('.write_msg').val('');
                $.each(response.data, function( index, value ) {

                    if(value.sender_id == friend_id || value.recipient_id == friend_id){

                        console.log(value);

                        if(value.recipient_id == friend_id){
                            $('.msg_history').append(
                            '<div class="outgoing_msg"><div class="sent_msg"><p>'+value.sms+'</p><span class="time_date"> '+value.created_at+' </span></div></div>'
                            );
                        }else if (value.sender_id == friend_id) {
                            $('.msg_history').append(
                                '<div class="incoming_msg"><div class="incoming_msg_img"><img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"></div><div class="received_msg"><div class="received_withd_msg"><p>'+value.sms+'</p><span class="time_date"> '+value.created_at+' </span></div></div></div>'
                            );
                        }

                    }

                });
            }
        })
    });

    $( ".chat_list" ).click(function() {
       $('.chat_list').removeClass('active_chat');
       $(this).addClass('active_chat');

       let friend_only_id = $('.active_chat').attr('data-id');
       $('.friend_id').val(friend_only_id);

      let token = $('meta[name="csrf-token"]').attr('content');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
       $.ajax({
        method:"POST",
        url:"/messages",
        data:{friend_only_id:friend_only_id, token:token},
            success:function(response){
                $('.msg_history').html('');
                $.each(response.data, function( index, value ) {

                    if(value.sender_id == friend_only_id || value.recipient_id == friend_only_id){

                        if(value.recipient_id == friend_only_id){
                            $('.msg_history').append(
                            '<div class="outgoing_msg"><div class="sent_msg"><p>'+value.sms+'</p><span class="time_date"> '+value.created_at+'  </span></div></div>'
                            );
                        }else if (value.sender_id == friend_only_id) {
                            $('.msg_history').append(
                                '<div class="incoming_msg"><div class="incoming_msg_img"><img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"></div><div class="received_msg"><div class="received_withd_msg"><p>'+value.sms+'</p><span class="time_date"> '+value.created_at+' </span></div></div></div>'
                            );
                        }
                    }
                });
            }
        })
    });

    $( window ).on( "load", function() {
        let friend_id = $('.active_chat').attr('data-id');
        $('.friend_id').val(friend_id);
    });

</script>
<script>
    $(document).ready(function(){
      $(".search-bar").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".chat_list").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>
