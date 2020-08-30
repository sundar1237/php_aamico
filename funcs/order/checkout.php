<?php
?>
<!DOCTYPE html>
<html lang="zxx">
<?php include 'web/head.php'; getHead("Check out");?>
<body>
    <!-- Header Section End ffcc00 66 -->
	<div class="container-fluid" id='mycontainer' style='height: 980px;width:100%;'>
		<?php include 'web/body/header.php';?>		
		<div class="row">
			<?php getbody(); ?>	
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
<div class="container">
<div class="jumbotron jumbotron-fluid"
	style="margin: 5px; padding: 5px;background:none;">
	<div class="container">
		<h1 class="display-4">Checkout</h1>
		<div>
			<p>Confirm your food</p>
		</div>
	</div>
</div>
<form action="atc.php" method="POST">
	<input type="hidden" name="action" value="confirm_order">
	<table class="mainTablePizzaList table-hover" style="font-size: 14px;">
		<thead>
			<tr id='mymainTablePizzaListRow'>
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
			    <tr id='mymainTablePizzaListRow'>
    				<td><?php echo $product['name']?></td>
    				<td><?php echo $product['unitPrice']?></td>
    				<?php if ($extraPrice>0){ 
    				    $extraString = getExtrasString($orderItem['extra'], $extraPrice, false);
    				    ?>
    				    <td>
    				    	<a tabindex="0" href="#" class="popover-dismiss" role="button" data-toggle="popover" 
    				    		data-trigger="focus" title="Extra Price Details" style="background:#ffdb4d;padding:5px;color:#cc3300" data-html="true" data-content="<?php echo $extraString;?>">
    				    		<?php echo $extraPrice;?>
    				    	</a>
    				    </td>
    				    <?php 
    				}else {
    				    echo "<td></td>";    				    
    				}
    				?>
                    <td><?php echo $noOfItems?></td>
    				<td><?php echo $total?><small> CHF</small></td>
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
			<tr id='mymainTablePizzaListRow'>
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
                    <tr id='mymainTablePizzaListRow'>
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
                    <tr id='mymainTablePizzaListRow'>
                        <td colspan="5">Total number of Items</td>
                        <td><?php
                            echo $totalItems;
                            echo "<input type='hidden' name='totalItems' value='".$totalItems."'>";
                        ?></td>
                    </tr>
                    <tr id='mymainTablePizzaListRow'>
                        <td colspan="5">Total Price</td>
                        <td><h4><?php echo $totalPrice;echo "<input type='hidden' name='totalPrice' value='".$totalPrice."'>"; ?> <small>CHF</small></h4></td>
                    </tr>
                    </tbody>
                </table>
                <!-- Button trigger modal -->
                <button class="btn btn-warning btn-lg btn-action"
		style="float:right;background:#ffdb4d;color:#cc3300;border:none;" type="button">Confirm</button>
                <div class="modal fade" id="myModal1" role="dialog"
		tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content" style='background:#ffcc00;color:#cc3300;border:none;'>
                            <div class="modal-header">
                                <h5 class="modal-title">
						
						<font style="color:#cc3300;">Add Customer Details</font> <i
							aria-hidden="true" class="fa fa-check-square"></i>
					
					</h5>
                                <button aria-hidden="true" class="close"
						data-dismiss="modal" type="button">×</button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="customer_nick_name">Customer Nick Name *</label>
                                    <input required="required"
							aria-describedby="fieldHelp" class="form-control"
							id="customer_nick_name" name="customer_nick_name"
							placeholder="Enter your nick Name" type="text" style='background:#ffdb4d;'>
                                    <small class="form-text text-muted"
							id="fieldHelp"><font style='color:#cc3300;'>Just for a note</font></small>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-warning" style='background:#ffdb4d;color:#cc3300;border:none;' id="atc"
						type="submit">Proceed</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
</div>


    
    
   	<?php }?>
   	
   