<?php  if($this->session->flashdata('message_type')) { ?>
				<div class="row">
				<div class="alert alert-success">
				<strong><?=$this->session->flashdata('message')?></strong> 
				</div>
				</div>
			<?php }?>
			<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
										<div class="panel-heading">
											Select Class
										</div>
									<div class="panel-body">
											<form role="form" class="form-horizontal" action="<?=base_url();?>master/insert_masterentry" method="post">
											<?php if(empty($id)==''){ ?>
														<input type="hidden" name="id" value="<?=$masterentry_update[0]->MasterEntryId?>">
											<?php } ?>
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Class</label>
																	
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
																		<select class="form-control " id="s2example-1" name="cat_name">
																			<option></option>
																			<optgroup label="Select">
																	<?php foreach($masterentrycat as $mastercat){ ?>
																	<option value="<?=$mastercat->MasterEntryCategoryValue?>" <?php if(empty($id)==''){ echo (!empty($masterentry_update[0]->MasterEntryName==$mastercat->MasterEntryCategoryValue) ? "selected" : ''); } ?>><?=$mastercat->MasterEntryCategoryName?></option>
																			<?php } ?>
																		</optgroup>
																		</select>
																</div>	

																		
																</div>
																
																	<div class="form-group">
																	<?php //if(empty($id)==''){ ?> 
																	<div class="checkbox">
											<label>
												<input type="checkbox" name="status" <?php echo (isset($masterentry_update[0]->MasterEntryStatus) ? "Checked=checked"
												: '');?> value="Active">
												 Show Only Terminated Student
											</label>
											<label>
												<input type="checkbox" name="status" <?php echo (isset($masterentry_update[0]->MasterEntryStatus) ? "Checked=checked"
												: '');?> value="Active">
												 Show Student's & Parent's Login
											</label>
										</div></div>
										
																	<?php // } ?>
									<input type="submit" class="btn btn-info btn-single pull-right" value="Add">
													</form>
											
													<div class="form-group-separator"></div>
									</div>
						</div>
					</div>	
</div>
<!-- add form ended -->
					<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Admission Report Session <?=$this->currentsession[0]->CurrentSession?></h3>
									
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
									
										<table id="example-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
													<thead>
														<tr>
															<th>Adm No</th>
															<th>Student Name</th>
															<th>Father Name</th>
															<th>Class</i></th>
															<th>Mobile</th>
															<th>Date Of Admission</th>
															<th>Address</th>
															<th>Date Of Birth</th>
															
														</tr>
													</thead>
										
													<tfoot>
														<tr>
															<th>Adm No</th>
															<th>Student Name</th>
															<th>Father Name</th>
															<th>Class</i></th>
															<th>Mobile</th>
															<th>Date Of Admission</th>
															<th>Address</th>
															<th>Date Of Birth</th>
														</tr>
													</tfoot>
										
													<tbody>
													<?php //foreach($masterentry as $master){ ?>
														<tr>
															<td>1</td>
															<td>Geeta<span class="label label-secondary"></span></td>
															<td>Rajesh</td>
															<td>2nd Section 1st</td>
															<td>7898564587</td>
															<td>26 june 2015</td>
															<td></td>
															<td>01 june 2015</td>
															
														</tr>
													<?php //} ?>
												</tbody>
										</table>
									
								</div>
							</div>
				  </div>
					
					</div>