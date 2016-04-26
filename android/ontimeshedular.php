	<?php
	
	$DBDATABASE="demoschool";
	$DBUSERNAME="root";
	$DBPASSWORD="bitnami";
	
	$CONNECTION=mysqli_connect("localhost",$DBUSERNAME,$DBPASSWORD,$DBDATABASE);
	if(!$CONNECTION)
	{
		echo "Database not found or There is an error in connecting to DB!! Please fix this!!!";
		exit();
	}else{
		
/* 		$countrow=mysqli_query($CONNECTION,"Select s_no,time from groupmsg");
	
	while($data1 = mysqli_fetch_array($countrow)){
	$s_no = $data1['s_no'];
		$a = $data1['time'];
	
		$rowdate =explode(" ",$a);
		
		$das = $rowdate[0]."-".$rowdate[1]."-".$rowdate[2];	
	
		$datetime1 = new DateTime($das);
		$datetime2 = new DateTime(date('M-d-Y'));	
		$interval = $datetime1->diff($datetime2);
	    $last = $interval->format('%R%a');
		
		if ($last>='1'){
			$querydelete="DELETE FROM `groupmsg` WHERE s_no='$s_no'";	
	
			if (mysqli_query($CONNECTION,$querydelete)){
				$res = "Delete Message Successfully";			
			}else{
				$res ="Not Deleted Message";			
			}
			
			
		}
		else $res= 'no';
		
		print_r($res);
	} */
			
		
	$query ="select * from Sys.Databases";
$result = 	mysqli_query($CONNECTION,$query);


	print_r(mysqli_fetch_array($result));
	}
	?>