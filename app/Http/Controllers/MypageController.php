<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Wishlist;
use App\Carthistory;
use Illuminate\Support\Facades\Auth;
class MypageController extends Controller
{
    public function index(){

        // $user_ip = $_SERVER['REMOTE_ADDR'];
        $location_url = "http://ip-api.com/json/217.113.17.5";
        $location = @json_decode(file_get_contents($location_url));

        $apiKey = "fe57b721fd47b8600afac45a7829c1ea";
        $city = $location->city;
        $url = "http://api.openweathermap.org/data/2.5/weather?q=" . $city . "&lang=ru&units=metric&appid=" . $apiKey;
        $weather_user = @json_decode(file_get_contents($url));
        $user = Auth::user();

        $carthistories = Carthistory::where('user_id', $user->id)->get();

        return view('pages.mypage.index', compact('user','carthistories','weather_user'));
    }

    public function destroy($id){

    	$carthistory = Carthistory::find($id);

    	$carthistory->delete();

    	return redirect('/mypage');
   }

}
