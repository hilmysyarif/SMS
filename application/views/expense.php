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
												Expense
											</div>
										<div class="panel-body">
												<form role="form" class="form-horizontal" action="<?=base_url();?>" method="post">
												
												<div class="form-group">
																		<label class="control-label col-sm-4 ">For</label>
																		
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
																		<label class="control-label col-sm-4 ">Supplier</label>
																		
																			<script type="text/javascript">
																						jQuery(document).ready(function($)
																						{
																							$("#s2example-2").select2({
																								placeholder: 'Select.......',
																								allowClear: true
																							}).on('select2-open', function()
																							{
																								// Adding Custom Scrollbar
																								$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																							});
																							
																						});
																				</script>
																			<div class="col-sm-8">
																				<select class="form-control " id="s2example-2" name="supplier">
																					<option></option>
																				
															<?php //foreach($student_info as $student_info){ ?>
															<option  value="<?php //=$student_info->AdmissionId?>" <?php //if(isset($admission)){ echo (!empty($student_info->AdmissionId==$admission) ? "selected" : ''); } ?>><?php //=$student_info->StudentName?> </option>
																													<?php  //} ?>
																												</optgroup>
																											
																				</select>
																			</div>	
																	</div>
																	
																	<div class="form-group">
																			<label class="control-label col-sm-4 ">Amount</label>
																				<div class="col-sm-8">
																					<input type="text" class="form-control" name="amount" value="" id="mother_name" placeholder="">
																				</div>	
																		</div>
																		
																		<div class="form-group">
																	<label class="control-label col-sm-4 ">Date Of Expense</label>
																	
																			<div class="col-sm-8">
																			<div class="date-and-time">
																				<input type="text" class="form-control datepicker" data-format="D, dd MM yyyy">
																				<input type="text" class="form-control timepicker" data-template="dropdown" data-show-seconds="true" data-default-time="11:25 AM" data-show-meridian="true" data-minute-step="5" data-second-step="5" />
																			</div>
																		</div>	
																</div>
																
																<div class="form-group">
																<label class="control-label col-sm-4 ">Expense Remark</label>
																<div class="col-sm-8">
																<textarea class="form-control"></textarea>
																</div>
																</div>
																
																<div class="form-group">
																<label class="control-label col-sm-4 ">Amount Paid</label>
																<div class="col-sm-2">
																<input type="checkbox" name="amount_paid"/> 
																</div>
																<label class="control-label col-sm-3 ">Payment</label> 
																<div class="col-sm-3">
																<input type="text" class="form-control" name="mother_name" value="" id="payment" placeholder=""/>
																</div>
																</div>
																
																<div class="form-group">
																		<label class="control-label col-sm-4 ">Account</label>
																		
																			<script type="text/javascript">
																						jQuery(document).ready(function($)
																						{
																							$("#s2example-3").select2({
																								placeholder: 'Select...........',
																								allowClear: true
																							}).on('select2-open', function()
																							{
																								// Adding Custom Scrollbar
																								$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																							});
																							
																						});
																				</script>
																			<div class="col-sm-8">
																				<select class="form-control " id="s2example-3" name="account">
																					<option></option>
																				
															<?php //foreach($student_info as $student_info){ ?>
															<option  value="<?php //=$student_info->AdmissionId?>" <?php //if(isset($admission)){ echo (!empty($student_info->AdmissionId==$admission) ? "selected" : ''); } ?>><?php //=$student_info->StudentName?> </option>
																													<?php  //} ?>
																												</optgroup>
																											
																				</select>
																			</div>	
																	</div>
																	
																	<div class="form-group">
																	<label class="control-label col-sm-4 ">Date Of Payment</label>
																	
																			<div class="col-sm-8">
																			<div class="date-and-time">
																				<input type="text" class="form-control datepicker" data-format="D, dd MM yyyy">
																				<input type="text" class="form-control timepicker" data-template="dropdown" data-show-seconds="true" data-default-time="11:25 AM" data-show-meridian="true" data-minute-step="5" data-second-step="5" />
																			</div>
																		</div>	
																</div>
																
																<div class="form-group">
																<label class="control-label col-sm-4 ">Payment Remark</label>
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
								<!--Select student ends-->
								
							
											
								
										
					</div>
<?php //if(isset($admission)){?>
			<div class="col-md-8">
					<!--Select fee list starts-->
						<div class="panel panel-color panel-gray">
										<div class="panel-heading">
											Payment List 
										</div>
								<div class="panel-body">
												<table class="table table-bordered table-striped" id="example-4">
														<thead>
															<tr>
																<th>Receipt No</th>
																<th>Account</th>
																<th>Amount Paid</th>
																<th>Date Of Payment</th>
																<th><i class="fa fa-times"></i></th>
																
															</tr>
														</thead>
													 
														
													 
														<tbody>
														<?php //foreach($regis as $rg){?>
															<tr>
																<td>14</td>
																<td>15546523325</td>
																<td>50 INR</td>
																<td>03 august 2015 2:30 PM</td>
																<td><i class="fa fa-times"></i></td>
															
																
															</tr>
															<?php //} ?>
														</tbody>
												</table>
									
											<form role="form" class="form-horizontal" action="<?=base_url();?>" method="post">
											
											
													<div class="form-group">
																			<label class="control-label col-sm-4 ">Amount</label>
																				<div class="col-sm-8">
																					<input type="text" class="form-control" name="amount" value="" id="mother_name" placeholder="">
																				</div>	
																		</div>
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Account </label>
																	
																			<script type="text/javascript">
																				jQuery(document).ready(function($)
																				{
																					$("#s2example-3").select2({
																						placeholder: 'Select Account...',
																						allowClear: true
																					}).on('select2-open', function()
																					{
																						// Adding Custom Scrollbar
																						$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																					});
																					
																				});
																			</script>
																				<div class="col-sm-8">
																					<select class="form-control " id="s2example-3" name="class_name">
																						<option></option>
																						<optgroup label="Select">
																				<?php //foreach($class_info as $classinfo){ ?>
																				<option value="<?php //=$classinfo->ClassId?>" <?php //if(empty($id)==''){ echo (!empty($section_update[0]->ClassId==$classinfo->ClassId) ? "selected" : ''); } ?>><?php //=$classinfo->ClassName?></option>
																						<?php //} ?>
																					</optgroup>
																					</select>
																			</div>	
																</div>
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Date Of Payment</label>
																	
																			<div class="col-sm-8">
																			<div class="date-and-time">
																				<input type="text" class="form-control datepicker" data-format="D, dd MM yyyy">
																				<input type="text" class="form-control timepicker" data-template="dropdown" data-show-seconds="true" data-default-time="11:25 AM" data-show-meridian="true" data-minute-step="5" data-second-step="5" />
																			</div>
																		</div>	
																</div>
																
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Remarks</label>
																	
																			<div class="col-sm-8">
																			<textarea class="form-control"></textarea>
																		</div>	
																</div>
															<div class="form-group pull-right">
																<input type="submit" class="btn btn-info btn-single " value="Add Payment">
															</div>
											</form>
								</div>
						
						</div>
						<!--Select fee list paid student starts-->
						<div class="panel panel-color panel-gray">
								<div class="panel-heading">
									<h3 class="panel-title">Expense List</h3>
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
											<th>for</th>
											<th>Supplier Name</th>
											<th>Amount</th>
											<th>Paid</th>
											<th>Expense Date</th>
											<th>Remarks</th>
											<th><i class="fa fa-times"></th>
											<th><i class="fa fa-times"></i></th>
											<th><i class="fa fa-print"></i></th>
											
										</tr>
									</thead>
								 
									
								 
									<tbody>
									<?php //foreach($get_transaction as $get_transaction){?>
										<tr>
											<td>Staff<?php //=$get_transaction->TransactionId?></td>
											<td>Mohan</td>
											<td>120</td>
											<td>120</td>
											<td>27 june 2015 4:00 Pm</td>
											<td>Good</td>
											<td><i class="fa fa-times"></i></td>
											<td><i class="fa fa-times"></i></td>
											<td><i class="fa fa-print"></i></td>
										</tr>
										<?php  //} ?>
									</tbody>
								</table>
						</div>
					</div>
					<!--Select fee list paid student end-->
			</div>
<?php //} ?>
    </div>
