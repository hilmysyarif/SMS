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


$todayDate= date('Y-m-d',null);

print_r($aa);
print_r("           ");
print_r($newformat);
print_r("\n");
$differ = $todayDate->diff($newformat);
print_r($differ);


}
?>