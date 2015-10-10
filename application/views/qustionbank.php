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

<div class="row">
	<div class="col-sm-12">
			<div class="panel  panel-color panel-gray">
						<div class="panel-heading">
							<h3 class="panel-title">Create Qustions And Answer</h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
							</div>
						</div>
			<div class="panel-body">
				<form role="form" id="taskForm" class="form-horizontal" method="post" action="<?=base_url();?>onlineexam/insert_qustionbank">
				<?php if(isset($qustionid)){ ?> <input type="hidden" name="qustionid" value="<?=$qustionid?>"/> <?php } ?>
					 <div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="" >Class</label>
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
										<div class="col-sm-8">
											<select class="form-control " required id="s2example-2" name="sectionid" onchange="show_student_exam(this.value,0),show_subject(this.value,0)">
												<option></option>
													<?php foreach($class_info as $cls){ ?>
																	<option  value="<?=$cls->SectionId?>" <?php if(isset($qustionid)){ echo (!empty($cls->SectionId==$qustionupdate[0]->class_id) ? "selected" : ''); } ?> ><?=$cls->ClassName?> <?=$cls->SectionName?></option>
																			<?php  } ?>
											</select>
										</div>	
							</div>
						</div>
												
						<div class="col-md-4">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="" >Subject</label>
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
										<div class="col-sm-8"  id="show_subject">
										<select class="form-control " required id="s2example-4" name="subjectid1">
												<option></option>
												<option  <?php if(isset($subject)){ ?> value="<?=$subject[0]->SubjectId?>"  selected <?php  }?> ><?php if(isset($subject)){ echo $subject[0]->SubjectName;}?> </option>
																
											</select>
										</div>	
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="" >Level</label>
									<script type="text/javascript">
										jQuery(document).ready(function($)
										{
										$("#s2example-5").select2({
										placeholder: 'Select ...',
										allowClear: true
										}).on('select2-open', function()
										{
										// Adding Custom Scrollbar
										$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
										});
																	
										});
									</script>
										<div class="col-sm-8"  id="show_subject">
											<select class="form-control " required id="s2example-5" name="level">
												<option></option>
												<?php $filter=array('MasterEntryName' => 'Level'); $user= $this->utilities->get_usertype($filter); ?>
																	<?php foreach($user as $usertype){ ?>
																	<option value="<?=$usertype->MasterEntryValue?>" <?php if(empty($qustionid)==''){ echo (!empty($qustionupdate[0]->qust_level==$usertype->MasterEntryValue) ? "selected" : ''); } ?>><?=$usertype->MasterEntryValue?></option>
																			<?php } ?>
																
											</select>
										</div>	
							</div>
						</div>
					</div>
							<div class="form-group-separator"></div>
							
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label col-sm-1 ">Qustion</label>
									<div class="col-sm-11">
										<textarea required name="qustion" class="form-control ckeditor" rows="10"><?php echo (isset($qustionupdate[0]->qustion) ? $qustionupdate[0]->qustion : '');?></textarea>
									</div>
							</div>
						</div>
					</div>
																
						<div class="form-group-separator"></div>
					
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="col-xs-1 control-label">Option</label>
								<?php if(isset($qustionupdate[0]->qus_option)){ $option=explode(",",$qustionupdate[0]->qus_option); $count=1; foreach($option as $option){ $option1=explode("-",$option); if($count <=1){ ?>
								<div>
									<div class="col-xs-6 ">
										<input type="text" required  class="form-control" name="option[]" placeholder="Option" value="<?php echo (isset($option1[1]) ? $option1[1] : '');?>"/>
									</div>
									
									<div class="col-xs-1">
										<button type="button" class="btn btn-default addButton"><i class="fa fa-plus"></i></button>
									</div>
								</div>
								<?php }else{ ?>
								<div  id="remove<?=$count-1?>">
									<div class="col-xs-6 col-xs-offset-1">
										<input type="text" required  class="form-control" name="option[]" placeholder="Option" value="<?php echo (isset($option1[1]) ? $option1[1] : '');?>"/>
									</div>
									
									<div class="col-xs-1">
										<button type="button"  onclick="testing('remove<?=$count-1?>')" class="btn btn-default removeButton"><i class="fa fa-minus"></i></button>
									</div>
								</div>
								<?php } $count++; }}else{?>
								
								
								<div > 
									<div class="col-xs-6">
										<input type="text" required  class="form-control" name="option[]" placeholder="Option" value=""/>
									</div>
									
									<div class="col-xs-1">
										<button type="button" class="btn btn-default addButton"><i class="fa fa-plus"></i></button>
									</div>
								</div>
								<?php } ?>
							</div>
	
							<div class="form-group hide " id="taskTemplate">
								<div class="col-xs-6 col-xs-offset-1">
									<input type="text" class="form-control" name="option[]" placeholder="Option" />
								</div>
								
								<div class="col-xs-1">
									<button type="button" name="remove" onclick="testing(this.id)" class="btn btn-default removeButton"><i class="fa fa-minus"></i></button>
								</div>
							</div>
						</div>
					</div>
																
						<div class="form-group-separator"></div>
						
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label col-sm-1 ">Answer</label>
									<div class="col-sm-11">
										<input type="text" required class="form-control" id="field-1" placeholder=" Answer" name="answer" value="<?php echo (isset($qustionupdate[0]->answer) ? $qustionupdate[0]->answer : '');?>">
									</div>
							</div>
						</div>
					</div>
																
						<div class="form-group-separator"></div>
											
					<div class="row">
					
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label col-sm-1 ">Qus/Ans Description</label>
									<div class="col-sm-11">
										<textarea name="qusansdescription" required class="form-control ckeditor" rows="10"><?php echo (isset($qustionupdate[0]->qust_ans_description) ? $qustionupdate[0]->qust_ans_description : '');?></textarea>
									</div>
							</div>
						</div>
						
					</div>
						<div class="form-group-separator"></div>
											
					<div class="row">
					
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label col-sm-1 ">Solution</label>
									<div class="col-sm-11">
										<textarea name="solution" required class="form-control ckeditor" rows="10"><?php echo (isset($qustionupdate[0]->qust_solution) ? $qustionupdate[0]->qust_solution : '');?></textarea>
									</div>
							</div>
						</div>
						
					</div>
						<div class="form-group-separator"></div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label col-sm-1 ">Qustion Status</label>
									<div class="col-sm-11">
										<div class="form-block">
											<label class="control-label col-sm-2 ">Active	
												<input  type="radio" class="cbr cbr-secondary" required name="qustionstatus" <?=(isset($qustionupdate[0]->qust_status)&&$qustionupdate[0]->qust_status=='Active')?"checked":""?> value="Active"></label>
											<label class="control-label col-sm-2 ">Inactive
												<input type="radio" required class="cbr cbr-red" name="qustionstatus" <?=(isset($qustionupdate[0]->qust_status)&&$qustionupdate[0]->qust_status=='Inactive')?"checked":""?> value="Inactive">
											</label>
											
										</div>
									</div>
							</div>
						</div>
					</div>
						<div class="form-group-separator"></div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group pull-right">
								<input  type="submit" name="save" value="Finish" class="btn btn btn-info btn-single "/>
							</div>
						</div>
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
									<h3 class="panel-title">Qustions And Answer List</h3>
							</div>
								<?php if(!empty($qustionlist)){ $sno=1; foreach($qustionlist as $qustionlist){  ?>
								
									<div class="panel panel-default  collapsed"><!-- Add class "collapsed" to minimize the panel -->
										<div class="panel-heading">
											<h3 class="panel-title"><?=$sno?>. <?=$qustionlist->qustion?></h3>
											<div class="panel-options">
									
												<a href="#" data-toggle="panel">
													<span class="collapse-icon">&ndash;</span>
													<span class="expand-icon">+</span>
												</a>
												
												<a href="<?=base_url();?>Onlineexam/qustionbank/<?=$qustionlist->qust_id?>" >
													<i class="fa-rotate-right"></i>
												</a>
												
												<a <a onClick="return confirm('Are you sure to delete this ? This will delete all the related records ')" href="<?=base_url();?>Onlineexam/delete/qustion_ans_bank/qust_id/<?=$qustionlist->qust_id?>"  >
													&times;
												</a>
											</div>
										</div>
						
											<div class="panel-body">
							
												<div class="col-md-9">
												<p>Class: <?=$qustionlist->ClassName?> <?=$qustionlist->SectionName?> . Subject: <?=$qustionlist->SubjectName?> . Level: <?=$qustionlist->qust_level?>.</p>
												<p>Qustion: <?=$qustionlist->qustion?></p>
												<p>Options: <?=$qustionlist->qus_option?> </p>
												<p>Answer: <?=$qustionlist->answer?> . </p>
												<p>Qustion/Answer Description: <?=$qustionlist->qust_ans_description?>. </p>
												<p>Solution: <?=$qustionlist->qust_solution?>. </p>
												<p>Qustion Status: <?=$qustionlist->qust_status?>. </p>
			
												</div>
												<div class="col-md-3">
									<ul class="list-group list-group-minimal">
										<li class="list-group-item">
											<span class="badge badge-roundless badge-primary"><?=$qustionlist->toal_count_hit?></span>
											Total No Of Time Qustion Hitt
										</li>
										<li class="list-group-item">
											<span class="badge badge-roundless badge-info"><?=$qustionlist->correct_hit?></span>
											Total No Of Time Correct Hitt
										</li>
										<li class="list-group-item">
											<span class="badge badge-roundless badge-danger"><?=$qustionlist->wrong_hit?></span>
											Total No Of Time Wrong Hitt
										</li>
										<li class="list-group-item">
											<span class="badge badge-roundless badge-success"><?=$qustionlist->doc?></span>
											Date Of Create
										</li>
										
									</ul>
								</div>
											</div>
									</div>
									<?php $sno++; }}else{?>
									<div class="alert alert-danger" >Qustion List Is Empty!! </div>
									<?php } ?>
					
					
					
						</div>
					</div>
					
</div>

	<script>
	
	
 bookIndex=<?=$count?>;
$(document).ready(function() {
	
   $(".addButton").click(function() {
			
            var $template = $('#taskTemplate'),
                $clone    = $template
                                .clone()
                                .removeClass('hide')
                             //  .removeAttr('id')
								.insertBefore($template);

            $clone
                
                .find('[name="remove"]').attr('id', 'remove' + bookIndex + '').end();
				 $clone.attr('id', 'remove'+bookIndex).end();
                
            bookIndex++;
        });
	});
function testing(m){
			
			 var row=document.getElementById(m).remove();
		}

	
	</script>