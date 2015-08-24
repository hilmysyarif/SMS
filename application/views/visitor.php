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
						 <form role="form" class="form-horizontal" method="post" action="<?=base_url();?>frontoffice/insert_visitor">
						  <?php if(isset($visitorid)){ ?>
							<input type="hidden" name="visitorid" value="<?=$visitorid?>"/>
							<?php } ?>
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
									<select class="form-control col-sm-8" id="s3example-1" name="purpose">
										<option></option>
										<?php foreach ($purpose as $purpose){ ?>
										<option   value="<?=$purpose->MasterEntryId?>" <?php if(empty($visitorid)==''){ echo (!empty($visitor_up[0]->Purpose==$purpose->MasterEntryId) ? "selected" : ''); } ?>><?=$purpose->MasterEntryValue?></option>
										<?php } ?>
										
									</select>
									</div>
								</div>
								<div class="form-group-separator">
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="father_name">Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="name" value="<?php echo (isset($visitor_up[0]->Name) ? $visitor_up[0]->Name : '');?>" id="" placeholder="Name">
									</div>
								</div>
								<div class="form-group-separator">
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="mother_name">Mobile</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="mobile"  value="<?php echo (isset($visitor_up[0]->Mobile) ? $visitor_up[0]->Mobile : '');?>" id="" placeholder="Mobile">
									</div>
								</div>
								<div class="form-group-separator">
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="mobile">No Of People</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="nopeople" value="<?php echo (isset($visitor_up[0]->NoOfPeople) ? $visitor_up[0]->NoOfPeople : '');?>">
									</div>
								</div>
								
								
								<div class="form-group-separator">
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4">In Date Time</label>
									<div class="col-sm-8">
										
										<div class="date-and-time">
										
											<input type="text" name="doi" value="<?php if(isset($visitor_up[0]->InDateTime)){echo date("d-m-Y H:i",$visitor_up[0]->InDateTime);}?>" class="form-control datepicker" data-show="true" data-format="dd MM yyyy">
											<input type="text" name="toi"  value="" class="form-control timepicker" data-template="dropdown" data-show-seconds="true"  data-show-meridian="true" data-minute-step="5" data-second-step="5" />
										</div>
									</div>
								</div>
								<div class="form-group-separator">
								</div>
									
									<?php if(isset($visitorid)){ ?>
							<div class="form-group">
									<label class="control-label col-sm-4">Out Date Time</label>
									<div class="col-sm-8">
										
										<div class="date-and-time">
										
											<input type="text" name="doo" value="<?php if($visitor_up[0]->OutDateTime){echo date("d-m-Y H:i",$visitor_up[0]->OutDateTime);}?>" class="form-control datepicker" data-show="true" data-format="dd MM yyyy">
											<input type="text" name="too"  value="" class="form-control timepicker" data-template="dropdown" data-show-seconds="true"  data-show-meridian="true" data-minute-step="5" data-second-step="5" />
										</div>
									</div>
								</div>
								<div class="form-group-separator">
								</div>
							<?php } ?>
									
								<div class="form-group">
									<label class="col-sm-4 control-label" for="DOR">Description</label>
									<div class="col-sm-8">
									<textarea class="form-control" name="description"><?php echo (isset($visitor_up[0]->Description) ? $visitor_up[0]->Description : '');?></textarea>
									</div>
								</div>
								<div class="form-group-separator">
								</div>
								<div class="form-group">
								       
								        <input  type="submit" name="add" value="Add" class="btn btn btn-info btn-single pull-right"/>   
								
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
						<div class="table-responsive">	
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
								<th><i class="fa fa-edit"></i></th>
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
								<th><i class="fa fa-edit"></i></th>
								<th><i class="el-cancel-circled"></i></th>
							</tr>
						</tfoot>
					 
						<tbody>
						<?php foreach($visitor as $visitor){?>
							<tr>
								<td><?=$visitor->Name?></td>
								<td><?=$visitor->Mobile?></td>
								<td><?=$visitor->MasterEntryValue?></td>
								<td><?=$visitor->Description?></td>
								<td><?=$visitor->NoOfPeople?></td>
								<td><?php if($visitor->InDateTime){ echo date("d M Y,h:ia",$visitor->InDateTime);}?></td>
								<td><?php if($visitor->OutDateTime){ echo date("d M Y,h:ia",$visitor->OutDateTime);}?></td>
								<td><a href="<?=base_url();?>frontoffice/visitor/<?=$visitor->VisitorBookId?>"><i class="fa fa-edit"></i></td>
								<td><i class="el-cancel-circled"></i></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
						</div>
						</div>
					</div>
				</div>
		</div>
<?php //} ?>