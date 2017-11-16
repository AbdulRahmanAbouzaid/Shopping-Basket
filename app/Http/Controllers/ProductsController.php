<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

use App\Http\Requests\ProductRequest;

class ProductsController extends Controller
{

    public function __construct()

    {

        $this->middleware('auth')->except('show');

    }


    /***********************
    show Product Information
    ************************/
    public function show(Product $product)
    {

    	return view('products.show', compact('product'));

    }


    /*********************** 
    View Product Creation Form 
    ***************************/
    public function create()
    {

        if(!auth()->user()->is_admin){

            return back();

        }

    	return view('products.addProduct');
    }



    /***********************
     Create New Product 
     **********************/
    public function store(ProductRequest $form)
    {

        if(!auth()->user()->is_admin){

            return redirect('/');

        }
    	

        $form->saving();

        return redirect('/');


    }


    /***********************
    Viewing Update Product Form
    *************************/ 
    public function update(Product $product)
    {

        if(!auth()->user()->is_admin){

            return redirect('/');

        }
        
        return view('products.update', compact('product'));

    }


    /*******************************************************
    update given Product Using UpdateProductRequest Form Request
    ********************************************************/
    public function confirmUpdate(Product $product, ProductRequest $form)
    {

        $form->update($product);
        
        return redirect('/');

    }


    /***********************
    Delete Given Product
    ***********************/
    public function destroy(Product $product)
    {

        if(!auth()->user()->is_admin){

            return redirect('/');

        }

        $product->categories()->detach();

        $product->baskets()->detach();       
        
        $product->delete();

        return redirect('/');

    }
}
