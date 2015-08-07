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
	
	function get_class_info($table=false)
	{
			$qry = $this->db->query("select SectionId,SectionName,ClassName from section,class where 
			class.ClassId=section.ClassId and 
			class.ClassStatus='Active' and section.SectionStatus='Active'
						 order by ClassName ");	
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
	
	function get_registration_info($table=false,$filter=false)
   {
   
   		$query=$this->db->query("select TerminationReason,RegistrationId,StudentName,FatherName,Mobile,ClassName,SectionName,Status,DOR from registration,class,section where
				registration.SectionId=section.SectionId and 
						class.ClassId=section.ClassId and 
   			   			registration.RegistrationId=registration.RegistrationId and
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
   
   function update_photos($info=false,$filter=false)
   {
   	$this->db->where($filter);
   	$this->db->update('photos',$info);
   	$id = $filter['RegistrationId'];
   	return $id;
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
   
   function get_admission_class($SectionIdSelected=false,$Distance=false,$CURRENTSESSION=false)
   {
   	 
   	$query=$this->db->query("select MasterEntryValue,FeeType,Amount,FeeId,Distance from fee,masterentry where
								fee.FeeType=masterentry.MasterEntryId and SectionId='$SectionIdSelected' and Session='$CURRENTSESSION' and (Distance='' or Distance='$Distance')");
   			return $query->Result();
   }
   
   function insert_admission($data=false,$table=false)
   { 
   	 if($this->db->insert($table,$data)){
   	 	$filter=array('RegistrationId'=>$data['RegistrationId']);
   	 	$value=array('Status'=>'Studying');
   	 	$this->db->where($filter);
   	 	$this->db->update('registration',$value);
   	 }
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
  
}