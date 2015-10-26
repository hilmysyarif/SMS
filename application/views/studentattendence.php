<div class="row">
	<div class="col-sm-12">
			<div class="panel  panel-color panel-gray">
						<div class="panel-heading">
							<h3 class="panel-title">Select Class</h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
							</div>
						</div>
					<div class="panel-body">
					 <form role="form" class="form-horizontal" method="post" action="<?=base_url();?>attendences/get_student">
											<div class="form-group">
														<label class="col-sm-4 control-label" for="class_name" >Class</label>
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
															<select class="form-control " required id="s2example-1" name="class">
																<option></option>
															
																						<?php foreach($class_section as $cls){ ?>
																						<option  value="<?=$cls->SectionId?>" <?php if(empty($students)==''){ echo (!empty($cls->SectionId==$sectionid) ? "selected" : ''); } ?> ><?=$cls->ClassName?> <?=$cls->SectionName?></option>
																								<?php  } ?>
																							</optgroup>
																						
																							
																
															</select>
														</div>	
											</div>
											<div class="form-group-separator"></div>
											<div class="form-group pull-right">
													<input  type="submit" name="submit" value="Get Student" class="btn btn btn-info btn-single "/>
										</div>
					</form>
				</div>
			</div>
	</div>
</div>

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
		<?php if(isset($students)){ ?>
	   	<div class="row">
				
				<div class="col-sm-12">
					<div class="panel  panel-color panel-gray">
						<div class="panel-heading">
							<h3 class="panel-title">Student Attendance</h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
							</div>
						</div>
						<div class="panel-body">
								<form role="form" method="post" action="<?=base_url();?>attendences/add_student_att" class="form-horizontal">
								
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
										<label class="col-sm-4 control-label" for="tagsinput-1">Students List</label>
										
										<div class="col-sm-8">
											
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
											<select class="form-control multi" required multiple="multiple"  name="addmissionid[]">
												<?php foreach($students as $studentss){ ?>
																						<option  value="<?=$studentss->AdmissionId?>" ><?=$studentss->StudentName?> (<?=$studentss->FatherName?>)</option>
																								<?php  } ?>
												</select>
											
										</div>
									</div>		
								
								<div class="form-group-separator">
								</div>
								
								</br>
								<div class="form-group pull-right">
								<input  type="hidden" name="sectionid" value="<?=$sectionid?>" />  
								 <input  type="submit" name="Present" value="Present" class="btn btn btn-info btn-single "  onclick="selectAll('m-selectable',true)"/>   
								<!-- <input  type="submit" name="Absent" value="Absent" class="btn btn btn-info btn-single "/>-->
								  <input  type="submit" name="Halfday" value="Halfday" class="btn btn btn-info btn-single " onclick="selectAll('m-selectable',true)"/>
								 <!-- <input  type="submit" name="Blank" value="Blank" class="btn btn btn-info btn-single " onclick="selectAll('m-selectable',true)"/>-->
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
	
<?php } ?>