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
	
		
		$resultArray = array();
		foreach ($dataarray['SchoolData']['SchoolResult'] as $resultsarray){

		$obtained_marks =$resultsarray['obtained_marks'];
		$maximum_marks =$resultsarray['maximum_marks'];
		$exam_date =strtotime($resultsarray['exam_date']);
		$resultID =$resultsarray['resultID'];
		$session =$resultsarray['session'];
		$student_id =$resultsarray['student_id'];
		$grades =$resultsarray['grade'];
		$section_id =$resultsarray['section_id'];
		$examName = $resultsarray['examName'];		
		$subjectid =$resultsarray['subjectid'];
		$evaluated_by =$resultsarray['evaluated_by'];
			
				
		
		$query="Select Exam_Detail_Id from examdetails where Exam_Type='$examName' AND Section_Id='$section_id' AND Subject_Id='$subjectid' AND Student_Id='$student_id' AND DateOfExam='$exam_date' AND Session='$session'";
		$countrow =	mysqli_query($CONNECTION,$query);
		
		if (mysqli_num_rows($countrow)!=0){
			$data1 = mysqli_fetch_array($countrow);
			
			$Exam_Detail_Id = $data1['Exam_Detail_Id'];
			
			$sql = "UPDATE examdetails SET Marks_Obtain='$obtained_marks', Max_Marks='$maximum_marks',Result='$resultID',Grade='$grades',Evaluated_By='$evaluated_by' WHERE Exam_Detail_Id='$Exam_Detail_Id'";
			
			if (mysqli_query($CONNECTION,$sql))
				$resultArray[] = array('result'=>"updated",'examName'=>$examName,'subjectid'=>$subjectid,'student_id'=>$student_id);
			else $resultArray[] = array('result'=>"error",'examName'=>$examName,'subjectid'=>$subjectid,'student_id'=>$student_id);
			
				
		}else {
		
			$queryInsert="insert into examdetails(Exam_Type,Exam_Detail_Status,Section_Id,Student_Id,Session,Subject_Id,Marks_Obtain,Max_Marks,Result,Grade,Remarks,DateOfExam,Evaluated_By) 
			                             values('$examName','Active','$section_id','$student_id','$session','$subjectid','$obtained_marks','$maximum_marks','$resultID','$grades','','$exam_date','$evaluated_by')";
					
					
			if (mysqli_query($CONNECTION,$queryInsert))
			$resultArray[] = array('result'=>"inserted",'examName'=>$examName,'subjectid'=>$subjectid,'student_id'=>$student_id);
			else $resultArray[] = array('result'=>"error",'examName'=>$examName,'subjectid'=>$subjectid,'student_id'=>$student_id);
			
							
		}
				
			
		}
		
		
		print_r(json_encode($resultArray));	
	
	
		
	}elseif ($action == "insertfeedback"){
		
		$SenderID =$dataarray['SenderID'];
		$sno_array= array();
				
		foreach ($dataarray['ReviewData'] as $data){
			
			$student_id =$data['student_id'];
			$feedback =$data['feedback'];			
			$date =$data['date'];
			$s_no =$data['s_no'];
			
			$queryInsert="insert into feedback(student_id,feedbackLog,date,senderID) values('$student_id','$feedback','$date','$SenderID')";			
		
			if (mysqli_query($CONNECTION,$queryInsert))			
				$sno_array[]= 	 array('result'=>"inserted",'s_no'=>$s_no);			
			else  $sno_array[] =  array('result'=>"error",'s_no'=>$s_no);		
			
		
		}
		print_r(json_encode($sno_array));
		
	}elseif ($action == "getfeedback"){
		
		$ID =$dataarray['ID'];
		//$resultarray = array();

	
		$countrow=mysqli_query($CONNECTION,"");
		
	
		
		$countrow=mysqli_query($CONNECTION,"Select * from feedback where student_id='$ID'");
		
		$resultarray = array();
		
		while($data1 = mysqli_fetch_array($countrow)){
		if ($data1['senderID']=="Administrator"){
			$resultarray[]=array('feedbackLog'=>$data1['feedbackLog'],'date'=>$data1['date'],'senderID'=>$data1['senderID'],'senderName'=>$data1['senderID']);
				
		}else {
			$newID = split("_", $data1['senderID']);
			
			print_r($newID);die;
			$countrow2=mysqli_query($CONNECTION,"Select StaffName from staff where StaffId='$newID[1]");
			$data2= mysqli_fetch_array($countrow2);
			$resultarray[]=array('feedbackLog'=>$data1['feedbackLog'],'date'=>$data1['date'],'senderID'=>$data1['senderID'],'senderName'=>$data2['StaffName']);
				
		}
		

		
		}
		
		
		
		
// 		while($data1 = mysql_fetch_array($countrow)){
//  			print_r($data1);die;
// 			$str = "Hello world";
// 			$pos = strpos($data1['senderID'], "_");
			
// 			if ($pos !== FALSE) {
//  				print_r("False");
				
// 		    $newID = explode("_", $data1['senderID']);
			
// 		    $countrow2=mysqli_query($CONNECTION,"Select StaffName from staff where StaffId='$newID[1]'");
		   
// 			$data2 = mysql_fetch_row($countrow2);
			
// 			$resultarray[]=array('feedbackLog'=>$data1['feedbackLog'],'date'=>$data1['date'],'senderID'=>$data1['senderID'],'senderName'=>$data2['StaffName']);
			
// 			} else {
// 			$resultarray[]=array('feedbackLog'=>$data1['feedbackLog'],'date'=>$data1['date'],'senderID'=>$data1['senderID'],'senderName'=>$data1['senderID']);
//  			//print_r("True");
//  		//	print_r(".........");
// 			}
			
			
// 		}
		
		print_r(json_encode($resultarray));
			
		
		
	}

	
	

}




?>