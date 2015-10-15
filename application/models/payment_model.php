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
   
   function get_account()
	{
			$qry = $this->db->query("select OpeningBalance,AccountBalance,AccountId,AccountName from accounts where AccountStatus='Active'");	
			return $qry->Result();	
	}
	
	function getfeepaid($AdmissionId=false,$CURRENTSESSION=false)
	{
			$qry = $this->db->query("select SUM(Amount) as PaidFeeType,FeeType from feepayment,transaction where
			feepayment.Token=transaction.Token and
			transaction.TransactionHead='Fee' and
			transaction.TransactionHeadId='$AdmissionId' and
			transaction.TransactionSession='$CURRENTSESSION' and 
			transaction.TransactionStatus='Active' 
			group by FeeType");	
			return $qry->Result();	
	}
	
	function getfeepaidstudentfeestructure($AdmissionId=false,$SectionId=false,$CURRENTSESSION=false)
	{
			$qry = $this->db->query("Select FeeStructure from studentfee where AdmissionId='$AdmissionId' and SectionId='$SectionId' and Session='$CURRENTSESSION'");	
			return $qry->Result();	
	}
	
	function getfeepaidstudentpending($Token=false)
	{
			$qry = $this->db->query("select feepayment.Amount,feepayment.FeeType,MasterEntryValue from feepayment,fee,masterentry where 
				fee.FeeId=feepayment.FeeType and 
				Token='$Token' and 
				fee.FeeType=masterentry.MasterEntryId and
				FeePaymentStatus='Pending'");	
			return $qry->Result();	
	}
	
	function insertconfirmpayment($USERNAME=false,$Token=false,$CURRENTSESSION=false,$Amount=false,$Account=false,$Fee=false,$AdmissionId=false,$Remarks=false,$DOP=false,$Date=false)
	{
			$this->db->query("insert into transaction(Username,Token,TransactionSession,TransactionAmount,TransactionType,TransactionFrom,TransactionHead,TransactionSubHead,TransactionHeadId,TransactionRemarks,TransactionDate,TransactionDOE,TransactionStatus)
					values('$USERNAME','$Token','$CURRENTSESSION','$Amount','1','$Account','Fee','','$AdmissionId','$Remarks','$DOP','$Date','Active')");	
			
	}
	
	function updateaccbal($Amount=false,$Account=false)
	{
			$this->db->query("update accounts set AccountBalance=AccountBalance+$Amount where AccountId='$Account' ");	
			
	}
	
	function updatefeepaymentstatus($Token=false)
	{
			$this->db->query("update feepayment set FeePaymentStatus='Active' where Token='$Token'");	
			
	}
	 
}