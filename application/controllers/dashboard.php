<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
	 function __construct() {
		parent::__construct();
		
		$this->data[]="";
		$this->data['url'] = base_url();
		$this->load->model('mhome');
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
	 
/*school management dashboard start...............................................................................*/
	public function index()
	{ 	
		
	//	$this->breadcrumb->clear();
	//	$this->breadcrumb->add_crumb('Deshboard', base_url());

		
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/topheader',$this->data);
		$this->parser->parse('include/leftmenu',$this->data);
		$this->load->view('dashboard',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
/*school management dashboard End...............................................................................*/
	
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */