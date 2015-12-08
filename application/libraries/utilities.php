<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
	/**
	Developer : Rohit thakur
	Utilities : Utilities Class for customization function
	*/
	
class Utilities extends CI_Controller {

	public function __construct() 
	{
         # parent::__construct();
		$ci =& get_instance();
		$ci->load->model('mhome');
	 }
	 
	function get_balance()
	{
		$CI = & get_instance();
		$query=$CI->db->query("select AccountName,(OpeningBalance+AccountBalance) as totalamount from accounts 
			order by AccountName ");
		return $query->Result();
	}
	
	function get_language()
	{
		$CI = & get_instance();
		$query=$CI->db->query("SELECT LanguageId,LanguageName from `lang` ");
		return $query->Result();
	}
	
	function get_languagename($id=false)
	{
		$CI = & get_instance();
		$query=$CI->db->query("SELECT LanguageName from `lang` where LanguageId=$id");
		return $query->Result();
	}
	
	function get_usertype($filter=false)
	{
		$CI = & get_instance();
		$CI->db->select('*');
		$CI->db->where('MasterEntryValue !=' ,'parents');
		$CI->db->where('MasterEntryValue !=' ,'student');
		$CI->db->where('MasterEntryName' ,'UserType');
		$query = $CI->db->get('masterentry');
		return $query->Result();
	}
	
	function get_masterval($table=false,$filter=false)
	{
		$CI = & get_instance();
		$CI->db->select('*');
		$query = $CI->db->get_where($table,$filter);
			
		return $query->Result();
	}
	
	function get_classval($table=false,$filter=false)
	{
		$CI = & get_instance();
		$query=$CI->db->query("select ClassName,SectionName,SectionId from class,section where 
						class.ClassId=section.ClassId and  section.SectionId in(".$filter.") and class.ClassStatus='Active' and
						section.SectionStatus='Active'  order by ClassName  ");
	//	echo $CI->db->last_query();
		return $query->Result();
	}
	
	function get_headerfooter($table=false,$filter=false)
	{
		$CI = & get_instance();
		$query=$CI->db->query("select ClassName,SectionName from class,section where section.SectionId in(".$filter.") and section.SectionId=class.ClassId");
		return $query->Result();
	}
	
	function get_student_admission($currentsession=false)
	{ 
		$CI = & get_instance();
		$query=$CI->db->query("Select RegistrationId,StudentName,FatherName,Mobile,ClassName,SectionName,section.SectionId,class.ClassId from registration,class,section where
					registration.Session='$currentsession' and
					class.ClassId=section.ClassId and
					registration.SectionId=section.SectionId and
					Status='NotAdmitted'
					order by StudentName");
		return $query->Result();
	}
	
	function get_student($sec_id,$CURRENTSESSION)
	{ 
		$CI = & get_instance();
		$query=$CI->db->query("Select studentfee.AdmissionNo,studentfee.Remarks,Date,studentfee.Distance,FeeStructure,admission.AdmissionId,registration.RegistrationId,StudentName,FatherName,Mobile,ClassName,SectionName,section.SectionId,class.ClassId from registration,class,section,admission,studentfee where
						studentfee.Session='$CURRENTSESSION' and
						class.ClassId=section.ClassId and
						studentfee.SectionId=section.SectionId and
						registration.RegistrationId=admission.RegistrationId and
						admission.AdmissionId=studentfee.AdmissionId and 
						studentfee.SectionId=$sec_id and 
						Status='Studying'
						order by StudentName");
		return $query->Result();
	}
	
	function get_fee($sec_id,$CURRENTSESSION)
	{
		$CI = & get_instance();
		$query=$CI->db->query("Select fee.Amount,masterentry.MasterEntryValue,masterentry.MasterEntryId from fee,masterentry where
						fee.Session='$CURRENTSESSION' and
						fee.SectionId=$sec_id and
						fee.FeeType=masterentry.MasterEntryId and 
						FeeStatus='Active'
						order by FeeType");
		return $query->Result();
	}
	
	function show_subject($sec_id,$CURRENTSESSION)
	{
		$CI = & get_instance();
		$query=$CI->db->query("Select * from subject where
						Session='$CURRENTSESSION' and
						Class LIKE '%{$sec_id}%' and
						SubjectStatus='Active'
						order by SubjectName");
						
		return $query->Result();
	}
	
	function get_student_name($currentsession=false,$admissionid=false)
	{ 
		$CI = & get_instance();
		$query=$CI->db->query("Select StudentName,FatherName from registration,admission where
					registration.Session='$currentsession' and
					registration.RegistrationId=admission.RegistrationId and
					admission.AdmissionId='$admissionid' and
					Status='Studying'
					order by StudentName");
		return $query->Result();
	}
	
	function getmext_class($NextSession)
	{ 
		$CI = & get_instance();
		$query=$CI->db->query("select ClassName,SectionName,SectionId from class,section where 
						class.ClassId=section.ClassId and class.ClassStatus='Active' and
						section.SectionStatus='Active' and class.Session='$NextSession' order by ClassName");
		return $query->Result();
	}
	
	function checkfeeadded($Token=false,$FeeType=false)
	{
		$CI = & get_instance();
		$query=$CI->db->query("select FeePaymentId from feepayment where Token='$Token' and FeeType='$FeeType'");
		return $query->Result();
	}
	
	function selectfeestructure($CURRENTSESSION=false,$AdmissionId=false,$SectionId=false)
	{
		$CI = & get_instance();
		$query=$CI->db->query("select FeeStructure from studentfee where Session='$CURRENTSESSION' and AdmissionId='$AdmissionId' and SectionId='$SectionId'");
		return $query->Result();
	}
	
	function selectfeepayment($AdmissionId=false,$CURRENTSESSION=false,$FeeType=false)
	{
		$CI = & get_instance();
		$query=$CI->db->query("select SUM(feepayment.Amount) as PaidFeeType,MasterEntryValue as FeeName from feepayment,transaction,fee,masterentry where
			feepayment.Token=transaction.Token and
			feepayment.FeeType=fee.FeeId and
			fee.FeeType=masterentry.MasterEntryId and
			transaction.TransactionHead='Fee' and
			transaction.TransactionHeadId='$AdmissionId' and
			transaction.TransactionSession='$CURRENTSESSION' and 
			transaction.TransactionStatus='Active' and
			feepayment.FeeType='$FeeType' group by feepayment.FeeType");
		return $query->Result();
	}
	
	function insertpayment($Token=false,$FeeType=false,$Amount=false,$status=false)
	{	
		$CI = & get_instance();
		$query=$CI->db->query("INSERT INTO feepayment(Token,FeeType,Amount,FeePaymentStatus) values('$Token','$FeeType','$Amount','$status')");
	}
	
	function getpaymentpending($Token=false)
	{
		$CI = & get_instance();
		$query=$CI->db->query("select MasterEntryValue,feepayment.Amount,FeePaymentId from feepayment,fee,masterentry where 
				fee.FeeId=feepayment.FeeType and 
				fee.FeeType=masterentry.MasterEntryId and 
				Token='$Token' and
				FeePaymentStatus='Pending'");
		return $query->Result();
	}
	
	function getsalarystructure()
	{
		$CI = & get_instance();
		$query=$CI->db->query("Select SalaryStructureName,FixedSalaryHead,SalaryStructureId from salarystructure where SalaryStructureStatus='Active'");
		return $query->Result();
	}
	
	function selectsalaryhead()
	{
		$CI = & get_instance();
		$query=$CI->db->query("select SalaryHeadId,MasterEntryValue,SalaryHead,Code from salaryhead,masterentry where 
		salaryhead.SalaryHeadType=masterentry.MasterEntryId and
		SalaryHeadStatus='Active'");
		return $query->Result();
	}
	
	function fixedsalaryhead($q=false)
	{
		$CI = & get_instance();
		$query=$CI->db->query("select FixedSalaryHead from salarystructure where SalaryStructureStatus='Active' and SalaryStructureId='$q' ");
		return $query->Result();
	}
	
	function get_onlineexamreport($filter=false)
	{
		$CI = & get_instance();
		$query=$CI->db->query("select count(online_student_id) as total_student, SUM(IF(online_student_status = 'Pass', 1,0)) as total_pass,SUM(IF(online_student_status = 'Fail', 1,0)) as total_fail,MAX(total_marks) as max_marks, MIN(total_marks) as min_marks from online_exam_student where online_exam_id='$filter' ");
		return $query->Result();
	}
	
	function getbooktotal($filter=false)
	{
		$CI = & get_instance();
		$query=$CI->db->query("select Count(ListBookId) as TotalBook from listbook where ListBookStatus='Active' and BookId='$filter' ");
		return $query->Result();
	}
	
	function checkaccession($AccessionNo=false,$Token=false)
	{
		$CI = & get_instance();
		$query=$CI->db->query("select AccessionNo from listbook where AccessionNo='$AccessionNo' and (ListBookStatus='Active' or (ListBookStatus='Pending' and Token='$Token')) ");
		return $query->Result();
	}
	
	function insertbook($Token=false,$BookId=false,$AccessionNo=false)
	{	
		$CI = & get_instance();
		$query=$CI->db->query("INSERT INTO listbook(Token,BookId,AccessionNo,ListBookStatus) values('$Token','$BookId','$AccessionNo','Pending')");
	}
	
	function getbookconfirm($Token=false)
	{
		$CI = & get_instance();
		$query=$CI->db->query("select ListBookId,BookName,AuthorName,AccessionNo from book,listbook where 
			book.BookId=listbook.BookId and 
			ListBookStatus='Pending' and
			Token='$Token'");
		return $query->Result();
	}
	function getbooks($filter=false)
	{
		$CI = & get_instance();
		$query=$CI->db->query("Select BookName,AuthorName,AccessionNo from book,listbook where
						ListBookId='$filter' and
						book.BookId=listbook.BookId ");
		return $query->Result();
	}
	
	function select_phrase($filter=false)
	{
		$CI = & get_instance();
		$query=$CI->db->query("select PhraseId,Phrase from phrase");
		return $query->Result();
	}
	
	function select_translate($LANGUAGE=false)
	{
		$CI = & get_instance();
		$query=$CI->db->query("select Translation from translate where LanguageId='$LANGUAGE'");
		return $query->Result();
	}
	
	
}



?>
