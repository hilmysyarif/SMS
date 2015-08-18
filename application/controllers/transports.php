<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transports extends CI_Controller {

	
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
/*Transports transport view load start................................................................................................*/
function transport()
	{
		//$this->data['class'] = $this->exam_model->get_report_class($this->currentsession[0]->CurrentSession);
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('transport',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*Transports transport view load End................................................................................................*/
	
/*Transports route view load start................................................................................................*/
function route()
	{
		//$this->data['class'] = $this->exam_model->get_report_class($this->currentsession[0]->CurrentSession);
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('route',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*Transports Route view load End................................................................................................*/

	
		
	
}
