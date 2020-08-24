<?php
?>
<!DOCTYPE html>
<html lang="zxx">
<?php include 'web/head.php'; getHead("Order");?>
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
					<?php getBody();?>
				</div>
			</div>
		</div>
	</div>
	<?php include 'web/body/index/indexJs.php';?>
</body>
</html>

<?php
function getBody()
{
    $orders=getFetchArray("select * from `order` order by id desc");
    ?>

	<div class="col-md-12">
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">Id</th>
					<th scope="col">Date</th>
					<th scope="col">Customer Name</th>
					<th scope="col">Status</th>
					<th scope="col">Payment Status</th>
					<th scope="col">Delivery Type</th>
					<th scope="col">Total Price</th>
					<th scope="col">No Of Items</th>
					<th scope="col">Extras</th>
					<th scope="col">User Input</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($orders as $row){
				    $extraRows=getSingleValue("select count(1) from order_item where extrasPrice is not null and order_id=".$row['id']);
				    $hasExtra=" ";
				    if($extraRows>0){
				        $hasExtra="<i class='fa fa-check-circle'></i>";
				    }
				    $userInputRows=getSingleValue("select count(1) from order_item where userInput is not null and order_id=".$row['id']);
				    $hasUserInput=" ";
				    if($userInputRows>0){
				        $hasUserInput="<i class='fa fa-check-circle'></i>";
				    }
				?>
				<tr>
					<td><a href="admin.php?order_id=<?php echo $row['id']?>"><?php echo $row['id']?></a></td>
					<td><a href="admin.php?order_id=<?php echo $row['id']?>"><?php echo $row['created']?></a></td>
					<td><?php echo $row['customerNickName']?></td>
					<td><?php if ($row['status']== 'New') {
					    echo '<span class="badge badge-pill badge-light">'.$row['status'].'</span>';
					}else if ($row['status']== 'Progress'){
					    echo '<span class="badge badge-pill badge-primary">'.$row['status'].'</span>';
					}else if ($row['status']== 'Ready'){
					    echo '<span class="badge badge-pill badge-warning">'.$row['status'].'</span>';
					}else if ($row['status']== 'Delivered'){
					    echo '<span class="badge badge-pill badge-success">'.$row['status'].'</span>';
					}else if ($row['status']== 'Cancelled'){
					    echo '<span class="badge badge-pill badge-danger">'.$row['status'].'</span>';
					}?>
					</td>
					<td>
					<?php if ($row['paymentStatus']== 'Unpaid'){
					   echo '<span class="badge badge-pill badge-danger">'.$row['paymentStatus'].'</span>'; 
					} else{
					    echo '<span class="badge badge-pill badge-success">'.$row['paymentStatus'].'</span>';
					}?>
					</td>
					<td><?php echo $row['deliveryType']?></td>
					<td><?php echo $row['totalPrice']?></td>
					<td><?php echo $row['totalNoOfItems']?></td>
					<td><?php echo $hasExtra?></td>
					<td><?php echo $hasUserInput?></td>					
				</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
<?php }?>