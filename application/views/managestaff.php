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
<?php if(isset($staffid)){ ?>
 <div class="row">
  <!--particular  Staff-->
	<div class="col-sm-12">
			<div class="panel  panel-color panel-gray">
						<div class="panel-heading">
							<h3 class="panel-title"><?=$staff_up[0]->StaffName?> Mobile - <?=$staff_up[0]->StaffMobile?></h3>
						</div>
				<div class="panel-body">
					<ul class="nav nav-tabs nav-tabs-justified">
						<li class="active">
							<a href="#home-3" data-toggle="tab">
								<span class="visible-xs"><i class="fa-user"></i></span>
								<span class="hidden-xs">Staff Details</span>
							</a>
						</li>
						<li>
							<a href="#profile-3" data-toggle="tab">
								<span class="visible-xs"><i class="fa-user"></i></span>
								<span class="hidden-xs">Qualification</span>
							</a>
						</li>
						<li>
							<a href="#messages-3" data-toggle="tab">
								<span class="visible-xs"><i class="fa-envelope-o"></i></span>
								<span class="hidden-xs">Salary Setup</span>
							</a>
						</li>
						<li>
							<a href="#settings-3" data-toggle="tab">
								<span class="visible-xs"><i class="fa-cog"></i></span>
								<span class="hidden-xs">Salary Payment</span>
							</a>
						</li>
						<li>
							<a href="#inbox-3" data-toggle="tab">
								<span class="visible-xs"><i class="fa-bell-o"></i></span>
								<span class="hidden-xs">Documents</span>
							</a>
						</li>
					</ul>
					<div class="tab-content panel panel-color panel-gray">
					<form role="form" class="form-horizontal form-inline" action="<?=base_url();?>managestaffs/insert_staff" method="post" enctype="multipart/form-data">
					<?php if(isset($staffid)){ ?>
							<input type="hidden" name="staffid" value="<?=$staffid?>"/>
							<?php } ?>
					<div class="tab-content">
					
						<div class="tab-pane active" id="home-3">
							</br>
						<div class="row">
						
							<div class="col-md-4">
								<div class="form-group">
										<label class="control-label" for="field-1">Name</label>
										<input type="text"  class="form-control" id="field-1" placeholder="Name" name="staff_name" value="<?php echo (isset($staff_up[0]->StaffName) ? $staff_up[0]->StaffName : '');?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
										<label class="control-label" for="field-1">Mobile</label>
										<input type="text"  class="form-control" id="field-1" placeholder="Mobile" name="mobile" value="<?php echo (isset($staff_up[0]->StaffMobile) ? $staff_up[0]->StaffMobile : '');?>">
								</div>
							</div>
								<div class="col-md-4">
								<div class="form-group">
										<label class="control-label" for="field-1">Joining Date</label>
										<input type="text"  class="form-control" id="field-1" placeholder="Joining Date" name="doj" value="<?php if(isset($staff_up[0]->StaffDOJ)){echo date("d-m-Y H:i",$staff_up[0]->StaffDOJ);}?>">
								</div>
							</div>
						</div>	
							</br>
						<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label" for="" >Position</label>
																		<script type="text/javascript">
																						jQuery(document).ready(function($)
																						{
																							$("#s2example-1").select2({
																								placeholder: 'Select....',
																								allowClear: true
																							}).on('select2-open', function()
																							{
																								// Adding Custom Scrollbar
																								$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																							});
																							
																						});
																				</script>
																			<select class="form-control  "  id="s2example-1" name="position">
																					<option></option>
																					<?php $filter=array('MasterEntryName'=>'StaffPosition'); $position= $this->utilities->get_usertype($filter);
																 foreach($position as $position2){?>
															<option  value="<?=$position2->MasterEntryId?>" <?php if(isset($staffid)){  echo (!empty($position2->MasterEntryId==$staff_up[0]->StaffPosition)? "selected" : ''); } ?>  ><?=$position2->MasterEntryValue?> </option>
																 <?php } ?>
																				
																				</select>
																		
										</div>
								</div>	
								<div class="col-md-4">
											<div class="form-group">
										<label class="control-label " for="field-1">Alternate Mobile</label>
										<input type="text"  class="form-control" id="field-1" placeholder="Alternate Mobile"  name="altmobile" value="<?php echo (isset($staff_up[0]->StaffAlternateMobile) ? $staff_up[0]->StaffAlternateMobile : '');?>">
										</div>
								</div>	
								<div class="col-md-4">
									<div class="form-group">
									<label class="col-sm-3 control-label">Date Of Birth</label>
									
									<div class="col-sm-9">
										<div class="input-group">
											<input type="text"  class="form-control datepicker" data-format="D, dd MM yyyy" name="dob" value="<?php if(isset($staff_up[0]->StaffDOB)){echo date("d-m-Y H:i",$staff_up[0]->StaffDOB);}?>">
											
											<div class="input-group-addon">
												<a href="#"><i class="linecons-calendar"></i></a>
											</div>
										</div>
									</div>
								</div>
								</div>
						</div>
						<div class="row">
						<div class="col-md-4">
									<div class="col-md-4">
											<div class="form-group">
										<label class="control-label " for="field-1">Email</label>
										<input type="text"  class="form-control" id="field-1" placeholder="Email"  name="staffemail" value="<?php echo (isset($staff_up[0]->StaffEmail) ? $staff_up[0]->StaffEmail : '');?>">
										</div>
								</div>	
						</div>	
						<div class="col-md-4">
						<div class="form-group">
						
									<label class="control-label col-sm-4" for="field-5">Present Address</label>
									<div class="col-sm-8">
									<textarea class="form-control autogrow" cols="5" id="field-5" placeholder="Present Address" rows="1" name="presentaddress"><?php echo (isset($staff_up[0]->StaffPresentAddress) ? $staff_up[0]->StaffPresentAddress : '');?></textarea>
								</div>	
								</div>
						</div>
							<div class="col-md-4">
						<div class="form-group">
									<label class="control-label col-sm-4" for="field-5">Permanent Address</label>
									<div class="col-sm-8">
									<textarea class="form-control autogrow" cols="5"  id="field-5" placeholder="Permanent Address" rows="1" name="permanentaddress"><?php echo (isset($staff_up[0]->StaffPermanentAddress) ? $staff_up[0]->StaffPermanentAddress : '');?></textarea>
									</div>
								</div>
						</div>
						
						</div>
						<div class="row">
						<div class="col-md-4">
									<div class="form-group">
												<label class=" control-label">Status</label>
										<div class="checkbox">
											<label>
												<input type="checkbox" name="status" <?php if(isset($staffid)){ echo (!empty($staff_up[0]->StaffStatus=="Active") ? "checked" : ''); } ?> value="Active">
											
											</label>
										</div>
									</div>
						</div>	
						<div class="form-group">
									<input type="submit" name="add"  class="btn btn-primary" value="Save"/>
									
								</div></div>
				</div>
						<div class="tab-pane" id="profile-3">
						<?php if(!empty($staff_qualification)){ ?>
							<div class="row">
							<div class="col-sm-12">
							<div class="panel-body">
								
								<div class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">
										<table cellspacing="0" class="table table-small-font table-bordered table-striped" >
											<thead>
												<tr>
													<th> Board/University</th>
													<th>Class</th>
													<th>Year</th>
													<th>Marks</th>
													<th>Remarks</th>
													<td><i class="fa fa-times"></i></td>
												</tr>
											</thead>
										 
											
										 
											<tbody>
												<?php foreach($staff_qualification as $staff_qualification){?>
												<tr>
													<td><?=$staff_qualification->BoardUniversity?> </td>
													<td><?=$staff_qualification->Class?></td>
													<td><?=$staff_qualification->Year?></td>
													<td><?=$staff_qualification->Marks?></td>
													<td><?=$staff_qualification->Remarks?></td>
													<td><a href="<?=base_url();?>managestaffs/managestaff/<?php //=$staff_qualification->QualificationId ?>" ><i class="fa fa-times"></i></a></td>
												</tr>
												<?php  } ?>
											</tbody>
										</table>
									</div>	
								
						</div>
							</div>
							</div>
						<?php }else{ ?>
						<div class="alert alert-danger">No Qualification added!! </div>
						<?php } ?>
							<div class="row">
							
							<div class="col-md-4">
											<div class="form-group">
										<label class="control-label col-sm-4 " for="field-1">Board/University</label>
										<div class="col-sm-8">
										<input type="text" class="form-control"  id="field-1" placeholder="Board/University"  name="boarduniversity" value="">
										</div>
										</div>
								</div>	
								
								<div class="col-md-4">
											<div class="form-group">
										<label class="control-label col-sm-4 " for="field-1">Year</label>
										<div class="col-sm-8">
										<input type="text" class="form-control"  id="field-1" placeholder="Year"  name="year" value="">
										</div>
										</div>
								</div>	
								
								<div class="col-md-4">
											<div class="form-group">
										<label class="control-label col-sm-4 " for="field-1">Remarks</label>
										<div class="col-sm-8">
										<textarea class="form-control"  id="field-1" placeholder="Remarks" rows="1" name="remarks" ></textarea></div>
										</div>
								</div>	
								
							</div>
							
							<div class="row">
							<div class="col-md-4">
											<div class="form-group">
										<label class="control-label col-sm-4 " for="field-1">Class</label>
										<div class="col-sm-8">
										<input type="text" class="form-control"  id="field-1" placeholder="class"  name="class" value=""></div>
										</div>
								</div>	
								
								<div class="col-md-4">
											<div class="form-group">
										<label class="control-label col-sm-4"  for="field-1">Marks</label>
										<div class="col-sm-8">
										<input type="text" class="form-control"  id="field-1" placeholder="Marks"  name="marks" value=""></div>
										</div>
								</div>	
								
								<div class="col-md-4">
											<div class="form-group">
										<input  type="submit"  class="btn btn-primary " formaction="<?=base_url();?>managestaffs/insert_staffqualification" value="Save"/>
										</div>
								</div>	
								
							</div>
							
							
							
								
						</div>
						<div class="tab-pane" id="messages-3">
							
							
							
							<div class="row">
							
							<div class="col-md-4">
											<div class="form-group">
										<label class="control-label col-sm-4 " for="field-1">Salary Template</label>
										<div class="col-sm-8">
										<script type="text/javascript">
																						jQuery(document).ready(function($)
																						{
																							$("#s2example-11").select2({
																								placeholder: 'Select....',
																								allowClear: true
																							}).on('select2-open', function()
																							{
																								// Adding Custom Scrollbar
																								$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																							});
																							
																						});
																				</script>
																			<select  id="s2example-11" name="salarytemplate" onchange="showfixedsalaryhead(this.value)">
																					<option></option>
																					<?php $salastructure= $this->utilities->getsalarystructure();
																					foreach($salastructure as $salastructure1){?>
																					<option  value="<?=$salastructure1->SalaryStructureId?>"  ><?=$salastructure1->SalaryStructureName?> </option>
																 <?php } ?>
																				
																				</select>
										</div>
										</div>
								</div>	
								
								<div class="col-md-4">
											<div class="form-group">
										<label class="control-label col-sm-4 " for="field-1">Paid Leave</label>
										<div class="col-sm-8">
										<input type="number" class="form-control"  id="field-1" placeholder="Paid Leave"  name="paidleave" value="">
										</div>
										</div>
								</div>	
								
								<div class="col-md-4">
											<div class="form-group">
										<label class="control-label col-sm-4 " for="field-1">Date Effective From</label>
										<div class="col-sm-8">
										<div class="input-group">
											<input type="text"  class="form-control datepicker" data-format="D, dd MM yyyy" name="dateofeffective" value="">
											
											<div class="input-group-addon">
												<a href="#"><i class="linecons-calendar"></i></a>
											</div>
										</div>
										</div>
										</div>
								</div>	
								
							</div>
							
							<div class="row">
							<div class="col-md-4" id="showfixedsalaryhead">
											
										
										
										
								</div>	
								
								<div class="col-md-4">
											<div class="form-group">
										<label class="control-label col-sm-4"  for="field-1">Remarks</label>
										<div class="col-sm-8">
										<textarea class="form-control"  id="field-1" placeholder="Remarks" rows="1" name="remarks" ></textarea></div>
										</div>
								</div>	
								
								<div class="col-md-4">
											<div class="form-group">
										<input  type="submit"  class="btn btn-primary " formaction="<?=base_url();?>managestaffs/insert_staffsalaryhead" value="Save"/>
										</div>
								</div>	
								
							</div>
							
							<?php if(!empty($ListSalaryStructure)){ ?>
							<div class="row">
							<div class="col-sm-12">
							<div class="panel-body">
								
								<div class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">
										<table cellspacing="0" class="table table-small-font table-bordered table-striped" >
											<thead>
												<tr>
													<th>Salary Template<</th>
													<th>Fixed Salary</th>
													<th>Paid Leave</th>
													<th>Effective From</th>
													<th>Remarks</th>
													<td><i class="fa fa-times"></i></td>
												</tr>
											</thead>
										 
											
										 
											<tbody>
												<?php echo $ListSalaryStructure; ?>
											</tbody>
										</table>
									</div>	
								
						</div>
							</div>
							</div>
						<?php }else{ ?>
						<div class="alert alert-danger">No salary structure set yet for this staff!!</div>
						<?php } ?>
							
					
						</div>
						
						<div class="tab-pane" id="settings-3">
								
							<div class="row">
							
							<div class="col-md-4">
											<div class="form-group">
										<label class="control-label col-sm-5 form-group" for="field-1">Payment Type</label>
										<div class="col-sm-8">
										<script type="text/javascript">
																						jQuery(document).ready(function($)
																						{
																							$("#s2example-12").select2({
																								placeholder: 'Select....',
																								allowClear: true
																							}).on('select2-open', function()
																							{
																								// Adding Custom Scrollbar
																								$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																							});
																							
																						});
																				</script>
																			<select  class="form-control " id="s2example-12" name="paymenttype" >
																					<option></option>
																					<?php $salastructure= $this->utilities->getsalarystructure();
																					foreach($salastructure as $salastructure1){?>
																					<option  value="<?=$salastructure1->SalaryStructureId?>"  ><?=$salastructure1->SalaryStructureName?> </option>
																 <?php } ?>
																				
																				</select>
										</div>
										</div>
								</div>	
								
								<div class="col-md-4">
											<div class="form-group">
										<label class="control-label col-sm-4 " for="field-1">Amount </label>
										<div class="col-sm-8">
										<input type="number" class="form-control"  id="field-1" placeholder="Amount"  name="amount" value="">
										</div>
										</div>
								</div>	
								
								<div class="col-md-4">
											<div class="form-group">
										<label class="control-label col-sm-4 " for="field-1">Payment Date </label>
										<div class="col-sm-8">
										<div class="input-group">
											<input type="text"  class="form-control datepicker" data-format="D, dd MM yyyy" name="paymentdate" value="">
											
											<div class="input-group-addon">
												<a href="#"><i class="linecons-calendar"></i></a>
											</div>
										</div>
										</div>
										</div>
								</div>	
								
							</div>
							
							<div class="row">
							<div class="col-md-4" >
											
									<div class="form-group">
										<label class="control-label col-sm-5 form-group " for="field-1">Account</label>
										<div class="col-sm-8">
										<script type="text/javascript">
																						jQuery(document).ready(function($)
																						{
																							$("#s2example-13").select2({
																								placeholder: 'Select....',
																								allowClear: true
																							}).on('select2-open', function()
																							{
																								// Adding Custom Scrollbar
																								$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																							});
																							
																						});
																				</script>
																			<select  class="form-control" id="s2example-13" name="account" >
																					<option></option>
																					<?php $salastructure= $this->utilities->getsalarystructure();
																					foreach($salastructure as $salastructure1){?>
																					<option  value="<?=$salastructure1->SalaryStructureId?>"  ><?=$salastructure1->SalaryStructureName?> </option>
																 <?php } ?>
																				
																				</select>
										</div>
										</div>	
										
										
								</div>	
								
								<div class="col-md-4">
											<div class="form-group">
										<label class="control-label col-sm-4"  for="field-1">Remarks</label>
										<div class="col-sm-8">
										<textarea class="form-control"  id="field-1" placeholder="Remarks" rows="1" name="remarks" ></textarea></div>
										</div>
								</div>	
								
								<div class="col-md-4">
											
										
										<div class="form-group">
										<label class="control-label col-sm-4 " for="field-1">Month Year </label>
										<div class="col-sm-8">
										<div class="input-group">
											<input type="text"  class="form-control datepicker" data-format="MM yyyy" name="monthyear" value="">
											
											<div class="input-group-addon">
												<a href="#"><i class="linecons-calendar"></i></a>
											</div>
										</div>
										</div>
										</div>
								</div>	
								
							</div>
							
							<div class="row">
							<div class="form-group">
										<input  type="submit"  class="btn btn-primary " formaction="<?=base_url();?>managestaffs/insert_staffsalaryhead" value="Save"/>
										</div>
							</div>
							
							
							<div class="row">
							<div class="col-sm-12">
							<div class="panel-body">
								
								<div class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">
										<table cellspacing="0" class="table table-small-font table-bordered table-striped" >
											<thead>
												<tr>
													<th>Receipt No</th>
													<th>Amount</th>
													<th>Payment Type</th>
													<th>Month Year</th>
													<th>Date Of Payment</th>
													<th>Paid From</th>
													<th><i class="fa fa-times"></i></th>
													<th><i class="fa fa-times"></i></th>
												</tr>
											</thead>
										 
											
										 <?php if(!empty($ListSalaryStructure)){ ?>
											<tbody>
												<tr>
													<td>1</td>
													<td>5000</td>
													<td>cash</td>
													<td>9-2015</td>
													<td>05-09-2015</td>
													<td>acc-231564879</td>
													<td><i class="fa fa-times"></i></td>
													<td><i class="fa fa-times"></i></td>
												</tr>
											</tbody>
											<?php }else{ ?>
						<div class="alert alert-danger">No salary structure set yet for this staff!!</div>
						<?php } ?>
										</table>
									</div>	
								
						</div>
							</div>
							</div>
						
				
						</div>
						
						<div class="tab-pane" id="inbox-3">
							<div class="row">
						
							
							
							<div class="col-md-4">
						
						
											<div class="form-group">
										<label class="control-label col-sm-4 " for="field-1">Title</label>
										<div class="col-sm-8">
										<input type="text" class="form-control"  id="field-1" placeholder="Title"  name="title" value="">
										</div>
									
										</div>
							
										<div class="form-group">
											<label class="control-label col-sm-4" for="" >Document</label>
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
																			<select  id="s2example-5" name="document">
																					<option></option>
																				<?php $filter=array('MasterEntryName'=>'StaffDocuments'); $doc= $this->utilities->get_usertype($filter);
																 foreach($doc as $doc){?>
															<option  value="<?=$doc->MasterEntryId?>"  ><?=$doc->MasterEntryValue?> </option>
																 <?php } ?>
																				
																				</select>
												</div>						
										</div>
										
										<div class="form-group">
											<label class="control-label col-sm-4" for="" >Resolution</label>
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
																			<select    id="s2example-6" name="resolution">
																					<option></option>
																				<?php $filter=array('MasterEntryName'=>'Resolution'); $resolution= $this->utilities->get_usertype($filter);
																 foreach($resolution as $resolution){?>
															<option  value="<?=$resolution->MasterEntryId?>" ><?=$resolution->MasterEntryValue?> </option>
																 <?php } ?>
																				
																				</select>
												</div>						
										</div>
										
										<div class="form-group">
										<label class="control-label col-sm-4 " for="field-1">Select Image</label>
										<div class="col-sm-4">
										<input type="file"  class="droppable-area" name="image" >
										</div>
									
										</div>
										
										<div class="col-md-4">
											<div class="form-group">
										<input  type="submit"  class="btn btn-primary " formaction="<?=base_url();?>managestaffs/insert_staffdocuments" value="Save"/>
											</div>
										</div>	
										
									</div>	
								
								<div class="col-sm-8">
							<?php foreach($staff_documents as $staff_documents){ ?>
							<div class="col-md-2" style="margin:35px;padding:20px"><image style="width:150px" src="<?=base_url();?>upload/<?=$staff_documents->Path?>"><span><?=$staff_documents->MasterEntryValue?> <?php echo"<br>";?> <?=$staff_documents->Title?></span></div>
							<?php } ?>
							</div>
							</div>							
							
				
						</div>
							
					</div>
			</form>
			</div>
				</div>
		</div>	
		</div>
</div>	
<?php } ?>

	  
 
<div class="row">
  <!--Add Staff-->
	<div class="col-sm-4">
			<div class="panel  panel-color panel-gray">
						<div class="panel-heading">
							<h3 class="panel-title">Add Staff</h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
							</div>
						</div>
				<div class="panel-body">
						 <form role="form" class="form-horizontal" method="post" action="<?=base_url();?>managestaffs/insert_staff">
						 
												<div class="form-group">
													<label class="col-sm-4 control-label" for="" >Position</label>
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
																<select class="form-control" required  id="s2example-2" name="position">
																	<option></option>
																	<?php $filter=array('MasterEntryName'=>'StaffPosition'); $position= $this->utilities->get_usertype($filter); 
																 foreach($position as $position1){?>
															<option  value="<?=$position1->MasterEntryId?>" ><?=$position1->MasterEntryValue?> </option>
																 <?php } ?>
																</select>
															</div>	
												</div>
												<div class="form-group-separator"></div>
													<div class="form-group ">
														<label class=" control-label col-sm-4" for="staff_name"> Staff Name</label>
														<div class="col-sm-8">
															<input type="text" class="form-control" required  name="staff_name" value="" id="student_name" placeholder="Staff Name">
															</div>
													</div>
													<div class="form-group-separator"></div>
													<div class="form-group ">
														<label class=" control-label col-sm-4 " for="mobile">Mobile Number</label>
														<div class="col-sm-8">
															<input type="text" class="form-control" required   name="mobile" value="" id="mobile" placeholder="Mobile Number">
														</div>
													</div>
													<div class="form-group-separator"></div>
														<div class="form-group">
															<label class="col-sm-4 control-label">Date Of Joining</label>
															
															<div class="col-sm-8">
																<div class="input-group">
																	<input type="text"  class="form-control datepicker" required name="doj" data-format="D, dd MM yyyy"  value="">
																	
																	<div class="input-group-addon">
																		<a href="#"><i class="linecons-calendar"></i></a>
																	</div>
																</div>
															</div>
														</div>
													<div class="form-group-separator"></div>
												<div class="form-group pull-right">
														<input  type="submit" name="add" value="Save" class="btn btn btn-info btn-single "/>
												</div>
						</form>
				</div>
			</div>
	</div>
	 <!--Staff List-->
		<div class="col-sm-8">
					<div class="panel  panel-color panel-gray">
						<div class="panel-heading">
							<h3 class="panel-title">Staff List</h3>
							<div class="panel-options">
							<span class="print-icon"><i class="fa fa-print"></i></span>
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
									
								</a>
							</div>
						</div>
						<div class="panel-body">
								
								<div class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">
										<table cellspacing="0" class="table table-small-font table-bordered table-striped" >
											<thead>
												<tr>
													<th> Staff Name</th>
													<th>Mobile</th>
													<th>Designation</th>
													<th>Date of Joining</th>
													
												</tr>
											</thead>
										 
											<tfoot>
												<tr>
													<th> Staff Name</th>
													<th>Mobile</th>
													<th>Designation</th>
													<th>Date of Joining</th>
												</tr>
											</tfoot>
										 
											<tbody>
												<?php foreach($staff as $staff){?>
												<tr>
													<td><a href="<?=base_url();?>managestaffs/managestaff/<?=$staff->StaffId?>" class="visited"><?=$staff->StaffName?></a>  <span class="label label-info"><?=$staff->StaffStatus?></span></td>
													<td><?=$staff->StaffMobile?></td>
													<td><?=$staff->MasterEntryValue?></td>
													<td><?=date("d M Y",$staff->StaffDOJ)?></td>
													
												</tr>
												<?php  } ?>
											</tbody>
										</table>
									</div>	
								
						</div>
					</div>
		</div>
		<!--Staff List-->		
</div>

	  
	
<?php //} ?>