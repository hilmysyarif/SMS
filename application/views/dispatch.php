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
							<h3 class="panel-title">Add</h3>
							
						</div>
						<div class="panel-body">
							
							<form role="form" class="form-horizontal" action="<?=base_url();?>dispatchreceiving/add_dispatch" method="post">
							<?php if(isset($id)){ ?>
							<input type="hidden" name="id" value="<?=$id?>"/>
							<?php } ?>
								<div class="form-group-separator"></div>
									<div class="row">	
										<div class="form-group col-md-4">
											<label class="col-sm-4 control-label" for="field-1">Reference</label>
											
											
											
											<div class="col-sm-8">
												<input type="text" class="form-control" id="field-1" required name="Reference" value="<?php echo (isset($did[0]->Reference) ? $did[0]->Reference : '');?>">
											</div>
										</div>
												<div class="form-group col-md-4">
											<label class="col-sm-4 control-label"  for="field-1">Address To</label>
									
										<div class="col-sm-8">
											<textarea class="form-control" id="field-1" required  name="AddressTo"><?php echo (isset($did[0]->AddressTo) ? $did[0]->AddressTo : '');?></textarea>
										</div>
										</div>
										
										
										<div class="form-group col-md-4">
											<label class="col-sm-4 control-label"  for="field-1">Remarks</label>
									
										<div class="col-sm-8">
											<textarea class="form-control" id="field-1" required  name="Remarks"><?php echo (isset($did[0]->Remarks) ? $did[0]->Remarks : '');?></textarea>
										</div>
										</div>
										
										
										
									</div>
									<div class="form-group-separator"></div>
									<div class="row">	
									<div class="form-group col-md-4">
										<label class="col-sm-4 control-label"  for="field-1">Title</label>
										
										<div class="col-sm-8">
										<input type="text" class="form-control" required id="field-1"  name="Title" value="<?php echo (isset($did[0]->Title) ? $did[0]->Title : '');?>">
											
										</div>
									</div>
										
										
										
										
									</div>
									<div class="form-group-separator"></div>
									<div class="row">

									<div class="form-group col-md-4">
											<label class="col-sm-4 control-label"  for="field-1">Date</label>
									
										<div class="col-sm-8">
											<div class="input-group">
														<input type="text" required readonly class="form-control datepicker" data-format="D, dd MM yyyy" name="Date" value="<?php if(isset($did[0]->Date)){echo Date("d-m-Y H:i",$did[0]->Date);}?>">
														
														<div class="input-group-addon">
															<a href="#"><i class="linecons-calendar"></i></a>
														</div>
													</div>
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
									<h3 class="panel-title">List</h3>
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
															<th>Reference</th>
															<th>Title</th>
															<th>Address</th>
															<th>Date</th>
															<th>Remarks</th>
															
															<th><a href="#"><i class="fa fa-edit"></i></th>
															<th><a href="#"><i class="el-cancel-circled"></th>
															
														</tr>
													</thead>
										
													
										
													<tbody>
													<?php foreach($list as $list){?>
												<tr>
								
											<td><?=$list->Reference?></td>
											<td><?=$list->Title?></td>
											<td><?=$list->AddressTo?></td>
											<td><?=date("d-m-y",$list->Date)?></td>
											<td><?=$list->Remarks?></td>
											
											<td><a href="<?=base_url();?>dispatchreceiving/dispatch/<?=$list->Id?>"><i class="fa fa-edit"></i></a></td>
											<td><a onClick="return confirm('Are you sure to delete this ? This will delete all the related records ')" href="<?=base_url();?>dispatchreceiving/delete_dispatch_data/<?=$list->Id?>"><i class="el-cancel-circled"></td>

											
										</tr>
										<?php  } ?>
													
													
												</tbody>
										</table>
									
								</div>
							</div>
				  </div>
					
					</div>