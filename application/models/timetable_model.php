<?php
class Timetable_model extends CI_Model
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
	
	
	function searchexam($filter=false){
					
						$this->db->select('online_exam_id,online_exam_status,online_exam_date,online_exam_details.session,exam_name,online_max_marks,online_cuttoff,online_exam_details.doc,online_exam_level,no_of_qustion,online_ex_duration,duration_per_qus,remarks,ClassName,SectionName,online_exam_level,SubjectName'); 
						$this->db->from('online_exam_details,class,section,subject'); 
						$this->db->where("`online_exam_details`.`online_section_id`=`section`.`SectionId`" );
						$this->db->where("`section`.`SectionId`=`class`.`ClassId`" );
						$this->db->where("`online_exam_details`.`online_subject_id`=`subject`.`SubjectId`"); 
						$this->db->where($filter); 
						$res = $this->db->get();
						return $res->Result();
	}
	
	
   /* function Delete start.........................................................................  */
   function delete($table=false,$filter=false)
   {
		$this->db->delete($table,$filter);
   }
   /* function Delete end.........................................................................  */
   
	
}