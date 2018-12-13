<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCartRequest;
use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\ProductSku;
use App\Services\CartService;

class CartController extends Controller
{

    protected $cartService;

    //利用laravel的自动解析功能注入 cartService类
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }


    //添加购物车
    public function add(AddCartRequest $request)
    {
       $this->cartService->add($request->input('sku_id'),$request->input('amount'));

        return [];

    }

    //购物车列表页
    public function index(Request $request)
    {
        //调用get方法获取购物车是skuid
        $cartItems = $this->cartService->get();
        $addresses = $request->user()->addresses()->orderBy('last_used_at','desc')->get();

        return view('cart.index',['cartItems' => $cartItems,'addresses'=>$addresses]);
    }

    //移除购物车按钮
    public function remove(ProductSku $sku,Request $request)
    {
        $this->cartService->remove($sku->id);

        return [];
    }

}
