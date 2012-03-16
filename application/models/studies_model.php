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
		
		public function getFiltered( $get )
	    {
	    
			$query	=	"SELECT * FROM project1, needed_vakken, vakken WHERE";
		
			//	Query opbouwen
			
			foreach( $this->getAllVakIds() as $vakid )
			{
				
				if( isset( $get['checkbox-' . $vakid] ) )
				{
					
					$query	.= " needed_vakken.studie_id = project1.id AND vak_id = " . $vakid . "  ";
					
				}
				
			}
			
			echo $query;
			
			// Query uitvoeren
		
	        $query = $this->db->query( $query );
	        print_r($query->result_array());
	        
	    }
}

?>
