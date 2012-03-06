<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	 
class Zoeken extends CI_Controller {

	public function __Construct()
	{
	    parent::__Construct();   
	}
	
	public function allestudies()
	{
		
		$data	=	array();	//	TODO!
		
		$this->load->view( "header", array( "page" => "Alle Studies - Studies Zoeken", "pagetitle" => "Alle Studies" ) );
		$this->load->view( "allestudies", $data);
		$this->load->view( "footer" );
		
	}
	
}

