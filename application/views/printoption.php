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
											Add Print Option
										</div>
									<div class="panel-body">
											<form role="form" class="form-horizontal" action="<?=base_url();?>master/insert_printoption" method="post">
											<?php if(empty($id)==''){ ?>
														<input type="hidden" name="id" value="<?=$printoption_update[0]->PrintOptionId?>">
											<?php } ?>
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Print Category</label>
																	
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
																		<select class="form-control " id="s2example-1" name="print_cat">
																			<option></option>
																			<optgroup label="Select">
																	<?php foreach($print_category as $print_category){ ?>
																	<option value="<?=$print_category->MasterEntryId?>" <?php if(empty($id)==''){ echo (!empty($printoption_update[0]->PrintCategory==$print_category->MasterEntryId) ? "selected" : ''); } ?>><?=$print_category->MasterEntryValue?></option>
																			<?php } ?>
																		</optgroup>
																		</select>
																</div>	

																		
																</div>
																<div class="form-group">
																<label class="control-label col-sm-4 ">Width In Cm</label>
																	<div class="col-sm-8">
																<div class="input-group spinner" data-step="1">
																	<span class="input-group-btn">
																		<button class="btn btn-gray" data-type="decrement">-</button>
																	</span>
																	<input type="text" class="form-control text-center" value="<?php echo (isset($printoption_update[0]->Width) ? $printoption_update[0]->Width : '');?>" name="width"/>
																	<span class="input-group-btn">
																		<button class="btn btn-gray" data-type="increment">+</button>
																	</span>
																</div>
															</div>
													</div>					
																
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Header</label>
																	
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
																		<select class="form-control " id="s2example-1" name="header">
																			<option></option>
																			<optgroup label="Select">
																	<?php foreach($header as $header){ ?>
																	<option value="<?=$header->HeaderId?>" <?php if(empty($id)==''){ echo (!empty($printoption_update[0]->HeaderId==$header->HeaderId) ? "selected" : ''); } ?> ><?=$header->HeaderTitle?></option>
																			<?php } ?>
																		</optgroup>
																		</select>
																</div>	

																		
																</div>
																
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Footer</label>
																	
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
																		<select class="form-control " id="s2example-1" name="footer">
																			<option></option>
																			<optgroup label="Select">
																	<?php foreach($footer as $footer){ ?>
																	<option value="<?=$footer->HeaderId?>" <?php if(empty($id)==''){ echo (!empty($printoption_update[0]->FooterId==$footer->HeaderId) ? "selected" : ''); } ?> ><?=$footer->HeaderTitle?></option>
																			<?php } ?>
																		</optgroup>
																		</select>
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
					<h3 class="panel-title">Print Option  List</h3>
					
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
											<th>Header</th>
											<th>Footer</th>
											<th>Print Category</th>
											<th>Width</th>
											<th><i class="fa fa-edit"></i></th>
											<th><i class="fa fa-file-text-o"></th>
											
										</tr>
									</thead>
						
									<tfoot>
										<tr>
											<th>Header</th>
											<th>Footer</th>
											<th>Print Category</th>
											<th>Width</th>
											<th><a href="#"><i class="fa fa-edit"></i></a></th>
											<th><a href="#"><i class="fa fa-file-text-o"></a></th>
											
										</tr>
									</tfoot>
						
									<tbody>
									<?php foreach($printoption as $printoption){ ?>
										<tr>
										<?php $filter=array('HeaderId'=>$printoption->HeaderId); $header= $this->utilities->get_masterval('header',$filter); ?>
											<td><?=$header[0]->HeaderTitle?></td>
											<?php $filter=array('HeaderId'=>$printoption->FooterId); $footer= $this->utilities->get_masterval('header',$filter); ?>
											<td><?=$footer[0]->HeaderTitle?></td>
											<td><?=$printoption->MasterEntryValue?></td>
											<td><?=$printoption->Width?></td>
											<td><a href="<?=base_url();?>master/printoption/<?=$printoption->PrintOptionId?>"><i class="fa fa-edit"></a></i></td>
											<td><a href="<?=base_url();?>master/modal/<?=$printoption->PrintOptionId?>" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal-7"><i class="fa fa-file-text-o"></i></a></td>
											
										</tr>
									<?php } ?>
								</tbody>
						</table>
					
				</div>
			</div>
  </div>
</div>