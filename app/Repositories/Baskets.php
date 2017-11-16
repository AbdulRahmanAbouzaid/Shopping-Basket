<?php

namespace App\Repositories;

use App\Product;

class Baskets{


	private $product;

	
	public function getAllProducts()
	{
		return session('products');
	}


	public function getSingleProduct($code){

		return Product::where('code', $code)->first();
	}


		
	// Add Product To the Basket
	public function attach(Product $product, $quantity)
	{

		$this->product = [

			'code' => $product->code,
			'name' => $product->name,
			'actualPrice' => $product->price,
			'price' => $product->netPrice(),
			'quantity' => $quantity,
			'totalPrice' => $product->quantitiesPrice($quantity)

		];

		$products = session('products');

		$products[$product->code] = $this->product;

		session(['products' => $products]);

	}


	//delete Product form the basket
	public function detachProduct($code)
	{
		$products = session('products');

		unset($products[$code]);

		session(['products' => $products]);
	}


	//update a specific product in the basket 
	public function editProdcut($code, $newQuantity)
	{

		$products = session('products');

		if($newQuantity > $this->avaialableQty($code) || $newQuantity < 1 ){

		 	return response()->json([
				'newPrice' => $products[$code]['totalPrice'],
				'totalPrice' => $this->basketTotalPrice()
			
			 ]);

		}

		$products[$code]['quantity'] = $newQuantity;

		$products[$code]['totalPrice'] = $products[$code]['price'] * $newQuantity;

		session(['products' => $products]);

		$totalPrice = $this->basketTotalPrice();

		return response()->json([
			
				 'newPrice' => $products[$code]['totalPrice'],
				 'totalPrice' => $totalPrice
			
			 ]);

	}


	// return the available quantity of a product
	public function avaialableQty($code)
	{
		
		return $this->getSingleProduct($code)->quantity;	 

	}


	// Get total price of the basket After discount!
	public function basketTotalPrice()
	{

		$totalPrice = 0;

		$products = session('products');

		foreach ($products as $product) {
			
			$totalPrice += $product['totalPrice'];
		}

		return $totalPrice;
		
	}


	/*************************************
    /* Get Basket Price Before Discount **
    *************************************/
    public function totalActualPrice()
    {

    	$products = session('products');

        $actualTotal = 0; 

        foreach ($products as $product) {
            
            $price = $product['actualPrice'];

            $quantity = $product['quantity'];

            $actualTotal += $price * $quantity;

        }

        return $actualTotal;

    }



    /**************************************
    /* Get The Whole Discount Percentage **
    ***************************************/
    public function discountPercentage()
    {

        $total = $this->totalActualPrice();

        $discount = $total - $this->basketTotalPrice();

        $discount_pct = ($discount / $total) * 100;

        return $discount_pct;
    }



    public function decreaseQuantity($code, $requestedQuantity)
    {
    	$product = $this->getSingleProduct($code);

    	$quantity = $product->quantity - $requestedQuantity;

        if($quantity === 0){

            $product->delete();

        }else{

            $product->quantity = $quantity;

            $product->save();

        }
    }


}