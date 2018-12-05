<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password','email_verified',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    //eloquent属性类型转换
    protected $casts = [
        'email_verified' => 'boolean'
    ];

    //建立一对多关联，一个用户有多个地址
    public function addresses()
    {
        return $this->hasMany(UserAddress::class);
    }

}
