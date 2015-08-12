<div class="row">
	<div class="col-sm-12">
			<div class="panel  panel-color panel-gray">
						<div class="panel-heading">
							<h3 class="panel-title">Select Month</h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
							</div>
						</div>
				<div class="panel-body">
						 <form role="form" class="form-horizontal" method="post" action="">
												<div class="form-group">
													<label class="col-sm-4 control-label" for="" >Month Year</label>
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
																<select class="form-control " id="s2example-1" name="month">
																	<option></option>
																<?php foreach($month as $month1){ ?>
																	<option  value="<?=$month1?>" <?php if(empty($attendance)==''){ echo (!empty($attendance==$month1) ? "selected" : ''); } ?> ><?=$month1?></option>
																	<?php } ?>
																</select>
															</div>	
												</div>
												<div class="form-group-separator"></div>
												<div class="form-group pull-right">
														<input  type="submit" name="submit" value="Get" class="btn btn btn-info btn-single "/>
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
		<?php if(isset($attendance)){?>
	   	<div class="row">
				
				<div class="col-sm-12">
					<div class="panel  panel-color panel-gray">
						<div class="panel-heading">
							<h3 class="panel-title">Staff Attendance Report of <?=$attendance?></h3>
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
											<td><span class="badge badge-secondary pull-right">P</span></td>
										<?php	$P++;
										}
										elseif($AllAttendanceOfDayValue[1]=="A")
										{ ?>
											<td><span class="badge badge-danger pull-right">A</span></td>
										<?php	$A++;
										}
										elseif($AllAttendanceOfDayValue[1]=="HD")
										{ ?>
											<td><span class="badge badge-warning pull-right">HD</span></td>
									<?php		$HD++;
										}
										elseif($AllAttendanceOfDayValue[1]=="H")
										{ ?>
										<td><span class="badge badge-info pull-right">H</span></td>
										<?php	$H++;
										}
										elseif($AllAttendanceOfDayValue[1]=="OD")
										{ ?>
											<td><span class="badge badge-success pull-right">OD</span></td>
										<?php	$OD++;
										}
										elseif($AllAttendanceOfDayValue[1]=="PL")
										{ ?>
											<td><span class="badge badge-blue pull-right">PL</span></td>
									<?php		$PL++;
										}
										$Found=1;
									}
								}
								//if($Found!=1) ?>
								
						<?php 	} 
					}  ?><td><?=$P?></td><td><?=$A?></td><td><?=$HD?></td><td><?=$H?></td><td><?=$OD?></td><td><?=$PL?></td></tr><?php } ?>
											</tbody>
										</table>
									</div>	
								</form>
						</div>
					</div>
				</div>
		</div>	
	
<?php } ?>