<?php  if($this->session->flashdata('message_type')) { ?>
<div class="row">
<div class="alert alert-success">
<strong><?=$this->session->flashdata('message')?></strong> 
</div>
</div>
<?php }?>

<div class="row">

				<div class="col-sm-12">
					
					<div class="panel panel-color panel-gray">
						<div class="panel-heading">
							<h3 class="panel-title">Add Complaint</h3>
							
						</div>
						<div class="panel-body">
							
							<form role="form" class="form-horizontal" action="<?=base_url();?>" method="post">
							
							<div class="row">
									<div class="form-group col-md-4">
												<label class="control-label col-sm-4">Complaint  Type</label>
												
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
																<select class="form-control " id="s2example-1" name="examid">
																	<option></option>
																	<?php //foreach($exam as $exam){ ?>
																						<option  value="<?php //=$exam->ExamId?>-<?php //=$exam->SectionId?>" <?php //if(empty($examid)==''){ echo (!empty($exam->SectionId==$examid) ? "selected" : ''); } ?> ></option>
																								<?php  //} ?>
																
																</select>
															</div>
									</div>
									
									<div class="form-group col-md-4">
										
											<label class=" control-label col-sm-4" for="field-1">Description</label>
										<div class="col-sm-8">
											<textarea class="form-control " rows=""  name="content"></textarea>
										</div>
										
									</div>
										
									<div class="form-group col-md-4">
										
											<label class=" control-label col-sm-4" for="field-1">Action</label>
										<div class="col-sm-8">
											<textarea class="form-control " rows=""  name="content"></textarea>
										</div>
									</div>	
									
									</div>
									<div class="row">
									<div class="form-group col-md-4">
											<label class="control-label col-sm-4" for="field-1">Mobile</label>
											
											<div class="col-sm-8">
												<input type="text" class="form-control" id="field-1"  name="country" value="<?php //=$school_info[0]->Country?>">
											</div>
										</div>
										
										<div class="form-group col-md-4">
											<label class="control-label col-sm-4" for="field-1">Name</label>
											
											<div class="col-sm-8 ">
												<input type="text" class="form-control" id="field-1"  name="state" value="<?php        //=$school_info[0]->State?>">
											</div>
										</div>
										
										<div class="form-group col-md-4">
											<label class="control-label col-sm-4" for="field-1">Date Of Enquiry</label>
									
										<div class="col-sm-8">
											<div class="input-group">
														<input type="text" readonly class="form-control datepicker" data-format="D, dd MM yyyy" name="soft_date" value="<?php //=date("d-m-Y",isset($school_info[0]->SchoolStartDate))?>">
														
														<div class="input-group-addon">
															<a href="#"><i class="linecons-calendar"></i></a>
														</div>
													</div>
										</div>
										</div>
										</div>
										
										<div class="form-group ">
											
										<input type="submit" class="btn btn-info btn-single " value="Add"/>
											
										</div>
										
										
										
										
										</form>
								</div>	
							</div>	
							</div>		
						</div>
						
						<div class="row">
					<div class="col-md-12">
						<div class="panel panel-color panel-gray">
								<div class="panel-heading">
									<h3 class="panel-title">Complaint List</h3>
									
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
															<th>Name</th>
															<th>Mobile</th>
															<th>Complaint Type</th>
															<th>Date</th>
															<th>Description</th>
															<th>Action</th>
															<th><i class="fa fa-edit"></i></th>
															<th><i class="fa fa-file-text-o"></th>
															
														</tr>
													</thead>
										
													<tfoot>
														<tr>
															<th>Name</th>
															<th>Mobile</th>
															<th>Complaint Type</th>
															<th>Date</th>
															<th>Description</th>
															<th>Action</th>
															<th><a href="#"><i class="fa fa-edit"></i></a></th>
															<th><a href="#"><i class="fa fa-file-text-o"></a></th>
															
														</tr>
													</tfoot>
										
													<tbody>
													<?php //foreach($masterentry as $master){ ?>
														<tr>
														<td>Ankit <span class="label label-danger">Fresh</span></td>
														<td>5478547854</td>
														<td>Faculty<?php //=$master->MasterEntryValue?></td>
															<td>15-08-2015<?php //=$master->MasterEntryId?></td>
															<td>xyz<?php //=$master->MasterEntryId?></td>
															<td>abc</td>
															<td><a href="<?=base_url();?>master/modal/<?php //=$master->MasterEntryId?>"><i class="fa fa-edit"></a></i></td>
															<td><a href="<?=base_url();?>master/modal/<?php //=$master->MasterEntryId?>" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal-7"><i class="fa fa-file-text-o"></i></a></td>
															
														</tr>
													<?php //} ?>
												</tbody>
										</table>
									
								</div>
							</div>
				  </div>
					
					</div>