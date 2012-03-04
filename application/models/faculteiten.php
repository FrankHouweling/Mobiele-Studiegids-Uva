
<?php

class Faculteiten extends CI_Model {

     public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    /**
     * Add faculteiten in faculteiten database
     *
     */
    
     private function add()
     {
        //TODO
        foreach( $faculteiten as $faculty_name )
		{
			$this->inputInDb( $faculteiten );	
		}
     }
    
    /**
     * get faculteiten from faculteiten database
     *
     */

    public function get_faculteiten()
    {
        $this->db->select('id, faculty_name')->from('faculteiten');
        return $this->db->get()->result();


    }
}

?>
