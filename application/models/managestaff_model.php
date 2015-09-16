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
	
	function getsalaryhead()
	{
			$qry = $this->db->query("select SalaryHeadId,MasterEntryValue,SalaryHead,Code from salaryhead,masterentry where 
				salaryhead.SalaryHeadType=masterentry.MasterEntryId and
				SalaryHeadStatus='Active'");	
			return $qry->Result();	
	}
	
	function getsalarystructuredetail()
	{
			$qry = $this->db->query("select salarystructuredetail.SalaryHeadId,Expression,SalaryStructureId,Code from salarystructuredetail,salaryhead where salarystructuredetail.SalaryHeadId=salaryhead.SalaryHeadId order by SalaryStructureDetailId");	
			return $qry->Result();	
	}
	
	function getsalarystructuredetailstaff($StaffId=false)
	{
			$qry = $this->db->query("select salarystructure.SalaryStructureId,SalaryStructureName,FixedSalary,StaffPaidLeave,EffectiveFrom,Remarks,StaffSalaryId from staffsalary,salarystructure where
				staffsalary.SalaryStructureId=salarystructure.SalaryStructureId and
				StaffSalaryStatus='Active' and
				StaffId='$StaffId' order by CAST(EffectiveFrom as SIGNED)");	
			return $qry->Result();	
	}
	
	function selectfixedsalarystructre($SalaryStructureId=false)
	{
			$qry = $this->db->query("select FixedSalaryHead from salarystructure where SalaryStructureId='$SalaryStructureId' and SalaryStructureStatus='Active'");	
			return $qry->Result();	
	}
	
	function selectstaffdoj($StaffId=false)
	{
			$qry = $this->db->query("select StaffDOJ from staff where StaffId='$StaffId' and StaffStatus='Active'");	
			return $qry->Result();	
	}
	
	function insert_staffsalaryhead($StaffId=false,$SalaryStructureId=false,$SalaryString=false,$PaidLeave=false,$EffectiveFrom=false,$DOE=false,$Remarks=false)
	{
			 $this->db->query("insert into staffsalary(StaffSalaryStatus,StaffId,SalaryStructureId,FixedSalary,StaffPaidLeave,EffectiveFrom,DOE,Remarks) 
					values('Active','$StaffId','$SalaryStructureId','$SalaryString','$PaidLeave','$EffectiveFrom','$DOE','$Remarks') ");	
	}
	 
}