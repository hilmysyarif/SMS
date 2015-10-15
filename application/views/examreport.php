 <!--php alert message-->
		<?php  if($this->session->flashdata('message_type')=='success') { ?>
			<div class="row">
				<div class="alert alert-success">
				<strong><?=$this->session->flashdata('message')?></strong> 
				</div>
			</div>
		<?php }?>
		<?php  if($this->session->flashdata('message_type')=='error') { ?>
			<div class="row">
				<div class="alert alert-danger">
				<strong><?=$this->session->flashdata('message')?></strong> 
				</div>
			</div>
		<?php }?>
	   <!--php alert message-->

<div class="row">
	<div class="col-sm-12">
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
						 <form role="form" class="form-horizontal" method="post" target="blank" action="<?=base_url();?>exam/print_examreport">
												<div class="row">
												<div class="col-sm-6">
												<div class="form-group">
													<label class="col-sm-4 control-label" for="exam" >Exam Type</label>
														<script type="text/javascript">
																jQuery(document).ready(function($)
																{
																	$("#s2example-3").select2({
																		placeholder: 'Select Exam Type',
																		allowClear: true
																	}).on('select2-open', function()
																	{
																		// Adding Custom Scrollbar
																		$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																	});
																	
																});
															</script>
															<div class="col-sm-8">
																<select required class="form-control " id="s2example-3" name="examtype" onchange="show_student(this.value,0)">
																	<option></option>
													<?php foreach($exam as $exam){ ?>
													<option  value="<?=$exam->Exam_Type?>" <?php if(empty($exam_id)==''){ echo (!empty($exam->Exam_Type==$marksetup_up[0]->Exam_Type) ? "selected" : ''); } ?> ><?=$exam->Exam_Type?> </option>
																								<?php  } ?>
																
																</select>
															</div>	
												</div></div>
												<div class="col-sm-6">
												<div class="form-group">
													<label class="col-sm-4 control-label" for="exam" >Class</br><span style="font-size:10px;color:red">Optional</span></label>
														<script type="text/javascript">
																jQuery(document).ready(function($)
																{
																	$("#s2example-1").select2({
																		placeholder: 'Select Class',
																		allowClear: true
																	}).on('select2-open', function()
																	{
																		// Adding Custom Scrollbar
																		$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																	});
																	
																});
															</script>
															<div class="col-sm-8">
																<select class="form-control "  id="s2example-1" name="sectionid" onchange="show_student(this.value,0),show_subject1(this.value,0)">
																	<option></option>
																	<?php foreach($class as $class){ ?>
																						<option  value="<?=$class->SectionId?>"  ><?=$class->ClassName?> <?=$class->SectionName?> </option>
																								<?php  } ?>
																
																</select>
															</div>	
												</div></div>
												</div>
												<div class="form-group-separator"></div>
												<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
													<label class="col-sm-4 control-label" for="" >Student</br><span style="font-size:10px;color:red">Optional</span></label>
														<script type="text/javascript">
																jQuery(document).ready(function($)
																{
																	$("#s2example-2").select2({
																		placeholder: 'Select Student',
																		allowClear: true
																	}).on('select2-open', function()
																	{
																		// Adding Custom Scrollbar
																		$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																	});
																	
																});
															</script>
															<div class="col-sm-8" id="show_student">
											<select class="form-control "  id="s2example-2" name="student">
												<option></option>
												<option <?php if(isset($student)){?> value="<?=$student?>"  selected <?php } ?> ><?php if(isset($student)){ echo $markssubstudent[0]->StudentName;}?> <?php if(isset($student)){ echo $markssubstudent[0]->FatherName;}?> <?php if(isset($student)){ echo $markssubstudent[0]->Mobile;}?></option>
																
											</select>
										</div>
												</div></div>
												<div class="col-sm-6">
												<div class="form-group">
													<label class="col-sm-4 control-label" for="" >Subject</br><span style="font-size:10px;color:red">Optional</span></label>
														<script type="text/javascript">
																jQuery(document).ready(function($)
																{
																	$("#s2example-4").select2({
																		placeholder: 'Select Subject',
																		allowClear: true
																	}).on('select2-open', function()
																	{
																		// Adding Custom Scrollbar
																		$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																	});
																	
																});
															</script>
															<div class="col-sm-8"  id="show_subject">
											<select class="form-control "  id="s2example-4" name="subjectid1">
												<option></option>
												<option  <?php if(isset($subject)){ ?> value="<?=$subject?>"  selected <?php  }?> ><?php if(isset($subject)){ echo $markssubstudent[0]->SubjectName;}?> </option>
																
											</select>
										</div>	
												</div></div></div>
												
												<div class="form-group pull-right">
														<input  type="submit" name="submit" value="Get Report" class="btn btn btn-info btn-single "/>
												</div>
						</form>
				</div>
			</div>
	</div>

	
</div>

	
	   
	
>>>>>>> refs/remotes/origin/master
<?php //} ?>
