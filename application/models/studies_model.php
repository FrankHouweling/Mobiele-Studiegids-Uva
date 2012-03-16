<?php

	class Studies_model extends CI_Model {
		
		function __construct()
	    {
	        
	        // Call the Model constructor
	        parent::__construct();
	        
	    }
		
		
       /*
        *   Public function getAll 
        *
        *   get all studies from database 
        */
        
        public function getAll()
		{
		   
		    $query = $this->db->get_where('project1');
	        
	        return $query->result_array();
		    
		}
		
	   /*
        *   Private function getAllVakIds  
        *
        *   get all vak Id's from database for filter on toelatingseisen
        */
		
		private function getAllVakIds()
		{
			
			$ret 	=	array();
			
			$query	=	$this->db->query( "SELECT vak_id FROM vakken WHERE vak_name NOT LIKE ('%wiskunde%') AND vak_name NOT LIKE ('%hbo%')" );
			
			foreach( $query->result_array() as $res )
			{
				
				$ret[]	=	$res["vak_id"];
				
			}
			
			return $ret;
			
		}
		
	   /*
        *   Private function studieNaamToVakId 
        *
        *   
        */
		
		private function studieNaamToVakId( $studieNaam )
		{
		
			$query	=	$this->db->query( "SELECT vak_id FROM vakken WHERE vak_name = '" . $studieNaam . "'" );
			
			$res	=	$query->result_array();
			
			return $res[0]['vak_id'];
			
		}
		
		public function getFiltered( $get )
	    {
	    
			
			$query	=	"SELECT project1.* FROM project1, needed_vakken";
		
			//	Query opbouwen
			
			$tus	=	array();
			
			// Wiskunde probleem..
			
			switch( $get['wiskunde'] )
			{
				
				case "a":
					
					$kannietdoen	=	array("B");
					
				break;
				case "b":
				
					$kannietdoen		=	array();
				
				break;
				case "c":
					$kannietdoen	=	array("A","B");
				break;
				
			}
			
			foreach( $kannietdoen as $kndn  )
			{
				
				$tus[]	= "( needed_vakken.studie_id = project1.id AND needed_vakken.vak_id != " . $this->studieNaamToVakId( "wiskunde-" . $kndn ) . "  )";
				
			}
			
			foreach( $this->getAllVakIds() as $vakid )
			{
				
				//	Krijg alle vakken die je NIET hebt gedaan
				
				if( !isset( $get['checkbox-' . $vakid] ) )	
				{
					
					// Haal nu alle studies op die dat NIET nodig hebben
					
					$tus[]	= "( needed_vakken.studie_id = project1.id AND needed_vakken.vak_id != " . $vakid . "  )";
					
				}
				
			}
			
			if( !count($tus) == 0 )
			{
				
				$query	=	$query . " WHERE " . implode(" AND ", $tus) . "OR";
				
			}
			else
			{
				
				$query	=	" WHERE ";
				
			}
			
			$query	=	" ( SELECT COUNT(*) FROM needed_vakken WHERE studie_id = project1.id ) = 0
						GROUP BY
						project1.id";
		
	
			// Query uitvoeren
			
	        $query = $this->db->query( $query );
	        
	        return $query->result_array();
	        
	    }
}

?>
