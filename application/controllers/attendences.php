<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Attendences extends CI_Controller {

	
	 function __construct() {
		parent::__construct();
		
		$this->data[]="";
		$this->data['url'] = base_url();
		$this->load->model('attendence_model');
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

	 
	
	/*school management Staff Attendence View Load.....................................................................................................*/
	function staffattendence()
	{
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('staffattendence',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management Staff Attendence View Load..............................................................................................................*/
	
	/*school management staff Attendance report View Load.............................................................................................................*/
	function staffattendancereport()
	{
	
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('staffattendencereport',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management staff Attendance report View Load..............................................................................................................*/
	
	/*school management Student Attendence View Load.............................................................................................................*/
	function studentattendence()
	{
	
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('studentattendence',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management Student Attendence View Load..............................................................................................................*/
	
	/*school management Student Attendance report View Load.............................................................................................................*/
	function studentattendancereport()
	{
	
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('studentattendencereport',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management Student Attendance report View Load..............................................................................................................*/

}
