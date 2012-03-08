<?php

	class Allestudies_model extends CI_Model {
		
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
}

?>
