<?php  if($this->session->flashdata('message_type')) { ?>
<div class="row">
<div class="alert alert-success">
<strong><?=$this->session->flashdata('message')?></strong> 
</div>
</div>
<?php }?>
			<div class="row">
					<div class="col-md-4">
						<div class="panel panel-default">
										<div class="panel-heading">
											Add Fee
										</div>
									<div class="panel-body">
											<form role="form" class="form-horizontal" action="<?=base_url();?>master/insert_fee" method="post">
											<?php if(empty($id)==''){ ?>
														<input type="hidden" name="id" value="<?=$fee_update[0]->FeeId?>">
											<?php } ?>
											
											
													
													
																<div class="form-group">
																		<label class="col-sm-4 control-label" for="field-1">Class</label>
																		
																		<script type="text/javascript">
																				jQuery(document).ready(function($)
																				{
																					$("#s2example-1").select2({
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
																		<select class="form-control " required id="s2example-1" name="class">
																			<option></option>
																			<optgroup label="Select">
																	<?php foreach($class_info as $classinfo){ ?>
																	<option value="<?=$classinfo->ClassId?>" <?php if(empty($id)==''){ echo (!empty($fee_update[0]->SectionId==$classinfo->ClassId) ? "selected" : ''); } ?>><?=$classinfo->ClassName?>  </option>
																			<?php } ?>
																		</optgroup>
																		</select>
																</div>	
																	</div>
																
																
																
																<div class="form-group">
																		<label class="col-sm-4 control-label" for="field-1">Fee Tpye</label>
																		
																		<script type="text/javascript">
																				jQuery(document).ready(function($)
																				{
																					$("#s2example-2").select2({
																						placeholder: 'Select your Fee Type...',
																						allowClear: true
																					}).on('select2-open', function()
																					{
																						// Adding Custom Scrollbar
																						$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																					});
																					
																				});
																			</script>
																	<div class="col-sm-8">
																		<select class="form-control " id="s2example-2" required name="fee_type">
																			<option></option>
																			<optgroup label="Select">
																	<?php foreach($fee_type as $feetype){ ?>
																	<option value="<?=$feetype->MasterEntryId?>" <?php if(empty($id)==''){ echo (!empty($fee_update[0]->FeeType==$feetype->MasterEntryId) ? "selected" : ''); } ?>><?=$feetype->MasterEntryValue?>  </option>
																			<?php } ?>
																		</optgroup>
																		</select>
																</div>	
																	</div>	
																	
																	<?php //if(empty($id)==''){ ?> 
																	<div class="checkbox">
																	<label>TransPort</label>
											<label> 
												<input type="checkbox" name="yes" <?php echo (!empty($fee_update[0]->Distance) ? "Checked=checked"
												: '');?> value="Active">
												Check only if fee is Transport Fee
											</label>
										</div>
																	<?php // } ?>
																	
																	<div class="form-group">
																		<label class="col-sm-4 control-label" for="field-1">Distance</label>
																		
																		<script type="text/javascript">
																				jQuery(document).ready(function($)
																				{
																					$("#s2example-3").select2({
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
																		<select class="form-control " id="s2example-3" name="distance">
																			<option></option>
																			<optgroup label="Select">
																	<?php foreach($distance as $distance){ ?>
																	<option value="<?=$distance->MasterEntryId?>" <?php if(empty($id)==''){ echo (!empty($fee_update[0]->Distance==$distance->MasterEntryId) ? "selected" : ''); } ?> ><?=$distance->MasterEntryValue?></option>
																			<?php } ?>
																		</optgroup>
																		</select>
																</div>	
																	</div>	
																	
																	<div class="form-group">
																	<label class="control-label col-sm-4 ">Amount</label>
																	
																			<div class="col-sm-8">
																			<input type="text" class="form-control" required id="field-1" placeholder="Amount" name="amount" value="<?php echo (isset($fee_update[0]->Amount) ? $fee_update[0]->Amount : '');?>">
																		</div>

																		
																</div>
																	
																	
									<input type="submit" class="btn btn-info btn-single " value="Add">
													</form>
											
													<div class="form-group-separator"></div>
									</div>
						</div>
					</div>
	<div class="col-md-8">
		<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Listing All Fee</h3>
					
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
					
					<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						$("#example-1").dataTable({
							aLengthMenu: [
								[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]
							]
						});
					});
					</script>
					
						<table id="example-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Class</th>
											<th>Fee Tpe</th>
											<th>Amount</th>
											<th><a href="#"><i class="fa fa-edit"></i></a></th>
											
										</tr>
									</thead>
						
									<tfoot>
										<tr>
											<th>Class</th>
											<th>Fee Tpye</th>
											<th>Amount</th>
											<th><a href="#"><i class="fa fa-edit"></i></a></th>
											
										</tr>
									</tfoot>
						
									<tbody>
									<?php foreach($fee_info as $feeinfo){ ?>
										<tr>
											<td><?=$feeinfo->ClassName?> <?=$feeinfo->SectionName?></td>
											<td><?=$feeinfo->MasterEntryValue?></td>
											<td><?=$feeinfo->Amount?></td>
											<td><a href="<?=base_url();?>master/managefee/<?=$feeinfo->FeeId?>"><i class="fa fa-edit"></a></i></td>
										</tr>
									<?php } ?>
								</tbody>
						</table>
					
				</div>
			</div>
  </div>
</div>