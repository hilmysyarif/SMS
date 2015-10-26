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
			<div class="row">
					<div class="col-md-4">
						<div class="panel panel-default">
										<div class="panel-heading">
											Add Calendar
										</div>
									<div class="panel-body">
											<form role="form" class="form-horizontal" action="<?=base_url();?>master/insert_calendar" method="post">
											<?php if(empty($id)==''){ ?>
														<input type="hidden" name="id" value="<?=$id?>">
											<?php } ?>
																
																
																<div class="form-group">
																		<label class="col-sm-4 control-label" for="field-1">Title</label>
																		
																		<div class="col-sm-8">
																			<input type="text" class="form-control"  required id="field-1" placeholder="Title" name="title" value="<?php echo (isset($updatecalendar[0]->Title) ? $updatecalendar[0]->Title : '');?>" >
																		</div>
																</div>
																	
																<div class="form-group">
																	<label class="col-sm-4 control-label">Color </label>
																
																	<div class="col-sm-8">
																		<input type="text" value="<?php echo (isset($updatecalendar[0]->Color) ? $updatecalendar[0]->Color : '');?>" class="form-control colorpicker" name="color" data-horizontal="true" />
																	</div>
																</div>
								
																	
																	
																<div class="form-group">
																		<label class="col-sm-4 control-label" for="field-1">Star Time</label>
																		
																		<div class="col-sm-8">
																			<div class="date-and-time">
													
														<input type="text" readonly required class="form-control datepicker" data-format="D, dd MM yyyy" name="starttime" value="<?php if(isset($updatecalendar[0]->StartTime)){echo date("d-m-Y H:i",$updatecalendar[0]->StartTime);}?>">
														<input type="text" value="<?php if(isset($updatecalendar[0]->StartTime)){echo date("d-m-Y H:i",$updatecalendar[0]->StartTime);}?>" class="form-control timepicker" data-template="dropdown" data-show-seconds="true" data-default-time="11:25 AM" data-show-meridian="true" data-minute-step="5" data-second-step="5" />
													
													</div>
																		</div>
																</div>
																
																<div class="form-group">
																		<label class="col-sm-4 control-label" for="field-1">End Time</label>
																		
																		<div class="col-sm-8">
																			<div class="date-and-time">
														<input type="text" readonly required class="form-control datepicker" data-format="D, dd MM yyyy" name="endtime" value="<?php if(isset($updatecalendar[0]->EndTime)){echo date("d-m-Y H:i",$updatecalendar[0]->EndTime);}?>">
														<input type="text" value="<?php if(isset($updatecalendar[0]->EndTime)){echo date("d-m-Y H:i",$updatecalendar[0]->EndTime);}?>" class="form-control timepicker" data-template="dropdown" data-show-seconds="true" data-default-time="11:25 AM" data-show-meridian="true" data-minute-step="5" data-second-step="5" />
														
														
													</div>
																		</div>
																</div>
																	
																	
									<input type="submit" class="btn btn-info btn-single " value="Add">
													</form>
											
													<div class="form-group-separator"></div>
									</div>
						</div>
					</div>
	<div class="col-md-8">
		<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">My Calendar List</h3>
					
					<div class="panel-options">
					<a href="<?=base_url();?>master/prints/calendar" target="blank"><i class="fa fa-print"></i></a>
						<a href="#" data-toggle="panel">
							<span class="collapse-icon">&ndash;</span>
							<span class="expand-icon">+</span>
						</a>
						<a href="#" data-toggle="remove">
							&times;
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
					<div class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">
						<table id="example-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Title</th>
											<th>Start Time</th>
											<th>End Time</th>
											<th><i class="fa fa-edit"></i></th>
											<th><i class="fa fa-times"></th>
											
										</tr>
									</thead>
						
									<tfoot>
										<tr>
											<th>Title</th>
											<th>Start Time</th>
											<th>End Time</th>
											<th><i class="fa fa-edit"></i></th>
											<th><i class="fa fa-times"></th>
											
										</tr>
									</tfoot>
						
									<tbody>
									<?php foreach($calendar as $calendar){ ?>
										<tr>
											<td><?=$calendar->Title?></td>
											<td><?=date("d M Y,h:ia",$calendar->StartTime)?></td>
											<td><?=date("d M Y,h:ia",$calendar->EndTime)?></td>
											<td><a href="<?=base_url();?>master/calendar/<?=$calendar->CalendarId?>"><i class="fa fa-edit"></a></i></td>
											<td><a onClick="return confirm('Are you sure to delete this ? This will delete all the related records ')" href="<?=base_url();?>frontoffice/delete/calendar/CalendarId/<?=$calendar->CalendarId?>"  ><i class="fa fa-times"></i></a></td>
										</tr>
									<?php } ?>
								</tbody>
						</table>
					</div>
				</div>
			</div>
  </div>
</div>