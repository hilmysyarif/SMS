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
<?php if(!empty($classid) && !empty($sectionid) && !empty($subjectid) && !empty($datehome)){ ?>
<div class="row">
	<div class="col-sm-12">
			<div class="panel  panel-color panel-gray">
						<div class="panel-heading">
							<h3 class="panel-title">Slect Students</h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
							</div>
						</div>
			<div class="panel-body">
				<form role="form" id="taskForm" class="form-horizontal" method="post" action="<?=base_url();?>homework/insert_evaluate">
				<input type="hidden" name="classid" value="<?=isset($classid)?$classid:''?>" readonly />
				<input type="hidden" name="sectionid" value="<?=isset($sectionid)?$sectionid:''?>" readonly />
				<input type="hidden" name="subjectid" value="<?=isset($subjectid)?$subjectid:''?>" readonly />
				<input type="hidden" name="datehome" value="<?=isset($datehome)?$datehome:''?>" readonly />
					 <div class="row">
						
						<div class="form-group col-md-12">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="" >Student</label>
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
										<div class="col-sm-8"  >
										<select class="form-control " required id="s2example-4" name="admissionid">
												<option></option>
												<?php //foreach($student as ){?>
												<option  value="" > </option>
											</select>
										</div>	
							</div>
						</div>
						</div>
						<div class="form-group-separator"></div>
						 <div class="row">
						<div class="form-group col-md-12">
											<label class="control-label col-sm-4" for="field-1">Date Of Evaluate</label>
									
										<div class="col-sm-8">
											<div class="input-group">
														<input type="text" readonly required class="form-control datepicker" data-format="D, dd MM yyyy" name="doe" value="">
														
														<div class="input-group-addon">
															<a href="#"><i class="linecons-calendar"></i></a>
														</div>
													</div>
										</div>
										</div>
					</div>
							<div class="form-group-separator"></div>
							
					<div class="row">
						<div class="form-group col-md-12">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="" >Student Status</label>
									<script type="text/javascript">
										jQuery(document).ready(function($)
										{
										$("#s2example-3").select2({
										placeholder: 'Select ...',
										allowClear: true
										}).on('select2-open', function()
										{
										// Adding Custom Scrollbar
										$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
										});
																	
										});
									</script>
										<div class="col-sm-8"  >
										<select class="form-control " required id="s2example-3" name="studentstatus">
												<option></option>
												<option  value="Complete">Complete</option>
												<option  value="UnComplete">UnComplete</option>
												<option  value="Special case">Special case</option>
												<option  value="Absent">Absent</option>				
											</select>
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
<?php } ?>
<div class="row">
					<div class="col-md-12">
						<div class="panel panel-color panel-gray">
							<div class="panel-heading">
									<h3 class="panel-title">Evaluate Home Work List</h3>
							</div>
								<?php if(!empty($homework)){ $sno=1; foreach($homework as $homework){  ?>
								
									<div class="panel panel-default  collapsed"><!-- Add class "collapsed" to minimize the panel -->
										<div class="panel-heading">
											<h3 class="panel-title"><a href="<?=base_url();?>homework/evaluationofhomework/<?=isset($homework->classid)?$homework->classid:''?>/<?=isset($homework->sectionid)?$homework->sectionid:''?>/<?=isset($homework->subjectid)?$homework->subjectid:''?>/<?=isset($homework->dateofhomework)?$homework->dateofhomework:''?>" ><?=$sno?>. <?=isset($homework->ClassName)?$homework->ClassName:''?> <?=isset($homework->SectionName)?$homework->SectionName:''?>  <?=isset($homework->SubjectName)?$homework->SubjectName:''?>  <?php if(!empty($homework->dateofhomework)){echo date("d m Y",$homework->dateofhomework);}?></a></h3>
											<div class="panel-options">
									
												<a href="#" data-toggle="panel">
													<span class="collapse-icon">&ndash;</span>
													<span class="expand-icon">+</span>
												</a>
												
												<a href="<?=base_url();?>homework/evaluationofhomework/<?=isset($homework->classid)?$homework->classid:''?>/<?=isset($homework->sectionid)?$homework->sectionid:''?>/<?=isset($homework->subjectid)?$homework->subjectid:''?>/<?=isset($homework->dateofhomework)?$homework->dateofhomework:''?>" >
													<i class="fa fa-check"></i>
												</a>
												
												
											</div>
										</div>
						
											<div class="panel-body">
							
												<div class="col-md-9">
												<?php if(!empty($homework->studentstatus)){?>
												<p>Class: <?=isset($homework->ClassName)?$homework->ClassName:''?>  . Section: <?=isset($homework->SectionName)?$homework->SectionName:''?> . Subject: <?=isset($homework->SubjectName)?$homework->SubjectName:''?>.</p>
												
												<?php }else{?>
												<div class="alert alert-danger" >Evaluation Is Not Done!! </div>
												<?php } ?>
												</div>
												
											</div>
									</div>
									<?php $sno++; }}else{?>
									<div class="alert alert-danger" >Home Work List Is Empty!! </div>
									<?php } ?>
					
					
					
						</div>
					</div>
					
</div>

