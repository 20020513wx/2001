<center>
<button><a href="/admin/reg">去注册</a></button>
<h1>登录</h1>
    请输入手机号<input type="text" class="tel" name="admin_tel">{{$errors->first("admin_tel")}}{{session("msg")}}<br>
    请输入密码<input type="text" id="admin_pwd" name="admin_pwd">{{$errors->first("admin_pwd")}}<br>
    验证码：<input type="hidden" id="sid" value="{{$code['sid']}}">
    <input type="text" name="codes" class="codes">
    <img id="imageUrl" src="{{$code['image_url']}}">
    <a href="javascript:;"  id="code" class="aaa"><u>换一张</u></a><br>
    <button class="btn">登录</button>
</center>
<script src="/jquery.js"></script>
<script>
//登录
    $(function(){
        $(document).on("click",".btn",function(){
            var _this=$(this)
            var admin_tel=$(".tel").val();
            var admin_pwd=$("#admin_pwd").val();
            var codes=$(".codes").val();
            if(admin_tel==""){
                alert("手机号不能为空");
                return false;
            }
            if(admin_pwd==""){
                alert("密码不能为空");
                return false;
            }
            if(codes==""){
                alert("验证码不能为空");
                return false;
            }
            $.ajax({
                url:"{{url('admin/loginDo')}}",
                type:"post",
                data:{admin_tel:admin_tel,admin_pwd:admin_pwd,codes:codes},
                dataType:"json",
                success:function(res){
                    // console.log(res)
                    if(res.code==0){
                        alert(res.msg)
                    }else if(res.code==1){
                        alert(res.msg);
                        location.href="/";
                    }
                }
            })
        })
        $(document).on("click",".aaa",function(){
            window.location.reload();
        })
    })
    
</script>