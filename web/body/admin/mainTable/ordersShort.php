<?php
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<meta http-equiv="refresh" content="5; URL=http://localhost:66/aamico/admin.php?action=ordersShort">
	<meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo MAIN_TITLE; ?> | <?php echo "Orders"?></title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link href="css/autocomplete-style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/main.css" type="text/css">
</head>
<body>
	<!-- Page Preloder -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
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
    $orders=getFetchArray("select * from `order` where status not in ('Delivered', 'Cancelled') order by id desc");
    ?>

	<div class="col-md-12">
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">Id</th>					
					<th scope="col">Customer Name</th>
					<th scope="col">Status</th>					
				</tr>
			</thead>
			<tbody>
				<?php foreach ($orders as $row){ ?>
				<tr style='font-size: 58px;'>
					<td><a href="admin.php?order_id=<?php echo $row['id']?>"><?php echo $row['id']?></a></td>					
					<td><?php echo strtoupper($row['customerNickName'])?></td>
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
				</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
<?php }?>