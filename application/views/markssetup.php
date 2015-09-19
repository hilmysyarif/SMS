 <!--php alert message-->
		<?php  if($this->session->flashdata('message_type')) { ?>
			<div class="row">
				<div class="alert alert-success">
				<strong><?=$this->session->flashdata('message')?></strong> 
				</div>
			</div>
		<?php }?>
	   <!--php alert message-->

<div class="row">
	<div class="col-sm-4">
			<div class="panel  panel-color panel-gray">
						<div class="panel-heading">
							<h3 class="panel-title">Select Option</h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
							</div>
						</div>
				<div class="panel-body">
						 <form role="form" class="form-horizontal" method="post" action="<?=base_url();?>exam/get_markssetup">
												<div class="form-group">
													<label class="col-sm-4 control-label" for="exam" >Exam Type</label>
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
																<select class="form-control " id="s2example-1" name="examtype">
																	<option></option>
																	<?php foreach($exam as $exam){ ?>
																						<option  value="<?=$exam->ExamId?>-<?=$exam->SectionId?>" <?php if(empty($examid)==''){ echo (!empty($exam->SectionId==$examid) ? "selected" : ''); } ?> ><?=$exam->ExamName?> <?=$exam->ClassName?> <?=$exam->SectionName?></option>
																								<?php  } ?>
																
																</select>
															</div>	
												</div>
												<div class="form-group-separator"></div>
													<div class="form-group">
													<label class="col-sm-4 control-label" for="" >Class</label>
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
																<select class="form-control " id="s2example-2" name="sectionid">
																	<option></option>
																	<?php foreach($subject as $subject){ ?>
																						<option  value="<?=$subject->SubjectId?>" <?php if(empty($subjectid)==''){ echo (!empty($subject->SubjectId==$subjectid) ? "selected" : ''); } ?> ><?=$subject->SubjectName?> </option>
																								<?php  } ?>
																
																</select>
															</div>	
												</div>
												
												<div class="form-group-separator"></div>
													<div class="form-group">
													<label class="col-sm-4 control-label" for="" >Student</label>
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
																<select class="form-control " id="s2example-2" name="Studentid">
																	<option></option>
																	<?php foreach($subject as $subject){ ?>
																						<option  value="<?=$subject->SubjectId?>" <?php if(empty($subjectid)==''){ echo (!empty($subject->SubjectId==$subjectid) ? "selected" : ''); } ?> ><?=$subject->SubjectName?> </option>
																								<?php  } ?>
																
																</select>
															</div>	
												</div>
												
												<div class="form-group-separator"></div>
													<div class="form-group">
													<label class="col-sm-4 control-label" for="" >Subject</label>
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
																<select class="form-control " id="s2example-2" name=" ">
																	<option></option>
																	<?php foreach($subject as $subject){ ?>
																						<option  value="<?=$subject->SubjectId?>" <?php if(empty($subjectid)==''){ echo (!empty($subject->SubjectId==$subjectid) ? "selected" : ''); } ?> ><?=$subject->SubjectName?> </option>
																								<?php  } ?>
																
																</select>
															</div>	
												</div>
												
												<div class="form-group pull-right">
														<input  type="submit" name="submit" value="Get Student" class="btn btn btn-info btn-single "/>
												</div>
						</form>
				</div>
			</div>
	</div>
	<?php if(isset($examid) && isset($subjectid)){?>
	<div class="col-sm-8">
					<div class="panel  panel-color panel-gray">
						<div class="panel-heading">
							<h3 class="panel-title"><?=$exam_class_details[0]->ExamName?></h3>
							<div class="panel-options">
							<div class="label label-secondary"><?=$exam_class_details[0]->ClassName?> <?=$exam_class_details[0]->SectionName?></div>
							<div class="label label-danger"><?=$exam_details[0]->SubjectName?></div>
							<span class="print-icon"><i class="fa fa-print"></i></span>
							
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
									
								</a>
							</div>
						</div>
						<div class="panel-body">
								<form role="form" class="form-horizontal">
								<div class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">
										<table cellspacing="0" class="table table-small-font table-bordered table-striped" >
											<thead>
												<tr>
													<th>Student</th>
													<th><?=$exam_details[0]->ExamActivityName?></br>MM: <?=$exam_details[0]->MaximumMarks?></th>
													<th>MM: <?=$exam_details[0]->MaximumMarks?></th>
													<th>Grade</th>
												
												</tr>
											</thead>
										 											
											<tbody>
												
												<?php foreach($student_details as $student_details){ ?>
												<tr>
													<td><?=$student_details->StudentName?></br><?=$student_details->Mobile?></td>
													<td>
														<div class="input-group spinner" data-step="1">
															<span class="input-group-btn">
																<button class="btn btn-gray" data-type="decrement">-</button>
															</span>
															<input type="number" class="form-control text-center" name="Field_<?=$student_details->StudentName?>_<?=$student_details->StudentName?>" value="" />
															<span class="input-group-btn">
																<button class="btn btn-gray" data-type="increment">+</button>
															</span>
														</div>													
													</td>
													<td>0</td>
													<td>E2</td>
													</tr>
												<?php } ?>
												
											</tbody>
										</table>
									</div>	
								</form>
						</div>
					</div>
				</div>
	<?php } ?>
</div>

	
	   
	
