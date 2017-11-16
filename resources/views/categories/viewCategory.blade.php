@extends('layouts.master')

@section('content')

<section id="top">

		<div class="container">

			<div class="row">

				<div class="col-sm-12">

					<div>

						<div class="col-sm-6">
					
							<h1>{{$category->name}}</h1>
					
							<h2>Shopping Basket</h2>
					
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
					
							@if(auth()->check() && auth()->user()->is_admin)
					
								<a href="/categories/update/{{$category->name}}" class="btn btn-default cart">Update Category</a>
						
								<a href="/categories/delete/{{$category->name}}" class="btn btn-default cart">Delete Category</a>

								<a href="/products/create" class="btn btn-default cart">Add Product</a>
						
							@endif
						
						</div>

						<div class="col-sm-6">

							<img src="/images/home/girl3.jpg" class="girl img-responsive" alt="" />

							<img src="/images/home/pricing.png"  class="pricing" alt="" />
							
						</div>

					</div>
					
				</div>

			</div>

		</div>
		
</section>

<div class="breadcrumbs">

				<ol class="breadcrumb">

				  <li><a href="/categories">Categories</a></li>

				  <li class="active">{{$category->name}}</li>

				</ol>

			</div>



	<h2 class="title text-center">Products</h2>


	@foreach($category->products as $product)

		@include('products.product')

	@endforeach


@endsection