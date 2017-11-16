@extends('layouts.master')


@section('content')
	
	<div class="col-sm-12 padding-right">

		<div class="product-details"><!--product-details-->

			<div class="col-sm-5">

				<div class="view-product">

					<img src="/images/product-details/1.jpg" alt="" /> <!--  Product Image -->

				</div>

			</div>

			<div class="col-sm-7">

				<div class="product-information"><!--/product-information-->

					<h2>{{$product->name}}</h2>
					
					<p>Product Code : {{$product->code}}</p>
					
					<span>
					
						<span>

							$ {{$product->netPrice()}} US

						</span>



						<form action="/basket/add-product/{{$product->id}}" method="POST">
							<div class="row"> 
								{{ csrf_field() }}
								
								@if(auth()->check() && !auth()->user()->is_admin)

									@if(session()->has('products') && array_key_exists($product->code, session('products')))

										<p> The product has been added to your basket </p>

									@else

									<div class="col-sm-6">
										<label>Quantity:</label>
									
										<input type="number" name="quantity" value="1" min="1" max="{{$product->quantity}}" />
									</div>

									<div class="col-sm-6">
								
										
										<button type="submit" class="btn btn-default" name="addCart" style="background-color: #e83030; color: #fff; border: 0px">
								
												<i class="fa fa-shopping-cart"></i> Add to Basket

										</button>

									</div>


									@endif



								@endif

							</div>

						</form>

						<br/>

						@if(auth()->check() && auth()->user()->is_admin)
							<a href="/products/delete/{{$product->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Delete Product</a>

							<a href="/products/update/{{$product->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>update Product</a>
						@endif
					
					</span>
					
					<p><b>Available Quantity:</b> {{$product->quantity}}</p>
					
					<p><b>Discount:</b>

					@if(!$product->hasDiscount())

							None 

						</p>

					@else

							{{$product->discount_pct}} %

						</p>
					
						<p><b>Actual Price: </b> $ {{$product->price}}</p>
					
					@endif

					<a href=""><img src="/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
				
				</div><!--/product-information-->
			
			</div>
		
		</div><!--/product-details-->
		
		
		
		<div class="recommended_items"><!--recommended_items-->
			
			<h2 class="title text-center">recommended items</h2>	
			
				<div class="col-sm-4">
			
					<div class="product-image-wrapper">
			
						<div class="single-products">
			
							<div class="productinfo text-center">
			
								<img src="/images/home/recommend1.jpg" alt="" />
			
								<h2>$56</h2>
			
								<p>Easy Polo Black Edition</p>
			
								<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
							
							</div>
						
						</div>

					</div>

				</div>

				<div class="col-sm-4">

					<div class="product-image-wrapper">

						<div class="single-products">

							<div class="productinfo text-center">

								<img src="/images/home/recommend2.jpg" alt="" />

								<h2>$56</h2>

								<p>Easy Polo Black Edition</p>

								<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>

							</div>

						</div>

					</div>

				</div>

				<div class="col-sm-4">

					<div class="product-image-wrapper">

						<div class="single-products">

							<div class="productinfo text-center">

								<img src="/images/home/recommend3.jpg" alt="" />

								<h2>$56</h2>

								<p>Easy Polo Black Edition</p>

								<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>

							</div>

						</div>

					</div>

				</div>			

		</div>

	</div>

@endsection