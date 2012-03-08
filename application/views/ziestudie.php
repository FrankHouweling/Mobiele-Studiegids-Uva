<div class="mcontent">
	<h2><?php echo $programName?> (<?php echo $programLevel?>)</h2>
	<h3>Omschrijving</h3>
	<p>
		￼<?php echo nl2br($programDescription);?>
	</p>
	<h3>Toelatingseisen &amp; Financiering</h3>
	<ul>
		<li>
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
		</li>
		<li>
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
		</li>
		<li>
			Deze studie bestaat uit <u><?php echo $programCredits?></u> studiepunten.
		</li>
		<li>
			Deze studie duurt <u><?php echo floor($programDuration/12)?></u> jaar en <?php echo $programDuration - ( floor($programDuration/12) * 12 ) ?> maanden.
		</li>
		<li>
			Programmavorm: <u><?php echo $programForm?></u>.
		</li>
		<li>
			Programmatype: <u><?php echo $programType?></u>.
		</li>
		<li>
			Eersvolgende instroommogelijkheid: <?php echo $startingYear ?>
		</li>
		<li>
			Dit vak wordt vooral in het <?php echo $instructionLanguageFull?>
		</li>
	</ul>
	
</div>
<div style="clear:both;"><br /><br /><br /><br /></div>
