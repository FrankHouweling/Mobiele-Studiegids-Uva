<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	 
class Zoeken extends CI_Controller {

	public function __Construct()
	{
	    parent::__Construct();  
	    $this->load->model('Allestudies_model');
	    //$this->load->model('Faculteiten_model');
	}
	
	public function allestudies()
	{
	    $data = $this->Allestudies_model->getall();    
	    	
		//$data	=	array("english", "informatiekunde");	
		
		$this->load->view( "header", array( "page" => "Alle Studies - Studies Zoeken", "pagetitle" => "Alle Studies" ) );
		$this->load->view( "allestudies", array("programName" => $data));
		$this->load->view( "footer" );
		
	}
	
    public function faculteit()
	{
	
		$data	=	array();	//	TODO!
		
		$this->load->view( "header", array( "page" => "Alle Studies - per Faculteit ", "pagetitle" => "Studies op Faculteit" ) );
		$this->load->view( "faculteiten", $data);
		$this->load->view( "footer" );
		
	}
	
public function toelatingseisen()
	{
	
		$data	=	array();	//	TODO!
		
		$this->load->view( "header", array( "page" => "Alle Studies - op Toelatingseisen", "pagetitle" => "Studies op Toelatingseisen" ) );
		$this->load->view( "toelatingseisen", $data);
		$this->load->view( "footer" );
		
	}
	
	public function keyword()
	{
	
		$data	=	array();	//	TODO!
		
		$this->load->view( "header", array( "page" => "Studies Zoeken", "pagetitle" => "Studies Zoeken" ) );
		$this->load->view( "zoeken", $data);
		$this->load->view( "footer" );
		
	}

public function favorieten()
	{
	
		$data	=	array();	//	TODO!
		
		$this->load->view( "header", array( "page" => "Favorieten", "pagetitle" => "Favoriete Studies" ) );
		$this->load->view( "favorieten", $data);
		$this->load->view( "footer" );
		
	}
	
public function laatstbekeken()
	{
	
		$data	=	array();	//	TODO!
		
		$this->load->view( "header", array( "page" => "Laatst bekeken Studies", "pagetitle" => "Laatst Bekeken" ) );
		$this->load->view( "laatstbekeken", $data);
		$this->load->view( "footer" );
		
	}
}

