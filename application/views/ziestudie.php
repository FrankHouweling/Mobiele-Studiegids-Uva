<div class="mcontent">
	<h2><?php echo $programName?> (<?php echo $programLevel?>)</h2>
	<h3>Omschrijving</h3>
	<p>
		￼<?php echo $programDescription;?>
	</p>
	<h3>Toelatingseisen &amp; kosten</h3>
	<p>
	<?php
		if( $numerusFixus == true )
		{
			
			echo "Bij deze studie is een numerus fixus.";
			
		}
		else
		{
			
			echo "Bij deze studie is geen numerus fixus.";
			
		}
	?>
	</p>
	
</div>
<div style="clear:both;"><br /><br /><br /></div>