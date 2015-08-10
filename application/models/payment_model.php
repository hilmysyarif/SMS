<?php
class Payment_model extends CI_Model
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
	
	function get_fee_structure($CURRENTSESSION=false,$admissionid=false)
   {
   	$query=$this->db->query("Select Distance,FeeStructure,admission.AdmissionId,registration.RegistrationId,StudentName,FatherName,Mobile,ClassName,SectionName,section.SectionId,class.ClassId from registration,class,section,admission,studentfee where
					studentfee.Session='$CURRENTSESSION' and
					class.ClassId=section.ClassId and
					studentfee.SectionId=section.SectionId and
					registration.RegistrationId=admission.RegistrationId and
					admission.AdmissionId=studentfee.AdmissionId and studentfee.AdmissionId='$admissionid' and
					Status='Studying' 
					order by StudentName");
   	return $query->Result();
   }
   
   function get_transaction($CURRENTSESSION=false,$admissionid=false)
   {
   	$query=$this->db->query("select TransactionDate,TransactionId,TransactionAmount,TransactionRemarks from transaction where 
						TransactionStatus='Active' and 
						TransactionHead='Fee' and 
						TransactionHeadId='$admissionid' and 
						TransactionSession='$CURRENTSESSION'");
   	return $query->Result();
   }
   
   function get_balance($CURRENTSESSION=false,$admissionid=false)
   {
   	$query=$this->db->query("select SUM(Amount) as Paid,FeeType from feepayment,transaction where
						transaction.Token=feepayment.Token and
						transaction.TransactionStatus='Active' and
						feepayment.FeePaymentStatus='Active' and
						transaction.TransactionHead='Fee' and 
						transaction.TransactionSession='$CURRENTSESSION' and 
						transaction.TransactionHeadId='$admissionid' 
						group by FeeType");
   	return $query->Result();
   }
	 
}