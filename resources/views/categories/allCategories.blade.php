@extends('layouts.master')

@section('content')

<section id="slider">

		<div class="container">

			<div class="row">

				<div class="col-sm-12">

					<div>

						<div class="col-sm-6">
							<h1><span>E</span>-SHOPPING</h1>
							<h2>Free E-Commerce Template</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
						</div>

						<div class="col-sm-6">
							<img src="/images/home/girl1.jpg" class="girl img-responsive" alt="" />
						</div>

					</div>
					
				</div>

			</div>

		</div>
		
</section>


<h2 class="title text-center">Categories</h2>

	@foreach($categories as $category)

		<div class="col-sm-3">
	
			<div class="product-image-wrapper">
	
				<div class="single-products">
	
					<div class="productinfo text-center">

						<img src="/images/home/product1.jpg" alt="" />

						<h2>{{$category->name}}</h2>

					</div>

					<div class="product-overlay">

						<div class="overlay-content">

							<h2>{{$category->name}}</h2>

							<a href="/categories/{{$category->name}}" class="btn btn-default add-to-cart">
							<i class="fa fa-shopping-cart"></i>View Collection</a>
					
						</div>
					
					</div>

				</div>
				
			</div>
		
		</div>

	@endforeach

@endsection