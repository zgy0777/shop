<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //创建30个商品
        $products = factory(\App\Models\Product::class,30)->create();

        foreach($products as $product){
            //创建3个sku，并且每个sku到 'product_id' 字段都设为当前循环都商品id
            $skus = factory(\App\Models\ProductSku::class,3)->create(['product_id' => $product->id ]);
            //找出价格最低的sku价格，把商品设置为该价格
            $product->update(['price' => $skus->min('price') ]);
        }
    }
}
