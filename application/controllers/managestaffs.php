<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Managestaffs extends CI_Controller {

	
	 function __construct() {
		parent::__construct();
		
		$this->data[]="";
		$this->data['url'] = base_url();
		$this->load->model('managestaff_model');
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

	 
	
	/*school managementManageStaff Load.............................................................................................................*/
	function managestaff($staffid=false)
	{	
	if(Authority::checkAuthority('ManageStaff')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Manage Staff', base_url().'managestaffs/managestaff');
		
		if($staffid){
			$this->data['staffid']=$staffid;
			$this->data['staff_up'] = $this->managestaff_model->get_staff_up($staffid);
			$this->data['staff_qualification'] = $this->managestaff_model->get_staff_qualification($staffid);
			$this->data['staff_documents'] = $this->managestaff_model->get_staff_documents($staffid);
			
		}
		
		$this->data['staff'] = $this->managestaff_model->get_staff();
		
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('managestaff',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management ManageStaff Load..............................................................................................................*/

	/*ManageStaff Insert And Update Staff  start................................................................................................*/
	function insert_staff()
	{	
	if(Authority::checkAuthority('ManageStaff')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		if($this->input->post('add')){
			
			$Date=date("Y-m-d");
			$Date=strtotime($Date);
			
			$data=array('StaffPosition'=>$this->input->post('position'),
			'StaffName'=>$this->input->post('staff_name'),
			'StaffMobile'=>$this->input->post('mobile'),
			'StaffDOJ'=>strtotime($this->input->post('doj')),
			'DOE'=>$Date,
			'StaffStatus'=>'Active');
			
		if($this->input->post('staffid')){
			$data=array('StaffPosition'=>$this->input->post('position'),
			'StaffName'=>$this->input->post('staff_name'),
			'StaffMobile'=>$this->input->post('mobile'),
			'StaffEmail'=>$this->input->post('staffemail'),
			'StaffAlternateMobile'=>$this->input->post('altmobile'),
			'StaffFName'=>$this->input->post('fname'),
			'StaffMName'=>$this->input->post('mname'),
			'StaffDOJ'=>strtotime($this->input->post('doj')),
			'StaffDOB'=>strtotime($this->input->post('dob')),
			'StaffPresentAddress'=>$this->input->post('presentaddress'),
			'StaffPermanentAddress'=>$this->input->post('permanentaddress'),
			'StaffRemarks'=>$this->input->post('remark'),
			'DOE'=>$Date,
			'StaffStatus'=>$this->input->post('status'));
			$filter=array('StaffId'=>$this->input->post('staffid'));
			$this->managestaff_model->insert($data,'staff',$filter);
			$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("managestaff").' Staff Updated Successfully!!');
		}else{
		$this->managestaff_model->insert($data,'staff');	
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("managestaff").' Staff Added Successfully!!');
		}
		}
		redirect('managestaffs/managestaff');
	}
	 /*ManageStaff Insert And Update Staff  End................................................................................................*/
	
	/*ManageStaff Insert And Update Staff  start................................................................................................*/
	function insert_staffqualification()
	{	
	if(Authority::checkAuthority('ManageStaff')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		if($this->input->post('staffid')){
			
			$data=array('Type'=>'Staff',
			'UniqueId'=>$this->input->post('staffid'),
			'BoardUniversity'=>$this->input->post('boarduniversity'),
			'Class'=>$this->input->post('class'),
			'Year'=>$this->input->post('year'),
			'Marks'=>$this->input->post('marks'),
			'Remarks'=>$this->input->post('remarks'));
			
		$this->managestaff_model->insert($data,'qualification');	
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("managestaff").' Staff Qualification Added Successfully!!');
		}
		
		redirect('managestaffs/managestaff/'.$this->input->post('staffid'));
	}
	 /*ManageStaff Insert And Update Staff  End................................................................................................*/
	 
	 /*ManageStaff Insert And Update Staff Documents start................................................................................................*/
	function insert_staffdocuments()
	{	
	if(Authority::checkAuthority('ManageStaff')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		if($this->input->post('staffid')){
			
			if($_FILES['image']['name']!=''){
			$data['image_z1']= $_FILES['image']['name'];
			 
			$image=sha1($_FILES['image']['name']).time().rand(0, 9);
			if(!empty($_FILES['image']['name'])){
				
				$config =  array(
						'upload_path'	  => './upload/',
						'file_name'       => $image,
						'allowed_types'   => "gif|jpg|png|jpeg|JPG|JPEG|PNG|JPG",
						'overwrite'       => true);
				$this->upload->initialize($config);
				$this->load->library('upload');
				 
				if($this->upload->do_upload("image")){
					
					$upload_data = $this->upload->data();
					$image=$upload_data['file_name'];
				}
				else
				{
					$this->upload->display_errors()."file upload failed";
					$image    ="";
				}}}
		
		$Date=date("Y-m-d");
		$Date=strtotime($Date);
		
		$data=array('UniqueId'=>$this->input->post('staffid'),
			'Title'=>$this->input->post('title'),
			'Path'=>$image,
			'Document'=>$this->input->post('document'),
			'Detail'=>'StaffDocuments',
			'DOE'=>$Date);
			
		$this->managestaff_model->insert($data,'photos');	
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("managestaff").' Staff Document Added Successfully!!');
		}
		
		redirect('managestaffs/managestaff/'.$this->input->post('staffid'));
	}
	 /*ManageStaff Insert And Update Staff Documents  End................................................................................................*/
	
	 
	
	
}
