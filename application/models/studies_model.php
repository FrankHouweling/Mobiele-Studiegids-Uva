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
		
		public function getFiltered()
	    {
	    
			$query	=	"SELECT * FROM project1 WHERE";
		
			//	Query opbouwen
			
			$query	.=	"";	//	Iets eraan toevoegen
			
			// Query uitvoeren
		
	        $query = $this->db->query( $query );
	        return $query->result_array();
	        
	    }
}

?>
