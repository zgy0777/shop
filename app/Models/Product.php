<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //允许注入数据库字段
    protected $fillable = [
        'title','description','image','on_sale','rating','sold_count','review_count','price'
    ];

    //字段转换
    protected $casts = [
        'on_sale' => 'boolean',
    ];

    //与productSku建立一对多关联
    public function skus()
    {
        return $this->hasMany(ProductSku::class);
    }


}
