<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class CategoriesController extends Controller
{

    public function __construct()

    {

        $this->middleware('auth')->except(['getCategories','viewCategory']);

    }



    /**************************************************
    Get All Categories for Admin , 
    and Get only ones that have products for Customers or Visitors
     *************************************************/
    public function getCategories(){

        if(auth()->check() && auth()->user()->is_admin){

            $categories = Category::all();

        }else{
            
            $categories = Category::has('products')->get();

        }

    	return view('categories.categories-grid', compact('categories'));

    }



    /**********************************************
     Viewing Category Info. including its Products 
     **********************************************/
    public function viewCategory(Category $category)
    {
    
    	
    	return view('categories.viewCategory', compact('category'));

    }


    /**********************************************
     Viewing Category Creation Form 
     ***************************************/
    public function create()
    {
        
        if(!auth()->user()->is_admin){

            return redirect('/');

        }

    	return view('categories.newCategory');

    }


    /**********************************************
    Create category and store it 
    ****************************************/
    public function store()
    {

        if(!auth()->user()->is_admin){

            return redirect('/');

        }

        $this->validate(request(), [
            
            'max_discount_pct' => 'numeric|between:1,100'

        ]);

        Category::create(request(['code', 'name', 'max_discount_pct']));

        return redirect('/categories');

    }



    /**********************************************
    Viewing Updating Category Form 
    *****************************************/
    public function update(Category $category)
    {

        if(!auth()->user()->is_admin){

            return redirect('/');

        }  
        
        return view('categories.update', compact('category'));
        
    }


    /**********************************************
    Confirming the Updates of a category 
    *********************************************/
    public function confirmUpdate(Category $category)
    {

        if(!auth()->user()->is_admin){

            return redirect('/');

        }
        
        $category->name = request('name');

        $category->code = request('code');

        $category->max_discount_pct = request('max_discount_pct');

        $category->save();

        return redirect('/categories');


    }



    /**********************************************
    Deleting Products from a Category 
    *********************************************/
    public function detachProduct(Category $category, Product $product)
    {
        
        $category->products()->detach($product);

        return redirect('/categories/'.$category->name);
    
    }



    /**********************************************
    Deleting The Whole Category 
    **************************************/
    public function destroy(Category $category)
    {

        if(!auth()->user()->is_admin){

            return redirect('/');

        }
        
        $category->delete();

        return redirect('/categories');

    }

}
