<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ziestudie extends CI_Controller {

	public function __construct()
   	{
    	parent::__construct();
   		
		
		// Here we check if there is an ID given and if its right..
		
		$this->load->model('Ziestudie_model', 'fubar');
   		
		$id		= $this->uri->segment(2, 0);
		
		if( $id  == false )
		{
			
			return false;
			
		}
		else
		{
			
			$studieID	=	1;	//	TODO
   		
   			$data		=	$this->zieStudie( $id );
			
			$this->load->view('header', array("page" => $data[0]["programName"] . " - Studie Bekijken"));
			$this->load->view('ziestudie', $data);
			$this->load->view('footer');
			
		}
   		
    }
	
	/*
	 * 
	 * Private function zieStudie();
	 * 
	 * Generates the page for a studie..
	 * 
	 */
	
	private function zieStudie( $studieID )
	{
		
		$data	=	$this->fubar->getStudie( $studieID );
		
		if( $data !== false )
		{
			
			return $data;
			
		}
		else
		{
			
			return false;	// Er bestaat geen studie met dat ID..
			
		}	
		
	}


}
    
?>