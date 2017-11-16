<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
	protected $guarded = [];



    /************************************
    ***  A Basket Has many Products   ***
    ************************************/
    public function products()
    {
    	
    	return $this->belongsToMany(Product::class)->withPivot('quantity');

    }


    /**********************************************
    /* A Basket Belongs To only one Customer ******
    **********************************************/
    public function customer()
    {
        return $this->belongsTo(User::class);
    }


    public function invoice(){
        return $this->belongsTo(Invoice::class);

    }



    /**********************************************
    *** Get The User's Basket Or Create New One ***
    **********************************************/
 //    public function scopeGetCurrentBasket()
 //    {


 //    	Get Current Basket
 //    	$basket = Basket::where('user_id',$this->user_id)
 //                        ->where('status','hanging')
 //                        ->first();

 //    	// if exist return it , else Create new One
 //    	if(!$basket){

	// 		$basket = Basket::create(['number' => 4,'status' => 'hanging']);

	// 	}
			
	// 		return $basket;
    
	// }




    /*************************************
    /* Get Basket Price Before Discount **
    *************************************/
    public function totalActualPrice()
    {

        $actualTotal = 0; 

        foreach ($this->products as $product) {
            
            $price = $product->price;

            $quantity = $product->pivot->quantity;

            $actualTotal += $price * $quantity;

        }

        return $actualTotal;

    }




    /************************************
    /* Get Basket Price After Discount **
    ************************************/
    public function totalNetPrice()
    {

        $netTotal = 0;

        foreach ($this->products as $product) {
            
            $price = $product->netPrice();

            $quantity = $product->pivot->quantity;

            $netTotal += $price * $quantity;

        }

        return $netTotal;

    }




    /**************************************
    /* Get The Whole Discount Percentage **
    ***************************************/
    public function discountPercentage()
    {

        $total = $this->totalActualPrice();

        $discount = $total - $this->totalNetPrice();

        $discount_pct = ($discount / $total) * 100;

        return $discount_pct;
    }

}