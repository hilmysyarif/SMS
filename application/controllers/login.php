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
		if($explode>1)
		{
			$addmission_detail=$this->data['addmission_detail']=$this->login_model->addmission_detail('admission',array('AdmissionNo'=>$explode[0]));
			if($addmission_detail)
			{
				if($explode[1]=='student')
				{
					$data=array(
									'RegistrationId'=>$addmission_detail[0]->RegistrationId,
									'StudentsPassword'=>$json_data->password
								);
				}
				if($explode[1]=='parents')
				{
					$data=array(
									'RegistrationId'=>$addmission_detail[0]->RegistrationId,
									'ParentsPassword'=>$json_data->password);
				}
				$registration_detail=$this->data['registration_detail']=$this->login_model->addmission_detail('registration',$data);
				if($registration_detail)
				{
					$data=array(
							'code'=>'200',
							'status'=>'success',
							'userType'=>'admin',
							'user_id'=>$addmission_detail[0]->AdmissionId,
							'usermailid'=>$registration_detail[0]->FatherName,// student/ parent must be changes depend on login id
					);
					print_r($data);die;
				}
				else 
				{
					echo 'error 1';// todo error message
				}
			}
			else 
			{
				echo 'error 2'; // todo error message
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
					{
						if(isset($row->UserType)&& $row->UserType!=='0')
						{
							$row=$this->login_model->userType($row->UserType);
						//	print_r($row[0]);die;
							$data=array(
									'status'=>'200',
									'result'=>'success',
									'userType'=>$row[0]->MasterEntryValue,
							);
							print_r($data);die;
						}
						if(isset($row->UserType)&& $row->UserType=='0')
						{
							$data=array(
								'status'=>'200',
								'result'=>'success',
								'userType'=>'admin',
							);
							print_r($data);die;
						}
					}
					$user_data = array(
							'usermailid' => $row->Username,
							'user_id' => $row->UserId,
							'UserType'=>$row->UserType,
					);
					$this->session->set_userdata('user_data',$user_data);
					$user_session_data = $this->session->userdata('user_data');
					redirect('dashboard');
				}
				else
				{
				if(isset($json_data->url)&&$json_data->url=='androide')
					{
						$data=array(
								'status'=>'400',
								'result'=>'Error',
						);
						print_r($data);die;
					}
					?>
					<!-- <style>
	#dialogoverlay{
		display: none;
		opacity: .8;
		position: fixed;
		top: 0px;
		left: 0px;
		background: #FFF;
		width: 100%;
		z-index: 10;
	}
	#dialogbox{
		display: none;
		position: fixed;
		background: #000;
		border-radius:7px; 
		width:550px;
		z-index: 10;
	}
	#dialogbox > div{ background:#FFF; margin:8px; }
	#dialogbox > div > #dialogboxhead{ background: #666; font-size:19px; padding:10px; color:#CCC; }
	#dialogbox > div > #dialogboxbody{ background:#333; padding:20px; color:#FFF; }
	#dialogbox > div > #dialogboxfoot{ background: #666; padding:10px; text-align:right; }
	</style>
	<body>				
	<div id="dialogoverlay"></div>
	<div id="dialogbox">
	  <div>
	    <div id="dialogboxhead"></div>
	    <div id="dialogboxbody"></div>
	    <div id="dialogboxfoot"></div>
	  </div>
	</div>
	</body>
					<script> 
					function CustomAlert(){
					   	    this.render = function(dialog){
					        var winW = window.innerWidth;
					        var winH = window.innerHeight;
					        var dialogoverlay = document.getElementById('dialogoverlay');
					        var dialogbox = document.getElementById('dialogbox');
					        dialogoverlay.style.display = "block";
					        dialogoverlay.style.height = winH+"px";
					        dialogbox.style.left = (winW/2) - (550 * .5)+"px";
					        dialogbox.style.top = "100px";
					        dialogbox.style.display = "block";
					        document.getElementById('dialogboxhead').innerHTML = "Acknowledge This Message";
					        document.getElementById('dialogboxbody').innerHTML = dialog;
					        document.getElementById('dialogboxfoot').innerHTML = '<button onclick="Alert.ok()">OK</button>';
					    }
						this.ok = function(){
							document.getElementById('dialogbox').style.display = "none";
							document.getElementById('dialogoverlay').style.display = "none";
						}
					}
					var Alert = new CustomAlert();
					 window.onload = Alert.render('user id and password does not exist.');
					 </script>--> <script> alert('User Id And Password Does Not Exist.');</script><?php 
					 redirect($json_data->url,'refresh');
				}
			}
		
			//$data=array(
						//'Username'=>$this->input->post('username'),
					//	'password'=>md5($this->input->post('passwd'))
					//	);	
		//	$db_name=$this->input->post('db_name');
			//$this->session->set_userdata('db_name',$db_name);
		//	$DB=$this->session->userdata('db_name');
			//if($DB){
				//echo $DB;
			//$db_name=$this->session->userdata('db_name');
			//$row=$this->login_model->login_check($data,$db_name);
			//print_r($row);die;
			/*if($row){ 
					$user_data = array(
											 'usermailid' => $row->Username,
											 'user_id' => $row->UserId,
											 'UserType' => $row->UserType
										  );
						$this->session->set_userdata('user_data',$user_data);
						$user_session_data = $this->session->userdata('user_data'); 
				//redirect('dashboard');
						echo "accesGrant";*/
						
						/*$db_name=$this->input->post('db_name');
						$this->session->set_userdata('db_name',$db_name);
						 $this->session->userdata('db_name');*/
	  
			//}
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
	

	/*Forget Password view.................................................................................*/
	public function forget_pwd()
	{
		$this->parser->parse('include/header',$this->data);
		$this->load->view('forget_pwd',$this->data);//login page view
		$this->parser->parse('include/footer',$this->data);
	}
	
	/* Forget Password function email.......................................................................*/
	public function forget_pwd_email()
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