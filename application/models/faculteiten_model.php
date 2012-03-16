
<?php

class Faculteiten_model extends CI_Model {

     public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
   
    /**
     * add faculteiten in faculteiten database
     *
     */
    
     private function add()
     {
        
        foreach( $faculteiten as $faculty_name )
		{
			
			$this->inputInDb( $faculteiten );	
		
		}
		
     }
    
    /**
     * get faculteiten from faculteiten database
     *
     */

    public function getFaculteiten()
    {
        
         $query = $this->db->get_where('faculteiten');
	     return $query->result_array();
   
    }
    
    
    /**
     * show results (studies) from all faculteiten with given id
     *
     */
     
    public function getResultaten( $facultyID )
    {
         
         $result = $this->db->query("SELECT * FROM project1 WHERE facultyId = '" . $facultyID . "'");
	     return $result->result_array();
    
    } 
    
}

?>
