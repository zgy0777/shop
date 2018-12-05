<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Cache;


class EmailVerificationNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    //发送邮件时会调用此方法来构建邮件内容，参数就是 App\Models\User 对象
    public function toMail($notifiable)
    {
        //生成随机str_random;
        $token = str_random(16);

        //往缓存写入token和email
        Cache::set('email_verification_'.$notifiable->email,$token,30);

        //用户点击连接，携带email和token参数;
        $url = route('email_verification.verify',['email' => $notifiable->email,'token' => $token ]);

        return (new MailMessage)
                    ->greeting($notifiable->name."您好:")
                    ->subject("注册成功，请验证您的邮箱")
                    ->line('验证成功.')
                    ->action('验证', $url)
                    ->line('line_line_line');

    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
