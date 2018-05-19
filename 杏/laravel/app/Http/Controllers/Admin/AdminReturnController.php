<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use DB;
use Illuminate\Support\Facades\Schema;;
/**
* 
*/
class AdminReturnController extends Controller
{
	public function returnList()
	{	
		$user_id = 1;
			//从还书表里面查询出所有数据
		//$sql = "SELECT * FROM `return` INNER JOIN books_info ON return.book_id=books_info.book_id INNER JOIN user ON return.user_id=user.user_id INNER JOIN book_type ON return.type_id=book_type.type_id WHERE return.user_id=$user_id";
		//echo $sql;die;
		$returnData = DB::select("SELECT * FROM `return` INNER JOIN books_info ON return.book_id=books_info.book_id INNER JOIN user ON return.user_id=user.user_id INNER JOIN book_type ON return.type_id=book_type.type_id WHERE return.user_id=$user_id");
		//dd($returnData);die;
		return view("Admin.returnlist",['returnData'=>$returnData]);
	}

	//续借列表
	//
	public function continueList()
	{
		$user_id = 1;
			//从还书表里面查询出所有数据
		//$sql = "SELECT * FROM `return` INNER JOIN books_info ON return.book_id=books_info.book_id INNER JOIN user ON return.user_id=user.user_id INNER JOIN book_type ON return.type_id=book_type.type_id WHERE return.user_id=$user_id";
		//echo $sql;die;
		$continueData = DB::select("SELECT * FROM `continue_record` INNER JOIN books_info ON continue_record.book_id=books_info.book_id INNER JOIN user ON continue_record.user_id=user.user_id INNER JOIN book_type ON continue_record.type_id=book_type.type_id WHERE continue_record.user_id=$user_id");
		//dd($continueData);die;
		return view("Admin.continuelist",['continueData'=>$continueData]);
	}
	public function updateNum()
	{
		$user_borrownum = DB::select("SELECT user_borrownum FROM user LIMIT 1");
		$num = json_decode(json_encode($user_borrownum),true);
		$num = $num[0]['user_borrownum'];
		return view('Admin.updatenum',['num'=>$num]);
	}

	public function updateNumDo()
	{
	//	echo 1;die;
		$user_borrownum=Input::get('user_borrownum');
		$res = DB::update("UPDATE user SET user_borrownum=$user_borrownum");
		if($res){
			return redirect('admin/updatenum');
		}
	}
		
}

