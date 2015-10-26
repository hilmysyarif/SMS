<title>Print</title>

<style>
*{font-family:verdana; font-size:15px;}
table.fancy {  font-size:15px; background: whitesmoke;  border-collapse: collapse;  width:98%;  margin:0 auto;  margin-bottom:10px; margin-top:10px;}
//table.fancy tr:hover {   background: lightsteelblue !important;}
table.fancy th, table.fancy td {  border: 1px silver solid;  padding: 0.2em;  padding-left:10px; vertical-align:top}
table.fancy th {  background: gainsboro;  text-align: left;}
table.fancy caption {  margin-left: inherit;  margin-right: inherit;}
table.fancy tr:hover{background-color:#ddd;}
</style>
<center>
<div class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true" style="width:900px">

	<h1><center><?=strtoupper(isset($heading)?$heading:'')?></center></h1>
		
	
	<table cellspacing="0" class="table table-small-font table-bordered table-striped fancy" >
	<?php if(!empty($schoolmaterial)){ ?>
		<thead>
			<tr><?php if($on=="books"){?><th>Session</th><th>Class</th><?php } ?><th>Name</th><th>Quantity</th><th>Branch Price</th><th>Selling Price</th></tr>
		</thead>
								 											
			<tbody>
					<?php foreach($schoolmaterial as $schoolmaterial){   ?>
				<tr><?php if($on=="books"){ ?>
					<td><?=$schoolmaterial->Session?></td>
					<?php if($schoolmaterial->ClassId){ }?>
					<?php $filter=array('ClassId'=>$schoolmaterial->ClassId);$registration1= $this->utilities->get_masterval('class',$filter);  ?>
					<td><?=$registration1[0]->ClassName?> </td>
					<?php } ?>
					<td><?=$schoolmaterial->Name?></td>
					
					<td><?=$schoolmaterial->Quantity?></td>
					
					<td><?=$schoolmaterial->BranchPrice?></td>
					 
					<td><?=$schoolmaterial->SellingPrice?></td>
				</tr>
					<?php } ?>
		</tbody>
	<?php }elseif(!empty($calendar)){ ?>
		<thead>
			<tr><th>Title</th><th>Start Time</th><th>End TIme</th></tr>
		</thead>
								 											
			<tbody>
					<?php foreach($calendar as $calendar){   ?>
				<tr>
					<td><?=$calendar->Title?></td>
					
					<td><?php if(isset($calendar->StartTime)){echo date("d-m-Y",$calendar->StartTime);}?></td>
					
					<td><?php if(isset($calendar->EndTime)){echo date("d-m-Y",$calendar->EndTime);}?></td>
				</tr>
					<?php } ?>
		</tbody>
	<?php }elseif(!empty($call)){ ?>
		<thead>
			<tr><th>Name</th><th>Mobile</th><th>No Of Child</th><th>Date Of Call</th><th>Follow Up</th></tr>
		</thead>
								 											
			<tbody>
					<?php foreach($call as $call){   ?>
				<tr>
					<td><?=$call->Name?></td>
					
					<td><?=$call->Mobile?></td>
					
					<td><?=$call->NoOfChild?></td>
					
					<td><?php if(isset($call->DOC)){echo date("d-m-Y",$call->DOC);}?></td>
					
					<td><?php if(isset($call->FollowUpDate)){echo date("d-m-Y",$call->FollowUpDate);}?></td>
				</tr>
					<?php } ?>
		</tbody>
	<?php }elseif(!empty($ocall)){ ?>
		<thead>
			<tr><th>Name</th><th>Mobile</th><th>Remarks</th><th>Date Of Call</th><th>Duration</th><th>Follow Up</th></tr>
		</thead>
								 											
			<tbody>
					<?php foreach($ocall as $ocall){   ?>
				<tr>
					<td><?=$ocall->Name?></td>
					
					<td><?=$ocall->Mobile?></td>
					
					<td><?=$ocall->Remarks?></td>
					
					<td><?php if(isset($ocall->DOC)){echo date("d-m-Y",$ocall->DOC);}?></td>
					
					<td><?=$ocall->CallDuration?></td>
					
					<td><?php if(isset($ocall->FollowUpDate)){echo date("d-m-Y",$ocall->FollowUpDate);}?></td>
				</tr>
					<?php } ?>
		</tbody>
	<?php }elseif(!empty($enquiry)){ ?>
		<thead>
			<tr><th>Name</th><th>Mobile</th><th>No Of Child</th><th>Date Of Enquiry</th></tr>
		</thead>
								 											
			<tbody>
					<?php foreach($enquiry as $enquiry){   ?>
				<tr>
					<td><?=$enquiry->Name?></td>
					
					<td><?=$enquiry->Mobile?></td>
					
					<td><?=$enquiry->NoOfChild?></td>
					
					<td><?php if(isset($enquiry->EnquiryDate)){echo date("d-m-Y",$enquiry->EnquiryDate);}?></td>
					
				</tr>
					<?php } ?>
		</tbody>
	<?php }elseif(!empty($complaint)){ ?>
		<thead>
			<tr><th>Name</th><th>Mobile</th><th>Complaint Type</th><th>Date</th><th>Description</th></tr>
		</thead>
								 											
			<tbody>
					<?php foreach($complaint as $complaint){   ?>
				<tr>
					<td><?=$complaint->Name?></td>
					
					<td><?=$complaint->Mobile?></td>
					<?php $filter=array('MasterEntryId'=>$complaint->ComplaintType);$ComplaintType= $this->utilities->get_masterval('masterentry',$filter);  ?>
					<td><?=$ComplaintType[0]->MasterEntryValue?></td>
					
					<td><?php if(isset($complaint->DOC)){echo date("d-m-Y",$complaint->DOC);}?></td>
					
					<td><?=$complaint->Description?></td>
					
				</tr>
					<?php } ?>
		</tbody>
	<?php }elseif(!empty($visitor)){ ?>
		<thead>
			<tr><th>Name</th><th>Mobile</th><th>Purpose</th><th>Description</th><th>People</th><th>In Time</th><th>Out Time</th></tr>
		</thead>
								 											
			<tbody>
					<?php foreach($visitor as $visitor){   ?>
				<tr>
					<td><?=$visitor->Name?></td>
					
					<td><?=$visitor->Mobile?></td>
					<?php $filter=array('MasterEntryId'=>$visitor->Purpose);$visitor1= $this->utilities->get_masterval('masterentry',$filter);  ?>
					<td><?=$visitor1[0]->MasterEntryValue?></td>
					
					<td><?=$visitor->Description?></td>
					
					<td><?=$visitor->NoOfPeople?></td>
					
					<td><?php if(!empty($visitor->InDateTime)){echo date("d-m-Y h:m",$visitor->InDateTime);}?></td>
					
					<td><?php if(!empty($visitor->OutDateTime)){echo date("d-m-Y h:m",$visitor->OutDateTime);}?></td>
					
				</tr>
					<?php } ?>
		</tbody>
	<?php }elseif(!empty($registration)){ ?>
		<thead>
			<tr><th>Student Name</th><th>Father Name</th><th>Mobile</th><th>Class Registered</th><th>Date Of Registration</th></tr>
		</thead>
								 											
			<tbody>
					<?php foreach($registration as $registration){   ?>
				<tr>
					<td><?=$registration->StudentName?></td>
					
					<td><?=$registration->FatherName?></td>
					
					<td><?=$registration->Mobile?></td>
					<?php $filter=$registration->SectionId;$registration1= $this->utilities->get_classval('section',$filter);  ?>
					<td><?=$registration1[0]->ClassName?> <?=$registration1[0]->SectionName?></td>
					
					<td><?php if(!empty($registration->DOR)){echo date("d-m-Y h:m",$registration->DOR);}?></td>
					
				</tr>
					<?php } ?>
		</tbody>
	<?php }elseif(!empty($admission)){ ?>
		<thead>
			<tr><th>Adm No</th><th>Student Name</th><?php if(isset($login)!=''){ ?><th>Parents Username</th>
															<th>Parents Password</th>
															<th>Students Username</th>
															<th>Students Password</th><?php }else{?><th>Father Name</th><th>Class</th><th>Mobile</th><th>Date Of Admission</th><th>Address</th><th>Date O Birth</th><?php } ?></tr>
		</thead>
								 											
			<tbody>
					<?php foreach($admission as $admission){   ?>
				<tr>
					<td><?=$admission->AdmissionNo?></td>
					
					<td><?=$admission->StudentName?></td><?php if(isset($login)!=''){ ?><td><?=$admission->AdmissionNo?>@parents</td>
															<td><?=$admission->ParentsPassword?></td>
															<td><?=$admission->AdmissionNo?>@student</td>
															<td><?=$admission->StudentsPassword?></td><?php }else{?>
					
					<td><?=$admission->FatherName?></td>
					
					<td><?=$admission->ClassName?> <?=$admission->SectionName?></td>
					
					<td><?=$admission->Mobile?></td>
					
					<td><?php if(!empty($admission->Date)){echo date("d-m-Y h:m",$admission->Date);}?></td>
					
					<td><?=$admission->PresentAddress?></td>
					
					<td><?php if(!empty($admission->DOB)){echo date("d-m-Y ",$admission->DOB);}?></td>
					<?php } ?>
				</tr>
					<?php } ?>
		</tbody>
	<?php }elseif(!empty($staff)){ ?>
		<thead>
												<tr>
													<th>Name</th>
													
											<?php		for($rr=1;$rr<=$DaysInMonth;$rr++)
											{ ?>
										<th><?=$rr?></th>
											<?php } ?>
											<th>P</th>
											<th>A</th>
											<th>HD</th>
											<th>H</th>
											<th>OD</th>
											<th>PL</th>
												</tr>
											</thead>
										 
											<tfoot>
												<tr>
													<th>Name</th>
													<?php		for($rr=1;$rr<=$DaysInMonth;$rr++)
											{ ?>
										<th><?=$rr?></th>
											<?php } ?>
											<th>P</th>
											<th>A</th>
											<th>HD</th>
											<th>H</th>
											<th>OD</th>
											<th>PL</th>
												</tr>
											</tfoot>
										 
											<tbody>
											<?php $DateArray=''; foreach($row as $row2)
					{	
						$AttendanceArray[]=$row2->Attendance;
						$DateArray[]=date("d-m-Y",$row2->Date);
					}	foreach($row1 as $id){
						$StaffId=$id->StaffId; ?>
						<tr>
						<td><?=$id->StaffName?> <?=$id->StaffMobile?> (<?=$id->MasterEntryValue?>)</td>
						<?php						
						$A=$P=$H=$HD=$OD=$PL=0; 
						for($l=1;$l<=$DaysInMonth;$l++)
						{ 
							$Found=0;
							$l=str_pad($l,2,"0",STR_PAD_LEFT);
							$DateForSearch="$l-$SelectedMonth-$SelectedYear";
							if($DateArray!="")
							$SearchIndex=array_search($DateForSearch,$DateArray);
							else
							$SearchIndex=FALSE;
							if($SearchIndex===FALSE){ ?>
						<td>-</td>	 
						<?php	}
							else
							{
								$AllAttendanceOfDay=$AttendanceArray[$SearchIndex];
								$AllAttendanceOfDay=explode(",",$AllAttendanceOfDay);
								foreach($AllAttendanceOfDay as $AllAttendanceOfDayValue)
								{
									$AllAttendanceOfDayValue=explode("-",$AllAttendanceOfDayValue);
									if($AllAttendanceOfDayValue[0]==$StaffId)
									{
										$InTime=date("h:ia",$AllAttendanceOfDayValue[3]);
										$OutTime=date("h:ia",$AllAttendanceOfDayValue[4]);
										if($AllAttendanceOfDayValue[1]=="P")
										{ ?>
											<td><span class="badge badge-secondary pull-right " data-toggle="tooltip" data-placement="top" title="" data-original-title="In Time: <?=$InTime?> Out Time: <?=$OutTime?>">P</span></td>
										<?php	$P++;
										}
										elseif($AllAttendanceOfDayValue[1]=="A")
										{ ?>
											<td><span class="badge badge-danger pull-right" data-toggle="tooltip" data-placement="top" title="" data-original-title="In Time: <?=$InTime?> Out Time: <?=$OutTime?>">A</span></td>
										<?php	$A++;
										}
										elseif($AllAttendanceOfDayValue[1]=="HD")
										{ ?>
											<td><span class="badge badge-warning pull-right" data-toggle="tooltip" data-placement="top" title="" data-original-title="In Time: <?=$InTime?> Out Time: <?=$OutTime?>">HD</span></td>
									<?php		$HD++;
										}
										elseif($AllAttendanceOfDayValue[1]=="H")
										{ ?>
										<td><span class="badge badge-info pull-right" data-toggle="tooltip" data-placement="top" title="" data-original-title="In Time: <?=$InTime?> Out Time: <?=$OutTime?>">H</span></td>
										<?php	$H++;
										}
										elseif($AllAttendanceOfDayValue[1]=="OD")
										{ ?>
											<td><span class="badge badge-success pull-right" data-toggle="tooltip" data-placement="top" title="" data-original-title="In Time: <?=$InTime?> Out Time: <?=$OutTime?>">OD</span></td>
										<?php	$OD++;
										}
										elseif($AllAttendanceOfDayValue[1]=="PL")
										{ ?>
											<td><span class="badge badge-blue pull-right" data-toggle="tooltip" data-placement="top" title="" data-original-title="In Time: <?=$InTime?> Out Time: <?=$OutTime?>">PL</span></td>
									<?php		$PL++;
										}else{?>
											<td>-</td>
										<?php }
										$Found=1;
									}
								}
								if($Found!=1){ ?>
								<td>-</td>
								<?php 	} } 
					}  ?><td><?=$P?></td><td><?=$A?></td><td><?=$HD?></td><td><?=$H?></td><td><?=$OD?></td><td><?=$PL?></td></tr><?php } ?>
											</tbody>
	<?php }elseif(!empty($student)){ ?>
		<thead>
												<tr>
													<th>Name</th>
													<?php		for($rr=1;$rr<=$DaysInMonth;$rr++)
											{ ?>
										<th><?=$rr?></th>
											<?php } ?>
											<th>P</th>
											<th>A</th>
											<th>HD</th>
											<th>H</th>
											</tr>
											</thead>
										 
											<tfoot>
												<tr>
													<th>Name</th>
													<?php		for($rr=1;$rr<=$DaysInMonth;$rr++)
											{ ?>
										<th><?=$rr?></th>
											<?php } ?>
											<th>P</th>
											<th>A</th>
											<th>HD</th>
											<th>H</th>
											</tr>
											</tfoot>
										 
											<tbody>
												<?php $DateArray=''; foreach($row as $row2)
					{	
						$AttendanceArray[]=$row2->Attendance;
						$DateArray[]=date("d-m-Y",$row2->Date);
					}	foreach($row1 as $id){
						$AdmissionId=$id->AdmissionId; ?>
						<tr>
						<td><?=$id->StudentName?> F/n <?=$id->FatherName?> </td>
						<?php						
						$A=$P=$H=$HD=0; 
						for($l=1;$l<=$DaysInMonth;$l++)
						{ 
							$Found=0;
							$l=str_pad($l,2,"0",STR_PAD_LEFT);
							$DateForSearch="$l-$SelectedMonth-$SelectedYear";
							if($DateArray!="")
							$SearchIndex=array_search($DateForSearch,$DateArray);
							else
							$SearchIndex=FALSE;
							if($SearchIndex===FALSE){ ?>
						<td>-</td>	 
						<?php	}
							else
							{
								$AllAttendanceOfDay=$AttendanceArray[$SearchIndex];
								$AllAttendanceOfDay=explode(",",$AllAttendanceOfDay);
								foreach($AllAttendanceOfDay as $AllAttendanceOfDayValue)
								{
									$AllAttendanceOfDayValue=explode("-",$AllAttendanceOfDayValue);
									if($AllAttendanceOfDayValue[0]==$AdmissionId)
									{
										
										if($AllAttendanceOfDayValue[1]=="P")
										{ ?>
											<td><span class="badge badge-secondary pull-right " data-toggle="tooltip" data-placement="top" title="" >P</span></td>
										<?php	$P++;
										}
										elseif($AllAttendanceOfDayValue[1]=="A")
										{ ?>
											<td><span class="badge badge-danger pull-right" data-toggle="tooltip" data-placement="top" title="" >A</span></td>
										<?php	$A++;
										}
										elseif($AllAttendanceOfDayValue[1]=="HD")
										{ ?>
											<td><span class="badge badge-warning pull-right" data-toggle="tooltip" data-placement="top" title="" >HD</span></td>
									<?php		$HD++;
										}
										elseif($AllAttendanceOfDayValue[1]=="H")
										{ ?>
										<td><span class="badge badge-info pull-right" data-toggle="tooltip" data-placement="top" title="" >H</span></td>
										<?php	$H++;
										}else{?>
										<td>-</td>
										<?php }
										$Found=1;
									}
								}
								if($Found!=1){ ?>
								<td>-</td>
								<?php 	}} 
					}  ?><td><?=$P?></td><td><?=$A?></td><td><?=$HD?></td><td><?=$H?></td></tr><?php } ?>
											</tbody>
	<?php }elseif(!empty($fee)){ echo $print;?>
		
	
	
	</table>
		<p style="float:right;font-size:15px">Cashier Sign:</p>
	<?php }elseif(!empty($route)){ ?>
		<thead>
			<tr><th>SNO</th><th>Route Name</th><th>Vehicle Name</th><th>Stoppage</th></tr>
		</thead>
								 											
			<tbody>
					<?php $sno=1; foreach($route as $route){   ?>
				<tr>
					<td><?=$sno?></td>
					
					<td><?=$route->VehicleRouteName?></td>
					
					<td><?=$route->VehicleName?> <?=$route->VehicleNumber?></td>
					
					<td><?php $routename=explode(",",$route->Route); $i=1; foreach($routename as $routename){   $filter=array('MasterEntryId'=>$routename); $routesname= $this->utilities->get_usertype($filter);  echo $i;echo")";  echo $routesname[0]->MasterEntryValue; echo"<br>"; $i++; }?></td>
				</tr>
					<?php $sno++; } ?>
		</tbody>
	<?php }elseif(!empty($viewroute)){ ?>
		<thead>
			<tr><th>SNO</th><th>Stopage Name</th><th>Student Name</th></tr>
		</thead>
								 											
			<tbody>
					<?php $sno=1; foreach($viewroute as $viewroute){   ?>
				<tr>
					<td><?=$sno?></td>
					
					<td><?=$viewroute->MasterEntryValue?></td>
					
					<?php $studentname= $this->utilities->get_student_name($this->currentsession[0]->CurrentSession,$viewroute->Students);  ?>
					<td><?php foreach($studentname as $studentname){echo $studentname->StudentName; echo"<br>";}?></td>
				</tr>
					<?php $sno++; } ?>
		</tbody>
	<?php }elseif(!empty($stafflist)){ ?>
		<thead>
			<tr><th>Staff Name</th><th>Mobile</th><th>Designation</th><th>Date Of Joining</th></tr>
		</thead>
								 											
			<tbody>
					<?php foreach($stafflist as $stafflist){   ?>
				<tr>
					<td><?=$stafflist->StaffName?> (<?=$stafflist->StaffStatus?>)</td>
					
					<td><?=$stafflist->StaffMobile?></td>
					
					<td><?=$stafflist->MasterEntryValue?></td>
					
					<td><?php if(!empty($stafflist->StaffDOJ)){echo date("d-m-Y ",$stafflist->StaffDOJ);}?></td>
				</tr>
					<?php  } ?>
		</tbody>
	<?php }elseif(!empty($booklist)){ ?>
		<thead>
			<tr><th>Book Name</th><th>Author Name</th><th>Publisher</th><th>Purpose</th><th>Subject</th><th>Total Books</th></tr>
		</thead>
								 											
			<tbody>
					<?php foreach($booklist as $booklist){   ?>
				<tr>
					<td><?=$booklist->BookName?> </td>
					
					<td><?=$booklist->AuthorName?></td>
					
					<td><?=$booklist->Publisher?></td>
					
					<td><?=$booklist->MasterEntryValue?></td>
					
					<td><?=$booklist->SubjectName?></td>
					
					 <?php $filter=$booklist->BookId; $bookcount=$this->utilities->getbooktotal($filter);?>
											 <td><?=!empty($bookcount[0]->TotalBook)?$bookcount[0]->TotalBook:0?></td>  
				</tr>
					<?php  } ?>
		</tbody>
	<?php }?>
	</table>
	<?php if(empty($fee)){ ?><p style="float:right">Printed On: <?=$datetime?></p><?php } ?>
</div>	
</center>