<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSkusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_skus', function (Blueprint $table) {
            $table->increments('id')->comment('id');
            $table->string('title')->comment('sku标题');
            $table->string('description')->comment('sku描述');
            $table->decimal('price', 10, 2)->comment('sku价格');
            $table->unsignedInteger('stock')->comment('sku库存');
            $table->unsignedInteger('product_id')->comment('外键，关联product的主键id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('product_skus');
    }
}
