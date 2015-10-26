<?php  if($this->session->flashdata('message_type')) { ?>
				<div class="row">
				<div class="alert alert-success">
				<strong><?=$this->session->flashdata('message')?></strong> 
				</div>
				</div>
			<?php }?>
			<div class="row">
					<div class="col-md-12">
						<div class="panel panel-color panel-gray">
										<div class="panel-heading">
											Select Class
										</div>
									<div class="panel-body">
											<form role="form" class="form-horizontal" action="<?=base_url();?>admission/admissionreport" method="post">
											<?php if(empty($id)==''){ ?>
														<input type="hidden" name="id" value="<?=$masterentry_update[0]->MasterEntryId?>">
											<?php } ?>
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Class</label>
																	
																			<script type="text/javascript">
																				jQuery(document).ready(function($)
																				{
																					$("#s2example-1").select2({
																						placeholder: 'Select your Class...',
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
																			<optgroup label="Select">
																	<?php foreach($class_info as $cls){ ?>
																	<option  value="<?=$cls->SectionId?>" <?php if(isset($section)){ echo (!empty($cls->SectionId==$section) ? "selected" : ''); } ?> ><?=$cls->ClassName?> <?=$cls->SectionName?></option>
																			<?php  } ?>
																		</optgroup>
																		</select>
																</div>	

																		
																</div>
																
																	<div class="form-group">
																
																	<div class="checkbox">
											<label>
												<input type="checkbox" name="terminate" <?php echo (isset($terminate) ? "Checked=checked"
												: '');?> value="terminate">
												 Show Only Terminated Student
											</label>
											<label>
												<input type="checkbox" name="login" <?php echo (isset($login) ? "Checked=checked"
												: '');?> value="login">
												 Show Student's & Parent's Login
											</label>
										</div></div>
										
																
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
						<div class="panel panel-color panel-gray">
								<div class="panel-heading">
									<h3 class="panel-title">Admission Report Session <?=!empty($this->currentsession[0]->CurrentSession)?$this->currentsession[0]->CurrentSession:''?></h3>
									
									<div class="panel-options">
										<a href="#" data-toggle="panel">
										<a href="<?=base_url();?>master/prints/admission<?php if(!empty($login)){ echo"/";echo"login";}if(!empty($terminate)){echo"/";echo"terminate";}?><?php if(!empty($section)){echo"/";echo$section;}?>" target="_blank"><i class="fa fa-print"></i></a>
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
															<?php if(isset($login)!=''){ ?>
															<th>Parents Username</th>
															<th>Parents Password</th>
															<th>Students Username</th>
															<th>Students Password</th>
															<?php }else{?>
															<th>Father Name</th>
															<th>Class</i></th>
															<th>Mobile</th>
															<th>Date Of Admission</th>
															<th>Address</th>
															<th>Date Of Birth</th>
															<?php } ?>
														</tr>
													</thead>
										
													
										
													<tbody>
													<?php foreach($student_info as $student_info){ ?>
														<tr>
															<td><?=$student_info->AdmissionNo?></td>
															<td><?=$student_info->StudentName?><span class="label label-secondary"></span></td>
															<?php if(isset($login)!=''){ ?>
															<td><?=$student_info->AdmissionNo?>@parents</td>
															<td><?=$student_info->ParentsPassword?></td>
															<td><?=$student_info->AdmissionNo?>@student</td>
															<td><?=$student_info->StudentsPassword?></td>
															<?php }else{?>
															<td><?=$student_info->FatherName?></td>
															<td><?=$student_info->ClassName?> <?=$student_info->SectionName?></td>
															<td><?=$student_info->Mobile?></td>
															<td><?=date("d M Y",$student_info->Date)?></td>
															<td><?=$student_info->PresentAddress?></td>
															<td><?php if($student_info->DOB!=''){ echo date("d M Y",$student_info->DOB) ; }?></td>
														<?php } ?>
														</tr>
													<?php } ?>
												</tbody>
										</table>
									
								</div>
							</div>
				  </div>
					
					</div>