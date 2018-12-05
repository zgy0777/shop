<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    //
    protected $fillable = [
        'province',
        'city',
        'district',
        'address',
        'zip',
        'contact_name',
        'contact_phone',
        'last_used_at',
    ];
    //last_used_at字段是一个事件日期，  之后的  $address->last_used_at 返回的是一个Carbon事件对象
    protected $dates = ['last_used_at'];

    //与用户建立一对多关联，一个用户有多个地址，一个地址只属于一个用户
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //获取全名称地址，不用每次拼接
    public function getFullAddressAttribute()
    {
        return "{$this->province}{$this->city}{$this->district}{$this->address}";
    }

}
