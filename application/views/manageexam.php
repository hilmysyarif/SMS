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
														<input type="hidden" name="examtypeup" value="<?php echo (isset($exam_update[0]->Exam_Type) ? $exam_update[0]->Exam_Type : '');?>">
											<?php } ?>
																<div class="form-group">
																		<label class="col-sm-4 control-label" for="field-1">Exam Type</label>
																		<div class="col-sm-8">
																			<input type="text" required class="form-control" id="field-1" placeholder="Exam Type" name="examtype" value="<?php echo (isset($exam_update[0]->Exam_Type) ? $exam_update[0]->Exam_Type : '');?>">
																		</div>
																			
																	</div>
																
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Exam Duration</label>
																	
																			<div class="col-sm-8">
																				<div class="input-group input-group-minimal">
											<input type="text" required name="duration" class="form-control timepicker" data-template="dropdown"   data-minute-step="5" 
											value="<?php echo (isset($exam_update[0]->Duration) ? $exam_update[0]->Duration : '');?>"/>
											
											<div class="input-group-addon">
												<a href="#"><i class="linecons-clock"></i></a>
											</div>
																		</div>

																		
																</div>
																</div>
																
																	
																	
																	<div class="form-group">
																	<label class="control-label col-sm-4 ">Remarks</label>
																	
																			<div class="col-sm-8">
																			<textarea required class="form-control" id="field-1" placeholder="Remarks" name="remarks" ><?php echo (isset($exam_update[0]->Remarks) ? $exam_update[0]->Remarks : '');?></textarea>
																		</div>

																		
																</div>
																
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Exam Status</label>
																	<div class="col-sm-8">
										<div class="form-block">
										<label class="control-label col-sm-6 ">Active	
										<input type="radio" class="cbr cbr-secondary" required name="examstatus" <?=(isset($exam_update[0]->Exam_Status)&&$exam_update[0]->Exam_Status=='Active')?"checked":""?> value="Active"></label>
										<label class="control-label col-sm-6 ">Inactive
										<input type="radio" required class="cbr cbr-red" name="examstatus" <?=(isset($exam_update[0]->Exam_Status)&&$exam_update[0]->Exam_Status=='Inactive')?"checked":""?> value="Inactive">
										</label>	
										</div>
									</div>
																			

																		
																</div>
																	
																
									<input type="submit" class="btn btn-info btn-single " value="Add"/>
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
											<th>Exam Type</th>
											<th>Exam Duration</th>
											<th>Remarks</th>
											<th>Date Of Create</th>
											<th><a href="#"><i class="fa fa-edit"></i></a></th>
											<th><a href="#"><i class="fa fa-times"></i></a></th>
											
										</tr>
									</thead>
						
									<tfoot>
										<tr>
											<th>Exam Type</th>
											<th>Exam Duration</th>
											<th>Remarks</th>
											<th>Date Of Create</th>
											<th><a href="#"><i class="fa fa-edit"></i></a></th>
											<th><a href="#"><i class="fa fa-times"></i></a></th>
											
										</tr>
									</tfoot>
						
									<tbody>
									<?php foreach($exam_info as $examinfo){ ?>
										<tr>
											
											<td><?=$examinfo->Exam_Type?></br><span <?php if($examinfo->Exam_Status=='Active'){ ?> class="label label-success" <?php }else{ ?>class="label label-danger"<?php } ?>><?=$examinfo->Exam_Status?></span></td>
											<td><?=$examinfo->Duration?></td>
											<td><?=$examinfo->Remarks?></td>
											<td><?=$examinfo->DOC?></td>
											<td><a href="<?=base_url();?>master/manageexam/<?=$examinfo->Exam_Type?>"><i class="fa fa-edit"></a></i></td>
											<td><a onClick="return confirm('Are you sure to delete this ? This will delete all the related records ')" href="<?=base_url();?>master/delete/examtype/Exam_Type/<?=$examinfo->Exam_Type?>"><i class="fa fa-times"></a></i></td>
										</tr>
									<?php } ?>
								</tbody>
						</table>
					
				</div>
			</div>
  </div>
</div>