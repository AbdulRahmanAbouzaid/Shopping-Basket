<?php $login_active = "active"; ?>

@extends('layouts.master')

@section('content')

<section id="form"><!--form-->
	
		<div class="container">
	
			<div class="row">

				@include('layouts.errors')
	
				<div class="col-sm-4 col-sm-offset-1">

	
					<div class="login-form"><!--login form-->
	
						<h2>Login to your account</h2>


						<form action="/login" method="post">

							{{ csrf_field() }}

							<input type="text" name="name" placeholder="Enter Your User Name" required />

							<input type="password" name="password" placeholder="Email Address" required />

							<button type="submit" class="btn btn-default">Login</button>

						</form>

					</div><!--/login form-->


				</div>

				<div class="col-sm-1">

					<h2 class="or">OR</h2>

				</div>

				<div class="col-sm-4">

					<div class="signup-form"><!--sign up form-->

						<h2>New User Signup!</h2>

						<form action="/register" method="post">

							{{ csrf_field() }}

							<input type="text" name="name" placeholder="Name" required/>

							<input type="password" name="password" placeholder="Password" required/>
							
							<input type="password" name="password_confirmation" placeholder="confirm Password" required />							

							<button type="submit" name="submit" class="btn btn-default">Signup</button>

						</form>

					</div><!--/sign up form-->

				</div>

			</div>

		</div>

</section><!--/form-->

@endsection