<?php

	class Ziestudie_model extends CI_Model {
		
		function __construct()
	    {
	        // Call the Model constructor
	        parent::__construct();
	    }
		
		/*
		 * 
		 * Function isStudie();
		 * 
		 * If the studie exists this function returns the data, otherwise it returns false.
		 * 
		 */
		
		function getStudie( $studieId )
		{
			
			
			$result 	= $this->db->query( "SELECT * FROM project1 WHERE id = '" . $studieId . "'" );
			
			$resultData	=	$result->result_array();
			
			if( count($resultData) == 0 )	// TODO I don't know if this function works this way but let's try
			{
				
				return false;
				
			}
			else
			{
				
				return $resultData;
				
			}
			
		}
		
		/*
		 * 
		 * Function getFacultyNameById( $facultyId )
		 * 
		 * Returns the name of a faculty which ID is given.
		 * 
		 */
		
		function getFacultyNameById( $facultyId )
		{
			
			$get	=	$this->db->query( "SELECT * FROM faculteiten WHERE id = '" . $facultyId . "'" );
			
			$result	=	$get->result_array();
			
			if( count( $result ) == 0 )
			{
				
				return false;
				
			}
			else
			{
				
				return $result;
				
			}
			
		}
		
	}

?>