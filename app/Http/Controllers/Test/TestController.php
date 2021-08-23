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
//        $sended = TurboSMS::sendMessages('+38(097) 844-03-80', 'test');
//        dd($sended);
//        $data = "eyJwYXltZW50X2lkIjoxNzQyODM4Njg1LCJhY3Rpb24iOiJwYXkiLCJzdGF0dXMiOiJzdWNjZXNzIiwidmVyc2lvbiI6MywidHlwZSI6ImJ1eSIsInBheXR5cGUiOiJwcml2YXQyNCIsInB1YmxpY19rZXkiOiJzYW5kYm94X2kyNzQ0Mjg1MjU5MCIsImFjcV9pZCI6NDE0OTYzLCJvcmRlcl9pZCI6IjExIiwibGlxcGF5X29yZGVyX2lkIjoiSDVJT0w4UjYxNjI5NzQ1NDMzMTU1MTMyIiwiZGVzY3JpcHRpb24iOiLQntC\/0LvQsNGC0LAg0LfQsNC80L7QstC70LXQvdC90Y8g4oSWIDExIiwic2VuZGVyX3Bob25lIjoiMzgwOTc4NDQwMzgwIiwic2VuZGVyX2NhcmRfbWFzazIiOiI1MTY4NzUqNjkiLCJzZW5kZXJfY2FyZF9iYW5rIjoicGIiLCJzZW5kZXJfY2FyZF90eXBlIjoibWMiLCJzZW5kZXJfY2FyZF9jb3VudHJ5Ijo4MDQsImFtb3VudCI6MTcwLjAsImN1cnJlbmN5IjoiVUFIIiwic2VuZGVyX2NvbW1pc3Npb24iOjAuMCwicmVjZWl2ZXJfY29tbWlzc2lvbiI6NC4yNSwiYWdlbnRfY29tbWlzc2lvbiI6MC4wLCJhbW91bnRfZGViaXQiOjE3MC4wLCJhbW91bnRfY3JlZGl0IjoxNzAuMCwiY29tbWlzc2lvbl9kZWJpdCI6MC4wLCJjb21taXNzaW9uX2NyZWRpdCI6NC4yNSwiY3VycmVuY3lfZGViaXQiOiJVQUgiLCJjdXJyZW5jeV9jcmVkaXQiOiJVQUgiLCJzZW5kZXJfYm9udXMiOjAuMCwiYW1vdW50X2JvbnVzIjowLjAsInZlcmlmeWNvZGUiOiJZIiwibXBpX2VjaSI6IjciLCJpc18zZHMiOmZhbHNlLCJsYW5ndWFnZSI6InJ1IiwiY3JlYXRlX2RhdGUiOjE2Mjk3NDU0MzMxNTksImVuZF9kYXRlIjoxNjI5NzQ1NDMzMjE3LCJ0cmFuc2FjdGlvbl9pZCI6MTc0MjgzODY4NX0=";
//        dd(json_decode(base64_decode($data)));
        dd(json_decode('{"payment_id":1742859663,"action":"pay","status":"failure","err_code":"err_card_receiver_def","err_description":"У получателя не установлена карта для приема платежей","version":3,"type":"buy","paytype":"privat24","public_key":"sandbox_i27442852590","acq_id":414963,"order_id":"12","liqpay_order_id":"KF91YV2J1629748019132970","description":"Оплата замовлення № 12","ip":"194.44.45.124","amount":100.0,"currency":"UAH","verifycode":"Y","mpi_eci":"7","is_3ds":false,"language":"ru","create_date":1629748019134,"end_date":1629748019139,"transaction_id":1742859663,"code":"err_card_receiver_def"}'));
    }
}
