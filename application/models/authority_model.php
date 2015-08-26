<?php

class Authority_model extends CI_Model 
{
 
    function __construct() 
	{
        parent::__construct();
		$this->load->database();
    }
 
	function list_permision($role)
	{
		$this->db->select('*');
		$this->db->where('UserType',$role);
		$qry=$this->db->get('permission');
		if($qry->num_rows()>0)
		{
		  return $qry->result(); 
		}
		else
		{
			return false;
		}
	}
	
	function checkpage($var)
	{
		$this->db->select('*');
		$this->db->where('PageNameId',$var);
		$qry=$this->db->get('pagename');
		if($qry->num_rows()>0)
		{
		  return $qry->result(); 
		}
		else
		{
			return false;
		}
	}
	
}
//~~End~~