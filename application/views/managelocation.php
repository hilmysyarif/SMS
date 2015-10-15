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
											Add Location
										</div>
									<div class="panel-body">
											<form role="form" class="form-horizontal" action="<?=base_url();?>master/insert_location" method="post">
											<?php if(empty($id)==''){ ?>
														<input type="hidden" name="id" value="<?=$location_update[0]->LocationId?>">
											<?php } ?>
																
																
																	<div class="form-group">
																		<label class="col-sm-4 control-label" for="field-1">Name</label>
																		
																		<div class="col-sm-8">
																			<input type="text" required class="form-control" id="field-1" placeholder="Name" name="name" value="<?php echo (isset($location_update[0]->LocationName) ? $location_update[0]->LocationName : '');?>">
																		</div>
																	</div>
																	
																	<div class="form-group">
																		<label class="col-sm-4 control-label" for="field-1">Called As</label>
																		
																		<div class="col-sm-8">
																			<input type="text" required class="form-control" id="field-1" placeholder="Called As" name="calledas" value="<?php echo (isset($location_update[0]->CalledAs) ? $location_update[0]->CalledAs : '');?>">
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
					<h3 class="panel-title">Location List</h3>
					
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
											<th>Called As</th>
											<th><i class="fa fa-edit"></i></th>
											<th><i class="fa fa-file-text-o"></th>
											
										</tr>
									</thead>
						
									<tfoot>
										<tr>
											<th>Name</th>
											<th>Called As</th>
											<th><a href="#"><i class="fa fa-edit"></i></a></th>
											<th><a href="#"><i class="fa fa-file-text-o"></a></th>
											
										</tr>
									</tfoot>
						
									<tbody>
									<?php foreach($location as $location){ ?>
										<tr>
											<td><?=$location->LocationName?></td>
											<td><?=$location->CalledAs?></td>
											
											<td><a href="<?=base_url();?>master/managelocation/<?=$location->LocationId?>"><i class="fa fa-edit"></a></i></td>
											<td><a href="<?=base_url();?>master/modal/<?=$location->LocationId?>" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal-7"><i class="fa fa-file-text-o"></i></a></td>
											
										</tr>
									<?php } ?>
								</tbody>
						</table>
					
				</div>
			</div>
  </div>
</div>