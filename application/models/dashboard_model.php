<?php 
//Model Class for competition start
class Dashboard_model extends CI_Model {
	
	 /**
	 # Programmer : Rohit
	 
	 
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
    
	
	/*Get admission report for pie chart start*/
    function getstudentreport($CURRENTSESSION=false)
    {
    	$query=$this->db->query("select COUNT(AdmissionId) as TotalStudent,ClassName from studentfee,class,section where
						studentfee.Session='$CURRENTSESSION' and
						studentfee.SectionId=section.SectionId and
						section.ClassId=class.ClassId
						group by studentfee.SectionId");
		
		return $query->Result();
	
    }
	/*Get admission report for pie chart end*/
	
	   function getincomereportchart($RETS=false,$TSTS=false)
    {
    	$query=$this->db->query("Select SUM(TransactionAmount) as TotalIncome,TransactionDate from transaction where
						TransactionStatus='Active' and
						TransactionType='1' and
						TransactionDate>='$RETS' and
						TransactionDate<='$TSTS' 
						group by TransactionDate");
		
		return $query->Result();
	
    }
	
	
	   function getexpensereportchart($RETS=false,$TSTS=false)
    {
    	$query=$this->db->query("Select SUM(TransactionAmount) as TotalExpense,TransactionDate from transaction where
						TransactionStatus='Active' and
						TransactionType='0' and
						TransactionDate>='$RETS' and
						TransactionDate<='$TSTS' 
						group by TransactionDate ");
		
		return $query->Result();
	
    }
	
	 function getcalendarevent($USERNAME=false)
    {
    	$query=$this->db->query("select Title,StartTime,EndTime,Color from calendar where Username !='' and CalendarStatus='Active' ");
		//echo $this->db->last_query();die;
		return $query->Result();
	
    }
	
	
	
}

?>
