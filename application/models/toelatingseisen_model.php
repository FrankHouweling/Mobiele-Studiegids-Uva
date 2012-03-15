<?php

	class Toelatingseisen_model extends CI_Model {
		
		function __construct()
	    {
	       
	        // Call the Model constructor
	        parent::__construct();
	    
	    }
	    
	    
	    
	public function get_toelatingseisen()
        {
        
             $result = $this->db->query("SELECT vak_id, vak_name FROM vakken");
             
            
          	 return $result->result_array();
        
        } 
	    
	public function get_filteredStudies()
	{
	    $this->db->select('title, content, date');

        $query = $this->db->get('mytable');
	
	}    
	    
}	    
?>
