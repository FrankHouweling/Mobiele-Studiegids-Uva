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
   		
   			$this->zieStudie( $id );
			
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
		
		if( $this->fubar->isStudie( $studieID ) )
		{
			
			// Het weergeven enso
			
		}
		else
		{
			
			die( "Geen geldige studie!" );	//	TODO: remove this
			return false;
			
		}	
		
	}


}
    
?>