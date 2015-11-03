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
	   <!--php alert message-->
	    <!--Student promotion body starts-->
	   	<div class="row">
				<!--student promotion form-->
				<div class="col-sm-6">
					<div class="panel panel-color panel-gray">
						<div class="panel-heading">
							<h3 class="panel-title">Student Promotion</h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
							</div>
						</div>
						<div class="panel-body ">
						 <form role="form" class="form-horizontal" method="post" action="<?=base_url();?>admission/promotion">
						 
							    
								<div class="form-group-separator">
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="student_name" >Current Class</label>
									
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
										<select class="form-control " id="s2example-1" name="currentclass" onchange="show_student_promo(this.value,0)">
											<option></option>
										
																	<?php foreach($class_info as $cls){ ?>
																	<option  value="<?=$cls->SectionId?>" <?php if(isset($currentclass)){ echo (!empty($cls->SectionId==$currentclass) ? "selected" : ''); } ?> ><?=$cls->ClassName?> <?=$cls->SectionName?></option>
																			<?php  } ?>
																	
										</select>
										
									</div>
								</div>
								<div class="form-group-separator">
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="father_name">Select Student</label>
									
									<script type="text/javascript">
										jQuery(document).ready(function($)
										{
											$("#s2example-2").select2({
												placeholder: 'Select ...',
												allowClear: true
											}).on('select2-open', function()
											{
												// Adding Custom Scrollbar
												$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
											});
											
										});
									</script>
									<div class="col-sm-8" id="show_student">
										<select class="form-control " id="s2example-2" name="student">
											<option></option>
										
																	<option  value="<?php if(isset($student)){ echo $student;}?>" ><?php if(isset($student)){ echo $get_fee_structure[0]->StudentName;}?> <?php if(isset($student)){ echo $get_fee_structure[0]->FatherName;}?> <?php if(isset($student)){ echo $get_fee_structure[0]->Mobile;}?></option>
																		</optgroup>
																	
										</select>
									
									</div>
								</div>
								<div class="form-group-separator">
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="mother_name">Next Session</label>
									<div class="col-sm-8">
										<input data-mask="9999-9999" type="text" onchange="show_nextclass(this.value,0)" class="form-control" name="nextsession" value="<?php if(isset($nextsession)){ echo $nextsession;}?>" id="nextsession" placeholder="">
									</div>
								</div>
								<div class="form-group-separator">
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="mobile">Next Class</label>
									
										<script type="text/javascript">
										jQuery(document).ready(function($)
										{
											$("#s2example-3").select2({
												placeholder: 'Select ...',
												allowClear: true
											}).on('select2-open', function()
											{
												// Adding Custom Scrollbar
												$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
											});
											
										});
									</script>
									<div class="col-sm-8" id="show_nextclass">
										<select class="form-control " id="s2example-3" name="nextclass">
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
									<label class="col-sm-4 control-label" for="mobile">Trasnport</label>
									<div class="col-sm-8">
								<div class="checkbox">
											<label>
												<input type="checkbox" name="transport" <?php echo (isset($transport) ? "Checked=checked"
												: '');?> value="yes">
												 Check only if Fee Is Transport Fee
											</label>
										</div>
									</div>
								</div>		
								<div class="form-group-separator">
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4">Distance</label>
									
									<script type="text/javascript">
										jQuery(document).ready(function($)
										{
											$("#s2example-4").select2({
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
										<select class="form-control " id="s2example-4" name="distance">
																			<option></option>
																			<optgroup label="Select">
																			<?php $filter=array('MasterEntryName' => 'Distance'); $user= $this->utilities->get_usertype($filter); ?>
																	<?php foreach($user as $usertype){ ?>
																	<option value="<?=$usertype->MasterEntryId?>" <?php if(empty($distance)==''){ echo (!empty($distance==$usertype->MasterEntryId) ? "selected" : ''); } ?>><?=$usertype->MasterEntryValue?></option>
																			<?php } ?>
																		</optgroup>
																		</select>
									</div>	
										
								</div>
								
								
								<div class="form-group-separator">
								</div>
								<div class="form-group">
								       
								        <input  type="submit" name="submit" value="Get Fee Structure" class="btn btn btn-info btn-single pull-right"/>   
								
								</div>	
						</form>
						</div>
					</div>
				</div>
				
				
				  <?php if(isset($get_fee_structure)){?>
  <div class="col-md-6">

		<div class="panel panel-color panel-gray">
				<div class="panel-heading">
					<h3 class="panel-title">Set Fee Structure</h3>
					
					<div class="panel-body">
											<form role="form" class="form-horizontal" action="<?=base_url();?>admission/confirmpromotion" method="post">
											
											<input type="hidden" name="NextSession" value="<?php echo (isset($nextsession) ? $nextsession : '');?>">
											<input type="hidden" name="NextSectionId" value="<?php echo (isset($nextclass) ? $nextclass : '');?>">
											<input type="hidden" name="SectionId" value="<?php echo (isset($currentclass) ? $currentclass : '');?>">
											<input type="hidden" name="AdmissionId" value="<?php echo (isset($student) ? $student : '');?>">
											<input type="hidden" name="Distance" value="<?php echo (isset($distance) ? $distance : '');?>">
											
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Date Of Promotion</label>
																	
																			<div class="col-sm-8">
													<div class="date-and-time">
											<input readonly type="text" name="DOP" class="form-control datepicker" data-format="D, dd MM yyyy" value="">
											<input type="text"  class="form-control timepicker" data-template="dropdown" data-show-seconds="true" data-default-time="11:25 AM" data-show-meridian="true" data-minute-step="5" data-second-step="5" />
										</div>
																		</div>	

																		
																</div>
																
																
																<?php if(isset($get_fee_structure)){ $feestr=''; 
																foreach($get_fee_structure as $fee_type){ 
																$feestr.=$fee_type->FeeId.'-'.$fee_type->Amount;
																?>
																<div class="form-group">
																
																	<label class="control-label col-sm-4 "><?=$fee_type->MasterEntryValue?></label>
																	
																			<div class="col-sm-8">
																			<input type="text" class="form-control" name="FeeArray1[]" value="<?=$fee_type->Amount?>" id="" placeholder="">
																			
																		</div>	

																		
																</div>
																<?php } ?>
																<input type="hidden" class="form-control" name="FeeArray[]" value="<?=$feestr?>" >
														<?php		}?>
																
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Remarks</label>
																	
																			<div class="col-sm-8">
																			<textarea class="form-control" name="Remarks"></textarea>
																		</div>	

																		
																</div>
																
										<input type="submit" class="btn btn-info btn-single " value="Confirm">
													</form>
											
													<div class="form-group-separator"></div>
													
													
									</div>
				</div>
				
			</div>

  </div>
  <?php }?>
				
				
			</div>	
			