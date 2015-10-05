<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* Controller for login Functionality */
class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->data[]="";
		$this->data['user_data']="";
		$this->data['url'] = base_url();
		$this->load->model('login_model');
		$this->load->library('parser');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->data['base_url']=base_url();
		$this->load->library('session');
	}
	
	/*school management login page start...............................................................................*/
	public function index()
	{
		
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/loginheader',$this->data);
		$this->parser->parse('login',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management login page end...............................................................................*/
	
	/* Function for login and create session .......................................................................*/	
	function login_user($info=false)
	{	
			$data=array(
						'Username'=>$this->input->post('username'),
						'password'=>md5($this->input->post('passwd'))
						);		
			$row=$this->login_model->login_check('user',$data);
			
			if($row){ 
						$user_data = array(
											 'usermailid' => $row->Username,
											 'user_id' => $row->UserId,
											 'UserType' => $row->UserType
										  );
						$this->session->set_userdata('user_data',$user_data);
						$user_session_data = $this->session->userdata('user_data');
						echo "accesGrant";
						
						$db_name=$this->input->post('db_name');
						$this->session->set_userdata('db_name',$db_name);
						 $this->session->userdata('db_name');
					}
			else{	
				}
	}
	/* Function for login and create session end.......................................................................*/	
		
	/* Function for sign up for new user.................................................................................. */
	function sign_up()
	{
		$a = $this->input->post('usermailid');
		$q = $this->login_model->insert_sign('ssr_t_users',$a);
	    if($q)
			{
				$this->session->set_flashdata('category_error', 'Error message');  
				$this->session->set_flashdata('message',$this->config->item("user").'Email id already exist'); 
				$this->session->$a;
				  redirect('login');
			}
		else
		   {
				$this->session->set_flashdata('category_success', 'success message	');        
				$this->session->set_flashdata('message', $this->config->item("user").' You Are Successfully Signup. Kindly Login');
				redirect('login');
		   }
		
	}
	
	
	/*Logout function start...................................................................................*/
	function logout()
	{
		$user_session_data=	$this->session->userdata('user_data');
		$unset_userdata=$this->session->unset_userdata($user_session_data);
										$this->session->sess_destroy();
									redirect('login');
	
	}

	/*Logout function start...................................................................................*/
	
	}


	/* End of login controller */