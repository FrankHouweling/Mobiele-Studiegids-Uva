<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Favorieten extends CI_Controller {

	public function __construct()
   	{
   		
    	parent::__construct();
		
		$this->load->model('Favorieten_model', 'fubar');
   		
    }
	
	/*
	 * 
	 * Public function add() )
	 * 
	 * Adds the studie which's ID is given to favourites
	 * 
	 */
	
	public function add( )
	{
		
		$studieId	=	$this->uri->segment(3);
		
		if( $this->fubar->getDataByIds( $studieId ) !== false )
		{
			
			if( !in_array( $studieId, $_SESSION['favorieten'] ) )
			{
			
				$_SESSION["favorieten"][]	=	$studieId;
				
			}
			
		}
			
		header( "Location: ../../index.php" );
		
	}
	
	/*
	 * 
	 * Pulic function remove()
	 * 
	 * Removes a studie from the favourites list by the given ID
	 * 
	 */
	
	public function remove( $studieId )
	{
		
		$studieId	=	$this->uri->segment(3);
		
		$_SESSION['favorieten']	=	remove_element( $_SESSION['favorieten'], $sutdieId );
		
		header( "Location: ../../index.php" );
		
	}
	
	/*
	 * 
	 * Private function remove_element( $arr, $val )
	 * 
	 * Removes the given value ($val) from the given array $arr and returns the new array
	 * 
	 */
	
	private function remove_element($arr, $val){
		
		foreach ($arr as $key => $value){
			
			if ($arr[$key] == $val){
				
				unset($arr[$key]);
				
			}
			
		}
	
		return $arr = array_values($arr);
	
	}


}
    
?>
