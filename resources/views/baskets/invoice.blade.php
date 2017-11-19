@extends('layouts.master')

@section('content')

	<section id="cart_items">

		<div class="container">

			<div class="table-responsive cart_info">

				<table class="table table-condensed">

					<thead>

						<tr class="cart_menu">

							<td class="image">Invoice No.</td>

							<td class="description">Total Price</td>

							<td class="price">Discount (%)</td>

							<td class="quantity">Net Price</td>


						</tr>

					</thead>

					<tbody>

							<tr>

								<td class="cart_product">

									<h4> {{ $invoice['inv_number'] }} </h4>

								</td>

								<td class="cart_description">

									<h4> $ {{ number_format($invoice['inv_total'], 2) }} </h4>

								</td>

								<td class="cart_price">

									<h4> {{ number_format($invoice['inv_discount'], 2) }} % </h4>

								</td>

								<td class="cart_quantity">

									<h4> $ {{ number_format($invoice['inv_net'], 2) }} </h4>

								</td>

							</tr>
		
					</tbody>
		
				</table>

			</div>

		</div>

	</section> 

	<section>

		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<center>
						<a class="btn btn-default update" href="/basket/confirm-purchase">Confirm Purchasing</a>
						<a class="btn btn-default update" href="/basket">Back To Basket</a>
					</center>
				</div>
			</div>
		</div>

	</section>



@endsection