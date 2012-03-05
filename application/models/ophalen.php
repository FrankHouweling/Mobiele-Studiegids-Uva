<?php

	class Ophalenmodel extends CI_Model {
		
		function __construct()
	    {
	        // Call the Model constructor
	        parent::__construct();
	    }
		
		function inputindb( $studieobject )
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
			
			$data["degree"]				=	$degree;
			$data["financing"]			=	$studieobject->programClassification->financing;
			
			// TODO hieronder:
			$data["numerusFixus"]		=	true;
			
			$data["￼￼programCredits"]		=	$studieobject->programClassification->programCredits;
			$data["programDuration"]	=	$studieobject->programClassification->programDuration;	//	IN MONTHS!
			$data["programForm"]		=	$studieobject->programClassification->programForm;		//	full-time or.. part-time?
			$data["programLevel"]		=	$studieobject->programClassification->programLevel;		//	Bachelor of master
			
			$data["programType"]		=	$studieobject->programClassification->programType;
			$data["startingYear"]		=	$studieobject->programClassification->startingYear;
			
			if( is_array( $data["studyCluster"] ) )
			{
				
				// Multiple? Just get the first one!
				$data["studyCluster"]		=	$studieobject->programClassification->studyCluster[0];		//	Bijv. health care
				
			}
			else
			{
				
				$data["studyCluster"]		=	$studieobject->programClassification->studyCluster;		//	Bijv. health care
				
			}
						
			// Get the main instruction language
			
			$highestpercentage	=	0;
			
			foreach( $studieobject->programClassification->instructionLanguage as $instructionLanguage )
			{
			
				if( $instructionLanguage->percentage > $highestpercentage )
				{
					
					$highestpercentage					=	$instructionLanguage->percentage;
					$data["mainInstructionLanguage"]	=	$instructionLanguage->languageCode;
					
				}	
				
			}
			
			$data["studyAdvise"]		=	true;	//	TODO!
			$data["studyAdviseType"]	=	$studieobject->programClassification->studyAdviseType;	//	TODO!
			$data["studyAdviseMinimum"]	=	$studieobject->programClassification->studyAdviseMinimum;	//	TODO!
			$data["studyAdvisePeriod"]	=	$studieobject->programClassification->studyAdvisePeriod;	//	TODO! ik neem aan in maanden?
			
			
			// Loop through all program descriptions..
			
			foreach( $studieobject->programDescriptions->programDescription as $description )
			{
				
				$values	=	$description->attributes();
				
				// Look for the dutch program description..
				if( $values["lang"] = "nl" )
				{
					
					$data["programDescription"]	=	$description;
					
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
				$programName		=	$studieobject->programDescriptions->programName;	
			}
			
			$data["programName"]	=	$programName;
				
			// Put data in database
	        $this->db->insert('project1', $data);
			
		}
		
	}

?>