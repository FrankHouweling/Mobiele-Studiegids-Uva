
<?php

class Fullsearch_model extends CI_Model {

     public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
   /*
    * Function search
    *
    * building query to full text search on program description in table on database 
    */
	
	function search( $q )
	{
		
		$get	=	$this->db->query( "SELECT * FROM project1 WHERE programDescription LIKE '%" . $q . "%' OR programName LIKE '%" . $q . "%'" );
		
		return $get->result_array();
		
	}
    
}

?>
