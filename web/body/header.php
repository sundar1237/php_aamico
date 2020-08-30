<?php
?>

<div class="d-flex justify-content-between bd-highlight mb-3">
    		<div class="p-2 bd-highlight"><a href='/aamico'><img alt="Aamico Pizza" src="images/logo_saran.png"></a></div>
    		<div class="p-2 bd-highlight"><div class="d-flex justify-content-center"><h2 style='margin: 0px;padding:0px;'>Aamico Pizza</h2></div></div>
    		<div class="p-2 bd-highlight">
    			<div class="justify-content-sm-end">
    				<?php if (isset($_SESSION['orderItemList'])){?>
    					<a class="btn btn-danger btn-sm" href="atc.php?action=checkout" role="button" style='background:#cc3300;color:#e6b800;'>Added to Cart <?php echo "(".count($_SESSION['orderItemList']).")"; ?> </a>
												
					<?php }else{ ?>
						<button type="button" class="btn btn-danger btn-sm" style='background:#cc3300;color:#e6b800;'>Added to Cart (0)</button>
					<?php }?>
				</div>
			</div>
  		</div>