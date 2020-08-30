<?php
include 'includes/cons.php';
if (! isset($_SESSION['user'])) {
    include_once 'web/body/admin/login/login.php';
    displayLoginPage('');
}else{
?>
<!DOCTYPE html>
<html lang="zxx">
<?php include 'web/head.php'; getHead("Home");?>
<body>
	<!-- Header Section End ffcc00 66 -->
	<div class="container-fluid" id='mycontainer'>
		<?php include 'web/body/header.php';?>		
		<div class="row">
		<?php
		  $isOk = isItOpen();
          if($isOk==false){
		      echo '<img src="images/sorry_we_are_closed.png" class="rounded mx-auto d-block" alt="...">';  
          }else{
            include 'web/body/index/mainTable/main.php';
          }
		?>
		</div>
	</div>
	<?php include 'web/body/index/indexJs.php';?>
</body>
</html>
<?php } ?>