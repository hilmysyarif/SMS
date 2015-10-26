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
											Add SC Area
										</div>
									<div class="panel-body">
											<form role="form" class="form-horizontal" action="<?=base_url();?>master/insert_scarea" method="post">
											<?php if(empty($id)==''){ ?>
														<input type="hidden" name="id" value="<?=$scarea_update[0]->SCAreaId?>">
											<?php } ?>
											
											
													<div class="form-group">
																	<label class="control-label col-sm-4 ">Area Name</label>
																	
																			<div class="col-sm-8">
																			<input type="text" required class="form-control" id="field-1" placeholder="Area Name" name="area_name" value="<?php echo (isset($scarea_update[0]->SCAreaName) ? $scarea_update[0]->SCAreaName : '');?>">
																		</div>

																		
																</div>
													
																<div class="form-group">
																		<label class="col-sm-4 control-label" for="field-1">Part</label>
																		
																		<script type="text/javascript">
																				jQuery(document).ready(function($)
																				{
																					$("#s2example-1").select2({
																						placeholder: 'Select your Part...',
																						allowClear: true
																					}).on('select2-open', function()
																					{
																						// Adding Custom Scrollbar
																						$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																					});
																					
																				});
																			</script>
																	<div class="col-sm-8">
																		<select class="form-control " required id="s2example-1" name="part">
																			<option></option>
																			<optgroup label="Select">
																	<?php  foreach($scarea_part as $scareapart){ ?>
																	<option value="<?=$scareapart->MasterEntryId?>" <?php if(empty($id)==''){ echo (!empty($scarea_update[0]->SCPartId==$scareapart->MasterEntryId) ? "selected" : ''); } ?> ><?=$scareapart->MasterEntryValue?></option>
																			<?php } ?>
																		</optgroup>
																		</select>
																</div>	
																	</div>
																
																
																
																<div class="form-group">
																		<label class="col-sm-4 control-label" for="field-1">Class</label>
																		
																		<script type="text/javascript">
																				jQuery(document).ready(function($)
																				{
																					$("#s2example-2").select2({
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
																		<select class="form-control " required id="s2example-2" name="class[]" multiple>
																			<option></option>
																			<optgroup label="Select">
																	<?php foreach($class_info as $classinfo){ ?>
																	<option value="<?=$classinfo->SectionId?>" <?php if(empty($id)==''){ $cal_id=$scarea_update[0]->SCAreaClass;  $cal_id=explode(',',$cal_id); foreach($cal_id as $val){ echo (!empty($val==$classinfo->SectionId) ? "selected" : ''); }} ?>><?=$classinfo->ClassName?> <?=$classinfo->SectionName?></option>
																			<?php } ?>
																		</optgroup>
																		</select>
																</div>	
																	</div>	
																	
																	<div class="form-group">
																		<label class="col-sm-4 control-label" for="field-1">Grading Point</label>
																		
																		<script type="text/javascript">
																				jQuery(document).ready(function($)
																				{
																					$("#s2example-3").select2({
																						placeholder: 'Select your Grading Points...',
																						allowClear: true
																					}).on('select2-open', function()
																					{
																						// Adding Custom Scrollbar
																						$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																					});
																					
																				});
																			</script>
																	<div class="col-sm-8">
																		<select class="form-control " required id="s2example-3" name="grading_point">
																			<option></option>
																			<optgroup label="Select">
																	<?php foreach($scarea_gradingpoint as $scareagradingpoint){ ?>
																	<option value="<?=$scareagradingpoint->MasterEntryId?>" <?php if(empty($id)==''){ echo (!empty($scarea_update[0]->GradingPoint==$scareagradingpoint->MasterEntryId) ? "selected" : ''); } ?>><?=$scareagradingpoint->MasterEntryValue?></option>
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
					<h3 class="panel-title">Listing All Scholastic Co-Scholastic Area</h3>
					
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
											<th>Part</th>
											<th>Class</th>
											<th><a href="#"><i class="fa fa-edit"></i></a></th>
											
										</tr>
									</thead>
						
									<tfoot>
										<tr>
											<th>Area Name</th>
											<th>Part</th>
											<th>Class</th>
											<th><a href="#"><i class="fa fa-edit"></i></a></th>
											
										</tr>
									</tfoot>
						
									<tbody>
									<?php foreach($scarea_info as $scareainfo){ ?>
										<tr><?php $filter=array('MasterEntryId'=>$scareainfo->GradingPoint); $grading= $this->utilities->get_usertype($filter); ?>
											<td><?=$scareainfo->SCAreaName?> (<?=$grading[0]->MasterEntryValue?>)</td>
											<td><?=$scareainfo->MasterEntryValue?></td>
											<?php $filter=$scareainfo->SCAreaClass; $classname= $this->utilities->get_classval('class',$filter); ?>
											<td><?php foreach($classname as $classname){ echo $classname->ClassName ; echo"&nbsp&nbsp"; echo $classname->SectionName ; echo"<br>"; }?></td>
											<td><a href="<?=base_url();?>master/managescarea/<?=$scareainfo->SCAreaId?>"><i class="fa fa-edit"></a></i></td>
										</tr>
									<?php } ?>
								</tbody>
						</table>
					
				</div>
			</div>
  </div>
</div>