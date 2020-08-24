<?php
?>
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
						<?php if (isset($_SESSION['user'])){?>	
							<li class="nav-item">
								<a class="nav-link" href="admin.php?action=profile&id=<?php echo $_SESSION['uid']?>"><?php echo $_SESSION['user']?></a>
							</li>
						<?php } ?>	
						
						<li class="nav-item"><a class="nav-link disabled" href="#"><i
								class="fa fa-phone"></i> 031 381 05 05</a></li>
					</ul>
					<?php if (isset($_SESSION['orderItemList'])){?>
						<form class="form-inline my-2 my-lg-0">
							<a class="btn btn-warning btn-sm" href="atc.php" role="button" target="_blank" title="checkout">Added to Cart 
								<?php 
							     echo "(".count($_SESSION['orderItemList']).")";
							    ?>
							    <i class="fa fa-shopping-cart"></i>
							</a>
						</form>
					<?php }else{ ?>
						<button type="button" class="btn btn-outline-primary btn-sm" style="float: right">Added to Cart (0)<i class="fa fa-shopping-cart"></i></button>						
					<?php }?>
				</div>
			</nav>
		</div>
	</div>
	<!--end -->
</header>
