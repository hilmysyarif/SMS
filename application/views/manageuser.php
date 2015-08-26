<?php  if($this->session->flashdata('message_type')=='success') { ?>
<div class="row">
<div class="alert alert-success">
<strong><?=$this->session->flashdata('message')?></strong> 
</div>
</div>
<?php }?>
	<?php  if($this->session->flashdata('message_type')=='error') { ?>
<div class="row">
<div class="alert alert-danger">
<strong><?=$this->session->flashdata('message')?></strong> 
</div>
</div>
<?php }?>
			<div class="row">
					<div class="col-md-4">
						<div class="panel panel-default">
										<div class="panel-heading">
											Add User
										</div>
									<div class="panel-body">
											<form role="form" class="form-horizontal" action="<?=base_url();?>master/adduser" method="post">
											<?php if(empty($id)==''){ ?>
														<input type="hidden" name="id" value="<?=$user_update[0]->UserId?>">
											<?php } ?>
																<div class="form-group">
																	<label class="control-label col-sm-4 ">User Type</label>
																	
																			<script type="text/javascript">
																				jQuery(document).ready(function($)
																				{
																					$("#s2example-1").select2({
																						placeholder: 'Select your User Type...',
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
																		<select class="form-control " required id="s2example-1" name="user_type">
																			<option></option>
																			<optgroup label="Select">
																	<?php foreach($user as $usertype){ ?>
																	<option value="<?=$usertype->MasterEntryId?>" <?php if(empty($id)==''){ echo (!empty($user_update[0]->UserType==$usertype->MasterEntryId) ? "selected" : ''); } ?>><?=$usertype->MasterEntryValue?></option>
																			<?php } ?>
																		</optgroup>
																		</select>
																</div>	

																		
																</div>
																
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Select Staff</label>
																	
																			<script type="text/javascript">
																				jQuery(document).ready(function($)
																				{
																					$("#s2example-2").select2({
																						placeholder: 'Select your Staff...',
																						allowClear: true
																					}).on('select2-open', function()
																					{
																						// Adding Custom Scrollbar
																						$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																					});
																					
																				});
																			</script>
																	<div class="col-sm-8">
																		<select class="form-control " required id="s2example-2" name="staff_name" >
																			<option></option>
																			<optgroup label="Select">
																	<?php foreach($user_type as $usertype){ ?>
																	<option value="<?=$usertype->StaffId?>" <?php if(empty($id)==''){ echo (!empty($user_update[0]->StaffId==$usertype->StaffId) ? "selected" : ''); } ?>><?=$usertype->StaffName?>(<?=$usertype->StaffMobile?>)</option>
																			<?php } ?>
																		</optgroup>
																		</select>
																</div>	

																		
																</div>
																
																	<div class="form-group">
																		<label class="col-sm-4 control-label" for="field-1">Username</label>
																		
																		<div class="col-sm-8">
																			<input type="text" class="form-control"  required id="field-1" placeholder="UserName" name="user_name" value="<?php echo (isset($user_update[0]->Username) ? $user_update[0]->Username : '');?>" <?php if(empty($id)==''){?> readonly <?php } ?>>
																		</div>
																	</div>
																	
																	<?php if(empty($id)==''){ ?> 
																	<div class="checkbox">
											<label>
												<input type="checkbox" name="reset" <?php echo (isset($masterentry_update[0]->MasterEntryStatus) ? "Checked=checked"
												: '');?> value="yes">
												Reset Password
											</label>
										</div>
																	<?php } ?>
																	
																	<div class="form-group">
																		<label class="col-sm-4 control-label" for="field-1">Password</label>
																		
																		<div class="col-sm-8">
																			<input type="password" required class="form-control" id="field-1" placeholder="Password" name="password" value="<?php echo (isset($masterentry_update[0]->MasterEntryValue) ? $masterentry_update[0]->MasterEntryValue : '');?>">
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
					<h3 class="panel-title">User List</h3>
					
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
											<th>User Type</th>
											<th>Username</th>
											<th>Password</th>
											<th>Name</th>
											<th><i class="fa fa-edit"></i></th>
											<th><i class="fa fa-file-text-o"></th>
											
										</tr>
									</thead>
						
									<tfoot>
										<tr>
											<th>User Type</th>
											<th>Username</th>
											<th>Password</th>
											<th>Name</th>
											<th><a href="#"><i class="fa fa-edit"></i></a></th>
											<th><a href="#"><i class="fa fa-file-text-o"></a></th>
											
										</tr>
									</tfoot>
						
									<tbody>
									<?php foreach($user_info as $userinfo){ ?>
										<tr>
											<td><?=$userinfo->MasterEntryValue?></td>
											<td><?=$userinfo->Username?></td>
											<td><?=$userinfo->Password?></td>
											<td><?=$userinfo->StaffName?></td>
											<td><a href="<?=base_url();?>master/manageuser/<?=$userinfo->UserId?>"><i class="fa fa-edit"></a></i></td>
											<td><a href="<?=base_url();?>master/modal/<?=$userinfo->UserId?>" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal-7"><i class="fa fa-file-text-o"></i></a></td>
											
										</tr>
									<?php } ?>
								</tbody>
						</table>
					
				</div>
			</div>
  </div>
</div>