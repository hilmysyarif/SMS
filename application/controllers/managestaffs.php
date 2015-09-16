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
			
			$DependedSalaryHeadId='';
			$DependedArrayExpression='';
			$DependedSalaryCode='';
			$ArraySalaryStructureId='';
			$ListSalaryStructure='';
			
			
			$check1=$this->managestaff_model->getsalaryhead();
			foreach($check1 as $row1)
			{
				$SalaryHeadIdArray[]=$row1->SalaryHeadId;
				$SalaryHeadArray[]=$row1->SalaryHead;
				$CodeArray[]=$row1->Code;
				$SalaryHeadTypeArray[]=$row1->MasterEntryValue;
			}

			$check3=$this->managestaff_model->getsalarystructuredetail();
			foreach($check3 as $row3)
			{
				$ArraySalaryHeadId[]=$row3->SalaryHeadId;
				$ArrayExpression[]=$row3->Expression;
				$ArrayCode[]=$row3->Code;
				$ArraySalaryStructureId[]=$row3->SalaryStructureId;
			}

			
			$check2= $this->managestaff_model->getsalarystructuredetailstaff($staffid);
			$count2=count($check2);
			if($count2>0)
			{
				foreach($check2 as $row2)
				{
					unset($DependedSalaryHeadId);
					unset($DependedArrayExpression);
					unset($DependedSalaryCode);
					
					$ListSalaryStructureId=$row2->SalaryStructureId;
					$ListStaffSalaryId=$row2->StaffSalaryId;
					
					if($ArraySalaryStructureId!="")
					{
						$kk=0;
						foreach($ArraySalaryStructureId as $ArraySalaryStructureIdValue)
						{
							if($ArraySalaryStructureIdValue==$ListSalaryStructureId)
							{
								$DependedSalaryHeadId[]=$ArraySalaryHeadId[$kk];
								$DependedSalaryCode[]=$ArrayCode[$kk];
								$DependedArrayExpression[]=$ArrayExpression[$kk];
							}
							$kk++;
						}
					}
					
					$ListSalaryStructureName=$row2->SalaryStructureName;
					$ListFixedSalary=explode(",",$row2->FixedSalary);
					$ListRemarks=$row2->Remarks;
					foreach($ListFixedSalary as $ListFixedSalaryValue)
					{
						$SalaryIdWithAmount=explode("-",$ListFixedSalaryValue);
						$SalaryId=$SalaryIdWithAmount[0];
						$SalaryAmount=$SalaryIdWithAmount[1];
						$SearchFixedSalaryIndex=array_search($SalaryId,$SalaryHeadIdArray);
						$SalaryCode=$CodeArray[$SearchFixedSalaryIndex];
						
						$FinalSalaryCodeArray[]=$SalaryCode;
						$FinalSalaryIdArray[]=$SalaryId;
						$FinalSalaryAmountArray[]=$SalaryAmount;
					}
					
					$mmm=0;
					$DependedArrayExpression='';
					if($DependedArrayExpression!="")
					foreach($DependedArrayExpression as $DependedArrayExpressionValue)
					{
						$mm=0;
						foreach($FinalSalaryCodeArray as $FinalSalaryCodeArrayValue)
						{
							$SalaryInInt=$FinalSalaryAmountArray[$mm];
							$DependedArrayExpressionValue=str_replace($FinalSalaryCodeArrayValue, $SalaryInInt, $DependedArrayExpressionValue);
							$mm++;
						}
						$answer = eval( 'return ' . $DependedArrayExpressionValue . ';' );
						$DependedSalaryId=$DependedSalaryHeadId[$mmm];
						$DependedSalaryCodeC=$DependedSalaryCode[$mmm];
						$FinalSalaryCodeArray[]=$DependedSalaryCodeC;
						$FinalSalaryIdArray[]=$DependedSalaryId;
						$FinalSalaryAmountArray[]=$answer;
						$mmm++;
					}
					
					$p=0;
					$FixedSalaryString="";
					$TotalSalary=0;
					foreach($FinalSalaryIdArray as $FinalSalaryIdArrayValue)
					{
						$Index=array_search($FinalSalaryIdArrayValue,$SalaryHeadIdArray);
						$LastSalaryHead=$SalaryHeadArray[$Index];
						$LastSalaryCode=$CodeArray[$Index];
						$LastSalaryHeadType=$SalaryHeadTypeArray[$Index];
						$LastSalaryAmount=$FinalSalaryAmountArray[$p];
						if($LastSalaryHeadType=="Earning")
						{
							$FontColor="green";
							$TotalSalary+=$LastSalaryAmount;
						}
						else
						{
							$FontColor="red";
							$TotalSalary-=$LastSalaryAmount;
						}
						$p++;
						$FixedSalaryString.="<tr><td><font color=$FontColor>$LastSalaryHead ($LastSalaryCode)</font></td><td>$LastSalaryAmount INR</b></td></tr>";
						
						
					}
					$FixedSalaryString="<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" class=\"table table-small-font table-bordered table-striped\" width=\"100%\">
										<thead>
											<tr>
												<th>Salary Head</th>
												<th>Salary Amount</th>
											</tr>
										</thead>
										<tbody>$FixedSalaryString</tbody>
										<thead>
											<tr>
												<Th>Total</th>
												<Th>$TotalSalary INR</Th>
											</tr>
										</thead>
									</table>";
					
					unset($FinalSalaryCodeArray);
					unset($FinalSalaryIdArray);
					unset($FinalSalaryAmountArray);
					
					$ListStaffPaidLeave=$row2->StaffPaidLeave;
					$ListEffectiveFrom=date("d M Y",$row2->EffectiveFrom);
					$Delete="";
					$ListSalaryStructure.="<tr>
											<td>$ListSalaryStructureName</td>
											<td>$FixedSalaryString</Td>
											<td>$ListStaffPaidLeave</td>
											<td>$ListEffectiveFrom</td>
											<Td>$ListRemarks</td>
											<td>$Delete</td>
										</tr>";
										$this->data['ListSalaryStructure']=$ListSalaryStructure;
				}
				
			}
			
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
	
	/*ManageStaff Insert Staff   salary head start................................................................................................*/
	function insert_staffsalaryhead()
	{	
	if(Authority::checkAuthority('ManageStaff')==true){
			
		}else{
					$this->session->set_flashdata('category_error', " You Are Not Authorised To Access ");        
					redirect('dashboard');
		}
		if($this->input->post('staffid')){
			
			$SalaryStructureId=$this->input->post('salarytemplate');
			$PaidLeave=$this->input->post('paidleave');
			$EffectiveFrom=$this->input->post('dateofeffective');
			$StaffId=$this->input->post('staffid');
			$Remarks=$this->input->post('remarks');
			$EffectiveFrom=strtotime($EffectiveFrom);
			$Date=date("Y-m-d");
			$row=$this->managestaff_model->selectfixedsalarystructre($SalaryStructureId);
			
			$count=count($row);
			$FixedSalaryHeadArray=explode(",",$row[0]->FixedSalaryHead);
			foreach($FixedSalaryHeadArray as $FixedSalaryHeadArrayValue)
			{
				$FieldName="SalaryHead-$FixedSalaryHeadArrayValue";
				$Salary=$this->input->post($FieldName);
				if($Salary=="" || $Salary<0 || !is_numeric($Salary))
				$ErrorInSalary++;
				else
				$SalaryString[]="$FixedSalaryHeadArrayValue-$Salary";
			}
			$SalaryString=implode(",",$SalaryString);
			
			
			$row1=$this->managestaff_model->selectstaffdoj($StaffId);
			$count1=count($row1);
			$StaffDOJ=$row1[0]->StaffDOJ;
			
			if($SalaryStructureId=="" || $PaidLeave=="" || $EffectiveFrom=="" || $StaffId=="" || $SalaryString=="")
			{
				$this->session->set_flashdata('message_type', 'error');
				$this->session->set_flashdata('message', $this->config->item("managestaff").' All the fields are mandatory!!');
			}
			elseif($count==0)
			{
				$this->session->set_flashdata('message_type', 'error');
				$this->session->set_flashdata('message', $this->config->item("managestaff").' This is not a valid Salary Structure!!');
			}	
			elseif($StaffDOJ>$EffectiveFrom)
			{
				$this->session->set_flashdata('message_type', 'error');
				$this->session->set_flashdata('message', $this->config->item("managestaff")."Salary can't be effective before staff joining date!!");
			}	
			elseif($ErrorInSalary>0)
			{
				$this->session->set_flashdata('message_type', 'error');
				$this->session->set_flashdata('message', $this->config->item("managestaff")."$ErrorInSalary Salary are set in negative. Please set it greater than or equal to zero!!");
			}
			elseif($count1==0)
			{
				$this->session->set_flashdata('message_type', 'error');
				$this->session->set_flashdata('message', $this->config->item("managestaff").'This is not a valid Staff!!');
			}	
			elseif(!is_numeric($PaidLeave) || $PaidLeave<0)
			{
				$this->session->set_flashdata('message_type', 'error');
				$this->session->set_flashdata('message', $this->config->item("managestaff").' Paid leave should be numeric!!');
			}	
			else
			{
				$DOE=strtotime($Date);
				$this->managestaff_model->insert_staffsalaryhead($StaffId,$SalaryStructureId,$SalaryString,$PaidLeave,$EffectiveFrom,$DOE,$Remarks);
				$this->session->set_flashdata('message_type', 'success');
				$this->session->set_flashdata('message', $this->config->item("managestaff").' Salary structure saved successfully!!');
			}
		}
		
		redirect('managestaffs/managestaff/'.$this->input->post('staffid'));
	}
	 /*ManageStaff Insert salary head  End................................................................................................*/
	
	
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
