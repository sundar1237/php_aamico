<?php
?>
<!DOCTYPE html>
<html lang="zxx">
<?php include 'web/head.php'; getHead("View Order")?>
<body>
    <!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
	<!-- Header Section Begin -->
	<?php include 'web/body/header.php';?>    
    <!-- Header Section End -->
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php getbody(); ?>                    
				</div>
			</div>
		</div>
	</div>

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/typeahead.bundle.js" type="text/javascript"></script>
<script src="js/jquery.cookie.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>


	<script>
$(document).ready(function(){
  $('.popover-dismiss').popover({
    trigger: 'focus'
    })
});
</script>


<style>
    #div_print{
        display:none;
    }
    #mytabl{

    }
</style>
<script language="javascript">
    function printdiv(elem)
{
    var mywindow = window.open('', 'PRINT', 'height=400,width=600');

    mywindow.document.write('<html><head><title>' + document.title  + '</title>');
    mywindow.document.write('<style>body{width:7.5in; font-family:"Courier New", Courier, monospace;font-size:12px;line-height:1.0;padding:1px;margin:1px;} table{ page-break-inside:auto; } th{ font-size:12px;font-weight:bold;text-align:left;border:1px solid lightgray; } td{ font-size:12px;border:1px solid lightgray; } tr { page-break-inside:auto; }</style>');
    mywindow.document.write('</head><body >');

    mywindow.document.write(document.getElementById(elem).innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    mywindow.close();

    return true;
}
</script>
	
</body>
</html>


<?php function getbody(){
    $id = $_GET['order_id'];
    $order=getFetchArray("select * from `order` where id=".$id)[0];
    $orderItems=getFetchArray("select * from `order_item` where order_id=".$id);
    //$orderItemExtras=getFetchArray("select * from `order_item_extras` where order_item_id=".$id);
    
?>
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
						<td><?php echo $order['customerNickName']?></td>
						<td><?php echo $order['id']?></td>
						<td><?php echo $order['created']?></td>
						<td><?php echo $order['status']?></td>
						<td><?php echo $order['paymentStatus']?></td>
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
				
					<?php
					foreach ($orderItems as $orderItem){
					    $product = getFetchArray("select * from `product` where id = ".$orderItem['product_id'])[0];
					    $extraPrice=$orderItem['extrasPrice'];
					    $extra=getFetchArray("select extra_id from `order_item_extras` where order_item_id=".$orderItem['id']);
					?>
					   <tr>
    						<td><?php echo $product['name']?></td>
    						<td><?php echo $product['unitPrice']?></td>
    						<?php if ($extraPrice>0){ 
    						    $extraString = getExtrasString($extra, $extraPrice, true);
    				        ?>
    				    	<td>
    				    		<a tabindex="0" href="#" class="popover-dismiss" role="button" data-toggle="popover" 
    				    			data-trigger="focus" title="Extra Price Details" data-html="true" data-content="<?php echo $extraString;?>">
    				    			<?php echo $extraPrice;?>
    				    		</a>
    				    	</td>
    				    	<?php 
    				        }else {
    				            echo "<td></td>";	    
    				        }
    				        ?>
    						<td><?php echo $orderItem['noOfItems']?></td>
    						<td><?php echo $orderItem['totalPrice']?></td>
    						<td><?php echo $orderItem['userInput']?></td>
						</tr>
						<?php } ?>			
						<tr><td colspan="5">Delivery Type</td><td ><?php echo $order['deliveryType']?></td></tr>
						<tr><td colspan="5">Payment Method</td><td ><?php echo $order['paymentMethod']?></td></tr>
						<tr><td colspan="5">Total Items</td><td ><?php echo $order['totalNoOfItems']?></td></tr>
						<tr>
							<td colspan="5">Total Price</td><td ><h4><?php echo $order['totalPrice']?> <small>CHF</small></h4></td>
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
            
   	<?php } ?>