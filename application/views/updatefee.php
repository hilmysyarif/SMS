<?php  if($this->session->flashdata('message_type')) { ?>
<div class="row">
<div class="alert alert-success">
<strong><?=$this->session->flashdata('message')?></strong> 
</div>
</div>
<?php }?>
			<div class="row">
					<div class="col-md-6">
						<div class="panel panel-color panel-gray">
										<div class="panel-heading">
											Update Fee
										</div>
									<div class="panel-body">
											<form role="form" class="form-horizontal" action="<?=base_url();?>admission/get_fee" method="post">
										
											
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Class</label>
																	
																			<div class="col-sm-8">
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
										<select class="form-control " id="s2example-1" name="class" onchange="show_student(this.value,0)">
										<option>Please Select Class</option>
										
																	<?php foreach($class_info as $cls){ ?>
																	<option  value="<?=$cls->SectionId?>" <?php if(isset($class_info2)){ echo (!empty($cls->SectionId==$section) ? "selected" : ''); } ?> ><?=$cls->ClassName?> <?=$cls->SectionName?></option>
																			<?php  } ?>
																		
																	
										</select>
									</div>	
																		</div>	

																		
																</div>
																
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Student</label>
																	
																			<div class="col-sm-8">
																			<script type="text/javascript">
										jQuery(document).ready(function($)
										{
											$("#s2example-2").select2({
												placeholder: 'Select ...',
												allowClear: true
											}).on('select2-open', function()
											{
												$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
											});
											
										});
									</script>
									<div class="col-sm-8" id="show_student">
									
									
									
										<select class="form-control " id="s2example-2" name="student">
											<option  value="<?php if(isset($class_info2)){ echo $get_fee_structure[0]->AdmissionId;}?>" ><?php if(isset($class_info2)){ echo $get_fee_structure[0]->StudentName;}?> <?php if(isset($class_info2)){ echo $get_fee_structure[0]->FatherName;}?> <?php if(isset($class_info2)){ echo $get_fee_structure[0]->Mobile;}?></option>
																		</optgroup>
										</select>
										
									</div>	
																		</div>	

																		
																</div>
																
										<input type="submit" class="btn btn-info btn-single " value="Get Fee Structure">
													</form>
											
													<div class="form-group-separator"></div>
									</div>
						</div>
						</div>
					
						<div class="col-md-6">
							<?php if(isset($class_info2)){?>
						<div class="panel panel-color panel-gray">
										<div class="panel-heading">
											Update Class
										</div>
									<div class="panel-body">
											<form role="form" class="form-horizontal" action="<?=base_url();?>admission/updateclass" method="post">
											<input type="hidden" name="addmissionid" value="<?php echo (isset($admission) ? $admission : '');?>"/>
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Class </label>
																	
																			<script type="text/javascript">
																				jQuery(document).ready(function($)
																				{
																					$("#s2example-3").select2({
																						placeholder: 'Select your Class...',
																						allowClear: true
																					}).on('select2-open', function()
																					{
																						// Adding Custom Scrollbar
																						$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																					});
																					
																				});
																			</script>
																	<div class="col-sm-8">
																		<select class="form-control " id="s2example-3" name="class_name" onchange="show_fee(this.value,0)">
																			<option>Please Select Class</option>
										
																	<?php foreach($class_info2 as $cls2){ ?>
																	<option  value="<?=$cls2->SectionId?>" ><?=$cls2->ClassName?> <?=$cls2->SectionName?></option>
																			<?php  } ?>
																		</optgroup>
																		</select>
																</div>	

																		
																</div>
																<div class="form-group" id="show_fee">
																</div>
												
									<input type="submit" class="btn btn-info btn-single " value="Confirm">
													</form>
											
													<div class="form-group-separator"></div>
									</div>
						</div>
									<?php }else{?>
<div class="alert alert-info ">Please Select One Valid Student!! </div>
<?php } ?>
					</div>
					
			</div>
<div class="row">
  	<div class="col-md-6">
		<div class="panel panel-color panel-gray">
				<div class="panel-heading">
					<h3 class="panel-title">Transport Fee</h3>
					<div class="panel-body">
											<form role="form" class="form-horizontal" action="<?=base_url();?>" method="post">
											
											<input type="hidden" name="session" value="2015-2016">
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Password</label>
																	
																			<div class="col-sm-8">
																	<input type="text" class="form-control" name="password" value="" id="mother_name" placeholder="">
																		</div>	

																		
																</div>
																
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Distance</label>
																	
																			<div class="col-sm-8">
																			<script type="text/javascript">
										jQuery(document).ready(function($)
										{
											$("#s2example").select2({
												placeholder: 'Select ...',
												allowClear: true
											}).on('select2-open', function()
											{
												// Adding Custom Scrollbar
												$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
											});
											
										});
									</script>
									<div class="">
										<select class="form-control " id="s2example" name="distance">
											<option></option>
										
																	<?php $filter=array('MasterEntryName' => 'Distance'); $user= $this->utilities->get_usertype($filter); ?>
																	<?php foreach($user as $usertype){ ?>
																	<option value="<?=$usertype->MasterEntryId?>" <?php if(empty($id)==''){ echo (!empty($distance==$usertype->MasterEntryId) ? "selected" : ''); } ?>><?=$usertype->MasterEntryValue?></option>
																			<?php } ?>
																		</optgroup>
																	
										</select>
									</div>	
																		</div>	

																		
																</div>
																
										<input type="submit" class="btn btn-info btn-single " value="Save Transportation Fee">
													</form>
											
													<div class="form-group-separator"></div>
									</div>
					
				</div>
				
			</div>
			
  </div>
    <?php if(isset($class_info2)){?>
  <div class="col-md-6">

		<div class="panel panel-color panel-gray">
				<div class="panel-heading">
					<h3 class="panel-title">Set Fee Structure</h3>
					
					<div class="panel-body">
											<form role="form" class="form-horizontal" action="<?=base_url();?>admission/setfee_structure" method="post">
											
											<input type="hidden" name="addmissionid" value="<?php echo (isset($admission) ? $admission : '');?>"/>
											<input type="hidden" name="section" value="<?php echo (isset($section) ? $section : '');?>"/>
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Date Of Promotion</label>
																	
																			<div class="col-sm-8">
													<div class="date-and-time">
											<input readonly type="text" name="DOP" class="form-control datepicker" data-format="D, dd MM yyyy" value="<?=date("d-m-Y",$get_fee_structure[0]->Date)?>">
											<input type="text"  class="form-control timepicker" data-template="dropdown" data-show-seconds="true" data-default-time="11:25 AM" data-show-meridian="true" data-minute-step="5" data-second-step="5" />
										</div>
																		</div>	

																		
																</div>
																
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Admission No</label>
																	
																			<div class="col-sm-8">
																			<input type="text" class="form-control" name="admission_no" value="<?=$get_fee_structure[0]->AdmissionNo?>" id="mother_name" placeholder="">
																		</div>	

																		
																</div>
																<?php if(!empty($fee_type)) { foreach($fee_type as $fee_types){ 
																$fee_remove_underscope=explode("-",$fee_types);
																?>
																<div class="form-group">
																<?php $filter=array('FeeId' => $fee_remove_underscope[0]); $feety= $this->utilities->get_masterval('fee',$filter);
																
																$filter=array('MasterEntryId' => $feety[0]->FeeType); $fee= $this->utilities->get_usertype($filter); ?>
																	<label class="control-label col-sm-4 "><?=$fee[0]->MasterEntryValue?></label>
																	
																			<div class="col-sm-8">
																			<input type="text" class="form-control" name="feeamount[]" value="<?=$fee_remove_underscope[1]?>"  >
																			<input type="hidden" class="form-control" name="feeid[]" value="<?=$fee_remove_underscope[0]?>"  >
																		</div>	

																		
																</div>
																<?php } } ?>
																
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Remarks</label>
																	
																			<div class="col-sm-8">
																			<textarea class="form-control" name="remarks"><?=$get_fee_structure[0]->Remarks?></textarea>
																		</div>	

																		
																</div>
																
										<input type="submit" class="btn btn-info btn-single " value="Confirm">
													</form>
											
													<div class="form-group-separator"></div>
													
													
									</div>
				</div>
				
			</div>

  </div>
  <?php }?>
</div>
<?php if(isset($class_info2)){?>
<div class="row">

<div class="col-md-6">
					<div class="panel panel-color panel-gray">
						<div class="panel-heading">
							<h3 class="panel-title">Fee Payment Details</h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
								
							</div>
						</div>
						<div class="panel-body">
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
								<th>Fee Name</th>
								<th>Amount</th>
								<th>Paid</th>
								<th>Balance</th>
								
							</tr>
						</thead>
					 
						<tfoot>
							<tr>
								<th>Fee Name</th>
								<th>Amount</th>
								<th>Paid</th>
								<th>Balance</th>
							</tr>
						</tfoot>
					 
						<tbody>
																	<?php $amount=''; $paid=''; $bal='';  foreach($fee_type as $fee_type1){
																		$fee_type2=explode("-",$fee_type1);?>
																		<tr>
													<?php $filter=array('FeeId' => $fee_type2[0]); $feety= $this->utilities->get_masterval('fee',$filter); 
													$filter=array('MasterEntryId' => $feety[0]->FeeType); $fee= $this->utilities->get_usertype($filter); 
													
													$remainbal1=$fee_type2[1];
													$paidamount=0;
															foreach($get_balance as $bal2){
																if($fee_type2[0]==$bal2->FeeType){
																	$paidamount=$bal2->Paid;
																	$remainbal1=$fee_type2[1]-$bal2->Paid;
																}
															}
													
													$amount=$amount+$feety[0]->Amount; $paid=$paid+$paidamount; $bal+=$remainbal1; ?>
																			<td><?=$fee[0]->MasterEntryValue?></td>
																			<td><?=$fee_type2[1]?> INR</td>
																			<td><?=$paidamount?> INR</td>
																			<td><?=$remainbal1?> INR</td>
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
				</div>
				
</div> <?php }?>