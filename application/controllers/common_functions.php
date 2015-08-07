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
		echo "<select name='student' id='s2example-2' class='form-control' data-rule-required='true'  >
				<option value='' >Select</option> ";
		foreach($student_list as $ct)	
		{ 
			if($current_val==$ct->chap_id)
				echo "<option value='".$ct->AdmissionId."' selected >".$ct->StudentName." ".$ct->FatherName." ".$ct->Mobile."</option>";
			else
				echo "<option value='".$ct->AdmissionId."'  >".$ct->StudentName." ".$ct->FatherName." ".$ct->Mobile."</option>";
		}
		echo "</select>";	
		echo "<span for='select'  class='help-block'>This field is required.</span>";	
	
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
			echo"</div>";
			echo"</div>";
		}
	
	}
	

}	
?>
