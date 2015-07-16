<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
	/**
	Developer : Rohit thakur
	Utilities : Utilities Class for customization function
	*/
	
class Utilities extends CI_Controller {

	public function __construct() 
	{
         # parent::__construct();
		$ci =& get_instance();
		$ci->load->model('mhome');
	 }
	 
	function get_balance()
	{
		$CI = & get_instance();
		$query=$CI->db->query("SELECT AccountBalance from `accounts` ");
		return $query->Result();
	}
	
	function get_language()
	{
		$CI = & get_instance();
		$query=$CI->db->query("SELECT LanguageName from `lang` ");
		return $query->Result();
	}
	
	function get_usertype($filter=false)
	{
		$CI = & get_instance();
		$CI->db->select('*');
		$query = $CI->db->get_where('masterentry',$filter);
		return $query->Result();
	}
	
	function get_masterval($table=false,$filter=false)
	{
		$CI = & get_instance();
		$CI->db->select('*');
		$query = $CI->db->get_where($table,$filter);
		return $query->Result();
	}
	
	function get_classval($table=false,$filter=false)
	{
		$CI = & get_instance();
		$query=$CI->db->query("select ClassName,SectionName from class,section where section.SectionId in(".$filter.") and section.SectionId=class.ClassId");
		return $query->Result();
	}
	
	
}



?>
