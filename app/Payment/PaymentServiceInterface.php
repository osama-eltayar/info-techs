<?php


namespace App\Payment;


interface PaymentServiceInterface
{
    public function checkout($data);

    public function callback($data);

    public function form();

}
