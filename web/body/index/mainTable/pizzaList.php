<?php
$cm30s = getFetchArray("select * from product where productType='pizza_30cm' order by seqNo");
$cm40s = getFetchArray("select * from product where productType='pizza_40cm' order by seqNo");
?>
<!-- pizza part starts -->
	<div class="tab-pane fade active show" id="pizza">
		<div class="row">
			<!-- column 1 begins -->
			<div class="col">
				<table class="table table-hover" style="background: #ffffe6;">
					<thead>
						<tr style="color: #b32d00;">
							<th scope="col">Name</th>
							<th scope="col">Description</th>
							<th scope="col" style="width: 15%">30cm</th>
							<th scope="col" style="width: 15%">40cm</th>
						</tr>
					</thead>
					<tbody>
					<?php
    $count = 1;
    foreach ($cm30s as $row) {
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
				<td style="width: 15%">
					<button class="btn btn-success btn-sm btn-action" data-url="atc.php?id=<?php echo $cm40s[($count-1)]['id']?>" style="padding: 0px; margin: 0px; color: white" type="button"> 
						<?php echo $cm40s[($count-1)]['unitPrice'] ?> 
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
			<!-- column 1 ends -->
			<!-- column 2 begins -->
			<div class="col">
				<table class="table table-hover" style="background: #ffffe6;">
					<thead>
						<tr style="color: #b32d00;">
							<th scope="col">Name</th>
							<th scope="col">Description</th>
							<th scope="col" style="width: 15%">30cm</th>
							<th scope="col" style="width: 15%">40cm</th>
						</tr>
					</thead>
					<tbody>
					<?php
    $count = 1;
    foreach ($cm30s as $row) {
        if ($count > 18) {
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
				<td style="width: 15%">
					<button class="btn btn-success btn-sm btn-action" data-url="atc.php?id=<?php echo $cm40s[($count-1)]['id']?>" style="padding: 0px; margin: 0px; color: white" type="button"> <?php echo $cm40s[($count-1)]['unitPrice'] ?> 
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
			<!-- column 2 ends -->
		</div>
	</div>
<!-- pizza part ends -->
