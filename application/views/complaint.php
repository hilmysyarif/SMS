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
							<h3 class="panel-title">Add Complaint</h3>
							
						</div>
						<div class="panel-body">
							
							<form role="form" class="form-horizontal" action="<?=base_url();?>frontoffice/insert_complaint" method="post">
							<?php if(isset($complaintid)){ ?>
							<input type="hidden" name="complaintid" value="<?=$complaintid?>"/>
							<?php } ?>
							<div class="row">
									<div class="form-group col-md-4">
												<label class="control-label col-sm-4">Complaint  Type</label>
												
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
																<select class="form-control " id="s2example-1" name="complaint_type">
																	<option></option>
																	<?php foreach($complaint_type as $complaint_type){ ?>
																						<option  value="<?=$complaint_type->MasterEntryId?>" <?php if(empty($complaintid)==''){ echo (!empty($complaint_up[0]->ComplaintType==$complaint_type->MasterEntryId) ? "selected" : ''); } ?> ><?=$complaint_type->MasterEntryValue?></option>
																								<?php  } ?>
																
																</select>
															</div>
									</div>
									
									<div class="form-group col-md-4">
										
											<label class=" control-label col-sm-4" for="field-1">Description</label>
										<div class="col-sm-8">
											<textarea class="form-control " rows=""  name="description"><?php echo (isset($complaint_up[0]->Description) ? $complaint_up[0]->Description : '');?></textarea>
										</div>
										
									</div>
										
									<div class="form-group col-md-4">
										
											<label class=" control-label col-sm-4" for="field-1">Action</label>
										<div class="col-sm-8">
											<textarea class="form-control " rows=""  name="action"><?php echo (isset($complaint_up[0]->Action) ? $complaint_up[0]->Action : '');?></textarea>
										</div>
									</div>	
									
									</div>
									<div class="row">
									<div class="form-group col-md-4">
											<label class="control-label col-sm-4" for="field-1">Mobile</label>
											
											<div class="col-sm-8">
												<input type="text" class="form-control" id="field-1"  name="mobile" value="<?php echo (isset($complaint_up[0]->Mobile) ? $complaint_up[0]->Mobile : '');?>">
											</div>
										</div>
										
										<div class="form-group col-md-4">
											<label class="control-label col-sm-4" for="field-1">Name</label>
											
											<div class="col-sm-8 ">
												<input type="text" class="form-control" id="field-1"  name="name" value="<?php echo (isset($complaint_up[0]->Name) ? $complaint_up[0]->Name : '');?>">
											</div>
										</div>
										
										<div class="form-group col-md-4">
											<label class="control-label col-sm-4" for="field-1">Date Of Complaint</label>
									
										<div class="col-sm-8">
											<div class="input-group">
														<input type="text" readonly class="form-control datepicker" data-format="D, dd MM yyyy" name="doc" value="<?php if(isset($complaint_up[0]->DOC)){echo date("d-m-Y H:i",$complaint_up[0]->DOC);}?>">
														
														<div class="input-group-addon">
															<a href="#"><i class="linecons-calendar"></i></a>
														</div>
													</div>
										</div>
										</div>
										</div>
										
										<div class="form-group ">
											
										<input type="submit" class="btn btn-info btn-single " name="add" value="Add"/>
											
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
									<h3 class="panel-title">Complaint List</h3>
									
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
															<th>Complaint Type</th>
															<th>Date</th>
															<th>Description</th>
															<th>Action</th>
															<th><i class="fa fa-edit"></i></th>
															<th><i class="el-cancel-circled"></th>
															
														</tr>
													</thead>
										
													<tfoot>
														<tr>
															<th>Name</th>
															<th>Mobile</th>
															<th>Complaint Type</th>
															<th>Date</th>
															<th>Description</th>
															<th>Action</th>
															<th><a href="#"><i class="fa fa-edit"></i></a></th>
															<th><a href="#"><i class="el-cancel-circled"></a></th>
															
														</tr>
													</tfoot>
										
													<tbody>
													<?php foreach($complaint as $complaint){ ?>
														<tr>
														<td><?=$complaint->Name?> <span class="label label-danger"><?=$complaint->ComplaintStatus?></span></td>
														<td><?=$complaint->Mobile?></td>
														<td><?=$complaint->MasterEntryValue?></td>
														<td><?=date("d M Y,h:ia",$complaint->DOC)?></td>
														<td><?=$complaint->Description?></td>
														<td><?=$complaint->Action?></td>
														<td><a href="<?=base_url();?>frontoffice/complaint/<?=$complaint->ComplaintId?>"><i class="fa fa-edit"></a></i></td>
														<td><a href="<?=base_url();?>master/modal/<?=$complaint->ComplaintId?>" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal-7"><i class="el-cancel-circled"></i></a></td>
															
														</tr>
													<?php } ?>
												</tbody>
										</table>
									
								</div>
							</div>
				  </div>
					
					</div>