 <!--php alert message-->
		<?php  if($this->session->flashdata('message_type')) { ?>
			<div class="row">
				<div class="alert alert-success">
				<strong><?=$this->session->flashdata('message')?></strong> 
				</div>
			</div>
		<?php }?>
	   <!--php alert message-->
	   
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
						 <form role="form" class="form-horizontal" method="post" action="">
												<div class="form-group">
													<label class="col-sm-4 control-label" for="" >Position</label>
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
																<select class="form-control " id="s2example-1" name="">
																	<option></option>
																	<option  value="" >Faculty</option>
																
																</select>
															</div>	
												</div>
												<div class="form-group-separator"></div>
													<div class="form-group ">
														<label class=" control-label col-sm-4" for="staff_name"> Staff Name</label>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="staff_name" value="" id="student_name" placeholder="Staff Name">
															</div>
													</div>
													<div class="form-group-separator"></div>
													<div class="form-group ">
														<label class=" control-label col-sm-4 " for="mobile">Mobile Number</label>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="mobile" value="" id="mobile" placeholder="Mobile Number">
														</div>
													</div>
													<div class="form-group-separator"></div>
														<div class="form-group">
															<label class="col-sm-4 control-label">Date Of Joining</label>
															
															<div class="col-sm-8">
																<div class="input-group">
																	<input type="text" class="form-control datepicker" data-format="D, dd MM yyyy" name="soft_date" value="">
																	
																	<div class="input-group-addon">
																		<a href="#"><i class="linecons-calendar"></i></a>
																	</div>
																</div>
															</div>
														</div>
													<div class="form-group-separator"></div>
												<div class="form-group pull-right">
														<input  type="submit" name="submit" value="Save" class="btn btn btn-info btn-single "/>
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
								<form role="form" class="form-horizontal">
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
												<tr>
													<td>Harshlata  <span class="label label-info">1st section A</span></td>
													<td>5447859656</td>
													<td>faculty</td>
													<td>26 Jun 2015</td>
													
												</tr>
											</tbody>
										</table>
									</div>	
								</form>
						</div>
					</div>
		</div>
		<!--Staff List-->		
</div>

	  
	
<?php //} ?>