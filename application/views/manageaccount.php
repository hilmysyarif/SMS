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
											Add Account
										</div>
									<div class="panel-body">
											<form role="form" class="form-horizontal" action="<?=base_url();?>master/insert_account" method="post">
											<?php if(empty($id)==''){ ?>
														<input type="hidden" name="id" value="<?=$acc_update[0]->AccountId?>">
											<?php } ?>
											
											<?php if(empty($id)==''){ ?> 
																	<div class="checkbox">
											<label>
												<input type="checkbox" name="status" <?php echo (isset($acc_update[0]->AccountStatus) ? "Checked=checked"
												: '');?> value="Active">
												Status
											</label>
										</div>
																	<?php } ?>
											
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Managed By</label>
																	
																			<script type="text/javascript">
																				jQuery(document).ready(function($)
																				{
																					$("#s2example-1").select2({
																						placeholder: 'Select your UserType...',
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
																		<select class="form-control " required id="s2example-1" name="manage_by">
																			<option></option>
																			<optgroup label="Select">
																	<?php foreach($user as $usertype){ ?>
																	<option value="<?=$usertype->MasterEntryId?>" <?php if(empty($id)==''){ echo (!empty($acc_update[0]->ManagedBy==$usertype->MasterEntryId) ? "selected" : ''); } ?>><?=$usertype->MasterEntryValue?></option>
																			<?php } ?>
																		</optgroup>
																		</select>
																</div>	

																		
																</div>
																
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Account Type</label>
																	
																			<script type="text/javascript">
																				jQuery(document).ready(function($)
																				{
																					$("#s2example-2").select2({
																						placeholder: 'Select your Account...',
																						allowClear: true
																					}).on('select2-open', function()
																					{
																						// Adding Custom Scrollbar
																						$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																					});
																					
																				});
																			</script>
																	<div class="col-sm-8">
																		<select class="form-control " required id="s2example-2" name="account_type">
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
																
																<div class="form-group">
																		<label class="col-sm-4 control-label" for="field-1">Account Name</label>
																		
																		<div class="col-sm-8">
																			<input type="text" required class="form-control" id="field-1" placeholder="Account Name" name="accountname" value="<?php echo (isset($acc_update[0]->AccountName) ? $acc_update[0]->AccountName : '');?>">
																		</div>
																	</div>
																	
																	<div class="form-group">
																		<label class="col-sm-4 control-label" for="field-1">Opening Balance</label>
																		
																		<div class="col-sm-8">
																			<input type="text" required class="form-control" id="field-1" placeholder="Openning Balance" name="open_bal" value="<?php echo (isset($acc_update[0]->OpeningBalance) ? $acc_update[0]->OpeningBalance : '');?>">
																		</div>
																	</div>
																	
																	<div class="form-group">
																		<label class="col-sm-4 control-label" for="field-1">Account Start Date</label>
																		
																		<div class="col-sm-8">
																			<input type="text" class="form-control datepicker" data-show="true" data-format="dd MM yyyy" required id="field-1" placeholder="Account Date" name="acc_start_date" value="<?php echo (isset($acc_update[0]->AccountDate) ? date("d-m-Y",$acc_update[0]->AccountDate) : '');?>">
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
					<h3 class="panel-title">List all Accounts</h3>
					
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
											<th>Account Name</th>
											<th>Account Type</th>
											<th>Managed By</th>
											<th>Balance</th>
											<th>Start Date</th>
											<th><i class="fa fa-edit"></i></th>
											<th><i class="fa fa-file-text-o"></th>
											
										</tr>
									</thead>
						
									<tfoot>
										<tr>
											<th>Account Name</th>
											<th>Account Type</th>
											<th>Managed By</th>
											<th>Balance</th>
											<th>Start Date</th>
											<th><a href="#"><i class="fa fa-edit"></i></a></th>
											<th><a href="#"><i class="fa fa-file-text-o"></a></th>
											
										</tr>
									</tfoot>
						
									<tbody>
									<?php foreach($acc_info as $accinfo){ ?>
										<tr>
											<td><?=$accinfo->AccountName?> <span class="label label-secondary"><?=$accinfo->AccountStatus?></span></td>
											
											<?php $filter=array('MasterEntryId'=>$accinfo->AccountType ); $masterentryval= $this->utilities->get_masterval('masterentry',$filter); ?>
											
											<td><?=$masterentryval[0]->MasterEntryValue?></td>
											
											<?php $filter=array('MasterEntryId'=>$accinfo->ManagedBy ); $masterentryval= $this->utilities->get_masterval('masterentry',$filter); ?>
											
											<td><?=$masterentryval[0]->MasterEntryValue?></td>
											
											<td><?=$accinfo->AccountBalance+$accinfo->OpeningBalance?></td>
											
											<td><?php  echo (isset($accinfo->AccountDate) ?  date("d-m-Y",$accinfo->AccountDate) : '');  ?></td>
											
											<td><a href="<?=base_url();?>master/manageaccount/<?=$accinfo->AccountId?>"><i class="fa fa-edit"></a></i></td>
											<td><a href="<?=base_url();?>master/modal/<?=$accinfo->AccountId?>" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal-7"><i class="fa fa-file-text-o"></i></a></td>
											
										</tr>
									<?php } ?>
								</tbody>
						</table>
					
				</div>
			</div>
  </div>
</div>