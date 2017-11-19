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

 	$invoice = new Invoice;

  	$invoice->inv_number = hexdec(uniqid());

  	$invoice->user_id = auth()->id();

  	$invoice->inv_total = $basket->totalActualPrice();

  	$invoice->inv_discount = $basket->discountPercentage();

  	$invoice->inv_net = $basket->basketTotalPrice();

  	session(['invoice' => $invoice]);

 }



}