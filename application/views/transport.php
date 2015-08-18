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
												<form role="form" class="form-horizontal" action="<?=base_url();?>" method="post">
												
												<div class="form-group">
																			<label class="control-label col-sm-4 ">Vehicle Name</label>
																				<div class="col-sm-8">
																					<input type="text" class="form-control" name="vehicle_name" value="" id="mother_name" placeholder="">
																				</div>	
																		</div>
																		
																		<div class="form-group">
																			<label class="control-label col-sm-4 ">Vehicle Number</label>
																				<div class="col-sm-8">
																					<input type="text" class="form-control" name="vehicle_no" value="" id="mother_name" placeholder="">
																				</div>	
																		</div>
																		
																	<div class="form-group pull-right" >
																	<input type="submit" class="btn btn-info btn-single " value="Add">
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
												<form role="form" class="form-horizontal" action="<?=base_url();?>" method="post">
												
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
																				<select class="form-control " id="s2example-1" name="for">
																					<option></option>
																				
															<?php //foreach($student_info as $student_info){ ?>
															<option  value="<?php //=$student_info->AdmissionId?>" <?php //if(isset($admission)){ echo (!empty($student_info->AdmissionId==$admission) ? "selected" : ''); } ?>><?php //=$student_info->StudentName?> F/n <?php //=$student_info->FatherName?> </option>
																													<?php // } ?>
																												</optgroup>
																											
																				</select>
																			</div>	
																	</div>
																	
																	
																	
																	<div class="form-group">
																			<label class="control-label col-sm-4 ">Quantity</label>
																				<div class="col-sm-8">
																					<input type="text" class="form-control" name="amount" value="" id="mother_name" placeholder="">
																				</div>	
																		</div>
																		
																	<div class="form-group">
																			<label class="control-label col-sm-4 ">Rate Per Litre</label>
																				<div class="col-sm-8">
																					<input type="text" class="form-control" name="amount" value="" id="mother_name" placeholder="">
																				</div>	
																		</div>
																		
																		<div class="form-group">
																	<label class="control-label col-sm-4 ">Date</label>
																	
																			<div class="col-sm-8">
																			<div class="date-and-time">
																				<input type="text" class="form-control datepicker" data-format="D, dd MM yyyy">
																				<input type="text" class="form-control timepicker" data-template="dropdown" data-show-seconds="true" data-default-time="11:25 AM" data-show-meridian="true" data-minute-step="5" data-second-step="5" />
																			</div>
																		</div>	
																</div>
																
																<div class="form-group">
																			<label class="control-label col-sm-4 ">Receipt No</label>
																				<div class="col-sm-8">
																					<input type="text" class="form-control" name="amount" value="" id="mother_name" placeholder="">
																				</div>	
																		</div>
																
																<div class="form-group">
																<label class="control-label col-sm-4 ">Remark</label>
																<div class="col-sm-8">
																<textarea class="form-control"></textarea>
																</div>
																</div>
																
																
																<div class="form-group pull-right" >
																	<input type="submit" class="btn btn-info btn-single " value="Add">
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
												<form role="form" class="form-horizontal" action="<?=base_url();?>" method="post">
												
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
																				<select class="form-control " id="s2example-2" name="for">
																					<option></option>
																				
															<?php //foreach($student_info as $student_info){ ?>
															<option  value="<?php //=$student_info->AdmissionId?>" <?php //if(isset($admission)){ echo (!empty($student_info->AdmissionId==$admission) ? "selected" : ''); } ?>><?php //=$student_info->StudentName?> F/n <?php //=$student_info->FatherName?> </option>
																													<?php // } ?>
																												</optgroup>
																											
																				</select>
																			</div>	
																	</div>
																	
																	
																	
																	<div class="form-group">
																			<label class="control-label col-sm-4 ">Reading</label>
																				<div class="col-sm-8">
																					<input type="text" class="form-control" name="amount" value="" id="mother_name" placeholder="">
																				</div>	
																		</div>
																		
																	<div class="form-group">
																	<label class="control-label col-sm-4 ">Date</label>
																	
																			<div class="col-sm-8">
																			<div class="date-and-time">
																				<input type="text" class="form-control datepicker" data-format="D, dd MM yyyy">
																				<input type="text" class="form-control timepicker" data-template="dropdown" data-show-seconds="true" data-default-time="11:25 AM" data-show-meridian="true" data-minute-step="5" data-second-step="5" />
																			</div>
																		</div>	
																</div>
																
																<div class="form-group">
																<label class="control-label col-sm-4 ">Remark</label>
																<div class="col-sm-8">
																<textarea class="form-control"></textarea>
																</div>
																</div>
																
																
																<div class="form-group pull-right" >
																	<input type="submit" class="btn btn-info btn-single " value="Add">
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
								
								<table class="table table-bordered table-striped" id="example-4">
									<thead>
										<tr>
											<th>Vehicle Name</th>
											<th>Vehicle Number Name</th>
											<th><i class="fa fa-print"></i></th>
										</tr>
									</thead>
								 
									
								 
									<tbody>
									<?php //foreach($get_transaction as $get_transaction){?>
										<tr>
											<td>Bus<?php //=$get_transaction->TransactionId?></td>
											<td>mp 04 0005</td>
											<td><i class="fa fa-print"></i></td>
										</tr>
										<?php  //} ?>
									</tbody>
								</table>
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
																<form role="form" class="form-horizontal" action="<?=base_url();?>" method="post">
																		
																		<div class="form-group">
									<label class="col-sm-4 control-label" for="student_name" >From Date</label>
									<div class="col-sm-8">
										<div class="input-group">
											<input type="text" name="date" class="form-control datepicker" data-format="D, dd MM yyyy">
											
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
											<input type="text" name="date" class="form-control datepicker" data-format="D, dd MM yyyy">
											
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
																					<select class="form-control " id="s2example-2" name="class">
																						<option></option>
																					
												<?php //foreach($get_balance as $get_balance1){ ?>
												<?php //$filter=array('FeeId' => $get_balance1->FeeType); $feety= $this->utilities->get_masterval('fee',$filter); 
													//$filter=array('MasterEntryId' => $feety[0]->FeeType); $fee= $this->utilities->get_usertype($filter);  ?>
												<option  value="" ></option>
													<?php  //} ?>
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
																			<th><i class="fa fa-times"></i></th>
																			<th><i class="fa fa-times"></i></th>
																		</tr>
																	</thead>
																 
																	
																 
																	<tbody>
																			<td>Bus</td>
																			<td>mp 04 ca 2545</td>
																			<td>54</td>
																			<td>10 L</td>
																			<td>50/per L</td>
																			<td>20 august 2015</td>
																			<td><i class="fa fa-times"></i></td>
																			<td><i class="fa fa-times"></i></td>
																		</tr>
																		<?php  //} ?>
																		
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
																<form role="form" class="form-horizontal" action="<?=base_url();?>" method="post">
																		
																		<div class="form-group">
									<label class="col-sm-4 control-label" for="student_name" >From Date</label>
									<div class="col-sm-8">
										<div class="input-group">
											<input type="text" name="date" class="form-control datepicker" data-format="D, dd MM yyyy">
											
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
											<input type="text" name="date" class="form-control datepicker" data-format="D, dd MM yyyy">
											
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
																					<select class="form-control " id="s2example-2" name="class">
																						<option></option>
																					
												<?php //foreach($get_balance as $get_balance1){ ?>
												<?php //$filter=array('FeeId' => $get_balance1->FeeType); $feety= $this->utilities->get_masterval('fee',$filter); 
													//$filter=array('MasterEntryId' => $feety[0]->FeeType); $fee= $this->utilities->get_usertype($filter);  ?>
												<option  value="" ></option>
													<?php  //} ?>
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
																			<th><i class="fa fa-times"></i></th>
																			<th><i class="fa fa-times"></i></th>
																		</tr>
																	</thead>
																 
																	
																 
																	<tbody>
																			<td>Bus</td>
																			<td>mp 04 ca 2545</td>
																			<td>54</td>
																			<td>20 august 2015</td>
																			<td><i class="fa fa-times"></i></td>
																			<td><i class="fa fa-times"></i></td>
																		</tr>
																		<?php  //} ?>
																		
																	</tbody>
																</table>
													</div>
												
											</div>
	</div>
	
	
	</div>