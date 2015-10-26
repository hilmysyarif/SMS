<?php
class Library_model extends CI_Model
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
	
	function getbooklist()
	{
			$qry = $this->db->query("Select BookId,BookName,AuthorName,Publisher,MasterEntryValue,SubjectName from book,masterentry,subject where 
			book.Purpose=masterentry.MasterEntryId and
			book.SubjectId=subject.SubjectId and
					BookStatus='Active'");	
			return $qry->Result();	
		
	}
	
	function get_subject($CURRENTSESSION=false)
	{
			$qry = $this->db->query("select SubjectName,SubjectId from subject where Session='$CURRENTSESSION' and SubjectStatus='Active'");	
			return $qry->Result();	
		
	}
	
	function get_purpose($CURRENTSESSION=false)
	{
			$qry = $this->db->query("select MasterEntryId,MasterEntryValue from masterentry where MasterEntryName='BookPurpose' ");	
			return $qry->Result();	
		
	}
	
	function insertbook($table=false,$data=false,$filter=false)
	{
		if(!empty($filter)){
				$this->db->where($filter);
				$this->db->update($table,$data);
		}else{
			$this->db->insert($table,$data);	
		}	
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
		$query = $this->db->get_where($table, $filter);
		return $query->Result();
	}
	
	function getaccession()
	{	
		$qry = $this->db->query("select AccessionNo from listbook where ListBookStatus='Active'");
		return $qry->Result();
	}
	
	function getaccessionbytoken($Token=false)
	{	
		$qry = $this->db->query("select AccessionNo from listbook where Token='$Token' and ListBookStatus='Pending'");
		return $qry->Result();
	}
	
	function getbookissue($Token=false)
	{	
		$qry = $this->db->query("select BookName,AuthorName,ListBookId,book.BookId,AccessionNo from book,listbook where
						book.BookId=listbook.BookId and
						BookStatus='Active' and
						ListBookStatus='Active' and
						IRStatus!='Issued'");
		return $qry->Result();
	}
	function getissueliststu()
	{	
		$qry = $this->db->query("select BookIssueId,StudentName as Name,Mobile as Mobile,Books,DOI,BookReturn,bookissue.Remarks from bookissue,registration,admission where 
						BookIssueStatus='Active' and
						registration.RegistrationId=admission.RegistrationId and
						admission.AdmissionId=bookissue.IRToDetail and
						bookissue.IRTo='Student'");
		return $qry->Result();
	}
	function getissueliststaff()
	{	
		$qry = $this->db->query("select BookIssueId,StaffName as Name,StaffMobile as Mobile,Books,DOI,BookReturn,Remarks from bookissue,staff where
						BookIssueStatus='Active' and
						bookissue.IRToDetail=staff.StaffId and
						bookissue.IRTo='Staff'");
		return $qry->Result();
	}
	function getstudentisuue($CURRENTSESSION=false)
	{	
		$qry = $this->db->query("Select StudentName as name,FatherName,Mobile,admission.AdmissionId as id from registration,admission,studentfee where
							registration.RegistrationId=admission.RegistrationId and
							admission.AdmissionId=studentfee.AdmissionId and
							studentfee.Session='$CURRENTSESSION' and
							Status='Studying'");
		return $qry->Result();
	}
	function getstaffisuue()
	{	
		$qry = $this->db->query("select StaffId as id,StaffName as name,StaffMobile as Mobile from staff where 
							StaffStatus='Active'");
		return $qry->Result();
	}
	function getissueaccession($QuerySearch=false)
	{	
		$qry = $this->db->query("select AccessionNo,BookName,AuthorName,IRStatus from listbook,book where
					book.BookId=listbook.BookId and $QuerySearch and ListBookStatus='Active' and BookStatus='Active'");
		return $qry->Result();
	}
	function checkstu($CURRENTSESSION=false,$IRToDetail=false)
	{	
		$qry = $this->db->query("Select admission.AdmissionId from registration,admission,studentfee where
					registration.RegistrationId=admission.RegistrationId and
					admission.AdmissionId=studentfee.AdmissionId and
					studentfee.Session='$CURRENTSESSION' and 
					studentfee.AdmissionId='$IRToDetail' and
					registration.Status='Studying' ");
		return $qry->Result();
	}
	function checkstaff($IRToDetail=false)
	{	
		$qry = $this->db->query("select StaffId from staff where StaffId='$IRToDetail' and StaffStatus='Active'");
		return $qry->Result();
	}
	function issuebook($IRTo=false,$IRToDetail=false,$Books=false,$DOITimeStamp=false,$Remarks=false,$DOE=false,$USERNAME=false)
	{	
		$this->db->query("insert into bookissue(IRTo,IRToDetail,Books,DOI,BookIssueStatus,Remarks,DOE,DOEUsername) values
						('$IRTo','$IRToDetail','$Books','$DOITimeStamp','Active','$Remarks','$DOE','$USERNAME')");
		
	}
	function updatebook($QuerySearch=false)
	{	
		$this->db->query("update listbook set IRStatus='Issued' where $QuerySearch");
	}
	function getreturnstu($GETBookIssueId=false)
	{	
		$qry = $this->db->query("select BookIssueId,StudentName as Name,Mobile as Mobile,Books,DOI,BookReturn,bookissue.Remarks from bookissue,registration,admission where 
							BookIssueStatus='Active' and
							registration.RegistrationId=admission.RegistrationId and
							admission.AdmissionId=bookissue.IRToDetail and BookIssueId='$GETBookIssueId' and
							bookissue.IRTo='Student'");
		return $qry->Result();
	}
	function getreturnstaff($GETBookIssueId=false)
	{	
		$qry = $this->db->query("select BookIssueId,StaffName as Name,StaffMobile as Mobile,Books,DOI,BookReturn,Remarks from bookissue,staff where
							BookIssueStatus='Active' and
							bookissue.IRToDetail=staff.StaffId and BookIssueId='$GETBookIssueId' and
							bookissue.IRTo='Staff'");
		return $qry->Result();
	}
	function getreturnbok($GETBookIssueId=false)
	{	
		$qry = $this->db->query("Select ListBookId,BookName,AuthorName,AccessionNo from book,listbook where
						book.BookId=listbook.BookId and
						book.BookStatus='Active' and
						listbook.ListBookStatus='Active'");
		return $qry->Result();
	}
	function getboksreturninfo($IRTo=false,$BookIssueId=false)
	{	
		$qry = $this->db->query("select Books,BookReturn from bookissue where IRTo='$IRTo' and BookIssueId='$BookIssueId' ");
		return $qry->Result();
	}
	
	function updatebookissue($BookReturnOriginal=false,$BookIssueId=false)
	{	
		$this->db->query("update bookissue set BookReturn='$BookReturnOriginal' where BookIssueId='$BookIssueId' ");
	}
	function updatebooklist($UpdateQuery=false)
	{	
		$this->db->query("update listbook set IRStatus='' where $UpdateQuery ");
	}
    
     /* function Delete start.........................................................................  */
   function delete($table=false,$filter=false)
   {
		$this->db->delete($table,$filter);
   }
   /* function Delete end.........................................................................  */
   
  
}