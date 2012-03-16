
<?php

class Faculteiten_model extends CI_Model {

     public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
   
    /*
     * Private function add
     *
     * add faculteiten in faculteiten table on database
     */
    
     private function add()
     {
        
        foreach( $faculteiten as $faculty_name )
		{
			
			$this->inputInDb( $faculteiten );	
		
		}
		
     }
    
    /*
     * Public function getFaculteiten
     *
     * get faculteiten from faculteiten table on database
     */

    public function getFaculteiten()
    {
        
         $query = $this->db->get_where('faculteiten');
	     
	     return $query->result_array();
   
    }
    
    
    /*
     * Public function getResultaten 
     *
     * show results (studies) from all faculteiten with given id
     */
     
    public function getResultaten( $facultyID )
    {
         
         $result = $this->db->query("SELECT programName, id FROM project1 WHERE facultyId = '" . $facultyID . "'");
	     
	     return $result->result_array();
    
    } 
    
}

?>
