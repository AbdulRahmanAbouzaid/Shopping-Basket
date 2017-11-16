<?php

namespace App\Repositories;

use App\Invoice;
use App\Repositories\Baskets;


class Invoices{

	protected $inv_number;

/************************************
 ***    create The invoice     	  ***
 ************************************/

 public function create(Baskets $basket)
 {
  
  $invoice = Invoice::create([

            'inv_number' => hexdec(uniqid()),

            'user_id' => auth()->id(),

            'inv_total' => $basket->totalActualPrice(),

            'inv_discount' => $basket->discountPercentage(),

            'inv_net' => $basket->basketTotalPrice()

        ]);

        return $invoice;

 }



}