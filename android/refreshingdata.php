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

 	$requestedpage = $_POST['requestpage'];
// 	$requestedpage = "homework";
	
	if (strcmp($requestedpage, "homework") == 0){
		$countrow=mysqli_query($CONNECTION,"select * from homework");
		
		$senddataarray=array();
		$a =0;
		while($data1 = mysqli_fetch_array($countrow)){
		
			$data2[]=$data1;
			
			$dataArray = array('classid'=>$data2[$a]['classid'], 'sectionid'=>$data2[$a]['sectionid'],'subjectid'=>$data2[$a]['subjectid'],'homework'=>$data2[$a]['homework'],'createdon'=>$data2[$a]['createdon']);
			$senddataarray[] = $dataArray;
			
			$a++;
			
		}
	
		print_r(json_encode($senddataarray));
		
		
// 	}else if (strcmp($requestedpage, "attendance") == 0){
// 		print_r("attendance feching request..");
// 	}
	
	
	
	
	
	
}

}


?>