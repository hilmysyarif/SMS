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
					<div class="col-md-12">
						<div class="panel panel-color panel-gray">
							<div class="panel-heading">
									<h3 class="panel-title">Home Work List</h3>
							</div>
								<?php if(!empty($homework)){ $sno=1; foreach($homework as $homework){  ?>
								
									<div class="panel panel-default  collapsed"><!-- Add class "collapsed" to minimize the panel -->
										<div class="panel-heading">
											<h3 class="panel-title"><?=$sno?>. <?=isset($homework->ClassName)?$homework->ClassName:''?> <?=isset($homework->SectionName)?$homework->SectionName:''?>  <?=isset($homework->SubjectName)?$homework->SubjectName:''?>  <?php if(!empty($homework->dateofhomework)){echo date("d m Y",$homework->dateofhomework);}?></h3>
											<div class="panel-options">
									
												<a href="#" data-toggle="panel">
													<span class="collapse-icon">&ndash;</span>
													<span class="expand-icon">+</span>
												</a>
												
												<a href="<?=base_url();?>homework/createhomework/<?=isset($homework->classid)?$homework->classid:''?>/<?=isset($homework->sectionid)?$homework->sectionid:''?>/<?=isset($homework->subjectid)?$homework->subjectid:''?>/<?=isset($homework->dateofhomework)?$homework->dateofhomework:''?>" >
													<i class="fa-rotate-right"></i>
												</a>
												
												<a onClick="return confirm('Are you sure to delete this ? This will delete all the related records ')" href="<?=base_url();?>homework/delete/<?=isset($homework->classid)?$homework->classid:''?>/<?=isset($homework->sectionid)?$homework->sectionid:''?>/<?=isset($homework->subjectid)?$homework->subjectid:''?>/<?=isset($homework->dateofhomework)?$homework->dateofhomework:''?>"  >
													<span class="collapse-icon">&times;</span>
												</a>
											</div>
										</div>
						
											<div class="panel-body">
							
												<div class="col-md-9">
												<p>Class: <?=isset($homework->ClassName)?$homework->ClassName:''?>  . Section: <?=isset($homework->SectionName)?$homework->SectionName:''?> . Subject: <?=isset($homework->SubjectName)?$homework->SubjectName:''?>.</p>
												<p>Date Of HomeWork: <?php if(!empty($homework->dateofhomework)){echo date("d m Y",$homework->dateofhomework);}?></p>
												<p>Home Work Description: <?=isset($homework->homework)?$homework->homework:''?> </p>
												<p>Date Of Submission: <?php if(!empty($homework->dosubmission)){echo date("d m Y",$homework->dosubmission);}?> . </p>
												
												
			
												</div>
												<div class="col-md-3">
									<ul class="list-group list-group-minimal">
										<li class="list-group-item">
											<span class="badge badge-roundless badge-primary"><?=isset($homework->createdby)?$homework->createdby:''?></span>
											Create By:
										</li>
										<li class="list-group-item">
											<span class="badge badge-roundless badge-info"><?=isset($homework->createdon)?$homework->createdon:''?></span>
											Date Of Create:
										</li>
										<li class="list-group-item">
											<span class="badge badge-roundless badge-danger"><?=isset($homework->updatedby)?$homework->updatedby:''?></span>
											Updated By :
										</li>
										<li class="list-group-item">
											<span class="badge badge-roundless badge-success"><?=isset($homework->updatedon)?$homework->updatedon:''?></span>
											Date Of Update:
										</li>
										
									</ul>
								</div>
											</div>
									</div>
									<?php $sno++; }}else{?>
									<div class="alert alert-danger" >Home Work List Is Empty!! </div>
									<?php } ?>
					
					
					
						</div>
					</div>
					
</div>

