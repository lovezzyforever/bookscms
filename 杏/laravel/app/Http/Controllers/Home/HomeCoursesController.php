<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;

class HomeCoursesController extends Controller{
    public function index(){
//        echo "hello world";
        return view('Home.courses');
    }
}
