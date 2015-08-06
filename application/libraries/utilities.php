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
		$query=$CI->db->query("SELECT AccountBalance from `accounts` ");
		return $query->Result();
	}
	
	function get_language()
	{
		$CI = & get_instance();
		$query=$CI->db->query("SELECT LanguageName from `lang` ");
		return $query->Result();
	}
	
	function get_usertype($filter=false)
	{
		$CI = & get_instance();
		$CI->db->select('*');
		$query = $CI->db->get_where('masterentry',$filter);
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
		$query=$CI->db->query("select ClassName,SectionName from class,section where section.SectionId in(".$filter.") and section.SectionId=class.ClassId");
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
		$query=$CI->db->query("Select fee.Amount,masterentry.MasterEntryValue from fee,masterentry where
						fee.Session='$CURRENTSESSION' and
						fee.SectionId=$sec_id and
						fee.FeeType=masterentry.MasterEntryId and 
						FeeStatus='Active'
						order by FeeType");
		return $query->Result();
	}
	
}



?>
