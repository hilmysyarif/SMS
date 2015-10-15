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
							<h3 class="panel-title">Create Online Exam</h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
							</div>
						</div>
			<div class="panel-body">
				<form role="form" class="form-horizontal" method="post" action="<?=base_url();?>onlineexam/insert_onlineexam">
				<?php if(isset($ol_exam_id)){ ?> <input type="hidden" name="ol_exam_id" value="<?=$ol_exam_id?>"/> <?php } ?>
					 <div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="exam" >Exam Name</label>
									<div class="col-sm-8">
										<input type="text" required class="form-control" id="field-1" placeholder="Exam Name" name="examname" value="<?php echo (isset($updateonlineexam[0]->exam_name) ? $updateonlineexam[0]->exam_name : '');?>">
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
																	<option  value="<?=$cls->SectionId?>" <?php if(isset($ol_exam_id)){ echo (!empty($cls->SectionId==$updateonlineexam[0]->online_section_id) ? "selected" : ''); } ?> ><?=$cls->ClassName?> <?=$cls->SectionName?></option>
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
					</div>
							<div class="form-group-separator"></div>
							
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label col-sm-4 ">Date Of Exam</label>
									<div class="col-sm-8">
									<div class="input-group">
										<input type="text" required readonly class="form-control datepicker" data-format="D, dd MM yyyy" name="doe" value="<?php if(isset($updateonlineexam[0]->online_exam_date)){echo date("d M Y h",$updateonlineexam[0]->online_exam_date) ;}?>">
											<div class="input-group-addon">
												<a href="#"><i class="linecons-calendar"></i></a>
											</div></div>
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
												<input type="number" required class="form-control text-center" name="maxmarks" value="<?php echo (isset($updateonlineexam[0]->online_max_marks) ? $updateonlineexam[0]->online_max_marks : '');?>" />
											<span class="input-group-btn">
												<button class="btn btn-gray" data-type="increment">+</button>
											</span>
										</div>	
									</div>
							</div>
						</div>
												
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label col-sm-4 ">Cutt Off</label>
									<div class="col-sm-8">
										<div class="input-group spinner" data-step="1">
											<span class="input-group-btn">
												<button class="btn btn-gray" data-type="decrement">-</button>
											</span>
												<input type="number" required class="form-control text-center" name="cuttoff" value="<?php echo (isset($updateonlineexam[0]->online_cuttoff) ? $updateonlineexam[0]->online_cuttoff : '');?>" />
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
								<label class="col-sm-4 control-label" for="" >Level</label>
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
											<select class="form-control " required id="s2example-5" name="level">
												
												<option></option>
																			<?php $filter=array('MasterEntryName' => 'Level'); $user= $this->utilities->get_usertype($filter); ?>
																	<?php foreach($user as $usertype){ ?>
																	<option value="<?=$usertype->MasterEntryValue?>" <?php if(empty($ol_exam_id)==''){ echo (!empty($updateonlineexam[0]->online_exam_level==$usertype->MasterEntryValue) ? "selected" : ''); } ?>><?=$usertype->MasterEntryValue?></option>
																			<?php } ?>
																		
											</select>
										</div>	
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label col-sm-4 ">No Of Qustion</label>
									<div class="col-sm-8">
										<div class="input-group spinner" data-step="1">
											<span class="input-group-btn">
												<button class="btn btn-gray" data-type="decrement">-</button>
											</span>
												<input type="number" required class="form-control text-center" name="noofqustion" value="<?php echo (isset($updateonlineexam[0]->no_of_qustion) ? $updateonlineexam[0]->no_of_qustion : '');?>" />
											<span class="input-group-btn">
												<button class="btn btn-gray" data-type="increment">+</button>
											</span>
										</div>
									</div>
							</div>
						</div>
																
		
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label col-sm-4 ">Exam Duration</label>
									<div class="col-sm-8">
									<div class="input-group input-group-minimal">
											<input type="text" required name="duration" id="timepicker" class="form-control " data-format="hh:mm " class="input-small"
											value="<?php echo (isset($updateonlineexam[0]->online_ex_duration) ? $updateonlineexam[0]->online_ex_duration : '');?>"/>
											
											<div class="input-group-addon">
												<a href="javascript:;"><i class="linecons-clock"></i></a>
											</div>
																		</div>
									</div>
							</div>
						</div>
					</div>
													
						<div class="form-group-separator"></div>
											
					<div class="row">
					
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label col-sm-4 ">Duration Per Qustion</label>
									<div class="col-sm-8">
										<input type="text" required class="form-control" id="timepicker1" data-format=":mm " placeholder="Duration Per Qustion" name="durationqustion" value="<?php echo (isset($updateonlineexam[0]->duration_per_qus) ? $updateonlineexam[0]->duration_per_qus : '');?>">
									</div>

							</div>
						</div>
															<script>
															$(function(){
															$('#timepicker,#timepicker1').clockface();  
															});</script>	
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label col-sm-4 ">Remarks</label>
									<div class="col-sm-8">
										<textarea required class="form-control" id="field-1" placeholder="Remarks" name="remarks" ><?php echo (isset($updateonlineexam[0]->remarks) ? $updateonlineexam[0]->remarks : '');?></textarea>
									</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="form-group pull-right">
								<input  type="submit" name="save" value="Create Exam" class="btn btn btn-info btn-single "/>
							</div>
						</div>
						
										
						
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label col-sm-1 ">Exam Status</label>
									<div class="col-sm-11">
										<div class="form-block">
											<label class="control-label col-sm-2 ">Active	
												<input type="radio" class="cbr cbr-secondary" required name="examstatus" <?=(isset($updateonlineexam[0]->online_exam_status)&&$updateonlineexam[0]->online_exam_status=='Active')?"checked":""?> value="Active"></label>
											<label class="control-label col-sm-2 ">Inactive
												<input type="radio" required class="cbr cbr-red" name="examstatus" <?=(isset($updateonlineexam[0]->online_exam_status)&&$updateonlineexam[0]->online_exam_status=='Inactive')?"checked":""?> value="Inactive">
											</label>
											<label class="control-label col-sm-2 ">Postpond
												<input type="radio" required class="cbr cbr-blue" name="examstatus" <?=(isset($updateonlineexam[0]->online_exam_status)&&$updateonlineexam[0]->online_exam_status=='Postpond')?"checked":""?> value="Postpond">
											</label>
											<label class="control-label col-sm-2 ">Remove
												<input type="radio" required class="cbr cbr-pink " name="examstatus" <?=(isset($updateonlineexam[0]->online_exam_status)&&$updateonlineexam[0]->online_exam_status=='Remove')?"checked":""?> value="Remove">
											</label>
											<label class="control-label col-sm-2 ">Done
												<input type="radio" required class="cbr cbr-purple " name="examstatus" <?=(isset($updateonlineexam[0]->online_exam_status)&&$updateonlineexam[0]->online_exam_status=='Done')?"checked":""?> value="Done">
											</label>
										</div>
									</div>
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
									<h3 class="panel-title">Online Exam List</h3>
									
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
															<th>Exam Name</th>
															<th>Class</th>
															<th>Subject</th>
															<th>Date Of Exam</th>
															<th>Maximum Marks</th>
															<th>Cutt Off</th>
															<th>Level</th>
															<th>No Of Qustion</th>
															<th>Exam Duration</th>
															<th>Duration/Qustion</th>
															<th>Status</th>
															<th>Created On</th>
															<th><i class="fa fa-edit"></i></th>
															<th><i class="fa fa-times"></th>
															
														</tr>
													</thead>
										
													<tfoot>
														<tr>
															<th>Exam Name</th>
															<th>Class</th>
															<th>Subject</th>
															<th>Date Of Exam</th>
															<th>Maximum Marks</th>
															<th>Cutt Off</th>
															<th>Level</th>
															<th>No Of Qustion</th>
															<th>Exam Duration</th>
															<th>Duration/Qustion</th>
															<th>Status</th>
															<th>Created On</th>
															<th><i class="fa fa-edit"></i></th>
															<th><i class="fa fa-times"></th>
															
														</tr>
													</tfoot>
										
													<tbody>
													<?php foreach($onlineexam as $onlineexam) {?>
														<tr>
															<td><?=$onlineexam->exam_name?></td>
															<td><?=$onlineexam->ClassName?> <?=$onlineexam->SectionName?></td>
															<td><?=$onlineexam->SubjectName?></td>
															<td><?=date("d M Y,h:ia",$onlineexam->online_exam_date)?></td>
															<td><?=$onlineexam->online_max_marks?></td>
															<td><?=$onlineexam->online_cuttoff?></td>
															<td><?=$onlineexam->online_exam_level?></td>
															<td><?=$onlineexam->no_of_qustion?></td>
															<td><?=$onlineexam->online_ex_duration?></td>
															<td><?=$onlineexam->duration_per_qus?></td>
															<td><?=$onlineexam->online_exam_status?></td>
															<td><?=$onlineexam->doc?></td>
															<td><a href="<?=base_url();?>onlineexam/onlineexamcreate/<?=$onlineexam->online_exam_id?>"><i class="fa fa-edit"></a></i></td>
															<td><a onClick="return confirm('Are you sure to delete this ? This will delete all the related records ')" href="<?=base_url();?>onlineexam/delete/online_exam_details/online_exam_id/<?=$onlineexam->online_exam_id?>"  ><i class="fa fa-times"></i></a></td>
															
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

	
	   
	
