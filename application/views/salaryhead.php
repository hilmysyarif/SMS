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
											<form role="form" class="form-horizontal" action="<?=base_url();?>master/insert_masterentry" method="post">
											<?php if(empty($id)==''){ ?>
														<input type="hidden" name="id" value="<?=$masterentry_update[0]->MasterEntryId?>">
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
																		<select class="form-control " id="s2example-1" name="cat_name">
																			<option></option>
																			<optgroup label="Select">
																	<?php foreach($user_type as $usertype){ ?>
																	<option value="<?=$usertype->StaffName?>" ><?=$usertype->StaffName?></option>
																			<?php } ?>
																		</optgroup>
																		</select>
																</div>	
																	</div>
																
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Salary Head</label>
																	
																			<div class="col-sm-8">
																			<input type="text" class="form-control" id="field-1" placeholder="Placeholder" name="cat_val" value="<?php echo (isset($masterentry_update[0]->MasterEntryValue) ? $masterentry_update[0]->MasterEntryValue : '');?>">
																		</div>
																	</div>
																	
																	<div class="form-group">
																	<label class="control-label col-sm-4 ">Code</label>
																	
																			<div class="col-sm-8">
																			<input type="text" class="form-control" id="field-1" placeholder="Placeholder" name="cat_val" value="<?php echo (isset($masterentry_update[0]->MasterEntryValue) ? $masterentry_update[0]->MasterEntryValue : '');?>">
																		</div>
																	</div>
																	
																	<?php //if(empty($id)==''){ ?> 
																	<div class="checkbox">
																	
											<label> 
												<input type="checkbox" name="status" <?php //echo (isset($masterentry_update[0]->MasterEntryStatus) ? "Checked=checked"
												//: '');?> value="Active">
												Daily Basis
											</label>
										</div>
																	<?php // } ?>
																	
																	
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
									<?php foreach($user_info as $userinfo){ ?>
										<tr>
											<td><?=$userinfo->MasterEntryValue?></td>
											<td><?=$userinfo->Username?></td>
											<td><?=$userinfo->Password?></td>
											<td><?=$userinfo->Password?></td>
											<td><a href="<?=base_url();?>master/masterentry/<?=$userinfo->UserId?>"><i class="fa fa-edit"></a></i></td>
										</tr>
									<?php } ?>
								</tbody>
						</table>
					
				</div>
			</div>
  </div>
</div>