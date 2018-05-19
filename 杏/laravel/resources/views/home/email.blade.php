<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>校验</title>
</head>
<body>
    <center>
        <h1>这里是校验页面</h1>
        <h1>请您校验账号以保安全</h1>

        <br /> <br /> <br />

        <input type="hidden" name="_token" class="_token" value="{{ csrf_token() }}" />

        <table>
            <tr>
                <td>邮箱  ：</td>
                <td>
                    <input type="text" name="email" class="email">
                    <span id="sp_email"></span>
                </td>
                <td><button id="send_email">点击发送邮件</button></td>
            </tr>
            <tr>
                <td> 校验码：</td>
                <td><input type="text" name="jy_email" class="jy_email"></td>
                <td><button id="jiaoyan">点击校验</button></td>
            </tr>
        </table>


        <br />

    </center>
</body>
</html>

<script src="{{asset('js/jquery-1.8.3.js')}}"></script>
<script>



    $(document).on('blur','.email',function(){
        // alert(1);
         var email = $(".email").val();
        // alert(email);
        var str = /^\d{5,12}@[qQ][qQ]\.(com|cn)$/i;
        if(str.test(email)){
            $("#sp_email").html("<font color='green'>√√</font>");
        }else{
            $("#sp_email").html("<font color='red'>一定要正儿八经的QQ邮箱哦</font>");
        }
    })
    $(document).on('click','#send_email',function(){
        var email = $(".email").val();
        // alert(email);
        var _this = $(this);
        $.ajax({
            url:"{{url('email/DoEmail')}}",
            type:"get",
            data:{email:email},
            success:function(e){
                // console.log(e)
                alert(e)
            }
        })
    })

</script>