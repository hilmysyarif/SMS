<?php
class User_management_model extends CI_Model{
	
    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
    	// Call the Model constructor
    	parent::__construct();
    	
    	//Load database connection
    	$this->load->database();
    }
    
    function clone_db($database_name=false,$data=false)
    {
    	$this->db->query('CREATE DATABASE '.$database_name);
    	if($_SERVER['HTTP_HOST']=="localhost"){
    		//$dbname=$database_name;
    		$password="";
    		$username="root";
    	}
    	if($_SERVER['HTTP_HOST']=="junctiondev.cloudapp.net"){
    		//$dbname=$database_name;
    		$password="bitnami";
    		$username="root";
    	}
    	if($_SERVER['HTTP_HOST']=="junctiontech.in"){
    		//$dbname=$database_name;
    		$password="junction4$";
    		$username="junctwhx";
    	}
    	$connect=mysqli_connect('localhost',$username,$password,$database_name);
    	$db_file=file_get_contents('school_mgt.sql');
    	mysqli_multi_query($connect, $db_file);
    	do {
    			mysqli_store_result($connect);
    	   }
    	   while(mysqli_more_results($connect) && mysqli_next_result($connect));
    	  return true;
    }
   
    function set_user($data=false)
    {
    	$this->load->database('default',TRUE);
    	$qry=	$this->db->insert('user',$data);
   	   	return true;
    }
    
    function update_pwd_admin_user($data=false,$filter=false)
    {
    	$this->load->database('default',TRUE);
    	$this->db->where('Username',$filter);
    	$qry=	$this->db->update('user',$data);
    	return true;
    	
    	//$connect=mysqli_connect('localhost','root','',$db_name);
    	//$sql="UPDATE user SET Username='".$data['Username']."', Password='".$data['Password']."' WHERE Username='".$data['old_username']."' ";
    	//$query=mysqli_query($connect,$sql);
    	//$data=mysqli_fetch_array($query);
    	//echo $data;die;
    	//return true;
    }
    
    function get_db_size($db_name=false)
    {
    	$connect=mysqli_connect('localhost','root','',$db_name);
    	$qry="SELECT table_schema $db_name, sum( data_length + index_length ) / 1024 / 1024 'db_size_in_mb' FROM information_schema.TABLES GROUP BY table_schema ";
    	$query=mysqli_query($connect,$qry);
    	$data=mysqli_fetch_array($query);
    	return $data; 
    }
}