<?php


$dataarray=json_decode($_POST['Jaydevi'],true);

$DBDATABASE=$dataarray['DB_Name'];
$DBUSERNAME="root";
$DBPASSWORD="bitnami";




$CONNECTION=mysqli_connect("localhost",$DBUSERNAME,$DBPASSWORD,$DBDATABASE);
if(!$CONNECTION)
{
	echo "Database not found or There is an error in connecting to DB!! Please fix this!!!";
	exit();
}else{
	
	//$action = "responseOfMsg";
	
  	$action=isset($_GET['action'])?$_GET['action']:'';	
		
	if ($action=="creategroup"){
		$aaa =  $dataarray['GroupData'];
		
		$g_name = $aaa['g_name'];
		$g_admin = $aaa['g_admin'];
		$g_members = $aaa['g_members'];
		$time = $aaa['time'];		
		
		$queryInsert="insert into groupinfo(g_name,g_admin,g_members,created_at) values('$g_name','$g_admin','$g_members','$time') ";
		mysqli_query($CONNECTION,$queryInsert);
		
		$countrow=mysqli_query($CONNECTION,"select serverGroupId from groupinfo where g_members='$g_members'");
		$data1 = mysqli_fetch_array($countrow);
		print_r($data1['serverGroupId']);
		
	}else if ($action=="insertmsg"){
	
		$senddresult =array();
		foreach( $dataarray['GroupData'] as $obj){
		
			$aaa =  $obj;
			$serverGroupId = $aaa['serverGroupId'];
			$sender_id = $aaa['sender_id'];
			$sender_name = $aaa['sender_name'];
			$msg = $aaa['msg'];
			$time = $aaa['time'];
		    $status =false;
		    $not_viewed_by = $aaa['not_viewed_by'];	
		    
			$queryInsert="insert into groupmsg(serverGroupId,sender_id,sender_name,msg,time,status,not_viewed_by) values('$serverGroupId','$sender_id','$sender_name','$msg','$time','$status','$not_viewed_by') ";
			if (mysqli_query($CONNECTION,$queryInsert)){
				$senddresult[] = "added";				
			}	else $senddresult[] = "not added";	
			
		}
		print_r(json_encode($senddresult));
		
	}else if ($action=="getmsg"){
		
		
	$countrow=mysqli_query($CONNECTION,"select * from groupmsg,groupinfo where groupmsg.serverGroupId=groupinfo.serverGroupId");	
		
		$senddataarray =array();
		$dataArra = array();
		$addedServerID = array();
		$a =0;
		while($data1 = mysqli_fetch_array($countrow)){		
			$data2[]=$data1;					
				
				if (strpos($data2[$a]['not_viewed_by'], $dataarray['UserID']) !== false){
					$dataArray = array('s_no'=>$data2[$a]['s_no'],
							 'sender_id'=>$data2[$a]['sender_id'],
							'sender_name'=>$data2[$a]['sender_name'],
							'msg'=>$data2[$a]['msg'],
							'time'=>$data2[$a]['time'],
							'g_name'=>$data2[$a]['g_name'],
							'g_members'=>$data2[$a]['g_members'],
							'g_admin'=>$data2[$a]['g_admin'],
							'created_at'=>$data2[$a]['created_at'],
							'serverGroupId'=>$data2[$a]['serverGroupId'],
					);
	               	$senddataarray[] = $dataArray;	

	               if (!in_array($data2[$a]['serverGroupId'], $addedServerID))
	               	$addedServerID[] = $data2[$a]['serverGroupId'];
				}			
			$a++;
						
		}
		
	//	print_r(count($addedServerID));die;		
		
		if (count($addedServerID)==0){
						
			$count111=mysqli_query($CONNECTION,"select * from groupinfo");
			while($data1 = mysqli_fetch_array($count111)){	
								
			if (strpos($data1['g_members'], ",") !== false)	{
				if($data1['g_admin']==$dataarray['UserID']){
					$dataArra [] = array(
							'g_name'=>$data1['g_name'],
							'g_members'=>$data1['g_members'],
							'g_admin'=>$data1['g_admin'],
							'created_at'=>$data1['created_at'],
							'serverGroupId'=>$data1['serverGroupId'],
					);
				}elseif (strpos($data1['g_members'], $dataarray['UserID']) !== false){
					$dataArra [] = array(
							'g_name'=> $data1['g_name'],
							'g_members'=> $data1['g_members'],
							'g_admin'=> $data1['g_admin'],
							'created_at'=> $data1['created_at'],
							'serverGroupId'=>$data1['serverGroupId'],
					);
				}
				
				
			}
				
			}
			
		}else {
			foreach ($addedServerID as $sID){
				$countGroup=mysqli_query($CONNECTION,"select * from groupinfo where serverGroupId!='$sID' and g_admin='$userID'");
				$data1 = mysqli_fetch_array($countGroup);
				$dataArra [] = array(
						'g_name'=>$data1['g_name'],
						'g_members'=>$data1['g_members'],
						'g_admin'=>$data1['g_admin'],
						'created_at'=>$data1['created_at'],
						'serverGroupId'=>$data1['serverGroupId'],
				);
					
			
					
			}
		}
	
		
		$dataRes = array('create_grp'=>$dataArra,
				'msg_data'=>$senddataarray
		);
			print_r(json_encode($dataRes));	
			
	}else if ($action=="responseOfMsg"){

		$aaa =  $dataarray['GroupData'];
		
		$studentID= $aaa['studentID'];
		$s_no = $aaa['s_no'];		
		
		foreach($s_no as $serverId){
			$countrow=mysqli_query($CONNECTION,"select not_viewed_by from groupmsg where s_no='$serverId'");
			$data1 = mysqli_fetch_array($countrow);
			$not_viewed_by1 = $data1['not_viewed_by'];			
			
			$studentID= $aaa['studentID'];
	if ((strpos("$not_viewed_by1", ","))===FALSE);		
	else $studentID.=",";			

				$not_viewed_by = str_replace($studentID, "", $not_viewed_by1);		
			
 			$sql = "UPDATE groupmsg SET not_viewed_by='$not_viewed_by' WHERE s_no='$serverId'";
 			
 			if (mysqli_query($CONNECTION,$sql))
 			$udationResult[] = array('s_no'=>$serverId,'result'=>"yes");	
 			else $udationResult[] = array('s_no'=>$serverId,'result'=>"no");	
		
 			if ($not_viewed_by1==null || $not_viewed_by1=="" || $not_viewed_by==null || $not_viewed_by==""){
 				
 				$querydelete="DELETE FROM `groupmsg` WHERE s_no='$serverId'";
		        mysqli_query($CONNECTION,$querydelete);
		        
		        		      
 			}
 			
		}		
		
		
		print_r(json_encode($udationResult));
	}
	

	
		

}

