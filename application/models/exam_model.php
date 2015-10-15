<?php
class Exam_model extends CI_Model
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
	
	/*function get_exam($CURRENTSESSION=false)
	{
			$qry = $this->db->query("select exam.SectionId,ExamId,ExamName,ClassName,SectionName from exam,section,class where
					ExamStatus='Active' and
					exam.Session='$CURRENTSESSION' and
					class.ClassId=section.ClassId and
					exam.SectionId=section.SectionId and
					class.ClassStatus='Active' and
					section.SectionStatus='Active'");	
			return $qry->Result();	
	}*/
	
	function get_exam($CURRENTSESSION=false)
	{
			$qry = $this->db->query("select Exam_Type from examtype where Exam_Status='Active'");	
			return $qry->Result();	
	}
	
	function get_subject($CURRENTSESSION=false)
	{
			$qry = $this->db->query("select SubjectName,subject.SubjectId,Class from subject,examdetail where
						Session='$CURRENTSESSION' and SubjectStatus='Active' and ExamDetailStatus='Active' and 
						subject.SubjectId=examdetail.SubjectId group by examdetail.SubjectId");	
			return $qry->Result();	
	}
	
	function get_exam_details($ExamId=false,$SubjectId=false,$CURRENTSESSION=false)
	{
			$qry = $this->db->query("select ExamDetailId,ExamActivityName,MaximumMarks,SubjectName,Marks from examdetail,exam,subject where
						examdetail.ExamId=exam.ExamId and
						examdetail.ExamId='$ExamId' and
						examdetail.SubjectId='$SubjectId' and
						examdetail.SubjectId=subject.SubjectId and
						exam.Session='$CURRENTSESSION' and
						ExamDetailStatus='Active'
						order by ExamActivityName");	
			return $qry->Result();	
	}
	
	function get_exam_class($ExamId=false,$CURRENTSESSION=false)
	{
			$qry = $this->db->query("select ClassName,SectionName,ExamName,section.SectionId from exam,class,section where 
						exam.ExamId='$ExamId' and
						exam.SectionId=section.SectionId and
						class.ClassId=section.ClassId and
						exam.Session='$CURRENTSESSION'");	
			return $qry->Result();	
	}
	
	function get_student_detail($SectionId=false,$CURRENTSESSION=false)
	{
			$qry = $this->db->query("select registration.RegistrationId,StudentName,Mobile from registration,admission,studentfee where
						registration.RegistrationId=admission.RegistrationId and
						admission.AdmissionId=studentfee.AdmissionId and
						studentfee.Session='$CURRENTSESSION' and
						studentfee.SectionId='$SectionId' order by StudentName");	
			return $qry->Result();	
	}
/*Scmarks Setup starts...........................................................................................................................*/
	
	function get_exam_scmark($SectionId=false,$CURRENTSESSION=false)
	{
			$qry = $this->db->query("select exam.SectionId,ExamId,ExamName,ClassName,SectionName from exam,section,class where
						ExamStatus='Active' and
						exam.Session='$CURRENTSESSION' and
						class.ClassId=section.ClassId and
						exam.SectionId=section.SectionId and
						class.ClassStatus='Active' and
						section.SectionStatus='Active'");	
			return $qry->Result();	
	}
	
	function get_masterentry_scmark($SectionId=false,$CURRENTSESSION=false)
	{
			$qry = $this->db->query("select SCAreaId,SCAreaName,MasterEntryValue,SCAreaClass,GradingPoint from masterentry,scarea where
							Session='$CURRENTSESSION' and scarea.SCPartId=masterentry.MasterEntryId");	
			return $qry->Result();	
	}
	
	function get_report_class($CURRENTSESSION=false)
	{
			$qry = $this->db->query("select ClassName,SectionName,SectionId from class,section where 
					class.ClassId=section.ClassId and class.ClassStatus='Active' and
					section.SectionStatus='Active' and class.Session='$CURRENTSESSION' order by ClassName");	
			return $qry->Result();	
	}
	
	function get_report_student_details($filter=false,$session=false)
	{
			
			$this->db->select('Exam_Type,Student_Id,ClassName,SectionName,StudentName,FatherName,MotherName,DOB,AdmissionNo,SubjectName,examdetails.Session,Marks_Obtain,Max_Marks,Result,Grade,examdetails.Remarks,MasterEntryValue,DateOfExam,Evaluated_By'); 
						$this->db->from('examdetails,class,section,admission, registration,subject,masterentry'); 
						$this->db->where($filter);
						$this->db->where("`examdetails`.`Section_Id`=`section`.`SectionId`" );
						$this->db->where("`section`.`ClassId`=`class`.`ClassId`" );
						$this->db->where("`examdetails`.`Student_Id`=`admission`.`AdmissionId`" );
						$this->db->where("`admission`.`RegistrationId`=`registration`.`RegistrationId`" );
						$this->db->where("`examdetails`.`Result`=`masterentry`.`MasterEntryId`" );
						$this->db->where('examdetails.Session',$session );
						$this->db->where("`examdetails`.`Subject_Id`=`subject`.`SubjectId`" );
						
						$res = $this->db->get();
						return $res->Result();
	}
	
	function get_report_school_details()
	{
			$qry = $this->db->query("select SchoolName,SchoolAddress,District,State,RegistrationNo,AffiliationNo from generalsetting  ");	
			return $qry->Result();	
	}
	
	function get_report_exam_details($CURRENTSESSION=false,$AdmissionId=false)
	{
			$qry = $this->db->query("select ExamId,exam.SectionId,ExamName,Weightage from exam,studentfee,registration,admission where
	exam.SectionId=studentfee.SectionId and
	exam.Session='$CURRENTSESSION' and
	registration.RegistrationId=admission.RegistrationId and
	admission.AdmissionId=studentfee.AdmissionId and
	registration.RegistrationId='$AdmissionId' and
	studentfee.Session='$CURRENTSESSION' and
	ExamStatus='Active'");	
			return $qry->Result();	
	}
	
	function get_report_sub_details($CURRENTSESSION=false,$SectionId=false)
	{
			$qry = $this->db->query("select SubjectId,SubjectName,SubjectAbb,Class,SubjectId from subject where SubjectStatus='Active' and Session='$CURRENTSESSION' and FIND_IN_SET($SectionId, Class) > 0");	
			return $qry->Result();	
	}
	
	function get_report_marks_details($ExamId=false,$SubjectId=false)
	{
			$qry = $this->db->query("select ExamActivityName,MaximumMarks,Marks from examdetail where ExamDetailStatus='Active' and ExamId='$ExamId' and SubjectId='$SubjectId' order by ExamActivityName");	
			return $qry->Result();	
	} 
	
	function get_scmark_exam($CURRENTSESSION=false)
	{
			$qry = $this->db->query("select exam.SectionId,ExamId,ExamName,ClassName,SectionName from exam,section,class where
						ExamStatus='Active' and
						exam.Session='$CURRENTSESSION' and
						class.ClassId=section.ClassId and
						exam.SectionId=section.SectionId and
						class.ClassStatus='Active' and
						section.SectionStatus='Active'");	
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
			}
	}
	
	function get_class($CURRENTSESSION=false)
   {
   $query=$this->db->query("select ClassName,SectionName,SectionId from class,section where 
					class.ClassId=section.ClassId and class.ClassStatus='Active' and
					section.SectionStatus='Active' and class.Session='$CURRENTSESSION' order by ClassName");
   			return $query->Result();
   }
   
   function get_markssetup($CURRENTSESSION=false)
	{
			$qry = $this->db->query("select Exam_Detail_Id,Exam_Type,ClassName,SectionName,StudentName,FatherName,SubjectName,Marks_Obtain,Max_Marks,MasterEntryValue,Grade,examdetails.Remarks,DateOfExam,DOC,Evaluated_By from examdetails,section,class,admission,registration,subject,masterentry where
						Exam_Detail_Status='Active' and
						examdetails.Session='$CURRENTSESSION' and
						examdetails.Section_Id=section.SectionId and
						class.ClassId=section.ClassId and
						examdetails.Section_Id=section.SectionId and
						examdetails.Student_Id=admission.AdmissionId and
						admission.RegistrationId=registration.RegistrationId and
						examdetails.Subject_Id=subject.SubjectId and
						examdetails.Result=masterentry.MasterEntryId
						");	
			return $qry->Result();	
	} 
	
	function marksetup_up($examid=false,$CURRENTSESSION=false)
   {
   $query=$this->db->query("select * from examdetails where 
					Exam_Detail_Id='$examid' and
					Session='$CURRENTSESSION' ");
   			return $query->Result();
   }
   
   function marksetup_up_sub($student=false,$subject=false)
   {
   $query=$this->db->query("select StudentName,FatherName,Mobile,SubjectId,SubjectName from  admission,registration,subject where 
					admission.AdmissionId='$student' and
					admission.RegistrationId=registration.RegistrationId and
					subject.SubjectId='$subject'  ");
   			return $query->Result();
   }
   
   /* function Delete start.........................................................................  */
   function delete($table=false,$filter=false)
   {
		$this->db->delete($table,$filter);
   }
   /* function Delete end.........................................................................  */
   
	
}
