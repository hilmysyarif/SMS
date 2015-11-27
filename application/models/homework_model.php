<?php
class Homework_model extends CI_Model
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
	
	function insert_homework($table=false,$data=false,$filter=false)
   {	
		 if($filter){
			 
				$this->db->where($filter);
				$this->db->update($table,$data);
				//echo $this->db->last_query();die;
		}else{
				$this->db->insert($table,$data);
				$last_id = $this->db->insert_id();
				return $last_id; 
			}
	}
	
	function get_class($CURRENTSESSION=false)
   {
		$query=$this->db->query("select ClassName,SectionName,SectionId from class,section where 
					class.ClassId=section.ClassId and class.ClassStatus='Active' and
					section.SectionStatus='Active' and class.Session='$CURRENTSESSION' order by ClassName");
   			return $query->Result();
   }
   
   function select_for_update($table=false,$filter=false)
   {	
			$query = $this->db->get_where($table, $filter);
			return $query->Result();
			//echo $this->db->last_query();die;
	}
	
	
	function get_homeworklist()
	{
			$qry = $this->db->query("select homework.classid,homework.sectionid,homework.subjectid,homework,dateofhomework,dosubmission,studentstatus,createdon,createdby,updatedon,updatedby,ClassName,SectionName,SubjectName from  homework,class,section,subject where
						homework.classid=class.ClassId and
						homework.sectionid=section.SectionId and
						homework.subjectid=subject.SubjectId ");	
			return $qry->Result();	
	}
	
	
	function get_student($currentsession=false,$admissionid=false)
	{
			$qry = $this->db->query("Select AdmissionId,StudentName,FatherName from registration,admission where
					registration.Session='$currentsession' and
					registration.RegistrationId=admission.RegistrationId and
					admission.AdmissionId='$admissionid' and
					Status='Studying'
					order by StudentName");	
			return $qry->Result();	
	}
	
	
   /* function Delete start.........................................................................  */
   function delete($table=false,$filter=false)
   {
		$this->db->delete($table,$filter);
   }
   /* function Delete end.........................................................................  */
   
	
}