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
            'price' => 'numeric|min:1',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'

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

        $imageExtension = request()->file('image')->extension();

        $imageName = $this->only('name')['name'] . $this->only('code')['code'] .'.'. $imageExtension ;

        $imagePath = '/storage/products-images/'.$imageName;

        request()->file('image')->storeAs('public/products-images', $imgName);

        $product = new Product([

            'code' => $this->only('code')['code'],

            'name' => $this->only('name')['name'],

            'discount_pct' => $this->only('discount_pct')['discount_pct'],

            'price' => $this->only('price')['price'],

            'quantity' => $this->only('quantity')['quantity'],

            'image' => $imagePath
       
        ]);

        $product->save();

        $product->categories()->attach(request('category'));

    }
}
