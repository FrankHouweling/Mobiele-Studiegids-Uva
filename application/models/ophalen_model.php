<?php

	class Ophalen_model extends CI_Model {
		
		function __construct()
	    {
	        // Call the Model constructor
	        parent::__construct();
	    }
		
		public function inputindb( $studieobject )
		{
			// Create empty data array	
			$data	=	array();
			
			// Put data in array
			
			switch( $studieobject->programClassification->degree )
			{
				
				case "MA":
					$degree	=	"MSc";	//	Master of Science
				break;
				case "BSc":
					$degree	=	"BSc";	// Bachelor of Science
				break;
				case "BSa":
					$degree	=	"BSa";	//	Bachelor of Arts, komt dat voor?
				break;
				case "certificate":
					$degree	=	"CER";	//	Certificaat
				break;
				default:
					$degree	=	"UNK";	//	unknown
				break;
			}
			
			$data["degree"]				=	(string)$degree;
			$data["financing"]			=	(string)$studieobject->programClassification->financing;
			
			if( empty( $studieobject->programClassification->numerusFixus ) )
			{
				$data["numerusFixus"]	=	false;
			}
			else
			{
				$data["numerusFixus"]	=	$studieobject->programClassification->numerusFixus;
			}
			
			$data["programCredits"]		=	(string)$studieobject->programClassification->programCredits;
			$data["programDuration"]	=	(string)$studieobject->programClassification->programDuration;	//	IN MONTHS!
			$data["programForm"]		=	(string)$studieobject->programClassification->programForm;		//	full-time or.. part-time?
			$data["programLevel"]		=	(string)$studieobject->programClassification->programLevel;		//	Bachelor of master
			
			$data["programType"]		=	(string)$studieobject->programClassification->programType;
			$data["startingYear"]		=	(string)$studieobject->programClassification->startingYear;
			
			if( is_array( $studieobject->programClassification->studyCluster ) )
			{
				
				// Multiple? Just get the first one!
				$data["studyCluster"]		=	(string)$studieobject->programClassification->studyCluster[0];		//	Bijv. health care
				
			}
			else
			{
				
				$data["studyCluster"]		=	(string)$studieobject->programClassification->studyCluster;		//	Bijv. health care
				
			}
						
			// Get the main instruction language
			
			$highestpercentage	=	0;
			
			foreach( $studieobject->programClassification->instructionLanguage as $instructionLanguage )
			{
			
				if( $instructionLanguage->percentage > $highestpercentage )
				{
					
					$highestpercentage					=	$instructionLanguage->percentage;
					$data["mainInstructionLanguage"]	=	(string)$instructionLanguage->languageCode;
					
				}	
				
			}
			
			$data["studyAdvise"]		=	true;	//	TODO!
			$data["studyAdviseType"]	=	(string)$studieobject->programClassification->studyAdviseType;	//	TODO!
			$data["studyAdviseMinimum"]	=	(string)$studieobject->programClassification->studyAdviseMinimum;	//	TODO!
			$data["studyAdvisePeriod"]	=	(string)$studieobject->programClassification->studyAdvisePeriod;	//	TODO! ik neem aan in maanden?
			
			
			// Loop through all program descriptions..
			
			foreach( $studieobject->programDescriptions->programDescription as $description )
			{
				
				$values	=	$description->attributes();
				
				// Look for the dutch program description..
				if( $values["lang"] = "nl" )
				{
					
					$data["programDescription"]	=	(string)$description;
					
				}
				
			}
			
			// If there are multiple names for multiple languages, look for the dutch one...
			
			if( is_array( $studieobject->programDescriptions->programName ) )
			{
			
				$programName	=	"";
				
				foreach( $studieobject->programDescriptions->programName as $tmpprog )
				{
					
					// If the language of the programname is dutch, put it in the specified variable.
					if( $tmpprog->attributes()->lang == "nl" )
					{
						
						$programName	=	$tmpprog;
						
					}
					
				}
				
			}
			else
			{
				$programName		=	(string)$studieobject->programDescriptions->programName;	
			}
			
			$data["programName"]	=	(string)$programName;
			
			$data["facultyId"]		=	$this->getFacultyId( (string)$studieobject->programFree->facultyId );
				
	        $this->db->insert('project1', $data);
			
			
		}

		private function getFacultyId( $facultyName )
		{
			
			// First check if it already exists..
			$result = $this->db->query( "SELECT * FROM faculteiten WHERE faculty_name = '" . $facultyName . "'" );
			
			if( count($result->result_array()) == 0 )	// TODO I don't know if this function works this way but let's try
			{
				
				return $this->insertFaculty( $facultyName );
				
			}
			else
			{
				
				$rst	=	 $result->result_array();
				
				return $rst[0]['id'];
				
			}
			
		}
		
		private function insertFaculty( $facultyName )
		{
			
			
			$this->db->insert( "faculteiten", array( "faculty_name" => $facultyName ) );
			
			return $this->db->insert_id();
			
		}
		
		public function emptyDb()
		{
			
			$this->db->empty_table('faculteiten');
			$this->db->empty_table('project1');
			$this->db->empty_table('profielen');
			$this->db->empty_table('profieleisen');
			
		}
		
	}

?>