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
	
	function get_exam($CURRENTSESSION=false)
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
	
	function get_report_student_details($CURRENTSESSION=false,$AdmissionId=false)
	{
			$qry = $this->db->query("select registration.RegistrationId,StudentName,FatherName,MotherName,Mobile,ClassName,SectionName,DOB from registration,admission,studentfee,class,section where
	registration.RegistrationId=admission.RegistrationId and
	admission.AdmissionId=studentfee.AdmissionId and
	studentfee.Session='$CURRENTSESSION' and
	admission.AdmissionId='$AdmissionId' and
	studentfee.SectionId=section.SectionId and 
	section.ClassId=class.ClassId");	
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
	
}