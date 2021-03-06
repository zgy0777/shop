<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;//接收参数;

class InvalidRequestException extends Exception
{
    //
    public function __construct(string $message = "" , int $code = 400)
    {
        parent::__construct($message,$code);
    }

    public function render(Request $request)
    {
        if($request->expectsJson()){
            //json() 方法是第二个参数就是http返回码
            return response()->json(['msg' => $this->message],$this->code);
        }

        return view('pages.error',['msg' => $this->message]);

    }


}
