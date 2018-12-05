<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAddress;
use App\Http\Requests\UserAddressRequest;

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

    //新增收货地址
    public function create()
    {
        return view('user_addresses.create_and_edit',['address'=> new UserAddress()]);
    }

    public function store(UserAddressRequest $request)
    {
        //为该用户添加收货地址，只允许以下字段注入
        $request->user()->addresses()->create($request->only([
            'province',
            'city',
            'district',
            'address',
            'zip',
            'contact_name',
            'contact_phone',
        ]));

        return redirect()->route('user_addresses.index');

    }

}
