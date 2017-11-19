<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Repositories\Baskets;
use App\Repositories\Invoices;
use App\Invoice;
use App\Product;
use App\Mail\PurchasingReport;

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
    public function prepareInvoice(Invoices $invoice)
    {

        $invoice = $invoice->create($this->basket);

        $products = $this->basket->getAllProducts();

        foreach ($products as $product) {

            $this->basket->decreaseQuantity($product['code'], $product['quantity']);
            
        }

        return redirect('/basket/invoice/show');

    }


    // show the Invoice for the User
    public function showInvoice()
    {

        $invoice = session('invoice');

        return view('baskets.invoice', compact('invoice'));

    }


    public function confirmPurchase()
    {
        $invoice = session('invoice');

        $invoice->save();

        $products = session('products');

        \Mail::to(auth()->user())->send(new PurchasingReport($invoice, $products));

        session()->forget('products');

        session()->forget('invoice');

        return redirect('/');
    }


    //Cancel The Basket  
    public function destroy()
    {
        
        session()->forget('products');

        return redirect('/');

    }

}
