<?php 
//Model Class for competition start
class Mhome extends CI_Model {
	
	 /**
	 # Programmer : Garima
	 # Mhome Model
	 
	 */
	 
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
    
	
	/*Get department details start*/
    function get_list($filter=false,$table=false)
    {
		
		
		$query = $this->db->get_where($table, $filter);
		//echo $this->db->last_query();die;
		return $query->Result();
	
    }
	/*Get department details end*/

	
	
	
}
//Model Class for department end
?>
