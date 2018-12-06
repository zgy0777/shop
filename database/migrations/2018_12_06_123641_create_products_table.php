<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 32)->comment('商品标题');
            $table->text('description')->comment('商品描述');
            $table->string('image')->comment('商品图片');
            $table->boolean('on_sale')->comment('是否出售');
            $table->float('rating')->default(5)->comment('商品评分，默认5星');
            $table->unsignedInteger('sold_count')->default(5)->comment('出售数量');
            $table->unsignedInteger('review_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
