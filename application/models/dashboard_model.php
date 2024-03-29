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
	
	function checkpermission($userid=false)
    {
    	$query=$this->db->query("select PermissionString from  permission where
						UserType='$userid'");
		return $query->Result();
	
    }
	function getpagename($pageid=false)
    {
    	$query=$this->db->query("select PageName from pagename where
						PageNameId='$pageid'");
		return $query->Result();
	
    }
	
	function insert($table=false,$data=false)
	{
		$this->db->insert($table,$data);
		$last_id = $this->db->insert_id();
		return $last_id;
	}
	function agreement($checkid=false)
	{ 
		$query=$this->db->query("select Pterms from registration,admission where Pterms='Accepted' and admission.AdmissionId='$checkid'
										and registration.RegistrationId=admission.RegistrationId");
			
		return $query->Result();
	
	}
	function agreement1($checkid=false)
	{ 
		$query=$this->db->query("select Sterms from registration,admission where Sterms='Accepted' and admission.AdmissionId='$checkid'
										and registration.RegistrationId=admission.RegistrationId");
			
		return $query->Result();
	
	}
	 function staff_agreement($checkid=false)
	{ 
		$query=$this->db->query("select Staff_terms from user where Staff_terms='Accepted' and UserId='$checkid'");	
		return $query->Result();
	
	} 
	
		function generalsetting()
    {
    	$query=$this->db->query("select terms from generalsetting where Terms='Accepted'");
		return $query->Result();
	
    }

	
   function update_parentterms($checkid=false)
   {
  	$query=$this->db->query("Update registration,admission set Pterms='Accepted' where admission.AdmissionId='$checkid'
										and registration.RegistrationId=admission.RegistrationId");
   }
	
	
	
   function update_studentterms($checkid=false)
   {
  	$query=$this->db->query("Update registration,admission set Sterms='Accepted' where admission.AdmissionId='$checkid'
										and registration.RegistrationId=admission.RegistrationId");
   }
   
      function update_staffterms($checkid=false)
   {
  	$query=$this->db->query("Update user set Staff_terms='Accepted' where UserId='$checkid'");
   } 

}

?>
