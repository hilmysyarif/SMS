<?php  if($this->session->flashdata('message_type')) { ?>
<div class="row">
<div class="alert alert-success">
<strong><?=$this->session->flashdata('message')?></strong> 
</div>
</div>
<?php }?>

<div class="row">

				<div class="col-sm-12">
					
					<div class="panel panel-color panel-gray">
						<div class="panel-heading">
							<h3 class="panel-title">Add Call</h3>
							
						</div>
						<div class="panel-body">
							
							<form role="form" class="form-horizontal" action="<?=base_url();?>frontoffice/insert_call" method="post">
							<?php if(isset($callid)){ ?>
							<input type="hidden" name="callid" value="<?=$callid?>"/>
							<?php } ?>
								<div class="form-group-separator"></div>
									<div class="row">	
										<div class="form-group col-md-4">
												<label class="col-sm-4 control-label">Response</label>
												
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
																<select class="form-control " required id="s2example-1" name="responseid">
																	<option></option>
																	<?php  foreach($response as $response){ ?>
																						<option  value="<?=$response->MasterEntryId?>" <?php if(empty($callid)==''){ echo (!empty($response->MasterEntryId==$update_call[0]->CallResponse) ? "selected" : ''); } ?> ><?=$response->MasterEntryValue?></option>
																								<?php  } ?>
																
																</select>
															</div>
											</div>
									
												<div class="form-group col-md-4">
											<label class="col-sm-4 control-label" for="field-1">Mobile</label>
											
											<div class="col-sm-8 ">
												<input type="text" class="form-control" id="field-1" required name="mobile" value="<?php echo (isset($update_call[0]->Mobile) ? $update_call[0]->Mobile : '');?>">
											</div>
										</div>
										<div class="form-group col-md-5">
											<label class="col-sm-4 control-label"  for="field-1">Follow Up Date</label>
											
											<div class="col-sm-7">
												<div class="input-group">
														<input type="text" readonly required class="form-control datepicker" data-format="D, dd MM yyyy" name="fod" value="<?php if(isset($update_call[0]->FollowUpDate)){echo date("d-m-Y H:i",$update_call[0]->FollowUpDate);}?>">
														
														<div class="input-group-addon">
															<a href="#"><i class="linecons-calendar"></i></a>
														</div>
													</div>
											</div>
										</div>
									</div>
									<div class="form-group-separator"></div>
									<div class="row">	
									<div class="form-group col-md-4">
										<label class="col-sm-4 control-label"  for="field-1">Name</label>
										
										<div class="col-sm-8">
										<input type="text" class="form-control" required id="field-1"  name="name" value="<?php echo (isset($update_call[0]->Name) ? $update_call[0]->Name : '');?>">
											
										</div>
									</div>
										<div class="form-group col-md-4">
											<label class="col-sm-4 control-label" for="field-1">Landline</label>
											
											<div class="col-sm-8">
												<input type="text" class="form-control" id="field-1"  name="landline" value="<?php echo (isset($update_call[0]->Landline) ? $update_call[0]->Landline : '');?>">
											</div>
										</div>
										<div class="form-group col-md-4">
											<label class="col-sm-4 control-label"  for="field-1">Response</label>
											
											<div class="col-sm-8">
												<textarea class="form-control" required id="field-1"  name="responsedetails"><?php echo (isset($update_call[0]->ResponseDetail) ? $update_call[0]->ResponseDetail : '');?></textarea>
											</div>
										</div>
									</div>
									<div class="form-group-separator"></div>
									<div class="row">
									<div class="form-group col-md-4">
											<label class="col-sm-4 control-label"  for="field-1">Date Of Call</label>
									
										<div class="col-sm-8">
											<div class="input-group">
														<input type="text" required readonly class="form-control datepicker" data-format="D, dd MM yyyy" name="doc" value="<?php if(isset($update_call[0]->DOC)){echo date("d-m-Y H:i",$update_call[0]->DOC);}?>">
														
														<div class="input-group-addon">
															<a href="#"><i class="linecons-calendar"></i></a>
														</div>
													</div>
										</div>
										</div>
										<div class="form-group col-md-4">
											<label class="col-sm-4 control-label"  for="field-1">Address</label>
									
										<div class="col-sm-8">
											<textarea class="form-control" id="field-1" required  name="address"><?php echo (isset($update_call[0]->Address) ? $update_call[0]->Address : '');?></textarea>
										</div>
										</div>
										
										<div class="form-group col-md-5">
											<label class="col-sm-4 control-label" for="field-1">No Of Child</label>
											
											<div class="col-sm-7">
												<input type="text"  required class="form-control" id="field-1"  name="nochild" value="<?php echo (isset($update_call[0]->NoOfChild) ? $update_call[0]->NoOfChild : '');?>">
											</div>
										</div>
										
										
										</div>
										
										<div class="row">
										<div class="form-group-separator"></div>
										<div class="form-group">
									
									<input type="submit" name="add"
									class="btn btn-info btn-single " value="Add">
								</div>
										
										</div>
										
										
										</form>
								</div>	
							</div>	
							</div>		
						</div>
						
						<div class="row">
					<div class="col-md-12">
						<div class="panel panel-color panel-gray">
								<div class="panel-heading">
									<h3 class="panel-title">Call List</h3>
									
									<div class="panel-options">
									<a href="<?=base_url();?>master/prints/call" target="_blank"><i class="fa fa-print"></i></a>
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
															<th>Mobile</th>
															<th>No Of Child</th>
															<th>Date Of Call</th>
															<th>Follow Up</th>
															<th><i class="fa fa-phone"></i></th>
															<th><i class="fa fa-edit"></i></th>
															<th><i class="el-cancel-circled"></th>
															
														</tr>
													</thead>
										
													<tfoot>
														<tr>
															<th>Name</th>
															<th>Mobile</th>
															<th>No Of Child</th>
															<th>Date Of Call</th>
															<th>Follow Up</th>
															<th><i class="fa fa-phone"></i></th>
															<th><a href="#"><i class="fa fa-edit"></i></a></th>
															<th><a href="#"><i class="el-cancel-circled"></a></th>
															
														</tr>
													</tfoot>
										
													<tbody>
													<?php foreach($call_list as $call_list){ ?>
														<tr>
														<td><?=$call_list->Name?></td>
														<td><?=$call_list->Mobile?></td>
														<td><?=$call_list->NoOfChild?></td>
															<td><?=date("d M Y,h:ia",$call_list->DOC)?></td>
															<td><?=date("d M Y,h:ia",$call_list->FollowUpDate)?><span class="label label-secondary"></span></td>
															<td><a href="<?=base_url();?>frontoffice/followup/<?=$call_list->CallId?>"><i class="fa fa-phone"></a></td>
															<td><a href="<?=base_url();?>frontoffice/call/<?=$call_list->CallId?>"><i class="fa fa-edit"></a></i></td>
															<td><a onClick="return confirm('Are you sure to delete this ? This will delete all the related records ')" href="<?=base_url();?>frontoffice/delete/calling/CallId/<?=$call_list->CallId?>"  ><i class="fa fa-times"></i></a></td>
															
														</tr>
													<?php } ?>
												</tbody>
										</table>
									
								</div>
							</div>
				  </div>
					
					</div>