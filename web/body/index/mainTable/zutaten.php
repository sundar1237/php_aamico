<?php
$zutaten = getFetchArray("select * from extra order by seqNo");
?>
<div class="tab-pane fade" id="zutaten" style='height:900px;'>
	<div class="row">
		<!-- column 1 starts -->
		<div class="col">
			<table class="mainTablePizzaList table-hover">
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
        if ($count <= 11) {
            ?>
 			<tr style="color: #b32d00;font-weight: bold;">
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
			<table class="mainTablePizzaList table-hover">
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
        if ($count >= 12 && $count <= 22) {
            ?>
 			<tr style="font-weight: bold;color: #b32d00;">
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
			<table class="mainTablePizzaList table-hover">
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
        if ($count > 22) {
            ?>
 			<tr style="font-weight: bold;color: #b32d00;">
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
