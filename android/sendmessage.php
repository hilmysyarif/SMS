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
	
	$dataarray = json_decode($_POST['messages'],true);

	$usertype = $dataarray['userID'];
	

	
	$today =  date('Y-m-d ,h:i:s A', time()+16230);
// 	echo date('h:i:s a', time()+(360000000-1800));die;
	
// 	print_r(date('h:i:s A', time()+16230));
	
	foreach($dataarray['Messages'] as $clsdataarray){
		
		foreach ($clsdataarray['studentsID'] as $aa){
			
			$msg= $clsdataarray['message'];
			$sendtime = $clsdataarray['sendDateTime'];
			
			
			$queryInsert="insert into messages(senderID,receiverID,msg,sendDateTime,deliveredDateTime,readDateTime) values('$usertype','$aa','$msg','$sendtime','$today','') ";
			mysqli_query($CONNECTION,$queryInsert);
			
		
			
		}
		
		

	}
	print ("message delivered");
}




?>