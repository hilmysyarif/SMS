<title>Exam Report</title>
<?php if(!empty($examreportprint)){?>
<style>
*{font-family:verdana; font-size:10px;}
table.fancy {  font-size:10px; background: whitesmoke;  border-collapse: collapse;  width:98%;  margin:0 auto;  margin-bottom:10px; margin-top:10px;}
//table.fancy tr:hover {   background: lightsteelblue !important;}
table.fancy th, table.fancy td {  border: 1px silver solid;  padding: 0.2em;  padding-left:10px; vertical-align:top}
table.fancy th {  background: gainsboro;  text-align: left;}
table.fancy caption {  margin-left: inherit;  margin-right: inherit;}
table.fancy tr:hover{background-color:#ddd;}
</style>
<div class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">
		<h1>			
				<center><?=strtoupper($schoolinfo[0]->SchoolName)?> </br> <?=strtoupper($schoolinfo[0]->SchoolAddress)?> <?=strtoupper($schoolinfo[0]->District)?> <?=strtoupper($schoolinfo[0]->State)?></br></center>
				<center><?=$examreportprint[0]->Exam_Type?>   Report</center>
		</h1>
		<?php foreach($examreportprint as $examreportprint){   ?>
	
			<table cellspacing="0" class="table table-small-font table-bordered table-striped fancy" >
		<thead>
			<tr><th>Student Name:</th><td><?=$examreportprint->StudentName?></td> <th>Roll No:</th><td><?=$examreportprint->AdmissionNo?> </td> <th>Class Name:</th><td><?=$examreportprint->ClassName?> <?=$examreportprint->SectionName?></td><th>Date Of Exam</th><td><?php if(isset($examreportprint->DateOfExam)){echo date("d-m-Y",$examreportprint->DateOfExam);}?></td> </tr>
			
			<tr><th>Subject Name</th><th>Max Marks</th><th>Min Marks</th><th>Obtain Marks</th><th>Grade</th><th>Result</th><th>Evaluated By</th><th>Exam Date</th></tr>
		</thead>
								 											
		<tbody>
	
			<tr>
					<td><?=$examreportprint->SubjectName?></td>
				
					<td><?=$examreportprint->Max_Marks?></td>
					
					<td>None</td>
					
					<td><?=$examreportprint->Marks_Obtain?></td>
					
					<td><?=$examreportprint->Grade?></td>
					
					<td><?=$examreportprint->MasterEntryValue?></td>
					
					<td><?=$examreportprint->Evaluated_By?></td>
					
					<td><?php if(isset($examreportprint->DateOfExam)){echo date("d-m-Y",$examreportprint->DateOfExam);}?></td>
				</tr>
			
		</tbody>
	</table>
		
	<?php }?>
</div>	
<?php } if(!empty($examreportprintmarksheet)){?>
<link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap.css">
<style>
<!--*{font-family:verdana; }
table.fancy {  font-size:10px; background: whitesmoke;  border-collapse: collapse;  width:98%;  margin:0 auto;  margin-bottom:10px; margin-top:10px;}
//table.fancy tr:hover {   background: lightsteelblue !important;}
table.fancy th, table.fancy td {  border: 1px silver solid;  padding: 0.2em;  padding-left:10px; vertical-align:top}
table.fancy th {  background: gainsboro;  text-align: left;}
table.fancy caption {  margin-left: inherit;  margin-right: inherit;}
table.fancy tr:hover{background-color:#ddd;}-->
</style>

<div class="row" style="background: whitesmoke;padding:10px;margin:10px;border: 2px black solid">
	<div class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">
		<h2>
			<center>
				<div class="row">	
					<div class="col-md-1"><img src="http://localhost:80/SMS/assets/images/junctionerplogo.png"  width="100px" alt="" ></div>
					<div class="col-md-11">
						<?=strtoupper($schoolinfo[0]->SchoolName)?> </br> <?=strtoupper($schoolinfo[0]->SchoolAddress)?> <?=strtoupper($schoolinfo[0]->District)?> <?=strtoupper($schoolinfo[0]->State)?></br>
						<?=$examreportprintmarksheet[0]->ClassName?> <?=$examreportprintmarksheet[0]->SectionName?> <?=strtoupper($examreportprintmarksheet[0]->Exam_Type)?>   EXAM CERTIFICATE <?=$examreportprintmarksheet[0]->Session?>
					</div>
				</div>
			</center>
		</h2>
		<center><h3><CAPTION><EM>MARKSHEET</EM></CAPTION></h3></center>
			<TABLE  class="table table-small-font table-bordered table-striped fancy">
				
				<tr><th>CENTRE NO.</th><th>SCHOOL NO.</th><th>ENROLMENT/REGISTRATION NO.</th><th>REGULAR/PRIVATE</th><th>ROLL NUMBER</th></tr>
				<tr><td><?=$schoolinfo[0]->AffiliationNo?></td><td><?=$schoolinfo[0]->AffiliationNo?></td><td><?=$schoolinfo[0]->RegistrationNo?></td><td>REGULAR</td><td><?=$examreportprintmarksheet[0]->AdmissionNo?></td></tr>
					
			</TABLE>
			
			<table  class="table table-small-font table-bordered table-striped ">
				<tr><th>STUDENT'S NAME</th><td><?=strtoupper($examreportprintmarksheet[0]->StudentName)?></td></tr>
				<tr><th>FATHER'S NAME</th><td><?=strtoupper($examreportprintmarksheet[0]->FatherName)?></td></tr>
				<tr><th>MOTHER'S NAME</th><td><?=strtoupper($examreportprintmarksheet[0]->MotherName)?></td></tr>
				<tr><th>DATE OF BIRTH</th><td><?php if(!empty($examreportprintmarksheet[0]->DOB)){echo date("d-m-Y",$examreportprintmarksheet[0]->DOB);}?></td></tr>
				<tr><th>SCHOOL/CENTRE NAME</th><td><?=strtoupper($schoolinfo[0]->SchoolName)?>,(<?=strtoupper($schoolinfo[0]->District)?>)</td></tr>
			</table>
		
			<TABLE border="1" class="table table-small-font table-bordered table-striped ">
				
				
				<TR><TH rowspan="2">SUBJECTS<TH rowspan="2">MAX MARKS<TH rowspan="2">MIN THEO<TH rowspan="2">MIN PRACT<TH colspan="3">MARKS OBTAIN
						<TH rowspan="2">REMARKS
					<TR><TH>THEORY<TH>PRACT<TH>TOTAL
					<?php $maxtotal=''; $grndtotal=''; $fail=''; foreach($examreportprintmarksheet as $examreportprintmarksheet1){ $maxtotal[]=$examreportprintmarksheet1->Max_Marks; $grndtotal[]=$examreportprintmarksheet1->Marks_Obtain;?>
					<TR><Td><?=strtoupper($examreportprintmarksheet1->SubjectName)?><TD><?=$examreportprintmarksheet1->Max_Marks?><TD>None<TD>None<TD><?=$examreportprintmarksheet1->Marks_Obtain?> <?php if($examreportprintmarksheet1->MasterEntryValue=="Pass"){echo"P";}else{echo"F"; $fail=1;}?><TD><TD><?=$examreportprintmarksheet1->Marks_Obtain?><TD><?=strtoupper($examreportprintmarksheet1->Remarks)?>
					<?php } ?>
					<TR><Td><Td><?=array_sum($maxtotal)?><Td colspan="4">GRAND TOTAL<Td><?=array_sum($grndtotal)?>
					<?php $noarr=str_split(array_sum($grndtotal), 1); $str=''; 
					for($i=0;$i<=count($noarr)-1;$i++){
					if($noarr[$i]==1){ $str.="ONE ";} if($noarr[$i]==2){ $str.="TWO ";} if($noarr[$i]==3){ $str.="THREE ";} if($noarr[$i]==4){ $str.="FOUR ";} if($noarr[$i]==5){ $str.="FIVE ";} if($noarr[$i]==6){ $str.="SIX ";} if($noarr[$i]==7){ $str.="SEVEN ";} if($noarr[$i]==8){ $str.="EIGHT ";} if($noarr[$i]==9){ $str.="NINE ";} if($noarr[$i]==0){ $str.="ZERO ";} 
					}?>
					<TR><Td colspan="7">GRAND TOTAL IN WORDS  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <?=$str?>***
					<TR><Td colspan="7">RESULT  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if($fail==1){echo"FAIL";}else{echo"PASS";}?>
			</TABLE>
	</div>
	<div ><br>
	<h4><CAPTION><EM>SEAL OF THE PRINCIPAL</EM></CAPTION></h4><br><br><br>
	<h4><CAPTION><EM>SIGNATURE OF THE PRINCIPAL</EM></CAPTION></h4><br><br>
	</div>
</div>	
<?php } ?>