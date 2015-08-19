<?php
class Frontoffice_model extends CI_Model
{
	//variable initialize
	var $title   = '';
	var $content = '';
	var $date    = '';

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();

		//Load database connection
		$this->load->database();
	}
	
	function get_student($CURRENTSESSION=false)
	{
			$qry = $this->db->query("Select Distance,FeeStructure,admission.AdmissionId,registration.RegistrationId,StudentName,FatherName,Mobile,ClassName,SectionName,section.SectionId,class.ClassId from registration,class,section,admission,studentfee where
					studentfee.Session='$CURRENTSESSION' and
					class.ClassId=section.ClassId and
					studentfee.SectionId=section.SectionId and
					registration.RegistrationId=admission.RegistrationId and
					admission.AdmissionId=studentfee.AdmissionId and 
					Status='Studying' 
					order by StudentName");	
			return $qry->Result();	
	}
	
	
   
  
   
  
	 
}