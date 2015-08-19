<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Managestaffs extends CI_Controller {

	
	 function __construct() {
		parent::__construct();
		
		$this->data[]="";
		$this->data['url'] = base_url();
		$this->load->model('managestaff_model');
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

	 
	
	/*school managementManageStaff Load.............................................................................................................*/
	function managestaff()
	{
		$this->breadcrumb->clear();
		$this->breadcrumb->add_crumb('Manage Staff', base_url().'managestaffs/managestaff');
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('managestaff',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management ManageStaff Load..............................................................................................................*/

}
