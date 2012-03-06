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
			
			echo "Bij deze studie is een numerus fixus van <u>" . $numerusFixus . "</u> personen.";
			
		}
		else
		{
			
			echo "Bij deze studie is geen numerus fixus.";
			
		}
		
	?>
	<br />
	<?php
		
		switch( $financing )
		{
			
			case "government":
				echo "Deze studie is door de overheid erkent en wordt dus ook gefinancierd door de overheid.";
			break;
			
			case "private":
				echo "Deze studie is <u>niet</u> door de overheid erkent en moet dus door u zelf gefinancierd worden.";
			break;
			
			default:
				echo "Er is niets bekend over de financiering van deze studie.";
			break;
			
		}
	?>
	</p>
	
</div>
<div style="clear:both;"><br /><br /><br /></div>