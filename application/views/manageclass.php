<?php  if($this->session->flashdata('message_type')) { ?>
<div class="row">
<div class="alert alert-success">
<strong><?=$this->session->flashdata('message')?></strong> 
</div>
</div>
<?php }?>
			<div class="row">
					<div class="col-md-6">
						<div class="panel panel-default">
										<div class="panel-heading">
											Add Class
										</div>
									<div class="panel-body">
											<form role="form" class="form-horizontal" action="<?=base_url();?>master/insert_class/class" method="post">
											<?php if(empty($id)==''){ ?>
														<input type="hidden" name="id" value="<?php echo (isset($class_update[0]->ClassId) ? $class_update[0]->ClassId : '');?>">
											<?php } ?>
											<input type="hidden" name="session" value="2015-2016">
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Class Name</label>
																	
																			<div class="col-sm-8">
																			<input type="text" class="form-control" id="field-1" placeholder="Placeholder" name="class_name" value="<?php echo (isset($class_update[0]->ClassName) ? $class_update[0]->ClassName : '');?>" >
																		</div>	

																		
																</div>
																
																
																
																	
																	
																	
																	
																	
									<input type="submit" class="btn btn-info btn-single " value="Add">
													</form>
											
													<div class="form-group-separator"></div>
									</div>
						</div>
						</div>
						<div class="col-md-6">
						<div class="panel panel-default">
										<div class="panel-heading">
											Add Section
										</div>
									<div class="panel-body">
											<form role="form" class="form-horizontal" action="<?=base_url();?>master/insert_class/section" method="post">
											<?php if(empty($id)==''){ ?>
														<input type="hidden" name="id" value="<?php echo (isset($section_update[0]->SectionId) ? $section_update[0]->SectionId : '');?>">
											<?php } ?>
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Class </label>
																	
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
																		<select class="form-control " id="s2example-1" name="class_name">
																			<option></option>
																			<optgroup label="Select">
																	<?php foreach($class_info as $classinfo){ ?>
																	<option value="<?=$classinfo->ClassId?>" <?php if(empty($id)==''){ echo (!empty($section_update[0]->ClassId==$classinfo->ClassId) ? "selected" : ''); } ?>><?=$classinfo->ClassName?></option>
																			<?php } ?>
																		</optgroup>
																		</select>
																</div>	

																		
																</div>
																
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Section Name</label>
																	
																	<div class="col-sm-8">
																			<input type="text" class="form-control" id="field-1" placeholder="Placeholder" name="section_name" value="<?php echo (isset($section_update[0]->SectionName) ? $section_update[0]->SectionName : '');?>" >
																		</div>			

																		
																</div>
												
									<input type="submit" class="btn btn-info btn-single " value="Add">
													</form>
											
													<div class="form-group-separator"></div>
									</div>
						</div>
						
					</div>
			</div>
<div class="row">
  	<div class="col-md-6">
		<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Listing All Class</h3>
					
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
											<th>Class Name</th>
											
											<th><i class="fa fa-edit"></i></th>
											
										</tr>
									</thead>
						
									<tfoot>
										<tr>
											<th>Class Name</th>
											
											<th><a href="#"><i class="fa fa-edit"></i></a></th>
											
										</tr>
									</tfoot>
						
									<tbody>
									<?php foreach($class_info as $classinfo){ ?>
										<tr>
											<td><?=$classinfo->ClassName?></td>
											
											<td><a href="<?=base_url();?>master/manageclass/class/<?=$classinfo->ClassId?>"><i class="fa fa-edit"></a></i></td>
											
										</tr>
									<?php } ?>
								</tbody>
						</table>
					
				</div>
			</div>
			
  </div>
  <div class="col-md-6">
		<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Listing All Section</h3>
					
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
						$("#example-2").dataTable({
							aLengthMenu: [
								[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]
							]
						});
					});
					</script>
					
						<table id="example-2" class="table table-striped table-bordered" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Class Name</th>
											<th>Section</th>
											<th><i class="fa fa-edit"></i></th>
											
										</tr>
									</thead>
						
									<tfoot>
										<tr>
											<th>Class Name</th>
											<th>Section</th>
											<th><a href="#"><i class="fa fa-edit"></i></a></th>
											
										</tr>
									</tfoot>
						
									<tbody>
									<?php foreach($section_info as $sectioninfo){ ?>
										<tr>
										<?php $filter=array('ClassId' => $sectioninfo->ClassId); $classname= $this->utilities->get_masterval('class',$filter); ?>
											<td><?=$classname[0]->ClassName?></td>
											<td><?=$sectioninfo->SectionName?></td>
											<td><a href="<?=base_url();?>master/manageclass/section/<?=$sectioninfo->SectionId?>"><i class="fa fa-edit"></a></i></td>
											
										</tr>
									<?php } ?>
								</tbody>
						</table>
					
				</div>
			</div>
			
  </div>
  
</div>