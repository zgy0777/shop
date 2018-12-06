<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSku extends Model
{
    //允许注入的字段
    protected $fillable = [
      'title','description','price','stock'
    ];

    //与商品表建立一对多关联
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
