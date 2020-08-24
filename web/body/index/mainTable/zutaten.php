<?php
$zutaten = getFetchArray("select * from extra order by seqNo");
?>
<div class="tab-pane fade" id="zutaten">
	<div class="row">
		<!-- column 1 starts -->
		<div class="col">
			<table class="table table-hover" style="background: #ffffe6;">
				<thead>
					<tr style="color: #b32d00;">
						<th scope="col">Name</th>
						<!--<th scope="col">Type</th>-->
						<th scope="col" style="width: 15%">Price</th>
					</tr>
				</thead>
				<tbody>					
					<?php
    $count = 1;
    foreach ($zutaten as $row) {
        if ($count <= 10) {
            ?>
 			<tr style="color: #b32d00; font-weight: bold;">
						<td><?php echo $count.".".$row['name']?></td>
						<td><small><?php echo $row['unitPrice']?></small></td>
					</tr>					 
		<?php
        }
        $count ++;
    }
    ?>

					
				</tbody>
			</table>
		</div>
		<!-- column 1 ends -->

		<!-- column 2 starts -->
		<div class="col">
			<table class="table table-hover" style="background: #ffffe6;">
				<thead>
					<tr style="color: #b32d00;">
						<th scope="col">Name</th>
						<!--<th scope="col">Type</th>-->
						<th scope="col" style="width: 15%">Price</th>
					</tr>
				</thead>
				<tbody>
					
					<?php
    $count = 1;
    foreach ($zutaten as $row) {
        if ($count >= 11 && $count <= 20) {
            ?>
 			<tr style="color: #b32d00; font-weight: bold;">
						<td><?php echo $count.".".$row['name']?></td>
						<td><small><?php echo $row['unitPrice']?></small></td>
					</tr>					 
		<?php
        }
        $count ++;
    }
    ?>

				</tbody>
			</table>
		</div>
		<!-- column 2 ends -->

		<!-- column 3 starts -->
		<div class="col">
			<table class="table table-hover" style="background: #ffffe6;">
				<thead>
					<tr style="color: #b32d00;">
						<th scope="col">Name</th>
						<!--<th scope="col">Type</th>-->
						<th scope="col" style="width: 15%">Price</th>
					</tr>
				</thead>
				<tbody>

					
					
					<?php
    $count = 1;
    foreach ($zutaten as $row) {
        if ($count > 20) {
            ?>
 			<tr style="color: #b32d00; font-weight: bold;">
						<td><?php echo $count.".".$row['name']?></td>
						<td><?php echo $row['unitPrice']?></td>
					</tr>					 
		<?php
        }
        $count ++;
    }
    ?>
				</tbody>
			</table>
		</div>
		<!-- column 3 ends -->

	</div>
</div>
