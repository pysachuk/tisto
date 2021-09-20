<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Page;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MainController extends Controller
{

    public function index()
    {
//        $json = '{"payment_id":1769516325,"action":"pay","status":"success","version":3,"type":"buy","paytype":"privat24","public_key":"sandbox_i27442852590","acq_id":414963,"order_id":"79","liqpay_order_id":"LW0NTIJ81632158352210924","description":"Оплата замовлення № 79","sender_phone":"380978440380","sender_card_mask2":"414960*21","sender_card_bank":"pb","sender_card_type":"visa","sender_card_country":804,"amount":147.0,"currency":"UAH","sender_commission":0.0,"receiver_commission":3.68,"agent_commission":0.0,"amount_debit":147.0,"amount_credit":147.0,"commission_debit":0.0,"commission_credit":3.68,"currency_debit":"UAH","currency_credit":"UAH","sender_bonus":0.0,"amount_bonus":0.0,"mpi_eci":"7","is_3ds":false,"language":"ru","create_date":1632158352213,"end_date":1632158352269,"transaction_id":1769516325}';
//        dd(json_decode($json));
        $header_image = Page::getHeaderImage('main');
        $categories = Category::all();
        return view('shop.main.menu', compact('categories', 'header_image'));
    }
    public function info()
    {
        $data['header_image'] = Page::getHeaderImage('main');
        $data['info'] = Page::getPage('info');
        $data['contacts'] = Page::getPage('contacts');
        return view('shop.main.info', compact('data'));
    }
}
