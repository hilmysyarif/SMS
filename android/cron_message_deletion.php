	<?php
	
	$DBDATABASE="appmanager";
	$DBUSERNAME="root";
	$DBPASSWORD="bitnami";
	
	$CONNECTION_main=mysqli_connect("localhost",$DBUSERNAME,$DBPASSWORD,$DBDATABASE);
	if(!$CONNECTION_main)
	{
		echo "Database not found or There is an error in connecting to DB!! Please fix this!!!";
		exit();
	}else{
		
		$count_appmanager=mysqli_query($CONNECTION_main,"Select db_name from registered_application where db_name='demoschool'");	
		while($data_databaseName = mysqli_fetch_array($count_appmanager)){			
			$DBDATABASE=$data_databaseName['db_name'];
		//	$DBDATABASE= "demoschool";
			
			$CONNECTION=mysqli_connect("localhost",$DBUSERNAME,$DBPASSWORD,$DBDATABASE);
			if($CONNECTION)
			{
				
				$countrow=mysqli_query($CONNECTION,"Select * from groupmsg");
				
				while($data1 = mysqli_fetch_array($countrow)){
					$s_no = $data1['s_no'];
					$a = $data1['time'];
				
					$rowdate =explode(" ",$a);
				
					$das = $rowdate[0]."-".$rowdate[1]."-".$rowdate[2];
				
					$datetime1 = new DateTime($das);
					$datetime2 = new DateTime(date('M-d-Y'));
					$interval = $datetime1->diff($datetime2);
					$last = $interval->format('%R%a');
				
					if ($last>='15'){
						$querydelete="DELETE FROM `groupmsg` WHERE s_no='$s_no'";
				
						if (mysqli_query($CONNECTION,$querydelete)){
						$res = "Delete Message Successfully";
						
						$logDetailID = $data1['sender_id'];
						$logDetailName = $data1['sender_name'];
						$date_time = date('d-m-Y H:i:s');
						
						$queryInsert="insert into cron_log(logDetailID,logDetailName,createdOn) values('$logDetailID','$logDetailName','$date_time') ";
						mysqli_query($CONNECTION,$queryInsert);
						
						
						}else{
						$res ="Not Deleted Message";
			         }
									
								
								
					}
					else $res= 'no';
				
					print_r($res);
				}
				
			}
			
			
			mysql_close($CONNECTION);
			
		}
		
	
	}
	?>