<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAddressController extends Controller
{
    //收货地址列表页
    public function index(Request $request)
    {
        return view('user_addresses.index',[
            //查出该用户的所有地址，并且将该用户的所有信息赋值给addresses，
            'addresses' => $request->user()->addresses,
        ]);
    }
}
