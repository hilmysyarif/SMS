<?php
class Admission_model extends CI_Model
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
	
	function get_class_info($table=false){
	$qry = $this->db->query("select SectionId,SectionName,ClassName from section,class where 
			
			
			class.ClassId=section.ClassId and 
			class.ClassStatus='Active' and section.SectionStatus='Active'
						 order by ClassName ");	
	//print_r($qry);die;
	return $qry->Result();	
		
	}
	function get_gender_info($table=false){
		$qry = $this->db->query("select MasterEntryId,MasterEntryName,MasterEntryValue from masterentry where
		masterentry.MasterEntryId=masterentry.MasterEntryId and
					MasterEntryName='Gender' 
			
				
						 ");
		//print_r($qry);die;
		return $qry->Result();
	
	}
/*	function get_gender_info($table=false){
		
		$this->db->select('MasterEntryValue');
		$this->db->where('MasterEntryName=gender');
		$qry=$this->db->get('masterentry');
		return $qry->Result();
	
	}
	*/
 function get_registration_info($table=false)
   {
   	
   	
   	
   	$query=$this->db->query("select TerminationReason,RegistrationId,StudentName,FatherName,Mobile,ClassName,SectionName,Status,DOR from registration,class,section where
				registration.SectionId=section.SectionId and
						class.ClassId=section.ClassId and 
   			   			registration.RegistrationId=registration.RegistrationId and
						registration.Status!='Deleted' 
						order by RegistrationId ");
  
   //	print_r($query);die;
   	return $query->Result();
   }
 

   function insert_registration($table=false,$data=false,$filter=false)
   {
   	if($filter){
   		$this->db->where($filter);
   		$this->db->update($table,$data);
   		//$id = $filter['RegistrationId'];
   		 
   	} else {
   		if($this->db->insert($table,$data)){
   			$id = $this->db->insert_id();
   			//print_r();die;
   		}else{
   			return false;
   		}
   		
   	}
   	return $id;
   }
  
}