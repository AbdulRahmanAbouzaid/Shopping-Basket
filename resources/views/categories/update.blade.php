@extends('layouts.master')

@section('content')
<div class="row"> 

	<div class="col-sm-2"> 	

	</div>

	<div class="col-sm-8">

		<div class="main-form">

			<h2 class="title text-center">Add New Category</h2>

			@include('layouts.errors')

	    	<form id="main-form" class="main-form row" name="update-form" method="post" action="/categories/update/{{$category->name}}">

	    		{{ csrf_field() }}

	            <div class="form-group col-md-8">

	            	<label for="name" class="col-md-4">Category Name</label>

	                 <input type="text" name="name" class="col-md-8" required="required" placeholder="Product Name" value="{{$category->name}}">
	           
	            </div>
	           
	            <div class="form-group col-md-8">
	           
	            	<label for="code" class="col-md-4">Category Code</label>
	           
	                <input type="number" name="code" class="col-md-8" required="required" placeholder="Product Code" value="{{$category->code}}">
	           
	            </div>
	           
	           
	            <div class="form-group col-md-8">
	           
	            	<label for="max_discount_pct" class="col-md-4">Max Product Discount</label>
	           
	                <input type="number" name="max_discount_pct" class="col-md-8" required="required" placeholder="Max Discount Percentage" value="{{$category->max_discount_pct}}" step="any">
	            
	            </div>   
                 
	            
	            <div class="form-group col-md-12">
	            
	                <input type="submit" name="submit" class="btn btn-primary" value="Update">
	            
	            </div>
	 
	        </form>
	
		</div>
	
	</div>

	
	<div class="col-sm-2"> 	
	
	</div>

</div>

@endsection