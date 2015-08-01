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
					MasterEntryName='Gender' or MasterEntryName='Caste' or MasterEntryName='Category' or  MasterEntryName='BloodGroup' or  MasterEntryName='TerminationReason' or  MasterEntryName='StudentsDocuments' or  MasterEntryName='Resolution' 
						 ");
		//print_r($qry);die;
		return $qry->Result();
	
	}
	/*function get_info_q($filter=false,$table=false)
	{	$this->db->order_by("QualificationId","RegistrationId", "ASC");
	$query = $this->db->get_where($table, $filter);
	return $query->Result();
	}
	*/
	function get_info($filter=false,$table=false)
	{	$this->db->order_by("RegistrationId", "ASC");
	$query = $this->db->get_where($table, $filter);
	return $query->Result();
	}
 function get_registration_info($table=false,$filter=false)
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
  
   function update_registration($info=false,$filter=false)
   {
  	$this->db->where($filter);
 // print_r($r);die;
  	$this->db->update('registration',$info);
  	$id = $filter['RegistrationId'];
   	//print_r($info);die;
   	return $id;
   //	print_r($RegistrationId);die;
   }
   function update_photos($info=false,$filter=false)
   {
   	$this->db->where($filter);
   	$this->db->update('photos',$info);
   	$id = $filter['RegistrationId'];
   	return $id;
   }
   function insert_registration($info=false,$RegistrationId=false)
   {
   //print_r($id);die;	
  
   		if($this->db->insert('registration',$info)){
   			$RegistrationId = $this->db->insert_id();
   			//print_r($id);die;
   		}else{
   			return false;
   		}
   	
   
   	return $RegistrationId;
   }
   function insert_qualification($info=false,$QualificationId=false)
   {
   	//print_r($id);die;
   
   	if($this->db->insert('qualification',$info)){
   		$QualificationId = $this->db->insert_id();
   		//print_r($id);die;
   	}else{
   		return false;
   	}
   
   	 
   	return $QualificationId;
   }
   function update_qualification($info=false,$filter=false)
   {
   
   	$this->db->where($filter);
   	$this->db->update('qualification',$info);
   	$id = $filter['RegistrationId' && 'QualificationId'];
   	return $id;
   }
  
}