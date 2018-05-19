<?php

namespace App\Http\Controllers\Home;
use Mail;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;


class HomeEmailController extends Controller
{
    public function index()
    {
//        echo "hello world";
        return view('Home.email');
    }

    public function DoEmail()
    {
        $email = \Request::input('email');
        // echo $email;
        // return $email;die;
        $num = Mail::raw('haha', function($message) {
            $message->from('1412750029@qq.com', '杏子杀猪专业户');
          return $res;die;
            $res = $message->to($_REQUEST['$email']);
           
        });




    }

}
