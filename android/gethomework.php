<?php
$DBDATABASE="rohit_sms";
$DBUSERNAME="root";
$DBPASSWORD="bitnami";

$CONNECTION=mysqli_connect("localhost",$DBUSERNAME,$DBPASSWORD,$DBDATABASE);
if(!$CONNECTION)
{
	echo "Database not found or There is an error in connecting to DB!! Please fix this!!!";
	exit();
}else{

$dataarray = json_decode($_POST['Jaydevi'],true);


foreach($dataarray['SchoolData']['SchoolHomeWork'] as $clsdataarray){
	
	
	foreach ($clsdataarray['ClassData'] as $secdataarray){
		
		foreach($secdataarray['SectionData'] as $datearray){
			
			foreach ($datearray['SubjectWork'] as $subjectarray){	
			

				    $classID = $clsdataarray['ClassID'];
					$sectionID = $secdataarray['SectionID'];
					$date = $datearray['Date'];
					$subID = $subjectarray['SubjectId'];
					$homework = $subjectarray['HomeWork'];	
					
        		$query="Select * from homework where classid='$classID' AND sectionid='$sectionID' AND subjectid='$subID' AND createdon='$date'";
				$countrow =	mysqli_query($CONNECTION,$query);
				
				if (mysqli_num_rows($countrow)!=0){
					
					$sql = "UPDATE homework SET homework='$homework' WHERE classid='$classID' AND sectionid='$sectionID' AND subjectid='$subID' AND createdon='$date'";
				$resultupdate =	mysqli_query($CONNECTION,$sql);
				if ($resultupdate){
					$Message="updated successfully..!!!!";
					print_r($Message);
				}
					
					
				}else{
					$queryInsert="insert into homework(classid,sectionid,subjectid,homework,createdon) values('$classID','$sectionID','$subID','$homework','$date') ";
				
					if (mysqli_query($CONNECTION,$queryInsert))
					$Message="Attendance Added successfully!!";
					print_r($Message);
					
				}	
					
							
				
			}
			
			
		}
		
		
	}
}


}



?>