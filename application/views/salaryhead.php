<div class="main-content">	
	<div class="page-title">
				
				<div class="title-env">
					<h1 class="title">Salary Head</h1>
					<p class="description">Manage your Salary Head </p>
				</div>
				
					<div class="breadcrumb-env">
					
								<ol class="breadcrumb bc-1">
									<li>
							<a href="javascript:;"><i class="fa-home"></i>Home</a>
						</li>
								
							<li class="active">
						
										<strong>Salary Head</strong>
								</li>
								</ol>
								
				</div>
					
			</div>
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
											Add Salary Head
										</div>
									<div class="panel-body">
											<form role="form" class="form-horizontal" action="<?=base_url();?>master/insert_salaryhead" method="post">
											<?php if(empty($id)==''){ ?>
														<input type="hidden" name="id" value="<?=$salaryhead_update[0]->SalaryHeadId?>">
											<?php } ?>
											
											
													
													
																<div class="form-group">
																		<label class="col-sm-4 control-label" for="field-1">Type</label>
																		
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
																		<select class="form-control " id="s2example-1" name="type">
																			<option></option>
																			<optgroup label="Select">
																	<?php foreach($salary_type as $salarytype){ ?>
																	<option value="<?=$salarytype->MasterEntryId?>" <?php if(empty($id)==''){ echo (!empty($salaryhead_update[0]->SalaryHeadType==$salarytype->MasterEntryId) ? "selected" : ''); } ?>><?=$salarytype->MasterEntryValue?></option>
																			<?php } ?>
																		</optgroup>
																		</select>
																</div>	
																	</div>
																
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Salary Head</label>
																	
																			<div class="col-sm-8">
																			<input type="text" class="form-control" id="field-1" placeholder="Placeholder" name="salaryhead" value="<?php echo (isset($salaryhead_update[0]->SalaryHead) ? $salaryhead_update[0]->SalaryHead : '');?>">
																		</div>
																	</div>
																	
																	<div class="form-group">
																	<label class="control-label col-sm-4 ">Code</label>
																	
																			<div class="col-sm-8">
																			<input type="text" class="form-control" id="field-1" placeholder="Placeholder" name="code" value="<?php echo (isset($salaryhead_update[0]->Code) ? $salaryhead_update[0]->Code : '');?>">
																		</div>
																	</div>
																	
																	<?php //if(empty($id)==''){ ?> 
																	<div class="checkbox">
																	
											<label> 
												<input type="checkbox" name="dailybase" <?php echo (!empty($salaryhead_update[0]->DailyBasis) ? "Checked=checked"
												: '');?> value="1">
												Daily Basis
											</label>
										</div>
																	<?php // } ?>
																	<?php if(empty($id)==''){ ?> 
																	<div class="checkbox">
																	
											<label> 
												<input type="checkbox" name="status" <?php echo (!empty($salaryhead_update[0]->SalaryHeadStatus) ? "Checked=checked"
												: '');?> value="Active">
												Status
											</label>
										</div>
																	<?php } ?>
																	
									<input type="submit" class="btn btn-info btn-single " value="Add">
													</form>
											
													<div class="form-group-separator"></div>
									</div>
						</div>
					</div>
	<div class="col-md-8">
		<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Salary Head</h3>
					
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
											<th>Head Type</th>
											<th>Salary Head</th>
											<th>Code</th>
											<th>Daily Basis</th>
											<th><a href="#"><i class="fa fa-edit"></i></a></th>
											
										</tr>
									</thead>
						
									<tfoot>
										<tr>
											<th>Head Type</th>
											<th>Salary Head</th>
											<th>Code</th>
											<th>Daily Basis</th>
											<th><a href="#"><i class="fa fa-edit"></i></a></th>
											
										</tr>
									</tfoot>
						
									<tbody>
									<?php foreach($salaryhead_info as $salaryheadinfo){ ?>
										<tr>SalaryHeadStatus
											<td><?=$salaryheadinfo->MasterEntryValue?> <?php if($salaryheadinfo->SalaryHeadStatus=="Active"){?> <span class="label label-secondary"><?php  echo "Active";?></span><?php }else{?><span class="label label-red"><?php echo"Not Active";?></span><?php }?></td>
											<td><?=$salaryheadinfo->SalaryHead?></td>
											<td><?=$salaryheadinfo->Code?></td>
											<td><?php if($salaryheadinfo->DailyBasis==1){ echo "Yes";}else{echo"No";}?></td>
											<td><a href="<?=base_url();?>master/salaryhead/<?=$salaryheadinfo->SalaryHeadId?>"><i class="fa fa-edit"></a></i></td>
										</tr>
									<?php } ?>
								</tbody>
						</table>
					
				</div>
			</div>
  </div>
</div>