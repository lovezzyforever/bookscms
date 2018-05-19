<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;

class HomeindexController extends Controller{
    public function index(){
//        echo "hello world";
        return view('Home.index');
    }
}
