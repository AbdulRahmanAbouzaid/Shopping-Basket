@component('mail::message')
# Introduction

Hello,
We hope you are happy to visit our Website, here is your last purchasing activity

@component('mail::table')
|    Product Name     |    Ordered quantity	   |          Price     	  |
|:--------------------|:----------------------:|:-------------------------|
@foreach($products as $product)
@component('mail::table')
|{{ $product['name']}}|{{$product['quantity']}}|{{$product['totalPrice']}}|
|:--------------------|:----------------------:|:-------------------------|
@endcomponent
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
