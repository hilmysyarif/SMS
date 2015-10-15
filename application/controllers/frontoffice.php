<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontoffice extends CI_Controller {

	
	 function __construct() {
		parent::__construct();
		
		$this->data[]="";
		$this->data['url'] = base_url();
		$this->load->model('frontoffice_model');
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
	 /*Front office call view load start................................................................................................*/
	function call($callid=false)
	{	
	if(Authority::checkAuthority('Call')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
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
	if(Authority::checkAuthority('Call')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		if($this->input->post('add')){
			
			$data=array('CallResponse'=>$this->input->post('responseid'),
			'Mobile'=>$this->input->post('mobile'),
			'FollowUpDate'=>strtotime($this->input->post('fod')),
			'Name'=>$this->input->post('name'),
			'Landline'=>$this->input->post('landline'),
			'DOC'=>strtotime($this->input->post('doc')),
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
	function followup($callid=false,$upfollowupid=false)
	{	
	if(Authority::checkAuthority('FollowUp')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Follow Up', base_url().'frontoffice/followup');
		$this->data['followupid']=$callid;
		if($upfollowupid){
			$this->data['upfollowupid']=$upfollowupid;
			$this->data['up_followup_details'] = $this->frontoffice_model->up_followup_details($upfollowupid);
		}
		$this->data['followup_details'] = $this->frontoffice_model->get_followup($callid,'calling');
		$this->data['followup_details_show'] = $this->frontoffice_model->get_followup_details($callid,'Call');
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
	if(Authority::checkAuthority('FollowUp')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		if($this->input->post('add')){
			
			$data=array('FollowUpUniqueId'=>$this->input->post('followupid'),
			'DOF'=>strtotime($this->input->post('dof')),
			'NextFollowUpDate'=>strtotime($this->input->post('ndof')),
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
	function ocall($ocallid=false)
	{	
	if(Authority::checkAuthority('OCall')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Other Call', base_url().'frontoffice/ocall');
		
		if($ocallid !=''){
			$this->data['ocallid']=$ocallid;
			$this->data['ocall_up'] = $this->frontoffice_model->get_ocall_up($ocallid);	
		}
		
		$this->data['ocall'] = $this->frontoffice_model->get_ocall();
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('ocall',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*Front office Another call view load End................................................................................................*/

	/*Front office Insert And Update Other call  start......................................................................................*/
	function insert_ocall()
	{	
	if(Authority::checkAuthority('OCall')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		if($this->input->post('add')){
			
			$data=array('Name'=>$this->input->post('name'),
			'Mobile'=>$this->input->post('mobile'),
			'FollowUpDate'=>strtotime($this->input->post('fod')),
			'Landline'=>$this->input->post('landline'),
			'DOC'=>strtotime($this->input->post('doc')),
			'Remarks'=>$this->input->post('remarks'),
			'CallDuration'=>$this->input->post('call_duration'),
			'CallStatus'=>'Active');
			
		if($this->input->post('ocallid')){
			$filter=array('OCallId'=>$this->input->post('ocallid'));
			$this->frontoffice_model->insert_call($data,'ocalling',$filter);
			$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("ocall").' Other Call Updated Successfully!!');
		}else{
		$this->frontoffice_model->insert_call($data,'ocalling');	
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("ocall").' Other Call Added Successfully!!');
		}
		}
		redirect('frontoffice/ocall');
	}
	 /*Front office Insert And Update Other call  End....................................................................................*/
	
	/*Front office followup Other call view load start...........................................................................................*/
	function followup_other($callid=false,$upfollowupid=false)
	{	
	if(Authority::checkAuthority('FollowUpOtherCall')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Follow Up Other Call', base_url().'frontoffice/followup_other');
		$this->data['followupid']=$callid;
		$this->data['ocall']="insert_followup_other";
		if($upfollowupid){
			$this->data['upfollowupid']=$upfollowupid;
			$this->data['up_followup_details'] = $this->frontoffice_model->up_followup_details($upfollowupid);
		}
		$this->data['followup_details'] = $this->frontoffice_model->get_followup_other($callid,'ocalling');
		$this->data['followup_details_show'] = $this->frontoffice_model->get_followup_details($callid,'OCall');
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('followup',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*Front office followup Other call view load End.........................................................................................*/
	
	/*Front office Insert And Update Followup Other Call start................................................................................................*/
	function insert_followup_other()
	{	
	if(Authority::checkAuthority('FollowUpOtherCall')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		if($this->input->post('add')){
			
			$data=array('FollowUpUniqueId'=>$this->input->post('followupid'),
			'DOF'=>strtotime($this->input->post('dof')),
			'NextFollowUpDate'=>strtotime($this->input->post('ndof')),
			'ResponseDetail'=>$this->input->post('response'),
			'Remarks'=>$this->input->post('remark'),
			'FollowUpType'=>'OCall',
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
		redirect('frontoffice/followup_other/'.$this->input->post('followupid'));
	}
	 /*Front office Insert And Update Followup Other Call End................................................................................................*/
	
	
	/*Front office Enquiry view load start................................................................................................*/
	function enquiry($enquiryid=false)
	{	
	if(Authority::checkAuthority('Enquiry')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Enquiry', base_url().'frontoffice/enquiry');

		if($enquiryid !=''){
			$this->data['EnquiryId']=$enquiryid;
			$this->data['enquiry_up'] = $this->frontoffice_model->get_enquiry_up($enquiryid);	
		}
		$this->data['enquiry_type'] = $this->frontoffice_model->get_enquiry_type();
		$this->data['reference'] = $this->frontoffice_model->get_reference();
		$this->data['response'] = $this->frontoffice_model->get_response();
		$this->data['enquiry'] = $this->frontoffice_model->get_enquiry();
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('enquiry',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*Front office Enquiry view load End................................................................................................*/
	
	/*Front office Insert And Update Enquiry  start......................................................................................*/
	function insert_enquiry()
	{	
	if(Authority::checkAuthority('Enquiry')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		if($this->input->post('add')){
			
			$data=array('EnquiryType'=>$this->input->post('enquiry_type'),
			'Name'=>$this->input->post('name'),
			'Address'=>$this->input->post('address'),
			'EnquiryDate'=>strtotime($this->input->post('doe')),
			'Reference'=>$this->input->post('reference'),
			'Mobile'=>$this->input->post('mobile'),
			'ResponseDetail'=>$this->input->post('responsedetail'),
			'EnquiryResponse'=>$this->input->post('response'),
			'AlternateMobile'=>$this->input->post('altmobile'),
			'NoOfChild'=>$this->input->post('nochild'),
			'EnquiryStatus'=>'Active');
			
		if($this->input->post('enquiryid')){
			$filter=array('EnquiryId'=>$this->input->post('enquiryid'));
			$this->frontoffice_model->insert_call($data,'enquiry',$filter);
			$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("enquiry").' Enquiry Updated Successfully!!');
		}else{
		$this->frontoffice_model->insert_call($data,'enquiry');	
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("enquiry").' Enquiry Added Successfully!!');
		}
		}
		redirect('frontoffice/enquiry');
	}
	 /*Front office Insert And Update Enquiry  End....................................................................................*/
	
	/*Front office followup Enquiry view load start...........................................................................................*/
	function followup_enquiry($callid=false,$upfollowupid=false)
	{	
	if(Authority::checkAuthority('FollowUpEnquiry')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Follow Up Enquiry', base_url().'frontoffice/followup_enquiry');
		$this->data['followupid']=$callid;
		$this->data['enquiry']="insert_followup_enquiry";
		if($upfollowupid){
			$this->data['upfollowupid']=$upfollowupid;
			$this->data['up_followup_details'] = $this->frontoffice_model->up_followup_details($upfollowupid);
		}
		$this->data['followup_details'] = $this->frontoffice_model->get_followup_enquiry($callid,'enquiry');
		$this->data['followup_details_show'] = $this->frontoffice_model->get_followup_details($callid,'Enquiry');
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('followup',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*Front office followup Enquiry view load End.........................................................................................*/
	
	/*Front office Insert And Update Followup Enquiry start................................................................................................*/
	function insert_followup_enquiry()
	{	
	if(Authority::checkAuthority('FollowUpEnquiry')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		if($this->input->post('add')){
			
			$data=array('FollowUpUniqueId'=>$this->input->post('followupid'),
			'DOF'=>strtotime($this->input->post('dof')),
			'NextFollowUpDate'=>strtotime($this->input->post('ndof')),
			'ResponseDetail'=>$this->input->post('response'),
			'Remarks'=>$this->input->post('remark'),
			'FollowUpType'=>'Enquiry',
			'FollowUpStatus'=>'Active');
			
		if($this->input->post('upfollowupid')){
			$filter=array('FollowUpId'=>$this->input->post('upfollowupid'));
			$this->frontoffice_model->insert_call($data,'followup',$filter);
			$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("followup_enquiry").' Follow Up Updated Successfully!!');
		}else{
		$this->frontoffice_model->insert_call($data,'followup');	
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("followup_enquiry").' Follow Up Added Successfully!!');
		}
		}
		redirect('frontoffice/followup_enquiry/'.$this->input->post('followupid'));
	}
	 /*Front office Insert And Update Followup Enquiry End................................................................................................*/
	
	
	/*Front office Complaint view load start................................................................................................*/
	function complaint($complaintid=false)
	{	
	if(Authority::checkAuthority('Complaint')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Complaint', base_url().'frontoffice/complaint');
		if($complaintid !=''){
			$this->data['complaintid']=$complaintid;
			$this->data['complaint_up'] = $this->frontoffice_model->get_complaint_up($complaintid);	
		}
		
		$this->data['complaint_type'] = $this->frontoffice_model->get_complaint_type();
		$this->data['complaint'] = $this->frontoffice_model->get_complaint();
		
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('complaint',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*Front office Complaint view load End................................................................................................*/

	/*Front office Insert And Update complaint  start......................................................................................*/
	function insert_complaint()
	{	
	if(Authority::checkAuthority('Complaint')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		if($this->input->post('add')){
			
			$data=array('ComplaintType'=>$this->input->post('complaint_type'),
			'Description'=>$this->input->post('description'),
			'Action'=>$this->input->post('action'),
			'DOC'=>strtotime($this->input->post('doc')),
			'Mobile'=>$this->input->post('mobile'),
			'Name'=>$this->input->post('name'),
			'DOEUsername'=>$this->info['usermailid'],
			'ComplaintStatus'=>'Fresh');
			
		if($this->input->post('complaintid')){
			$filter=array('ComplaintId'=>$this->input->post('complaintid'));
			$this->frontoffice_model->insert_call($data,'complaint',$filter);
			$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("complaint").' Complaint Updated Successfully!!');
		}else{
		$this->frontoffice_model->insert_call($data,'complaint');	
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("complaint").' Complaint Added Successfully!!');
		}
		}
		redirect('frontoffice/complaint');
	}
	 /*Front office Insert And Update complaint  End....................................................................................*/
	
	
	/*Front office Visitor view load start................................................................................................*/
	function visitor($visitorid=false)
	{	
	if(Authority::checkAuthority('Visitor')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Visitor Book', base_url().'frontoffice/visitor');
		
		if($visitorid !=''){
			$this->data['visitorid']=$visitorid;
			$this->data['visitor_up'] = $this->frontoffice_model->get_visitor_up($visitorid);	
		}
		
		$this->data['purpose'] = $this->frontoffice_model->get_purpose();
		$this->data['visitor'] = $this->frontoffice_model->get_visitor();
		
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('visitor',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*Front office Visitor view load End................................................................................................*/
	
	/*Front office Insert And Update visitor  start......................................................................................*/
	function insert_visitor()
	{	
	if(Authority::checkAuthority('Visitor')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		if($this->input->post('add')){
			
			$data=array('Purpose'=>$this->input->post('purpose'),
			'Name`'=>$this->input->post('name'),
			'Mobile'=>$this->input->post('mobile'),
			'InDateTime'=>strtotime($this->input->post('doi')),
			'NoOfPeople'=>$this->input->post('nopeople'),
			'Description'=>$this->input->post('description'),
			'DOEUsername'=>$this->info['usermailid'],
			'VisitorBookStatus'=>'Fresh');
			
		if($this->input->post('visitorid')){
			$data=array('Purpose'=>$this->input->post('purpose'),
			'Name`'=>$this->input->post('name'),
			'Mobile'=>$this->input->post('mobile'),
			'InDateTime'=>strtotime($this->input->post('doi')),
			'OutDateTime'=>strtotime($this->input->post('doo')),
			'NoOfPeople'=>$this->input->post('nopeople'),
			'Description'=>$this->input->post('description'),
			'DOEUsername'=>$this->info['usermailid'],
			'VisitorBookStatus'=>'Fresh');
			$filter=array('VisitorBookId'=>$this->input->post('visitorid'));
			$this->frontoffice_model->insert_call($data,'visitorbook',$filter);
			$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("visitor").' Visitor Updated Successfully!!');
		}else{
		$this->frontoffice_model->insert_call($data,'visitorbook');	
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("visitor").' Visitor Added Successfully!!');
		}
		}
		redirect('frontoffice/visitor');
	}
	 /*Front office Insert And Update visitor  End....................................................................................*/
	
	/*school management Exam Delete start........................................................................*/	
	function delete($action=false,$on=false,$id=false)
	{
	if(Authority::checkAuthority('Call')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		
		if($id){
			$filter=array($on=>$this->data['id']=$id);
			$this->master_model->delete($action,$filter);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("delete").' Deleted Successfully!!');
		}
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	
	}
/*school management Exam Delete End.............................................................................*/

	
}
