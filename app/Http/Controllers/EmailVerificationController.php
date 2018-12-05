<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\User;
use Cache;
use MongoDB\Driver\Exception\ExecutionTimeoutException;
use App\Notifications\EmailVerificationNotification;
use Mail;


class EmailVerificationController extends Controller
{
    //
    public function verify(Request $request)
    {
        //从url中获取token和email参数
        $email = $request->input('email');
        $token = $request->input('token');
        //dd($email,$token);

        //如果url没有email或Token 抛出一场
        if(!$email || !$token){
            throw new Exception('验证码连接不正确');
        }

        //从缓存取出key，判断是否相同，不相同则抛出异常;
        if($token != Cache::get('email_verification_'.$email)){
            throw new Exception('验证连接不正确或已过期');
        }

        //判断该用户是否存在
        //一般情况下能点击连接的都是已注册用户，代码健壮性考虑
        if(!$user=User::where('email',$email)->first()){
            throw new Exception('该用户不存在');
        }

        //忘掉缓存
        Cache::forget('email_verification_'.$email);

        //修改用户的邮箱验证为true
        $user->update(['email_verified' =>true ]);

        //跳转到注册成功页面
        return view('pages.success',['msg' => '验证邮箱成功']);

    }

    public function send(Request $request)
    {
        $user = $request->user();

        //判断用户是否已激活
        if($user->email_verified){
            throw new Exception('你已验证通过，无需验证');
        }

        //调用notify()发送邮件
        $user->notify(new EmailVerificationNotification());

        return view('pages.success',['msg' => '邮件发送成功']);

    }


}
