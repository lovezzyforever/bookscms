<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return 'Hello World';
});


//Route::post('/', function () {
//
//});

//Route::get('home/index',function(){
//    return view('Home.index');
//});


Route::get('/test','TestController@index');

//前台{   ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓

//前台首页
Route::get('home/index','Home\HomeindexController@index');
//跳到Courses
Route::get('home/courses','Home\HomeCoursesController@index');
//跳到Teacher
Route::get('home/teacher','Home\HomeTeacherController@index');
//跳到about
Route::get('home/about','Home\HomeAboutController@index');
//跳到blog
Route::get('home/blog','Home\HomeBlogController@index');
//跳到contact
Route::get('home/contact','Home\HomeContactController@index');
//跳到pricing
Route::get('home/pricing','Home\HomePricingController@index');
//跳到email
Route::get('home/email','Home\HomeEmailController@index');
//执行发送邮件
Route::get('email/DoEmail','Home\HomeEmailController@DoEmail');
//登录
Route::get('home/login','Home\HomeLoginController@index');
Route::get('login/yanzhengma','Home\HomeLoginController@yanzhengma');
Route::get('login/loginDo','Home\HomeLoginController@loginDo');

//      ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑  }

//后台{
//
Route::get('admin/index','Admin\AdminIndexController@index');
//分类添加页面
Route::get('admin/type_info','Admin\AdminIndexController@type_info');
Route::any('AdminIndex/typeadd','Admin\AdminIndexController@typeadd');//分类添加方法
Route::any('AdminIndex/typeshow','Admin\AdminIndexController@typeshow');//分类展示
//分类展示页面
Route::get('admin/type_list','Admin\AdminIndexController@type_list');
Route::any('AdminIndex/typedel/{type_id}','Admin\AdminIndexController@typedel');//分类删除
Route::any('AdminIndex/typeup/{type_id}','Admin\AdminIndexController@typeup');//渲染修改页面
Route::any('AdminIndex/typeupDo','Admin\AdminIndexController@typeupDo');//执行修改

Route::get('admin/returnlist','Admin\AdminReturnController@returnList');//借书列表
Route::get('admin/continuelist','Admin\AdminReturnController@continueList');//续借列表
Route::get('admin/updatenum','Admin\AdminReturnController@updateNum');//续借列表
Route::any('admin/updatenumdo','Admin\AdminReturnController@updateNumDo');//进行修改

//图书添加页面
Route::get('admin/bookadd','Admin\AdminIndexController@bookadd');
Route::any('AdminIndex/bookaddDo','Admin\AdminIndexController@bookaddDo');//图书添加
Route::any('AdminIndex/bookshow','Admin\AdminIndexController@bookshow');//图书展示
//图书列表展示页面
Route::get('admin/book_list','Admin\AdminIndexController@book_list');
Route::any('AdminIndex/bookdel/{book_id}','Admin\AdminIndexController@bookdel');//图书删除
//图书列表修改页面
Route::get('admin/bookupdate','Admin\AdminIndexController@bookupdate');
Route::any('AdminIndex/bookup/{book_id}','Admin\AdminIndexController@bookup');//渲染修改页面
Route::any('AdminIndex/bookupDo','Admin\AdminIndexController@bookupDo');//执行修改


//库存管理
Route::get('admin/sku_info','Admin\AdminIndexController@sku_info');//库存添加页面;
Route::any('AdminIndex/skuadd','Admin\AdminIndexController@skuadd');//库存添加
Route::any('AdminIndex/skushow','Admin\AdminIndexController@skushow');//库存展示方法
Route::get('admin/sku_list','Admin\AdminIndexController@sku_list');//库存展示页面;
Route::any('AdminIndex/skudel/{book_id}','Admin\AdminIndexController@skudel');//库存删除
Route::get('admin/skuupdate','Admin\AdminIndexController@skuupdate');//库存修改页面;
Route::any('AdminIndex/skuup/{book_id}','Admin\AdminIndexController@skuup');//渲染修改页面
Route::any('AdminIndex/skuupDo','Admin\AdminIndexController@skuupDo');//执行修改




Route::get('admin/bottom','Admin\AdminIndexController@bottom');
Route::get('admin/left','Admin\AdminIndexController@left');
Route::get('admin/login','Admin\AdminIndexController@login');
Route::get('admin/main','Admin\AdminIndexController@main');
Route::get('admin/main_info','Admin\AdminIndexController@main_info');
Route::get('admin/main_list','Admin\AdminIndexController@main_list');
Route::get('admin/main_menu','Admin\AdminIndexController@main_menu');
Route::get('admin/main_message','Admin\AdminIndexController@main_message');
Route::get('admin/message_info','Admin\AdminIndexController@message_info');
Route::get('admin/message_replay','Admin\AdminIndexController@message_replay');
Route::get('admin/swich_blade','Admin\AdminIndexController@swich_blade');
Route::get('admin/top','Admin\AdminIndexController@top');

//}


////后台用户借书审核↓↓↓↓↓
//Route::get('admin/general','Admin\AdminGeneralController@index');
////状态码审核通过↓↓↓↓↓
//Route::get('general/update','Admin\AdminGeneralController@update');










