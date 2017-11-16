<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Product;



class ProductRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        return auth()->user()->is_admin;

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
            'discount_pct' => 'integer|between:0,100',
            'price' => 'numeric|min:1'

        ];
    }


    public function update(Product $product){

        $product->name = $this->only('name');

        $product->code = $this->only('code');

        $product->discount_pct = $this->only('discount_pct');

        $product->price = $this->only('price');

        $product->quantity = $this->only('quantity');       

        $product->save();

        $product->categories()->detach();

        $product->categories()->attach($this->only('category'));
    }


    public function saving()
    {
        $product = Product::create($this->only(
           
            ['code', 'name', 'price', 'quantity', 'discount_pct'])
       
        );

        $product->save();

        $product->categories()->attach(request('category'));
    }
}
