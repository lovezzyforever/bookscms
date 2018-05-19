<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Storage;//文件上传
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class AdminIndexController extends Controller{
    public function index()
    {
        return view('Admin.index');
    }
    //分类添加页面
    public function type_info()
    {
        return view('admin.type_info');
    }
    //分类的添加
   public function typeadd()
   {
     $type_name  =\Request::input('type_name');
     $res = DB::table('book_type')->insert(['type_name'=>$type_name]); 
     if($res)
     {
        return redirect('AdminIndex/typeshow');
     }
     
   }
  //分类的展示页面
  public function typeshow()
  {
      $typedata= DB::table('book_type')->get();
      return view('admin/type_list',['typedata'=>$typedata]);
  }
  //分类展示方法
  public function type_list()
  {
      $typedata= DB::table('book_type')->get();
      return view('Admin.type_list',['typedata'=>$typedata]);
  }
  //分类删除
  public function typedel($type_id)
  {
    $res = DB::table('book_type')->where(['type_id'=>$type_id])->delete();
    if($res)
    {
      return redirect('AdminIndex/typeshow');
    }
  }
    //分类修改页面
    public function typeupdate()
    {
        return view('admin.typeupdate');
    }
  //渲染修改页面
  public function typeup($type_id)
  {
    $arr = DB::table('book_type')->where(['type_id'=>$type_id])->first();
    return view('admin/typeupdate',['arr'=>$arr]);
  }

  //执行修改
  public function typeupDo()
  {
      $type_id = \Request::get('type_id');
      $type_name = \Request::input('type_name');
      $arr=DB::table('book_type')->where(['type_id'=>$type_id])->update(['type_name'=>$type_name]);  
      if($arr)
      {
        return redirect('AdminIndex/show');
      }
      else
      {
        echo "修改失败";
      }
    
  }

//图书管理
    //图书添加页面
    public function bookadd()
    {
       //图书分类
        $typedata = DB::table('book_type')->get();
        return view('Admin.bookadd',['typedata'=>$typedata]);
    }
    //图书添加
    public function bookaddDo()
    {
       //图书分类
      $type = DB::table('book_type')->get();
      $typedata = json_decode(json_encode($type),true);
      $book_type = $typedata[0]['type_id'];
      $book_name   =\Request::input('book_name');  
      $book_author =\Request::input('book_author');  
      $book_press  =\Request::input('book_press');
      $book_content=\Request::input('book_content');  
      $book_status =\Request::input('book_status');
      $book_cover  =input::file('book_cover');
      if($book_cover->isValid())
      {
        //获取文件名称
        $clientName = $book_cover-> getClientOriginalName();
        //临时绝对路径
        $realPath = $book_cover-> getRealPath();
        //扩展名
        $entension = $book_cover-> getClientOriginalExtension();
        //图片保存路径
        $type = $book_cover-> getClientMimeType();
        $filename = uniqid().'.'.$entension;
        $bool = Storage::disk('uploads')->put($filename,file_get_contents($realPath));
        $path = "../uploads/".$filename;
       }
        $res = DB::table('books_info')->insert(['book_name'=>$book_name,'book_author'=>$book_author,'book_press'=>$book_press,'book_content'=>$book_content,'book_status'=>$book_status,'book_cover'=>$path,'book_type'=>$book_type]);
       if($res)
       {
        return redirect('AdminIndex/bookshow');
       }
    }
    //图书展示页面
     public function book_list()
     {
      $res= DB::table('books_info')->get();
      $bookdata =json_decode(json_encode($res),true);
      return view('admin.book_list',['bookdata'=>$bookdata]);
    }
   //展示
    public function bookshow()
    {
      $res= DB::table('books_info')->get();
      $bookdata =json_decode(json_encode($res),true);
      return view('admin.book_list',['bookdata'=>$bookdata]);
    } 
   //图书的删除
    public function bookdel($book_id)
    {
      $res = DB::table('books_info')->where(['book_id'=>$book_id])->delete();
      if($res)
      {
      return redirect('AdminIndex/bookshow');
      }
    } 
    //图书的修改页面
    public function bookupdate()
    {
     return view('admin.bookupdate');
    }

   //渲染修改页面
   public function bookup($book_id)
   {
     $arr = DB::table('books_info')->where(['book_id'=>$book_id])->first();
     return view('admin/bookupdate',['arr'=>$arr]);
   }
  //执行修改
  public function bookupDo()
  {
      $book_id = \Request::get('book_id');
      $book_name = \Request::input('book_name');
      $book_author = \Request::input('book_author');
      $book_press = \Request::input('book_press');
      $book_status = \Request::input('book_status');
      $book_content = \Request::input('book_content');
      $arr=DB::table('books_info')->where(['book_id'=>$book_id])->update(['book_name'=>$book_name,'book_author'=>$book_author,'book_press'=>$book_press,'book_status'=>$book_status,'book_content'=>$book_content]);  
      if($arr)
      {
        return redirect('AdminIndex/bookshow');
      }
      else
      {
        echo "修改失败";
      }
  }

  //图书库存管理
    //库存添加页面
    public function sku_info()
    {
      $bookdata = DB::table('books_info')->get(); 
      return view('admin.sku_info',['bookdata'=>$bookdata]);
    }
    //库存添加方法
     public function skuadd()
    {
      $book_name  =\Request::input('book_name');
      $book_stock  =\Request::input('book_stock');
      $res = DB::table('books_info')->where(['book_name'=>$book_name])->update(['book_stock'=>$book_stock]);
      if($res)
      {
        return redirect('AdminIndex/skushow');
      }
    }
    //库存展示
    public function skushow()
    {
      $res = DB::table('books_info')->get();
      $bookdata =json_decode(json_encode($res),true);
      return view('admin.sku_list',['bookdata'=>$bookdata]);
    }

    //库存列表页面
    public function sku_list()
    { 
      $res= DB::table('books_info')->get();
      $bookdata =json_decode(json_encode($res),true);
      return view('Admin.sku_list',['bookdata'=>$bookdata]);
    }
    //库存删除
   public function skudel($book_id)
   {
      $res = DB::table('books_info')->where(['book_id'=>$book_id])->delete();
      if($res)
      {
        return redirect('AdminIndex/skushow');
      }
   }
   //库存修改页面
   public function skuupdate()
   {
    return view('Admin.skuupdate');
   }
  //渲染库存修改页面
   public function skuup($book_id)
   {
    $arr = DB::table('books_info')->where(['book_id'=>$book_id])->first();
    return view('Admin.skuupdate',['arr'=>$arr]);
   }
   //执行修改
   public function skuupDo()
   {
     $book_id = \Request::get('book_id');
     $book_name = \Request::input('book_name');
     $book_stock = \Request::input('book_stock');
     $book_status = \Request::input('book_status');
     $arr=DB::table('books_info')->where(['book_id'=>$book_id])->update(['book_name'=>$book_name,'book_stock'=>$book_stock,'book_status'=>$book_status]);
     if($arr)
     {
        return redirect('AdminIndex/skushow');
     }
     else
     {
       echo "修改失败";
     }
   }




    public function bottom(){
        return view('Admin.bottom');
    }

    public function left(){
        return view('Admin.left');
    }

    public function login(){
        return view('Admin.login');
    }

    public function main(){
        return view('Admin.main');
    }

    public function main_info(){
        return view('admin.main_info');
    }

    public function main_list(){
        return view('Admin.main_list');
    }

    public function main_menu(){
        return view('Admin.main_menu');
    }

    public function main_message(){
        return view('Admin.main_message');
    }

    public function message_info(){
        return view('Admin.message_info');
    }

    public function message_replay(){
        return view('Admin.message_replay');
    }

    public function swich(){
        return view('Admin.swich');
    }

    public function top(){
        return view('Admin.top');
    }



}
