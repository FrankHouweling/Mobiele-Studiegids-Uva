<?php

	class Favorieten_model extends CI_Model {
		
		function __construct()
	    {
	       
	        // Call the Model constructor
	        parent::__construct();
	    
	    }
	    
	    
		/*
		 *
		 * Private function getDataByIDs( $array )
		 * 
		 * Get's the info of the studies associated by the given array of ID's
		 * 
		 */
		
		function getDataByIDs( $ids )
		{
			
			$get = $this->db->query( "SELECT * FROM project1 WHERE id IN('" . implode("','", $ids) . "')" );
			
			if( $this->db->count_all_results() !== 0 )
			{
				
				return $get->result_array();
				
			}
			else
			{
				
				return false;
				
			}
			
		}
			    
	}	    
?>
