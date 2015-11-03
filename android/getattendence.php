<?php
$DBDATABASE="rohit_sms";
$DBUSERNAME="root";
$DBPASSWORD="bitnami";

$CONNECTION=mysqli_connect("localhost",$DBUSERNAME,$DBPASSWORD,$DBDATABASE);
if(!$CONNECTION)
{
echo "Database not found or There is an error in connecting to DB!! Please fix this!!!";
exit();
}else{

$action=isset($_GET['action'])?$_GET['action']:'';
if($action=="get"){
	
$class=mysqli_query($CONNECTION,"select ClassId,ClassName from class where Session='2015-2016'");

$section=mysqli_query($CONNECTION,"select SectionId,SectionName,ClassId from section ");

$student=mysqli_query($CONNECTION,"select AdmissionId,StudentName,SectionId from admission,registration where admission.RegistrationId=registration.RegistrationId and
Session='2015-2016' and
Status='Studying'");

$subject=mysqli_query($CONNECTION,"Select * from subject where
						Session='2015-2016' and
						SubjectStatus='Active'
						order by SubjectName");



$mainarr=array();
$count=0;
$classarr=array();
$sectionarr=array();
$studentarr=array();
$studentname=array();
$studentid=array();
$classarr1=array();
$subjectarr=array();
while($class1 = mysqli_fetch_array($class)){
	
	$class2[]=$class1;
}

while($section1 = mysqli_fetch_array($section)){
	$section2[]=$section1;
}

while($student1 = mysqli_fetch_array($student)){
	$student2[]=$student1;
}

while($subject1 = mysqli_fetch_array($subject)){
	$subject2[]=$subject1;
}

for($i=0;$i<=count($class2)-1;$i++)
{
	
		for($a=0;$a<=count($section2)-1;$a++)
		{
		
			if($class2[$i][0]==$section2[$a][2])
			{
				for($b=0;$b<=count($student2)-1;$b++)
				{
					
					if( $section2[$a][0]==$student2[$b][2])
					{
						$studentname[]=$student2[$b][1];
						$studentid[]=$student2[$b][0];
					}	
				}
				
				for($c=0;$c<=count($subject2)-1;$c++)
				{
					if(strpos($subject2[$c][4],$section2[$a][0])!== false)
					{
						$subjectarr[]=array('subjectid'=>$subject2[$c][0],'subjectname'=>$subject2[$c][2]);
					}	
				}
				$sectionarr[]=array('section'=>$section2[$a][1],'subject'=>$subjectarr,'student_name'=>$studentname,'student_id'=>$studentid);
				$studentname='';$studentid='';$subjectarr='';
			}
			
		} 
		
		$classarr1=array('class'=>$class2[$i][1],'student'=>$sectionarr);
		unset($sectionarr);
		$classarr[]=$classarr1;
		unset($classarr1);
}

$mainarr=array('school'=>$classarr,'school_name'=>'DPS School');
print_r(json_encode($mainarr));

}elseif($action=="insert"){
	
	$dataarr1=json_decode($_POST['Jaydevi'],true);
	$date='';
	$pstudentid='';	
	$astudentid='';
		foreach($dataarr1['School']['School_Attendance'] as $dataarr2)
		{
			
																		//print_r($dataarr2['Class']); Get class name from there...
			
			foreach($dataarr2['Data'] as $dataarr3)
			{															//$dataarr3['Section_name']  Get Section name from there...
				foreach($dataarr3['Present_students'] as $dataarr4)
				{
					$Attendance=$dataarr4['Present_student_id'];
					$Attendance1=$dataarr4['Apsentt_student_id'];
					$AttendanceDate=strtotime($dataarr4['Date']);
					
					/*$CurrentSessionArray=explode("-",$CURRENTSESSION);
					$StartingYear=$CurrentSessionArray[0];
					$EndingYear=$CurrentSessionArray[1];*/
					
					$SessionStartingDate="01-04-2015";
					$SessionEndingDate="31-03-2016";
					$SessionStartinDateTS=strtotime($SessionStartingDate);
					$SessionEndingDateTS=strtotime($SessionEndingDate);
					
					$Date=date("Y-m-d");
					$Att="P";
					$DateTimeStamp=strtotime($Date);

					
					$CountStudent=count($Attendance);
					
					if($Attendance=="" || $AttendanceDate=="")
					{
						$Message="All the fields are mandatory!!";
						$Type=error;
					}
					else
					{
						//$AttendanceDate=strtotime($AttendanceDate);
						$query="select Attendance from studentattendance where Date='$AttendanceDate' ";
						$check=mysqli_query($CONNECTION,$query);
						$AlreadyMarked=mysqli_num_rows($check);
						if($AlreadyMarked>0)
						{  
							/*$row=mysqli_fetch_array($check);
							$LastAttendance=explode(",",$row['Attendance']);
							foreach($LastAttendance as $LastAttendanceValue)
							{
								$LastAttAttendance=explode("-",$LastAttendanceValue);
								$LastAdmissionIdId=$LastAttAttendance[0];
								$LastAtt=$LastAttAttendance[1];
								$LastTime=$LastAttAttendance[2];
								//if(!empty($Attendance)){
								$Search=array_search($LastAdmissionIdId,$Attendance);//}else{$Search=FALSE;}
								if($Search===FALSE)
								$NewAttendance[]="$LastAdmissionIdId-$LastAtt-$LastTime";
								elseif($Att!="")
								//$NewAttendance[]="$LastAdmissionIdId-$Att-$DateTimeStamp";
								$Marked[]=$LastAdmissionIdId;
							}*/
							
							foreach($Attendance as $AttendanceValue)
							{ 
								//$SearchForMarkedIndex=array_search($AttendanceValue,$Marked);
								//if($SearchForMarkedIndex===FALSE && $Att!="")
								$NewAttendance[]="$AttendanceValue-$Att-$DateTimeStamp";
							}
							foreach($Attendance1 as $AttendanceValue)
							{	//$SearchForMarkedIndex=array_search($AttendanceValue,$Marked);
								//if($SearchForMarkedIndex!=FALSE && $Att!="")
								$NewAttendance[]="$AttendanceValue-A-$DateTimeStamp";
							}
							
							$NewAttendance=implode(",",$NewAttendance);
							
							if($NewAttendance!=""){
							$queryInsert="update studentattendance set Attendance='$NewAttendance' where Date='$AttendanceDate' ";
							$Message="Attendance updated successfully!!";
							$Type=success;	
							}else{
							$queryInsert="delete from studentattendance where Date='$AttendanceDate' ";}
							mysqli_query($CONNECTION,$queryInsert);
						}
						else
						{	$AttendanceString='';
							foreach($Attendance as $AttendanceValue)
								if($Att!="")
								$AttendanceString[]="$AttendanceValue-$Att-$DateTimeStamp";
							foreach($Attendance1 as $AttendanceValue)
								if($Att!="")
								$AttendanceString[]="$AttendanceValue-A-$DateTimeStamp";
								$AttendanceString=implode(",",$AttendanceString);
							if($AttendanceString!="")
							{
								$queryInsert="insert into studentattendance(Date,Attendance,DOL,DOLUsername) values('$AttendanceDate','$AttendanceString','$DateTimeStamp','rohit') ";
								mysqli_query($CONNECTION,$queryInsert);
								$Message="Attendance Added successfully!!";
								$Type=success;	
							}
						}
							
							
					}
				}
			}
		}
	print_r($Message);
	print_r($Type);
}else{
	echo"Invalid Request!!";
	exit();
}


}
?>