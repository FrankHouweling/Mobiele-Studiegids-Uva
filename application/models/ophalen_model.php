<?php

	class Ophalen_model extends CI_Model {
		
		function __construct()
	    {
	        // Call the Model constructor
	        parent::__construct();
	    }
		
		/*
		 * 
		 * Public function inputindb( $studieobject )
		 * 
		 * Gets a object of a studie and then places it in the Database
		 * 
		 */
		
		public function inputindb( $studieobject )
		{
			// Create empty data array	
			$data	=	array();
			
			$toegestaneExtraVakken	=	array( "wiskunde-A", "wiskunde-B", "natuurkunde", "scheikunde", "biologie", "hbo-propedeuse", "universitaire-bachelor", "latijn", "grieks");
			
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
					
					if( str_replace("bachelor","",(string)$studieobject->programClassification->programLevel) !== (string)$studieobject->programClassification->programLevel )
					{
						
						$degree	=	"BSc";
						
					}
					else if( str_replace("master","",(string)$studieobject->programClassification->programLevel) !== (string)$studieobject->programClassification->programLevel )
					{
						
						$degree	=	"MSc";
						
					}
					else
					{
						
						$degree	=	"UNK";
						
					}
					
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
			
			foreach( $studieobject->programCurriculum->instructionLanguage as $instructionLanguage )
			{

				if( $instructionLanguage->percentage > $highestpercentage )
				{
					
					$highestpercentage					=	$instructionLanguage->percentage;
					$data["instructionLanguage"]	=	(string)$instructionLanguage->languageCode;
					
				}	
				
			}
				
				
			// Study advise has been canceled in this project
						
			/*
			$data["studyAdvise"]		=	true;	//	TODO!
			$data["studyAdviseType"]	=	(string)$studieobject->programClassification->studyAdviseType;	//	TODO!
			$data["studyAdviseMinimum"]	=	(string)$studieobject->programClassification->studyAdviseMinimum;	//	TODO!
			$data["studyAdvisePeriod"]	=	(string)$studieobject->programClassification->studyAdvisePeriod;	//	TODO! ik neem aan in maanden?
			*/
			
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
				
			// Insert all the data to the Database.
				
	        $this->db->insert('project1', $data);
			
			$studieid		=	$this->db->insert_id();
			
			// Check for the admissionable VWO-profiles
			
			$curExtraVakken	=	array();
			
			foreach( $studieobject->programClassification->admissableProgram as $program )
			{
				
				// Removing + EN and OF and replace them by a whitespace character
				$tmpvakken	=	str_replace( "+", " ", str_replace( "en", " ",  str_replace( "of", " ", $program->additionalSubject[0] )));
				
				// Remove those () thingies
				
				foreach( array("(",")",".",",") as $specialchars )
				{
					
					$tmpvakken	=	str_replace( $specialchars, "", $tmpvakken );
					
				}
				
				// BUG FIX for Wiskunde A, Wiskunde B and Wiskunde C (remove spaces in names)
				
				foreach( array( "wiskunde A", "wiskunde B", "wiskunde C", "universitaire bachelor" ) as $vak )
				{
					
					$tmpvakken	=	str_replace( $vak, str_replace(" ", "-", $vak), $tmpvakken );
					
				}
				
				// Remove double whitespace
				
				while( strpos( $tmpvakken , '  ' ) !== false)
				{
					$tmpvakken = str_replace( '  ' , ' ' , $tmpvakken );
				}
				
				// Now add all the vakken in an array
				
				foreach( explode( " ", trim( $tmpvakken ) ) as $vak )
				{
					
					if( !in_array( $vak , $curExtraVakken ) AND in_array( $vak, $toegestaneExtraVakken ) )	//	Making sure no empty fields come in the DB
					{
							
						$curExtraVakken[]	=	$vak;
						
					}
					
				}
				
			}
			
			
			// Now loop through all the needed classes (add them to the DB if needed) and link them
			
			foreach( $curExtraVakken as $extravak )
			{
			
			
				$vakid	=	$this->getVakIdByName( $extravak );

			
				if( $vakid == false )
				{
					
					$this->db->insert( "vakken", array( "vak_name" => $extravak ) );
					
					$vakid	=	$this->db->insert_id();
					
				}
				
				// Insert the link in the table..
				
				$this->db->insert( "needed_vakken", array( "vak_id" => $vakid, "studie_id" => $studieid ) );
				
			}
			
		}

		/*
		 * 
		 * Private function getVakIdByName
		 * 
		 * Returns the ID of a vak by the name, or returns false if it can't find any.
		 * 
		 */

		private function getVakIdByName( $vakname )
		{
			
			$get	=	$this->db->query( "SELECT vak_id FROM vakken WHERE vak_name = '" . $vakname . "'" );
			
			$result	=	$get->result_array();
			if( count( $result ) == 0 )
			{
				return false;
			}
			else
			{
				
				return $result[0]["vak_id"];
			}
			
		}
		
		/*
		 * 
		 * Private function getFacultyId( $facultyName )
		 * 
		 * Returns the name of the faculty which's ID is given
		 * 
		 */

		private function getFacultyId( $facultyName )
		{
			
			// First check if it already exists..
			$result = $this->db->query( "SELECT * FROM faculteiten WHERE faculty_name = '" . mysql_real_escape_string($facultyName) . "'" );
			
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
		
		/*
		 * 
		 * Private function insertFaculty( $facultyName )
		 * 
		 * Inputs a new faculty in the DB with a given name.
		 * 
		 */
		
		private function insertFaculty( $facultyName )
		{
			
			
			$this->db->insert( "faculteiten", array( "faculty_name" => $facultyName ) );
			
			return $this->db->insert_id();
			
		}
		
		/*
		 * 
		 * Public function emptyDb();
		 * 
		 * Empty's the complete database.
		 * 
		 */
		
		public function emptyDb()
		{
			
			$this->db->empty_table('faculteiten');
			$this->db->empty_table('project1');
			$this->db->empty_table('vakken');
			$this->db->empty_table('needed_vakken');
			
		}
		
	}

?>