<div class="row">
		
		 <?php if(!$RegistrationId == ''){?> 
				<div class="col-md-12 panel panel-color panel-gray">
				<ul class="nav nav-tabs nav-tabs-justified ">
						<li class="active">
							<a href="#home-3" data-toggle="tab">
								<span class="visible-xs"><i class="fa-home"></i></span>
								<span class="hidden-xs">Student Detail</span>
							</a>
						</li>
						<li>
							<a href="#profile-3" data-toggle="tab">
								<span class="visible-xs"><i class="fa-user"></i></span>
								<span class="hidden-xs">Contact Detail</span>
							</a>
						</li>
						<li>
							<a href="#messages-3" data-toggle="tab">
								<span class="visible-xs"><i class="fa-envelope-o"></i></span>
								<span class="hidden-xs">Parent Detail</span>
							</a>
						</li>
						<li>
							<a href="#settings-3" data-toggle="tab">
								<span class="visible-xs"><i class="fa-cog"></i></span>
								<span class="hidden-xs">Qualification</span>
							</a>
						</li>
						<li>
							<a href="#inbox-3" data-toggle="tab">
								<span class="visible-xs"><i class="fa-bell-o"></i></span>
								<span class="hidden-xs">Sibling Information</span>
							</a>
						</li>
						<li>
							<a href="#inbox-4" data-toggle="tab">
								<span class="visible-xs"><i class="fa-bell-o"></i></span>
								<span class="hidden-xs">Photo</span>
							</a>
						</li>
						<li>
							<a href="#inbox-5" data-toggle="tab">
								<span class="visible-xs"><i class="fa-bell-o"></i></span>
								<span class="hidden-xs">Termination</span>
							</a>
						</li>
					</ul>
					
					<div class="tab-content panel panel-color panel-gray">
						<div class="tab-pane active" id="home-3">
							
							<div>
								
								<div class="row">
				<!--student registration form-->
				<div class="col-md-12">
					<div class="panel panel-default">
						
						<div class="panel-body">
						
						
						 <form role="form" class=""  method="post" action="<?=base_url()?>admission/update_registration/<?=$RegistrationId?>">
								<div class="form-group-separator">
								</div>
								<div class="row">
								<div class="col-md-4">
								<div class="form-group ">
									<label class=" control-label" for="student_name">Name</label>
								
										<input type="text" class="form-control" name="student_name" value="<?=isset($StudentName)?$StudentName:''?>" id="student_name" placeholder="Student Name">
									
								</div>
							</div>
							<div class="col-md-4">
							<div class="form-group">
									<label class="control-label" for="DOR">Registration Date</label>
									
										
										<div class="date-and-time">
											<input type="text" name="DOR" value="<?=isset($DOR)?$DOR:''?>" class="form-control datepicker" data-format="D, dd MM yyyy">
											<input type="text" name="DOR" value="<?=isset($DOR)?$DOR:''?>" class="form-control timepicker" data-template="dropdown" data-show-seconds="true"  data-show-meridian="true" data-minute-step="5" data-second-step="5" />
										</div>
									</div>
								
							</div>
							<div class="col-md-4">
							<div class="form-group">
									<label class="control-label col-md-4">Caste</label>
									
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
									
										<select class="form-control " id="s2example-1" name="Caste">
											<option></option>
										
											<?php foreach ($caste as $cas){ //print_r($key);die;?>
										<?php if($cas->MasterEntryName=='Caste') { ?>
										
										<option   value="<?=$cas->MasterEntryId?>"  <?=($Caste==$cas->MasterEntryId)?'selected':''?>><?=$cas->MasterEntryValue?></option>
										<?php } ?><?php } ?>
										
										</select>
									
										
								</div>
								
								</div>
								</div>
							<div class="form-group-separator">
								</div>
								
							<div class="row">
							 <div class="col-md-4">
							 <div class="form-group">
									<label class="control-label">Class</label>
										<script type="text/javascript">
										jQuery(document).ready(function($)
										{
											$("#s3example-1").select2({
												placeholder: 'Select ...',
												allowClear: true
											}).on('select2-open', function()
											{
												// Adding Custom Scrollbar
												$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
											});
											
										});
									</script>
								
									<select class="form-control " id="s3example-1" name="class">
										<option></option>
									
										<?php foreach($class_section as $cls){ ?>
																	<option  value="<?=$cls->SectionId?>" <?=($SectionId==$cls->SectionId)?'selected':''?>><?=$cls->ClassName?> <?=$cls->SectionName?></option>
																			<?php  } ?>
										
									</select>
									
										
								</div>
							 
								
								</div>
							<div class="col-md-4">
							 <div class="form-group">
									<label class="control-label">Gender</label>
										<script type="text/javascript">
										jQuery(document).ready(function($)
										{
											$("#s3example-1").select2({
												placeholder: 'Select ...',
												allowClear: true
											}).on('select2-open', function()
											{
												// Adding Custom Scrollbar
												$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
											});
											
										});
									</script>
								
									<select class="form-control " id="s3example-1" name="gender">
										<option></option>
									
										<?php foreach ($gender as $gen){?>
										<?php if($gen->MasterEntryName=='Gender') { ?>
										
										<option   value="<?=$gen->MasterEntryId?>" <?=($Gender==$gen->MasterEntryId)?'selected':''?>><?=$gen->MasterEntryValue?></option>
										<?php } ?><?php }?>
									</select>
									
										
								</div>
								
								</div>
								<div class="col-md-4">
								
								<div class="form-group">
									<label class="control-label">Category</label>
										<script type="text/javascript">
										jQuery(document).ready(function($)
										{
											$("#s3example-1").select2({
												placeholder: 'Select ...',
												allowClear: true
											}).on('select2-open', function()
											{
												// Adding Custom Scrollbar
												$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
											});
											
										});
									</script>
								
									<select class="form-control " id="s3example-1" name="Category">
										<option></option>
		<?php foreach ($category as $cat){ //print_r($key);die;?>
										
								<?php if($cat->MasterEntryName=='Category') { ?>		
										<option   value="<?=$cat->MasterEntryId?>"  <?=($Category==$cat->MasterEntryId)?'selected':''?>><?=$cat->MasterEntryValue?></option>
										<?php } ?><?php } ?>
																		
										
																			
								</select>
									
										
								</div>
								
								
								</div> 
								</div> 		
								<div class="form-group-separator">
								</div>
							<div class="row">
							
									<div class="col-md-4">
								<div class="form-group ">
									<label class=" control-label" for="father_name">Father Name</label>
								
										<input type="text" class="form-control" name="father_name" value="<?=isset($FatherName)?$FatherName:''?>" id="father_name" placeholder="Father's Name">
							
								</div>
								</div>
								<div class="col-md-4">
								<div class="form-group">
									<label class="control-label" name="DOB">Birth Date</label>
									
										
										<div class="date-and-time">
											<input type="text" name="DOB" value="<?=isset($DOB)?$DOB:''?>" class="form-control datepicker" data-format="D, dd MM yyyy">
											<input type="text" name="DOB" value="<?=isset($DOB)?$DOB:''?>"  class="form-control timepicker" data-template="dropdown" data-show-seconds="true"  data-show-meridian="true" data-minute-step="5" data-second-step="5" />
										</div>
									</div>
								</div>
								<div class="col-md-4">
								
								<div class="form-group">
									<label class="control-label">Blood Group</label>
										<script type="text/javascript">
										jQuery(document).ready(function($)
										{
											$("#s3example-1").select2({
												placeholder: 'Select ...',
												allowClear: true
											}).on('select2-open', function()
											{
												// Adding Custom Scrollbar
												$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
											});
											
										});
									</script>
								
									<select class="form-control " id="s3example-1" name="BloodGroup">
										<option></option>
									
										
		<?php foreach ($blood_grp as $bld){ //print_r($key);die;?>
									<?php if($bld->MasterEntryName=='BloodGroup') { ?><option   value="<?=$bld->MasterEntryId?>"  <?=($BloodGroup==$bld->MasterEntryId)?'selected':''?>><?=$bld->MasterEntryValue?></option>
										<?php } ?><?php } ?>
									</select>
									
										
								</div>
								</div> 
								
								
							</div>	
							<div class="form-group-separator">
								</div>
							<div class="row">
							<div class="col-md-4">
								<div class="form-group ">
									<label class=" control-label" for="mother_name">Mother Name</label>
								
										<input type="text" class="form-control" name="mother_name" value="<?=isset($MotherName)?$MotherName:''?>" id="mother_name" placeholder="Father's Name">
							
								</div>
								</div>
							</div>
							<div class="form-group-separator">
								</div>
								<div class="row">
								<div class="form-group">
		<input  type="submit" name="submit" value="submit" class="btn btn btn-info btn-single pull-right"/>   
								
								</div>	
								</div>
								
						</form>
						</div>
					</div>
				</div>
							</div>
							</div>
							
						</div>
						<div class="tab-pane" id="profile-3">
							
							<div class="row">
				<!--student registration form-->
				<div class="col-md-12">
					<div class="panel panel-default">
						
						<div class="panel-body">
						 <form role="form" class=""  method="post" action="<?=base_url()?>admission/update_registration/<?=$RegistrationId?>">
													   
								<div class="form-group-separator">
								</div>
								<div class="row">
								<div class="col-md-4">
								<div class="form-group ">
									<label class=" control-label" for="mobile">Mobile</label>
								
										<input type="text" class="form-control" name="mobile" id="mobile" value="<?=isset($Mobile)?$Mobile:''?>"  placeholder="Mobile No">
									
								</div>
							</div>
							<div class="col-md-4">
						<div class="form-group ">
									<label class=" control-label" for="father_mobile">Father Mobile</label>
								
										<input type="text" class="form-control" name="father_mobile" value="<?=isset($FatherMobile)?$FatherMobile:''?>" id="father_mobile" placeholder="">
									
								</div>
								
							</div>
							<div class="col-md-4">
							<div class="form-group ">
									<label class=" control-label" for="present_address">Present Address</label>
								
										<input type="text" class="form-control" name="present_address" value="<?=isset($PresentAddress)?$PresentAddress:''?>" id="present_address" placeholder="">
									
								</div>
								
								</div>
								</div>
							<div class="form-group-separator">
								</div>
								
							<div class="row">
							 <div class="col-md-4">
							<div class="form-group ">
									<label class=" control-label" for="landline">Landline</label>
								
										<input type="text" class="form-control" name="landline" value="<?=isset($Landline)?$Landline:''?>" id="landline" placeholder="">
									
								</div>
							 
								
								</div>
							<div class="col-md-4">
							 <div class="form-group ">
									<label class=" control-label" for="mother_mobile">Mother Mobile</label>
								
										<input type="text" class="form-control" name="mother_mobile" value="<?=isset($MotherMobile)?$MotherMobile:''?>" id="mother_mobile" placeholder="">
									
								</div>
								
								</div>
								<div class="col-md-4">
								
								<div class="form-group ">
									<label class=" control-label" for="permanent_address">Permanent Address</label>
								
										<input type="text" class="form-control" name="permanent_address" value="<?=isset($PermanentAddress)?$PermanentAddress:''?>" id="permanent_address" placeholder="">
									
								</div>
								
								
								</div> 
								</div> 		
								<div class="form-group-separator">
								</div>
							<div class="row">
							
									<div class="col-md-4">
								<div class="form-group ">
									<label class=" control-label" for="alternate_mobile">Alternate Mobile</label>
								
										<input type="text" class="form-control" name="alternate_mobile" value="<?=isset($AlternateMobile)?$AlternateMobile:''?>" id="alternate_mobile" placeholder="">
							
								</div>
								</div>
								
								
								
								
							</div>	
							
							<div class="form-group-separator">
								</div>
								<div class="row">
								<div class="form-group">
		<input  type="submit" name="submit1" value="submit" class="btn btn btn-info btn-single pull-right"/>   
								</div>	
								</div>
						</form>
						</div>
					</div>
				</div></div>
						</div>
						<div class="tab-pane" id="messages-3">
							
							<div class="row">
				<!--student registration form-->
				<div class="col-md-12">
					<div class="panel panel-default">
						
						<div class="panel-body">
						 <form role="form" class="" method="post" action="<?=base_url()?>admission/update_registration/<?=$RegistrationId?>">
							   
								<div class="form-group-separator">
								</div>
								<div class="row">
								<div class="col-md-4">
								<div class="form-group">
									<label class="control-label" for="FatherDateOfBirth">Father Date Of Birth</label>
									
										
										<div class="date-and-time">
											<input type="text" name="FatherDateOfBirth" value="<?=isset($FatherDateOfBirth)?$FatherDateOfBirth:''?>" class="form-control datepicker" data-format="D, dd MM yyyy">
											<input type="text" name="FatherDateOfBirth" value="<?=isset($FatherDateOfBirth)?$FatherDateOfBirth:''?>" class="form-control timepicker" data-template="dropdown" data-show-seconds="true"  data-show-meridian="true" data-minute-step="5" data-second-step="5" />
										</div>
									</div>
							</div>
							<div class="col-md-4">
						<div class="form-group">
									<label class="control-label" for="MotherDateOfBirth">Mother Date Of Birth</label>
									
										
										<div class="date-and-time">
											<input type="text" name="MotherDateOfBirth" class="form-control datepicker" value="<?=isset($MotherDateOfBirth)?$MotherDateOfBirth:''?>" data-format="D, dd MM yyyy">
											<input type="text" name="MotherDateOfBirth" class="form-control timepicker" value="<?=isset($MotherDateOfBirth)?$MotherDateOfBirth:''?>" data-template="dropdown" data-show-seconds="true"  data-show-meridian="true" data-minute-step="5" data-second-step="5" />
										</div>
									</div>
								
							</div>
							<div class="col-md-4">
							<div class="form-group ">
									<label class=" control-label" for="FatherDesignation">Father Designation</label>
								
										<input type="text" class="form-control" name="FatherDesignation" value="<?=isset($FatherDesignation)?$FatherDesignation:''?>" id="FatherDesignation" placeholder="">
									
								</div>
								
								</div>
								</div>
							<div class="form-group-separator">
								</div>
								
							<div class="row">
							 <div class="col-md-4">
							<div class="form-group ">
									<label class=" control-label" for="FatherEmail">Father Email</label>
								
										<input type="text" class="form-control" name="FatherEmail" value="<?=isset($FatherEmail)?$FatherEmail:''?>" id="FatherEmail" placeholder="">
									
								</div>
							 
								
								</div>
							<div class="col-md-4">
							 <div class="form-group ">
									<label class=" control-label" for="MotherEmail">Mother Email</label>
								
										<input type="text" class="form-control" name="MotherEmail" value="<?=isset($MotherEmail)?$MotherEmail:''?>" id="MotherEmail" placeholder="">
									
								</div>
								
								</div>
								<div class="col-md-4">
								
								<div class="form-group ">
									<label class=" control-label" for="FatherOrganization">Father Organization</label>
								
										<input type="text" class="form-control" name="FatherOrganization" value="<?=isset($FatherOrganization)?$FatherOrganization:''?>" id="FatherOrganization" placeholder="">
									
								</div>
								
								
								</div> 
								</div> 		
								<div class="form-group-separator">
								</div>
							<div class="row">
							
									<div class="col-md-4">
								<div class="form-group ">
									<label class=" control-label" for="FatherQualification">Father Qualification</label>
								
										<input type="text" class="form-control" name="FatherQualification" value="<?=isset($FatherQualification)?$FatherQualification:''?>" id="FatherQualification" placeholder="">
							
								</div>
								</div>
								
								<div class="col-md-4">
								<div class="form-group ">
									<label class=" control-label" for="MotherQualification">Mother Qualification</label>
								
										<input type="text" class="form-control" name="MotherQualification" value="<?=isset($MotherQualification)?$MotherQualification:''?>" id="MotherQualification" placeholder="">
							
								</div>
								</div>
								
								<div class="col-md-4">
								<div class="form-group ">
									<label class=" control-label" for="MotherDesignation">Mother Designation</label>
								
										<input type="text" class="form-control" name="MotherDesignation" value="<?=isset($MotherDesignation)?$MotherDesignation:''?>" id="MotherDesignation" placeholder="">
							
								</div>
								</div>
								
								
							</div>	
							
							<div class="form-group-separator">
								</div>
								
								<div class="row">
							
									<div class="col-md-4">
								<div class="form-group ">
									<label class=" control-label" for="FatherOccupation">Father Occupation</label>
								
										<input type="text" class="form-control" name="FatherOccupation" value="<?=isset($FatherOccupation)?$FatherOccupation:''?>" id="FatherOccupation" placeholder="">
							
								</div>
								</div>
								
								<div class="col-md-4">
								<div class="form-group ">
									<label class=" control-label" for="MotherOccupation">Mother Occupation</label>
								
										<input type="text" class="form-control" name="MotherOccupation" value="<?=isset($MotherOccupation)?$MotherOccupation:''?>" id="MotherOccupation" placeholder="">
							
								</div>
								</div>
								
								<div class="col-md-4">
								<div class="form-group ">
									<label class=" control-label" for="MotherOrganization">Mother Organization</label>
								
										<input type="text" class="form-control" name="MotherOrganization" value="<?=isset($MotherOrganization)?$MotherOrganization:''?>" id="MotherOrganization" placeholder="">
							
								</div>
								</div>
								
								
							</div>	
							
							<div class="form-group-separator">
								</div>
								
								<div class="row">
								<div class="form-group">
		<input  type="submit" name="submit2" value="submit" class="btn btn btn-info btn-single pull-right"/>   
																</div>	
								</div>
						</form>
						</div>
					</div>
				</div></div>
						</div>
						
						<div class="tab-pane" id="settings-3">
								
							<div class="row">
				<!--student registration form-->
				<div class="col-md-12">
					<div class="panel panel-default">
						
						<div class="panel-body">
						 <form role="form" class="" method="post" action="<?=base_url()?>admission/add_qualification/<?=$RegistrationId?>">
							   
								<div class="form-group-separator">
								</div>
								<div class="row">
								<div class="col-md-4">
								<div class="form-group ">
									<label class=" control-label" for="BoardUniversity">Board/University</label>
								
										<input type="text" class="form-control" name="BoardUniversity" value="<?=isset($BoardUniversity)?$BoardUniversity:''?>" id="BoardUniversity" placeholder="">
									
								</div>
							</div>
							<div class="col-md-4">
						<div class="form-group ">
									<label class=" control-label" for="Year">Year</label>
								
										<input type="text" class="form-control" name="Year" value="<?=isset($Year)?$Year:''?>" id="Year" placeholder="">
									
								</div>
								
							</div>
							<div class="col-md-4">
							<div class="form-group ">
									<label class=" control-label" for="Remarks">Remarks</label>
								
										<input type="text" class="form-control" name="Remarks" value="<?=isset($Remarks)?$Remarks:''?>" id="Remarks" placeholder="">
									
								</div>
								
								</div>
								</div>
							<div class="form-group-separator">
								</div>
								
							<div class="row">
							 <div class="col-md-4">
							<div class="form-group ">
									<label class=" control-label" for="Class">Class</label>
								
										<input type="text" class="form-control" name="Class" value="<?=isset($Class)?$Class:''?>" id="Class" placeholder="">
									
								</div>
							 
								
								</div>
							<div class="col-md-4">
							 <div class="form-group ">
									<label class=" control-label" for="Marks">Marks</label>
								
										<input type="text" class="form-control" name="Marks" value="<?=isset($Marks)?$Marks:''?>" id="Marks" placeholder="">
									
								</div>
								
								</div>
								
								</div> 		
								
							
							
							<div class="form-group-separator">
								</div>
								<div class="row">
								<div class="form-group">
		<input  type="submit" name="submit3" value="submit" class="btn btn btn-info btn-single pull-right"/>   
																</div>	
								</div>
						</form>
						</div>
					</div>
				</div></div>
						</div>
						
						<div class="tab-pane" id="inbox-3">
								
							<div class="row">
				<!--student registration form-->
				<div class="col-md-12">
					<div class="panel panel-default">
						
						<div class="panel-body">
						 <form role="form" class="" method="post" action="">
							   
								<div class="form-group-separator">
								</div>
								<div class="row">
								<div class="col-md-4">
								<div class="form-group ">
									<label class=" control-label" for="field-1">Name</label>
								
										<input type="text" class="form-control" name="student_name" value="" id="field-1" placeholder="Student Name">
									
								</div>
							</div>
							<div class="col-md-4">
						<div class="form-group ">
									<label class=" control-label" for="field-1">Class</label>
								
										<input type="text" class="form-control" name="student_name" value="" id="field-1" placeholder="Student Name">
									
								</div>
								
							</div>
							<div class="col-md-4">
							<div class="form-group ">
									<label class=" control-label" for="field-1">Remarks</label>
								
										<input type="text" class="form-control" name="student_name" value="" id="field-1" placeholder="Student Name">
									
								</div>
								
								</div>
								</div>
							<div class="form-group-separator">
								</div>
								
							<div class="row">
							 <div class="col-md-4">
							<div class="form-group ">
									<label class=" control-label" for="field-1">DOB</label>
								
										<div class="date-and-time">
											<input type="text" class="form-control datepicker" data-format="D, dd MM yyyy">
											<input type="text" class="form-control timepicker" data-template="dropdown" data-show-seconds="true" data-default-time="11:25 AM" data-show-meridian="true" data-minute-step="5" data-second-step="5" />
										</div>
								</div>
							 
								
								</div>
							<div class="col-md-4">
							 <div class="form-group ">
									<label class=" control-label" for="field-1">School</label>
								
										<input type="text" class="form-control" name="student_name" value="" id="field-1" placeholder="Student Name">
									
								</div>
								
								</div>
								
								</div> 		
								
							
							
							<div class="form-group-separator">
								</div>
								<div class="row">
								<div class="form-group">
								 <button type="submit" name="submit" class="btn btn-info btn-single pull-right">Save</button>
								</div>	
								</div>
						</form>
						</div>
					</div>
				</div></div>
						</div>
						
						<div class="tab-pane" id="inbox-4">
								
						<div class="row">
				<!--student registration form-->
				<div class="col-md-6">
					<div class="panel panel-default">
						
						<div class="panel-body">
						 <form role="form" class="form-horizontal" method="post" action="">
							   
								
								<div class="form-group">
									<label class="col-sm-4 control-label" for="Title">Title</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="Title" value="<?=isset($Title)?$Title:''?>" id="Title" placeholder="">
									</div>
								</div>
								<div class="form-group-separator">
								</div>
								
								
								<div class="form-group">
									<label class="control-label col-sm-4">Document</label>
									
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
										<select class="form-control " id="s2example-1" name="StudentsDocuments">
											<option></option>
										
											      <?php foreach ($doc as $d){?>
										<?php if($d->MasterEntryName=='StudentsDocuments') { ?>
										
										<option   value="<?=$d->MasterEntryId?>"><?=$d->MasterEntryValue?></option>
										<?php } ?><?php }?>								
										
										</select>
									</div>	
										
								</div>
								<div class="form-group-separator">
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4">Resolution</label>
										<script type="text/javascript">
										jQuery(document).ready(function($)
										{
											$("#s3example-1").select2({
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
									<select class="form-control col-sm-8" id="s3example-1" name="Resolution">
										<option></option>
									
										     <?php foreach ($photo as $pho){?>
										<?php if($pho->MasterEntryName=='Resolution') { ?>
										
										<option   value="<?=$pho->MasterEntryId?>"><?=$pho->MasterEntryValue?></option>
										<?php } ?><?php }?>
									</select>
									</div>	
										
								</div>
								<div class="form-group-separator">
								</div>
									
								<div class="form-group">
									<label class="col-sm-4 control-label">Select Image</label>
									
									<div class="col-sm-8">
										
										<input type="file" name="Path" >
									</div>
								</div>
								<div class="form-group-separator">
								</div>
								<div class="form-group">
		<input  type="submit" name="submit5" value="submit" class="btn btn btn-info btn-single pull-right"/>   
																</div>	
						</form>
						</div>
					</div>
				</div></div>
						</div>
						
						<div class="tab-pane" id="inbox-5">
								
							<div class="row">
				<!--student registration form-->
				<div class="col-md-12">
					<div class="panel panel-default">
						
						<div class="panel-body">
						 <form role="form" class="form-horizontal" method="post" action="<?=base_url()?>admission/update_registration/<?=$RegistrationId?>">
							   
								
								<div class="form-group ">
									<label class=" control-label col-sm-4" for="DateOfTermination">Date Of Termination</label>
								
										<div class="date-and-time col-sm-8">
											<input type="text" name="DateOfTermination" id="DateOfTermination" value="<?=isset($DateOfTermination)?$DateOfTermination:''?>" class="form-control datepicker" data-format="D, dd MM yyyy">
											<input type="text"  id="DateOfTermination" value="<?=isset($DateOfTermination)?$DateOfTermination:''?>" class="form-control timepicker" data-template="dropdown" data-show-seconds="true"  data-show-meridian="true" data-minute-step="5" data-second-step="5" />
										</div>
								</div>
								<div class="form-group-separator">
								</div>
								
								
								<div class="form-group">
									<label class="control-label col-sm-4">Reason</label>
									
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
										<select class="form-control " id="s2example-1" name="TerminationReason">
											<option></option>
		                                  <?php foreach ($termination as $ts){?>
										<?php if($ts->MasterEntryName=='TerminationReason') { ?>
										
										<option   value="<?=$ts->MasterEntryId?>" <?=($TerminationReason==$ts->MasterEntryId)?'selected':''?>><?=$ts->MasterEntryValue?></option>
										<?php } ?><?php }?>								
										
										</select>
									</div>	
										
								</div>
								<div class="form-group-separator">
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4">Session</label>
										<script type="text/javascript">
										jQuery(document).ready(function($)
										{
											$("#s3example-1").select2({
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
									<select class="form-control col-sm-8" id="s3example-1" >
										<option></option>
										
											<option>2015-2016</option>
											<option>2016-2017</option>
										
									</select>
									</div>	
										
								</div>
								<div class="form-group-separator">
								</div>
									
								<div class="form-group">
									<label class="col-sm-4 control-label" for="TerminationRemarks">Termination Remarks</label>
									
									<div class="col-sm-8">
										
										<textarea name="TerminationRemarks" id="TerminationRemarks"  class="col-sm-12" ><?=isset($TerminationRemarks)?$TerminationRemarks:''?></textarea>
									</div>
								</div>
								<div class="form-group-separator">
								</div>
								<div class="form-group">
		<input  type="submit" name="submit4" value="submit" class="btn btn btn-info btn-single pull-right"/>   
							</div>	
						</form>
						</div>
					</div>
				</div>
				</div>
						</div>
						
					</div>
					
					
				</div>
				<?php }?>
			</div>
			
		
	   <!--php alert message-->
		<?php  if($this->session->flashdata('message_type')) { ?>
			<div class="row">
				<div class="alert alert-success">
				<strong><?=$this->session->flashdata('message')?></strong> 
				</div>
			</div>
		<?php }?>
	   <!--php alert message-->
	    <!--Student registratioN body starts-->
	   	<div class="row">
				<!--student registration form-->
				<div class="col-sm-4">
					<div class="panel panel-color panel-gray">
						<div class="panel-heading">
							<h3 class="panel-title">Student Registration</h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
							</div>
						</div>
						<div class="panel-body">
						 <form role="form" class="form-horizontal" method="post" action="<?=base_url();?>admission/add_registration">
						  <?php if(empty($var)==''){ ?>
														<input type="hidden" name="id" value="<?=$var[0]->RegistrationId?>">
											<?php } ?>
						 
							    <div class="form-group">
									<label class="col-sm-4 control-label" for="field-1">For Session</label>
									<div class="col-sm-8">
									<label class="control-label" for="field-1"><?=$this->currentsession[0]->CurrentSession?></label>
									</div>
								</div>
								<div class="form-group-separator">
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="student_name" >Student Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="student_name"  value="" id="student_name" placeholder="Student Name">
									</div>
								</div>
								<div class="form-group-separator">
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="father_name">Father's Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="father_name" value="" id="father_name" placeholder="Father's Name">
									</div>
								</div>
								<div class="form-group-separator">
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="mother_name">Mother's Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="mother_name" value="" id="mother_name" placeholder="Mother's Name">
									</div>
								</div>
								<div class="form-group-separator">
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="mobile">Mobile Number</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="mobile" >
									</div>
								</div>
								<div class="form-group-separator">
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4">Class</label>
									
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
								<div class="form-group-separator">
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4">Gender</label>
										<script type="text/javascript">
										jQuery(document).ready(function($)
										{
											$("#s3example-1").select2({
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
									<select class="form-control col-sm-8" id="s3example-1" name="gender">
										<option></option>
										<?php foreach ($gender as $gen){ //print_r($key);die;?>
										<?php if($gen->MasterEntryName=='Gender') { ?>
										
										<option   value="<?=$gen->MasterEntryId?>" ><?=$gen->MasterEntryValue?></option>
										<?php } ?><?php } ?>
										
									</select>
									</div>	
										
								</div>
								<div class="form-group-separator">
								</div>
									
								<div class="form-group">
									<label class="col-sm-4 control-label" for="DOR">Date of Registration</label>
									
									<div class="col-sm-8">
										
										<div class="date-and-time">
										
											<input type="text" name="DOR" class="form-control datepicker" data-show="true" data-format="D, dd MM yyyy">
											<input type="text" name="DOR"  class="form-control timepicker" data-template="dropdown" data-show-seconds="true"  data-show-meridian="true" data-minute-step="5" data-second-step="5" />
										</div>
									</div>
								</div>
								<div class="form-group-separator">
								</div>
								<div class="form-group">
								       
								        <input  type="submit" name="submit" value="Submit" class="btn btn btn-info btn-single pull-right"/>   
								
								</div>	
						</form>
						</div>
					</div>
				</div>
				<!--student registration form Ends-->
				<!--student registration table-->
					<div class="col-sm-8">
					<div class="panel panel-color panel-gray">
						<div class="panel-heading">
							<h3 class="panel-title">Registration List</h3>
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
						$("#example-4").dataTable({
							
						});
					});
					</script>
					
					<table class="table table-bordered table-striped" id="example-4">
						<thead>
							<tr>
								<th>Student Name</th>
								<th>Father Name</th>
								<th>Mobile</th>
								<th>Class Registered</th>
								<th>Date of Registration</th>
								<th><i class="el-cancel-circled"></i></th>
							</tr>
						</thead>
					 
						<tfoot>
							<tr>
								<th>Student Name</th>
								<th>Father Name</th>
								<th>Mobile</th>
								<th>Class Registered</th>
								<th>Date of Registration</th>
								<th><i class="el-cancel-circled"></i></th>
							</tr>
						</tfoot>
					 
						<tbody>
						<?php foreach($regis as $rg){?>
							<tr>
								<td><a href="<?=base_url()?>admission/registration/<?=$rg->RegistrationId?>" class="visited"><?=$rg->StudentName?></a>  <span class="label label-success"><?=$rg->Status?></span></td>
								<td><?=$rg->FatherName?></td>
								<td><?=$rg->Mobile?></td>
								<td><?=$rg->ClassName?><?=$rg->SectionName?></td>
								<td><?=$rg->DOR?></td>
								<td><i class="el-cancel-circled"></i></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
						</div>
					</div>
				</div>
		</div>
<?php //} ?>