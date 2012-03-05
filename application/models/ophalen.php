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
			
			$data["degree"]				=	$studieobject->programClassification->degree;
			$data["financing"]			=	$studieobject->programClassification->financing;
			
			// TODO hieronder:
			$data["numerusFixus"]		=	true;
			
			$data["￼￼programCredits"]		=	$studieobject->programClassification->programCredits;
			$data["programDuration"]	=	$studieobject->programClassification->programDuration;	//	IN MONTHS!
			$data["programForm"]		=	$studieobject->programClassification->programForm;		//	full-time or.. part-time?
			$data["programLevel"]		=	$studieobject->programClassification->programLevel;		//	Bachelor of master
			
			$data["programType"]		=	$studieobject->programClassification->programType;
			$data["startingYear"]		=	$studieobject->programClassification->startingYear;
			$data["studyCluster"]		=	$studieobject->programClassification->studyCluster;		//	Bijv. health care
			
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
				
			// Put data in database
	        $this->db->insert('project1', $data);
			
		}
		
	}

?>