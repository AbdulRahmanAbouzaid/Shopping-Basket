<?php 

	if(auth()->check() && auth()->user()->is_admin){
 		
 		$shopORview = "View";

 	}else{

 		$shopORview = "Shop";

 	}

?>

<div class="col-sm-3">

	<div class="product-image-wrapper">

		<div class="single-products">

			<div class="productinfo text-center">

				<img src="/images/home/product2.jpg" alt="" />
				
				<h2>${{$product->price}}</h2>
				
				<h3>{{$product->name}}</h3>				
				
				<a href="/products/{{$product->id}}" class="btn btn-default add-to-cart"><i class="fa 
				fa-shopping-cart"></i>{{$shopORview}}</a>
				
				@if(auth()->check() && auth()->user()->is_admin && isset($category))
 				
 					<br/><a href='/categories/{{$category->name}}/delete/{{$product->id}}'' class='btn btn-default add-to-cart'><i class='fa fa-trash'></i>Delete Form Category</a>
 				
 				@endif
			
			</div>
			
			@if($product->hasDiscount())
			
				<img src="/images/home/sale.png" class="new" alt="" />
			
			@endif

		</div>
		
	</div>

</div>
	
