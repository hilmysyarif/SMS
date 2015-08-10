<?php  if($this->session->flashdata('message_type')) { ?>
<div class="row">
<div class="alert alert-success">
<strong><?=$this->session->flashdata('message')?></strong> 
</div>
</div>
<?php }?>
	<div class="row">
					<div class="col-md-6">
					<!--Select student starts-->
							<div class="panel panel-color panel-gray">
											<div class="panel-heading">
												Select Student
											</div>
										<div class="panel-body">
												<form role="form" class="form-horizontal" action="<?=base_url();?>payments/get_fee" method="post">
												
												<div class="form-group">
																		<label class="control-label col-sm-4 ">Student</label>
																		
																			<script type="text/javascript">
																						jQuery(document).ready(function($)
																						{
																							$("#s2example-1").select2({
																								placeholder: 'Select Student',
																								allowClear: true
																							}).on('select2-open', function()
																							{
																								// Adding Custom Scrollbar
																								$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																							});
																							
																						});
																				</script>
																			<div class="col-sm-8">
																				<select class="form-control " id="s2example-1" name="admission">
																					<option></option>
																				
															<?php foreach($student_info as $student_info){ ?>
															<option  value="<?=$student_info->AdmissionId?>" <?php if(isset($admission)){ echo (!empty($student_info->AdmissionId==$admission) ? "selected" : ''); } ?>><?=$student_info->StudentName?> F/n <?=$student_info->FatherName?> <?=$student_info->Mobile?> <?=$student_info->ClassName?> <?=$student_info->SectionName?></option>
																													<?php  } ?>
																												</optgroup>
																											
																				</select>
																			</div>	
																	</div>
																	<div class="form-group pull-right" >
																	<input type="submit" class="btn btn-info btn-single " value="Proceed">
																	</div>
														</form>
												
										</div>
							</div>
								<!--Select student ends-->
								<?php if(isset($admission)){?>
								<!--Select fee stars---->
									<div class="panel panel-color panel-gray">
											<div class="panel-heading">
												<h3 class="panel-title">Select Fee For <?php if(isset($get_fee_details)){ echo $get_fee_details[0]->StudentName; echo "&nbsp";  echo "F/n" ; echo "&nbsp";  echo $get_fee_details[0]->FatherName ; echo "&nbsp"; echo"(";  echo $get_fee_details[0]->Mobile; echo")";} ?></h3>
											</div>
												<div class="panel-body">
																<form role="form" class="form-horizontal" action="<?=base_url();?>" method="post">
																		<?php  if(empty($id)==''){ ?>
																					<input type="hidden" name="id" value="<?php echo (isset($class_update[0]->ClassId) ? $class_update[0]->ClassId : '');?>">
																		<?php } ?>
																		<div class="form-group">
																			<label class="control-label col-sm-4 ">Select Fee</label>
																				<script type="text/javascript">
																						jQuery(document).ready(function($)
																						{
																							$("#s2example-2").select2({
																								placeholder: 'Select Fee',
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
																					
												<?php foreach($get_balance as $get_balance1){ ?>
												<?php $filter=array('FeeId' => $get_balance1->FeeType); $feety= $this->utilities->get_masterval('fee',$filter); 
													$filter=array('MasterEntryId' => $feety[0]->FeeType); $fee= $this->utilities->get_usertype($filter);  ?>
												<option  value="" ><?=$fee[0]->MasterEntryValue?> fee Balance: <?=$feety[0]->Amount-$get_balance1->Paid?></option>
													<?php  } ?>
																													</optgroup>
																												
																					</select>
																				</div>	
																		</div>
																		<div class="form-group">
																			<label class="control-label col-sm-4 ">Amount</label>
																				<div class="col-sm-8">
																					<input type="text" class="form-control" name="mother_name" value="" id="mother_name" placeholder="">
																				</div>	
																		</div>
																		<div class="form-group pull-right">						
																			<input type="submit" class="btn btn-info btn-single " value="Add In Fee List">
																		</div>
																		</br>
																</form>
																									
																<table class="table table-bordered table-striped" id="example-4">
																	<thead>
																		<tr>
																			<th>Fee Type</th>
																			<th>Amount</th>
																			<th>Paid</th>
																			<th>Balance</th>
																			
																		</tr>
																	</thead>
																 
																	
																 
																	<tbody>
																	<?php $amount=''; $paid=''; $bal='';  foreach($get_balance as $get_balance){?>
																		<tr>
													<?php $filter=array('FeeId' => $get_balance->FeeType); $feety= $this->utilities->get_masterval('fee',$filter); 
													$filter=array('MasterEntryId' => $feety[0]->FeeType); $fee= $this->utilities->get_usertype($filter); $amount=$amount+$feety[0]->Amount; $paid=$paid+$get_balance->Paid; $bal+=$feety[0]->Amount-$get_balance->Paid; ?>
																			<td><?=$fee[0]->MasterEntryValue?></td>
																			<td><?=$feety[0]->Amount?> INR</td>
																			<td><?=$get_balance->Paid?> INR</td>
																			<td><?=$feety[0]->Amount-$get_balance->Paid?> INR</td>
																		</tr>
																		<?php  } ?>
																		<tfoot><tr>
																		<td>Total</td>
																			<td><?=$amount?> INR</td>
																			<td><?=$paid?> INR</td>
																			<td><?=$bal?> INR</td>
																			</tr></tfoot>
																	</tbody>
																</table>
													</div>
												
											</div>
											
								<?php } ?>
										<!--Select fee ends-->
					</div>
<?php if(isset($admission)){?>
			<div class="col-md-6">
					<!--Select fee list starts-->
						<div class="panel panel-color panel-gray">
										<div class="panel-heading">
											Fee List To Be Paid By <?php if(isset($get_fee_details)){ echo $get_fee_details[0]->StudentName; echo "&nbsp";  echo "F/n" ; echo "&nbsp";  echo $get_fee_details[0]->FatherName ; echo "&nbsp"; echo"(";  echo $get_fee_details[0]->Mobile; echo")";} ?>
										</div>
								<div class="panel-body">
												<table class="table table-bordered table-striped" id="example-4">
														<thead>
															<tr>
																<th>Fee Type</th>
																<th>Amount</th>
																<th><i class="fa fa-times"></i></th>
																
															</tr>
														</thead>
													 
														
													 
														<tbody>
														<?php //foreach($regis as $rg){?>
															<tr>
																<td></td>
																<td></td>
																<td><i class="fa fa-times"></i></td>
															
																
															</tr>
															<?php //} ?>
														</tbody>
												</table>
									
											<form role="form" class="form-horizontal" action="<?=base_url();?>master/insert_class/section" method="post">
											<?php if(empty($id)==''){ ?>
														<input type="hidden" name="id" value="<?php echo (isset($section_update[0]->SectionId) ? $section_update[0]->SectionId : '');?>">
											<?php } ?>
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
																				<?php foreach($class_info as $classinfo){ ?>
																				<option value="<?=$classinfo->ClassId?>" <?php if(empty($id)==''){ echo (!empty($section_update[0]->ClassId==$classinfo->ClassId) ? "selected" : ''); } ?>><?=$classinfo->ClassName?></option>
																						<?php } ?>
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
																<input type="submit" class="btn btn-info btn-single " value="Pay">
															</div>
											</form>
								</div>
						
						</div>
						<!--Select fee list paid student starts-->
						<div class="panel panel-color panel-gray">
								<div class="panel-heading">
									<h3 class="panel-title">Fee List Paid By <?php if(isset($get_fee_details)){ echo $get_fee_details[0]->StudentName; echo "&nbsp";  echo "F/n" ; echo "&nbsp";  echo $get_fee_details[0]->FatherName ; echo "&nbsp"; echo"(";  echo $get_fee_details[0]->Mobile; echo")";} ?></h3>
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
											<th>Receipt No</th>
											<th>Amount</th>
											<th>Date</th>
											<th>Remarks</th>
											<th><i class="fa fa-times"></i></th>
											<th><i class="fa fa-print"></i></th>
											
										</tr>
									</thead>
								 
									
								 
									<tbody>
									<?php foreach($get_transaction as $get_transaction){?>
										<tr>
											<td><?=$get_transaction->TransactionId?></td>
											<td><?=$get_transaction->TransactionAmount?> INR</td>
											<td><?=date("d M Y,h:ia",$get_transaction->TransactionDate)?></td>
											<td><?=$get_transaction->TransactionRemarks?></td>
											<td><i class="fa fa-times"></i></td>
											<td><i class="fa fa-print"></i></td>
										</tr>
										<?php  } ?>
									</tbody>
								</table>
						</div>
					</div>
					<!--Select fee list paid student end-->
			</div>
<?php } ?>
    </div>
