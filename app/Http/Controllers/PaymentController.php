<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Exceptions\InvalidRequestException;
use Carbon\Carbon;

class PaymentController extends Controller
{
    //
    public function payByAlipay(Order $order,Request $request)
    {
        //判断订单是否属于当前用户
        $this->authorize('own',$order);

        //判断订单是否已关闭支付
        if($order->paid_at || $order->closed){
            throw new InvalidRequestException('订单状态不正确');
        }

        //调用支付宝的网页支付
        return app('alipay')->web([
            'out_trade_no' => $order->no,
            'total_amount' => $order->total_amount,
            'subject'      => '支付 Laravel shop 的订单'.$order->no,
        ]);

    }

    //前端回调页面:支付宝跳转项目页并带上成功参数
    public function alipayReturn()
    {

        try{
            app('alipay')->verify();
        }catch (\Exception $e){
            return view('pages.error',['msg' => '数据不正确']);
        }

       return view('pages.success',['msg' => '付款成功']);
    }

    //服务端回调:成功后服务器会用订单相关数据作为请求项目的接口
    public function alipayNotify()
    {
        //校验输入参数
        $data = app('alipay')->verify();
        //如果订单状态不是成功或者失败，则不走后续的逻辑
        //所有校验状态 https://docs.open.alipay.com/59/103672
        if(!in_array($data->trade_status,['TRADE_SUCCESS','TRADE_FINISHED'])){
            return app('alipay')->success();
        }

        //$data->out_trade_no 拿到订单流水号，并在数据库中查找
        $order = Order::where('no',$data->out_trade_no)->first();
        //正常来说吧u太可能出现支付一笔不存在到订单，此判断为系统健壮性
        if(!$order){
            return 'fail';
        }
        //如果这笔订单已支付
        if($order->paid_at){
            //返回数据给支付宝
            return app('alipay')->success();
        }

        $order->update([
            'paid_at' => Carbon::now(),
            'payment_method' => 'alipay',
            'payment_no' => $data->trade_no,
        ]);

        $this->afterPaid($order);

        return app('alipay')->success();

    }

    public function afterPaid(Order $order)
    {
        event(new OrderPaid($order));
    }



}
