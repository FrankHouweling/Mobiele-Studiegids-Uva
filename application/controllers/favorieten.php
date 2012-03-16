<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Favorieten extends CI_Controller {

	public function __construct()
   	{
   		
    	parent::__construct();
		
		$this->load->model('Favorieten_model', 'fubar');
   		
    }
	
	/*
	 * 
	 * Public function add( $studieId )
	 * 
	 * Adds the studie which's ID is given to favourites
	 * 
	 */
	
	public function add( $studieId )
	{
		
		if( $this->fubar->getStudieById( $studieId ) !== false )
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
	 * Pulic function remove( $studieId )
	 * 
	 * Removes a studie from the favourites list by the given ID
	 * 
	 */
	
	public function remove( $studieId )
	{
		
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
