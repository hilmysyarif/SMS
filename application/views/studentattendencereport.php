<div class="row">
	<div class="col-sm-12">
			<div class="panel  panel-color panel-gray">
						<div class="panel-heading">
							<h3 class="panel-title">Select Class</h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
							</div>
						</div>
				<div class="panel-body">
						 <form role="form" class="form-horizontal" method="post" action="<?=base_url();?>attendences/studentattendancereport">
												<div class="form-group">
													<label class="col-sm-4 control-label" for="" >Class</label>
														<script type="text/javascript">
																jQuery(document).ready(function($)
																{
																	$("#s2example-1").select2({
																		placeholder: 'Select ...',
																		allowClear: true
																	}).on('select2-open', function()
																	{
																		// Adding Custom Scrollbar
																		$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																	});
																	
																});
															</script>
															<div class="col-sm-8">
																<select class="form-control " required id="s2example-1" name="class">
																	<option></option>
																	<?php foreach($class_section as $cls){ ?>
																						<option  value="<?=$cls->SectionId?>" <?php if(empty($sectionid)==''){ echo (!empty($cls->SectionId==$sectionid) ? "selected" : ''); } ?> ><?=$cls->ClassName?> <?=$cls->SectionName?></option>
																								<?php  } ?>
																</select>
															</div>	
												</div>
												<div class="form-group-separator"></div>
													<div class="form-group">
													<label class="col-sm-4 control-label" for="" >Month Year</label>
														<script type="text/javascript">
																jQuery(document).ready(function($)
																{
																	$("#s2example-2").select2({
																		placeholder: 'Select ...',
																		allowClear: true
																	}).on('select2-open', function()
																	{
																		// Adding Custom Scrollbar
																		$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																	});
																	
																});
															</script>
															<div class="col-sm-8">
																<select class="form-control " required id="s2example-2" name="month">
																	<option></option>
																	<?php foreach($month as $months){ ?>
																						<option  value="<?=$months?>" <?php if(empty($sectionid)==''){ echo (!empty($months==$attendance) ? "selected" : ''); } ?> ><?=$months?></option>
																								<?php  } ?>
																	</select>
															</div>	
												</div>
												<div class="form-group pull-right">
														<input  type="submit" name="submit" value="Get Student" class="btn btn btn-info btn-single "/>
												</div>
						</form>
				</div>
			</div>
	</div>
</div>

	 <!--php alert message-->
		<?php  if($this->session->flashdata('message_type')) { ?>
			<div class="row">
				<div class="alert alert-success">
				<strong><?=$this->session->flashdata('message')?></strong> 
				</div>
			</div>
		<?php }?>
	   <!--php alert message-->
	    <!--Student registratioN body starts-->
		<?php if(isset($sectionid)){?>
	   	<div class="row">
				
				<div class="col-sm-12">
					<div class="panel  panel-color panel-gray">
						<div class="panel-heading">
							<h3 class="panel-title">Student Attendance Report of <?=$attendance?></h3>
							<div class="panel-options">
							<span class="print-icon"><i class="fa fa-print"></i></span>
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
									
								</a>
							</div>
						</div>
						<div class="panel-body">
								<form role="form" class="form-horizontal">
								<div class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">
										<table cellspacing="0" class="table table-small-font table-bordered table-striped" >
											<thead>
												<tr>
													<th>Name</th>
													<?php		for($rr=1;$rr<=$DaysInMonth;$rr++)
											{ ?>
										<th><?=$rr?></th>
											<?php } ?>
											<th>P</th>
											<th>A</th>
											<th>HL</th>
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
											<th>HL</th>
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
						$A=$P=$H=$HL=0; 
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
										elseif($AllAttendanceOfDayValue[1]=="HL")
										{ ?>
											<td><span class="badge badge-warning pull-right" data-toggle="tooltip" data-placement="top" title="" >HD</span></td>
									<?php		$HD++;
										}
										elseif($AllAttendanceOfDayValue[1]=="H")
										{ ?>
										<td><span class="badge badge-info pull-right" data-toggle="tooltip" data-placement="top" title="" >H</span></td>
										<?php	$H++;
										}
										
										
										$Found=1;
									}
								}
								//if($Found!=1) ?>
								
						<?php 	} 
					}  ?><td><?=$P?></td><td><?=$A?></td><td><?=$HL?></td><td><?=$H?></td></tr><?php } ?>
											</tbody>
										</table>
									</div>	
								</form>
						</div>
					</div>
				</div>
		</div>	
	
<?php } ?>