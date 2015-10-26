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
							<h3 class="panel-title">Add Other Call</h3>
							
						</div>
						<div class="panel-body">
							
							<form role="form" class="form-horizontal" action="<?=base_url();?>frontoffice/insert_ocall" method="post">
							<?php if(isset($ocallid)){ ?>
							<input type="hidden" name="ocallid" value="<?=$ocallid?>"/>
							<?php } ?>
								
								<div class="form-group-separator"></div>
									<div class="row">	
										<div class="form-group col-md-4">
										<label class="col-sm-4 control-label" for="field-1">Name</label>
										
										<div class="col-sm-8">
										<input type="text" class="form-control" required id="field-1"  name="name" value="<?php echo (isset($ocall_up[0]->Name) ? $ocall_up[0]->Name : '');?>">
											
										</div>
									</div>
									
												<div class="form-group col-md-4">
											<label class="col-sm-4 control-label" for="field-1">Mobile</label>
											
											<div class="col-sm-8 ">
												<input type="text" class="form-control" required id="field-1"  name="mobile" value="<?php echo (isset($ocall_up[0]->Mobile) ? $ocall_up[0]->Mobile : '');?>">
											</div>
										</div>
										<div class="form-group col-md-5">
											<label class="col-sm-4 control-label" for="field-1">Follow Up Date</label>
											
											<div class="col-sm-7">
												<div class="input-group">
														<input type="text" readonly required class="form-control datepicker" data-format="D, dd MM yyyy" name="fod" value="<?php if(isset($ocall_up[0]->FollowUpDate)){echo date("d-m-Y H:i",$ocall_up[0]->FollowUpDate);}?>">
														
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
											<label class="col-sm-4 control-label" for="field-1">Date Of Call</label>
									
										<div class="col-sm-8">
											<div class="input-group">
														<input type="text" readonly required class="form-control datepicker" data-format="D, dd MM yyyy" name="doc" value="<?php if(isset($ocall_up[0]->DOC)){echo date("d-m-Y H:i",$ocall_up[0]->DOC);}?>">
														
														<div class="input-group-addon">
															<a href="#"><i class="linecons-calendar"></i></a>
														</div>
													</div>
										</div>
										</div>
									
										<div class="form-group col-md-4">
											<label class="col-sm-4 control-label" for="field-1">Landline</label>
											
											<div class="col-sm-8">
												<input type="text" class="form-control" id="field-1"  name="landline" value="<?php echo (isset($ocall_up[0]->Landline) ? $ocall_up[0]->Landline : '');?>">
											</div>
										</div>
										<div class="form-group col-md-4">
											<label class="col-sm-4 control-label"  for="field-1">Remarks</label>
											
											<div class="col-sm-8">
												<textarea class="form-control" required id="field-1"  name="remarks"><?php echo (isset($ocall_up[0]->Remarks) ? $ocall_up[0]->Remarks : '');?></textarea>
											</div>
										</div>
									</div>
									<div class="form-group-separator"></div>
									<div class="row">
									<div class="form-group col-md-5">
											<label class="col-sm-4 control-label" for="field-1">Call Duration</label>
											
											<div class="col-sm-7">
												<input type="text" class="form-control" required id="field-1"  name="call_duration" value="<?php echo (isset($ocall_up[0]->CallDuration) ? $ocall_up[0]->CallDuration : '');?>">
											</div>
										</div>
										
										<div class="form-group ">
									
									<input type="submit" name="add" class="btn btn-info btn-single " value="Add">
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
									<h3 class="panel-title">Other Call List</h3>
									
									<div class="panel-options">
									<a href="<?=base_url();?>master/prints/ocall" target="blank"><i class="fa fa-print"></i></a>
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
															<th>Remarks</th>
															<th>Date Of Call</th>
															<th>Duration</th>
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
															<th>Remarks</th>
															<th>Date Of Call</th>
															<th>Duration</th>
															<th>Follow Up</th>
															<th><i class="fa fa-phone"></i></th>
															<th><a href="#"><i class="fa fa-edit"></i></a></th>
															<th><a href="#"><i class="el-cancel-circled"></a></th>
															
														</tr>
													</tfoot>
										
													<tbody>
													<?php foreach($ocall as $ocall){ ?>
														<tr>
														<td><?=$ocall->Name?></td>
														<td><?=$ocall->Mobile?></td>
														<td><?=$ocall->Remarks?></td>
														<td><?=date("d M Y,h:ia",$ocall->DOC)?></td>
														<td><?=$ocall->CallDuration?></td>
														<td><?=date("d M Y,h:ia",$ocall->FollowUpDate)?><span class="label label-secondary"></span></td>
														<td><a href="<?=base_url();?>frontoffice/followup_other/<?=$ocall->OCallId?>"><i class="fa fa-phone"></a></td>
														<td><a href="<?=base_url();?>frontoffice/ocall/<?=$ocall->OCallId?>"><i class="fa fa-edit"></a></i></td>
														<td><a onClick="return confirm('Are you sure to delete this ? This will delete all the related records ')" href="<?=base_url();?>frontoffice/delete/ocalling/OCallId/<?=$ocall->OCallId?>"  ><i class="fa fa-times"></i></a></td>
															
														</tr>
													<?php } ?>
												</tbody>
										</table>
									
								</div>
							</div>
				  </div>
					
					</div>