<?php //print_r($gender);die;?>
<div class="main-content">


<div class="row">
			
				<div class="col-md-12">
					
					<ul class="nav nav-tabs nav-tabs-justified">
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
					
					<div class="tab-content">
						<div class="tab-pane active" id="home-3">
							
							<div>
								
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
							<div class="form-group">
									<label class="control-label">Registration Date</label>
									
										
										<div class="date-and-time">
											<input type="text" class="form-control datepicker" data-format="D, dd MM yyyy">
											<input type="text" class="form-control timepicker" data-template="dropdown" data-show-seconds="true" data-default-time="11:25 AM" data-show-meridian="true" data-minute-step="5" data-second-step="5" />
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
									
										<select class="form-control " id="s2example-1">
											<option></option>
										
											<optgroup label="Class">
												<option>1st section A</option>
												<option>2nd  section A</option>
											</optgroup>
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
								
									<select class="form-control " id="s3example-1">
										<option></option>
									
										<optgroup label="Gender">
											<option>Male</option>
											<option>Female</option>
										</optgroup>
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
								
									<select class="form-control " id="s3example-1">
										<option></option>
									
										<optgroup label="Gender">
											<option>Male</option>
											<option>Female</option>
										</optgroup>
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
								
									<select class="form-control " id="s3example-1">
										<option></option>
									
										<optgroup label="Gender">
											<option>Male</option>
											<option>Female</option>
										</optgroup>
									</select>
									
										
								</div>
								
								
								</div> 
								</div> 		
								<div class="form-group-separator">
								</div>
							<div class="row">
							
									<div class="col-md-4">
								<div class="form-group ">
									<label class=" control-label" for="field-1">Father Name</label>
								
										<input type="text" class="form-control" name="father_name" value="" id="field-1" placeholder="Father's Name">
							
								</div>
								</div>
								<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">Birth Date</label>
									
										
										<div class="date-and-time">
											<input type="text" class="form-control datepicker" data-format="D, dd MM yyyy">
											<input type="text" class="form-control timepicker" data-template="dropdown" data-show-seconds="true" data-default-time="11:25 AM" data-show-meridian="true" data-minute-step="5" data-second-step="5" />
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
								
									<select class="form-control " id="s3example-1">
										<option></option>
									
										<optgroup label="Gender">
											<option>Male</option>
											<option>Female</option>
										</optgroup>
									</select>
									
										
								</div>
								</div> 
								
								
							</div>	
							<div class="form-group-separator">
								</div>
							<div class="row">
							<div class="col-md-4">
								<div class="form-group ">
									<label class=" control-label" for="field-1">Mother Name</label>
								
										<input type="text" class="form-control" name="father_name" value="" id="field-1" placeholder="Father's Name">
							
								</div>
								</div>
							</div>
							<div class="form-group-separator">
								</div>
								<div class="row">
								<div class="form-group">
								 <button type="submit" class="btn btn-info btn-single pull-right">Save</button>
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
						 <form role="form" class="" method="post" action="">
							   
								<div class="form-group-separator">
								</div>
								<div class="row">
								<div class="col-md-4">
								<div class="form-group ">
									<label class=" control-label" for="field-1">Mobile</label>
								
										<input type="text" class="form-control" name="student_name" value="" id="field-1" placeholder="Student Name">
									
								</div>
							</div>
							<div class="col-md-4">
						<div class="form-group ">
									<label class=" control-label" for="field-1">Father Mobile</label>
								
										<input type="text" class="form-control" name="student_name" value="" id="field-1" placeholder="Student Name">
									
								</div>
								
							</div>
							<div class="col-md-4">
							<div class="form-group ">
									<label class=" control-label" for="field-1">Present Address</label>
								
										<input type="text" class="form-control" name="student_name" value="" id="field-1" placeholder="Student Name">
									
								</div>
								
								</div>
								</div>
							<div class="form-group-separator">
								</div>
								
							<div class="row">
							 <div class="col-md-4">
							<div class="form-group ">
									<label class=" control-label" for="field-1">Landline</label>
								
										<input type="text" class="form-control" name="student_name" value="" id="field-1" placeholder="Student Name">
									
								</div>
							 
								
								</div>
							<div class="col-md-4">
							 <div class="form-group ">
									<label class=" control-label" for="field-1">Mother Mobile</label>
								
										<input type="text" class="form-control" name="student_name" value="" id="field-1" placeholder="Student Name">
									
								</div>
								
								</div>
								<div class="col-md-4">
								
								<div class="form-group ">
									<label class=" control-label" for="field-1">Present Address</label>
								
										<input type="text" class="form-control" name="student_name" value="" id="field-1" placeholder="Student Name">
									
								</div>
								
								
								</div> 
								</div> 		
								<div class="form-group-separator">
								</div>
							<div class="row">
							
									<div class="col-md-4">
								<div class="form-group ">
									<label class=" control-label" for="field-1">Alternate Mobile</label>
								
										<input type="text" class="form-control" name="father_name" value="" id="field-1" placeholder="Father's Name">
							
								</div>
								</div>
								
								
								
								
							</div>	
							
							<div class="form-group-separator">
								</div>
								<div class="row">
								<div class="form-group">
								 <button type="submit" class="btn btn-info btn-single pull-right">Save</button>
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
						 <form role="form" class="" method="post" action="">
							   
								<div class="form-group-separator">
								</div>
								<div class="row">
								<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">Father Date Of Birth</label>
									
										
										<div class="date-and-time">
											<input type="text" class="form-control datepicker" data-format="D, dd MM yyyy">
											<input type="text" class="form-control timepicker" data-template="dropdown" data-show-seconds="true" data-default-time="11:25 AM" data-show-meridian="true" data-minute-step="5" data-second-step="5" />
										</div>
									</div>
							</div>
							<div class="col-md-4">
						<div class="form-group">
									<label class="control-label">Mother Date Of Birth</label>
									
										
										<div class="date-and-time">
											<input type="text" class="form-control datepicker" data-format="D, dd MM yyyy">
											<input type="text" class="form-control timepicker" data-template="dropdown" data-show-seconds="true" data-default-time="11:25 AM" data-show-meridian="true" data-minute-step="5" data-second-step="5" />
										</div>
									</div>
								
							</div>
							<div class="col-md-4">
							<div class="form-group ">
									<label class=" control-label" for="field-1">Father Designation</label>
								
										<input type="text" class="form-control" name="student_name" value="" id="field-1" placeholder="Student Name">
									
								</div>
								
								</div>
								</div>
							<div class="form-group-separator">
								</div>
								
							<div class="row">
							 <div class="col-md-4">
							<div class="form-group ">
									<label class=" control-label" for="field-1">Father Email</label>
								
										<input type="text" class="form-control" name="student_name" value="" id="field-1" placeholder="Student Name">
									
								</div>
							 
								
								</div>
							<div class="col-md-4">
							 <div class="form-group ">
									<label class=" control-label" for="field-1">Mother Email</label>
								
										<input type="text" class="form-control" name="student_name" value="" id="field-1" placeholder="Student Name">
									
								</div>
								
								</div>
								<div class="col-md-4">
								
								<div class="form-group ">
									<label class=" control-label" for="field-1">Father Organization</label>
								
										<input type="text" class="form-control" name="student_name" value="" id="field-1" placeholder="Student Name">
									
								</div>
								
								
								</div> 
								</div> 		
								<div class="form-group-separator">
								</div>
							<div class="row">
							
									<div class="col-md-4">
								<div class="form-group ">
									<label class=" control-label" for="field-1">Father Qualification</label>
								
										<input type="text" class="form-control" name="father_name" value="" id="field-1" placeholder="Father's Name">
							
								</div>
								</div>
								
								<div class="col-md-4">
								<div class="form-group ">
									<label class=" control-label" for="field-1">Mother Qualification</label>
								
										<input type="text" class="form-control" name="father_name" value="" id="field-1" placeholder="Father's Name">
							
								</div>
								</div>
								
								<div class="col-md-4">
								<div class="form-group ">
									<label class=" control-label" for="field-1">Mother Designation</label>
								
										<input type="text" class="form-control" name="father_name" value="" id="field-1" placeholder="Father's Name">
							
								</div>
								</div>
								
								
							</div>	
							
							<div class="form-group-separator">
								</div>
								
								<div class="row">
							
									<div class="col-md-4">
								<div class="form-group ">
									<label class=" control-label" for="field-1">Father Occupation</label>
								
										<input type="text" class="form-control" name="father_name" value="" id="field-1" placeholder="Father's Name">
							
								</div>
								</div>
								
								<div class="col-md-4">
								<div class="form-group ">
									<label class=" control-label" for="field-1">Mother Occupation</label>
								
										<input type="text" class="form-control" name="father_name" value="" id="field-1" placeholder="Father's Name">
							
								</div>
								</div>
								
								<div class="col-md-4">
								<div class="form-group ">
									<label class=" control-label" for="field-1">Mother Organization</label>
								
										<input type="text" class="form-control" name="father_name" value="" id="field-1" placeholder="Father's Name">
							
								</div>
								</div>
								
								
							</div>	
							
							<div class="form-group-separator">
								</div>
								
								<div class="row">
								<div class="form-group">
								 <button type="submit" class="btn btn-info btn-single pull-right">Save</button>
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
						 <form role="form" class="" method="post" action="">
							   
								<div class="form-group-separator">
								</div>
								<div class="row">
								<div class="col-md-4">
								<div class="form-group ">
									<label class=" control-label" for="field-1">Board/University</label>
								
										<input type="text" class="form-control" name="student_name" value="" id="field-1" placeholder="Student Name">
									
								</div>
							</div>
							<div class="col-md-4">
						<div class="form-group ">
									<label class=" control-label" for="field-1">Year</label>
								
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
									<label class=" control-label" for="field-1">Class</label>
								
										<input type="text" class="form-control" name="student_name" value="" id="field-1" placeholder="Student Name">
									
								</div>
							 
								
								</div>
							<div class="col-md-4">
							 <div class="form-group ">
									<label class=" control-label" for="field-1">Marks</label>
								
										<input type="text" class="form-control" name="student_name" value="" id="field-1" placeholder="Student Name">
									
								</div>
								
								</div>
								
								</div> 		
								
							
							
							<div class="form-group-separator">
								</div>
								<div class="row">
								<div class="form-group">
								 <button type="submit" class="btn btn-info btn-single pull-right">Save</button>
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
								 <button type="submit" class="btn btn-info btn-single pull-right">Save</button>
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
									<label class="col-sm-4 control-label" for="field-1">Title</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="student_name" value="" id="field-1" placeholder="Student Name">
									</div>
								</div>
								<div class="form-group-separator">
								</div>
								
								
								<div class="form-group">
									<label class="control-label col-sm-4">Decument</label>
									
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
										<select class="form-control " id="s2example-1">
											<option></option>
										
											<optgroup label="Class">
												<option>1st section A</option>
												<option>2nd  section A</option>
											</optgroup>
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
									<select class="form-control col-sm-8" id="s3example-1">
										<option></option>
									
										<optgroup label="Gender">
											<option>Male</option>
											<option>Female</option>
										</optgroup>
									</select>
									</div>	
										
								</div>
								<div class="form-group-separator">
								</div>
									
								<div class="form-group">
									<label class="col-sm-4 control-label">Select Image</label>
									
									<div class="col-sm-8">
										
										<input type="file" name="" >
									</div>
								</div>
								<div class="form-group-separator">
								</div>
								<div class="form-group">
								 <button type="submit" class="btn btn-info btn-single pull-right">Save</button>
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
						 <form role="form" class="form-horizontal" method="post" action="">
							   
								
								<div class="form-group ">
									<label class=" control-label col-sm-4" for="field-1">Date Of Termination</label>
								
										<div class="date-and-time col-sm-8">
											<input type="text" class="form-control datepicker" data-format="D, dd MM yyyy">
											<input type="text" class="form-control timepicker" data-template="dropdown" data-show-seconds="true" data-default-time="11:25 AM" data-show-meridian="true" data-minute-step="5" data-second-step="5" />
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
										<select class="form-control " id="s2example-1">
											<option></option>
										
											<optgroup label="Class">
												<option>1st section A</option>
												<option>2nd  section A</option>
											</optgroup>
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
									<select class="form-control col-sm-8" id="s3example-1">
										<option></option>
									
										<optgroup label="Gender">
											<option>Male</option>
											<option>Female</option>
										</optgroup>
									</select>
									</div>	
										
								</div>
								<div class="form-group-separator">
								</div>
									
								<div class="form-group">
									<label class="col-sm-4 control-label">Termination Remarks</label>
									
									<div class="col-sm-8">
										
										<textarea name="" class="col-sm-12" ></textarea>
									</div>
								</div>
								<div class="form-group-separator">
								</div>
								<div class="form-group">
								 <button type="submit" class="btn btn-info btn-single pull-right">Save</button>
								</div>	
						</form>
						</div>
					</div>
				</div>
				</div>
						</div>
						
					</div>
					
					
				</div>
			</div>





<div class="page-title">
	  <div class="title-env">
		<h1 class="title">Student Registration</h1>
		<p class="description">Register Your User </p>
	   </div>
	   <!--Breadcrumb starts-->
	    <div class="breadcrumb-env">
			 <ol class="breadcrumb bc-1">
				 <li>
				   <a href="javascript:;"><i class="fa-home"></i>Home</a>
				 </li>
				 <li class="active">
				   <strong>Student Registration</strong>
				 </li>
			</ol>
		</div>
		<!--Breadcrumb Ends-->			
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
				<div class="col-sm-6">
					<div class="panel panel-default">
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
						 <form role="form" class="form-horizontal" method="post" action="<?=base_url();?>admission/insert_registration">
						 <?php if(empty($id)==''){ ?>
														<input type="hidden" name="id" value="<?=$registration_update[0]->RegistrationId?>">
											<?php } ?>
						 
							    <div class="form-group">
									<label class="col-sm-4 control-label" for="field-1">For Session</label>
									<div class="col-sm-8">
									<label class="control-label" for="field-1">2015-2016</label>
									</div>
								</div>
								<div class="form-group-separator">
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="field-1">Student Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="student_name"  value="" id="field-1" placeholder="Student Name">
									</div>
								</div>
								<div class="form-group-separator">
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="field-1">Father's Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="father_name" value="" id="field-1" placeholder="Father's Name">
									</div>
								</div>
								<div class="form-group-separator">
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="field-1">Mother's Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="mother_name" value="" id="field-1" placeholder="Mother's Name">
									</div>
								</div>
								<div class="form-group-separator">
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="field-1">Mobile Number</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="mobile" data-mask="phone">
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
																	<option  value="<?=$cls->SectionId?>" <?php if(empty($id)==''){ echo (!empty($registration_update[0]->StudentName==$cls->ClassName) ? "selected" : ''); } ?>><?=$cls->ClassName?> <?=$cls->SectionName?></option>
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
										<?php foreach ($gender as $gen){?>
										
										
										<option   value="<?=$gen->MasterEntryId?>"  <?php if(empty($id)==''){ echo (!empty($registration_update[0]->StudentName==$gen->Gender) ? "selected" : ''); } ?>><?=$gen->MasterEntryValue?></option>
										<?php }?>
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
											<input type="text"   class="form-control timepicker" data-template="dropdown" data-show-seconds="true"  data-show-meridian="true" data-minute-step="5" data-second-step="5" />
										</div>
									</div>
								</div>
								<div class="form-group-separator">
								</div>
								<div class="form-group">
								 <button type="submit" class="btn btn-info btn-single pull-right">Save</button>
								</div>	
						</form>
						</div>
					</div>
				</div>
				<!--student registration form Ends-->
				<!--student registration table-->
					<div class="col-sm-6">
					<div class="panel panel-default">
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
								<td><?=$rg->StudentName?>  <span class="label label-success"><?=$rg->Status?></span></td>
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
