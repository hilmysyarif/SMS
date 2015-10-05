<?php
class Frontoffice_model extends CI_Model
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
	
	function get_calllist()
	{
			$qry = $this->db->query("select * from calling,masterentry where calling.CallResponse=masterentry.MasterEntryId and calling.CallStatus='Active' order by DOC");	
			return $qry->Result();	
	}
	
	function get_response()
	{
			$qry = $this->db->query("select MasterEntryId,MasterEntryValue from masterentry where MasterEntryName='EnquiryResponse' ");	
			return $qry->Result();	
	}
	
	function get_call_update($CId=false)
	{
			$qry = $this->db->query("select * from calling where CallId='$CId' and CallStatus='Active'");	
			return $qry->Result();	
	}
	
	function insert_call($data=false,$table=false,$filter=false)
	{
		if($filter !=''){
		$this->db->where($filter);
    	$this->db->update($table,$data);
		}else{
			$this->db->insert($table,$data);
		}
	}
	
	function get_followup($FollowUpUniqueId=false,$table=false)
	{
			$qry = $this->db->query("select * from $table where CallId='$FollowUpUniqueId'");	
			return $qry->Result();	
	}
	
	function get_followup_details($FollowUpUniqueId=false,$FollowUpType=false)
	{
			$qry = $this->db->query("select * from followup where FollowUpType='$FollowUpType' and FollowUpUniqueId='$FollowUpUniqueId' and FollowUpStatus='Active' order by DOF");	
			return $qry->Result();	
	}
	
	function up_followup_details($FId=false)
	{
			$qry = $this->db->query("select * from followup where FollowUpId='$FId' and FollowUpStatus='Active'");	
			return $qry->Result();	
	}
	
	function get_ocall()
	{
			$qry = $this->db->query("select * from ocalling where ocalling.CallStatus='Active' order by DOC");	
			return $qry->Result();	
	}
	
	function get_ocall_up($CId=false)
	{
			$qry = $this->db->query("select * from ocalling where OCallId='$CId' and CallStatus='Active'");	
			return $qry->Result();	
	}
	
	function get_followup_other($FollowUpUniqueId=false,$table=false)
	{
			$qry = $this->db->query("select * from $table where OCallId='$FollowUpUniqueId'");	
			return $qry->Result();	
	}
	
	function get_enquiry()
	{
			$qry = $this->db->query("select * from enquiry,masterentry where enquiry.EnquiryResponse=masterentry.MasterEntryId and EnquiryStatus='Active' order by EnquiryDate");	
			return $qry->Result();	
	}
	
	function get_enquiry_up($EId=false)
	{
			$qry = $this->db->query("select * from enquiry where EnquiryId='$EId' and EnquiryStatus='Active'");	
			return $qry->Result();	
	}
	
	function get_enquiry_type()
	{
			$qry = $this->db->query("select MasterEntryId,MasterEntryValue from masterentry where MasterEntryName='EnquiryType' ");	
			return $qry->Result();	
	}
	
	function get_reference()
	{
			$qry = $this->db->query("select MasterEntryId,MasterEntryValue from masterentry where MasterEntryName='Reference' ");	
			return $qry->Result();	
	}
	
	function get_followup_enquiry($FollowUpUniqueId=false,$table=false)
	{
			$qry = $this->db->query("select * from $table where EnquiryId='$FollowUpUniqueId'");	
			return $qry->Result();	
	}
	
	function get_complaint()
	{
			$qry = $this->db->query("select * from complaint,masterentry where complaint.ComplaintType=masterentry.MasterEntryId and complaint.ComplaintStatus!='Deleted' order by DOC");	
			return $qry->Result();	
	}
	
	function get_complaint_up($CId=false)
	{
			$qry = $this->db->query("select * from complaint where ComplaintId='$CId' and ComplaintStatus!='Deleted'");	
			return $qry->Result();	
	}
	
	function get_complaint_type()
	{
			$qry = $this->db->query("select MasterEntryId,MasterEntryValue from masterentry where MasterEntryName='ComplaintType' ");	
			return $qry->Result();	
	}
	
	function get_visitor()
	{
			$qry = $this->db->query("select * from visitorbook,masterentry where visitorbook.Purpose=masterentry.MasterEntryId and visitorbook.VisitorBookStatus!='Deleted' order by InDateTime");	
			return $qry->Result();	
	}
	
	function get_visitor_up($Id=false)
	{
			$qry = $this->db->query("select * from visitorbook where VisitorBookId='$Id' and VisitorBookStatus!='Deleted'");	
			return $qry->Result();	
	}
	
	function get_purpose()
	{
			$qry = $this->db->query("select MasterEntryId,MasterEntryValue from masterentry where MasterEntryName='GuestVistingPurpose' ");	
			return $qry->Result();	
	}
	
	  /* function Delete start.........................................................................  */
   function delete($table=false,$filter=false)
   {
		$this->db->delete($table,$filter);
   }
   /* function Delete end.........................................................................  */
   
   
  
   
  
	 
}