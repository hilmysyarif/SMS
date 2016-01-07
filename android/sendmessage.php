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
	if($action=="get"){
//  		$dataarray = json_decode($_POST['ritu'],true);
		
//  		$abb = json_decode('{"DB_Name":"rohit_sms","UserID":"493"}',true);
		
 		$studentID = $dataarray['UserID'];

		$countrow=mysqli_query($CONNECTION,"select * from messages where receiverID='$studentID' AND readDateTime =''");		
		
		$senddataarray =array();
		while($data1 = mysqli_fetch_array($countrow)){			
		
			$dataArray = array('senderID'=>$data1['senderID'], 'msg'=>$data1['msg'],'sendDataTime'=>$data1['deliveredDateTime']);
			$senddataarray[] = $dataArray;		
		
				}
 		print_r(json_encode($senddataarray));	
		
				
	} else if($action=="insert"){
		
// 		$dataarray = json_decode($_POST['messages'],true);
		
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
		
	}if ($action=="fetchTeacher"){
	
		$countrow=mysqli_query($CONNECTION,"select MasterEntryId from masterentry where MasterEntryStatus='Active' AND MasterEntryName='StaffPosition' AND MasterEntryValue='Teacher' OR MasterEntryValue='Teachers' OR MasterEntryValue='teacher'OR MasterEntryValue='teachers'");
		
				
		while($data1 = mysqli_fetch_array($countrow)){	
		$aa =$data1['MasterEntryId'];
		
			$countrow1=mysqli_query($CONNECTION,"select * from staff where StaffStatus='Active' AND StaffPosition='$aa'");
			
		       while ($data2 = mysqli_fetch_array($countrow1))
		       {		
		       
		         	$senddataarray[] = array('TeacherID'=>$data2['StaffId'], 'TeacherName'=>$data2['StaffName']);
		       }
			}
		
			
			
			
			$countrow_result=mysqli_query($CONNECTION,"select * from masterentry where MasterEntryStatus='Active' AND MasterEntryName='Result'");
			
			
			while($data_result = mysqli_fetch_array($countrow_result)){	
			
					$senddataarray_result[] = array('ResultID'=>$data_result['MasterEntryId'], 'ResultName'=>$data_result['MasterEntryValue']);
				}
					
			
			$mydataarray =array('TeacherList'=>$senddataarray, 'ResultList'=> $senddataarray_result );
			
			
  		print_r(json_encode($mydataarray));	
	
	
	
	}else if ($action=="response"){
		$res="not deleted";
		foreach ($clsdataarray['SchoolData']['MessageResponse'] as $aa){
			$senderID = $aa['senderId'];
			$deliveredDateTime = $aa['deliveredDateTime'];						
			$receiverId = $aa['receiverId'];
			
			$querydelete="DELETE from messages where senderID='$senderID' AND receiverID='$receiverId' AND deliveredDateTime='$deliveredDateTime'";
			
					if (mysqli_query($CONNECTION,$querydelete))
				$res = "Delete Message Successfully";
			else $res ="Not Deleted Message";
		}
		print_r($res);
		
	}
	
	
	
	

}




?>