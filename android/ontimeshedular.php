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
//$query = "Select time from groupmsg";

$exm = "April 25 2016 12:13 PM";
//$queryData = mysqli_query($CONNECTION,$query);

//$prev_date =  $queryData['time'];

$aa = strtotime('April 20 2016');
$newformat = date('Y-m-d',$aa);


$todayDate= date('Y-m-d');
//print_r($todayDate);

//$differ = $todayDate->diff($newformat);

//$interval = date_diff($todayDate, $newformat);
$interval = $newformat->diff($todayDate);
echo $interval->format('%R%a days');

//$elapsed = $interval->format('%y years %m months %a days %h hours %i minutes %S seconds');
//print_r($elapsed);


}
?>