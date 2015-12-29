<?php


$dataarray = json_decode($_POST['Jaydevi'],true);

 $DBDATABASE=$dataarray['DB_Name'];
$DBUSERNAME="root";
 $DBPASSWORD="bitnami";

print_r($dataarray);
print ("......");

$CONNECTION=mysqli_connect("localhost",$DBUSERNAME,$DBPASSWORD,$DBDATABASE);
if(!$CONNECTION)
{
	echo "Database not found or There is an error in connecting to DB!! Please fix this!!!";
	exit();
}else{

	
$countrow=mysqli_query($CONNECTION,"select * from timetable");
$senddataarray =array();

// $rt = json_decode($dataarray,true);

$month = $dataarray['monthName'];
print_r($month);
print ("......");

while($data1 = mysqli_fetch_array($countrow)){


    $aaa = explode("-",   $data1['datetime']);
    print_r($aaa);
    print ("......");
    
    print_r($aaa[0].'-'.$aaa[1]);
    print ("......");

	if ($aaa[0].'-'.$aaa[1]== $month){
		
		$dataResult = array('classid'=>$data1['classid'], 'sectionid'=>$data1['sectionid'],'subjectid'=>$data1['subjectid'], 'staffid'=>$data1['staffid'],'datetime'=>$data1['datetime']);
		$senddataarray[] = $dataResult;
	}
	
	print ("....ritu.....");	

}
 print_r(json_encode($senddataarray));


}
