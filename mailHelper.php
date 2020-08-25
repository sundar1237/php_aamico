<?php


ini_set("SMTP", "lx16.hoststar.hosting");
ini_set("smtp_port", "587");
ini_set("sendmail_from", "info@saransolutions.ch");

$message = '<html><body>
<div id="preloder">
		<div class="loader"></div>
	</div>
	<!-- Header Section Begin -->
	<header class="header">
	<!-- new navigation bar -->
	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<a class="navbar-brand" href="/" title="AAmico Pizza"><img alt=""
					src="images/logo_saran.png"></a>
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
						<li class="nav-item"><a class="nav-link" href="admin.php">Orders</a>
						</li>
							
						
						<li class="nav-item"><a class="nav-link disabled" href="#"><i
								class="fa fa-phone"></i> 031 381 05 05</a></li>
					</ul>
											<button type="button" class="btn btn-outline-primary btn-sm" style="float: right">Added to Cart (0)<i class="fa fa-shopping-cart"></i></button>						
									</div>
			</nav>
		</div>
	</div>
	<!--end -->
</header>
    
    <!-- Header Section End -->
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
						<div class="jumbotron jumbotron-fluid" style="margin:5px;padding:5px;">
				<div class="container">
					<h1 class="display-4" style="color:#009900">Confirmed Order</h1>
					<p class="lead"><i class="fa fa-check-circle" aria-hidden="true"></i> Your order has been confirmed</p>
				</div>
			</div>

			<nav aria-label="breadcrumb" style="margin:1px;padding:1px;">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active" aria-current="page">Order Details</li>
				</ol>
			</nav>
			<table class="table table-sm">
				<thead>
					<tr>
						<th scope="col">Nick Name</th>
						<th scope="col">Order Id</th>
						<th scope="col">Placed Date</th>
						<th scope="col">Status</th>
						<th scope="col">Payment Status</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>soori</td>
						<td>11</td>
						<td>2020-08-25 13:54:11</td>
						<td>New</td>
						<td>Unpaid</td>
					</tr>
				</tbody>
			</table>
			<nav aria-label="breadcrumb" style="margin:1px;padding:1px;">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active" aria-current="page">Order Item Details</li>
				</ol>
			</nav>
			<table class="table table-hover" style="margin:5px;padding:5px;">
				<thead>
					<tr>
						<th scope="col">Name</th>
						<th scope="col">Unit Price</th>
						<th scope="col">Extras Price</th>
						<th scope="col">No of Items</th>
						<th scope="col">Total Price</th>
						<th scope="col">User Input</th>
					</tr>
				</thead>
				<tbody>
				
										   <tr>
    						<td>Napoli</td>
    						<td>9.95</td>
    						<td></td>    						<td>1</td>
    						<td>9.95</td>
    						<td></td>
						</tr>
									
						<tr><td colspan="5">Delivery Type</td><td >Take Away</td></tr>
						<tr><td colspan="5">Payment Method</td><td >By Cash</td></tr>
						<tr><td colspan="5">Total Items</td><td >1</td></tr>
						<tr>
							<td colspan="5">Total Price</td><td ><h4>9.95 <small>CHF</small></h4></td>
					  </tr>
				</tbody>
			</table>
			<div id="div_print" class="myclass">
				<h3>AAmico Pizza</h3>
				<p>Könizstrasse 4</p>
				<p id="myp">3008 Bern</p>
				<p>031 381 05 05</p>

				<p>Order Number - 15</p>
				<p>Date - </p>
				<p>Name - prabhu</p> 
				<table id="mytable">
					<tr>
						<th>Name</th><th>#</th><th>Total</th>
					</tr>
					<tr>
						<td><small>.Marinara 40cm</small></td><td>19.95 x </td><td></td>
					</tr>
				</table>
				<p>Total Items - </p>
				<p>Total Price - <strong> CHF</strong></p>
			</div>
            
   	                    
				</div>
			</div>
		</div>
	</div>
</body></html>';

$headers = "From: ";

$headers = "From: " . strip_tags("info@saransolutions.ch") . "\r\n";
$headers .= "Reply-To: ". strip_tags("info@saransolutions.ch") . "\r\n";
$headers .= "CC: sundar1237@gmail.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

mail("saransolutions.in@gmail.com", "Testing html 1", $message, $headers);
echo "Check your email now....&lt;BR/>";


?>