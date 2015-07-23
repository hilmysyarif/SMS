<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admission extends CI_Controller {

	
	 function __construct() {
		parent::__construct();
		
		$this->data[]="";
		$this->data['url'] = base_url();
		//$this->load->model('master_model');
		$this->load->library('parser');
		$this->load->library('utilities');
		$this->data['base_url']=base_url();
		$this->load->library('session');
		if (!$this->session->userdata('user_data')) show_error('Direct access is not allowed');
		$this->info= $this->session->userdata('user_data');
		
	 }
	 /*school management registration controller start.................................................................................................*/	
	function registration()
	{	
		
		//$this->data['school_info'] = $this->master_model->get_info('generalsetting');
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('registration',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management registration controller start...................................................................................................*/
	
	/*school management admission View Load.............................................................................................................*/
	function admission_student()
	{
	
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('admission',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management admission View Load..............................................................................................................*/
	
}