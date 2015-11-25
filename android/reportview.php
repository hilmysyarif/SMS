<?php
$DBDATABASE="db_school";
$DBUSERNAME="root";
$DBPASSWORD="bitnami";


$CONNECTION=mysqli_connect("localhost",$DBUSERNAME,$DBPASSWORD,$DBDATABASE);
if(!$CONNECTION)
{
	echo "Database not found or There is an error in connecting to DB!! Please fix this!!!";
	exit();
}else{	

	$data = json_decode($_POST['requestedData'],true);	
	
	if (strcmp($data['userType'], "Teacher") == 0){		
		
		if (strcmp($data['viewRequest'], "homework") == 0){			
			// 	print_r($data1['classID']);die;
			
			$clsID = $data['classID'];
			$secID = $data['sectionID'];
			$month = $data['monthName'];
			$countrow=mysqli_query($CONNECTION,"select * from homework where classid='$clsID' AND sectionid='$secID'");
			
			// 		print_r(subjectid);die;
			$resultarray = array();
			
			while($data1 = mysqli_fetch_array($countrow)){
					
				// 			print_r($data1['homework']);
				//  			print_r($data1['subjectid']);die;
				if (strpos($data1['createdon'], $month) !== false){
			
					$abb = array('date'=>$data1['createdon'], 'subjectID'=>$data1['subjectid'], 'homework'=>$data1['homework']);
					$resultarray[] = $abb;
				}
			
			}
			print_r(json_encode($resultarray));
			
		}else if (strcmp($data['viewRequest'], "Attendance") == 0){		
			
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
						$studentAttendance[$i] = $cc[1];
						
				}
				
				
			}
			
			print_r(json_encode($studentAttendance));die;
			
			
		}
		
		
	
		
		
	}
	


	
	

}




?>