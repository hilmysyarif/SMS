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
//  	$requestedpage = "attendance";
	
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
	
	
		
}else if (strcmp($requestedpage, "attendance") == 0){
	$countrow=mysqli_query($CONNECTION,"select * from studentattendance");
 	
	while($data1 = mysqli_fetch_array($countrow)){	

			
		$ab=explode(",",  $data1['Attendance']);

 			$firstarray =null;
			for ($v =0; $v < count($ab);$v++){
				$abcd=explode("-", $ab[$v]);
				$firstarray[] =array('id'=>$abcd[0],'status'=>$abcd[1]);
			}
			
		$senddataarray1[]=array('date'=>date('Y-m-d',$data1['Date']) ,'data'=>$firstarray);


	}	
       print_r(json_encode($senddataarray1));
          
 	}else print ("Undefind Request !");
	
}




?>