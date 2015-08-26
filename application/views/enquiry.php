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
							<h3 class="panel-title">Manage Enquiry</h3>
							
						</div>
						<div class="panel-body">
							
							<form role="form" class="form-horizontal" action="<?=base_url();?>frontoffice/insert_enquiry" method="post">
							<?php if(isset($EnquiryId)){ ?>
							<input type="hidden" name="enquiryid" value="<?=$EnquiryId?>"/>
							<?php } ?>
								
								<div class="form-group-separator"></div>
									<div class="row">	
										<div class="form-group col-md-4">
												<label class="col-sm-4 control-label">Enquiry Type</label>
												
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
																<select class="form-control " required id="s2example-1" name="enquiry_type">
																	<option></option>
																	<?php foreach($enquiry_type as $enquiry_type){ ?>
																						<option  value="<?=$enquiry_type->MasterEntryId?>" <?php if(empty($EnquiryId)==''){ echo (!empty($enquiry_up[0]->EnquiryType==$enquiry_type->MasterEntryId) ? "selected" : ''); } ?> ><?=$enquiry_type->MasterEntryValue?></option>
																								<?php  } ?>
																
																</select>
															</div>
											</div>
									
												<div class="form-group col-md-4">
											<label class="col-sm-4 control-label" for="field-1">Name</label>
											
											<div class="col-sm-8 ">
												<input type="text" class="form-control" id="field-1" required  name="name" value="<?php echo (isset($enquiry_up[0]->Name) ? $enquiry_up[0]->Name : '');?>">
											</div>
										</div>
										<div class="form-group col-md-5">
											<label class="col-sm-4 control-label" for="field-1">Address</label>
											
											<div class="col-sm-8">
												<textarea class="form-control" id="field-1" required  name="address"><?php echo (isset($enquiry_up[0]->Address) ? $enquiry_up[0]->Address : '');?></textarea>
											</div>
										</div>
									</div>
									<div class="form-group-separator"></div>
									<div class="row">	
									<div class="form-group col-md-4">
										<label class="col-sm-4 control-label" for="field-1">Reference</label>
										
										<script type="text/javascript">
																jQuery(document).ready(function($)
																{
																	$("#s2example-2").select2({
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
																<select class="form-control " required id="s2example-2" name="reference">
																	<option></option>
																	<?php foreach($reference as $reference){ ?>
																						<option  value="<?=$reference->MasterEntryId?>" <?php if(empty($EnquiryId)==''){ echo (!empty($enquiry_up[0]->Reference==$reference->MasterEntryId) ? "selected" : ''); } ?> ><?=$reference->MasterEntryValue?></option>
																								<?php  } ?>
																
																</select>
															</div>
									</div>
										<div class="form-group col-md-4">
											<label class="col-sm-4 control-label" for="field-1">Mobile</label>
											
											<div class="col-sm-8">
												<input type="text" class="form-control" required id="field-1"  name="mobile" value="<?php echo (isset($enquiry_up[0]->Mobile) ? $enquiry_up[0]->Mobile : '');?>">
											</div>
										</div>
										<div class="form-group col-md-4">
											<label class="col-sm-4 control-label" required for="field-1">Response</label>
											
											<div class="col-sm-8">
												<textarea class="form-control" id="field-1"  name="responsedetail"><?php echo (isset($enquiry_up[0]->ResponseDetail) ? $enquiry_up[0]->ResponseDetail : '');?></textarea>
											</div>
										</div>
									</div>
									<div class="form-group-separator"></div>
									<div class="row">
									<div class="form-group col-md-4">
											<label class="col-sm-4 control-label" for="field-1">Responce</label>
									
										
										<script type="text/javascript">
																jQuery(document).ready(function($)
																{
																	$("#s2example-3").select2({
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
																<select class="form-control " required id="s2example-3" name="response">
																	<option></option>
																	<?php foreach($response as $response){ ?>
																						<option  value="<?=$response->MasterEntryId?>" <?php if(empty($EnquiryId)==''){ echo (!empty($enquiry_up[0]->EnquiryResponse==$response->MasterEntryId) ? "selected" : ''); } ?> ><?=$response->MasterEntryValue?></option>
																								<?php  } ?>
																
																</select>
															</div>
										</div>
										<div class="form-group col-md-5">
											<label class="col-sm-4 control-label" for="field-1">Alternate Mobile</label>
											
											<div class="col-sm-7">
												<input type="text" class="form-control" id="field-1"  name="altmobile" value="<?php echo (isset($enquiry_up[0]->AlternateMobile) ? $enquiry_up[0]->AlternateMobile : '');?>">
											</div>
										</div>
										<div class="form-group ">
											
												<input type="submit" 
									class="btn btn-info btn-single " name="add" value="Add">
											
										</div>
										
										
										</div>
										
										<div class="row">
										<div class="form-group-separator"></div>
										
										<div class="form-group col-md-4">
											<label class="col-sm-4 control-label" for="field-1">Date Of Enquiry</label>
									
										<div class="col-sm-8">
											<div class="input-group">
														<input type="text" required readonly class="form-control datepicker" data-format="D, dd MM yyyy" name="doe" value="<?php if(isset($enquiry_up[0]->EnquiryDate)){echo date("d-m-Y H:i",$enquiry_up[0]->EnquiryDate);}?>">
														
														<div class="input-group-addon">
															<a href="#"><i class="linecons-calendar"></i></a>
														</div>
													</div>
										</div>
										</div>
										
										<div class="form-group col-md-5">
											<label class="col-sm-4 control-label"  for="field-1">No Of Child</label>
											
											<div class="col-sm-7">
												<input type="text" class="form-control" required id="field-1"  name="nochild" value="<?php echo (isset($enquiry_up[0]->NoOfChild) ? $enquiry_up[0]->NoOfChild : '');?>">
											</div>
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
									<h3 class="panel-title">Enquiry List</h3>
									
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
															<th>No Of Child</th>
															<th>Date Of Enquiry</th>
															
															<th><i class="fa fa-phone"></i></th>
															<th><i class="fa fa-edit"></i></th>
															<th><i class="fa fa-file-text-o"></th>
															
														</tr>
													</thead>
										
													<tfoot>
														<tr>
															<th>Name</th>
															<th>Mobile</th>
															<th>No Of Child</th>
															<th>Date Of Enquiry</th>
															
															<th><i class="fa fa-phone"></i></th>
															<th><a href="#"><i class="fa fa-edit"></i></a></th>
															<th><a href="#"><i class="el-cancel-circled"></a></th>
															
														</tr>
													</tfoot>
										
													<tbody>
													<?php foreach($enquiry as $enquiry){ ?>
														<tr>
														<td><?=$enquiry->Name?> (<?=$enquiry->MasterEntryValue?>)</td>
														<td><?=$enquiry->Mobile?></td>
														<td><?=$enquiry->NoOfChild?></td>
														<td><?=date("d M Y, D h:i a",$enquiry->EnquiryDate)?></td>
														<td><a href="<?=base_url();?>frontoffice/followup_enquiry/<?=$enquiry->EnquiryId?>"><i class="fa fa-phone"></a></td>
														<td><a href="<?=base_url();?>frontoffice/enquiry/<?=$enquiry->EnquiryId?>"><i class="fa fa-edit"></a></i></td>
														<td><a href="<?=base_url();?>master/enquiry/<?=$enquiry->EnquiryId?>" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal-7"><i class="el-cancel-circled"></i></a></td>
															
														</tr>
													<?php } ?>
												</tbody>
										</table>
									
								</div>
							</div>
				  </div>
					
					</div>