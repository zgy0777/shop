<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
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

    //图片路径转换绝对路径
    public function getImageUrlAttribute()
    {
        //如果image字段本身就是完整都url就直接返回
        if(Str::startsWith($this->attributes['image'],['http://','https://'])){
            return $this->attributes['image'];
        }
        return \Storage::disk('public')->url($this->attributes['image']);
    }


}
