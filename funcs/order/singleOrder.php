<?php
?>
<?php

function singleOrder($orderId)
{
    $order = getFetchArray("select * from `order` where id=" . $orderId)[0];
    if($order==null){
        ?>
<?php include 'web/head.php'; getHead("Order");?>
<body>
<script>
$(document).keydown(function(e) {
	var keyCode = e.keyCode; 
	if (keyCode==37) {
		window.location.href = 'admin.php?order_id=<?php echo ($orderId-1)?>';
	}
});
</script>
    <h1>order not found</h1>
    <a href="admin.php"><i class="fa fa-home"></i> Admin Home</a> >
    <p>press lef arrow key</p>
</body>
	<?php
    }else{
    ?>
<!DOCTYPE html>
<html lang="zxx">
<?php include 'web/head.php'; getHead("Order | ".$orderId);?>
<body>
<script>
$(document).keydown(function(e) {
	var keyCode = e.keyCode; 
	if (keyCode==39){
		window.location.href = 'admin.php?order_id=<?php echo ($orderId+1)?>';
	}else if (keyCode==37) {
		window.location.href = 'admin.php?order_id=<?php echo ($orderId-1)?>';
	}
});
</script>
<script>
$(document).ready(function() {
    $("#paymentStatus").change(function () {
        var id = $("#order_id").val();
        if (confirm('change payment status?')) {
            $.ajax({
                dataType: "html",
                type: 'POST',
                data:{id: id, action:'updateAsPaid'},  
                url: 'admin.php',
                success: function(msg){
                    location.reload();
                }
            });
                e.preventDefault()
        }
    });
});
</script>
    
    <script>
    $(document).ready(function() {
        $('input[type=radio][name=status]').change(function() {
            if (confirm('chanage order status ?')) {
                var newValue = $(this).attr('id');
                var id = $("#order_id").val();            	  
                $.ajax({
                    dataType: "html",
                    type: 'POST',
                    data:{id: id, status: newValue, action:'updateOrderStatus'},                    
                    url: 'admin.php',
                    success: function(msg){                        
                        $("#mydialog").html(msg);
                        location.reload();                        
                    }                    
                });
            }
        });
    });
        
        </script>


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
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										<li aria-current="page" class="breadcrumb-item active"> 
										<a href="admin.php"><i
								class="fa fa-home"></i> Admin Home</a> >  <small>Order > <?php echo $orderId?> >
    				                	    <?php echo $order['created'] ?> >
                    				    	<?php echo $order['customerNickName'] ?></small>
										</li>
									</ol>
								</nav>
							</div>
						</div>
						<div class="row">
							<input id="order_id" name="order_id" type="hidden"
								value="<?php echo $order['id']?>" />
							<div class="col-md-6">
								<table class="table table-sm">
									<tbody>
										<tr>
											<th scope="col">Id</th>
											<td><?php echo $order['id']; ?></td>
										</tr>
										<tr>
											<th scope="col">Date</th>
											<td><?php echo $order['created']; ?></td>
										</tr>
										<tr>
											<th scope="col">Customer Name</th>
											<td><?php echo $order['customerNickName']; ?></td>
										</tr>
										<tr>
											<th scope="col">Status</th>
											<td>
												<div class="btn-group btn-group-toggle"
													data-toggle="buttons" id="mydialog">													
													<?php  echo getOrderStatusValue($order['status']);?>
													</div>
											</td>
										</tr>
										<tr>
											<th scope="col">Delivery Type</th>
											<td><?php echo $order['deliveryType']; ?></td>
										</tr>
										<tr>
											<th scope="col">Payment Status</th>
											<td>
						<?php
                            if ($order['paymentStatus'] == 'Unpaid') {
                                echo '<div class="custom-control custom-switch">
								    <input class="custom-control-input" id="paymentStatus"
									name="paymentStatus" type="checkbox" value="'.$order['id'].'"> <label
									class="custom-control-label" for="paymentStatus">Change to
									`Paid`</label>
							     </div>';
                            } else {
                                echo '<span class="badge badge-pill badge-success">'.$order['paymentStatus'].'</span>';
                            }
                        ?>
						</td>
										</tr>
										<tr>
											<th scope="col">Total Price</th>
											<td><?php echo $order['totalPrice'];?></td>
										</tr>
										<tr>
											<th scope="col">Total no of Items</th>
											<td><?php echo $order['totalNoOfItems'];?></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										<li aria-current="page" class="breadcrumb-item active">Order
											Details</li>
									</ol>
								</nav>

								<table class="table table-hover"
									style="margin: 5px; padding: 5px;">
									<thead>
										<tr>

											<th scope="col">Type</th>
											<th scope="col">Name</th>
											<th scope="col">Description</th>
											<th scope="col">Unit Price</th>
											<th scope="col">No of Items</th>
											<th scope="col">Extra Price</th>
											<th scope="col">UserInput</th>
											<th scope="col">Total Price</th>
										</tr>
									</thead>
									<tbody>
				<?php
    $orderItems = getFetchArray("select * from order_item where order_id=" . $order['id']);
    foreach ($orderItems as $orderItem) {
        $product = getFetchArray("select * from `product` where id=" . $orderItem['product_id'])[0];
        ?>
					<tr>

											<td><?php echo $product['productType']?></td>
											<td><?php echo $product['name']?></td>
											<td><?php echo $product['description']?></td>
											<td><?php echo $product['unitPrice']?></td>
											<td><?php echo $orderItem['noOfItems']?></td>
											<td><?php echo $orderItem['extrasPrice']?></td>
											<td><?php echo $orderItem['userInput']?></td>
											<td><?php echo $orderItem['totalPrice']?> <small>CHF</small></td>
										</tr>
				<?php }
				?>	
				</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
	
</body>
</html>

<?php

}
}
?>