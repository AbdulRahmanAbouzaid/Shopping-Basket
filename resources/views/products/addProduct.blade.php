<?php $products_active = "active"; ?>

@extends('layouts.master')

@section('content')
<div class="row"> 

	<div class="col-sm-2"> 	

	</div>

	<div class="col-sm-8">

		<div class="contact-form">

			<h2 class="title text-center">Add New Product</h2>

			@include('layouts.errors')

	    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="/products">

	    		{{ csrf_field() }}

	            <div class="form-group col-md-8">

	            	<label for="name" class="col-md-4">Product Name</label>

	                 <input type="text" name="name" class="col-md-8" required="required" placeholder="Product Name">
	           
	            </div>
	           
	            <div class="form-group col-md-8">
	           
	            	<label for="code" class="col-md-4">Product Code</label>
	           
	                <input type="number" name="code" class="col-md-8" required="required" placeholder="Product Code">
	           
	            </div>
	           
	            <div class="form-group col-md-8">
	           
	            	<label for="price" class="col-md-4">Product Price</label>
	           
	                <input type="number" name="price" class="col-md-8" required="required" placeholder="Product Price" step="any">
	           
	            </div>
	           
	            <div class="form-group col-md-8">
	           
	            	<label for="discount_pct" class="col-md-4">Product Discount</label>
	           
	                <input type="number" name="discount_pct" class="col-md-8" required="required" placeholder=
	                "Discount Percentage" value="0" step="any">
	            
	            </div>
	            
	            <div class="form-group col-md-8">
	            
	            	<label for="quantity" class="col-md-4">Quantity</label>
	            
	                <input type="number" name="quantity" class="col-md-8" required="required" placeholder="Subject">
	            
	            </div>    

	            <div class="form-group col-md-8">

	            	<label for="category" class="col-md-4">Category</label>

	            	<div class="col-md-8">

		            	@foreach($categories as $category)

		                 	<input type="checkbox" name="category[]" value="{{$category->id}}" > {{$category->name}} <br/>

		                 @endforeach

	                 </div>
	           
	            </div> 

	            
	            <div class="form-group col-md-12">
	            
	                <input type="submit" name="submit" class="btn btn-primary" value="Add Product">
	            
	            </div>
	 
	        </form>
	
		</div>
	
	</div>

	
	<div class="col-sm-2"> 	
	
	</div>

</div>

@endsection