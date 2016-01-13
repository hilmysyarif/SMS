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

	
$countrow=mysqli_query($CONNECTION,"select * from timetable,class,section,subject,staff where  timetable.classid =class.classid AND timetable.sectionid =  section.sectionid AND timetable.subjectid= subject.subjectid AND timetable.staffid=staff.staffid");
$senddataarray =array();

// print_r($countrow);

$month = $dataarray['monthName'];


while($data1 = mysqli_fetch_array($countrow)){
 	print_r("......");
 	

    $aaa = explode("-",   $data1['datetime']);


	if ($aaa[0].'-'.$aaa[1]== $month){
		
		$dataResult = array('classid'=>$data1['ClassName'], 'sectionid'=>$data1['SectionName'],'subjectid'=>$data1['SubjectName'], 'staffid'=>$data1['StaffName'],'datetime'=>$data1['datetime']);
		$senddataarray[] = $dataResult;
		print_r($dataResult);
	}
	


}
 print_r(json_encode($senddataarray));


}
