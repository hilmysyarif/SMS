<?php
class Managestaff_model extends CI_Model
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
	
	function get_staff($table=false)
	{
			$qry = $this->db->query("select * from staff,masterentry where staff.StaffPosition=masterentry.MasterEntryId order by StaffDOJ ");	
			return $qry->Result();	
	}
	
	function get_staff_up($GetStaffId=false)
	{
			$qry = $this->db->query("select * from staff,masterentry where staff.StaffPosition=masterentry.MasterEntryId and StaffId='$GetStaffId' and
					StaffStatus!='Deleted'");	
			return $qry->Result();	
	}
	
	function insert($data=false,$table=false,$filter=false)
	{
		if($filter !=''){
		$this->db->where($filter);
    	$this->db->update($table,$data);
		}else{
			$this->db->insert($table,$data);
			//echo $this->db->last_query();die;
		}
	}
	
	function get_staff_qualification($StaffId=false)
	{
			$qry = $this->db->query("select * from qualification where UniqueId='$StaffId' and Type='Staff'");	
			return $qry->Result();	
	}
	
	function get_staff_documents($StaffId=false)
	{
			$qry = $this->db->query("select PhotoId,Path,Title,MasterEntryValue from photos,masterentry where photos.Document=masterentry.MasterEntryId and UniqueId='$StaffId' and Detail='StaffDocuments'");	
			return $qry->Result();	
	}
	 
}