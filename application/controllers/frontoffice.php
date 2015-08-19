<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontoffice extends CI_Controller {

	
	 function __construct() {
		parent::__construct();
		
		$this->data[]="";
		$this->data['url'] = base_url();
		$this->load->model('frontoffice_model');
		$this->load->model('master_model');
		$this->load->library('parser');
		$this->load->library('utilities');
		$this->data['base_url']=base_url();
		$this->load->library('session');
		if (!$this->session->userdata('user_data')) show_error('Direct access is not allowed');
		$this->info= $this->session->userdata('user_data');
		$currentsession = $this->mhome->get_session();
		$this->session->set_userdata('currentsession',$currentsession);
		$currentsession=$this->currentsession = $this->session->userdata('currentsession');
	 }
	 /*Front office call view load start................................................................................................*/
	function call($callid=false)
	{	
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Call', base_url().'frontoffice/call');

		$this->data['response'] = $this->frontoffice_model->get_response();
		$this->data['call_list'] = $this->frontoffice_model->get_calllist();
		
		if($callid){
			$this->data['callid']=$callid;
			$this->data['update_call'] = $this->frontoffice_model->get_call_update($callid);
			 
		}
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('call',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	 /*Front office call view load End................................................................................................*/
	
	/*Front office Insert And Update call  start................................................................................................*/
	function insert_call()
	{	
		if($this->input->post('add')){
			
			$data=array('CallResponse'=>$this->input->post('responseid'),
			'Mobile'=>$this->input->post('mobile'),
			'FollowUpDate'=>date("d-m-Y H:i",$this->input->post('fod')),
			'Name'=>$this->input->post('name'),
			'Landline'=>$this->input->post('landline'),
			'DOC'=>date("d-m-Y H:i",$this->input->post('doc')),
			'ResponseDetail'=>$this->input->post('responsedetails'),
			'Address'=>$this->input->post('address'),
			'NoOfChild'=>$this->input->post('nochild'),
			'CallStatus'=>'Active');
			
		if($this->input->post('callid')){
			$filter=array('CallId'=>$this->input->post('callid'));
			$this->frontoffice_model->insert_call($data,'calling',$filter);
			$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("call").' Call Updated Successfully!!');
		}else{
		$this->frontoffice_model->insert_call($data,'calling');	
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("call").' Call Added Successfully!!');
		}
		}
		redirect('frontoffice/call');
	}
	 /*Front office Insert And Update call  End................................................................................................*/
	
	/*Front office followup call view load start................................................................................................*/
function followup($followupid=false,$upfollowupid=false)
	{	
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Follow Up', base_url().'frontoffice/followup');
		$this->data['followupid']=$followupid;
		if($upfollowupid){
			$this->data['upfollowupid']=$upfollowupid;
			$this->data['up_followup_details'] = $this->frontoffice_model->up_followup_details($upfollowupid);
		}
		$this->data['followup_details'] = $this->frontoffice_model->get_followup($followupid,'calling');
		$this->data['followup_details_show'] = $this->frontoffice_model->get_followup_details($followupid,'Call');
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('followup',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*Front office followup call view load End................................................................................................*/

/*Front office Insert And Update Followup  start................................................................................................*/
	function insert_followup()
	{	
		if($this->input->post('add')){
			
			$data=array('FollowUpUniqueId'=>$this->input->post('followupid'),
			'DOF'=>date("d-m-Y H:i",$this->input->post('dof')),
			'NextFollowUpDate'=>date("d-m-Y H:i",$this->input->post('ndof')),
			'ResponseDetail'=>$this->input->post('response'),
			'Remarks'=>$this->input->post('remark'),
			'FollowUpType'=>'Call',
			'FollowUpStatus'=>'Active');
			
		if($this->input->post('upfollowupid')){
			$filter=array('FollowUpId'=>$this->input->post('upfollowupid'));
			$this->frontoffice_model->insert_call($data,'followup',$filter);
			$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("followup").' Follow Up Updated Successfully!!');
		}else{
		$this->frontoffice_model->insert_call($data,'followup');	
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("followup").' Follow Up Added Successfully!!');
		}
		}
		redirect('frontoffice/followup/'.$this->input->post('followupid'));
	}
	 /*Front office Insert And Update Followup  End................................................................................................*/
	
	
/*Front office Another call view load start................................................................................................*/
function ocall()
	{	
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Other Call', base_url().'frontoffice/ocall');

		//$this->data['class'] = $this->frontoffice_model->get_report_class($this->currentsession[0]->CurrentSession);
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('ocall',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*Front office Another call view load End................................................................................................*/

/*Front office Enquiry view load start................................................................................................*/
function enquiry()
	{
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Enquiry', base_url().'frontoffice/enquiry');

		
		//$this->data['class'] = $this->frontoffice_model->get_report_class($this->currentsession[0]->CurrentSession);
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('enquiry',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*Front office Enquiry view load End................................................................................................*/
	
/*Front office Complaint view load start................................................................................................*/
function complaint()
	{
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Complaint', base_url().'frontoffice/complaint');
		//$this->data['class'] = $this->frontoffice_model->get_report_class($this->currentsession[0]->CurrentSession);
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('complaint',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*Front office Complaint view load End................................................................................................*/

/*Front office Visitor view load start................................................................................................*/
function visitor()
	{
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Visitor Book', base_url().'frontoffice/visitor');
		//$this->data['class'] = $this->frontoffice_model->get_report_class($this->currentsession[0]->CurrentSession);
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('visitor',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*Front office Visitor view load End................................................................................................*/
		
	
}
