<?php
?>
<!DOCTYPE html>
<html lang="zxx">
<?php include 'web/head.php'; getHead("Check out");?>
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
                    <form>
						<button class="btn btn-secondary btn-sm" onclick="alert('Remove All?')" type="button">Remove All</button>
            		</form>
					<hr>
					<p>
						<a aria-controls="collapseExample" aria-expanded="false"
							class="btn btn-secondary btn-sm" data-toggle="collapse"
							href="#collapseExample" role="button"> Terms & Conditions </a>
					</p>
					<div class="collapse" id="collapseExample"
						style="margin: 5px; padding: 5px;">
						<div class="card card-body">Anim pariatur cliche reprehenderit,
							enim eiusmod high life accusamus terry richardson ad squid. Nihil
							anim keffiyeh helvetica, craft beer labore wes anderson cred
							nesciunt sapiente ea proident.</div>
					</div>
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

<script>
$(document).ready(function() {
  $(".btn-action").click(function () {
   $('#myModal1').modal('show');
  });
});
</script>
	
</body>
</html>


<?php function getbody(){?>

<div class="jumbotron jumbotron-fluid"
	style="margin: 5px; padding: 5px;">
	<div class="container">
		<h1 class="display-4">Checkout</h1>
		<div>
			<p>Confirm your food</p>
		</div>
	</div>
</div>
<form action="atc.php" method="POST">
	<input type="hidden" name="action" value="confirm_order">
	<table class="table table-hover" style="font-size: 14px;">
		<thead>
			<tr>
				<th scope="col">Name</th>
				<th scope="col">Unit Price</th>
				<th scope="col">Extra Price</th>
				<th scope="col">Items</th>
				<th scope="col">Total Price</th>
				<th scope="col">User Input</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$orderItemkList = $_SESSION["orderItemList"];
			$totalItems=0;
			$totalPrice=0.0;
			
			foreach ($orderItemkList as $orderItem){
			    $productId = $orderItem['productId'];
			    $product=getFetchArray("select * from product where id = ".$productId)[0];
			    $extraPrice=$orderItem['extra_price'];
			    $noOfItems=$orderItem['no_of_items'];
			    $totalItems += $noOfItems;
			    $total=$orderItem['changed_total'];
			    $totalPrice += $total;
			    ?>
			    <tr>
    				<td><?php echo $product['name']?></td>
    				<td><?php echo $product['unitPrice']?></td>
    				<?php if ($extraPrice>0){ 
    				    $extraString = getExtrasString($orderItem['extra'], $extraPrice, false);
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
                    <td><?php echo $noOfItems?></td>
    				<td><?php echo $total?><small>CHF</small></td>
                    <?php 
                    
                    if (strlen($orderItem['user_input'])>0){
                        echo '<td>
                            <a tabindex="0" href="#" class="popover-dismiss" role="button" data-toggle="popover"
                            data-trigger="focus" title="User Input" data-html="true"
                            data-content="'.$orderItem['user_input'].'"><i class="fa fa-info"></i></a>
                        </td>';                        
                    }else{
                        echo "<td></td>";
                    }
    				?>
				</tr>
			<?php } ?>
			<tr>
                        <td colspan="5">Delivery Type</td>
                        <td>
                            <!-- Default switch -->
                            <div class="btn-group btn-group-toggle"
						data-toggle="buttons">
                              <label
							class="btn btn-outline-secondary btn-sm active">
                                <input type="radio" name="deliveryType"
							id="take_away" value="Take Away" autocomplete="off" checked> Take Away
                              </label>
                              <label
							class="btn btn-outline-secondary btn-sm">
                                <input type="radio" name="deliveryType"
							id="eat_here" value="Eat Here" autocomplete="off"> Eat Here
                              </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">Payment Method</td>
                        <td>
                            <!-- Default switch -->
                            <div class="btn-group btn-group-toggle"
						data-toggle="buttons">
                              <label
							class="btn btn-outline-secondary btn-sm active">
                                <input type="radio" name="paymentMethod"
							id="by_cash" value="By Cash" autocomplete="off" checked> By Cash
                              </label>
                              <label
							class="btn btn-outline-secondary btn-sm">
                                <input type="radio" name="paymentMethod"
							id="by_card" value="By Card" autocomplete="off"> By Card
                              </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">Total number of Items</td>
                        <td><?php
                            echo $totalItems;
                            echo "<input type='hidden' name='totalItems' value='".$totalItems."'>";
                        ?></td>
                    </tr>
                    <tr>
                        <td colspan="5">Total Price</td>
                        <td><h4><?php echo $totalPrice;echo "<input type='hidden' name='totalPrice' value='".$totalPrice."'>"; ?> <small>CHF</small></h4></td>
                    </tr>
                    </tbody>
                </table>
                <!-- Button trigger modal -->
                <button class="btn btn-primary btn-lg btn-action"
		style="float:right" type="button">Confirm</button>
                <div class="modal fade" id="myModal1" role="dialog"
		tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title">
						
						<font style="color:#999999;">Add Customer Details</font> <i
							aria-hidden="true" class="fa fa-check-square"></i>
					
					</h5>
                                <button aria-hidden="true" class="close"
						data-dismiss="modal" type="button">×</button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="customer_nick_name">Customer Nick Name</label>
                                    <input required="required"
							aria-describedby="fieldHelp" class="form-control"
							id="customer_nick_name" name="customer_nick_name"
							placeholder="Nick Name" type="text">
                                    <small class="form-text text-muted"
							id="fieldHelp">Just for a note</small>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" id="atc"
						type="submit">Proceed</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
    
    
   	<?php }?>
   	
   