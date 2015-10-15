<?php if(isset($examid)){ ?>
		<nav class="navbar navbar-default" role="navigation">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<i class="fa-bars"></i>
					</button>
					<a class="navbar-brand" href="javascript:;">Filter Your Search</a>
				</div>
			
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						
						<form action="<?=base_url();?>onlineexam/onlineexamreport/<?=$examid?>?search=studentreport" method="post" class="navbar-form navbar-left" role="search">
						<input type="hidden" name="action" value="studentreport"/>
						<input type="hidden" name="examid" value="<?=$examid?>"/>
						<div class="form-group">
							<input type="text" class="form-control col-xs-3" name="marksfrom" placeholder="Marks From">
						</div>
						<div class="form-group">
							<input type="text" class="form-control col-xs-3" name="marksto" placeholder="Marks To">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="studentname" placeholder="Student Name">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="rollno" placeholder="Student Roll No">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="resulttype" placeholder="Result Type">
						</div>
						<button type="submit" class="btn btn-white">Search</button>
					</form>
					</ul>
					
					
				</div>
				<!-- /.navbar-collapse -->
			</nav>
			
			<center><h3><?php echo (isset($examname[0]->exam_name) ? $examname[0]->exam_name : '');?> Student List</h3></center>
			<br />
			
			
			<div class="row">
			
				<div class="col-md-12">
			
					<div class="panel-group " id="accordion-test-2">
					<?php if(!empty($onlineexamstudent)){ $increm=1; foreach($onlineexamstudent as $onlineexamstudent){ ?>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapseOne-<?=$increm?>">
									Name: <?=isset($onlineexamstudent->StudentName) ? ucwords($onlineexamstudent->StudentName) : ''?> . RollNo: <?=isset($onlineexamstudent->AdmissionNo) ? ucwords($onlineexamstudent->AdmissionNo) : ''?> . Result: <?=isset($onlineexamstudent->online_student_status) ? ucwords($onlineexamstudent->online_student_status) : ''?> . Marks: <?=isset($onlineexamstudent->total_marks) ? ucwords($onlineexamstudent->total_marks) : ''?> . Total Qustion Attemp: <?=isset($onlineexamstudent->no_of_qus_attemp) ? ucwords($onlineexamstudent->no_of_qus_attemp) : ''?> . Total Qustion: <?php echo (isset($examname[0]->no_of_qustion) ? $examname[0]->no_of_qustion : '');?>.  
									</a>
								</h4>
							</div>
							<div id="collapseOne-<?=$increm?>" class="panel-collapse collapse ">
								<div class="panel-body">
									<div class="col-md-10">
									
									<?php if(isset($onlineexamstudent->online_qust_ans_id)){ $qustionid=explode(",",$onlineexamstudent->online_qust_ans_id); foreach($qustionid as $qustionid) { $qustion1=explode("-",$qustionid); 
									$qustioninfo=$this->utilities->get_masterval('qustion_ans_bank',$filter=array('qust_id'=>$qustion1[0]));  ?>
									
									<span>Qustion: <?php echo (isset($qustioninfo[0]->qustion) ? $qustioninfo[0]->qustion : '');?></span><br>
									<span>Answer: <?php echo (isset($qustion1[1]) ? $qustion1[1] : '');?></span> &nbsp&nbsp&nbsp <?php if((isset($qustion1[1]) ? $qustion1[1] : '')==(isset($qustioninfo[0]->answer) ? $qustioninfo[0]->answer : '')){ ?><span class="label label-secondary"><a class="fa-check"></a></span><?php }else{ ?><span class="label label-danger"><a class="fa-close"></a></span><?php } ?><br>
									<span>Correct Answer: <?php echo (isset($qustioninfo[0]->answer) ? $qustioninfo[0]->answer : '');?></span><br><br>
									
									
									
									<?php } } ?>
									</div>
									<div class="col-md-2">
									<ul class="list-group list-group-minimal">
										<li class="list-group-item">
											<span class="badge badge-roundless badge-primary"><?=isset($onlineexamstudent->no_of_qus_attemp) ? ucwords($onlineexamstudent->no_of_qus_attemp) : ''?></span>
											Total No Of Qustion Attemp
										</li>
										<li class="list-group-item">
											<span class="badge badge-roundless badge-info"><?=isset($onlineexamstudent->correct_ans) ? ucwords($onlineexamstudent->correct_ans) : ''?></span>
											Total No of Correct Answer
										</li>
										<li class="list-group-item">
											<span class="badge badge-roundless badge-danger"><?=isset($onlineexamstudent->wrong_ans) ? ucwords($onlineexamstudent->wrong_ans) : ''?></span>
											Total No Of Wrong Answer
										</li>
										<li class="list-group-item">
											<span class="badge badge-roundless badge-success"><?=isset($onlineexamstudent->total_marks) ? ucwords($onlineexamstudent->total_marks) : ''?></span>
											Marks
										</li>
										<li class="list-group-item">
											<span class="badge badge-roundless badge-warning"><?=isset($onlineexamstudent->online_student_status) ? ucwords($onlineexamstudent->online_student_status) : ''?></span>
											Result
										</li>
									</ul>
								</div></div>
							</div>
						</div>
				<?php $increm++;} }else{ ?>
							<div class="alert alert-danger" >Student List Is Empty !! </div>
									<?php } ?>
						
						
						
					</div>
			
				</div>
			
				
			
			</div>
			
			<?php }else{ ?>
			
			<nav class="navbar navbar-default" role="navigation">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<i class="fa-bars"></i>
					</button>
					<a class="navbar-brand" href="javascript:;">Filter Your Search</a>
				</div>
			
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						
						<form class="navbar-form navbar-left" action="<?=base_url();?>onlineexam/onlineexamreport?search=examreport" method="post" role="search">
						<input type="hidden" name="action" value="examreport"/>
						<div class="form-group">
								
									<script type="text/javascript">
										jQuery(document).ready(function($)
										{
											$("#s2example-5").select2({
											placeholder: 'Select Level',
											allowClear: true
											}).on('select2-open', function()
											{
											// Adding Custom Scrollbar
											$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
											});
										});
									</script>
										<div >
											<select class="form-control "  id="s2example-5" name="level">
												
												<option></option>
																			<?php $filter=array('MasterEntryName' => 'Level'); $user= $this->utilities->get_usertype($filter); ?>
																	<?php foreach($user as $usertype){ ?>
																	<option value="<?=$usertype->MasterEntryValue?>" <?php if(empty($ol_exam_id)==''){ echo (!empty($updateonlineexam[0]->online_exam_level==$usertype->MasterEntryValue) ? "selected" : ''); } ?>><?=$usertype->MasterEntryValue?></option>
																			<?php } ?>
																		
											</select>
										</div>	
							</div>
						<div class="form-group">
								
									<script type="text/javascript">
										jQuery(document).ready(function($)
										{
											$("#s2example-2").select2({
											placeholder: 'Select Class ...',
											allowClear: true
											}).on('select2-open', function()
											{
											// Adding Custom Scrollbar
											$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
											});
																	
										});
									</script>
										<div >
											<select class="form-control "  id="s2example-2" name="class" onchange="show_student_exam(this.value,0),show_subject(this.value,0)">
												<option></option>
													<?php foreach($class_info as $cls){ ?>
																	<option  value="<?=$cls->SectionId?>" <?php if(isset($ol_exam_id)){ echo (!empty($cls->SectionId==$updateonlineexam[0]->online_section_id) ? "selected" : ''); } ?> ><?=$cls->ClassName?> <?=$cls->SectionName?></option>
																			<?php  } ?>
											</select>
										</div>	
							</div>
						<div class="form-group">
								
									<script type="text/javascript">
										jQuery(document).ready(function($)
										{
										$("#s2example-4").select2({
										placeholder: 'Select Subject',
										allowClear: true
										}).on('select2-open', function()
										{
										// Adding Custom Scrollbar
										$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
										});
																	
										});
									</script>
										<div   id="show_subject">
											<select class="form-control "  id="s2example-4" name="subjectid1">
												<option></option>
												<option>Please Select Class First</option>
												<option  <?php if(isset($subject)){ ?> value="<?=$subject[0]->SubjectId?>"  selected <?php  }?> ><?php if(isset($subject)){ echo $subject[0]->SubjectName;}?> </option>
																
											</select>
										</div>	
							</div>
						<div class="form-group">
							<input type="text" class="form-control" name="examname" placeholder="Exam Name">
						</div>
						<div class="form-group">
							<input type="text" class="form-control datepicker" name="time" placeholder="Month/Year">
						</div>
						<button type="submit" class="btn btn-white">Search</button>
					</form>
					</ul>
					
					
				</div>
				<!-- /.navbar-collapse -->
			</nav>
			
			<center><h3>Online Exam List</h3></center>
			<br />
			
			
			<div class="row">
			
				<div class="col-md-12">
			
					<div class="panel-group collapsed" id="accordion-test-2">
					<?php if(!empty($onlineexamreport)){ $incr=1; foreach($onlineexamreport as $onlineexamreport){ ?>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapseOne-<?=$incr?>">
										<?=$onlineexamreport->exam_name?>
									</a>
								</h4>
							</div>
							
							<div id="collapseOne-<?=$incr?>" class="panel-collapse collapse ">
								<div class="panel-body">
									<div class="col-md-6">
									<h4><a  data-parent="#accordion-test-2" href="<?=base_url();?>onlineexam/onlineexamreport/<?=$onlineexamreport->online_exam_id?>" class="collapsed">
										Click To View Student Report
									</a></h4>
									<br>
									<span>Exam Name: <?=$onlineexamreport->exam_name?> .</span><br>
									<span>Class: <?=$onlineexamreport->ClassName?> <?=$onlineexamreport->SectionName?> .</span><br>
									<span>Subject: <?=$onlineexamreport->SubjectName?> .</span><br>
									<span>Date Of Exam: <?=date("d M Y,h:ia",$onlineexamreport->online_exam_date)?> .</span><br>
									<span>Cuttoff: <?=$onlineexamreport->online_cuttoff?>% .</span><br>
									<span>Max Marks: <?=$onlineexamreport->online_max_marks?> .</span><br>
									<span>Time Duration: <?=$onlineexamreport->online_ex_duration?> hr .</span><br>
									<span>Status: <?=$onlineexamreport->online_exam_status?> .</span><br>
									<span>Level: <?=$onlineexamreport->online_exam_level?> .</span><br>
									</div>
									<div class="col-md-6">
									<?php $filter=$onlineexamreport->online_exam_id; $onlineexaminfo=$this->utilities->get_onlineexamreport($filter);  ?>
									<ul class="list-group list-group-minimal">
										<li class="list-group-item">
											<span class="badge badge-roundless badge-primary"><?php echo (isset($onlineexaminfo[0]->total_student) ? $onlineexaminfo[0]->total_student : 0);?></span>
											Total No Of Student
										</li>
										<li class="list-group-item">
											<span class="badge badge-roundless badge-info"><?php echo (isset($onlineexaminfo[0]->total_pass) ? $onlineexaminfo[0]->total_pass : 0);?></span>
											Total No of Student Pass 
										</li>
										<li class="list-group-item">
											<span class="badge badge-roundless badge-danger"><?php echo (isset($onlineexaminfo[0]->total_fail) ? $onlineexaminfo[0]->total_fail : 0);?></span>
											Total No Of Student Fail
										</li>
										<li class="list-group-item">
											<span class="badge badge-roundless badge-success"><?php echo (isset($onlineexaminfo[0]->max_marks) ? $onlineexaminfo[0]->max_marks : 0);?></span>
											Highest Marks
										</li>
										<li class="list-group-item">
											<span class="badge badge-roundless badge-warning"><?php echo (isset($onlineexaminfo[0]->min_marks) ? $onlineexaminfo[0]->min_marks : 0);?></span>
											Lowest Marks
										</li>
									</ul>
								</div></div>
							</div>
							
						</div>
						
						<?php $incr++; } }else{ ?>
							<div class="alert alert-danger" >Exam List Is Empty!! </div>
									<?php } ?>
						
						
					</div>
			
				</div>
			
				
			
			</div>
			
			<?php } ?>