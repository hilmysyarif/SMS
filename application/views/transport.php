<?php  if($this->session->flashdata('message_type')) { ?>
<div class="row">
<div class="alert alert-success">
<strong><?=$this->session->flashdata('message')?></strong> 
</div>
</div>
<?php }?>
	<div class="row">
					<div class="col-md-4">
					<!--Select student starts-->
							<div class="panel panel-color panel-gray">
											<div class="panel-heading">
												Add Vehicle
											</div>
										<div class="panel-body">
												<form role="form" class="form-horizontal" action="<?=base_url();?>transports/insert_vehicle" method="post">
												<?php if(isset($vehicleid)){ ?>
							<input type="hidden" name="vehicleid" value="<?=$vehicleid?>"/>
							<?php } ?>
												<div class="form-group">
																			<label class="control-label col-sm-4 ">Vehicle Name</label>
																				<div class="col-sm-8">
																					<input type="text" required class="form-control" name="vehicle_name" value="<?php echo (isset($vehicle_up[0]->VehicleName) ? $vehicle_up[0]->VehicleName : '');?>" id="mother_name" placeholder="">
																				</div>	
																		</div>
																		
																		<div class="form-group">
																			<label class="control-label col-sm-4 ">Vehicle Number</label>
																				<div class="col-sm-8">
																					<input type="text"  required class="form-control" name="vehicle_no" value="<?php echo (isset($vehicle_up[0]->VehicleNumber) ? $vehicle_up[0]->VehicleNumber : '');?>" id="mother_name" placeholder="">
																				</div>	
																		</div>
																		
																	<div class="form-group pull-right" >
																	<input type="submit" class="btn btn-info btn-single " name="add" value="Add">
																	</div>
														</form>
												
										</div>
							</div>
								<!--Select student ends-->
								
										
					</div>
					
					<div class="col-md-4">
					<div class="panel panel-color panel-gray">
											<div class="panel-heading">
												Add Fuel
											</div>
										<div class="panel-body">
												<form role="form" class="form-horizontal" action="<?=base_url();?>transports/insert_fuel" method="post">
												<?php if(isset($fuelid)){ ?>
							<input type="hidden" name="fuelid" value="<?=$fuelid?>"/>
							<?php } ?>
												<div class="form-group">
																		<label class="control-label col-sm-4 ">Vehicle</label>
																		
																			<script type="text/javascript">
																						jQuery(document).ready(function($)
																						{
																							$("#s2example-1").select2({
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
																				<select class="form-control " required id="s2example-1" name="vehicle">
																					<option></option>
																				
															<?php foreach($vehicle as $showvehicle){?>
															<option  value="<?=$showvehicle->VehicleId?>" <?php if(isset($fuelid)){ echo (!empty($showvehicle->VehicleId==$fuel_up[0]->VehicleId) ? "selected" : ''); } ?>><?=$showvehicle->VehicleName?> <?=$showvehicle->VehicleNumber?></option>
																													<?php  } ?>
																												</optgroup>
																											
																				</select>
																			</div>	
																	</div>
																	
																	
																	
																	<div class="form-group">
																			<label class="control-label col-sm-4 ">Quantity</label>
																				<div class="col-sm-8">
																					<input type="text" required class="form-control" name="quantity" value="<?php echo (isset($fuel_up[0]->Quantity) ? $fuel_up[0]->Quantity : '');?>" id="mother_name" placeholder="">
																				</div>	
																		</div>
																		
																	<div class="form-group">
																			<label class="control-label col-sm-4 ">Rate Per Litre</label>
																				<div class="col-sm-8">
																					<input type="text" required class="form-control" name="rate" value="<?php echo (isset($fuel_up[0]->Rate) ? $fuel_up[0]->Rate : '');?>" id="mother_name" placeholder="">
																				</div>	
																		</div>
																		
																		<div class="form-group">
																	<label class="control-label col-sm-4 ">Date</label>
																	
																			<div class="col-sm-8">
																			<div class="date-and-time">
																				<input type="text" required class="form-control datepicker" data-format="D, dd MM yyyy" name="dofuel" value="<?php if(isset($fuel_up[0]->DOF)){echo date("d-m-Y H:i",$fuel_up[0]->DOF);}?>">
																				<input type="text" name="tofuel" class="form-control timepicker" data-template="dropdown" data-show-seconds="true" data-default-time="11:25 AM" data-show-meridian="true" data-minute-step="5" data-second-step="5" />
																			</div>
																		</div>	
																</div>
																
																<div class="form-group">
																			<label class="control-label col-sm-4 ">Receipt No</label>
																				<div class="col-sm-8">
																					<input type="text" required class="form-control" name="receiptno" value="<?php echo (isset($fuel_up[0]->ReceiptNo) ? $fuel_up[0]->ReceiptNo : '');?>" id="mother_name" placeholder="">
																				</div>	
																		</div>
																
																<div class="form-group">
																<label class="control-label col-sm-4 ">Remark</label>
																<div class="col-sm-8">
																<textarea class="form-control" name="remark"><?php echo (isset($fuel_up[0]->Remarks) ? $fuel_up[0]->Remarks : '');?></textarea>
																</div>
																</div>
																
																
																<div class="form-group pull-right" >
																	<input type="submit" class="btn btn-info btn-single " name="add" value="Add">
																	</div>
														</form>
												
										</div>
							</div>
						</div>
						
					<div class="col-md-4">
					<div class="panel panel-color panel-gray">
											<div class="panel-heading">
												Add Reading
											</div>
										<div class="panel-body">
												<form role="form" class="form-horizontal" action="<?=base_url();?>transports/insert_reading" method="post">
												<?php if(isset($readingid)){ ?>
							<input type="hidden" name="readingid" value="<?=$readingid?>"/>
							<?php } ?>
												<div class="form-group">
																		<label class="control-label col-sm-4 ">Vehicle</label>
																		
																			<script type="text/javascript">
																						jQuery(document).ready(function($)
																						{
																							$("#s2example-2").select2({
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
																				<select class="form-control " required id="s2example-2" name="vehicle">
																					<option></option>
																				
															<?php foreach($vehicle as $showvehicle){?>
															<option  value="<?=$showvehicle->VehicleId?>" <?php if(isset($readingid)){ echo (!empty($showvehicle->VehicleId==$reading_up[0]->VehicleId) ? "selected" : ''); } ?>><?=$showvehicle->VehicleName?> <?=$showvehicle->VehicleNumber?></option>
																													<?php  } ?>
																												</optgroup>
																											
																				</select>
																			</div>	
																	</div>
																	
																	
																	
																	<div class="form-group">
																			<label class="control-label col-sm-4 ">Reading</label>
																				<div class="col-sm-8">
																					<input type="text" required class="form-control" name="reading" value="<?php echo (isset($reading_up[0]->Reading) ? $reading_up[0]->Reading : '');?>" id="mother_name" placeholder="">
																				</div>	
																		</div>
																		
																	<div class="form-group">
																	<label class="control-label col-sm-4 ">Date</label>
																	
																			<div class="col-sm-8">
																			<div class="date-and-time">
																				<input type="text" required name="doreading" value="<?php if(isset($reading_up[0]->DOR)){echo date("d-m-Y H:i",$reading_up[0]->DOR);}?>" class="form-control datepicker" data-format="D, dd MM yyyy">
																				<input type="text" name="toreading" class="form-control timepicker" data-template="dropdown" data-show-seconds="true" data-default-time="11:25 AM" data-show-meridian="true" data-minute-step="5" data-second-step="5" />
																			</div>
																		</div>	
																</div>
																
																<div class="form-group">
																<label class="control-label col-sm-4 ">Remark</label>
																<div class="col-sm-8">
																<textarea class="form-control" name="remark"><?php echo (isset($reading_up[0]->Remarks) ? $reading_up[0]->Remarks : '');?></textarea>
																</div>
																</div>
																
																
																<div class="form-group pull-right" >
																	<input type="submit" class="btn btn-info btn-single " name="add" value="Add">
																	</div>
														</form>
												
										</div>
							</div>
						</div>
</div>
<div class="row">
<div class="col-sm-4">
<div class="panel panel-color panel-gray">
								<div class="panel-heading">
									<h3 class="panel-title">Listing All Vehicle</h3>
									<div class="panel-options">
										<a href="#" data-toggle="panel">
											<span class="collapse-icon">&ndash;</span>
											<span class="expand-icon">+</span>
										</a>
										
									</div>
								</div>
						<div class="panel-body">
								<div class="table-responsive">	
								<table class="table table-bordered table-striped" id="example-4">
									<thead>
										<tr>
											<th>Vehicle Name</th>
											<th>Vehicle Number Name</th>
											<th><i class="fa fa-edit"></i></th>
										</tr>
									</thead>
								 
									
								 
									<tbody>
									<?php foreach($vehicle as $showvehicle){?>
										<tr>
											<td><?=$showvehicle->VehicleName?></td>
											<td><?=$showvehicle->VehicleNumber?></td>
											<td><a href="<?=base_url();?>transports/transport/vehicle/<?=$showvehicle->VehicleId?>"><i class="fa fa-edit"></a></i></td>
										</tr>
										<?php  } ?>
									</tbody>
								</table>
						</div>
						</div>
					</div>
					</div>
	</div>
	
	<div class="row">
	
	<div class="col-sm-6">
	<div class="panel panel-color panel-gray">
											<div class="panel-heading">
												<h3 class="panel-title">Fuel Report </h3>
											</div>
												<div class="panel-body">
																<form role="form" class="form-horizontal" action="<?=base_url();?>transports/transport" method="post">
																		
																		<div class="form-group">
									<label class="col-sm-4 control-label" for="student_name" >From Date</label>
									<div class="col-sm-8">
										<div class="input-group">
											<input type="text" name="fuelstartingdate" value="<?=$fuelstartingdate?>" class="form-control datepicker" data-format="D, dd MM yyyy">
											
											<div class="input-group-addon">
												<a href="#"><i class="linecons-calendar"></i></a>
											</div>
										</div>
									</div>
								</div>
										
<div class="form-group">
									<label class="col-sm-4 control-label" for="student_name" >To Date</label>
									<div class="col-sm-8">
										<div class="input-group">
											<input type="text" name="fuelenddate" value="<?=$fuelenddate?>" class="form-control datepicker" data-format="D, dd MM yyyy">
											
											<div class="input-group-addon">
												<a href="#"><i class="linecons-calendar"></i></a>
											</div>
										</div>
									</div>
								</div>
										
																		<div class="form-group">
																			<label class="control-label col-sm-4 ">Vehicle</label>
																				<script type="text/javascript">
																						jQuery(document).ready(function($)
																						{
																							$("#s2example-3").select2({
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
																					<select class="form-control " id="s2example-3" name="fuelvehicleid">
																						<option></option>
																					
												<?php foreach($vehicle as $showvehicle){?>
															<option  value="<?=$showvehicle->VehicleId?>" <?php if(isset($fuelvehicleid)){ echo (!empty($showvehicle->VehicleId==$fuelvehicleid) ? "selected" : ''); } ?>><?=$showvehicle->VehicleName?> <?=$showvehicle->VehicleNumber?></option>
																													<?php  } ?>
																													</optgroup>
																												
																					</select>
																				</div>	
																		</div>
																		
																		<div class="form-group pull-right">						
																			<input type="submit" class="btn btn-info btn-single " value="Get Report">
																		</div>
																		</br>
																</form>
																									
																<table class="table table-bordered table-striped" id="example-4">
																	<thead>
																		<tr>
																			<th>Name</th>
																			<th>Number</th>
																			<th>Receipt No</th>
																			<th>Quantity</th>
																			<th>Rate</th>
																			<th>Date</th>
																			<th><i class="fa fa-edit"></i></th>
																			<th><i class="fa fa-times"></i></th>
																		</tr>
																	</thead>
																 
																	
																 
																	<tbody>
																	<?php foreach($fuel as $showfuel){?>
																	<tr>
																			<td><?=$showfuel->VehicleName?></td>
																			<td><?=$showfuel->VehicleNumber?></td>
																			<td><?=$showfuel->ReceiptNo?></td>
																			<td><?=$showfuel->Quantity?></td>
																			<td><?=$showfuel->Rate?></td>
																			<td><?=date("d M Y",$showfuel->DOF)?></td>
																			<td><a href="<?=base_url();?>transports/transport/fuel/<?=$showfuel->FuelId?>"><i class="ffa fa-edit"></i></a></td>
																			<td><i class="fa fa-times"></i></td>
																		</tr>
																		<?php  } ?>
																		
																	</tbody>
																</table>
													</div>
												
											</div>
	</div>
	
	<div class="col-sm-6">
	<div class="panel panel-color panel-gray">
											<div class="panel-heading">
												<h3 class="panel-title">Reading Report </h3>
											</div>
												<div class="panel-body">
																<form role="form" class="form-horizontal" action="<?=base_url();?>transports/transport" method="post">
																		
																		<div class="form-group">
									<label class="col-sm-4 control-label" for="student_name" >From Date</label>
									<div class="col-sm-8">
										<div class="input-group">
											<input type="text" name="readingstartingdate" value="<?=$readingstartingdate?>" class="form-control datepicker" data-format="D, dd MM yyyy">
											
											<div class="input-group-addon">
												<a href="#"><i class="linecons-calendar"></i></a>
											</div>
										</div>
									</div>
								</div>
										
<div class="form-group">
									<label class="col-sm-4 control-label" for="student_name" >To Date</label>
									<div class="col-sm-8">
										<div class="input-group">
											<input type="text" name="readingenddate" value="<?=$readingenddate?>" class="form-control datepicker" data-format="D, dd MM yyyy">
											
											<div class="input-group-addon">
												<a href="#"><i class="linecons-calendar"></i></a>
											</div>
										</div>
									</div>
								</div>
										
																		<div class="form-group">
																			<label class="control-label col-sm-4 ">Vehicle</label>
																				<script type="text/javascript">
																						jQuery(document).ready(function($)
																						{
																							$("#s2example-4").select2({
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
																					<select class="form-control " id="s2example-4" name="readingvehicleid">
																						<option></option>
																					
												<?php foreach($vehicle as $showvehicle){?>
															<option  value="<?=$showvehicle->VehicleId?>" <?php if(isset($readingvehicleid)){ echo (!empty($showvehicle->VehicleId==$readingvehicleid) ? "selected" : ''); } ?>><?=$showvehicle->VehicleName?> <?=$showvehicle->VehicleNumber?></option>
																													<?php  } ?>
																													</optgroup>
																												
																					</select>
																				</div>	
																		</div>
																		
																		<div class="form-group pull-right">						
																			<input type="submit" class="btn btn-info btn-single " value="Get Report">
																		</div>
																		</br>
																</form>
																									
																<table class="table table-bordered table-striped" id="example-4">
																	<thead>
																		<tr>
																			<th>Name</th>
																			<th>Number</th>
																			<th>Reading</th>
																			<th>Date</th>
																			<th><i class="fa fa-edit"></i></th>
																			<th><i class="fa fa-times"></i></th>
																		</tr>
																	</thead>
																 
																	
																 
																	<tbody>
																		<?php foreach($reading as $showreading){?>
																	<tr>
																			<td><?=$showreading->VehicleName?></td>
																			<td><?=$showreading->VehicleNumber?></td>
																			<td><?=$showreading->Reading?></td>
																			<td><?=date("d M Y",$showreading->DOR)?></td>
																			<td><a href="<?=base_url();?>transports/transport/reading/<?=$showreading->VehicleReadingId?>"><i class="fa fa-edit"></i></a></td>
																			<td><i class="fa fa-times"></i></td>
																		</tr>
																		<?php  } ?>
																		
																	</tbody>
																</table>
													</div>
												
											</div>
	</div>
	
	
	</div>