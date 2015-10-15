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
	
	function get_account()
	{
			$qry = $this->db->query("select OpeningBalance,AccountBalance,AccountId,AccountName from accounts where AccountStatus='Active'");	
			return $qry->Result();	
	}
	
	function getpaymentlist($StaffId=false)
	{
			$qry = $this->db->query("select ExpenseId,TransactionAmount,TransactionDate,AccountName,MasterEntryValue,TransactionId,SalaryMonthYear from transaction,expense,masterentry,accounts where
			transaction.TransactionHeadId=expense.ExpenseId and
			TransactionStatus='Active' and
			ExpenseStatus='Active' and
			transaction.TransactionFrom=accounts.AccountId and 
			expense.SalaryPaymentType=masterentry.MasterEntryId and
			expense.StaffId='$StaffId'
			order by SalaryMonthYear desc");	
			return $qry->Result();	
	}
	
	function getstaffdetails($StaffId=false)
	{
			$qry = $this->db->query("select StaffName,StaffMobile,StaffDOJ from staff where StaffId='$StaffId' and StaffStatus='Active'");	
			return $qry->Result();	
	}
	
	function getaccountbal($Account=false)
	{
			$qry = $this->db->query("select (OpeningBalance+AccountBalance) as TotalBalance,AccountName from accounts where AccountId='$Account'");	
			return $qry->Result();	
	}
	
	function insertexpanseandtransaction($USERNAME=false,$StaffId=false,$MonthYear=false,$SalaryPaymentType=false,$Amount=false,$Remarks=false,$DOP=false,$Date=false,$Account=false)
	{		$this->db->trans_start();
			 $this->db->query("insert into expense(Username,ExpenseStatus,StaffId,SalaryMonthYear,SalaryPaymentType,ExpenseAmount,AmountPaid,ExpenseRemarks,ExpenseDate,DOE) values
					('$USERNAME','Active','$StaffId','$MonthYear','$SalaryPaymentType','$Amount','$Amount','$Remarks','$DOP','$Date')");	
			
			$ExpenseId=$this->db->insert_id();
			$this->db->query("insert into transaction(Username,TransactionStatus,TransactionHead,TransactionHeadId,TransactionAmount,TransactionFrom,TransactionDate,TransactionRemarks,TransactionDOE,TransactionType,TransactionIP) values
					('$USERNAME','Active','Expense','$ExpenseId','$Amount','$Account','$DOP','$Remarks','$Date','0','123456')");

			$this->db->query("update accounts set AccountBalance=AccountBalance-$Amount where AccountId='$Account'");
			$this->db->trans_complete();
	}
	 
}