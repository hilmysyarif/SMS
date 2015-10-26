<?php
class Onlineexam_model extends CI_Model
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
	
	
	function get_exam_details($ExamId=false,$SubjectId=false,$CURRENTSESSION=false)
	{
			$qry = $this->db->query("select online_exam_id,online_exam_status,online_exam_date,online_exam_details.session,exam_name,online_max_marks,online_cuttoff,online_exam_details.doc,online_exam_level,no_of_qustion,online_ex_duration,duration_per_qus,remarks,ClassName,SectionName,online_exam_level,SubjectName from online_exam_details,class,section,subject where
						online_exam_details.online_section_id=section.SectionId and
						section.SectionId=class.ClassId and
						online_exam_details.online_subject_id=subject.SubjectId 
						order by online_exam_id ");	
			return $qry->Result();	
	}
	
	
	
	function insert_exam_details($table=false,$data=false,$filter=false)
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
	
	
	function get_qustion()
	{
			$qry = $this->db->query("select qust_id,qust_status,qustion,qus_option,answer,qust_ans_description,qust_solution,toal_count_hit,wrong_hit,correct_hit,qust_level,doc,ClassName,SectionName,SubjectName from  qustion_ans_bank,class,section,subject where
						qustion_ans_bank.class_id=section.SectionId and
						section.SectionId=class.ClassId and
						qustion_ans_bank.subject_id=subject.SubjectId 
						order by qust_id ");	
			return $qry->Result();	
	}
	
	
	function get_exam_report()
	{
			$qry = $this->db->query("select online_exam_id,online_exam_status,online_exam_date,online_exam_details.session,exam_name,online_max_marks,online_cuttoff,online_exam_details.doc,online_exam_level,no_of_qustion,online_ex_duration,duration_per_qus,remarks,ClassName,SectionName,online_exam_level,SubjectName from online_exam_details,class,section,subject where
						online_exam_details.online_section_id=section.SectionId and
						section.SectionId=class.ClassId and
						online_exam_details.online_subject_id=subject.SubjectId 
						order by online_exam_id ");	
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
	
	function searchstudent($filter=false,$marksfrom=false,$marksto=false){
					
						$this->db->select('online_exam_st_id,StudentName,AdmissionNo,online_student_status,total_marks,no_of_qus_attemp,online_qust_ans_id,correct_ans,wrong_ans,time_duration,date_of_ex_taken'); 
						$this->db->from('online_exam_student,admission, registration'); 
						$this->db->where("`online_exam_student`.`online_student_id`=`admission`.`AdmissionId`" );
						$this->db->where("`admission`.`RegistrationId`=`registration`.`RegistrationId`" );
						$this->db->where($filter);
						if($marksfrom){
						$this->db->where('total_marks >=',$marksfrom);}if($marksto){ 
						$this->db->where('total_marks <=',$marksto); }
						$res = $this->db->get();
						return $res->Result();
	}
	
	function get_student_report($filter=false)
	{
			$qry = $this->db->query("select online_exam_st_id,StudentName,AdmissionNo,online_student_status,total_marks,no_of_qus_attemp,online_qust_ans_id,correct_ans,wrong_ans,time_duration,date_of_ex_taken from online_exam_student,admission, registration where
						online_exam_student.online_exam_id='$filter' and
						online_exam_student.online_student_id=admission.AdmissionId and
						admission.RegistrationId= registration.RegistrationId 
						order by online_exam_st_id ");	
			return $qry->Result();	
	}
	
	
	
	
	function getonlineexamstudent($admissionid=false)
   {
		$query=$this->db->query("select AdmissionId,AdmissionNo,StudentName,ClassName,SectionName,section.SectionId from admission,registration,class,section where 
								admission.AdmissionId='$admissionid' and
								admission.RegistrationId=registration.RegistrationId and
								registration.SectionId=section.SectionId and
								section.ClassId=class.ClassId");
   			return $query->Result();
   }
   
   function checkexamonline($examid=false)
   {
		$query = $this->db->get_where('online_exam_details', $examid);
			return $query->Result();
   }
   
   function get_random_qus($qusids=false,$class=false,$subject=false,$level=false)
   {
		$query=$this->db->query("select * from qustion_ans_bank where `qust_id` NOT IN (".$qusids.") and
								class_id=".$class." and
								subject_id=".$subject." and
								qust_level='".$level."'
								order by rand() LIMIT 1");
		//echo $this->db->last_query();die;
   			return $query->Result();
   }
   
   function get_qustionid($examstudentid=false)
   {
		$query=$this->db->query("select online_qust_ans_id,total_marks from online_exam_student where 
					online_exam_st_id='$examstudentid'");
   			return $query->Result();
   }
   
   function updateexaminfo($examstudentid=false,$ansstrng=false,$correctans=false,$wrongans=false,$status=false,$timer=false)
	{
			$this->db->query("update online_exam_student set `online_qust_ans_id`='$ansstrng',`correct_ans`=`correct_ans`+$correctans,`wrong_ans`=`wrong_ans`+$wrongans,`total_marks`=`total_marks`+$correctans,`online_student_status`='$status',`time_duration`='$timer',`no_of_qus_attemp`=`no_of_qus_attemp`+1 where `online_exam_st_id`='$examstudentid' ");	
	}
	
	
	function updatequsthit($qusid=false,$chit=false,$whit=false)
	{
			$this->db->query("update qustion_ans_bank set `toal_count_hit`=`toal_count_hit`+1,`wrong_hit`=`wrong_hit`+$whit,`correct_hit`=`correct_hit`+$chit where `qust_id`='$qusid' ");	
	}
   
 
	
	
   
   /* function Delete start.........................................................................  */
   function delete($table=false,$filter=false)
   {
		$this->db->delete($table,$filter);
   }
   /* function Delete end.........................................................................  */
   
	
}