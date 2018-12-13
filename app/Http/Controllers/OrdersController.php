<?php

namespace App\Http\Controllers;

use App\Jobs\CloseOrder;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Models\ProductSku;
use App\Models\UserAddress;
use App\Models\Order;
use Carbon\Carbon;
use App\Exceptions\InvalidRequestException;
use App\Services\CartService;
use App\Services\OrderService;


class OrdersController extends Controller
{


    //订单生成
    public function store(OrderRequest $request, OrderService $orderService)
    {
        $user    = $request->user();
        $address = UserAddress::find($request->input('address_id'));

        return $orderService->store($user, $address, $request->input('remark'), $request->input('items'));
    }

    //用户订单列表页
    public function index(Request $request)
    {
        $orders = Order::query()
            //使用with预加载，避免N+1问题
              ->with(['items.product','items.productSku'])
              ->where('user_id',$request->user()->id)
              ->orderBy('created_at','desc')
              ->paginate();

        return view('orders.index',['orders'=>$orders]);

    }

    //用户订单详情页
    public function show(Order $order, Request $request)
    {
        $this->authorize('own', $order);
        return view('orders.show', ['order' => $order->load(['items.productSku', 'items.product'])]);
    }


}
