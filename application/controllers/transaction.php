<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaction extends CI_Controller {

	
	 function __construct() {
		parent::__construct();
		
		$this->data[]="";
		$this->data['url'] = base_url();
		$this->load->model('Transaction_model');
		$this->load->model('master_model');
		$this->load->model('authority_model');
		$this->load->library('parser');
		$this->load->library('utilities');
		$this->data['base_url']=base_url();
		$this->load->library('session');
		$this->load->library('authority');
		if (!$this->session->userdata('user_data')) show_error('Direct access is not allowed');
		$this->info= $this->session->userdata('user_data');
		$currentsession = $this->mhome->get_session();
		$this->session->set_userdata('currentsession',$currentsession);
		$currentsession=$this->currentsession = $this->session->userdata('currentsession');
	 }
	/*transaction Expense view load start................................................................................................*/
	function expense($expenseid=false)
	{ 	
	if(Authority::checkAuthority('Expense')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Expense Account', base_url().'transaction/expense');
		
		$this->data['for'] = $this->Transaction_model->get_for('ExpenseAccount');
		$this->data['supplier'] = $this->Transaction_model->get_supplier();
		$this->data['account'] = $this->Transaction_model->get_account();
		$this->data['expense'] = $this->Transaction_model->get_expense();
		
		if($expenseid !=''){
			$this->data['expenseid']=$expenseid;
			$expense_by_id= $this->Transaction_model->get_expense_by_id($expenseid);
						$ExpenseAmount=round($expense_by_id[0]->ExpenseAmount,2);
						$AmountPaid=round($expense_by_id[0]->AmountPaid,2);
						$this->data['Balance']=$ExpenseAmount-$AmountPaid;
			$this->data['payment_list'] = $this->Transaction_model->get_paymentlist($expenseid);
		}
		
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('expense',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*transaction Expense view load End................................................................................................*/
	
	/*transaction Insert And Update Expense  start................................................................................................*/
	function insert_expense()
	{	
	if(Authority::checkAuthority('Expense')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		if($this->input->post('add')){
			if($this->input->post('payment') && $this->input->post('amount_paid')){
				
			$data=array('ExpenseAccountType'=>$this->input->post('for'),
			'SupplierId'=>$this->input->post('supplier'),
			'ExpenseDate'=>strtotime($this->input->post('doe')),
			'ExpenseAmount'=>$this->input->post('amount'),
			'ExpenseRemarks'=>$this->input->post('expense_remark'),
			'DOE'=>strtotime($this->input->post('dop')),
			'AmountPaid'=>$this->input->post('payment'),
			'Username'=>$this->info['usermailid'],
			'ExpenseStatus'=>'Active');
			
			$for=$this->input->post('for');
			$supplier=$this->input->post('supplier');
			$ExpenseDate=strtotime($this->input->post('doe'));
			$Amount=$this->input->post('amount');
			$expensemerakr=$this->input->post('expense_remark');
			$DOP=strtotime($this->input->post('dop'));
			$AmountPaid=$this->input->post('payment');
			$Account=$this->input->post('account');
			$PaymentRemarks=$this->input->post('payment_remark');
			$SCHOOLSTARTDATE=$this->currentsession[0]->SchoolStartDate;
			$USERNAME=$this->info['usermailid'];
			$Payment=$this->input->post('amount_paid');
			$Date=date("Y-m-d");
			$Date=strtotime($Date);
			
	if($Payment=="Yes")
	{
		$row = $this->Transaction_model->get_account_balance($Account);
		$TotalAccountBalance=round($row[0]->TotalAccountBalance,2);
		$AccountName=$row[0]->AccountName;
	}
	
	
	if($Payment=="Yes" && ($AmountPaid=="" || $AmountPaid<=0 || $DOP=="" || $Account==""))
	{
		$this->session->set_flashdata('message_type', 'error');
		$this->session->set_flashdata('message', $this->config->item("expense").' Please enter payment details in case of payment!!');
	}
	elseif($Payment=="Yes" && $TotalAccountBalance<$AmountPaid)
	{
		$this->session->set_flashdata('message_type', 'error');
		$this->session->set_flashdata('message', $this->config->item("expense")." $AccountName has only $TotalAccountBalance INR!!");	
	}
	elseif($Payment=="Yes" && $AmountPaid>$Amount)
	{
		$this->session->set_flashdata('message_type', 'error');
		$this->session->set_flashdata('message', $this->config->item("expense").' Amount paid cannot be greater than expense amount!!');	
	}
	elseif($SCHOOLSTARTDATE>$ExpenseDate)
	{
		$this->session->set_flashdata('message_type', 'error');
		$this->session->set_flashdata('message', $this->config->item("expense").'Expense date cannot be less than Software start date!!');	
	}
	elseif($SCHOOLSTARTDATE>$DOP && $Payment=="Yes")
	{
		$this->session->set_flashdata('message_type', 'error');
		$this->session->set_flashdata('message', $this->config->item("expense").' Payment date cannot be less than Software start date!!');
	}
	else
	{	
		if($Payment!="Yes")
		{
			$AmountPaid="";
			$Account="";
			$DOP="";
		}
		$ExpenseId=$this->Transaction_model->insert($data,'expense');
		$data1=array('Username'=>$USERNAME,
		'TransactionAmount'=>$AmountPaid,
		'TransactionType'=>'0',
		'TransactionFrom'=>$Account,
		'TransactionHead'=>'Expense',
		'TransactionHeadId'=>$ExpenseId,
		'TransactionRemarks'=>$PaymentRemarks,
		'TransactionDate'=>$DOP,
		'TransactionDOE'=>$Date,
		'TransactionStatus'=>'Active');
		
		$this->Transaction_model->insert($data1,'transaction');
		if($Payment=="Yes")
		{
			$this->Transaction_model->update_account($AmountPaid,$Account);
		}
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("expense").' Expense Added Successfully!!');
	}
			
			}else{
				$data=array('ExpenseAccountType'=>$this->input->post('for'),
			'SupplierId'=>$this->input->post('supplier'),
			'ExpenseDate'=>strtotime($this->input->post('doe')),
			'ExpenseAmount'=>$this->input->post('amount'),
			'ExpenseRemarks'=>$this->input->post('expense_remark'),
			'DOE'=>strtotime($this->input->post('dop')),
			'Username'=>$this->info['usermailid'],
			'ExpenseStatus'=>'Active');
			$this->Transaction_model->insert($data,'expense');	
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("expense").' Expense Added Successfully!!');
			}
		}
		redirect('transaction/expense');
	}
	 /*transaction Insert And Update Expense  End................................................................................................*/
	
	/*transaction Insert And Update Expense Payment pay start.....................................................................................*/
	function makeexpensepayment()
	{	
	if(Authority::checkAuthority('Expense')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		if($this->input->post('add')){
			if($this->input->post('amount') && $this->input->post('account')){
				
			$data=array('ExpenseAccountType'=>$this->input->post('account'),
			'SupplierId'=>$this->input->post('amount'));
			
		$AmountPaid=$this->input->post('amount');
		$Account=$this->input->post('account');
		$DOP=$this->input->post('dop');
		$Remarks=$this->input->post('remark');
		$ExpenseId=$this->input->post('expenseid');
		$USERNAME=$this->info['usermailid'];
		$Date=date("Y-m-d");
	
		$row = $this->Transaction_model->get_account_balance($Account);
		$TotalAccountBalance=round($row[0]->TotalAccountBalance,2);
		$AccountName=$row[0]->AccountName;
		
		$row3 = $this->Transaction_model->get_payment_account($ExpenseId);
		$count3=count($row3);
		$Paid=$row3[0]->AmountPaid;
		$TotalAmount=$row3[0]->ExpenseAmount;
		$SupplierId=$row3[0]->SupplierId;
		$Balance=$TotalAmount-$Paid;
		
	if($AmountPaid=="" || $AmountPaid<=0 || $DOP=="" || $Account=="" || $Remarks=="" || $ExpenseId=="")
	{
		$this->session->set_flashdata('message_type', 'error');
		$this->session->set_flashdata('message', $this->config->item("expense").' All the fields are mandatory!!');
	}
	elseif($TotalAccountBalance<$AmountPaid)
	{
		$this->session->set_flashdata('message_type', 'error');
		$this->session->set_flashdata('message', $this->config->item("expense")."$AccountName has only $TotalAccountBalance $CURRENCY!!");
	}
	elseif($count3==0)
	{
		$this->session->set_flashdata('message_type', 'error');
		$this->session->set_flashdata('message', $this->config->item("expense").'Wrong URL!!');		
	}
	elseif($AmountPaid>$Balance)
	{
		$this->session->set_flashdata('message_type', 'error');
		$this->session->set_flashdata('message', $this->config->item("expense")."Only $Balance $CURRENCY is remaining to pay!!");
	}
	else
	{	
		$Date=strtotime($Date);
		$DOP=strtotime($DOP);
		
		$data1=array('Username'=>$USERNAME,
		'TransactionAmount'=>$AmountPaid,
		'TransactionType'=>'0',
		'TransactionFrom'=>$Account,
		'TransactionHead'=>'Expense',
		'TransactionHeadId'=>$ExpenseId,
		'TransactionRemarks'=>$Remarks,
		'TransactionDate'=>$DOP,
		'TransactionDOE'=>$Date,
		'TransactionStatus'=>'Active');
		
		$this->Transaction_model->insert($data1,'transaction');
		
		$this->Transaction_model->update_account($AmountPaid,$Account);
		
		$this->Transaction_model->update_expense($AmountPaid,$ExpenseId);
		
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("expense").' Expense Added Successfully!!');
	}
		}}
		redirect('transaction/expense/'.$ExpenseId);
	}
	/*transaction Insert And Update Expense Payment pay END.....................................................................................*/

	
	/*transaction Income view load start................................................................................................*/
	function income()
	{	
	if(Authority::checkAuthority('Income')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Income Account', base_url().'transaction/income');
		
		$this->data['for'] = $this->Transaction_model->get_for('IncomeAccount');
		$this->data['account'] = $this->Transaction_model->get_account();
		$this->data['income'] = $this->Transaction_model->get_income();
		
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('income',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*transaction Income view load End................................................................................................*/

	
	/*transaction Insert And Update Income  start................................................................................................*/
	function insert_income()
	{	
	if(Authority::checkAuthority('Income')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		if($this->input->post('add')){
			if($this->input->post('account') && $this->input->post('amount')){
				
			$Date=date("Y-m-d");
			$Date=strtotime($Date);
			
			$data=array('Username'=>$this->info['usermailid'],
						'TransactionAmount'=>$this->input->post('amount'),
						'TransactionType'=>'1',
						'TransactionFrom'=>$this->input->post('account'),
						'TransactionHead'=>'Income',
						'TransactionHeadId'=>$this->input->post('for'),
						'TransactionRemarks'=>$this->input->post('payment_remark'),
						'TransactionDate'=>strtotime($this->input->post('toi')),
						'TransactionDOE'=>$Date,
						'TransactionStatus'=>'Active');
			
			
			$this->Transaction_model->insert($data,'transaction');	
			$this->Transaction_model->update_account_income($this->input->post('amount'),$this->input->post('account'));
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("income").' Income Added Successfully!!');
			}else{
				$this->session->set_flashdata('message_type', 'error');
			$this->session->set_flashdata('message', $this->config->item("income").' Income Added Fail!!');
			}
			
		}
		redirect('transaction/income');
	}
	 /*transaction Insert And Update Income  End................................................................................................*/
	
	
		
	
}
