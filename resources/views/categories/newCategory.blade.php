@extends('layouts.master')

@section('content')
<div class="row"> 

	<div class="col-sm-2"> 	

	</div>

	<div class="col-sm-8">

		<div class="main-form">

			<h2 class="title text-center">Add New Category</h2>

			@include('layouts.errors')

			<div class="status alert alert-success" style="display: none"></div>

	    	<form id="main-form" class="main-form row" name="main-form" method="post" action="/categories">

	    		{{ csrf_field() }}

	            <div class="form-group col-md-8">

	            	<label for="name" class="col-md-4">Category Name</label>

	                 <input type="text" name="name" class="col-md-8" placeholder="Product Name" required>
	           
	            </div>
	           
	            <div class="form-group col-md-8">
	           
	            	<label for="code" class="col-md-4">Category Code</label>
	           
	                <input type="number" name="code" class="col-md-8" placeholder="Product Code" required>
	           
	            </div>
	           
	           
	            <div class="form-group col-md-8">
	           
	            	<label for="max_discount_pct" class="col-md-4">Max Product Discount</label>
	           
	                <input type="number" name="max_discount_pct" class="col-md-8" placeholder="Max Discount Percentage" value="0" step="any" required>
	            
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