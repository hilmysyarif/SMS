<?php

$dataarray = json_decode($_POST['Jaydevi'],true);

$DBDATABASE=$dataarray['DB_Name'];
$DBUSERNAME="root";
$DBPASSWORD="bitnami";

$CONNECTION=mysqli_connect("localhost",$DBUSERNAME,$DBPASSWORD,$DBDATABASE);
if(!$CONNECTION)
{
	echo "Database not found or There is an error in connecting to DB!! Please fix this!!!";
	exit();
}else{
	
$countrow=mysqli_query($CONNECTION,"select * from timetable");
$senddataarray =array();

$month = $dataarray['monthName'];

while($data1 = mysqli_fetch_array($countrow)){

	$ab=explode("_",  $data1['datetime']);
	$ac = explode(" ",  $ab[0]);
	
	if (strpos($ac[0], $month)){
		$dataResult = array('classid'=>$data1['classid'], 'sectionid'=>$data1['sectionid'],'subjectid'=>$data1['subjectid'], 'staffid'=>$data1['staffid'],'datetime'=>$data1['datetime']);
		$senddataarray[] = $dataResult;
	}
	
	

}
print_r(json_encode($senddataarray));


}
