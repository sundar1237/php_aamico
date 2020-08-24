<?php 
include 'includes/cons.php';
?>
<!DOCTYPE html>
<html lang="zxx">
<?php include 'web/head.php'; getHead("Home");?>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
	<!-- Header Section Begin -->
	<?php include 'web/body/header.php';?>
	<!-- Header Section End -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<?php include 'web/body/index/mainTable/main.php';?>
				</div>
			</div>
		</div>
	</div>
	<?php include 'web/body/index/indexJs.php';?>
</body>
</html>