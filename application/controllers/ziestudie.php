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
				$data[0]["profielen"]					=	array( "EM", "NT" );
				
				// Get the facultyname
				
				$getfacultyname	=	$this->fubar->getFacultyNameById( $data[0]["facultyId"] );
				
				if( $getfacultyname !== false )
				{
					
					$data[0]["facultyName"]	=	$getfacultyname[0]["faculty_name"];
					
				}
				else
				{
					
					$data[0]["facultyName"]	=	"onbekend";
					
				}
				
				// get needed vakken..
				$data[0]["neededVakken"]	=	$this->fubar->getNeededVakkenByStudieId( $data[0]["id"] );
				
				// Display this shit!
				
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
	 * Private function addToLastSeen( $studieId )
	 * 
	 * Adds the studie to last seen session. No return value.
	 * 
	 */
	
	private function addToLastSeen( $studieId )
	{
				
		if( isset( $_SESSION['lastSeen'] ) )
		{
			
			if( !in_array( $studieId, $_SESSION['lastSeen'] ) )
			{
				
				$_SESSION['lastSeen'][]	=	$studieId;
				
			}
			
			
		}
		else
		{
			
			$_SESSION['lastSeen']	=	array();
			
			$_SESSION['lastSeen'][]	=	$studieId;
			
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
		
		$this->addToLastSeen( $studieID );
		
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
