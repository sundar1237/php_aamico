<?php
$_SESSION['cart'] = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="description" content="Ogani Template">
<meta name="keywords" content="Ogani, unica, creative, html">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>A'amico Pizza | Home</title>

<!-- Google Font -->
<link
	href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap"
	rel="stylesheet">

<!-- Css Styles -->
<link rel="stylesheet" href="libs/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="libs/css/font-awesome.min.css"
	type="text/css">
<!--<script src="libs/js/jquery.min.js"></script>-->
<!--<link rel="stylesheet" href="libs/css/style.css" type="text/css">-->
<link rel="stylesheet" href="libs/css/main.css" type="text/css">

<script src="libs/js/jquery-3.5.1.min.js"></script>
<script src="libs/js/typeahead.bundle.js" type="text/javascript"></script>

<link href="libs/css/autocomplete-style.css" rel="stylesheet"
	type="text/css">

<script src="libs/js/jquery.cookie.min.js"></script>
<script src="libs/js/popper.min.js"></script>
<script src="libs/js/bootstrap.min.js"></script>
</head>

<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
	<!-- Header Section Begin -->

	<header class="header">
		<!-- new navigation bar -->
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<a class="navbar-brand" href="/aamico" title="AAmico Pizza"><img alt=""
						src="libs/img/logo.png"></a>
					<button aria-controls="navbarTogglerDemo02" aria-expanded="false"
						aria-label="Toggle navigation" class="navbar-toggler"
						data-target="#navbarTogglerDemo02" data-toggle="collapse"
						type="button">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
						<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
							<li class="nav-item active"><a class="nav-link" href="/">Home <span
									class="sr-only">(current)</span></a></li>
							<li class="nav-item"><a class="nav-link" href="/orders">Orders</a>
							</li>
							<li class="nav-item"><a class="nav-link disabled" href="#"><i
									class="fa fa-phone"></i> 031 381 05 05</a></li>
						</ul>
						<form class="form-inline my-2 my-lg-0">
                        <a class="btn btn-warning btn-sm" href="/checkout" role="button" target="_blank"
                               title="checkout">Added to Cart  
                               <?php
                               if (isset($_SESSION['orderItemList'])){
                                   echo count($_SESSION['orderItemList']);
                               }else{
                                   echo "(0)";
                               }
                               ?>
                                <i class="fa fa-shopping-cart"></i> 
                            </a>
                        
                            <a class="btn btn-dark btn-sm" href="#" role="button" target="_blank"
                               title="user">sundar
                            </a>
                        
                    </form>
					</div>
				</nav>

			</div>
		</div>
		<!--end -->
	</header>
	<!-- Header Section End -->
	<div class="container-fluid">