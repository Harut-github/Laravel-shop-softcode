<?php

namespace App\Http\Controllers;
use App\Json;
use Illuminate\Http\Request;

class JsonsController extends Controller
{
    public function index()
    {

        $users = @json_decode(file_get_contents("https://jsonplaceholder.typicode.com/users"));
        
        $jsons = @json_decode(file_get_contents("https://jsonplaceholder.typicode.com/posts"));

        return view('pages.json.index', compact('jsons','users'));
    }
}
