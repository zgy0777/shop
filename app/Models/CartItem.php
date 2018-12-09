<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    //允许注入字段
    protected $fillable = ['amount'];
    //时间戳维护
    public $timestamps = false;

    //与用户表建立一对多关系，一个用户多个购物车记录
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //用户sku表建立一对多关系
    public function productSku()
    {
        return $this->belongSto(ProductSku::class);
    }

}
