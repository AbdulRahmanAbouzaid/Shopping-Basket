<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Http\Request;


class Product extends Model
{
    protected $guarded = []; 

    /**********************************************
    /* A Product May Belongs To Many Categories ***
    ***********************************************/
    public function categories(){

    	return $this->belongsToMany(Category::class);
    }


/**********************************************
     A Product May be Added To Many Baskets 
***********************************************/
    public function baskets(){

        return $this->belongsToMany(Basket::class);
    }

/************************************************************
   Return True if a Product has Discount and fals if not  ***
************************************************************/
    public function hasDiscount()
    {

    	return $this->discount_pct != 0 ? true : false;

    }


    public function categoriesNotBelong()
    {
        $ids = $this->categories()->pluck('id');

        return Category::whereNotIn('id', $ids)->get();

    }

    public function discountPrice()
    {

        return ($this->discount_pct * $this->price)/100;
        
    }


    /***********************************************************************************
    /* If Product has Discount, Return The New Price .. If not, Return actual price ****
    ************************************************************************************/
    public function netPrice(){

        $price = $this->price;

        if($this->hasDiscount()){

        	$discount = $this->discountPrice();
        	$price -= $discount;

        }


    	return $price;

    }

/**********************************************
    get The total Price of required quantities 
***********************************************/
    public function quantitiesPrice($quantity)
    {
        
        return $this->netPrice() * $quantity;
    }



    /**********************************************
     Decreasing Quantities after Confrim Purchasing
    **********************************************/
    public function decreaseQuantity($requestedQuantity)
    {
        
        $quantity = $this->quantity - $requestedQuantity;

        if($quantity === 0){

            $this->delete();

        }else{

            $this->quantity = $quantity;

            $this->save();

        } 

    }


}
