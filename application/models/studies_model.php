<?php

	class Studies_model extends CI_Model {
		
		function __construct()
	    {
	        
	        // Call the Model constructor
	        parent::__construct();
	        
	    }
		
        /**
        * get all studies from database
        *
        */
        
		public function getall()
		{
		   
		    $query = $this->db->get_where('project1');
	        return $query->result_array();
		    
		}
		
		private function getAllVakIds()
		{
			
			$ret 	=	array();
			
			$query	=	$this->db->query( "SELECT vak_id FROM vakken" );
			
			foreach( $query->result_array() as $res )
			{
				
				$ret[]	=	$res["vak_id"];
				
			}
			
			return $ret;
			
		}
		
		public function getFiltered( $get )
	    {
	    
			
			$query	=	"SELECT * FROM project1, needed_vakken WHERE";
		
			//	Query opbouwen
			
			$tus	=	array();
			
			foreach( $this->getAllVakIds() as $vakid )
			{
				
				//	Krijg alle vakken die je NIET hebt gedaan
				if( !isset( $get['checkbox-' . $vakid] ) )	
				{
					
					// Haal nu alle studies op die dat NIET nodig hebben
					$tus[]	= "( needed_vakken.studie_id = project1.id AND needed_vakken.vak_id != " . $vakid . "  )";
					
				}
				
			}
			
			$query	=	$query . implode(" AND ", $tus);
			
			echo $query;
			
			// Query uitvoeren
		
	        $query = $this->db->query( $query );
	        print_r($query->result_array());
	        
	    }
}

?>
