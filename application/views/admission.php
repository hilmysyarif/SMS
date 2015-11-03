<?php  if($this->session->flashdata('message_type')=='success') { ?>
<div class="row">
<div class="alert alert-success">
<strong><?=$this->session->flashdata('message')?></strong> 
</div>
</div>
<?php }?>

			<div class="row">
					<div class="col-md-4">
						<div class="panel panel-color panel-gray">
										<div class="panel-heading">
											Student Admission
										</div>
									<div class="panel-body">
											<form role="form" class="form-horizontal" action="<?=base_url();?>admission/admission_student" method="post">
											
											<div class="form-group">
																	<label class="control-label col-sm-4 ">Select Student</label>
																	
																			<script type="text/javascript">
																				jQuery(document).ready(function($)
																				{
																					$("#s2example-1").select2({
																						placeholder: 'Select your Student...',
																						allowClear: true
																					}).on('select2-open', function()
																					{
																						// Adding Custom Scrollbar
																						$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																					});
																					
																				});
																			</script>
																	<div class="col-sm-8">
																	<?php  $student= $this->utilities->get_student_admission(!empty($this->currentsession[0]->CurrentSession)?$this->currentsession[0]->CurrentSession:'');  ?>
																		<select class="form-control " id="s2example-1" name="student">
																			<option></option>
																			<optgroup label="Select">
																	<?php foreach($student as $student){ ?>
																	<option value="<?=!empty($student->RegistrationId)?$student->RegistrationId:''?>,<?=$student->ClassId?>,<?=$student->SectionId?>" <?php if(!empty($id)){ echo (!empty($id==$student->RegistrationId) ? "selected" : ''); } ?>><?=$student->StudentName?> <?=$student->FatherName?> <?=$student->Mobile?> <?=$student->ClassName?> <?=$student->SectionName?></option>
																			<?php } ?>
																		</optgroup>
																		</select>
																</div>	

																		
																</div>
																
																<div class="form-group">
																	<label class="control-label col-sm-4 ">	Transport</label>
																	<div class="col-sm-8">
																	<div class="checkbox">
																		<label>
																			<input type="checkbox" name="transport" <?php echo (!empty($transport) ? "Checked=checked"
																			: '');?> value="Yes">
																		 Check only if Transport facility is required
																		</label>
																		</div>
																	</div>	
																	</div>	
																	
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Distance</label>
																	
																			<script type="text/javascript">
																				jQuery(document).ready(function($)
																				{
																					$("#s2example-2").select2({
																						placeholder: 'Select your Distance...',
																						allowClear: true
																					}).on('select2-open', function()
																					{
																						// Adding Custom Scrollbar
																						$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																					});
																					
																				});
																			</script>
																	<div class="col-sm-8">
																		<select class="form-control " id="s2example-2" name="distance">
																			<option></option>
																			<optgroup label="Select">
																			<?php $filter=array('MasterEntryName' => 'Distance'); $user= $this->utilities->get_usertype($filter); ?>
																	<?php foreach($user as $usertype){ ?>
																	<option value="<?=$usertype->MasterEntryId?>" <?php if(empty($id)==''){ echo (!empty($distance==$usertype->MasterEntryId) ? "selected" : ''); } ?>><?=$usertype->MasterEntryValue?></option>
																			<?php } ?>
																		</optgroup>
																		</select>
																</div>	

																		
																</div>
											<input type="submit" class="btn btn-info btn-single " name="submit" value="Get Fee Structure">
													</form>
											
													<div class="form-group-separator"></div>
									</div>
						</div>
					</div>
					
	<div class="col-md-8">
	<?php  if(isset($id)){ ?>
		<div class="panel panel-color panel-gray">
				<div class="panel-heading">
					<h3 class="panel-title">Set Fee Structure</h3>
					
					<div class="panel-options">
						<a href="#" data-toggle="panel">
							<span class="collapse-icon">&ndash;</span>
							<span class="expand-icon">+</span>
						</a>
						<a href="#" data-toggle="remove">
							&times;
						</a>
					</div>
				</div>
				<div class="panel-body">
				
				
				<form role="form" class="form-horizontal" action="<?=base_url();?>admission/insert_admission" method="post">
											<?php if(empty($id)==''){ ?>
														<input type="hidden" name="id" value="<?=$id?>">
											<?php } ?>
											<input type="hidden" name="section" value="<?=$section?>">
											<div class="form-group">
												<label class="col-sm-4 control-label">Date Of Admission</label>
												
												<div class="col-sm-8">
													<div class="input-group">
														<input readonly type="text" class="form-control datepicker" data-format="D, dd MM yyyy" name="DOA" value="">
														
														<div class="input-group-addon">
															<a href="#"><i class="linecons-calendar"></i></a>
														</div>
													</div>
												</div>
											</div>
					
			 								<div class="form-group">
																	<label class="control-label col-sm-4 ">Admission No</label>
																	
																			<div class="col-sm-8">
																			<input type="text" class="form-control" id="field-1" placeholder="Placeholder" name="admission_no" value="">
																		</div>

																		
																</div>
																
																	
																	<?php foreach($fee_info as $fee_info){ ?>
																	<div class="form-group">
																	<label class="control-label col-sm-4 "><?=$fee_info->MasterEntryValue?></label>
																	<span>Actual Fee: <?=$fee_info->Amount?> INR</span>
																			<div class="col-sm-8">
																			<input type="text" class="form-control" id="field-1" placeholder="Placeholder" name="amount[]" value="<?=$fee_info->Amount?>">
																		</div>
																	<input type="hidden"  name="feeid[]" value="<?=$fee_info->FeeId?>">
																		
																</div>
																<?php } ?>
																
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Remarks</label>
																	
																			<div class="col-sm-8">
																			<textarea name="remarks" class=" form-control"></textarea>
																		</div>

																		
																</div>
																
																<input type="submit" class="btn btn-info btn-single " value="Confirm">
													</form>
																
																
																
																
					
				</div>
			</div>
	<?php  }elseif($this->session->flashdata('message_type')=='error') { ?>
<div class="row">
<div class="alert alert-danger">
<strong><?=$this->session->flashdata('message')?></strong> 
</div>
</div>
<?php }else{ ?>
  <div class="alert alert-info">Please Select One Student!! </div>
  <?php }?>
  </div>

</div>