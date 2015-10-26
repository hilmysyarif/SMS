<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admission extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		$this->data[]="";
		$this->data['url'] = base_url();
		$this->load->model('admission_model');
		$this->load->model('master_model');
		$this->load->model('authority_model');
		$this->load->library('parser');
		$this->load->library('utilities');
		$this->data['base_url']=base_url();
		$this->load->library('session');
		$this->load->library('authority');
		if (!$this->session->userdata('user_data')){ $this->session->set_flashdata('category_error_login', " Your Session Is Expired!! Please Login Again. "); redirect(base_url());}
		$this->info= $this->session->userdata('user_data');
		$currentsession = $this->mhome->get_session();
		$this->session->set_userdata('currentsession',$currentsession);
		$currentsession=$this->currentsession = $this->session->userdata('currentsession');
	 }

	 /*school management registration controller start*/	
	function registration($id=false)
	{	
		if(Authority::checkAuthority('Registration')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Student Registration', base_url().'admission/registration');
		if($id){
		$filter = array('RegistrationId'=>$id);
		$registration_info = $this->admission_model->get_info($filter,'registration');
		$this->data['registration_update'] = $this->admission_model->get_info($filter,'registration');
		
		 $this->data = array(
		 		'RegistrationId'=>$registration_info[0]->RegistrationId,
		 		'StudentName'=>$registration_info[0]->StudentName,
		 		'FatherName'=>$registration_info[0]->FatherName,
		 		'MotherName'=>$registration_info[0]->MotherName,
		 		'Gender'=>$registration_info[0]->Gender,
		 		'DOB'=>$registration_info[0]->DOB,
		 		'Caste'=>$registration_info[0]->Caste,
		 		'Category'=>$registration_info[0]->Category,
		 		'BloodGroup'=>$registration_info[0]->BloodGroup,
		 		'SectionId'=>$registration_info[0]->SectionId,
		 		'DOR'=>$registration_info[0]->DOR,
		 		'Mobile'=>$registration_info[0]->Mobile,
		 		'MotherMobile'=>$registration_info[0]->MotherMobile,
		 		'FatherMobile'=>$registration_info[0]->FatherMobile,
		 		'PresentAddress'=>$registration_info[0]->PresentAddress,
		 		'Landline'=>$registration_info[0]->Landline,
		 		'PermanentAddress'=>$registration_info[0]->PermanentAddress,
		 		'AlternateMobile'=>$registration_info[0]->AlternateMobile,
		 		'FatherDateOfBirth'=>$registration_info[0]->FatherDateOfBirth,
		 		'MotherDateOfBirth'=>$registration_info[0]->MotherDateOfBirth,
		 		'FatherDesignation'=>$registration_info[0]->FatherDesignation,
		 		'FatherEmail'=>$registration_info[0]->FatherEmail,
		 		'MotherEmail'=>$registration_info[0]->MotherEmail,
		 		'FatherOrganization'=>$registration_info[0]->FatherOrganization,
		 		'FatherQualification'=>$registration_info[0]->FatherQualification,
		 		'MotherQualification'=>$registration_info[0]->MotherQualification,
		 		'MotherDesignation'=>$registration_info[0]->MotherDesignation,
		 		'FatherOccupation'=>$registration_info[0]->FatherOccupation,
		 		'MotherOccupation'=>$registration_info[0]->MotherOccupation,
		 		'MotherOrganization'=>$registration_info[0]->MotherOrganization,
		 		'DateOfTermination'=>$registration_info[0]->DateOfTermination,
		 		'TerminationReason'=>$registration_info[0]->TerminationReason,
		 		'TerminationRemarks'=>$registration_info[0]->TerminationRemarks);
		 
				 $this->data['RegistrationId']=$id;
				 $this->data['student_qualification'] = $this->admission_model->student_qualification($id);
				  $this->data['student_sibling'] = $this->admission_model->student_sibling($id);
				  $this->data['student_documents'] = $this->admission_model->get_student_documents($id);
				 
				}
				else{
					$this->data['registration_info']='';
				}
		
				 $this->data['regis'] = $this->admission_model->get_registration_info(!empty($this->currentsession[0]->CurrentSession)?$this->currentsession[0]->CurrentSession:'');
				 $this->data['class_section'] = $this->admission_model->get_class_info(!empty($this->currentsession[0]->CurrentSession)?$this->currentsession[0]->CurrentSession:'');
				 $this->data['gender'] = $this->admission_model->get_gender_info();
				 $this->data['caste'] = $this->admission_model->get_gender_info();
				 $this->data['category'] = $this->admission_model->get_gender_info();
				 $this->data['blood_grp'] = $this->admission_model->get_gender_info();
				 $this->data['termination'] = $this->admission_model->get_gender_info();
				 $this->data['photo'] = $this->admission_model->get_gender_info();
				 $this->data['doc'] = $this->admission_model->get_gender_info();
				
				 $this->data['RegistrationId']=$id;
				 $this->data['QualificationId']=$id;
				 
				 $this->parser->parse('include/header',$this->data);
				 $this->parser->parse('include/topheader',$this->data);
				 $this->parser->parse('include/leftmenu',$this->data);
				 $this->load->view('registration',$this->data);
				 $this->parser->parse('include/footer',$this->data);
	}

	
	function update_registration($RegistrationId=false,$QualificationId=false)
	{	if(Authority::checkAuthority('Registration')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		if($this->input->post('submit')){
				$info = array(
						'StudentName'=>$this->input->post('student_name'),
						'FatherName'=>$this->input->post('father_name'),
						'MotherName'=>$this->input->post('mother_name'),
						//'SectionId'=>$this->input->post('class'),
						'DOB'=>strtotime($this->input->post('DOB')),
						'DOR'=>strtotime($this->input->post('DOR')),
						'BloodGroup'=>$this->input->post('BloodGroup'),
						'Caste'=>$this->input->post('Caste'),
						'Category'=>$this->input->post('Category'),
						'Gender'=>$this->input->post('gender'));
				
		$filter = array('RegistrationId'=>$RegistrationId);
		$val =	$this->admission_model->update_registration($info,$filter);
				$this->session->set_flashdata('message_type', 'success');
				$this->session->set_flashdata('message', $this->config->item("registration").' updated successfully');
				$this->session->set_flashdata('message_type', 'success');
				$this->session->set_flashdata('message', $this->config->item("registration").' updated successfully');
				redirect('admission/registration');
		}
		if($this->input->post('submit1'))
		{
					$info = array(
					'Mobile'=>$this->input->post('mobile'),
					'FatherMobile'=>$this->input->post('father_mobile'),
					'MotherMobile'=>$this->input->post('mother_mobile'),
					'PresentAddress'=>$this->input->post('present_address'),
					'Landline'=>$this->input->post('landline'),
					'PermanentAddress'=>$this->input->post('permanent_address'),
					'AlternateMobile'=>$this->input->post('alternate_mobile'));
					
			$filter = array('RegistrationId'=>$RegistrationId);
			$val =	$this->admission_model->update_registration($info,$filter);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("registration").' updated successfully');
			redirect('admission/registration');
		}
		if($this->input->post('submit2'))
		{
			$info = array(
					'FatherDateOfBirth'=>strtotime($this->input->post('FatherDateOfBirth')),
					'MotherDateOfBirth'=>strtotime($this->input->post('MotherDateOfBirth')),
					'FatherDesignation'=>$this->input->post('FatherDesignation'),
					'FatherEmail'=>$this->input->post('FatherEmail'),
					'MotherEmail'=>$this->input->post('MotherEmail'),
					'FatherOrganization'=>$this->input->post('FatherOrganization'),
					'FatherQualification'=>$this->input->post('FatherQualification'),
					'MotherQualification'=>$this->input->post('MotherQualification'),
					'MotherDesignation'=>$this->input->post('MotherDesignation'),
					'FatherOccupation'=>$this->input->post('FatherOccupation'),
					'MotherOccupation'=>$this->input->post('MotherOccupation'),
					'MotherOrganization'=>$this->input->post('MotherOrganization'));
			
			$filter = array('RegistrationId'=>$RegistrationId);
			$val =	$this->admission_model->update_registration($info,$filter);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("registration").' updated successfully');
			redirect('admission/registration');
		}
		if($this->input->post('submit4'))
		{
			$info = array(
					'DateOfTermination'=>strtotime($this->input->post('DateOfTermination')),
					'TerminationReason'=>$this->input->post('TerminationReason'),
					'TerminationRemarks'=>$this->input->post('TerminationRemarks'));
			$filter = array('RegistrationId'=>$RegistrationId);
			$val =	$this->admission_model->update_registration($info,$filter);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("registration").' Student Terminated successfully');
			redirect('admission/registration');
		}
		if($this->input->post('submit5'))
		{
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
		
			$info = array(
					'Title'=>$this->input->post('Title'),
					'Path'=>$image,
					'Document'=>$this->input->post('Document'),
					'Detail'=>'StudentDocuments',
					'UniqueId'=>$RegistrationId,
					'DOE'=>$Date);
			
			$this->admission_model->insert_photo($info);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("registration").' Document Uploaded successfully');
			redirect('admission/registration');
		}
	}

	function add_qualification($RegistrationId=false)
	{	if(Authority::checkAuthority('Registration')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		if($this->input->post('submit3'))
		{
			$info = array(
					'BoardUniversity'=>$this->input->post('BoardUniversity'),
					'Year'=>$this->input->post('Year'),
					'UniqueId'=>$RegistrationId,
					'Remarks'=>$this->input->post('Remarks'),
					'Class'=>$this->input->post('Class'),
					'Marks'=>$this->input->post('Marks'),
					'Type'=>'Student');
			$r_id=$this->admission_model->insert_qualification($info);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("registration").' Qualification Added successfully');
			redirect('admission/registration');
		}
	}
	
	function insert_sibling($RegistrationId=false)
	{	if(Authority::checkAuthority('Registration')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		if($this->input->post('Save'))
		{
			$info = array(
					'SName'=>$this->input->post('sibling_name'),
					'SClass'=>$this->input->post('sibling_class'),
					'RegistrationId'=>$RegistrationId,
					'SRemarks'=>$this->input->post('sibling_remark'),
					'SDOB'=>strtotime($this->input->post('sibling_dob')),
					'SSchool'=>$this->input->post('sibling_schoolname'));
			$this->admission_model->insert_sibling($info);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("registration").' Sibling  Added successfully');
			redirect('admission/registration');
		}
		redirect('admission/registration');
	}
	
/*school management registration controller start...................................................................................................*/
	function add_registration($RegistrationId=false)
	{ 	if(Authority::checkAuthority('Registration')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		if($this->input->post('submit')){
							$info = array(
									'StudentName'=>$this->input->post('student_name'),
									'FatherName'=>$this->input->post('father_name'),
									'MotherName'=>$this->input->post('mother_name'),
									'Mobile'=>$this->input->post('mobile'),
									'SectionId'=>$this->input->post('class'),
									'DOR'=>strtotime($this->input->post('DOR')),
									'Session'=>$this->currentsession[0]->CurrentSession,
									'Gender'=>$this->input->post('gender'),
									'Status'=>'NotAdmitted');
				$r_id=$this->admission_model->insert_registration($info);
			 	$this->session->set_flashdata('message_type', 'success');
				$this->session->set_flashdata('message', $this->config->item("registration").' Registration Done successfully');
				redirect('admission/registration');
		}
	}

	/*school management admission View Load.............................................................................................................*/
	function admission_student()
	{ 	
		if(Authority::checkAuthority('Admission')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Student Admission', base_url().'admission/admission_student');
		
		if($this->input->post('student')){
			
			if($this->input->post('student')){
				$info=explode(',',$this->input->post('student'));
				$id=$info[0];
				$class=$info[1];
				$section=$info[2];
			}
			$this->data = array(
					'id'=>$id,
					'transport'=>$this->input->post('transport'),
					'distance'=>$this->input->post('distance'),
					'class'=>$class,
					'section'=>$section);
			$this->data['fee_info']=$check=$this->admission_model->get_admission_class($section,$this->input->post('distance'),$this->currentsession[0]->CurrentSession);
			
			if(count($check) ==0){
				
				$this->session->set_flashdata('message_type', 'error');
				$this->session->set_flashdata('message', $this->config->item("admission_student").' No Fee Structure Set For This Class. Plz Check Transport Fee Or Set Fee Structure In Manage Fee');
				redirect('admission/admission_student');
			}
		}
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('admission',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management admission View Load..............................................................................................................*/
	
	/*school management admission Insert.............................................................................................................*/
	function insert_admission()
	{	if(Authority::checkAuthority('Admission')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		
		$data=array('AdmissionNo'=>$this->input->post('admission_no'),
				'RegistrationId'=>$this->input->post('id'),
				'Remarks'=>$this->input->post('remarks'),
				'DOA'=>strtotime($this->input->post('DOA')));
				
		$admissionid=$this->admission_model->insert_admission($data,'admission');
		
		$date=date("Y-m-d");
		$date=strtotime($date);
		
		$amount=$this->input->post('amount');
		$feeid=$this->input->post('feeid');
		
		$feestring='';
		
		for($i=0;$i<=count($feeid)-1;$i++){
		$feestring.="$feeid[$i]-$amount[$i]";
		if($i<=count($feeid)-2){
		$feestring.=",";
		}
		}
		
		$data1=array('AdmissionId'=>$admissionid,
		'AdmissionNo'=>$this->input->post('admission_no'),
		'Session'=>$this->currentsession[0]->CurrentSession,
		'SectionId'=>$this->input->post('section'),
		'Date'=>strtotime($this->input->post('DOA')),
		'DOE'=>$date,
		'FeeStructure'=>$feestring,
		'Distance'=>$this->input->post('distance'),
		'Username'=>$this-info['usermailid']);
		
		$this->admission_model->insert_studentfee($data1,'studentfee');
		
		$this->session->set_flashdata('message_type', 'success');
		$this->session->set_flashdata('message', $this->config->item("admission_student").' Admission Done successfully');
		redirect('admission/admission_student');
	}
	/*school management admission Insert..............................................................................................................*/
	
	
	/*school management Promotion View Load.............................................................................................................*/
	function promotion()
	{	
	if(Authority::checkAuthority('Promotion')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Student Promotion', base_url().'admission/promotion');
		
		if($this->input->post('nextsession') && $this->input->post('nextclass') !=''){
			$this->data['nextclass']=$this->input->post('nextclass');
			$this->data['nextsession']=$this->input->post('nextsession');
			$this->data['currentclass']=$this->input->post('currentclass');
			$this->data['student']=implode(",",$this->input->post('student'));
			$this->data['transport']=$this->input->post('transport');
			$this->data['distance']=$this->input->post('distance');
			
			$feetype=$this->data['get_fee_structure']=$this->admission_model->get_nextclass_fee($this->input->post('nextclass'),$this->input->post('nextsession'));
			
			
		}
		
		$this->data['class_info']=$this->admission_model->get_class(!empty($this->currentsession[0]->CurrentSession)?$this->currentsession[0]->CurrentSession:'');
		
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('promotion',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management Promotion View Load..............................................................................................................*/

	/*school management confirmpromotion .............................................................................................................*/
	function confirmpromotion()
	{	if(Authority::checkAuthority('Promotion')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		
		$SectionId=$this->input->post('SectionId');
		$NextSession=$this->input->post('NextSession');
		$NextSectionId=$this->input->post('NextSectionId');
		$AdmissionId=$this->input->post('AdmissionId');
		$AdmissionId=explode(",",$AdmissionId);
		$DOP=$this->input->post('DOP');
		$Distance=$this->input->post('Distance');
		$Remarks=$this->input->post('Remarks');
		$FeeArray=$this->input->post('FeeArray');
		$Count=count($FeeArray);
		if($Count>1){
			$FeeString=implode(",",$FeeArray);
		}else{
				$FeeString=$FeeArray[0];
		}
			
		if($AdmissionId=="" || $DOP=="" || $SectionId=="" || $NextSession=="" || $NextSectionId=="")
		{
			$Message="All the fields are mandatory!!";
			$this->session->set_flashdata('message_type', 'error');
			$this->session->set_flashdata('message', $this->config->item("promotion").' All the fields are mandatory!!');
		}
		elseif($ErrorInFee>0)
		{
			
			$this->session->set_flashdata('message_type', 'error');
			$this->session->set_flashdata('message', $this->config->item("promotion")."$ErrorInFee number of fees are not numeric!!");
		}else
		{	
			$DOP=strtotime($DOP);
			$Date=date("Y-m-d");
			$DOE=strtotime($Date);
			
			foreach($AdmissionId as $AdmissionIdValue)
			{
				$student=$this->admission_model->get_class($AdmissionIdValue,$NextSession);
				$count22=count($student);
				if($count22==0)
				{
					$this->admission_model->insert_promotion($AdmissionIdValue,$DOP,$DOE,$NextSectionId,$NextSession,$FeeString,$Distance,$Remarks);
				}
			}
			
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("promotion").' Promoted successfully!!');
		}
				
		redirect('admission/promotion');
	}
	/*school management confirmpromotion ..............................................................................................................*/
	
	
	/*school management Updatefee View Load.............................................................................................................*/
	function updatefee($sectionid=false,$admissionid=false)
	{	
	if(Authority::checkAuthority('UpdateFee')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Update Fee', base_url().'admission/updatefee');
		
		if($sectionid && $admissionid !=''){
			$this->data['section']=$sectionid;
			$this->data['admission']=$admissionid;
			$this->data['class_info2']=$this->admission_model->get_class2($sectionid,$this->currentsession[0]->CurrentSession);
			$feetype=$this->data['get_fee_structure']=$this->admission_model->get_fee_structure($sectionid,$this->currentsession[0]->CurrentSession,$admissionid);
			$this->data['get_fee_details']=$this->admission_model->get_fee_details($admissionid);
			
			$this->data['fee_type']=explode(",",$feetype[0]->FeeStructure);
			
		}
		$this->data['class_info']=$this->admission_model->get_class(!empty($this->currentsession[0]->CurrentSession)?$this->currentsession[0]->CurrentSession:'');
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('updatefee',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management Updatefee View Load..............................................................................................................*/
	
	/*school management get fee for update start...................................................................................................*/
	function get_fee()
	{
		if($this->input->post('class') && $this->input->post('student') !=''){
			$section=$this->input->post('class');
			$admission=$this->input->post('student');
			redirect('admission/updatefee/'.$section."/".$admission);
		}
	}
	/*school management get fee for update end.................................................................................................*/

	/*school management update Class start...................................................................................................*/
	function updateclass()
	{ 	
	if(Authority::checkAuthority('UpdateClass')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		
		if($this->input->post('class_name') !=''){
			
			$NewSectionId=$this->input->post('class_name');
			$AdmissionId=$this->input->post('addmissionid');
			$Feearray=$this->input->post('feearray');
			
		$row=$this->admission_model->updateclass_student($AdmissionId,$this->currentsession[0]->CurrentSession);
		$count=count($row);
		$OldSectionId=$row[0]->SectionId;
		$OldFeeStructure=$row[0]->FeeStructure;
		$Distance=$row[0]->Distance;
		
		$row1=$this->admission_model->transactioncheck($AdmissionId,$this->currentsession[0]->CurrentSession);
		$count1=count($row1);
		
		$row3=$this->admission_model->feecheck($NewSectionId,$this->currentsession[0]->CurrentSession,$Distance);
		$ErrorInFee=0;
		foreach($Feearray as $row2)
		{
			$fee=explode(",",$row2);
			
			if(is_numeric($fee[1])==False)
			$ErrorInFee++;
		}
		$FeeString=implode(",",$Feearray);
		
		if($NewSectionId=="" || $AdmissionId=="")
		{
			$this->session->set_flashdata('message_type', 'error');
			$this->session->set_flashdata('message', $this->config->item("updatefee").' All the fields are mandatory!!');
		}
		elseif($NewSectionId==$OldSectionId)
		{
			$Message="New section & old section cannot be same!!";
			$this->session->set_flashdata('message_type', 'error');
			$this->session->set_flashdata('message', $this->config->item("updatefee").' All the fields are mandatory!!');
		}
		elseif($count==0)
		{
			$Message="This is not a valid link!!";
			$this->session->set_flashdata('message_type', 'error');
			$this->session->set_flashdata('message', $this->config->item("updatefee").' All the fields are mandatory!!');
		}
		elseif($count1>0)
		{
			$this->session->set_flashdata('message_type', 'error');
			$this->session->set_flashdata('message', $this->config->item("updatefee").'This student has already paid the fee, Class cannot be changed!!');
		}
		elseif($ErrorInFee>0)
		{
			$this->session->set_flashdata('message_type', 'error');
			$this->session->set_flashdata('message', $this->config->item("updatefee").' Fee should be numeric!!');
		}else
		{
			$FeeString=implode(",",$FeeString);
			$this->admission_model->insertupdateclass($NewSectionId,$FeeString,$AdmissionId,$this->currentsession[0]->CurrentSession,$Distance);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("updatefee").' Class updated!!');
		}
		
		}
		redirect('admission/updatefee/'.$OldSectionId."/".$AdmissionId);
	}
	/*school management update Class end.................................................................................................*/

	/*school management setfee_structure start...................................................................................................*/
	function setfee_structure()
	{ 	
	if(Authority::checkAuthority('UpdateClass')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		
		if($this->input->post('addmissionid') !=''){
			
		$AdmissionId=$this->input->post('addmissionid');
		$AdmissionNo=$this->input->post('admission_no');
		$SectionId=$this->input->post('section');
		$DOAP=$this->input->post('DOP');
		$Remarks=$this->input->post('remarks');
		$Feeid=$this->input->post('feeid');
		$Feeamount=$this->input->post('feeamount');
		
		if(count($Feeid)>1){
			$FeeString[]='';
			$i=0;
		foreach($Feeid as $Feeid){
			$FeeString[$i]=$Feeid.'-'.$Feeamount[$i];
			$i++;
		}
		$FeeString=implode(",",$FeeString);
		}else{
		$FeeString=$Feeid[0].'-'.$Feeamount[0];
		}
		
		
		$row11=$this->admission_model->feecheck($AdmissionNo,$AdmissionId);
		$count11=count($row11);
		
		if($AdmissionId=="" || $DOAP=="" || $SectionId=="" || $AdmissionNo=="")
		{
			$this->session->set_flashdata('message_type', 'error');
			$this->session->set_flashdata('message', $this->config->item("updatefee").'All the fields are mandatory!!');
		}
		elseif($count11>0)
		{
			$AdmissionName=$row11[0]->StudentName;
			$AdmissionMobile=$row11[0]->Mobile;
			$this->session->set_flashdata('message_type', 'error');
			$this->session->set_flashdata('message', $this->config->item("updatefee")."This Admission No is already assigned to $AdmissionName $AdmissionMobile!!");
		}
		elseif($PaidFee>$Total)
		{
			$this->session->set_flashdata('message_type', 'error');
			$this->session->set_flashdata('message', $this->config->item("updatefee")."$PaidFee $CURRENCY amount has already been paid, less than $PaidFee $CURRENCY can not be set!!");	
		}
		elseif($ErrorMsg!="")
		{
			$this->session->set_flashdata('message_type', 'error');
			$this->session->set_flashdata('message', $this->config->item("updatefee")."$ErrorMsg");
		}
		elseif($ErrorInFee>0)
		{
			$this->session->set_flashdata('message_type', 'error');
			$this->session->set_flashdata('message', $this->config->item("updatefee")."$ErrorInFee number of fees are not numeric!!");
		}else
		{	
			$DOAP=strtotime($DOAP);
			$Date=date("Y-m-d");
			$DOE=strtotime($Date);
			$this->admission_model->insertupfeestructure($AdmissionNo,$FeeString,$DOAP,$Remarks,$AdmissionId,$SectionId,$this->currentsession[0]->CurrentSession,$Distance);
			$this->session->set_flashdata('message_type', 'success');
			$this->session->set_flashdata('message', $this->config->item("updatefee").' Saved successfully!!');
		}
			
		}
		redirect('admission/updatefee/'.$SectionId."/".$AdmissionId);
	}
	/*school management setfee_structure end.................................................................................................*/

	
	/*school management Admission Report View Load.............................................................................................................*/
	function admissionreport($section=false)
	{	
	if(Authority::checkAuthority('AdmissionReport')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Admission Report', base_url().'admission/admissionreport');
		$status='';
		$section='';
			if($this->input->post('class')){
			$section=$this->data['section']=$this->input->post('class');
			$section="and studentfee.SectionId='$section' ";
			}
			if($this->input->post('terminate')){
				$this->data['terminate']=$status='Terminated';
			}
			if($this->input->post('login')){
			$this->data['login']='login';
			}
		$this->data['class_info']=$this->admission_model->get_class(!empty($this->currentsession[0]->CurrentSession)?$this->currentsession[0]->CurrentSession:'');
		$this->data['student_info']=$this->admission_model->get_student_details($status,$section,!empty($this->currentsession[0]->CurrentSession)?$this->currentsession[0]->CurrentSession:'');
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('admissionreport',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*school management Admission Report View Load.....................................................................................................*/
	
	/*school management get Admission report start...................................................................................................*/
/*	function get_ad_report()
	{
		if($this->input->post('class') ){
			$section=$this->input->post('class');
			if($this=>input->post('terminate')){
				
			}
			if($this->input->post('login')){
				
			}
			if($this->input->post('terminate') && $this->input->post('login') !=''){
				
			}
			redirect('admission/admissionreport/'.$section);
		}
	}*/
	/*school management get Admission report end.................................................................................................*/
	
	/*school management Admission Delete start........................................................................*/	
	function delete($action=false,$on=false,$id=false)
	{
	if(Authority::checkAuthority('registration')==true){
			
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
/*school management Admission Delete End.............................................................................*/

}
