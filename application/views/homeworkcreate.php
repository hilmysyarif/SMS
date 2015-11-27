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
							<h3 class="panel-title">Create Home Work</h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
							</div>
						</div>
			<div class="panel-body">
				<form role="form" id="taskForm" class="form-horizontal" method="post" action="<?=base_url();?>homework/insert_homework">
				
					 <div class="row">
						<div class="col-md-4">
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
											<select class="form-control " required id="s2example-2" name="class" onchange="show_student_exam(this.value,0),show_subject(this.value,0)">
												<option></option>
													<?php foreach($class_info as $cls){ ?>
																	<option  value="<?=$cls->SectionId?>" <?php if(isset($updatehomework)){ echo (!empty($cls->SectionId==$updatehomework[0]->sectionid) ? "selected" : ''); } ?> ><?=$cls->ClassName?> <?=$cls->SectionName?></option>
																			<?php  } ?>
											</select>
										</div>	
							</div>
						</div>
												
						<div class="col-md-4">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="" >Subject</label>
									<script type="text/javascript">
										jQuery(document).ready(function($)
										{
										$("#s2example-4").select2({
										placeholder: 'Select ...',
										allowClear: true
										}).on('select2-open', function()
										{
										// Adding Custom Scrollbar
										$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
										});
																	
										});
									</script>
										<div class="col-sm-8"  id="show_subject">
										<select class="form-control " required id="s2example-4" name="subjectid1">
												<option></option>
												<option  <?php if(isset($subject)){ ?> value="<?=$subject[0]->SubjectId?>"  selected <?php  }?> ><?php if(isset($subject)){ echo $subject[0]->SubjectName;}?> </option>
																
											</select>
										</div>	
							</div>
						</div>
						<div class="form-group col-md-4">
											<label class="control-label col-sm-4" for="field-1">Date Of Homework</label>
									
										<div class="col-sm-8">
											<div class="input-group">
														<input type="text" readonly required class="form-control datepicker" data-format="D, dd MM yyyy" name="dow" value="<?php if(isset($updatehomework[0]->dateofhomework)){echo date("d-m-Y H:i",$updatehomework[0]->dateofhomework);}?>">
														
														<div class="input-group-addon">
															<a href="#"><i class="linecons-calendar"></i></a>
														</div>
													</div>
										</div>
										</div>
					</div>
							<div class="form-group-separator"></div>
							
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label col-sm-1 ">HomeWork</label>
									<div class="col-sm-11">
										<textarea required name="homework" class="form-control ckeditor" rows="10"><?php echo (isset($updatehomework[0]->homework) ? $updatehomework[0]->homework : '');?></textarea>
									</div>
							</div>
						</div>
					</div>
																
						<div class="form-group-separator"></div>
						
					<div class="row">
						<div class="form-group col-md-12">
											<label class="control-label col-sm-4" for="field-1">Date Of Submission</label>
									
										<div class="col-sm-8">
											<div class="input-group">
														<input type="text" readonly required class="form-control datepicker" data-format="D, dd MM yyyy" name="dos" value="<?php if(isset($updatehomework[0]->dosubmission)){echo date("d-m-Y H:i",$updatehomework[0]->dosubmission);}?>">
														
														<div class="input-group-addon">
															<a href="#"><i class="linecons-calendar"></i></a>
														</div>
													</div>
										</div>
										</div>
					</div>
																
						<div class="form-group-separator"></div>
											
					<div class="row">
						<div class="col-md-4">
							<div class="form-group pull-right">
								<input  type="submit" name="save" value="Finish" class="btn btn btn-info btn-single "/>
							</div>
						</div>
					</div>
					
				</form>
			</div>
		</div>
	</div>
	
</div>
