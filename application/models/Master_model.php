<?php
/* Model for Master entries   */

class Master_model extends CI_Model 
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
    
/* function show school info start...............................................................................  */
 function get_info($table=false,$filter=false)
   {	
		if($filter){
			$query = $this->db->get_where($table,$filter);
		return $query->Result();
		}
	    $query = $this->db->get_where($table);
		return $query->Result();
   }
 /* function show school info end.........................................................................  */ 
  
	
 /* function for insert_gen_setting...............................................................................  */
 function insert_gen_setting($table=false,$data=false,$filter=false)
   {
	     if($filter){
			$this->db->where($filter);
			$this->db->update($table,$data);
		} else {
			if ($this->db->field_exists('StaffId', $table))
    	{   return false;
			}else{
			$this->db->insert($table,$data);
			return true;
		}
		} 
   }
  /* function for insert_gen_setting end.........................................................................  */ 
  
/* function show school userinfo start..........................................................................  */
 function get_userinfo($table=false,$filter=false)
   {	
		$query=$this->db->query("SELECT * from user,masterentry,staff where 
				user.UserType=masterentry.MasterEntryId and
				user.StaffId=staff.StaffId and
				UserType!='0' 
				order by Username");
				return $query->Result();
   }
 /* function show school userinfo end.........................................................................  */ 

/* function show school selectstaff start.........................................................................  */
 function get_selectstaff($table=false,$filter=false)
   {	
		$query=$this->db->query("select StaffName,StaffId,StaffMobile,MasterEntryValue  from staff,masterentry where 
													StaffStatus='Active' and
													staff.StaffPosition=masterentry.MasterEntryId 
													order by MasterEntryValue,StaffName");
		return $query->Result();
   }
 /* function show school selectstaff end.........................................................................  */ 

 /* function show school account start..........................................................................  */
 function get_acc($table=false,$filter=false)
   {	
		$query=$this->db->query("SELECT * from ".$table." ");
		//echo $this->db->last_query();die;
				return $query->Result();
   }
 /* function show school account end.........................................................................  */ 

   /* function show school selectstaff start.........................................................................  */
   function get_scarea($table=false,$filter=false)
   {
   	$query=$this->db->query("select SCAreaName,SCAreaClass,SCAreaId,MasterEntryValue,GradingPoint from scarea,masterentry where 
						SCAreaStatus='Active' and
						scarea.SCPartId=masterentry.MasterEntryId 
						order by SCAreaName");
   	return $query->Result();
   }
   /* function show school selectstaff end.........................................................................  */

   /* function show school selectstaff start.........................................................................  */
   function get_fee($table=false,$filter=false)
   {
   	$query=$this->db->query("select MasterEntryValue,ClassName,SectionName,Amount,FeeId,Distance from fee,section,class,masterentry where 
		fee.SectionId=section.SectionId and
		section.ClassId=class.ClassId and 
		fee.FeeType=masterentry.MasterEntryId and 
		FeeStatus='Active' order by ClassName,SectionName");
   	return $query->Result();
   }
   /* function show school selectstaff end.........................................................................  */
     
   
   
  
}