<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>左侧导航menu</title>
<link href="{{asset('admin/css/css.css')}}" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="{{asset('admin/js/sdmenu.js')}}"></script>
<script type="text/javascript">
	// <![CDATA[
	var myMenu;
	window.onload = function() {
		myMenu = new SDMenu("my_menu");
		myMenu.init();
	};
	// ]]>
</script>
<style type=text/css>
html{ SCROLLBAR-FACE-COLOR: #538ec6; SCROLLBAR-HIGHLIGHT-COLOR: #dce5f0; SCROLLBAR-SHADOW-COLOR: #2c6daa; SCROLLBAR-3DLIGHT-COLOR: #dce5f0; SCROLLBAR-ARROW-COLOR: #2c6daa;  SCROLLBAR-TRACK-COLOR: #dce5f0;  SCROLLBAR-DARKSHADOW-COLOR: #dce5f0; overflow-x:hidden;}
body{overflow-x:hidden; background:url({{url('admin/images/main/leftbg.jpg')}}) left top repeat-y #f2f0f5; width:194px;}
</style>
</head>
<body onselectstart="return false;" ondragstart="return false;" oncontextmenu="return false;">
<div id="left-top">
	<div><img src="{{asset('admin/images/main/member.gif')}}" width="44" height="44" /></div>
    <span>用户：admin<br>角色：超级管理员</span>
</div>
    <div style="float: left" id="my_menu" class="sdmenu">
      <div class="collapsed">
        <span>分类管理</span>
        <a href="{{url('admin/type_info')}}" target="mainFrame" onFocus="this.blur()">分类添加</a>
        <a href="{{url('admin/type_list')}}" target="mainFrame" onFocus="this.blur()">分类列表</a>
        
      </div>
      <div>
        <span>图书管理</span>
        <a href="{{url('admin/bookadd')}}" target="mainFrame" onFocus="this.blur()">图书添加</a>
        <a href="{{url('admin/book_list')}}" target="mainFrame" onFocus="this.blur()">图书列表</a>
      </div>
        <div class="collapsed">
        <span>还书管理</span>
        <a href="{{url('admin/returnlist')}}" target="mainFrame" onFocus="this.blur()">还书列表</a>
      </div>
      <div>
        <span>续借管理</span>
        <a href="{{url('admin/continuelist')}}" target="mainFrame" onFocus="this.blur()">续借列表</a>
      </div>
     
      <div>
        <span>库存管理</span>
        <a href="{{url('admin/sku_info')}}" target="mainFrame" onFocus="this.blur()">库存添加</a>
        <a href="{{url('admin/sku_list')}}" target="mainFrame" onFocus="this.blur()">库存列表</a>
      </div>

       <div>
        <span>系统设置</span>
        <a href="{{url('admin/updatenum')}}" target="mainFrame" onFocus="this.blur()">图书限制</a>
        <a href="{{url('admin/main')}}" target="mainFrame" onFocus="this.blur()">管理员添加</a>
        <a href="{{url('admin/main')}}" target="mainFrame" onFocus="this.blur()">管理员列表</a>
      </div>
      
    </div>
</body>
</html>