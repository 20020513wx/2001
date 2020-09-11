<center>
<button><a href="/admin/login">去登录</a></button>
<h1>注册</h1>
    
        请输入手机号<input type="text" class="tel" name="admin_tel"><br>
        请输入验证码<input type="tel" name="admin_code" id="tel_code">
        <b>
            <span class="dyButton" id="span_tel">获取</span>
        </b><br>
        请输入密码<input type="text" name="admin_pwd" id="admin_pwd"><br>
        确认密码<input type="text" name="pwds" id="pwds"><br>
        <button class="btn">注册</button>
</center>
<script src="/jquery.js"></script>
<script>
//发送邮箱
    $(function(){
        //验证码发送
        $(document).on("click","#span_tel",function(){
            var _this=$(this)
            var tel=$(".tel").val();
            
            // var reg="/^[0-9]{11}$/";
            if(tel==""){
                alert("手机号不能为空");
                return false;
            }
            $.ajax({
                url:"{{url('admin/code')}}",
                type:"post",
                data:{tel:tel},
                success:function(res){
                    if(res=="ok"){
                        alert("验证码发送成功");
                    }else{
                        alert("发送失败");
                    }
                }
            })
        })
        $(document).on("click",".btn",function(){
            var _this=$(this)
            var admin_tel=$(".tel").val();
            var admin_code=$("#tel_code").val();
            var admin_pwd=$("#admin_pwd").val();
            var pwds=$("#pwds").val();
            if(admin_tel==""){
                alert("手机号不能为空");
                return false;
            }
            if(admin_code==""){
                alert("验证码不能为空");
                return false;
            }
            if(admin_pwd==""){
                alert("密码不能为空");
                return false;
            }
            if(pwds==""){
                alert("确认密码不能为空");
                return false;
            }
            $.ajax({
                url:"{{url('admin/regDo')}}",
                type:"post",
                data:{admin_tel:admin_tel,admin_code:admin_code,admin_pwd:admin_pwd,pwds:pwds},
                dataType:"json",
                success:function(res){
                    if(res.code==0){
                        alert(res.msg)
                    }else if(res.code==1){
                        alert(res.msg)
                        location.href="login";
                    }
                }
            })
        })
    })
    
</script>