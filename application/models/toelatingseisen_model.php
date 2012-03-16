<?php

	class Toelatingseisen_model extends CI_Model {
		
	   /**
        * get all studies from database
        *
        */
        
		function __construct()
	    {
	       
            // Call the Model constructor
	        parent::__construct();
	    
	    }
	    
	    
	   /**
        * get all courses for filter
        *
        */
	    
	    public function getToelatingseisen()
        {
        
             $result = $this->db->query("SELECT vak_id, vak_name FROM vakken");
          	
          	 return $result->result_array();
        
        } 
	    
}	    
?>
