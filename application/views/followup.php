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
							<h3 class="panel-title">Follow Up Of <?=$followup_details[0]->Name?> (<?=$followup_details[0]->Mobile?>)</h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
							</div>
						</div>
						<div class="panel-body">
						 <form role="form" class="form-horizontal" method="post" action="<?=base_url();?>frontoffice/<?php if(isset($ocall)){ echo"insert_followup_other"; }elseif(isset($enquiry)){echo"insert_followup_enquiry";}else{ echo"insert_followup";}?>">
						  <?php if(isset($upfollowupid)){?>
						  <input type="hidden" name="upfollowupid" value="<?=$up_followup_details[0]->FollowUpId?>"/>
						  <?php } ?>
						    <input type="hidden"  name="followupid" value="<?php if(isset($followupid)){ echo $followupid[0];}?>"/>
								<div class="form-group">
									<label class="control-label col-sm-4">Follow Up Date</label>
									<div class="col-sm-8">
										
										<div class="date-and-time">
										
											<input type="text" required name="dof" value="<?php if(isset($up_followup_details[0]->DOF)){ echo date("d M Y, D h:i a",$up_followup_details[0]->DOF);}?>" class="form-control datepicker" data-show="true" data-format="D, dd MM yyyy">
											<input type="text" name="tof"  value="" class="form-control timepicker" data-template="dropdown" data-show-seconds="true"  data-show-meridian="true" data-minute-step="5" data-second-step="5" />
										</div>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-sm-4">Next Follow Of Date</label>
									<div class="col-sm-8">
										
										<div class="date-and-time">
										
											<input required type="text" name="ndof" value="<?php if(isset($up_followup_details[0]->NextFollowUpDate)){ echo date("d M Y, D h:i a",$up_followup_details[0]->NextFollowUpDate);}?>" class="form-control datepicker" data-show="true" data-format="D, dd MM yyyy">
											<input type="text" name="ntof"  class="form-control timepicker" data-template="dropdown" data-show-seconds="true"  data-show-meridian="true" data-minute-step="5" data-second-step="5" />
										</div>
									</div>
								</div>
								
								<div class="form-group-separator">
								</div>
									
								<div class="form-group">
									<label class="col-sm-4 control-label" for="DOR">Response</label>
									<div class="col-sm-8">
									<textarea required class="form-control" name="response"><?php echo (isset($up_followup_details[0]->ResponseDetail) ? $up_followup_details[0]->ResponseDetail : '');?></textarea>
									</div>
								</div>
								<div class="form-group-separator">
								</div>
								
								<div class="form-group">
									<label class="col-sm-4 control-label" for="DOR">Remarks</label>
									<div class="col-sm-8">
									<textarea required class="form-control" name="remark"><?php echo (isset($up_followup_details[0]->Remarks) ? $up_followup_details[0]->Remarks : '');?></textarea>
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
							<h3 class="panel-title">Follow Up List Of <?=$followup_details[0]->Name?> (<?=$followup_details[0]->Mobile?>)</h3>
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
								<th>Response</th>
								<th>Remarks</th>
								<th>Date Of Follow Up</th>
								<th>Next Follow Up</th>
								<th><i class="fa fa-edit"></i></th>
								<th><i class="el-cancel-circled"></i></th>
							</tr>
						</thead>
					 
						<tfoot>
							<tr>
								<th>Response</th>
								<th>Remarks</th>
								<th>Date Of Follow Up</th>
								<th>Next Follow Up</th>
								<th><i class="fa fa-edit"></i></th>
								<th><i class="el-cancel-circled"></i></th>
							</tr>
						</tfoot>
					 
						<tbody>
						<?php foreach($followup_details_show as $followup_details_show){?>
							<tr>
								
								<td><?=$followup_details_show->ResponseDetail?></td>
								<td><?=$followup_details_show->Remarks?></td>
								<td><?=date("d-m-Y H:i",$followup_details_show->DOF)?></td>
								<td><?=date("d-m-Y H:i",$followup_details_show->NextFollowUpDate)?></td>
								<td><a href="<?=base_url();?>frontoffice/<?php if(isset($ocall)){ echo"followup_other"; }elseif(isset($enquiry)){echo"followup_enquiry";}else{ echo"followup";}?>/<?php if(isset($followupid)){ echo $followupid[0];}?>/<?=$followup_details_show->FollowUpId?>"><i class="fa fa-edit"></i></a></td>
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