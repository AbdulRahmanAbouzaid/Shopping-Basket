<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Repositories\Baskets;
use App\Repositories\Invoices;
use App\Invoice;
use App\Product;

class BasketSessionsController extends Controller
{

	protected $basket;

	public function __construct(Baskets $basket)
	{	

		$this->middleware('auth');
		
		$this->basket = $basket;


	}
    

    // Show the User's Basket
    public function show()
    {
        $basket = $this->basket;

    	$products = $this->basket->getAllProducts();

        if(isset($products) && !empty($products)){
    	
    	   return view('baskets.basket', compact(['products','basket']));

        }

        return redirect('/');

    }


    // Add Product to the basket
    public function addProduct(Product $product)
    {

        $requested_quantity = request('quantity');

        $this->basket->attach($product, $requested_quantity);

    	return redirect('/basket');

    }


    // Remove Product From the Basket
    public function detachProduct($code)
    {
      
        $this->basket->detachProduct($code);

        return redirect('/basket');

    }



    // Update Product's quantity
    public function updateQuantity()
    {
        $product = $this->basket->editProdcut(Request('code'), Request('quantity'));  

        return $product;
    }
    
 

    // Confirm Purchasing and Create its Invoice 
    public function confirmPurchase(Invoices $invoice)
    {

        $invoice = $invoice->create($this->basket);

        foreach ($this->basket->getAllProducts() as $product) {

            $this->basket->decreaseQuantity($product['code'], $product['quantity']);
            
        }

        session()->forget('products');

        return redirect('/basket/invoice/'.$invoice->id);

    }


    // show the Invoice for the User
    public function showInvoice(Invoice $invoice)
    {

        return view('baskets.invoice', compact('invoice'));

    }



    //Cancel The Basket  
    public function cancelling()
    {
        
        session()->forget('products');

        return redirect('/');

    }

}
