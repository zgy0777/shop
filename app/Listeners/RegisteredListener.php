<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Auth\Events\Registered;
use App\Notifications\EmailVerificationNotification;
//implements ShouldQueue 让这个监听器异步执行
class RegisteredListener
{


    public function __construct()
    {
        //
    }

    //当事件被触发时，对应该事件当监听器handle()方法就会被调用
    public function handle(Registered $event)
    {
        //获取到刚刚注册到用户
        $user = $event->user;
        //调用notify发送通知
        $user->notify(new EmailVerificationNotification());
    }
}
