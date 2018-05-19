<!DOCTYPE HTML>
<html>
<head>
<title>Login Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Novus Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="{{asset('admin/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="{{asset('admin/css/style.css')}}" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="{{asset('admin/css/font-awesome.css')}}" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="{{asset('admin/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('admin/js/modernizr.custom.js')}}"></script>
<!--webfonts-->
<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="{{asset('admin/css/animate.css')}}" rel="stylesheet" type="text/css" media="all">
<script src="{{asset('admin/js/wow.min.js')}}"></script>
	<script>
		 new WOW().init();
	</script>

<script src="{{asset('admin/js/metisMenu.min.js')}}"></script>
<script src="{{asset('admin/js/custom.js')}}"></script>
<link href="{{asset('admin/css/custom.css')}}" rel="stylesheet">
</head>
	<div id="page-wrapper">
			<div class="main-page login-page ">
				<h3 class="title1">借书平台登录</h3>
				<div class="widget-shadow">
					<div class="login-top">
						<h4>欢迎来到史上最牛逼的借书平台!</h4>
					</div>
					<div class="login-body">
						{{--<form method="post" action="{{url('login/loginDo')}}">--}}
							<input type="hidden" name="_token" class="_token" value="{{ csrf_token() }}" />

							<input type="text" class="user" name="user_name"  placeholder="Enter your username" required="">

							<input type="password" class="lock" name="user_pwd" placeholder="password">

							<input type="text" name="authcode" class="authcode" placeholder="请输入验证码">

							<img id="captcha_img" border='1' src='{{url('login/yanzhengma')}}?r=<?php echo rand(); ?>' style="width:100px; height:30px" />

							<a href="javascript:void(0)" onclick="document.getElementById('captcha_img').src='{{url('login/yanzhengma')}}?r='+Math.random()">换一个?</a>
						{{--<div id="ve_email" style="display: none">--}}
							{{--<input type="email" name="email">--}}
							{{--<button id="jiaoyan">点击校验</button>--}}
						{{--</div>--}}
							<input type="submit" name="Sign In" value="登录" class="submit">

							<div class="forgot-grid">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>记住我</label>
								
								<div class="clearfix"></div>
							</div>
						{{--</form>--}}
					</div>
				</div>
			</div>
		</div>
<script src="{{asset('js/jquery-1.8.3.js')}}"></script>
<script>
	$(document).on('click','.submit',function(){
        var user_name = $(".user").val();
        var user_pwd  = $(".lock").val();
        var authcode  = $(".authcode").val();
        var ve_email  = $("#ve_email");
        var _this = $(this);
        $.ajax({
			url:"{{url('login/loginDo')}}",
			type:"get",
			data:{user_name:user_name,user_pwd:user_pwd,authcode:authcode},
			success:function(e){
				if(e>=3){
					alert("此账户已出现异常，请进行邮箱验证");
					location.href="email";

				}
			}
        })
	})





</script>



		<script src="{{asset('admin/js/classie.js')}}"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<script src="{{asset('admin/js/jquery.nicescroll.js')}}"></script>
	<script src="{{asset('admin/js/scripts.js')}}"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="{{asset('admin/js/bootstrap.js')}}"> </script>
</body>
</html>