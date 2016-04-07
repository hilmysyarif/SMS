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
	
	function classdata()
	{
		$qry=$this->db->query("select SectionId from section");
		return $qry->result();
	}
	function get_class_info($CURRENTSESSION=false)
	{
			$qry = $this->db->query("select ClassName,SectionName,SectionId from class,section where 
						class.ClassId=section.ClassId and class.ClassStatus='Active' and
						section.SectionStatus='Active' and class.Session='$CURRENTSESSION' order by ClassName ");	
			return $qry->Result();	
		
	}
	
	function student_qualification($StudentId=false)
	{
			$qry = $this->db->query("select * from qualification where UniqueId='$StudentId' and Type='Student' ");	
			return $qry->Result();	
		
	}
	
	function student_sibling($StudentId=false)
	{
			$qry = $this->db->query("select * from sibling where RegistrationId='$StudentId' ");	
			return $qry->Result();	
		
	}
	
	function get_gender_info($table=false)
	{
		$qry = $this->db->query("select MasterEntryId,MasterEntryName,MasterEntryValue from masterentry where
		masterentry.MasterEntryId=masterentry.MasterEntryId and
		MasterEntryName='Gender' or MasterEntryName='Caste' or MasterEntryName='Category' or  MasterEntryName='BloodGroup' or  MasterEntryName='TerminationReason' or  MasterEntryName='StudentsDocuments' or  MasterEntryName='Resolution' 
						 ");
		return $qry->Result();
	}
	
	function get_info($filter=false,$table=false)
	{	
		$this->db->order_by("RegistrationId", "ASC");
		$query = $this->db->get_where($table, $filter);
		return $query->Result();
	}
	
	function get_registration_info($CURRENTSESSION=false)
   {
   
   		$query=$this->db->query("select TerminationReason,RegistrationId,StudentName,FatherName,Mobile,ClassName,SectionName,Status,DOR from registration,section,class where
						registration.SectionId=section.SectionId and
						class.ClassId=section.ClassId and 
						registration.Session='$CURRENTSESSION' and 
						registration.Session=class.Session and
						registration.Status!='Deleted' 
						order by RegistrationId ");
  		return $query->Result();
   }
  
   function update_registration($info=false,$filter=false)
   {
  	$this->db->where($filter);
 	$this->db->update('registration',$info);
  	$id = $filter['RegistrationId'];
   return $id;
   }
   
   function insert_photo($info=false)
   {
   	$this->db->insert('photos',$info);
   }
   
   function insert_registration($info=false,$RegistrationId=false)
   {
  		if($this->db->insert('registration',$info)){
   			$RegistrationId = $this->db->insert_id();
   		}else{
   			return false;
   		}
   	return $RegistrationId;
   }
   
   function insert_qualification($info=false,$QualificationId=false)
   {
   		if($this->db->insert('qualification',$info)){
   		$QualificationId = $this->db->insert_id();
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
   
    function insert_sibling($info=false)
   {
   		$this->db->insert('sibling',$info);
   	}
	
	function get_student_documents($StudentId=false)
   {
   $query=$this->db->query("select PhotoId,Path,Title,MasterEntryValue from photos,masterentry where photos.Document=masterentry.MasterEntryId and UniqueId='$StudentId' and Detail='StudentDocuments'");
   			return $query->Result();
   }
   
   function get_admission_class($SectionIdSelected=false,$Distance=false,$CURRENTSESSION=false)
   {
   	 
   	$query=$this->db->query("select MasterEntryId,MasterEntryValue,FeeType,Amount,FeeId,Distance from fee,masterentry where
								fee.FeeType=masterentry.MasterEntryId and SectionId='$SectionIdSelected' and Session='$CURRENTSESSION' and (Distance='' or Distance='$Distance')");
   			return $query->Result();
   }
   
   function insert_admission($data=false,$table=false)
   { 
   	 if($this->db->insert($table,$data)){
		 $insert_id = $this->db->insert_id();
		$filter=array('RegistrationId'=>$data['RegistrationId']);
   	 	$value=array('Status'=>'Studying');
   	 	$this->db->where($filter);
   	 	$this->db->update('registration',$value);
		return  $insert_id;
   	 }
    }
	
	function insert_studentfee($data=false,$table=false)
   { 
   	 $this->db->insert($table,$data);
	}
   
   function get_class($CURRENTSESSION=false)
   {
   $query=$this->db->query("select ClassName,SectionName,SectionId from class,section where 
					class.ClassId=section.ClassId and class.ClassStatus='Active' and
					section.SectionStatus='Active' and class.Session='$CURRENTSESSION' order by ClassName");
   			return $query->Result();
   }
   
   function get_class2($sectionid,$CURRENTSESSION=false)
   {
   	$query=$this->db->query("select ClassName,SectionName,SectionId from class,section where
   			class.ClassId=section.ClassId and class.ClassStatus='Active' and section.SectionId!='$sectionid' and
   			section.SectionStatus='Active' and class.Session='$CURRENTSESSION' order by ClassName");
   			return $query->Result();
   }
   
   function get_fee_structure($sec_id,$CURRENTSESSION=false,$admissionid=false)
   {
   	$query=$this->db->query("Select studentfee.AdmissionNo,studentfee.Remarks,Date,studentfee.Distance,FeeStructure,admission.AdmissionId,registration.RegistrationId,StudentName,FatherName,Mobile,ClassName,SectionName,section.SectionId,class.ClassId from registration,class,section,admission,studentfee where
						studentfee.Session='$CURRENTSESSION' and
						class.ClassId=section.ClassId and
						studentfee.SectionId=section.SectionId and
						registration.RegistrationId=admission.RegistrationId and
						admission.AdmissionId=studentfee.AdmissionId and 
						studentfee.SectionId='$sec_id' and 
						studentfee.AdmissionId='$admissionid' and
						Status='Studying'
						order by StudentName");
   	return $query->Result();
   }
   
   function get_fee_details($Student)
   {
   	$query=$this->db->query("select SUM(feepayment.Amount) as Paid,MasterEntryValue,fee.FeeId from transaction,feepayment,fee,masterentry where
						TransactionStatus='Active' and FeePaymentStatus='Active' and 
						transaction.Token=feepayment.Token and
						feepayment.FeeType=fee.FeeId and
						fee.FeeType=masterentry.MasterEntryId and
						TransactionHead='Fee' and
						TransactionHeadId='$Student' 
						group by feepayment.FeeType");
   	return $query->Result();
   }
   
   function get_student_details($StudentStatus=false,$SectionQuery=false,$CURRENTSESSION=false)
   {
   	$query=$this->db->query("select ParentsPassword,StudentsPassword,PresentAddress,studentfee.AdmissionNo,StudentName,FatherName,Mobile,Date,DOB,ClassName,SectionName from registration,admission,studentfee,class,section where
					registration.RegistrationId=admission.RegistrationId and
					admission.AdmissionId=studentfee.AdmissionId and
					studentfee.StudentFeeStatus='$StudentStatus' and class.ClassId=section.ClassId and section.SectionId=studentfee.SectionId and 
					studentfee.Session='$CURRENTSESSION' $SectionQuery");
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
   function get_nextclass_fee($NextSectionId=false,$NextSession=false,$Distance=false)
   {
   	$query=$this->db->query("select MasterEntryValue,FeeType,Amount,FeeId,Distance from fee,masterentry where
								fee.FeeType=masterentry.MasterEntryId and SectionId='$NextSectionId' and Session='$NextSession' and (Distance='' or Distance='$Distance')");
   	return $query->Result();
   }
   
   function get_student_feenext($AdmissionIdValue=false,$NextSession=false)
   {
   	$query=$this->db->query("select StudentFeeId from studentfee where AdmissionId='$AdmissionIdValue' and Session='$NextSession' ");
   	return $query->Result();
   }
   
   function insert_promotion($AdmissionIdValue=false,$DOP=false,$DOE=false,$NextSectionId=false,$NextSession=false,$FeeString=false,$Distance=false,$Remarks=false)
   {
		$this->db->query("insert into studentfee(AdmissionId,Date,DOE,SectionId,Session,FeeStructure,Distance,Remarks)
					values('$AdmissionIdValue','$DOP','$DOE','$NextSectionId','$NextSession','$FeeString','$Distance','$Remarks')");
   }
   
   function updateclass_student($AdmissionId=false,$CURRENTSESSION=false)
   {
   	$query=$this->db->query("select SectionId,FeeStructure,Distance from studentfee where
			AdmissionId='$AdmissionId' and Session='$CURRENTSESSION'");
   	return $query->Result();
   }
   
   function transactioncheck($AdmissionId=false,$CURRENTSESSION=false)
   {
   	$query=$this->db->query("select TransactionId from transaction where TransactionSession='$CURRENTSESSION' and
			TransactionHead='Fee' and
			TransactionHeadId='$AdmissionId' and TransactionStatus='Active'");
   	return $query->Result();
   }
   
   function feecheck($NewSectionId=false,$CURRENTSESSION=false,$Distance=false)
   {
   	$query=$this->db->query("select Amount,MasterEntryValue,FeeId from fee,masterentry where
			fee.FeeType=masterentry.MasterEntryId and
			fee.SectionId='$NewSectionId' and
			fee.Session='$CURRENTSESSION' and (Distance='' or Distance='$Distance')");
   	return $query->Result();
   }
   
   function insertupdateclass($NewSectionId=false,$FeeString=false,$AdmissionId=false,$CURRENTSESSION=false)
   {
		$this->db->query("update studentfee set SectionId='$NewSectionId',FeeStructure='$FeeString' where AdmissionId='$AdmissionId' and Session='$CURRENTSESSION'");
   }
   
   
   
   function checkstudentaddmission($AdmissionNo=false,$AdmissionId=false)
   {
   	$query=$this->db->query("select StudentName,Mobile from studentfee,registration,admission where 
			studentfee.AdmissionNo='$AdmissionNo' and studentfee.AdmissionId!='$AdmissionId' and
			registration.RegistrationId=admission.AdmissionId and
			admission.AdmissionId=studentfee.AdmissionId");
   	return $query->Result();
   }
   
   function insertupfeestructure($AdmissionNo=false,$FeeString=false,$DOAP=false,$Remarks=false,$AdmissionId=false,$SectionId=false,$CURRENTSESSION=false)
   {
		$this->db->query("update studentfee set AdmissionNo='$AdmissionNo',FeeStructure='$FeeString',Date='$DOAP',Remarks='$Remarks' where AdmissionId='$AdmissionId' and SectionId='$SectionId' and Session='$CURRENTSESSION'");
   }
   
     /* function Delete start.........................................................................  */
   function delete($table=false,$filter=false)
   {
		$this->db->delete($table,$filter);
   }
   /* function Delete end.........................................................................  */
   
   function get_check($table=false,$filter=false)
   {
		$query=$this->db->get_where($table,$filter);
		return $query->result();
   }
  
}