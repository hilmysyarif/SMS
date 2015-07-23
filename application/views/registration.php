<?php //print_r($gender);die;?>
<div class="main-content">	
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
						<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						$("#example-4").dataTable({
							dom: "<'row'<'col-sm-5'l><'col-sm-7'Tf>r>"+
								 "t"+
								 "<'row'<'col-xs-6'i><'col-xs-6'p>>",
							tableTools: {
								sSwfPath: "assets/js/datatables/tabletools/copy_csv_xls_pdf.swf"
							}
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