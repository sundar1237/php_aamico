<?php
$wings_klein = getFetchArray("select * from product where productType='wings_klein' order by seqNo");
$wings_gross = getFetchArray("select * from product where productType='wings_gross' order by seqNo");
$pasta = getFetchArray("select * from product where productType='pasta' order by seqNo");
$salat = getFetchArray("select * from product where productType='salat' order by seqNo");
?>

<div class="tab-pane fade" id="wings_fries">
	<div class="row">
		<div class="col">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li aria-current="page" class="breadcrumb-item active">Wings &
						Fries (Klein)</li>
				</ol>
			</nav>
			<table class="table table-hover" style="background: #ffffe6;">
				<thead>
					<tr style="color: #b32d00;">
						<th scope="col">Name</th>
						<th scope="col">Description</th>
						<th scope="col" style="width: 15%">Price</th>
					</tr>
				</thead>
				<tbody>
					<?php
    $count = 1;
    foreach ($wings_klein as $row) {
        if ($count <= 18) {
        ?>
 			<tr style="color: #b32d00; font-weight: bold;">
				<td><?php echo $count.".".$row['name']?></td>
				<td><small><?php echo $row['description']?></small></td>
				<td style="width: 15%">
					<button class="btn btn-success btn-sm btn-action" data-url="atc.php?id=<?php echo $row['id']?>" style="padding: 0px; margin: 0px; color: white" type="button">
						<?php echo $row['unitPrice']?> 
						<span class="badge badge-light"><i aria-hidden="true" class="fa fa-cart-arrow-down"></i></span>
					</button>
				</td>				
			</tr>					 
		<?php
        }
        $count++;
    }
    ?>
				</tbody>
			</table>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li aria-current="page" class="breadcrumb-item active">Pasta</li>
				</ol>
			</nav>
			<table class="table table-hover" style="background: #ffffe6;">
				<thead>
					<tr style="color: #b32d00;">
						<th scope="col">Name</th>
						<th scope="col">Description</th>
						<th scope="col" style="width: 15%">Price</th>
					</tr>
				</thead>
				<tbody>
					<?php
    $count = 1;
    foreach ($pasta as $row) {
        if ($count <= 18) {
        ?>
 			<tr style="color: #b32d00; font-weight: bold;">
				<td><?php echo $count.".".$row['name']?></td>
				<td><small><?php echo $row['description']?></small></td>
				<td style="width: 15%">
					<button class="btn btn-success btn-sm btn-action" data-url="atc.php?id=<?php echo $row['id']?>" style="padding: 0px; margin: 0px; color: white" type="button">
						<?php echo $row['unitPrice']?> 
						<span class="badge badge-light"><i aria-hidden="true" class="fa fa-cart-arrow-down"></i></span>
					</button>
				</td>				
			</tr>					 
		<?php
        }
        $count++;
    }
    ?>
					
				</tbody>
			</table>
		</div>
		<div class="col">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li aria-current="page" class="breadcrumb-item active">Wings & Fries (Grösse)</li>
				</ol>
			</nav>
			<table class="table table-hover" style="background: #ffffe6;">
				<thead>
					<tr style="color: #b32d00;">
						<th scope="col">Name</th>
						<th scope="col">Description</th>
						<th scope="col" style="width: 15%">Price</th>
					</tr>
				</thead>
				<tbody>
				<?php
    $count = 1;
    foreach ($wings_gross as $row) {
        if ($count <= 18) {
        ?>
 			<tr style="color: #b32d00; font-weight: bold;">
				<td><?php echo $count.".".$row['name']?></td>
				<td><small><?php echo $row['description']?></small></td>
				<td style="width: 15%">
					<button class="btn btn-success btn-sm btn-action" data-url="atc.php?id=<?php echo $row['id']?>" style="padding: 0px; margin: 0px; color: white" type="button">
						<?php echo $row['unitPrice']?> 
						<span class="badge badge-light"><i aria-hidden="true" class="fa fa-cart-arrow-down"></i></span>
					</button>
				</td>				
			</tr>					 
		<?php
        }
        $count++;
    }
    ?>
				</tbody>
			</table>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li aria-current="page" class="breadcrumb-item active">Salat</li>
				</ol>
			</nav>
			<table class="table table-hover" style="background: #ffffe6;">
				<thead>
					<tr style="color: #b32d00;">
						<th scope="col">Name</th>
						<th scope="col">Description</th>
						<th scope="col" style="width: 15%">Price</th>
					</tr>
				</thead>
				<tbody>
					<?php
    $count = 1;
    foreach ($salat as $row) {
        if ($count <= 18) {
        ?>
 			<tr style="color: #b32d00; font-weight: bold;">
				<td><?php echo $count.".".$row['name']?></td>
				<td><small><?php echo $row['description']?></small></td>
				<td style="width: 15%">
					<button class="btn btn-success btn-sm btn-action" data-url="atc.php?id=<?php echo $row['id']?>" style="padding: 0px; margin: 0px; color: white" type="button">
						<?php echo $row['unitPrice']?> 
						<span class="badge badge-light"><i aria-hidden="true" class="fa fa-cart-arrow-down"></i></span>
					</button>
				</td>				
			</tr>					 
		<?php
        }
        $count++;
    }
    ?>
				</tbody>
			</table>
		</div>
	</div>
</div>