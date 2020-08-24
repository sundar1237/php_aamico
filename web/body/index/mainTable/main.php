<?php
?>

<div class="col-md-12" style="margin: 0.5%; padding: 0.5%;">
	<h2>Menu</h2>
	<ul class="nav nav-tabs" id="tabs">
		<li class="nav-item"><a class="nav-link small text-uppercase active"
			data-target="#pizza" data-toggle="tab" href="">Pizza</a></li>
		<li class="nav-item"><a class="nav-link small text-uppercase"
			data-target="#wings_fries" data-toggle="tab" href="">Pasta, Salat,
				Wings & Fries</a></li>

		<li class="nav-item"><a class="nav-link small text-uppercase"
			data-target="#zutaten" data-toggle="tab" href="">Zutaten</a></li>
	</ul>
	<br>
	<div class="tab-content" id="tabsContent">
		<?php include 'web/body/index/mainTable/pizzaList.php';?>
		<?php include 'web/body/index/mainTable/wings_fries.php';?>
		<?php include 'web/body/index/mainTable/zutaten.php';?>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form action="atc.php" method="POST" name="add_to_cart">
					<div class="modal-header">
						<h5 class="modal-title">
							<font style="color: #999999;">Add to cart</font> <i
								class="fa fa-check-square" aria-hidden="true"></i>
						</h5>
						<button aria-hidden="true" class="close" data-dismiss="modal"
							type="button">×</button>
					</div>
					<div class="modal-body"></div>
					<div class="modal-footer">
						<button class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button class="btn btn-primary" type="submit" id="atc">Proceed</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal - show atc response -->

</div>