<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    @yield('metadata')
    <title>Shopping Basket</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
	<link href="/css/main.css" rel="stylesheet">

</head><!--/head-->

<body>
	
	<header id="header"><!--header-->	
		@include('layouts.nav')	
	</header><!--/header-->
	
	<div class="container">
		@yield('content')
	</div>


	<footer id="footer"><!--Footer-->
		@include('layouts.footer')
	</footer>
	

  
    <script src="/js/jquery.js"></script>
	<script src="/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
    @yield('ajaxCode')
    
</body>
</html>