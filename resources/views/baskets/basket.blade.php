<?php $basket_active = 'active'; ?>

@section('metadata')

	<meta name="csrf-token" content="{{ csrf_token() }}" />

@endsection

@extends('layouts.master')

@section('content')

	<section id="cart_items">

		<div class="container">

			<div class="table-responsive cart_info">

				<table class="table table-condensed">

					<thead>

						<tr class="cart_menu">

							<td class="image">Product</td>

							<td class="description"></td>

							<td class="price">Product Price</td>

							<td class="quantity">Quantity</td>

							<td class="total">Total Price</td>

							<td>Delete</td>

						</tr>

					</thead>

					<tbody>

						{{csrf_field()}}

						@foreach($products as $product)


							<tr>

								<td class="cart_product">

									<a href=""><img src="/images/cart/one.png" alt=""></a>

								</td>

								<td class="cart_description">

									<h4><a href="">{{$product['name']}}</a></h4>
									<h4>Code : {{$product['code']}}</h4>


								</td>

								<td class="cart_price">

									<h4>{{$product['price']}}</h4>

								</td>

								<td class="cart_quantity">

									<div class="cart_quantity_button">

										<input class="cart_quantity_input" type="number" name="{{$product['code']}}" value="{{$product['quantity']}}">
										<button  class="myBtn" data-id='{{$product["code"]}}'><i class="fa fa-refresh"></i></button>


									</div>

								</td>

								<td class="cart_total">

									<h4 class="{{$product['code']}}">{{$product['totalPrice']}}</h4>

								</td>

								<td class="cart_delete">

									<a class="cart_quantity_delete" href="/basket/delete-products/{{$product['code']}}"><i class="fa fa-times"></i></a>

								</td>

							</tr>

						@endforeach

					</tbody>
		
				</table>

			</div>

		</div>

	</section>


	<section id="do_action">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="total_area">
						<ul>
							<li>Basket Net Total <span id="totalPrice">${{$basket->basketTotalPrice()}}</span></li>
						</ul>

						<div class="row">
							<center>
								<a class="btn btn-default update" href="/basket/invoice">Show Invoice</a>
								<a class="btn btn-default update" href="/basket/destroy">Cancel</a>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection



@section('ajaxCode')

 <script src="/js/updateWithAjax.js"></script>

@endsection

