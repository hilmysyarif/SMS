<?php
class Exam_model extends CI_Model
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
	
	function get_class_info($table=false)
	{
			$qry = $this->db->query("select SectionId,SectionName,ClassName from section,class where 
			class.ClassId=section.ClassId and 
			class.ClassStatus='Active' and section.SectionStatus='Active'
						 order by ClassName ");	
			return $qry->Result();	
	}
	 
}