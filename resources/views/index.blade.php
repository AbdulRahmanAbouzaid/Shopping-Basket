<?php $home_active="active"; ?>

@extends('layouts.master')

@section('content')

	<section id="top">

		<div class="container">

			<div class="row">

				<div class="col-sm-12">

					<div>

						<div class="col-sm-6">
							<h1><span>E</span>-SHOPPING</h1>
							<h2>Shopping Basket</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
						</div>

						<div class="col-sm-6">
							<img src="/images/home/girl1.jpg" class="topImg img-responsive" alt="" />
						</div>

					</div>

					
				</div>

			</div>

			<!-- <div class="row">

				<div class="col-sm-12">

					<img src="/images/shop/advertisement.jpg" class="advertisement" alt="" />

				</div>

			</div> -->


		</div>
		
	</section>
	
	<section>

		<div class="container">

			<div class="row">

				<div class="col-sm-12 padding-right">

				<h2 class="title text-center">Products</h2>

					<div class="products"><!--products-->
						@foreach($products as $product)	
							
							@include('products.product')	

						@endforeach

					</div><!--products-->

				</div>

			</div>

		</div>

</section>

@endsection