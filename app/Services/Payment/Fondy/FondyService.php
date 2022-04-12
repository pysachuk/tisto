<?php

namespace App\Services\Payment\Fondy;

use App\Models\Order;
use App\Models\Transaction;
use Cloudipsp\Checkout;
use Cloudipsp\Configuration;
use Illuminate\Support\Facades\Http;

class FondyService
{
    protected $merhantId;
    protected $secretKey;
    protected $fondy;

    public function __construct()
    {
        $this->merhantId = config('fondy.merchant_id');
        $this->secretKey = config('fondy.secret_key');
        Configuration::setApiVersion('1.0');
        Configuration::setMerchantId($this->merhantId);
        Configuration::setSecretKey($this->secretKey);
    }



    public function getPaymentUrl(Transaction $transaction)
    {
        $siteUrl = config('app.temporary_url') ?? config('app.url');
        $responseUrl = $siteUrl.route('order.payed', ['order' => $transaction->order], false);
        $serviceUrl = $siteUrl.route('payment.result', [], false);

        $data = [
            'order_desc' => 'TISTO - Оплата замовлення № '.$transaction->order->id,
            'currency' => 'UAH',
            'amount' => $transaction->order->summ * 100,
            'response_url' => $responseUrl,
            'server_callback_url' => $serviceUrl,
            'order_id' => $transaction->transaction_id,
            'lang' => 'uk',
            'product_id' => $transaction->order->id,
            'lifetime' => 36000,
        ];

        return Checkout::url($data)->getData()['checkout_url'] ?? false;
    }

    public function redirectForPayment(Transaction $transaction)
    {
        $url = $this->getPaymentUrl($transaction);
        if($url) {
            return redirect($url);
        }
        \Log::error('Fondy not returned payment url!');
        abort(404);
    }

    public function getPaymentStatus(Transaction $transaction)
    {
        $data = [
            'order_id' => $transaction->transaction_id,
            'merchant_id' => Configuration::getMerchantId()
        ];
        $data['signature'] = $this->generateSignature(Configuration::getMerchantId(), Configuration::getSecretKey(), $data);
        $data = ['request' => $data];
        $response = Http::withHeaders(['Content-Type' => 'application/json'])
            ->post('https://pay.fondy.eu/api/status/order_id', $data);

        if($response->ok()) {
            return $response->object()->response;
        }

        \Log::error('Fondy error status payment');
        abort(404);

    }

    private function generateSignature( $merchant_id , $password , $params = array() )
    {
        $params['merchant_id'] = $merchant_id;
        $params = array_filter($params,'strlen');
        ksort($params);
        $params = array_values($params);
        array_unshift( $params , $password );
        $params = join('|',$params);

        return(sha1($params));

    }
}
