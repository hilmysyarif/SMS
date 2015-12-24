<?php

$dataarray = json_decode($_POST['ritu'],true);

$DBDATABASE=$dataarray['DB_Name'];
$DBUSERNAME="root";
$DBPASSWORD="bitnami";

$CONNECTION=mysqli_connect("localhost",$DBUSERNAME,$DBPASSWORD,$DBDATABASE);
if(!$CONNECTION)
{
	echo "Database not found or There is an error in connecting to DB!! Please fix this!!!";
	exit();
}else{	


	$action=isset($_GET['action'])?$_GET['action']:'';
	
	if($action == "get"){
		$countrow=mysqli_query($CONNECTION,"select * from examtype where Exam_Status='Active'");
		
		$resultarray = array();
		
	while($data1 = mysqli_fetch_array($countrow))		
		$resultarray[] = $data1['Exam_Type'];
			
	print_r(json_encode($resultarray));
	
	}else if($action == "insert"){
	
		foreach ($dataarray['SchoolData']['SchoolResult'] as $resultsarray){

		$obtained_marks =$resultsarray['obtained_marks'];
		$maximum_marks =$resultsarray['maximum_marks'];
		$exam_date =$resultsarray['exam_date'];
		$resultID =$resultsarray['resultID'];
		$session =$resultsarray['session'];
		$student_id =$resultsarray['student_id'];
		$grades =$resultsarray['grade'];
		$section_id =$resultsarray['section_id'];
		$examName =$resultsarray['examName'];
		$subjectid =$resultsarray['subjectid'];
		$evaluated_by =$resultsarray['evaluated_by'];
			
			$queryInsert="insert into examdetails(Exam_Type,Exam_Detail_Status,Section_Id,Student_Id,Session,Subject_Id,Marks_Obtain,Max_Marks,Result,Grade,Remarks,DateOfExam,Evaluated_By) values('$examName','Active','$section_id','$student_id','$obtained_marks','$maximum_marks','$resultID','$grades','','$exam_date','$evaluated_by') ";
			mysqli_query($CONNECTION,$queryInsert);
			
			if (mysql_affected_rows()>=0){
				print_r("inserted");
						print_r($examName);
						
			}
		}
				
			
		}
		
		
			
	
	
	}


	
	

}




?>