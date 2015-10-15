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