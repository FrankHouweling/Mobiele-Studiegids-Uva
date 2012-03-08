<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ziestudie extends CI_Controller {

	public function __construct()
   	{
   		
    	parent::__construct();
		
		$this->load->model('Ziestudie_model', 'fubar');
   		
    }
	
	public function studie()
	{
		
		// Here we check if there is an ID given and if its right.
   		
		$id		= $this->uri->segment(3, 0);
		
		if( $id  == false )
		{
			
			return false;
			
		}
		else
		{
			
   		
   			$data		=	$this->zieStudie( $id );
			
			if( $data !== false )
			{
					
				$data[0]["instructionLanguageFull"]		=	$this->shortToFull( $data[0]["instructionLanguage"] );
				
				$this->load->view('header', array("page" => $data[0]["programName"] . " - Studie Bekijken", "pagetitle"=> $data[0]["programName"]));
				$this->load->view('ziestudie', $data[0]);
				$this->load->view('footer');
				
			}
			else
			{
				
				// This studie does not exist
				die( "404!" );	//	TODO!
				return false;
				
			}
		}
		
	}
	
	/*
	 * 
	 * Private function shortToFull
	 * 
	 * Makes a full name of the language-shortcode
	 * 
	 */
	
	
	public function shortToFull( $shortcode )
	{
		
		switch( $shortcode )
		{
		
			case "en":
				
				return "Engels";
				
			break;
			
			case "nl":
				
				return "Nederlands";
				
			break;
			
			default:
				
				return "Onbekend";
				
			break;
			
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
