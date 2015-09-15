<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payments extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		$this->data[]="";
		$this->data['url'] = base_url();
		$this->load->model('payment_model');
		$this->load->model('authority_model');
		$this->load->model('master_model');
		$this->load->library('parser');
		$this->load->library('utilities');
		$this->data['base_url']=base_url();
		$this->load->library('session');
		$this->load->library('authority');
		if (!$this->session->userdata('user_data')) show_error('Direct access is not allowed');
		$this->info= $this->session->userdata('user_data');
		$currentsession=$this->currentsession = $this->session->userdata('currentsession');
	 }
	 
/*school management Fee Payment View Load.........................................................................................*/
	function payment($admissionid=false)
	{	
	if(Authority::checkAuthority('FeePayment')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Payment', base_url().'payments/payment');
		if($admissionid !=''){
			$this->data['admission']=$admissionid;
			$get_fee_details=$this->data['get_fee_details']=$this->payment_model->get_fee_structure($this->currentsession[0]->CurrentSession,$admissionid);
			$this->data['fee_type']=explode(",",$get_fee_details[0]->FeeStructure);
			$this->data['get_transaction']=$this->payment_model->get_transaction($this->currentsession[0]->CurrentSession,$admissionid);
			$this->data['get_balance']=$this->payment_model->get_balance($this->currentsession[0]->CurrentSession,$admissionid);
			$this->data['account'] = $this->payment_model->get_account();
		}
		$this->data['student_info'] = $this->payment_model->get_student($this->currentsession[0]->CurrentSession);
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('payment',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*school management Fee Payment View Load.........................................................................................*/
	
/*school management Get fee sturucture of student..............................................................................*/
	function get_fee()
	{	
	if(Authority::checkAuthority('FeePayment')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
	if($this->input->post('admission') !=''){
			$admission=$this->input->post('admission');
			redirect('payments/payment/'.$admission);
		}else{
			redirect('payments/payment');
		}
	}
/*school management Get fee sturucture of student................................................................................*/
	
	/*school management confirm Payment of student..............................................................................*/
	function confirmpayment()
	{	
	if(Authority::checkAuthority('FeePayment')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
	
			$Token=$this->input->post('token');
			$Account=$this->input->post('accountid');
			$AdmissionId=$this->input->post('admissionid');
			$SectionId=$this->input->post('sectionid');
			$Remarks=$this->input->post('remark');
			$DOP=$this->input->post('dop');

			
			$check2 = $this->payment_model->getfeepaid($AdmissionId,$this->currentsession[0]->CurrentSession);
			$count2=count($check2);
			foreach($check2 as $row2)
			{
				$PaidFeeTypeArray[]=$row2->FeeType;
				$PaidFeeAmountArray[]=$row2->PaidFeeType;
			}	
			
		
			$check0 = $this->payment_model->getfeepaidstudentfeestructure($AdmissionId,$SectionId,$this->currentsession[0]->CurrentSession);
			$count0=count($check0);
			if($count0>0)
			{
			 
			  $FeeStructure=explode(",",$check0[0]->FeeStructure);
			  foreach($FeeStructure as $FeeStructureValue)
			  {
				$FeeStructureSubArray=explode("-",$FeeStructureValue);
				$FeeTypeArray[]=$FeeStructureSubArray[0];
				if($PaidFeeTypeArray!="")
				{
					$PaidFeeSearchIndex=array_search($FeeStructureSubArray[0],$PaidFeeTypeArray);
					if($PaidFeeSearchIndex===FALSE)
						$FeeAmountArray[]=$FeeStructureSubArray[1];
					else
						$FeeAmountArray[]=$FeeStructureSubArray[1]-$PaidFeeAmountArray[$PaidFeeSearchIndex];
				}
				else
					$FeeAmountArray[]=$FeeStructureSubArray[1];
			  }
			}
			
			$check1 = $this->payment_model->getfeepaidstudentpending($Token);
			$count1=count($check1);
			foreach($check1 as $row1)
			{
				$ToBePaidAmountArray[]=$row1->Amount;
				$Amount+=$row1->Amount;
				$ToBePaidFeeTypeArray[]=$row1->FeeType;
				$FeeName=$row1->MasterEntryValue;
				$FeeSearchIndex=array_search($row1->FeeType,$FeeTypeArray);
				$BalanceAmount=$FeeAmountArray[$FeeSearchIndex];
				if($row1->Amount>$BalanceAmount)
				{
					$OverFeeError=1;
					
					$this->session->set_flashdata('message_type', 'error');
					$this->session->set_flashdata('message', $this->config->item("payment")."<br> $FeeName is only $BalanceAmount $CURRENCY due.");
				}
			}
				
			
			if($Token=="" || $Account=="" || $AdmissionId=="" || $DOP=="")
			{
				$this->session->set_flashdata('message_type', 'error');
				$this->session->set_flashdata('message', $this->config->item("payment")."All the fields are mandatory!!");
			}
			elseif($count1==0)
			{
				$this->session->set_flashdata('message_type', 'error');
				$this->session->set_flashdata('message', $this->config->item("payment")."No fee added in the list!!");
			}
			elseif($count0==0)
			{
				$this->session->set_flashdata('message_type', 'error');
				$this->session->set_flashdata('message', $this->config->item("payment")."This is not a valid student id!!");
			}	
			elseif($OverFeeError==1)
			{
				$this->session->set_flashdata('message_type', 'error');
				$this->session->set_flashdata('message', $this->config->item("payment")."Following fee amount is greater than balance amount : $OverFeeErrorMessage");
			}
			else
			{
				$DOP=strtotime($DOP);
				$Date=date("Y-m-d");
				$Date=strtotime($Date);
				
				$this->payment_model->insertconfirmpayment($this->info['usermailid'],$Token,$this->currentsession[0]->CurrentSession,$Amount,$Account,$Fee,$AdmissionId,$Remarks,$DOP,$Date);
				$this->payment_model->updateaccbal($Amount,$Account);
				$this->payment_model->updatefeepaymentstatus($Token);
				
				$this->session->set_flashdata('message_type', 'success');
				$this->session->set_flashdata('message', $this->config->item("payment")."Fee Paid successfully!!");
			}
			if($Type==error)
			$_SESSION['PaymentToken']=$Token;
			redirect('payments/payment/'.$AdmissionId);
	}
/*school management confirm Payment of student................................................................................*/
	
	
}
