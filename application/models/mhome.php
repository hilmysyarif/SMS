<?php 
//Model Class for competition start
class Mhome extends CI_Model {
	
	 /**
	 # Programmer : Rohit
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
    
	
	/*Get current session start*/
    function get_session()
    {
    	$query=$this->db->query("SELECT CurrentSession,SchoolName,SchoolStartDate from generalsetting ");
		//echo $this->db->last_query();die;
		return $query->Result();
	
    }
	/*Get current session end*/

	
	
	
}
//Model Class for department end
?>
