<?php  if($this->session->flashdata('message_type')) { ?>
<div class="row">
<div class="alert alert-success">
<strong><?=$this->session->flashdata('message')?></strong> 
</div>
</div>
<?php }?>

<div class="container">

<div class="panel panel-default" style="margin-top:90px">
						<div class="panel-heading">
							<h3 class="panel-title">Upload details</h3>
							
						</div>
						<div class="panel-body">
						
						<?php  if($this->session->flashdata('message_type')) { ?>
						<div class="row">
						<div class="alert alert-success">
						<strong><?=$this->session->flashdata('message')?></strong> 
						</div>
						</div>
						<?php }?>
						
						<?php  if($this->session->flashdata('category_error')) { ?>
						<div class="row">
						<div class="alert alert-danger">
						<strong><?=$this->session->flashdata('category_error')?></strong> 
						</div>
						</div>
						<?php }?>
						
						<?php if($school_info){?>
						<div class="alert alert-info" style="margin-top:20px">Select session date for school before uploading data (Mandatory)</div><?php } ?>
						
						<div class="col-lg-6 col-sm-6 col-md-6">
						<h3>Class and Section upload </h4>
						<h5 style="color:black ;margin-bottom:-10px;margin-top:50px">To Upload Excel file with .CSV extn</h5>
					
						<form class="form-horizontal well" style="margin-top:40px"action="<?php echo base_url(); ?>index.php/master/insert_class1/class" method="post" name="upload_excel" enctype="multipart/form-data">
						<input type="file" name="file" id="file" class="input-large">
						<button type="submit" id="submit" name="Import" class="btn btn-info btn-single" style="margin-top:20px">Upload</button>
						</form>
												
						</div>
						
						
						<div class="col-lg-6 col-sm-6 col-md-6">
						<h3>Student detail upload in English </h4>
						<h5 style="color:black;margin-bottom:-10px;margin-top:50px">To upload Excel file with .CSV extn</h5>
													
													
						<form class="form-horizontal well" style="margin-top:40px" action="<?php echo base_url(); ?>index.php/admission/ins_stu1" method="post" name="upload_excel" enctype="multipart/form-data">
						 <?php if(empty($var)==''){ ?>
														<input type="hidden" name="id" value="<?=$var[0]->RegistrationId?>">
											<?php } ?>
						
						
						<input type="file" name="file" id="file" class="input-large">
						<button type="submit" id="submit" name="Import" class="btn btn-info btn-single" style="margin-top:20px">Upload</button>
						</form>
						
						
						
						<h3>Student detail upload in Hindi </h4>
						<h4 style="color:black;margin-bottom:-10px;margin-top:50px">To upload Excel file with .CSV in extn</h4>
													
													
						<form class="form-horizontal well" style="margin-top:40px" action="<?php echo base_url(); ?>index.php/admission/student_info_hindi1" method="post" name="upload_excel" enctype="multipart/form-data">
						 <?php if(empty($var)==''){ ?>
														<input type="hidden" name="id" value="<?=$var[0]->RegistrationId?>">
											<?php } ?>
						
						
						<input type="file" name="file" id="file" class="input-large">
						<button type="submit" id="submit" name="Import" class="btn btn-info btn-single" style="margin-top:20px">Upload</button>
						</form>
						</div>
						 <div class="col-sm-12" >

						<a href="<?=base_url();?>master/acceptance" class="btn btn-primary btn-lg" style="margin-top:10px ;background-color:black;float:right">Next</a>
						</div>
												
						</div>
						</div>
						
	</div>					
						