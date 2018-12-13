<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Order;



class OrderPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    //只有当前用户才可以编辑订单
    public function own(User $user, Order $order)
    {
        return $order->user_id == $user->id;
    }


}
