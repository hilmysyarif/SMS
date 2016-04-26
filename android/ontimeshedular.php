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
	
	$countrow=mysqli_query($CONNECTION,"Select time from groupmsg");

while($data1 = mysqli_fetch_array($countrow)){

	$a = $data1['time'];

	$rowdate =explode(" ",$a);
	
	$das = $rowdate[0]."-".$rowdate[1]."-".$rowdate[2];	

	$datetime1 = new DateTime($das);
	$datetime2 = new DateTime(date('M-d-Y'));
	
// 	print_r($datetime1);
// 	print_r("        ");
// 	print_r($datetime1);
	
	$interval = $datetime1->diff($datetime2);
	
//echo $interval->format('%R%a days');


	$last = $interval->format('%R%a');

	
	if ($last>='1'){
	echo 'hi';
	}
	else echo 'no';
	
	//echo $interval->format('%R%a days');
}


//$prev_date =  $queryData['time'];


//$aa = ('April-20-2016');





}
?>