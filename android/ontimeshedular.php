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

$datetime1 = new DateTime('April-20-2016');
$datetime2 = new DateTime('April-20-2016');
$interval = $datetime1->diff($datetime2);
echo $interval->format('%R%a days');


}
?>