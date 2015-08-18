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
							<h3 class="panel-title">Add Visitor</h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
							</div>
						</div>
						<div class="panel-body">
						 <form role="form" class="form-horizontal" method="post" action="<?=base_url();?>">
						  
						 <div class="form-group">
									<label class="col-sm-4 control-label" for="student_name" >Purpose</label>
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
									<label class="col-sm-4 control-label" for="father_name">Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="name" value="" id="" placeholder="Name">
									</div>
								</div>
								<div class="form-group-separator">
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="mother_name">Mobile</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="mobile" data-mask="phone" value="" id="" placeholder="Mobile">
									</div>
								</div>
								<div class="form-group-separator">
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="mobile">No Of People</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="mobile" >
									</div>
								</div>
								
								
								<div class="form-group-separator">
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4">In Date Time</label>
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
									<label class="col-sm-4 control-label" for="DOR">Description</label>
									<div class="col-sm-8">
									<textarea class="form-control"></textarea>
									</div>
								</div>
								<div class="form-group-separator">
								</div>
								<div class="form-group">
								       
								        <input  type="submit" name="submit" value="Add" class="btn btn btn-info btn-single pull-right"/>   
								
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
							<h3 class="panel-title">Visitor Book Record</h3>
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
								<th>Name</th>
								<th>Mobile</th>
								<th>Purpose</th>
								<th>Description</th>
								<th>People</th>
								<th>In Time</th>
								<th>Out Time</th>
								<th><i class="el-cancel-circled"></i></th>
								<th><i class="el-cancel-circled"></i></th>
							</tr>
						</thead>
					 
						<tfoot>
							<tr>
								<th>Name</th>
								<th>Mobile</th>
								<th>Purpose</th>
								<th>Description</th>
								<th>People</th>
								<th>In Time</th>
								<th>Out Time</th>
								<th><i class="el-cancel-circled"></i></th>
								<th><i class="el-cancel-circled"></i></th>
							</tr>
						</tfoot>
					 
						<tbody>
						<?php //foreach($regis as $rg){?>
							<tr>
								<td>nidhi</td>
								<td>7854875478</td>
								<td>Enquiry</td>
								<td>Admission Enquiry</td>
								<td>3</td>
								<td>15-8-2015 2:50 pm</td>
								<td>15-8-2015 3:30 pm</td>
								<td><i class="el-cancel-circled"></i></td>
								<td><i class="el-cancel-circled"></i></td>
							</tr>
							<?php //} ?>
						</tbody>
					</table>
						</div>
					</div>
				</div>
		</div>
<?php //} ?>