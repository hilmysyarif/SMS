<?php  if($this->session->flashdata('message_type')) { ?>
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
											<form role="form" class="form-horizontal" action="<?=base_url();?>master/insert_account" method="post">
											<?php if(empty($id)==''){ ?>
														<input type="hidden" name="id" value="<?=$acc_update[0]->AccountId?>">
											<?php } ?>
											
											
											
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
																	<?php $filter=array('MasterEntryName' => 'UserType'); $user= $this->utilities->get_usertype($filter); ?>
																		<select class="form-control " id="s2example-1" name="manage_by">
																			<option></option>
																			<optgroup label="Select">
																	<?php foreach($user as $usertype){ ?>
																	<option value="<?=$usertype->MasterEntryId?>" <?php if(empty($id)==''){ echo (!empty($acc_update[0]->ManagedBy==$usertype->MasterEntryId) ? "selected" : ''); } ?>><?=$usertype->MasterEntryValue?></option>
																			<?php } ?>
																		</optgroup>
																		</select>
																</div>	

																		
																</div>
																
																<?php // if(empty($id)==''){ ?> 
																<div class="form-group">
																	<label class="control-label col-sm-4 ">	Transport</label>
																	<div class="col-sm-8">
																	<div class="checkbox">
																		<label>
																			<input type="checkbox" name="status" <?php echo (isset($acc_update[0]->AccountStatus) ? "Checked=checked"
																			: '');?> value="Active">
																		 Check only if Transport facility is required
																		</label>
																		</div>
																	</div>	
																	</div>	
																	<?php // } ?>
																
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
																		<select class="form-control " id="s2example-2" name="account_type">
																			<option></option>
																			<optgroup label="Select">
																			<?php $filter=array('MasterEntryName' => 'AccountType'); $user= $this->utilities->get_usertype($filter); ?>
																	<?php foreach($user as $usertype){ ?>
																	<option value="<?=$usertype->MasterEntryId?>" <?php if(empty($id)==''){ echo (!empty($acc_update[0]->AccountType==$usertype->MasterEntryId) ? "selected" : ''); } ?>><?=$usertype->MasterEntryValue?></option>
																			<?php } ?>
																		</optgroup>
																		</select>
																</div>	

																		
																</div>
																
																	
																	
																	
																	
																	
									<input type="submit" class="btn btn-info btn-single " value="Get Fee Structure">
													</form>
											
													<div class="form-group-separator"></div>
									</div>
						</div>
					</div>
	<div class="col-md-8">
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
				
				
				<form role="form" class="form-horizontal" action="<?=base_url();?>master/insert_account" method="post">
											<?php if(empty($id)==''){ ?>
														<input type="hidden" name="id" value="<?=$acc_update[0]->AccountId?>">
											<?php } ?>
											<div class="form-group">
												<label class="col-sm-4 control-label">Date Of Admission</label>
												
												<div class="col-sm-8">
													<div class="input-group">
														<input type="text" class="form-control datepicker" data-format="D, dd MM yyyy" name="soft_date" value="">
														
														<div class="input-group-addon">
															<a href="#"><i class="linecons-calendar"></i></a>
														</div>
													</div>
												</div>
											</div>
					
			 								<div class="form-group">
																	<label class="control-label col-sm-4 ">Admission No</label>
																	
																			<div class="col-sm-8">
																			<input type="text" class="form-control" id="field-1" placeholder="Placeholder" name="exam_name" value="<?php echo (isset($exam_update[0]->ExamName) ? $exam_update[0]->ExamName : '');?>">
																		</div>

																		
																</div>
																
																	
																	
																	<div class="form-group">
																	<label class="control-label col-sm-4 ">Admission Fee</label>
																	
																			<div class="col-sm-8">
																			<input type="text" class="form-control" id="field-1" placeholder="Placeholder" name="weightage" value="<?php echo (isset($exam_update[0]->Weightage) ? $exam_update[0]->Weightage : '');?>">
																		</div>

																		
																</div>
																
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Remarks</label>
																	
																			<div class="col-sm-8">
																			<textarea name="weightage" class="col-sm-12"></textarea>
																		</div>

																		
																</div>
																
																<input type="submit" class="btn btn-info btn-single " value="Confirm">
													</form>
																
																
																
																
					
				</div>
			</div>
  </div>
</div>