<?php  if($this->session->flashdata('message_type')) { ?>
<div class="row">
<div class="alert alert-success">
<strong><?=$this->session->flashdata('message')?></strong> 
</div>
</div>
<?php }?>
			<div class="row">
					<div class="col-md-6">
						<div class="panel panel-default">
										<div class="panel-heading">
											Add New Template
										</div>
									<div class="panel-body">
											<form role="form" class="form-horizontal" action="<?=base_url();?>master/insert_salarystructure" method="post">
											<?php if(empty($id)==''){ ?>
														<input type="hidden" name="id" value="<?=$salarystructure_update[0]->SalaryStructureId?>">
											<?php } ?>
											
													<div class="form-group">
																	<label class="control-label col-sm-4 ">Template Name</label>
																	
																			<div class="col-sm-8">
																			<input type="text" class="form-control" id="field-1" placeholder="Template Name" name="templatename" value="<?php echo (isset($salarystructure_update[0]->SalaryStructureName) ? $salarystructure_update[0]->SalaryStructureName : '');?>">
																		</div>

																		
																</div>
											
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Fixed Salary</label>
																	
																			<script type="text/javascript">
																				jQuery(document).ready(function($)
																				{
																					$("#s2example-1").select2({
																						placeholder: 'Select your Fixed Salary...',
																						allowClear: true
																					}).on('select2-open', function()
																					{
																						// Adding Custom Scrollbar
																						$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																					});
																					
																				});
																			</script>
																	<div class="col-sm-8">
																		<select class="form-control " id="s2example-1" name="fixedsalary">
																			<option></option>
																			<optgroup label="Select">
																	<?php foreach($fixedsalary as $fixedsalary){ ?>
																	<option value="<?=$fixedsalary->SalaryHeadId?>" <?php if(empty($id)==''){ echo (!empty($salarystructure_update[0]->FixedSalaryHead==$fixedsalary->SalaryHeadId) ? "selected" : ''); } ?> ><?=$fixedsalary->SalaryHead?>(<?=$fixedsalary->Code?>)</option>
																			<?php } ?>
																		</optgroup>
																		</select>
																</div>	

																		
																</div>
																		
									<input type="submit" class="btn btn-info btn-single " value="Add">
													</form>
											
													<div class="form-group-separator"></div>
									</div>
						</div>
						</div>
						<!--<?php if(empty($id)==78){ ?>
						<div class="col-md-6">
						<div class="panel panel-default">
										<div class="panel-heading">
											Salary Structure "xyz"
										</div>
									<div class="panel-body">
											<form role="form" class="form-horizontal" action="<?=base_url();?>master/insert_masterentry" method="post">
											<?php if(empty($id)==''){ ?>
														<input type="hidden" name="id" value="<?=$masterentry_update[0]->MasterEntryId?>">
											<?php } ?>
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Salary Head </label>
																	
																			<script type="text/javascript">
																				jQuery(document).ready(function($)
																				{
																					$("#s2example-1").select2({
																						placeholder: 'Select your country...',
																						allowClear: true
																					}).on('select2-open', function()
																					{
																						// Adding Custom Scrollbar
																						$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																					});
																					
																				});
																			</script>
																	<div class="col-sm-8">
																		<select class="form-control " id="s2example-1" name="cat_name">
																			<option></option>
																			<optgroup label="Select">
																	<?php foreach($user_type as $usertype){ ?>
																	<option value="<?=$usertype->MasterEntryValue?>" ><?=$usertype->MasterEntryValue?></option>
																			<?php } ?>
																		</optgroup>
																		</select>
																</div>	

																		
																</div>
																
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Expression</label>
																	
																			<div class="col-sm-8">
																			<input type="text" class="form-control" id="field-1" placeholder="Placeholder" name="cat_val" value="<?php echo (isset($masterentry_update[0]->MasterEntryValue) ? $masterentry_update[0]->MasterEntryValue : '');?>">
																		</div>

																		
																</div>
												
									<input type="submit" class="btn btn-info btn-single " value="Add">
													</form>
											
													<div class="form-group-separator"></div>
									</div>
						</div>
						
					</div>
					<?php } ?>-->
			</div>
<div class="row">
  	<div class="col-md-6">
		<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Salary Templates</h3>
					
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
											<th>Name</th>
											<th>Fixed Salary Head</th>
											<th><i class="fa fa-edit"></i></th>
											
										</tr>
									</thead>
						
									<tfoot>
										<tr>
											<th>Name</th>
											<th>Fixed Salary Head</th>
											<th><a href="#"><i class="fa fa-edit"></i></a></th>
											
										</tr>
									</tfoot>
						
									<tbody>
									<?php foreach($salarystructure_info as $salarystructureinfo){ ?>
										<tr>
											<td><?=$salarystructureinfo->SalaryStructureName?></td>
											<td><?=$salarystructureinfo->SalaryHead?> (<?=$salarystructureinfo->Code?>)</td>
											<td><a href="<?=base_url();?>master/structuretemplate/<?=$salarystructureinfo->SalaryStructureId?>"><i class="fa fa-edit"></a></i></td>
											
										</tr>
									<?php } ?>
								</tbody>
						</table>
					
				</div>
			</div>
			
  </div>
<!--  <?php if(empty($id)==78){ ?>
  <div class="col-md-6">
		<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">xyz Salary Head</h3>
					
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
						$("#example-2").dataTable({
							aLengthMenu: [
								[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]
							]
						});
					});
					</script>
					
						<table id="example-2" class="table table-striped table-bordered" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Salary Head</th>
											<th>Type</th>
											<th>Expression</th>
											
										</tr>
									</thead>
						
									<tfoot>
										<tr>
											<th>Salary Head</th>
											<th>Type</th>
											<th>Expression</a></th>
											
										</tr>
									</tfoot>
						
									<tbody>
									<?php foreach($user_info as $userinfo){ ?>
										<tr>
											<td><?=$userinfo->MasterEntryValue?></td>
											<td><?=$userinfo->MasterEntryValue?></td>
											<td><?=$userinfo->MasterEntryValue?></td>
											
										</tr>
									<?php } ?>
								</tbody>
						</table>
					
				</div>
			</div>
			
  </div>
  <?php }?> -->
  
</div>