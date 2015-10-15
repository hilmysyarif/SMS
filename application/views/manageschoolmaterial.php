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
											Add Books
										</div>
									<div class="panel-body">
											<form role="form" class="form-horizontal" action="<?=base_url();?>master/insert_material" method="post">
											<?php if(empty($id)==''){ ?>
														<input type="hidden" name="id" value="<?=$material_update[0]->SchoolMaterialId?>">
											<?php } ?>
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Class</label>
																	
																			<script type="text/javascript">
																				jQuery(document).ready(function($)
																				{
																					$("#s2example-1").select2({
																						placeholder: 'Select your Class...',
																						allowClear: true
																					}).on('select2-open', function()
																					{
																						// Adding Custom Scrollbar
																						$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																					});
																					
																				});
																			</script>
																	<div class="col-sm-8">
																		<select class="form-control " required id="s2example-1" name="class">
																			<option></option>
																			<optgroup label="Select">
																	<?php foreach($class_info as $class_info){ ?>
																	<option value="<?=$class_info->ClassId?>" <?php  if(empty($id)==''){echo (!empty($material_update[0]->ClassId==$class_info->ClassId) ? "selected" : ''); } ?>><?=$class_info->ClassName?></option>
																			<?php } ?>
																		</optgroup>
																		</select>
																</div>	

																		
																</div>
																
																<div class="form-group">
																		<label class="col-sm-4 control-label" for="field-1">Name</label>
																		
																		<div class="col-sm-8">
																			<input type="text" class="form-control" required id="field-1" placeholder="Name" name="name" value="<?php echo (isset($material_update[0]->Name) ? $material_update[0]->Name : '');?>">
																		</div>
																	</div>
																
																
																	<div class="form-group">
																		<label class="col-sm-4 control-label" for="field-1">Branch Price</label>
																		
																		<div class="col-sm-8">
																			<input type="text" class="form-control" required id="field-1" placeholder="Branch Price" name="branch_price" value="<?php echo (isset($material_update[0]->BranchPrice) ? $material_update[0]->BranchPrice : '');?>">
																		</div>
																	</div>
																	
																	<div class="form-group">
																		<label class="col-sm-4 control-label" for="field-1">Selling price</label>
																		
																		<div class="col-sm-8">
																			<input type="text" class="form-control" required id="field-1" placeholder="Selling Price" name="selling_price" value="<?php echo (isset($material_update[0]->SellingPrice) ? $material_update[0]->SellingPrice : '');?>">
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
					<h3 class="panel-title">Book List</h3>
					
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
											<th>Session</th>
											<th>Class</th>
											<th>Name</th>
											<th>Quantity</th>
											<th>Branch Price</th>
											<th>Selling Price</th>
											<th><i class="fa fa-edit"></i></th>
											<th><i class="fa fa-file-text-o"></th>
											
										</tr>
									</thead>
						
									<tfoot>
										<tr>
											<th>Session</th>
											<th>Class</th>
											<th>Name</th>
											<th>Quantity</th>
											<th>Branch Price</th>
											<th>Selling Price</th>
											<th><a href="#"><i class="fa fa-edit"></i></a></th>
											<th><a href="#"><i class="fa fa-file-text-o"></a></th>
											
										</tr>
									</tfoot>
						
									<tbody>
									<?php foreach($material as $material){ ?>
										<tr>
											<td><?=$material->Session?></td>
											<?php $filter=array('ClassId'=>$material->ClassId); $classname= $this->utilities->get_masterval('class',$filter); ?>
											<td><?=$classname[0]->ClassName?></td>
											<td><?=$material->Name?></td>
											<td><?=$material->Quantity?></td>
											<td><?=$material->BranchPrice?></td>
											<td><?=$material->SellingPrice?></td>
											<td><a href="<?=base_url();?>master/manageschoolmaterial/<?=$material->SchoolMaterialId?>"><i class="fa fa-edit"></a></i></td>
											<td><a href="<?=base_url();?>master/modal/<?=$material->SchoolMaterialId?>" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal-7"><i class="fa fa-file-text-o"></i></a></td>
											
										</tr>
									<?php } ?>
								</tbody>
						</table>
				</div>
			</div>
  </div>
</div>