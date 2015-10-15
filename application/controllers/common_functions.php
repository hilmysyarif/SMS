<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_functions extends CI_Controller {

	 /*
	 # Programmer : Rohit thakur
	 # Common_functions controller.
	 */
	function __construct()
	{
		parent::__construct();
		$this->data = array();
		$this->load->library('parser');
		$this->load->library('utilities');
		$this->data['base_url']=base_url();
		$this->load->model('mhome');
		$this->load->library('session');
		$currentsession=$this->currentsession = $this->session->userdata('currentsession');
	}
	
	public function show_student()
	{
		$sec_id = $this->input->post('sec_id');
		$current_val = $this->input->post('current_value');
		$currentsession=$this->currentsession[0]->CurrentSession;
		$student_list = $this->utilities->get_student($sec_id,$currentsession);
		echo "<script type='text/javascript'>";
		echo"								jQuery(document).ready(function($)
										{
											$('#s2example-12').select2({
											placeholder: 'Select ...',
											allowClear: true
											}).on('select2-open', function()
											{
											
											$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
											});
										});";
		echo"</script>";
		echo "<select name='student' id='s2example-12' class='form-control' data-rule-required='true'  >
				<option value='' >Select</option> ";
		foreach($student_list as $ct)	
		{ 
			if($current_val==$ct->chap_id)
				echo "<option value='".$ct->AdmissionId."' selected >".$ct->StudentName." ".$ct->FatherName." ".$ct->Mobile."</option>";
			else
				echo "<option value='".$ct->AdmissionId."'  >".$ct->StudentName." ".$ct->FatherName." ".$ct->Mobile."</option>";
		}
		echo "</select>";	
	}
	
	public function show_subjectexam()
	{
		$sec_id = $this->input->post('sec_id');
		$current_val = $this->input->post('current_value');
		$currentsession=$this->currentsession[0]->CurrentSession;
		$subjectlist = $this->utilities->show_subject($sec_id,$currentsession);
		
		echo "<script type='text/javascript'>";
		echo"								jQuery(document).ready(function($)
										{
											$('#s2example-11').select2({
											placeholder: 'Select ...',
											allowClear: true
											}).on('select2-open', function()
											{
											
											$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
											});
										});";
		echo"</script>";
		echo "<select  name='subjectid1' id='s2example-11' class='form-control' data-rule-required='true'  >
				<option value='' >Select</option> ";
		foreach($subjectlist as $subjectlist)	
		{ 
			if($current_val==$subjectlist->chap_id)
				echo "<option value='".$subjectlist->SubjectId."' selected >".$subjectlist->SubjectName." </option>";
			else
				echo "<option value='".$subjectlist->SubjectId."'  >".$subjectlist->SubjectName."</option>";
		}
		echo "</select>";	
	}
	
	public function show_student_promo()
	{
		$sec_id = $this->input->post('sec_id');
		$current_val = $this->input->post('current_value');
		$currentsession=$this->currentsession[0]->CurrentSession;
		$student_list = $this->utilities->get_student($sec_id,$currentsession);
		echo "<select name='student[]' id='s2example-2' class='form-control' data-rule-required='true'  multiple>
				<option value='' >Select</option> ";
		foreach($student_list as $ct)	
		{ 
			if($current_val==$ct->chap_id)
				echo "<option value='".$ct->AdmissionId."' selected >".$ct->StudentName." ".$ct->FatherName." ".$ct->Mobile."</option>";
			else
				echo "<option value='".$ct->AdmissionId."'  >".$ct->StudentName." ".$ct->FatherName." ".$ct->Mobile."</option>";
		}
		echo "</select>";	
	}
	
	public function show_student_exam()
	{
		$sec_id = $this->input->post('sec_id');
		$current_val = $this->input->post('current_value');
		$currentsession=$this->currentsession[0]->CurrentSession;
		$student_list = $this->utilities->get_student($sec_id,$currentsession);
		
		echo "<script type='text/javascript'>";
		echo"								jQuery(document).ready(function($)
										{
											$('#s2example-12').select2({
											placeholder: 'Select ...',
											allowClear: true
											}).on('select2-open', function()
											{
											
											$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
											});
										});";
		echo"</script>";
		echo "<select required name='student' id='s2example-12' class='form-control' data-rule-required='true' >
				<option value='' >Select</option> ";
		foreach($student_list as $ct)	
		{ 
			if($current_val==$ct->chap_id)
				echo "<option value='".$ct->AdmissionId."' selected >".$ct->StudentName." ".$ct->FatherName." ".$ct->Mobile."</option>";
			else
				echo "<option value='".$ct->AdmissionId."'  >".$ct->StudentName." ".$ct->FatherName." ".$ct->Mobile."</option>";
		}
		echo "</select>";	
	}
	
	public function show_subject()
	{
		$sec_id = $this->input->post('sec_id');
		$current_val = $this->input->post('current_value');
		$currentsession=$this->currentsession[0]->CurrentSession;
		$subjectlist = $this->utilities->show_subject($sec_id,$currentsession);
		
		echo "<script type='text/javascript'>";
		echo"								jQuery(document).ready(function($)
										{
											$('#s2example-11').select2({
											placeholder: 'Select ...',
											allowClear: true
											}).on('select2-open', function()
											{
											
											$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
											});
										});";
		echo"</script>";
		echo "<select required name='subjectid1' id='s2example-11' class='form-control' data-rule-required='true'  >
				<option value='' >Select</option> ";
		foreach($subjectlist as $subjectlist)	
		{ 
			if($current_val==$subjectlist->chap_id)
				echo "<option value='".$subjectlist->SubjectId."' selected >".$subjectlist->SubjectName." </option>";
			else
				echo "<option value='".$subjectlist->SubjectId."'  >".$subjectlist->SubjectName."</option>";
		}
		echo "</select>";	
	}
	
	public function show_fee()
	{
		$sec_id = $this->input->post('sec_id');
		$current_val = $this->input->post('current_value');
		$currentsession=$this->currentsession[0]->CurrentSession;
		$fee_list = $this->utilities->get_fee($sec_id,$currentsession);
		
		foreach($fee_list as $ct)
		{	
			echo"<div class='form-group'>";
			echo"<label class='control-label col-sm-4'>".$ct->MasterEntryValue."</label>";
			echo"<div class='col-sm-8'>";
			echo "<input type='text' value='".$ct->Amount."' name='".$ct->MasterEntryValue."' class='form-control' >";
			echo "<input type='hidden' value='".$ct->Amount."-".$ct->MasterEntryId."' name='feearray[]' class='form-control' >";
			echo"</div>";
			echo"</div>";
		}
	
	}
	
	public function show_nextclass()
	{
		
		$next_session = $this->input->post('next_session');
		$currentsession=$this->currentsession[0]->CurrentSession;
		$nextclass = $this->utilities->getmext_class($next_session);
		echo "<select name='nextclass' id='s2example-3' class='form-control' data-rule-required='true'  >
				<option value='' >Select</option> ";
		foreach($nextclass as $ct)	
		{ 
			if($next_session==$ct->chap_id)
				echo "<option value='".$ct->SectionId."' selected >".$ct->ClassName." ".$ct->SectionName." </option>";
			else
				echo "<option value='".$ct->SectionId."'  >".$ct->ClassName." ".$ct->SectionName."</option>";
		}
		echo "</select>";	
		echo "<span for='select'  class='help-block'>This field is required.</span>";	
	
	}
	
	public function addfeelist()
	{ 	
		$SectionId = $this->input->post('sectionid');
		$AdmissionId = $this->input->post('admissionid');
		$FeeType = $this->input->post('feetype');
		$Amount = $this->input->post('amount');
		$CURRENTSESSION=$this->currentsession[0]->CurrentSession;
		$this->data['token']=$Token=bin2hex(mcrypt_create_iv(10, MCRYPT_DEV_RANDOM));
		$TotalFeeTypeAmount='';
		
		  $checkfeeadded = $this->utilities->checkfeeadded($Token,$FeeType);
		  $count1=count($checkfeeadded);
		  
		  $row2 = $this->utilities->selectfeestructure($CURRENTSESSION,$AdmissionId,$SectionId);
		
		  if(!empty($row2)){
		  $FeeStructure=explode(",",$row2[0]->FeeStructure);
		  foreach($FeeStructure as $FeeStructureValue)
		  {
			$FeeStructureSubArray=explode("-",$FeeStructureValue);
			$FeeTypeValue=$FeeStructureSubArray[0];
			$FeeAmountValue=$FeeStructureSubArray[1];
			if($FeeTypeValue==$FeeType)
			$TotalFeeTypeAmount=$FeeAmountValue;
		  }
		  
		
			 $row3 = $this->utilities->selectfeepayment($AdmissionId,$CURRENTSESSION,$FeeType);
			 
			if(!empty($row3)){
			$PaidFeeType=$row3[0]->PaidFeeType;
			$PaidFeeName=$row3[0]->FeeName;
			$TotalFeeTypeAmount-=$PaidFeeType;
			}
		  }
		  if($Token=="" || $FeeType=="" || $Amount==""){
			echo "<div class=\"alert alert-danger\">All the fields are mandatory!!</div>";
		  }elseif(!is_numeric($Amount) || $Amount<=0){
			echo "<div class=\"alert alert-danger\">Amount should be numeric!!</div>";
		  }elseif($count1>0){
			echo "<div class=\"alert alert-danger\">This fee type is already added!!</div>";
		  }else
		  {
			$this->utilities->insertpayment($Token,$FeeType,$Amount,'Pending');
			echo "<div class=\"alert alert-success\">fee added successfully!!</div>";
		   }
	
			$result = $this->utilities->getpaymentpending($Token);
		
		
		    echo   "<table class='table table-bordered table-striped' id='example-5'>";
		    echo   "<thead>";
			echo   "<tr>";
			echo   "<th>Fee Type</th>";
			echo   "<th>Amount</th>";
			echo   "<th><span class='fa fa-times'></span></th>";
			echo   "</tr>";
			echo   "</thead>";
			echo   "<tbody>";
				
			foreach($result as $row )
			{
			
			echo  "<tr>";
			echo  "<td>$row->MasterEntryValue </td>";
			echo  "<td>$row->Amount</td>";
			echo  "<td><a href='javascript:;' class='delete'><span class='fa fa-times'></span></a></td>";
			echo  "</tr>";
		
			}
			
		echo "</tbody>";
		echo "</table>";
		echo "<input type='hidden' value='".$Token."' name='token' class='form-control' >";
	 }
	 
	 
	 public function showfixedsalaryhead()
	{
		
		$id = $this->input->post('id');
		$currentsession=$this->currentsession[0]->CurrentSession;
		
		$check1 = $this->utilities->selectsalaryhead();
		

			foreach($check1 as $row1 )
			{
				$SalaryHeadIdArray[]=$row1->SalaryHeadId;
				$SalaryHeadArray[]=$row1->SalaryHead;
				$CodeArray[]=$row1->Code;
				$SalaryHeadTypeArray[]=$row1->MasterEntryValue;
			}
				
			$row = $this->utilities->fixedsalaryhead($id);
			
			$FixedSalaryHeadArray=explode(",",$row[0]->FixedSalaryHead);
			foreach($FixedSalaryHeadArray as $FixedSalaryHeadArrayValue)
			{
				$FieldName="SalaryHead-$FixedSalaryHeadArrayValue";
				$SearchIndex=array_search($FixedSalaryHeadArrayValue,$SalaryHeadIdArray);
				$SalaryHead=$SalaryHeadArray[$SearchIndex];
				echo "<div class='form-group'>
							<label class=\"control-label col-sm-4\" for=\"field-1\">$SalaryHead</label>
							<div class=\"col-sm-8\">
									<input  class=\"form-control\" type=\"number\" name=\"$FieldName\" id=\"field-1\" required />
								</div>
						</div>";
			}
		
		
		
	}
	 
	 
}	
?>
