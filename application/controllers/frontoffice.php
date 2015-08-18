<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontoffice extends CI_Controller {

	
	 function __construct() {
		parent::__construct();
		
		$this->data[]="";
		$this->data['url'] = base_url();
		$this->load->model('exam_model');
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
function call()
	{
		//$this->data['class'] = $this->exam_model->get_report_class($this->currentsession[0]->CurrentSession);
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('call',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	 /*Front office call view load End................................................................................................*/
	
/*Front office Another call view load start................................................................................................*/
function ocall()
	{
		//$this->data['class'] = $this->exam_model->get_report_class($this->currentsession[0]->CurrentSession);
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
		//$this->data['class'] = $this->exam_model->get_report_class($this->currentsession[0]->CurrentSession);
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
		//$this->data['class'] = $this->exam_model->get_report_class($this->currentsession[0]->CurrentSession);
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
		//$this->data['class'] = $this->exam_model->get_report_class($this->currentsession[0]->CurrentSession);
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('visitor',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*Front office Visitor view load End................................................................................................*/
		
	
}
