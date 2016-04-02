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
	public function index($db_name=false)
	{
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/loginheader',$this->data);
		$this->parser->parse('login',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	/*school management login page end...............................................................................*/
	
	/* Function for login and create session ........................................................................*/	
function login_user($info=false)
	{	
		$json= $_GET['json'];  
		$json_data=json_decode($json);
		$this->session->set_userdata('url',$json_data->url);
		$this->session->set_userdata('db_name',$json_data->database_name);
		$this->session->userdata('db_name');
		$explode=explode("@",$json_data->username);
		if(count($explode)>= 2 )
		{  
			$addmission_detail=$this->data['addmission_detail']=$this->login_model->addmission_detail('admission',array('AdmissionNo'=>$explode[0]));
			if($addmission_detail)
			{
				if($explode[1]=='student')
					{
						$data=array(
										'RegistrationId'=>$addmission_detail->RegistrationId,
										'StudentsPassword'=>$json_data->password
									);
					}
					if($explode[1]=='parents')
					{
						$data=array(
										'RegistrationId'=>$addmission_detail->RegistrationId,
										'ParentsPassword'=>$json_data->password);
					}
					$registration_detail=$this->data['registration_detail']=$this->login_model->addmission_detail('registration',$data);
					if($registration_detail)
					{	
						if($explode[1]=='parents'){ $UserName=$registration_detail->FatherName;  $UserType=1; }else { $UserName=$registration_detail->StudentName; $UserType=2; }
						if(isset($json_data->url)&&$json_data->url=='androide')
						{
							$data=array( 
									'code'=>'200',
									'status'=>'success', 
									'userType'=>$explode[1],
									'user_id'=>$addmission_detail->AdmissionId,
									'usermailid'=>$UserName,// student/ parent must be changes depend on login id
							);
							
							echo json_encode($data);die;
						} 
						$user_data=array(
								'UserType'=>$UserType,
								'user_id'=>$addmission_detail->AdmissionId,
								'usermailid'=>$UserName,// student/ parent must be changes depend on login id
						);
						$this->session->set_userdata('user_data',$user_data);
						$user_session_data = $this->session->userdata('user_data');
						redirect('dashboard/agreement');
					}
					else 
					{
						if(isset($json_data->url)&&$json_data->url=='androide')
						{
							$data=array(
									'code'=>'400',
									'status'=>'error',
									'result'=>'user id does not exist',
							);
							
							echo json_encode($data);die;
						}
						?>
						 <script> alert('User Id And Password Does Not Exist.');</script><?php 
						 redirect($json_data->url,'refresh');
					}
					
				
			}
			else 
			{
				if(isset($json_data->url)&&$json_data->url=='androide')
				{
						$data=array(
									'code'=>'400',
									'status'=>'error',
									'result'=>'user id does not exist',
							);
							
							echo json_encode($data);die;
				}
					?>
					 <script> alert('User Id And Password Does Not Exist.');</script><?php 
					 redirect($json_data->url,'refresh');
			}
		}
		
		else
		{
			if($json_data->database_name && $json_data->username && $json_data->password)
			{
				$data=array(
						'Username'=>$json_data->username,
						'password'=>$json_data->password
				);
				$row=$this->login_model->login_check($data);
				if($row){   
					if(isset($json_data->url)&&$json_data->url=='androide')
					{	$staffid=$row->StaffId;
						
						if(isset($row->UserType)&& $row->UserType!=='0')
						{
							$row=$this->login_model->userType($row->UserType);
						//	print_r($row[0]);die;
							$data=array(
									'code'=>'200',
									'status'=>'success',
									'userType'=>$row[0]->MasterEntryValue,
									'staffId'=>$staffid,
							);
							echo json_encode($data);die;
							
							$user_data = array(
							'usermailid' => $row->Username,
							'user_id' => $row->UserId,
							'UserType'=>$row->UserType,
					);
					$this->session->set_userdata('user_data',$user_data);
					$user_session_data = $this->session->userdata('user_data');
					redirect('dashboard/agreement');
						}
						if(isset($row->UserType)&& $row->UserType=='0')
						{
							$data=array(
								'code'=>'200',
								'status'=>'success',
								'userType'=>'admin',
							);
							echo json_encode($data);die; 
					
					$user_data = array(
							'usermailid' => $row->Username,
							'user_id' => $row->UserId,
							'UserType'=>$row->UserType,
					);
					$this->session->set_userdata('user_data',$user_data);
					$user_session_data = $this->session->userdata('user_data');
					redirect('dashboard');
				}
			}
		}
				else
				{
				if(isset($json_data->url)&&$json_data->url=='androide')
					{
						$data=array(
								'code'=>'400',
								'status'=>'error',
						);
						print_r($data);die;
					}
					?>
					 <script> alert('User Id And Password Does Not Exist.');</script><?php 
					 redirect($json_data->url,'refresh');
				}
			}
		
			else{	
				}
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
	

	/*Forget Password view.................................................................................*/
	function forget_pwd()
	{
		$this->parser->parse('include/header',$this->data);
		$this->load->view('forget_pwd',$this->data);//login page view
		$this->parser->parse('include/footer',$this->data);
	}
	
	/* Forget Password function email.......................................................................*/
	function forget_pwd_email()
	{
		 
		$email=$this->input->post('usermailid');
		if($email)
		{
			$forget_pwd_email= $this->data['forget_pwd_email']=  $this->login_model->forget_pwd_email($email);
			$user_id= $forget_pwd_email[0]->user_id;
			$password=$forget_pwd_email[0]->password;
			$this->email->to($email);
			$this->email->from('info@junctiontech.in','Junction Software Pvt Ltd');
			$this->email->subject('Junction ERP :- Forget Password');
			$message= " Dear User
                             user Id:- " .$user_id. " ,
                             Password:- " .$password. " ,
                          Please Click In This Link And Login Your Account  :)
                          http://junctionerp.com/login/login_view   ";
			$this->email->message($message);
			$this->email->send();
			$this->session->set_flashdata('category_success','success message');
			$this->session->set_flashdata('message',$this->config->item('user').'Kindly Check Your Registeres Email');
			redirect('login/login_view');
		}
	}
	
	/* Forget Password function email End......................................................................*/
	
	/*Logout function start...................................................................................*/
	function logout()
	{
		$url=$this->session->userdata('url');
		$user_session_data=	$this->session->userdata('user_data');
		$unset_userdata=$this->session->unset_userdata($user_session_data);
		$user_session_data=	$this->session->userdata('db_name');
		$unset_userdata=$this->session->unset_userdata($user_session_data);
		$this->session->sess_destroy();
		//$i=1;
		//if($b)
		//{
		redirect($url);
		//}
	
	}

	/*Logout function start...................................................................................*/
	
	}

	/* End of login controller */