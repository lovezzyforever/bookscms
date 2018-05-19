<?php

namespace App\Http\Controllers\Home;

use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

class HomeLoginController extends Controller{
    public function index(){
//        echo "hello world";
        return view('home/login');
    }

    public function loginDo(){

        $data=input::all();
        $arr=DB::table('user')->first();
        $arr=json_decode(json_encode($arr),true);

        if($data['user_name']==$arr['user_name']&&$data['user_pwd']==$arr['user_pwd']){

            //isset()检测变量是否设置
            if(isset($_REQUEST['authcode'])){
                session_start();
                //strtolower()小写函数
                if(strtolower($_REQUEST['authcode'])== $_SESSION['authcode']){

                    $session = new Session;
                    $session->set('user_name',$arr['user_name']);
                    //跳转页面
                    echo"登录成功了，跳转中请稍后。。";
                    $url = url("home/index");
                    header("Refresh:3;url=$url");
                }else{
                    //提示以及跳转页面
                    echo"验证码错误哦,请稍后。。";
                    $url = url("home/login");
                    header("Refresh:3;url=$url");
                }
                exit();

            }
        }else{
            $session =new Session;
            //$session->session()->forget('error');
            $error = $session->get('error');
            $session->set('error',$error+1);
            $arror_num=$session->get('error');
            if($arror_num>=3){
                return 3;
                $url=url("home/login");
                header("Refresh:3;url=$url");

            }
        }
    }
     public function yanzhengma(){

         //10>设置session,必须处于脚本最顶部
         session_start();
         $image = imagecreatetruecolor(100, 30);  //1>设置验证码图片大小的函数
         //5>设置验证码颜色 imagecolorallocate(int im, int red, int green, int blue);
         $bgcolor = imagecolorallocate($image,255,255,255); //#ffffff
         //6>区域填充 int imagefill(int im, int x, int y, int col) (x,y) 所在的区域着色,col 表示欲涂上的颜色
         imagefill($image, 0, 0, $bgcolor);
         //10>设置变量
         $captcha_code = "";
         //7>生成随机数字
         for($i=0;$i<4;$i++){
             //设置字体大小
             $fontsize = 6;
             //设置字体颜色，随机颜色
             $fontcolor = imagecolorallocate($image, rand(0,120),rand(0,120), rand(0,120));   //0-120深颜色
             //设置数字
             $fontcontent = rand(0,9);
             //10>.=连续定义变量
             $captcha_code .= $fontcontent;
             //设置坐标
             $x = ($i*100/4)+rand(5,10);
             $y = rand(5,10);
             imagestring($image,$fontsize,$x,$y,$fontcontent,$fontcolor);
         }
         //10>存到session
         $_SESSION['authcode'] = $captcha_code;
         //8>增加干扰元素，设置雪花点
         for($i=0;$i<200;$i++){
             //设置点的颜色，50-200颜色比数字浅，不干扰阅读
             $pointcolor = imagecolorallocate($image,rand(50,200), rand(50,200), rand(50,200));
             //imagesetpixel — 画一个单一像素
             imagesetpixel($image, rand(1,99), rand(1,29), $pointcolor);
         }
         //9>增加干扰元素，设置横线
         for($i=0;$i<4;$i++){
             //设置线的颜色
             $linecolor = imagecolorallocate($image,rand(80,220), rand(80,220),rand(80,220));
             //设置线，两点一线
             imageline($image,rand(1,99), rand(1,29),rand(1,99), rand(1,29),$linecolor);
         }
         //2>设置头部，image/png
         header('Content-Type: image/png');
         //3>imagepng() 建立png图形函数
         imagepng($image);
         //4>imagedestroy() 结束图形函数 销毁$image
         imagedestroy($image);

     }
}
