<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/zoeken
	 *	- or -  
	 * 		http://example.com/index.php/zoeken/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
class Zoeken extends CI_Controller {

	public function __Construct()
	{
	    parent::__Construct();
	    $this->load->model('faculteiten');
	}
	
	public function index() {
	    $this->load->view('homepage');
	    $this->load->view('allestudies');
     
	 }
	 
	
}

/* End of file zoeken.php */
/* Location: ./application/controllers/zoeken.php */
