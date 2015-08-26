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
											Add Exam
										</div>
									<div class="panel-body">
											<form role="form" class="form-horizontal" action="<?=base_url();?>master/insert_exam" method="post">
											<?php if(empty($id)==''){ ?>
														<input type="hidden" name="id" value="<?=$exam_update[0]->ExamId?>">
											<?php } ?>
																<div class="form-group">
																		<label class="col-sm-4 control-label" for="field-1">Class</label>
																		
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
																		<select class="form-control " required id="s2example-1" name="class_name">
																			<option></option>
																			<optgroup label="Select">
																	<?php foreach($class_info as $classinfo){ ?>
																	<option value="<?=$classinfo->ClassId?>" <?php if(empty($id)==''){ echo (!empty($exam_update[0]->SectionId==$classinfo->ClassId) ? "selected" : ''); } ?>><?=$classinfo->ClassName?>  </option>
																			<?php } ?>
																		</optgroup>
																		</select>
																</div>	
																	</div>
																
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Exam Name</label>
																	
																			<div class="col-sm-8">
																			<input type="text" required class="form-control" id="field-1" placeholder="Exam Name" name="exam_name" value="<?php echo (isset($exam_update[0]->ExamName) ? $exam_update[0]->ExamName : '');?>">
																		</div>

																		
																</div>
																
																	
																	
																	<div class="form-group">
																	<label class="control-label col-sm-4 ">Weightage</label>
																	
																			<div class="col-sm-8">
																			<input type="text" required class="form-control" id="field-1" placeholder="Weightage" name="weightage" value="<?php echo (isset($exam_update[0]->Weightage) ? $exam_update[0]->Weightage : '');?>">
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
					<h3 class="panel-title">Listing All Exams</h3>
					
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
											<th>Class</th>
											<th>Exam Name</th>
											<th>Weightage</th>
											<th><a href="#"><i class="fa fa-edit"></i></a></th>
											
										</tr>
									</thead>
						
									<tfoot>
										<tr>
											<th>Class</th>
											<th>Exam Name</th>
											<th>Weightage</th>
											<th><a href="#"><i class="fa fa-edit"></i></a></th>
											
										</tr>
									</tfoot>
						
									<tbody>
									<?php foreach($exam_info as $examinfo){ ?>
										<tr>
											<?php $filter=$examinfo->SectionId; $classname= $this->utilities->get_classval('class',$filter); ?>
											<td><?php foreach($classname as $classname){ echo $classname->ClassName ; echo $classname->SectionName ; }?></td>
											<td><?=$examinfo->ExamName?></td>
											<td><?=$examinfo->Weightage?></td>
											<td><a href="<?=base_url();?>master/manageexam/<?=$examinfo->ExamId?>"><i class="fa fa-edit"></a></i></td>
										</tr>
									<?php } ?>
								</tbody>
						</table>
					
				</div>
			</div>
  </div>
</div>