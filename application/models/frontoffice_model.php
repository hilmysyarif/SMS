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
	
   
  
   
  
	 
}