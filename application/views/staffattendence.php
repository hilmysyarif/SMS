<div class="row">
	 <!--php alert message-->
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
	    <!--Student registratioN body starts-->
	   	<div class="row">
				
				<div class="col-sm-12">
					<div class="panel panel-color panel-gray">
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
						 <form role="form" class="form-horizontal" method="post" action="<?=base_url();?>attendences/add_attendence">
						  <?php if(empty($var)==''){ ?>
														<input type="hidden" name="id" value="<?=$var[0]->RegistrationId?>">
											<?php } ?>
						 
							<div class="form-group">
									<label class="col-sm-4 control-label" for="student_name" >Date</label>
									<div class="col-sm-8">
										<div class="input-group">
											<input type="text" required name="date" class="form-control datepicker" data-format="D, dd MM yyyy">
											
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
											<input type="text" required name="intime" class="form-control timepicker" data-template="dropdown" data-show-seconds="true"  data-show-meridian="true" data-minute-step="5" data-second-step="5" />
											
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
											<input type="text"  required name="outtime" class="form-control timepicker" data-template="dropdown" data-show-seconds="true" data-default-time="11:25 AM" data-show-meridian="true" data-minute-step="5" data-second-step="5" />
											
											<div class="input-group-addon">
												<a href="#"><i class="linecons-clock"></i></a>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group-separator">
								</div>
							
								
								<div class="form-group">
									<label class="col-sm-4 control-label" for="tagsinput-1">Staff List</label>
									<style>.multiselectable { width:500px; display:block; overflow: hidden; width: 100%; }
										.multiselectable select, .multiselectable div { width: 200px; float:left; }
										.multiselectable div * { display: block; margin: 0 auto; }
										.multiselectable div { display: inline; }
										.multiselectable .m-selectable-controls { margin-top: 1em; width: 50px; }
										.multiselectable .m-selectable-controls button { margin-top: 1em; }</style>
									<script type="text/javascript">
										$(document).ready(function() {
											$('.multi').multiselectable({
												
												moveRightText: '+',
												moveLeftText: '-'
											});
										});
									</script>
									<div class="col-sm-8">
										<select required class="form-control multi" name="staff[]" multiple="multiple" >
										<?php foreach($get_staff as $get_staff1){ ?>
											<option value="<?=$get_staff1->StaffId?>"><?=$get_staff1->StaffName?> (<?=$get_staff1->MasterEntryValue?>)</option>
										<?php } ?>
										</select>
									</div>
										
								</div>
								<div class="form-group-separator">
								</div>
							
							<div class="form-group pull-right">
								       
								 <input  type="submit" name="Present" value="Present" class="btn btn btn-info btn-single " onclick="selectAll('m-selectable',true)"/>   
								<!-- <input  type="submit" name="Absent" value="Absent" class="btn btn btn-info btn-single "/> -->
								  <input  type="submit" name="Halfday" value="Halfday" class="btn btn btn-info btn-single " onclick="selectAll('m-selectable',true)"/>
								   <input  type="submit" name="PaidLeave" value="Paid Leave" class="btn btn btn-info btn-single " onclick="selectAll('m-selectable',true)"/>
								    <input  type="submit" name="OnDuty" value="On Duty" class="btn btn btn-info btn-single " onclick="selectAll('m-selectable',true)"/>
								   <!--  <input  type="submit" name="Blank" value="Blank" class="btn btn btn-info btn-single "/>-->
								      <input  type="submit" name="Holiday" value="Holiday" class="btn btn btn-info btn-single" onclick="selectAll('m-selectable',true)"/>
							</div>	
						</form>
						</div>
					</div>
				</div>
				
				
		</div>
		<script>
		function selectAll(selectBox,selectAll) { 
    // have we been passed an ID 
    if (typeof selectBox == "string") { 
        selectBox = document.getElementById(selectBox);
    } 
    // is the select box a multiple select box? 
    if (selectBox.type == "select-multiple") { 
        for (var i = 0; i < selectBox.options.length; i++) { 
             selectBox.options[i].selected = selectAll; 
        } 
    }
}
		</script>
<?php //} ?>