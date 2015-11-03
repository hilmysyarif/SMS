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
							<h3 class="panel-title">Setup Marks</h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
							</div>
						</div>
			<div class="panel-body">
				<form role="form" class="form-horizontal" method="post" action="<?=base_url();?>exam/insert_marksetup">
				<?php if(isset($exam_id)){ ?> <input type="hidden" name="exam_id" value="<?=$exam_id?>"/> <?php } ?>
					 <div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="exam" >Exam Type</label>
									<script type="text/javascript">
										jQuery(document).ready(function($)
										{
											$("#s2example-1").select2({
											placeholder: 'Select ...',
											allowClear: true
											}).on('select2-open', 
											function(){
											// Adding Custom Scrollbar
											$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
											});
																	
										});
									</script>
										<div class="col-sm-8">
											<select class="form-control " required id="s2example-1" name="examtype">
											
												<option></option>
													<?php foreach($exam as $exam){ ?>
													<option  value="<?=$exam->Exam_Type?>" <?php if(empty($exam_id)==''){ echo (!empty($exam->Exam_Type==$marksetup_up[0]->Exam_Type) ? "selected" : ''); } ?> ><?=$exam->Exam_Type?> </option>
																								<?php  } ?>
															
											</select>
										</div>	
							</div>
						</div>
												
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
											<select class="form-control " required id="s2example-2" name="sectionid" onchange="show_student_exam(this.value,0),show_subject(this.value,0)">
												<option></option>
													<?php foreach($class_info as $cls){ ?>
																	<option  value="<?=$cls->SectionId?>" <?php if(isset($exam_id)){ echo (!empty($cls->SectionId==$marksetup_up[0]->Section_Id) ? "selected" : ''); } ?> ><?=$cls->ClassName?> <?=$cls->SectionName?></option>
																			<?php  } ?>
											</select>
										</div>	
							</div>
						</div>
												
						<div class="col-md-4">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="" >Student</label>
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
										<div class="col-sm-8" id="show_student">
											<select class="form-control " required id="s2example-3" name="student">
												<option></option>
												<option <?php if(isset($student)){?> value="<?=$student?>"  selected <?php } ?> ><?php if(isset($student)){ echo $markssubstudent[0]->StudentName;}?> <?php if(isset($student)){ echo $markssubstudent[0]->FatherName;}?> <?php if(isset($student)){ echo $markssubstudent[0]->Mobile;}?></option>
																
											</select>
										</div>	
							</div>
						</div>
					</div>
							<div class="form-group-separator"></div>
							
					<div class="row">
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
												<option  <?php if(isset($subject)){ ?> value="<?=$subject?>"  selected <?php  }?> ><?php if(isset($subject)){ echo $markssubstudent[0]->SubjectName;}?> </option>
																
											</select>
										</div>	
							</div>
						</div>
												
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label col-sm-4 ">Maximum Marks</label>
									<div class="col-sm-8">
										<div class="input-group spinner" data-step="1">
											<span class="input-group-btn">
												<button class="btn btn-gray" data-type="decrement">-</button>
											</span>
												<input type="number" required class="form-control text-center" name="maxmarks" value="<?php echo (isset($marksetup_up[0]->Max_Marks) ? $marksetup_up[0]->Max_Marks : '');?>" />
											<span class="input-group-btn">
												<button class="btn btn-gray" data-type="increment">+</button>
											</span>
										</div>	
									</div>
							</div>
						</div>
												
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label col-sm-4 ">Obtain Marks</label>
									<div class="col-sm-8">
										<div class="input-group spinner" data-step="1">
											<span class="input-group-btn">
												<button class="btn btn-gray" data-type="decrement">-</button>
											</span>
												<input type="number" required class="form-control text-center" name="obtainmarks" value="<?php echo (isset($marksetup_up[0]->Marks_Obtain) ? $marksetup_up[0]->Marks_Obtain : '');?>" />
											<span class="input-group-btn">
												<button class="btn btn-gray" data-type="increment">+</button>
											</span>
										</div>
									</div>
							</div>
						</div>
					</div>
																
						<div class="form-group-separator"></div>
												
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label col-sm-4 ">Grade</label>
									<div class="col-sm-8">
										<input type="text" required class="form-control" id="field-1" placeholder="Grade" name="grade" value="<?php echo (isset($marksetup_up[0]->Grade) ? $marksetup_up[0]->Grade : '');?>">
									</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="" >Result</label>
									<script type="text/javascript">
										jQuery(document).ready(function($)
										{
											$("#s2example-5").select2({
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
											<select class="form-control " required id="s2example-5" name="result">
												
												<option></option>
																			<?php $filter=array('MasterEntryName' => 'Result'); $user= $this->utilities->get_usertype($filter); ?>
																	<?php foreach($user as $usertype){ ?>
																	<option value="<?=$usertype->MasterEntryId?>" <?php if(empty($exam_id)==''){ echo (!empty($marksetup_up[0]->Result==$usertype->MasterEntryId) ? "selected" : ''); } ?>><?=$usertype->MasterEntryValue?></option>
																			<?php } ?>
																		
											</select>
										</div>	
							</div>
						</div>
																
									
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label col-sm-4 ">Date Of Exam</label>
									<div class="col-sm-8">
									<div class="input-group">
										<input type="text" required readonly class="form-control datepicker" data-format="D, dd MM yyyy" name="doe" value="<?php if(isset($marksetup_up[0]->DateOfExam)){echo date("d M Y",$marksetup_up[0]->DateOfExam) ;}?>">
											<div class="input-group-addon">
												<a href="#"><i class="linecons-calendar"></i></a>
											</div></div>
									</div>
							</div>
						</div>
					</div>
																
						<div class="form-group-separator"></div>
											
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label col-sm-4 ">Remarks</label>
									<div class="col-sm-8">
										<textarea required class="form-control" id="field-1" placeholder="Remarks" name="remarks" ><?php echo (isset($marksetup_up[0]->Remarks) ? $marksetup_up[0]->Remarks : '');?></textarea>
									</div>

																		
							</div>
						</div>
											
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label col-sm-4 ">Evaluate By</label>
									<div class="col-sm-8">
										<input type="text" required class="form-control" id="field-1" placeholder="Evaluated By" name="evaluatedby" value="<?php echo (isset($marksetup_up[0]->Evaluated_By) ? $marksetup_up[0]->Evaluated_By : '');?>">
									</div>

							</div>
						</div>
								
						<div class="col-md-4">
							<div class="form-group pull-right">
								<input  type="submit" name="save" value="SetUp Marks" class="btn btn btn-info btn-single "/>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	
</div>

<div class="row">
					<div class="col-md-12">
						<div class="panel panel-color panel-gray">
								<div class="panel-heading">
									<h3 class="panel-title">Marks SetUp List</h3>
									
									<div class="panel-options">
										<a href="#" data-toggle="panel">
											<span class="collapse-icon">&ndash;</span>
											<span class="expand-icon">+</span>
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
									<form role="form" class="form-horizontal">
								<div class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">
										<table id="example-1" class="table table-striped table-bordered" cellspacing="0" width="100%" style="font-size:11px">
													<thead>
														<tr>
															<th>Exam Type</th>
															<th>Class</th>
															<th>Student</th>
															<th>Subject</th>
															<th>Maximum Marks</th>
															<th>Marks Obtain</th>
															<th>Grade</th>
															<th>Result</th>
															<th>Date Of Exam</th>
															<th>Remarks</th>
															<th>Evaluated By</th>
															<th>Created On</th>
															<th><i class="fa fa-edit"></i></th>
															<th><i class="fa fa-times"></th>
															
														</tr>
													</thead>
										
													<tfoot>
														<tr>
															<th>Exam Type</th>
															<th>Class</th>
															<th>Student</th>
															<th>Subject</th>
															<th>Maximum Marks</th>
															<th>Marks Obtain</th>
															<th>Grade</th>
															<th>Result</th>
															<th>Date Of Exam</th>
															<th>Remarks</th>
															<th>Evaluated By</th>
															<th>Created On</th>
															<th><i class="fa fa-edit"></i></th>
															<th><i class="fa fa-times"></th>
															
														</tr>
													</tfoot>
										
													<tbody>
													<?php foreach($marksetup as $markssetup) {?>
														<tr>
															<td><?=$markssetup->Exam_Type?></td>
															<td><?=$markssetup->ClassName?> <?=$markssetup->SectionName?></td>
															<td><?=$markssetup->StudentName?> <?=$markssetup->FatherName?></td>
															<td><?=$markssetup->SubjectName?></td>
															<td><?=$markssetup->Max_Marks?></td>
															<td><?=$markssetup->Marks_Obtain?></td>
															<td><?=$markssetup->Grade?></td>
															<td><?=$markssetup->MasterEntryValue?></td>
															<td><?php if(isset($markssetup->DateOfExam)){echo date("d-m-Y",$markssetup->DateOfExam);}?></td>
															<td><?=$markssetup->Remarks?></td>
															<td><?=$markssetup->Evaluated_By?></td>
															<td><?=$markssetup->DOC?></td>
															<td><a href="<?=base_url();?>exam/markssetup/<?=$markssetup->Exam_Detail_Id?>"><i class="fa fa-edit"></a></i></td>
															<td><a onClick="return confirm('Are you sure to delete this ? This will delete all the related records ')" href="<?=base_url();?>exam/delete/examdetails/Exam_Detail_Id/<?=$markssetup->Exam_Detail_Id?>"  ><i class="fa fa-times"></i></a></td>
															
														</tr>
													<?php } ?>
												</tbody>
										</table>
									</div>	
								</form>
								</div>
						</div>
					</div>
					
				</div>

	
	   
	
