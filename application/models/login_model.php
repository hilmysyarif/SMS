<?php
/* Model for login and sign up   */

class Login_model extends CI_Model 
{
	//variable initialize
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
    
    /* function for list of database name from central database */
    function list_dbname()
    {
    	$this->db->select('db_name');
    	$qry=$this->db->get('sw_registration');
    	return $qry->result();
    }     
    
    /* function for login check email id ragisterd or not   */
 function login_check($data=false,$db_name=false)
   {
   		$this->load->database('default',TRUE);
   		 $query = $this->db->get_where('user',$data);
		 
		  if($query->num_rows()>0)
		  {	
			   return $query->row();   
		  }
		  else
		  {
				return false;
		  }
   }
   
   
   	/* function for insert user data and if not already exist */
 function insert_sign()
   {
			$a= $this->input->post('usermailid');
			$this->db->where('usermailid',$a);
			$query = $this->db->get('ssr_t_users');
				if ($query->num_rows() > 0)
				{
					 return $query->Result();
				     redirect('login');
				}
				else
				{
					$data=array
						   (
						  'usermailid'=>  $this->input->post('usermailid'),
						  'password'=>  $this->input->post('password'),
						  'role_id'=>'block'
						   );
					$this->db->insert("ssr_t_users",$data);
				}
    }
    
    /*  function for insert change password  */
	function change($filter=false,$data=false,$table=false)
	{
			$this->db->where($filter);
			$this->db->update('ssr_t_users',$data);
	}
	
	/* function for new user create */
	function set_new_user($data,$db_name,$data_user)
	{
		//print_r($data['db_name']);die;
		//$central_db=$this->load->database('central_db', TRUE);
		//$qry=$central_db->insert('sw_registration',$data);
		$qry=$this->db->insert('sw_registration',$data);
		if($qry)
		{	
			
			$this->db->query("CREATE DATABASE $db_name");
			$exdb=mysqli_connect('localhost','root','',$db_name);
			$sqlSource = file_get_contents('school_mgt.sql');
			mysqli_multi_query($exdb,$sqlSource);
			do
				{
					mysqli_store_result($exdb);
				}
			while(mysqli_next_result($exdb));
			$qry="INSERT INTO `user`(`Username`, `Password`, `UserType`) VALUES ('".$data['username']."','".$data['password']."','masteruser')";
			$query=mysqli_query($exdb,$qry) or die(mysql_error());
			
		}
		return true;
	}
	
	/*	function for check organization	*/
	function check_org($val)
	{
		$qry=$this->db->get_where('sw_registration',array('organization_name'=>$val));
		return $qry->result();
	}
}