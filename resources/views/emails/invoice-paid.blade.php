@component('mail::message')
# Introduction

@component('mail::table')
|    Product Name     |    Ordered quantity	   |          Price     	   |
|:--------------------|:----------------------:|:-------------------------:|
|					  |						   |						   |
@foreach($products as $product)
|{{ $product['name']}}|{{$product['quantity']}}|{{$product['totalPrice']}} |
|					  |						   |						   |
@endforeach
@endcomponent

@component('mail::panel')

- The Total Price is : {{$invoice->inv_total}}
- Discount : {{$invoice->inv_discount}}
- Net Price : {{$invoice->inv_net}}
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
