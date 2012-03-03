
<?php

class Faculteiten extends CI_Model {


    public function get_faculteiten()
    {
        $this->db->select('id, faculty_name')->from('faculteiten');
        return $this->db->get()->result();


    }
}

?>
