<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCartRequest;
use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\ProductSku;

class CartController extends Controller
{
    //添加购物车
    public function add(AddCartRequest $request)
    {
        $user = $request->user();
        $skuId = $request->input('sku_id');
        $amount = $request->input('amount');

        //判断商品是否已经在购物车
        if($cart = $user->cartItems()->where('product_sku_id',$skuId)->first()){
            //如果存在则直接叠加数量
            $cart->update([
                'amount' => $cart->amount + $amount,
            ]);
        }else{
            //否则新建购物车记录
            $cart = new CartItem(['amount' => $amount]);
            //associate 外键关联？ 关联的表同时新增？
            $cart->user()->associate($user);
            $cart->productSku()->associate($skuId);
            $cart->save();
        }

        return [];

    }

    //购物车列表页
    public function index(Request $request)
    {
        $cartItems = $request->user()->cartItems()->with(['productSku.product'])->get();

        return view('cart.index',['cartItems' => $cartItems]);
    }

    //移除购物车按钮
    public function remove(ProductSku $sku,Request $request)
    {
        $request->user()->cartItems()->where('product_sku_id',$sku->id)->delete();

        return [];
    }

}
