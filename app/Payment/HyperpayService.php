<?php


namespace App\Payment;


class HyperpayService implements PaymentServiceInterface
{

    public function checkout($paymentData)
    {
        $url  = config('hyperpay.base_url') ."/v1/checkouts";
        $data = "entityId=". config('hyperpay.entity_id') .
                "&amount=${paymentData['amount']}" .
                "&currency=USD" .
                "&paymentType=DB";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch,
                    CURLOPT_HTTPHEADER,
                    [
                        'Authorization:'. config('hyperpay.authorization')
                    ]);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, config('hyperpay.production_status'));// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        return json_decode($responseData,true) ;
    }

    public function callback($data)
    {
        $url = config('hyperpay.base_url');
        $url .= $data['resourcePath'];
        $url .= "?entityId=". config('hyperpay.entity_id');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch,
                    CURLOPT_HTTPHEADER,
                    [
                        'Authorization:'. config('hyperpay.authorization')
                    ]);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, config('hyperpay.production_status'));// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        return json_decode($responseData,true);
    }

    public function form()
    {
        return 'user.payments.forms.hyperpay';
    }
}
