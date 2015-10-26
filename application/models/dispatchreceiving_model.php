<?php
class Dispatchreceiving_model extends CI_Model
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
	
	function insert_call($data=false,$table=false,$filter=false)
	{
		if($filter !='')
		{
			$this->db->where($filter);
			$this->db->update($table,$data);
			//echo $this->db->last_query();die;
		}
		else
		{
			$this->db->insert($table,$data);
		}
	
	}
	
	
	function show_dispatch_list()
	{
		$filter=array('DRType'=>'dispatch');
		$qry=$this->db->get_where('drregister',$filter);
		return $qry->result();
	}
	
	
	
	function dispatch_up($data=false)
	{
		$this->db->select('*');
		$this->db->from('drregister');
		$this->db->where('Id',$data);
		$qry = $this->db->get();
		return $qry->result();
	}
	
	function delete_dispatch($id)
	{
		//print_r($id);die;
		$this->db->where('id',$id);
		$qry=$this->db->delete('drregister');
		 
	}
	
	function show_receiving_list()
	{
		$filter=array('DRType'=>'receiving');
		$qry=$this->db->get_where('drregister',$filter);
		return $qry->result();
	}
	
	function receiving_up($data=false)
	{
		$this->db->select('*');
		$this->db->from('drregister');
		$this->db->where('Id',$data);
		$qry = $this->db->get();
		return $qry->result();
	}
	
	function delete_receiving($id)
	{
		//print_r($id);die;
		$this->db->where('id',$id);
		$qry=$this->db->delete('drregister');
		
	}
	
}