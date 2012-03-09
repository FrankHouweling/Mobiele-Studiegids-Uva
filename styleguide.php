<?php

	class Demo_model extends CI_Model
	{
		
		function __construct()
		{
			
			// Call the Model constructor
	        parent::__construct();
			
		}
		
		/*
		 * 
		 * Public function getElementById( $id )	//	Get - het gene wat je wilt halen - het gene wat je al hebt
		 * 
		 * Short description about what should be the input, what proces there is and what it will output.
		 * 
		 */
		
		public function getElementById( $id )
		{
			
			// A short comment to describe what a code block does
			
			$first	= "make";
			$all	= "the variables you use.";
			
			// Then do something with it
			
			if( $waarde == true && ( $waarde2 !== $waarde3 ) ){
			
				foreach( array( 1,2,3,4 ) as $thingie )
				{
					
					return $thingie;
					
				}
				
			}
			
		}	// End method getElementById
		
	}	//	End class Demo_model

?>