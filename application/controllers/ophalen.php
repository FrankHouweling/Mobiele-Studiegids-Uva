<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ophalen extends CI_Controller {

	public function ophalen()
	{
		
		// Eerst database leeg maken
		
		$this->emptyDb();
		
		// Daarna de XML-bestand omzetten in een lijst met studies
		
		$studies	=	$this->getAllStudies();
		
		// En op het laatst alle studies doorlopen en in de DB zetten
		
		foreach( $studies as $studie )
		{
			
			$this->inputInDb( $studie );
			
		}
		
	}
	
	private function emptyDb()
	{
		// TODO
	}
	
	private function getAllStudies()
	{
		// TODO
	}
	
	private function inputInDb( array $studieData )
	{
		// TODO
	}
	
}
