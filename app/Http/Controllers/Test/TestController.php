<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Daaner\TurboSMS\Facades\TurboSMS;
use Illuminate\Http\Request;
use App\Http\Controllers\LiqPay;

class TestController extends Controller
{
    public function index()
    {
        $sended = TurboSMS::sendMessages('+38(097) 844-03-80', 'test');
        dd($sended);
    }
}
