<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ophalen extends CI_Controller {

	public function __construct()
   	{
    	parent::__construct();
   		// Your own constructor code
   		
   		$this->ophalen();
   		
    }

	/*
	 * 
	 * Public function Ophalen();
	 * 
	 * When called gets new data from the online XML-feed and updates the DB.
	 * 
	 */
	public function ophalen()
	{
		
		$this->load->model('Ophalen_model', 'fubar');
		
		// Eerst database leeg maken
		
		$this->fubar->emptyDb();
		
		// Daarna de XML-bestand omzetten in een lijst met studies
		
		$studies	=	$this->getAllStudies();

		// En op het laatst alle studies doorlopen en in de DB zetten
		
		foreach( $studies as $studie )
		{
			
			$this->fubar->inputInDb( $studie );
			
		}
		
	}
	
	/*
	 * 
	 * Private function emptyDb();
	 * 
	 * Empty's the database.
	 * 
	 */
	
	/*
	 * 
	 * Private function getAllStudies();
	 * 
	 * Opens XML-feed and downloads all the studies.
	 * 
	 */
	
	private function getAllStudies()
	{
		
		// Links to all the studies...
		$links		=	array();
		
		// All the study data, for the return
		$studies	=	array();
		
		$data		=	file_get_contents(  "http://www.hodexer.nl/hodex/uva/hodexDirectory.xml" );
		
		$linkdata	= new SimpleXMLElement( $data );

		for( $i = 0; $i < count($linkdata->hodexResource); $i++ )
		{
			
			$links[]	=	$linkdata->hodexResource[$i]->hodexResourceURL;
			
		}
		
		// Now for all those links get all the data
		
		foreach( $links as $link )
		{
			
			$data	=	file_get_contents( $link );
			
			$studiedata = new SimpleXMLElement( $data );
			
			$studies[]	=	$studiedata;
			
		}
		
		return $studies;
		
	}

	
}
