<?php  if($this->session->flashdata('message_type')) { ?>
<div class="row">
<div class="alert alert-success">
<strong><?=$this->session->flashdata('message')?></strong> 
</div>
</div>
<?php }?>
			<div class="row">
					<div class="col-md-6">
						<div class="panel panel-default">
										<div class="panel-heading">
											Select Student
										</div>
									<div class="panel-body">
											<form role="form" class="form-horizontal" action="<?=base_url();?>master/insert_class/class" method="post">
											<?php if(empty($id)==''){ ?>
														<input type="hidden" name="id" value="<?php echo (isset($class_update[0]->ClassId) ? $class_update[0]->ClassId : '');?>">
											<?php } ?>
											<input type="hidden" name="session" value="2015-2016">
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Student</label>
																	
																			<div class="col-sm-8">
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
										<select class="form-control " id="s2example-1" name="class">
											<option></option>
										
																	<?php foreach($class_section as $cls){ ?>
																	<option  value="<?=$cls->SectionId?>" ><?=$cls->ClassName?> <?=$cls->SectionName?></option>
																			<?php  } ?>
																		</optgroup>
																	
										</select>
									</div>	
																		</div>	

																		
																</div>
																
																
																
										<input type="submit" class="btn btn-info btn-single " value="Proceed">
													</form>
											
													<div class="form-group-separator"></div>
									</div>
						</div>
						</div>
						<div class="col-md-6">
						<div class="panel panel-default">
										<div class="panel-heading">
											Fee List To Be Paid By Student
										</div>
									<div class="panel-body">
									<div class="panel-body">
						<!-- <script type="text/javascript">
					jQuery(document).ready(function($)
					{
						$("#example-4").dataTable({
							
						});
					});
					</script>-->
					
					<table class="table table-bordered table-striped" id="example-4">
						<thead>
							<tr>
								<th>Fee Type</th>
								<th>Amount</th>
								<td><i class="el-cancel-circled"></i></td>
								
							</tr>
						</thead>
					 
						
					 
						<tbody>
						<?php //foreach($regis as $rg){?>
							<tr>
								<td></td>
								<td></td>
								<td><i class="el-cancel-circled"></i></td>
							
								
							</tr>
							<?php // } ?>
						</tbody>
					</table>
						</div>
											<form role="form" class="form-horizontal" action="<?=base_url();?>master/insert_class/section" method="post">
											<?php if(empty($id)==''){ ?>
														<input type="hidden" name="id" value="<?php echo (isset($section_update[0]->SectionId) ? $section_update[0]->SectionId : '');?>">
											<?php } ?>
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Amount </label>
																	
																			<script type="text/javascript">
																				jQuery(document).ready(function($)
																				{
																					$("#s2example-1").select2({
																						placeholder: 'Select your country...',
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
																	<?php foreach($class_info as $classinfo){ ?>
																	<option value="<?=$classinfo->ClassId?>" <?php if(empty($id)==''){ echo (!empty($section_update[0]->ClassId==$classinfo->ClassId) ? "selected" : ''); } ?>><?=$classinfo->ClassName?></option>
																			<?php } ?>
																		</optgroup>
																		</select>
																</div>	
		</div>
			<div class="form-group">
																	<label class="control-label col-sm-4 ">Date Of Payment</label>
																	
																			<div class="col-sm-8">
													<div class="date-and-time">
											<input type="text" class="form-control datepicker" data-format="D, dd MM yyyy">
											<input type="text" class="form-control timepicker" data-template="dropdown" data-show-seconds="true" data-default-time="11:25 AM" data-show-meridian="true" data-minute-step="5" data-second-step="5" />
										</div>
																		</div>	

																		
																</div>
																
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Remarks</label>
																	
																			<div class="col-sm-8">
																			<textarea class="form-control"></textarea>
																		</div>	

																		
																</div>
																
																
												
									<input type="submit" class="btn btn-info btn-single " value="Pay">
													</form>
											
													<div class="form-group-separator"></div>
									</div>
						</div>
						
					</div>
			</div>
<div class="row">
  	<div class="col-md-6">
		<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Select Fee For Students</h3>
					<div class="panel-body">
											<form role="form" class="form-horizontal" action="<?=base_url();?>master/insert_class/class" method="post">
											<?php if(empty($id)==''){ ?>
														<input type="hidden" name="id" value="<?php echo (isset($class_update[0]->ClassId) ? $class_update[0]->ClassId : '');?>">
											<?php } ?>
											<div class="form-group">
																	<label class="control-label col-sm-4 ">Slect Fee</label>
																	
																			<div class="col-sm-8">
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
										<select class="form-control " id="s2example-1" name="class">
											<option></option>
										
																	<?php foreach($class_section as $cls){ ?>
																	<option  value="<?=$cls->SectionId?>" ><?=$cls->ClassName?> <?=$cls->SectionName?></option>
																			<?php  } ?>
																		</optgroup>
																	
										</select>
									</div>	
																		</div>	

																		
																</div>
																
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Amount</label>
																	
																			<div class="col-sm-8">
																	<input type="text" class="form-control" name="mother_name" value="" id="mother_name" placeholder="">
																		</div>	

																		
																</div>
																
										<input type="submit" class="btn btn-info btn-single " value="Add In Fee List">
													</form>
											<div class="panel-body">
						<!-- <script type="text/javascript">
					jQuery(document).ready(function($)
					{
						$("#example-4").dataTable({
							
						});
					});
					</script>-->
					
					<table class="table table-bordered table-striped" id="example-4">
						<thead>
							<tr>
								<th>Fee Type</th>
								<th>Amount</th>
								<th>Paid</th>
								<th>Balance</th>
								
							</tr>
						</thead>
					 
						
					 
						<tbody>
						<?php //foreach($regis as $rg){?>
							<tr>
								<td>admission fee</td>
								<td>1000 INR</td>
								<td>0 INR</td>
								<td>1000 INR</td>
								
							</tr>
							<?php // } ?>
						</tbody>
					</table>
						</div>
													<div class="form-group-separator"></div>
									</div>
					
				</div>
				
			</div>
			
  </div>
 <div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Fee List Paid By Student</h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
								
							</div>
						</div>
						<div class="panel-body">
						<!-- <script type="text/javascript">
					jQuery(document).ready(function($)
					{
						$("#example-4").dataTable({
							
						});
					});
					</script>-->
					
					<table class="table table-bordered table-striped" id="example-4">
						<thead>
							<tr>
								<th>Receipt No</th>
								<th>Amount</th>
								<th>Date</th>
								<th>Remarks</th>
								<td><i class="el-cancel-circled"></i></td>
								<td><i class="el-doc"></i></td>
								
							</tr>
						</thead>
					 
						
					 
						<tbody>
						<?php //foreach($regis as $rg){?>
							<tr>
								<td>1</td>
								<td>1000 INR</td>
								<td>0 INR</td>
								<td>1000 INR</td>
								<td><i class="el-cancel-circled"></i></td>
								<td><i class="el-doc"></i></td>
							</tr>
							<?php // } ?>
						</tbody>
					</table>
						</div>
					</div>
				</div>
  
</div>
