<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\LiqPay;

class TestController extends Controller
{
    public function index()
    {
        $public_key = 'sandbox_i27442852590';
        $private_key = 'sandbox_8KbkvMYXqlyUGkIRDA6lfsDaH6ct9bIR5iUEwfi5';
        $liqpay = new LiqPay($public_key, $private_key);
        $html = $liqpay->cnb_form(array(
            'action'         => 'pay',
            'amount'         => '1',
            'currency'       => 'UAH',
            'description'    => 'description text',
            'order_id'       => 'order_id_1',
            'version'        => '3',
            'result_url'     => 'tisto.loc/',
        ));
        return $html;
    }
}
