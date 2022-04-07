<?php

namespace App\Services\Payment\Fondy;

use App\Models\Order;
use Cloudipsp\Checkout;
use Cloudipsp\Configuration;

class FondyService
{
    protected $merhantId;
    protected $secretKey;
    protected $fondy;

    public function __construct()
    {
        $this->merhantId = config('fondy.merchant_id');
        $this->secretKey = config('fondy.secret_key');
        Configuration::setMerchantId($this->merhantId);
        Configuration::setSecretKey($this->secretKey);
    }

    public function getPaymentUrl(Order $order)
    {
        $data = [
            'order_desc' => 'tests SDK',
            'currency' => 'UAH',
            'amount' => $order->summ * 100,
            'response_url' => 'http://site.com/responseurl',
            'server_callback_url' => 'http://site.com/callbackurl',
            'sender_email' => 'test@fondy.eu',
            'lang' => 'ru',
            'product_id' => 'some_product_id',
            'lifetime' => 36000,
            'merchant_data' => array(
                'custom_data1' => 'Some string',
                'custom_data2' => '00000000000',
                'custom_data3' => '3!@#$%^&(()_+?"}'
            )
        ];

        $url = Checkout::url($data);

        return $url->getData();
    }
}
