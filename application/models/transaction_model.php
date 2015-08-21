<?php
class Transaction_model extends CI_Model
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
	
	function get_expense()
	{
			$qry = $this->db->query("select ExpenseId,ExpenseAmount,ExpenseDate,SupplierName,AmountPaid,ExpenseRemarks,MasterEntryValue from expense,supplier,masterentry where 
						expense.ExpenseAccountType=masterentry.MasterEntryId and
						ExpenseStatus='Active' and
						expense.SupplierId=supplier.SupplierId
						order by ExpenseId");	
			return $qry->Result();	
	}
	
	function get_supplier()
	{
			$qry = $this->db->query("select * from supplier where SupplierStatus='Active' order by SupplierName");	
			return $qry->Result();	
	}
	
	function get_for()
	{
			$qry = $this->db->query("select MasterEntryId,MasterEntryValue from masterentry where MasterEntryName='ExpenseAccount'");	
			return $qry->Result();	
	}
	
	function get_account()
	{
			$qry = $this->db->query("select OpeningBalance,AccountBalance,AccountId,AccountName from accounts where AccountStatus='Active'");	
			return $qry->Result();	
	}
	
	function insert($data=false,$table=false,$filter=false)
	{
		if($filter !=''){
		$this->db->where($filter);
    	$this->db->update($table,$data);
		echo $this->db->last_query();die;
		}else{
			$this->db->insert($table,$data);
			 $insert_id = $this->db->insert_id();

		return  $insert_id;
		}
	}
	
	function get_account_balance($Account=false)
	{
			$qry = $this->db->query("Select (OpeningBalance+AccountBalance) as TotalAccountBalance,AccountName from accounts where AccountId='$Account'");	
			return $qry->Result();	
	}
	
	function get_expense_by_id($ExpenseId=false)
	{
			$qry = $this->db->query("select * from expense where ExpenseId='$ExpenseId' and ExpenseStatus='Active' ");	
			return $qry->Result();	
	}
	
	function get_paymentlist($ExpenseId=false)
	{
			$qry = $this->db->query("select TransactionAmount,TransactionDate,AccountName,TransactionId from transaction,accounts where
							transaction.TransactionFrom=accounts.AccountId and 
							TransactionHead='Expense' and
							TransactionHeadId='$ExpenseId' and
							TransactionStatus='Active'");	
			return $qry->Result();	
	}
	
	function get_payment_account($ExpenseId=false)
	{
			$qry = $this->db->query("select AmountPaid,ExpenseAmount,SupplierId from expense where ExpenseId='$ExpenseId' and ExpenseStatus='Active'");	
			return $qry->Result();	
	}
	
	function update_account($AmountPaid=false,$Account=false)
	{
			$qry = $this->db->query("update accounts set AccountBalance=AccountBalance-$AmountPaid where AccountId='$Account' ");	
			
	}
	
	function update_expense($AmountPaid=false,$ExpenseId=false)
	{
			$qry = $this->db->query("update expense set AmountPaid=AmountPaid+$AmountPaid where ExpenseId='$ExpenseId'");	
			
	}
	
	
	 
}