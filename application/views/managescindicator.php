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
											Add SC Indicator
										</div>
									<div class="panel-body">
											<form role="form" class="form-horizontal" action="<?=base_url();?>master/insert_scindicator" method="post">
											<?php if(empty($id)==''){ ?>
														<input type="hidden" name="id" value="<?=$scindicator_update[0]->SCIndicatorId?>">
											<?php } ?>
											
											
													<div class="form-group">
																	<label class="control-label col-sm-4 ">Indicator Name</label>
																	
																			<div class="col-sm-8">
																			<input type="text" required class="form-control" id="field-1" placeholder="Indicator Name" name="indicator_name" value="<?php echo (isset($scindicator_update[0]->SCIndicatorName) ? $scindicator_update[0]->SCIndicatorName : '');?>">
																		</div>

																		
																</div>
													
																<div class="form-group">
																		<label class="col-sm-4 control-label" for="field-1">Area</label>
																		
																		<script type="text/javascript">
																				jQuery(document).ready(function($)
																				{
																					$("#s2example-1").select2({
																						placeholder: 'Select your Area...',
																						allowClear: true
																					}).on('select2-open', function()
																					{
																						// Adding Custom Scrollbar
																						$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																					});
																					
																				});
																			</script>
																	<div class="col-sm-8">
																		<select class="form-control " required id="s2example-1" name="area">
																			<option></option>
																			<optgroup label="Select">
																	<?php foreach($scarea_info as $scareainfo){ ?>
																	<option value="<?=$scareainfo->SCAreaId?>" <?php if(empty($id)==''){ echo (!empty($scindicator_update[0]->SCAreaId==$scareainfo->SCAreaId) ? "selected" : ''); } ?> ><?=$scareainfo->SCAreaName?> (<?=$scareainfo->MasterEntryValue?>)</option>
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
					<h3 class="panel-title">Listing All Scholastic Co-Scholastic Indicators</h3>
					
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
											<th>Area Name</th>
											<th>Indicator Name</th>
											<th><a href="#"><i class="fa fa-edit"></i></a></th>
											
										</tr>
									</thead>
						
									<tfoot>
										<tr>
											<th>Area Name</th>
											<th>Indicator Name</th>
											<th><a href="#"><i class="fa fa-edit"></i></a></th>
											
										</tr>
									</tfoot>
						
									<tbody>
									<?php foreach($scindicator_info as $scindicatorinfo){ ?>
										<tr>
										<?php foreach($scarea_info as $scareainfo){  if($scindicatorinfo->SCAreaId==$scareainfo->SCAreaId){?>
											<td><?=$scareainfo->SCAreaName?> ( <?=$scareainfo->MasterEntryValue;?>)</td><?php }} ?>
											
											<td><?=$scindicatorinfo->SCIndicatorName?></td>
											
											<td><a href="<?=base_url();?>master/managescindicator/<?=$scindicatorinfo->SCIndicatorId?>"><i class="fa fa-edit"></a></i></td>
										</tr>
									<?php } ?>
								</tbody>
						</table>
					
				</div>
			</div>
  </div>
</div>