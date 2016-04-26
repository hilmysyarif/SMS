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
	
	$rowdate =explode(" ",$data1['time']);
	print_r($rowdate);die;
	$datetime1 = new DateTime($rowdate[0]+"-"+$rowdate[1]+"-"+$rowdate[2]);
	$datetime2 = new DateTime(date('M-d-Y'));
	$interval = $datetime1->diff($datetime2);

	$last = $interval->format('%a');
	echo $datetime1;
echo "   ";
	echo $last;
// 	if ($last>='1'){
// 	echo 'hi';
// 	}
// 	else echo 'no';
	
	//echo $interval->format('%R%a days');
}


//$prev_date =  $queryData['time'];


//$aa = ('April-20-2016');





}
?>