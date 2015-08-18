<?php  if($this->session->flashdata('message_type')) { ?>
<div class="row">
<div class="alert alert-success">
<strong><?=$this->session->flashdata('message')?></strong> 
</div>
</div>
<?php }?>
	<div class="row">
	<div class="col-md-6">
					<!--Select fee list starts-->
						<div class="panel panel-color panel-gray">
										<div class="panel-heading">
											Listing All Vehicle Route 
										</div>
								<div class="panel-body">
												<table class="table table-bordered table-striped" id="example-4">
														<thead>
															<tr>
																<th>SNO</th>
																<th>To</th>
																<th>Route Name</th>
																<th>Vehicle</th>
																<th>Stoppage</th>
																<th><i class="fa fa-times"></i></th>
																
															</tr>
														</thead>
													 
														
													 
														<tbody>
														<?php //foreach($regis as $rg){?>
															<tr>
																<td>1</td>
																<td>TO School</td>
																<td><a href="javascript:;" class="visited">Board Office Chouraha</a></td>
																<td>Bus mp 04 ca 5478</td>
																<td>board office</td>
																<td><i class="fa fa-times"></i></td>
															
																
															</tr>
															<?php //} ?>
														</tbody>
												</table>
												</div>
									<div class="panel-heading">
											Add Route
										</div>
										<div class="panel-body">
											<form role="form" class="form-horizontal" action="<?=base_url();?>" method="post">
											
											<div class="form-group">
																			<label class="control-label col-sm-4 ">Route Name</label>
																				<div class="col-sm-8">
																					<input type="text" class="form-control" name="vehicle_no" value="" id="mother_name" placeholder="">
																				</div>	
																		</div>
											
																<div class="form-group">
																	<label class="control-label col-sm-4 ">To </label>
																	
																			<script type="text/javascript">
																				jQuery(document).ready(function($)
																				{
																					$("#s2example-3").select2({
																						placeholder: 'Select To...',
																						allowClear: true
																					}).on('select2-open', function()
																					{
																						// Adding Custom Scrollbar
																						$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																					});
																					
																				});
																			</script>
																				<div class="col-sm-8">
																					<select class="form-control " id="s2example-3" name="class_name">
																						<option></option>
																						<optgroup label="Select">
																				<?php //foreach($class_info as $classinfo){ ?>
																				<option value="<?php //=$classinfo->ClassId?>" <?php// if(empty($id)==''){ echo (!empty($section_update[0]->ClassId==$classinfo->ClassId) ? "selected" : ''); } ?>></option>
																						<?php //} ?>
																					</optgroup>
																					</select>
																			</div>	
																</div>
																
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Vehicle </label>
																	
																			<script type="text/javascript">
																				jQuery(document).ready(function($)
																				{
																					$("#s2example-2").select2({
																						placeholder: 'Select Vehicle...',
																						allowClear: true
																					}).on('select2-open', function()
																					{
																						// Adding Custom Scrollbar
																						$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																					});
																					
																				});
																			</script>
																				<div class="col-sm-8">
																					<select class="form-control " id="s2example-2" name="class_name">
																						<option></option>
																						<optgroup label="Select">
																				<?php //foreach($class_info as $classinfo){ ?>
																				<option value="<?php //=$classinfo->ClassId?>" <?php// if(empty($id)==''){ echo (!empty($section_update[0]->ClassId==$classinfo->ClassId) ? "selected" : ''); } ?>></option>
																						<?php //} ?>
																					</optgroup>
																					</select>
																			</div>	
																</div>
																
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Route </label>
																	
																			<script type="text/javascript">
																				jQuery(document).ready(function($)
																				{
																					$("#s2example-1").select2({
																						placeholder: 'Select Route...',
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
																				<?php //foreach($class_info as $classinfo){ ?>
																				<option value="<?php //=$classinfo->ClassId?>" <?php// if(empty($id)==''){ echo (!empty($section_update[0]->ClassId==$classinfo->ClassId) ? "selected" : ''); } ?>></option>
																						<?php //} ?>
																					</optgroup>
																					</select>
																			</div>	
																</div>
																
																
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Remarks</label>
																	
																			<div class="col-sm-8">
																			<textarea class="form-control"></textarea>
																		</div>	
																</div>
															<div class="form-group pull-right">
																<input type="submit" class="btn btn-info btn-single " value="Add">
															</div>
											</form>
								</div>
						
						</div>
						</div>
						
						<div class="col-md-6">
					<!--Select student starts-->
							<div class="panel panel-color panel-gray">
											<div class="panel-heading">
												Add Student Detail TO Board Office Chouraha
											</div>
										<div class="panel-body">
												<form role="form" class="form-horizontal" action="<?=base_url();?>" method="post">
												
												<div class="form-group">
																		<label class="control-label col-sm-4 ">Stoppage</label>
																		
																			<script type="text/javascript">
																						jQuery(document).ready(function($)
																						{
																							$("#s2example-6").select2({
																								placeholder: 'Select....',
																								allowClear: true
																							}).on('select2-open', function()
																							{
																								// Adding Custom Scrollbar
																								$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																							});
																							
																						});
																				</script>
																			<div class="col-sm-8">
																				<select class="form-control " id="s2example-6" name="for">
																					<option></option>
																				
															<?php //foreach($student_info as $student_info){ ?>
															<option  value="<?php //=$student_info->AdmissionId?>" <?php //if(isset($admission)){ echo (!empty($student_info->AdmissionId==$admission) ? "selected" : ''); } ?>><?php //=$student_info->StudentName?> F/n <?php //=$student_info->FatherName?> </option>
																													<?php // } ?>
																												</optgroup>
																											
																				</select>
																			</div>	
																	</div>
																	
																	
																	
																	<div class="form-group">
																		<label class="control-label col-sm-4 ">Student</label>
																		
																			<script type="text/javascript">
																						jQuery(document).ready(function($)
																						{
																							$("#s2example-5").select2({
																								placeholder: 'Select....',
																								allowClear: true
																							}).on('select2-open', function()
																							{
																								// Adding Custom Scrollbar
																								$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																							});
																							
																						});
																				</script>
																			<div class="col-sm-8">
																				<select class="form-control " id="s2example-5" name="for">
																					<option></option>
																				
															<?php //foreach($student_info as $student_info){ ?>
															<option  value="<?php //=$student_info->AdmissionId?>" <?php //if(isset($admission)){ echo (!empty($student_info->AdmissionId==$admission) ? "selected" : ''); } ?>><?php //=$student_info->StudentName?> F/n <?php //=$student_info->FatherName?> </option>
																													<?php // } ?>
																												</optgroup>
																											
																				</select>
																			</div>	
																	</div>
																	
																<div class="form-group pull-right" >
																	<input type="submit" class="btn btn-info btn-single " value="Add">
																	</div>
														</form>
												
										</div>
							</div>
							
					<div class="panel panel-color panel-gray">
								<div class="panel-heading">
									<h3 class="panel-title">Listing Board Office Chouraha Students</h3>
									<div class="panel-options">
										<a href="#" data-toggle="panel">
											<span class="collapse-icon">&ndash;</span>
											<span class="expand-icon">+</span>
										</a>
										
									</div>
								</div>
						<div class="panel-body">
								
								<table class="table table-bordered table-striped" id="example-4">
									<thead>
										<tr>
											<th>SNo</th>
											<th>Stoppage Name</th>
											<th>Student</th>
											<th>Last Updated</th>
											<th><i class="fa fa-print"></i></th>
											
										</tr>
									</thead>
								 
									
								 
									<tbody>
									<?php //foreach($get_transaction as $get_transaction){?>
										<tr>
											<td>1<?php //=$get_transaction->TransactionId?></td>
											<td>Chetak Bridge</td>
											<td>Ankit</td>
											<td>27 june 2015 4:00 Pm</td>
											<td><i class="fa fa-print"></i></td>
										</tr>
										<?php  //} ?>
									</tbody>
								</table>
						</div>
					</div>
					<!--Select fee list paid student end-->
			</div>
							
					
						
	</div>