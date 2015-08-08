<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exam extends CI_Controller {

	
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

	 
	
	/*school management Scholastic Grade Load.............................................................................................................*/
	function markssetup()
	{
	
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('markssetup',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management Scholastic Grade Load..............................................................................................................*/
	
	/*school management Scholastic Grade Load.............................................................................................................*/
	function scmarkssetup()
	{
	
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('scmarkssetup',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management Scholastic Grade Load..............................................................................................................*/
	
	/*school management ExamReport Load.............................................................................................................*/
	function examreport()
	{
	
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('examreport',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management Exam Report Load..............................................................................................................*/
	
}
