<?php

namespace App\Listeners;

use App\Events\OrderPaid;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\OrderItem;

class UpdateProductSoldCount implements ShouldQueue
{

    public function __construct()
    {
        //
    }

    // Laravel 会默认执行监听器的handle方法，触发的事件会作为handle方法的参数
    public function handle(OrderPaid $event)
    {
        //从事件对象中取出对应的订单
        $order = $event->getOrder();
        //预加载商品数据
        $order->load('items.product');
        //循环遍历订单的商品
        foreach($order->items as $item){
            $product = $item->product;
            //计算对应商品的销量
            $soldCount = OrderItem::query()
                ->where('product_id',$product->id)
                ->whereHas('order',function($query){
                    $query->whereNotNull('paid_at'); //关联的订单状态是已支付;
                })->sum('amount');
            //更新商品的数量
            $product->update([
                'sold_count' => $soldCount,
            ]);
        }
    }
}
