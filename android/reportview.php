<?php

$data = json_decode($_POST['requestedData'],true);

$DBDATABASE= $data['DB_Name'];
$DBUSERNAME="root";
$DBPASSWORD="bitnami";


$CONNECTION=mysqli_connect("localhost",$DBUSERNAME,$DBPASSWORD,$DBDATABASE);
if(!$CONNECTION)
{
	echo "Database not found or There is an error in connecting to DB!! Please fix this!!!";
	exit();
}else{	
	
 	
	
	if (strcmp($data['userType'], "Teacher") == 0){		
		
 		if (strcmp($data['viewRequest'], "Attendance") == 0){		
			
			$studentIDarray = $data['studentID'];			
			$mydate = strtotime($data['monthName']);
			
			$studentAttendance = array();			
			
			$countrow=mysqli_query($CONNECTION,"select Attendance from studentattendance where Date='$mydate'");			
			$data1 = mysqli_fetch_array($countrow);			
			
				$ab=explode(",",  $data1[0]);
			
			foreach ($ab as $bb ){
				$cc=explode("-",  $bb);
				
				for ($i =0; $i< count($studentIDarray);$i++){
					if ($cc[0]==$studentIDarray[$i])
						
						$studentAttendance[] = array('StudentID'=>$cc[0], 'presentStatus'=>$cc[1]);
						
				    }
				
				
			         }
			
			 print_r(json_encode($studentAttendance));die;
			
			
 		    }else if (strcmp($data['viewRequest'], "homework") == 0){
		// 	print_r($data1['classID']);die;
			
		$clsID = $data['classID'];
		$secID = $data['sectionID'];
		$month = $data['monthName'];
		$countrow=mysqli_query($CONNECTION,"select * from homework where classid='$clsID' AND sectionid='$secID'");
	
		$resultarray = array();
				
		while($data1 = mysqli_fetch_array($countrow)){
		
			
			if (strpos($data1['dateofhomework'], $month) !== false){			
				
				$abb = array('date'=>date('Y-m-d',$data1['dateofhomework']), 'subjectID'=>$data1['subjectid'], 'homework'=>$data1['homework']);
				$resultarray[] = $abb;
							
			}
				
		}
		print_r(json_encode($resultarray));
			
			
	}
 		          
	
				
	}else if (strcmp($data['userType'], "Parent") == 0 ){
		
		$stID =	$data['studentID'];
		$month = $data['monthName'];
		
		if (strcmp($data['viewRequest'], "Attendance") == 0){		
			
				
				$countrow=mysqli_query($CONNECTION,"select Date,Attendance from studentattendance");

				$resultarray =array();
					
				while($data1 = mysqli_fetch_array($countrow))
				{
					
					if (strpos(date('Y-m-d',$data1['Date']), $month) !== false){
					
						$mydate =$data1['Date'];	
						
						$abarray=explode(",",  $data1['Attendance']);
							
						foreach ($abarray as $bb ){
							$cc=explode("-",  $bb);
								
							if ($cc[0]==$stID){
								
								$resultarray[] = array('onDate'=>date('Y-m-d',$mydate), 'presentStatus'=>$cc[1]);
							}
								
						}
							
							
					}
				}
								
			
			print_r(json_encode($resultarray));	
			
		
		}else if (strcmp($data['viewRequest'], "homework") == 0){
			
			$countrow=mysqli_query($CONNECTION,"select SectionId from admission,registration where admission.RegistrationId=registration.RegistrationId and admission.AdmissionId='$stID'");
			$datasectionId = mysqli_fetch_array($countrow);
			
//  			print_r($datasectionId['SectionId']);
 			
 			$SectionId= $datasectionId['SectionId'];
 			
 			
 			
 			$countrow1=mysqli_query($CONNECTION,"select * from homework where sectionid='$SectionId'");
 				
 			// 		print_r(subjectid);die;
 			$resultarray = array();
 				
 			while($data1 = mysqli_fetch_array($countrow1)){
 			
 				if (strpos($data1['dateofhomework'], $month) !== false){
 					$subjID = $data1['subjectid'];

 					$countrow2=mysqli_query($CONNECTION,"select SubjectName from subject where SubjectId='$subjID'");
 					$data2 = mysqli_fetch_array($countrow2);
 					
 					$subName = $data2['SubjectName']; 					
 						
 					$abb = array('date'=>date('Y-m-d',$data1['dateofhomework']), 'subjectID'=>$subjID, 'SubjectName'=>$subName, 'homework'=>$data1['homework']);
 					$resultarray[] = $abb;
 				}
 			
 			}
 			print_r(json_encode($resultarray));				
 		
 						
		}	
	
		
		
		
	
	}
	


	
	

}




?>