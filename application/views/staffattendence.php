<div class="row">
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
				
				<div class="col-sm-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Staff Attendence</h3>
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
						 
							    
								<div class="form-group-separator">
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="student_name" >Date</label>
									<div class="col-sm-8">
										<div class="input-group">
											<input type="text" class="form-control datepicker" data-format="D, dd MM yyyy">
											
											<div class="input-group-addon">
												<a href="#"><i class="linecons-calendar"></i></a>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group-separator">
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="father_name">In Time</label>
									<div class="col-sm-8">
										<div class="input-group input-group-minimal">
											<input type="text" class="form-control timepicker" data-template="dropdown" data-show-seconds="true" data-default-time="11:25 AM" data-show-meridian="true" data-minute-step="5" data-second-step="5" />
											
											<div class="input-group-addon">
												<a href="#"><i class="linecons-clock"></i></a>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group-separator">
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="father_name">Out Time</label>
									<div class="col-sm-8">
										<div class="input-group input-group-minimal">
											<input type="text" class="form-control timepicker" data-template="dropdown" data-show-seconds="true" data-default-time="11:25 AM" data-show-meridian="true" data-minute-step="5" data-second-step="5" />
											
											<div class="input-group-addon">
												<a href="#"><i class="linecons-clock"></i></a>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
								<form role="form" class="form-horizontal">
								
								<div class="form-group">
									<label class="col-sm-3 control-label" for="tagsinput-1">Multi-select List</label>
									
									<div class="col-sm-9">
										
										<script type="text/javascript">
											jQuery(document).ready(function($)
											{
												$("#multi-select").multiSelect({
													afterInit: function()
													{
														// Add alternative scrollbar to list
														this.$selectableContainer.add(this.$selectionContainer).find('.ms-list').perfectScrollbar();
													},
													afterSelect: function()
													{
														// Update scrollbar size
														this.$selectableContainer.add(this.$selectionContainer).find('.ms-list').perfectScrollbar('update');
													}
												});
											});
										</script>
										<select class="form-control" multiple="multiple" id="multi-select" name="my-select[]">
											<option value="1">Silky Door</option>
											<option value="2">The Absent Twilight</option>
											<option value="3">Tales of Flames</option>
											<option value="4">The Princess's Dream</option>
											<option value="5">The Fairy of the Wind</option>
											<option value="6">Children in the Boy</option>
											<option value="7">Frozen Savior</option>
											
											<option value="15">Thorn of Emperor</option>
											<option value="16" selected>The Predator's Pirates</option>
											<option value="17">The Lord of the Girl</option>
											<option value="18" selected>Flowers in the Spirit</option>
											<option value="19" selected>Healing in the Silence</option>
											<option value="20">Planet of Bridges</option>
										</select>
										
									</div>
								</div>
							
							</form>
								</div>
								<div class="form-group-separator">
								</div>
								
								
								<div class="form-group">
								       
								        <input  type="submit" name="submit" value="Present" class="btn btn btn-info btn-single pull-right"/>   
								 <input  type="submit" name="Absent" value="Absent" class="btn btn btn-info btn-single pull-right"/>
								  <input  type="submit" name="Halfday" value="Halfday" class="btn btn btn-info btn-single pull-right"/>
								   <input  type="submit" name="Paid Leave" value="Paid Leave" class="btn btn btn-info btn-single pull-right"/>
								    <input  type="submit" name="On Duty" value="On Duty" class="btn btn btn-info btn-single pull-right"/>
								     <input  type="submit" name="Blank" value="Blank" class="btn btn btn-info btn-single pull-right"/>
								      <input  type="submit" name="Holiday" value="Holiday" class="btn btn btn-info btn-single pull-right"/>
								</div>	
						</form>
						</div>
					</div>
				</div>
				
				
		</div>
<?php //} ?>