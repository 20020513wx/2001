<?php

namespace App\Http\Controllers\Admin;

use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;

use AlibabaCloud\Client\Exception\ServerException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Code;
use App\Model\Admin;
use Validator;
class LoginController extends Controller
{
    //登录视图
    public function login(Request $request){
        $code=$this->getImageCodeUrl($request);
        return view("admin.login",["code"=>$code]);
    }
    //登录执行
    public function loginDo(){
        $data=request()->post();
        // dd($data);
        $code = request()->session()->get('code');
        if($data["codes"]!=$code){
            $response=[
                "code"=>"0",
                "msg"=>"验证码错误",
            ];
            return json_encode($response,JSON_UNESCAPED_UNICODE);
        }
        if(empty($data["admin_tel"])){
            $response=[
                "code"=>"0",
                "msg"=>"手机号不能为空",
            ];
            return json_encode($response,JSON_UNESCAPED_UNICODE);
        }
        if(empty($data["admin_pwd"])){
            $response=[
                "code"=>"0",
                "msg"=>"密码不能为空",
            ];
            return json_encode($response,JSON_UNESCAPED_UNICODE);
        }
        $where=[
            ["admin_tel","=",$data["admin_tel"]]
        ];
        $adminInfo=Admin::where($where)->first();
        // dd(decrypt($adminInfo->admin_pwd));
        if(!empty($adminInfo)){
            if(decrypt($adminInfo->admin_pwd)!=$data["admin_pwd"]){
                $response=[
                    "code"=>"0",
                    "msg"=>"密码错误",
                ];
                return json_encode($response,JSON_UNESCAPED_UNICODE);
            }else{
                session(["adminInfo"=>$adminInfo]);
                $response=[
                    "code"=>"1",
                    "msg"=>"登录成功",
                ];
                return json_encode($response,JSON_UNESCAPED_UNICODE);
            }
            
        }else{
            $response=[
                "code"=>"0",
                "msg"=>"未查询到账号",
            ];
            return json_encode($response,JSON_UNESCAPED_UNICODE);
        }
    }
    //注册视图
    public function reg(){
        return view("admin.reg");
    }
    //注册执行
    public function regDo(){
        $data=request()->post();
        $reg="/^\d{11}$/";
        $regs="/^\d{6}$/";
        $where=[
            ["admin_tel","=",$data["admin_tel"]]
        ];
        $js=Admin::where($where)->first();
        if(empty($data["admin_tel"])){
            $response=[
                "code"=>"0",
                "msg"=>"手机号不能为空",
            ];
            return json_encode($response,JSON_UNESCAPED_UNICODE);die;
        }else if(preg_match($reg,$data['admin_tel'])<1){
            $response=[
                "code"=>"0",
                "msg"=>"手机号格式有误",
            ];
            return json_encode($response,JSON_UNESCAPED_UNICODE);die;
        }else if(!empty($js)){
            $response=[
                "code"=>"0",
                "msg"=>"手机号已注册",
            ];
            return json_encode($response,JSON_UNESCAPED_UNICODE);die;
        }
        

        //验证码验证
        if(empty($data["admin_code"])){
            $response=[
                "code"=>"0",
                "msg"=>"验证码不能为空",
            ];
            return json_encode($response,JSON_UNESCAPED_UNICODE);die;
        }
        $code=session("codeInfo");
        if($code["code"]!=$data["admin_code"]){
            $response=[
                "code"=>"0",
                "msg"=>"验证码错误",
            ];
            return json_encode($response,JSON_UNESCAPED_UNICODE);die;
        }else if((time()-$code["time"])>120){
            $response=[
                "code"=>"0",
                "msg"=>"验证码失效，请重新发送",
            ];
            return json_encode($response,JSON_UNESCAPED_UNICODE);die;
        }

        //密码
        if(empty($data["admin_pwd"])){
            $response=[
                "code"=>"0",
                "msg"=>"密码不能为空",
            ];
            return json_encode($response,JSON_UNESCAPED_UNICODE);die;
        }
        if(empty($data["pwds"])){
            $response=[
                "code"=>"0",
                "msg"=>"确认密码不能为空",
            ];
            return json_encode($response,JSON_UNESCAPED_UNICODE);die;
        }
        if(preg_match($regs,$data['admin_pwd'])<1){
            $response=[
                "code"=>"0",
                "msg"=>"密码为6位数字",
            ];
            return json_encode($response,JSON_UNESCAPED_UNICODE);die;
        }
        if($data["admin_pwd"]!=$data["pwds"]){
            $response=[
                "code"=>"0",
                "msg"=>"确认密码与密码不同",
            ];
            return json_encode($response,JSON_UNESCAPED_UNICODE);die;
        }
        $post=[
            "admin_tel"=>$data["admin_tel"],
            "admin_pwd"=>encrypt($data["admin_pwd"]),
            "admin_time"=>time()
        ];
        $res=Admin::insert($post);
        if($res){
            $response=[
                "code"=>"1",
                "msg"=>"注册成功",
            ];
            return json_encode($response,JSON_UNESCAPED_UNICODE);die;
            echo "注册成功";
        }else{
            $response=[
                "code"=>"0",
                "msg"=>"注册失败",
            ];
            return json_encode($response,JSON_UNESCAPED_UNICODE);die;
            echo "注册失败";
        }
    }
    //验证码
    public function code(){
        $tel=request()->tel;
        $codes=new Code();
        $code=rand("100000","999999");
        $res=$codes->Vcode($tel,$code);
        
        if($res['Code']=="OK"){
            $codeInfo=[
                'code'=>$code,
                'tel'=>$tel,
                'time'=>time()
            ];
            session(['codeInfo'=>$codeInfo]);
            echo "ok";
        }else{
            echo "no";
        }
    }

    public function getImageCodeUrl(Request $request){
        $request->session()->start();
        $sid = $request->session()->getId();
        $domain = str_replace(
            $request->path(),
            '',
            $request->url()
        );
        $image_code_url = $domain . 'admin/imageCode?sid='.$sid;
        $api_return_arr = [
            'image_url'=>$image_code_url,
            'sid'=>$sid
        ];
        return $api_return_arr;
//        echo $sid;
//        echo $image_code_url;
//        exit;

    }
    public function imageCode( Request $request){
        // 设置session
//        session_start();
        // 设置验证码生成几位
        $num = 4;
        // 设置宽度
        $width = 100;
        // 设置高度
        $height = 30;
        //生成验证码，也可以用mt_rand(1000,9999)随机生成
        $Code = "";
        for ($i = 0; $i < $num; $i++) {
            $Code .= mt_rand(0,9);
        }

        // 将生成的验证码写入session
        $request->session()->put('code', $Code);
        $request->session()->save();

        // 设置头部
        header("Content-type: image/png");

        // 创建图像（宽度,高度）
        $img = imagecreate($width,$height);

        //创建颜色 （创建的图像，R，G，B）
        $GrayColor = imagecolorallocate($img,230,230,230);
        $BlackColor = imagecolorallocate($img, 0, 0, 0);
        $BrColor = imagecolorallocate($img,52,52,52);

        //填充背景（创建的图像，图像的坐标x，图像的坐标y，颜色值）
        imagefill($img,0,0,$GrayColor);

        //设置边框
        imagerectangle($img,0,0,$width-1,$height-1, $BrColor);

        //随机绘制两条虚线 五个黑色，五个淡灰色
        $style = array ($BlackColor,$BlackColor,$BlackColor,$BlackColor,$BlackColor,$GrayColor,$GrayColor,$GrayColor,$GrayColor,$GrayColor);
        imagesetstyle($img, $style);
        imageline($img,0,mt_rand(0,$height),$width,mt_rand(0,$height),IMG_COLOR_STYLED);
        imageline($img,0,mt_rand(0,$height),$width,mt_rand(0,$height),IMG_COLOR_STYLED);

        //随机生成干扰的点
        for ($i=0; $i < 200; $i++) {
            $PointColor = imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
            imagesetpixel($img,mt_rand(0,$width),mt_rand(0,$height),$PointColor);
        }

        //将验证码随机显示
        for ($i = 0; $i < $num; $i++) {
            $x = ($i*$width/$num)+mt_rand(5,12);
            $y = mt_rand(5,10);
            imagestring($img,7,$x,$y,substr($Code,$i,1),$BlackColor);
        }

        //输出图像
        imagepng($img);
        //结束图像
        imagedestroy($img);
        exit;
    }
    //退出
    public function quit(){
        request()->session()->forget("adminInfo");
        return redirect("admin/login");
    }
        
}
