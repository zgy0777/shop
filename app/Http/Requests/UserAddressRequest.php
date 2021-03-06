<?php

namespace App\Http\Requests;


class UserAddressRequest extends Request
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'province' => 'required',
            'city' => 'required',
            'district' => 'required',
            'address' => 'required',
            'zip' => 'required',
            'contact_name' => 'required',
            'contact_phone' => 'required',
        ];
    }

    public function attributes()
    {
        //将指定属性设置成属性别名
        return [
            'province'      => '省',
            'city'          => '城市',
            'district'      => '地区',
            'address'       => '详细地址',
            'zip'           => '邮编',
            'contact_name'  => '姓名',
            'contact_phone' => '电话',
        ];
    }
}
