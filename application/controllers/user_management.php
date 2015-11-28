<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_management extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->data[]='';
		$this->data['url']=base_url();
		$this->data['base_url']=base_url();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('user_management_model');
	}
	
	function clone_db()
	{
		$json_data=$_GET['data'];
		$var=json_decode($json_data);
		$database_name=$var->db_name;
		$this->session->set_userdata('db_name',$database_name);
		$this->session->userdata('db_name');
		$json_data=$_GET['data'];	
		$set_user=$this->data['set_user']=$this->user_management_model->clone_db($database_name);
		redirect('user_management/set_user?data='.$json_data);
	}
	
	function set_user($json_data=false)
	{
		$json_data=$_GET['data'];
		$var=json_decode($json_data);
		$data=array(
					'Username'=>$var->application_admin_username,
					'Password'=>md5($var->application_admin_password),
					'UserType'=>$var->UserType
				   );
		$status=$this->user_management_model->set_user($data,$var->db_name);
		if($status)
		{
			$data=array(
							'organization_id'=>$var->organization_id,
							'registration_id'=>$var->registration_id,
							'organization_name'=>$var->organization_name,
							'organization_admin_email'=>$var->organization_admin_email,
							'organization_admin_UserName'=>$var->organization_admin_UserName,
							'organization_admin_password'=>$var->organization_admin_password,
							'organization_admin_mobile'=>$var->organization_admin_mobile,
							'application_admin_email'=>$var->application_admin_email,
							'application_admin_username'=>$var->application_admin_username,
							'application_admin_password'=>$var->application_admin_password,
							'application_admin_mobile'=>$var->application_admin_mobile,
							'database_name'=>$var->db_name,
							'code'=>'200',
						);
			$database_name=$this->session->userdata('db_name');
			$this->session->unset_userdata($database_name);
			$this->session->sess_destroy();
			$datas=json_encode($data);
			redirect('http://junctiondev.cloudapp.net/appmanager/login/result_application?json='.$datas);
		}		
		else
		{
			redirect('http://junctiondev.cloudapp.net/appmanager/login/application_login?id=login');
		}
	}
	
	function update_pwd_admin_user()
	{
		$json_data=$_GET['data'];
		$var=json_decode($json_data);
		$database_name=$var->db_name;
		$this->session->set_userdata('db_name',$database_name);
		$this->session->userdata('db_name');
		$data=array(
				'Username'=>$var->new_username,
				'Password'=>$var->password,
		);
		$status=$this->user_management_model->update_pwd_admin_user($data,$var->old_username);
	redirect('http://junctiondev.cloudapp.net/appmanager/admin_panel/manage_admin?session='.$var->session);
	}
	
	function get_db_size()
	{ 
		$this->session->set_userdata('username','admin');
		echo $this->session->userdata('username');
		$db_name=$_GET['db_name'];
		$get_db_size=$this->data['get_db_size']=$this->user_management_model->get_db_size($db_name);
		//print_r($get_db_size);die;
		redirect('http://junctionerp.com/manage/admin_panel/report?size='.$get_db_size['db_size_in_mb']);
	}
	
	function delete_function()
	{
		$json_data=$_GET['data'];
		$var=json_decode($json_data);
		$database_name=$var->db_name;
		$this->session->set_userdata('db_name',$database_name);
		$delete_function=$this->data['delete_function']=$this->user_management_model->delete_function($database_name);
		$data=array(
				'status'=>'success',
				'reg_app_id'=>$var->reg_app_id,
					);
		$json=json_encode($data);
		redirect('http://junctiondev.cloudapp.net/appmanager/admin_panel/delete_app_org?json='.$json);
	}
}