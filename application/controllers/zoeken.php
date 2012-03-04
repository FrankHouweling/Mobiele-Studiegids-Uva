<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	 
class Zoeken extends CI_Controller {

	public function __Construct()
	{
	    parent::__Construct();
	    
	    $this->load->model('studies');	    
	    $this->load->model('faculteiten');
	    $this->load->model('profieleisen');	    
	}
	
	public function Studies() 
	{
	    $data['studies'];
	    $this->load->view('Homepage', $data);
	
	}
	
	
	 
	
}

