<?php
?>


<div class="col-md-12">
	<ul class="nav nav-tabs" id="tabs">
		<li class="nav-item"><a class="nav-link small text-uppercase active"
			data-target="#pizza" data-toggle="tab" href="" id='mytabheaders'>Pizza</a></li>
		<li class="nav-item"><a class="nav-link small text-uppercase"
			data-target="#wings_fries" data-toggle="tab" href="" id='mytabheaders'>Pasta, Salat,
				Wings & Fries</a></li>
		<li class="nav-item"><a class="nav-link small text-uppercase"
			data-target="#zutaten" data-toggle="tab" href="" id='mytabheaders'>Zutaten</a></li>
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
			<div class="modal-content" style="background:#ffcc66;color:#cc3300;border:none;">
				<form action="atc.php" method="POST" name="add_to_cart">
					<div class="modal-header">
						<h5 class="modal-title">
							<font style="color: #cc3300;font-weight:bold;">Add to cart</font> <i
								class="fa fa-check-square" aria-hidden="true"></i>
						</h5>
						<button aria-hidden="true" class="close" data-dismiss="modal"
							type="button">×</button>
					</div>
					<div class="modal-body"></div>
					<div class="modal-footer">
						<button class="btn btn-secondary" style='background:#ffad33;color:#cc3300;border:none;' data-dismiss="modal">Close</button>
						<button class="btn btn-primary" type="submit" id="atc" style='background:#ffad33;color:#cc3300;border:none;'>Proceed</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal - show atc response -->

</div>