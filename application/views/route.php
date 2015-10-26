<?php  if($this->session->flashdata('message_type')) { ?>
<div class="row">
<div class="alert alert-success">
<strong><?=$this->session->flashdata('message')?></strong> 
</div>
</div>
<?php }?>
	<div class="row">
	<div class="col-md-6">
					<!--Select fee list starts-->
						<div class="panel panel-color panel-gray">
										<div class="panel-heading">
											Listing All Vehicle Route 
											<div class="panel-options">
									<a href="<?=base_url();?>master/prints/route" target="_blank"><i class="fa fa-print"></i></a>
										<a href="#" data-toggle="panel">
											<span class="collapse-icon">&ndash;</span>
											<span class="expand-icon">+</span>
										</a>
										
									</div>
										</div>
								<div class="panel-body">
								
								<div class="table-responsive">	
						<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						$("#example-3").dataTable({
							
						});
					});
					</script>
												<table class="table table-bordered table-striped" id="example-3">
														<thead>
															<tr>
																<th>SNO</th>
																<th>To</th>
																<th>Route Name</th>
																<th>Vehicle</th>
																<th>Stoppage</th>
																<th><i class="fa fa-edit"></i></th>
																
															</tr>
														</thead>
													 
														
													 
														<tbody>
														<?php $sno=1; foreach($route_list as $rl){ ?>
															<tr>
																<td><?=$sno?></td>
																<td><?=$rl->MasterEntryValue?></td>
																<td><a href="<?=base_url();?>transports/route/viewroute/<?=$rl->VehicleRouteId?>" class="visited"><?=$rl->VehicleRouteName?></a></td>
																<td><?=$rl->VehicleName?> <?=$rl->VehicleNumber?></td>
																
																
																<td><?php $routename=explode(",",$rl->Route); $i=1; foreach($routename as $routename){   $filter=array('MasterEntryId'=>$routename); $routesname= $this->utilities->get_usertype($filter);  echo $i;echo")";  echo $routesname[0]->MasterEntryValue; echo"<br>"; $i++; }?></td>
																
																<td><a href="<?=base_url();?>transports/route/updateroute/<?=$rl->VehicleRouteId?>"><i class="fa fa-edit"></i></a></td>
															
																
															</tr>
															<?php $sno++; } ?>
														</tbody>
												</table>
												</div>
												</div>
									<div class="panel-heading">
											Add Route
										</div>
										<div class="panel-body">
											<form role="form" class="form-horizontal" action="<?=base_url();?>transports/insert_route" method="post">
											<?php if(isset($routeid)){ ?>
							<input type="hidden" name="routeid" value="<?=$routeid?>"/>
							<?php } ?>
											<div class="form-group">
																			<label class="control-label col-sm-4 ">Route Name</label>
																				<div class="col-sm-8">
																					<input required type="text" class="form-control" name="routename" value="<?php echo (isset($route_update[0]->VehicleRouteName) ? $route_update[0]->VehicleRouteName : '');?>" id="mother_name" placeholder="">
																				</div>	
																		</div>
											
																<div class="form-group">
																	<label class="control-label col-sm-4 ">To </label>
																	
																			<script type="text/javascript">
																				jQuery(document).ready(function($)
																				{
																					$("#s2example-3").select2({
																						placeholder: 'Select To...',
																						allowClear: true
																					}).on('select2-open', function()
																					{
																						// Adding Custom Scrollbar
																						$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																					});
																					
																				});
																			</script>
																				<div class="col-sm-8">
																					<select required class="form-control " id="s2example-3" name="to">
																						<option></option>
																						<optgroup label="Select">
																				<?php $filter=array('MasterEntryName'=>'RouteTo'); $to= $this->utilities->get_usertype($filter); foreach($to as $to){ ?>
																				<option value="<?=$to->MasterEntryId?>" <?php if(empty($routeid)==''){ echo (!empty($to->MasterEntryId==$route_update[0]->RouteTo) ? "selected" : ''); } ?>><?=$to->MasterEntryValue?></option>
																						<?php } ?>
																					</optgroup>
																					</select>
																			</div>	
																</div>
																
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Vehicle </label>
																	
																			<script type="text/javascript">
																				jQuery(document).ready(function($)
																				{
																					$("#s2example-2").select2({
																						placeholder: 'Select Vehicle...',
																						allowClear: true
																					}).on('select2-open', function()
																					{
																						// Adding Custom Scrollbar
																						$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																					});
																					
																				});
																			</script>
																				<div class="col-sm-8">
																					<select required class="form-control " id="s2example-2" name="vehicle">
																						<option></option>
																						<optgroup label="Select">
																				<?php foreach($vehicle_list as $showvehicle){?>
															<option  value="<?=$showvehicle->VehicleId?>" <?php if(isset($routeid)){ echo (!empty($showvehicle->VehicleId==$route_update[0]->VehicleId) ? "selected" : ''); } ?>><?=$showvehicle->VehicleName?> <?=$showvehicle->VehicleNumber?></option>
																													<?php  } ?>
																					</optgroup>
																					</select>
																			</div>	
																</div>
																
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Route </label>
																	
																			<script type="text/javascript">
																				jQuery(document).ready(function($)
																				{
																					$("#s2example-1").select2({
																						placeholder: 'Select Route...',
																						allowClear: true
																					}).on('select2-open', function()
																					{
																						// Adding Custom Scrollbar
																						$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																					});
																					
																				});
																			</script>
																				<div class="col-sm-8">
																					<select class="form-control " id="s2example-1" name="routestop[]" multiple>
																						<option></option>
																						<optgroup label="Select">
																				<?php $filter=array('MasterEntryName'=>'RouteStoppage'); $to= $this->utilities->get_usertype($filter); foreach($to as $to1){ ?>
																				<option required value="<?=$to1->MasterEntryId?>" <?php if(empty($routeid)==''){
																					 $route=explode(",",$route_update[0]->Route);
																					foreach($route as $route){
																				echo (!empty($to1->MasterEntryId==$route) ? "selected" : ''); }} ?>><?=$to1->MasterEntryValue?></option>
																						<?php } ?>
																					</optgroup>
																					</select>
																			</div>	
																</div>
																
																
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Remarks</label>
																	
																			<div class="col-sm-8">
																			<textarea class="form-control" name="remark"><?php echo (isset($route_update[0]->VehicleRouteRemarks) ? $route_update[0]->VehicleRouteRemarks : '');?></textarea>
																		</div>	
																</div>
															<div class="form-group pull-right">
																<input type="submit" class="btn btn-info btn-single " name="add" value="Add">
															</div>
											</form>
								</div>
						
						</div>
						</div>
						
						<div class="col-md-6">
					<!--Select student starts-->
					<?php if(isset($viewrouteid)){ ?>
							<div class="panel panel-color panel-gray">
											<div class="panel-heading">
												Add Student Detail TO <?=$route_single[0]->VehicleRouteName?>
											</div>
										<div class="panel-body">
												<form role="form" class="form-horizontal" action="<?=base_url();?>transports/insert_routedetails" method="post">
													<?php if(isset($viewrouteid)){ ?>
							<input type="hidden" name="routeid" value="<?=$route_single[0]->VehicleRouteId?>"/>
							<?php } ?>
							<?php if(isset($updetailid)){ ?>
							<input type="hidden" name="updetailid" value="<?=$updetailid?>"/>
							<?php } ?>
												<div class="form-group">
																		<label class="control-label col-sm-4 ">Stoppage</label>
																		
																			<script type="text/javascript">
																						jQuery(document).ready(function($)
																						{
																							$("#s2example-6").select2({
																								placeholder: 'Select....',
																								allowClear: true
																							}).on('select2-open', function()
																							{
																								// Adding Custom Scrollbar
																								$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																							});
																							
																						});
																				</script>
																			<div class="col-sm-8">
																				<select class="form-control " required id="s2example-6" name="stoppage">
																					<option></option>
																				
															<?php  foreach($to as $to2){ ?>
																				<option value="<?=$to2->MasterEntryId?>" <?php if(empty($updetailid)==''){ echo (!empty($to2->MasterEntryId==$routedetails_up[0]->RouteStoppageId) ? "selected" : ''); } ?>><?=$to2->MasterEntryValue?></option>
																						<?php } ?>
																												</optgroup>
																											
																				</select>
																			</div>	
																	</div>
																	
																	
																	
																	<div class="form-group">
																		<label class="control-label col-sm-4 ">Student</label>
																		
																			<script type="text/javascript">
																						jQuery(document).ready(function($)
																						{
																							$("#s2example-5").select2({
																								placeholder: 'Select....',
																								allowClear: true
																							}).on('select2-open', function()
																							{
																								// Adding Custom Scrollbar
																								$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																							});
																							
																						});
																				</script>
																			<div class="col-sm-8">
																				<select class="form-control " required id="s2example-5" name="student">
																					<option></option>
																				
															<?php foreach($student as $student_info){ ?>
															<option  value="<?=$student_info->AdmissionId?>" <?php if(isset($updetailid)){ echo (!empty($student_info->AdmissionId==$routedetails_up[0]->Students) ? "selected" : ''); } ?>><?=$student_info->StudentName?> F/n <?=$student_info->FatherName?> </option>
																													<?php  } ?>
																												</optgroup>
																											
																				</select>
																			</div>	
																	</div>
																	
																<div class="form-group pull-right" >
																	<input type="submit" class="btn btn-info btn-single " name="add" value="Add">
																	</div>
														</form>
												
										</div>
							</div>
							
					<div class="panel panel-color panel-gray">
								<div class="panel-heading">
									<h3 class="panel-title">Listing <?=$route_single[0]->VehicleRouteName?> Students</h3>
									<div class="panel-options">
									<a href="<?=base_url();?>master/prints/viewroute/<?=$viewrouteid?>" target="_blank"><i class="fa fa-print"></i></a>
										<a href="#" data-toggle="panel">
											<span class="collapse-icon">&ndash;</span>
											<span class="expand-icon">+</span>
										</a>
										
									</div>
								</div>
						<div class="panel-body">
								<div class="table-responsive">	
						<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						$("#example-4").dataTable({
							
						});
					});
					</script>
								<table class="table table-bordered table-striped" id="example-4">
									<thead>
										<tr>
											<th>SNo</th>
											<th>Stoppage Name</th>
											<th>Student</th>
											<th>Last Updated</th>
											<th><i class="fa fa-edit"></i></th>
											
										</tr>
									</thead>
								 
									
								 
									<tbody>
									<?php $serial=1; foreach($routedetails_list as $routedetails_list){?>
										<tr>
											<td><?=$serial?></td>
											<td><?=$routedetails_list->MasterEntryValue?></td>
											<?php $filter=array('AdmissionId'=>$routedetails_list->Students); $studentname= $this->utilities->get_student_name($this->currentsession[0]->CurrentSession,$routedetails_list->Students);  ?>
											<td><?php foreach($studentname as $studentname){echo $studentname->StudentName; echo"<br>";}?></td>
											<td><?php if($routedetails_list->DOE){ echo date("d M Y, h:ia",$routedetails_list->DOE); } ?></td>
											<td><a href="<?=base_url();?>transports/route/viewroute/<?=$route_single[0]->VehicleRouteId?>/updateroutedetail/<?=$routedetails_list->VehicleRouteDetailId?>"><i class="fa fa-edit"></i></a></td>
										</tr>
										<?php  $serial++; } ?>
									</tbody>
								</table>
								</div>
						</div>
					</div>
					<?php } ?>
					<!--Select fee list paid student end-->
			</div>
							
					
						
	</div>