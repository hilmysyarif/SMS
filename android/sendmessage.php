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
// 	$action="get";
	
 	$action=isset($_GET['action'])?$_GET['action']:'';
	if($action=="get"){
 		$studentID = $_POST['loggedUserID'];
		
// 		$studentID = "493";

		$countrow=mysqli_query($CONNECTION,"select * from messages where receiverID='$studentID'");		
		
		print_r($studentID);
		print_r($countrow);
		print ("....");
		$senddataarray =array();
		while($data1 = mysqli_fetch_array($countrow)){
			
			print_r($data1);
			print ("....");
		
			$dataArray = array('senderID'=>$data1['senderID'], 'msg'=>$data1['msg'],'sendDataTime'=>$data1['deliveredDateTime']);
			$senddataarray[] = $dataArray;		
		
		
		}
		print_r(json_encode($senddataarray));
		
		
		
		
	} else if($action=="insert"){
		
		$dataarray = json_decode($_POST['messages'],true);
		
		$usertype = $dataarray['userID'];
		
		
		
		$today =  date('Y-m-d ,h:i:s A', time()+16230);

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
	
	
	
	

}




?>