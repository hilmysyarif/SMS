<div class="main-content">	
	<div class="page-title">
				
				<div class="title-env">
					<h1 class="title">General Setting</h1>
					<p class="description">Customize General Setting</p>
				</div>
				
					<div class="breadcrumb-env">
					
								<ol class="breadcrumb bc-1">
									<li>
							<a href="javascript:;"><i class="fa-home"></i>Home</a>
						</li>
								
							<li class="active">
						
										<strong>General Setting</strong>
								</li>
								</ol>
								
				</div>
					
			</div>

<?php  if($this->session->flashdata('message_type')) { ?>
<div class="row">
<div class="alert alert-success">
<strong><?=$this->session->flashdata('message')?></strong> 
</div>
</div>
<?php }?>
<?php if($school_info){?>
<div class="alert alert-info">Software start date once set cannot be updated any more!! </div> <?php } ?>
<div class="row">

				<div class="col-sm-12">
					
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">General Setting</h3>
							
						</div>
						<div class="panel-body">
							
							<form role="form" class="form-horizontal" action="<?=base_url();?>master/gs_insrt" method="post">
							<?php if($school_info){?><input type="hidden" name="id" value="<?=$school_info[0]->Id?>"><?php } ?>
								<div class="row">	
								   <div class="col-md-12">
										<div class="form-group">
											<label class="col-sm-2 control-label" for="field-1">School Name</label>
											
											<div class="col-sm-10">
												<input type="text" class="form-control" id="field-1" name="school_name" value="<?=$school_info[0]->SchoolName?>">
											</div>
										</div>
									</div>	
								</div>
								<div class="form-group-separator"></div>
									<div class="row">	
										<div class="form-group col-md-4">
												<label class="col-sm-4 control-label">Software Starting Date</label>
												
												<div class="col-sm-8">
													<div class="input-group">
														<input type="text" class="form-control datepicker" data-format="D, dd MM yyyy" name="soft_date" value="<?=$school_info[0]->SchoolStartDate?>">
														
														<div class="input-group-addon">
															<a href="#"><i class="linecons-calendar"></i></a>
														</div>
													</div>
												</div>
											</div>
									
												<div class="form-group col-md-4">
											<label class="col-sm-4 control-label" for="field-1">State</label>
											
											<div class="col-sm-8 ">
												<input type="text" class="form-control" id="field-1"  name="state" value="<?=$school_info[0]->State?>">
											</div>
										</div>
										<div class="form-group col-md-5">
											<label class="col-sm-4 control-label" for="field-1">Board</label>
											
											<div class="col-sm-7">
												<input type="text" class="form-control" id="field-1"  name="board" value="<?=$school_info[0]->Board?>">
											</div>
										</div>
									</div>
									<div class="form-group-separator"></div>
									<div class="row">	
									<div class="form-group col-md-4">
										<label class="col-sm-4 control-label" for="field-1">Address</label>
										
										<div class="col-sm-8">
										<textarea class="form-control" id="field-1"  name="address"><?=$school_info[0]->SchoolAddress?></textarea>
											
										</div>
									</div>
										<div class="form-group col-md-4">
											<label class="col-sm-4 control-label" for="field-1">Country</label>
											
											<div class="col-sm-8">
												<input type="text" class="form-control" id="field-1"  name="country" value="<?=$school_info[0]->Country?>">
											</div>
										</div>
										<div class="form-group col-md-5">
											<label class="col-sm-5 control-label" for="field-1">Affiliated By</label>
											
											<div class="col-sm-7">
												<input type="text" class="form-control" id="field-1"  name="affiliated" value="<?=$school_info[0]->AffiliatedBy?>">
											</div>
										</div>
									</div>
									<div class="form-group-separator"></div>
									<div class="row">
									<div class="form-group col-md-4">
											<label class="col-sm-4 control-label" for="field-1">City</label>
									
										<div class="col-sm-8">
											<input type="text" class="form-control" id="field-1"  name="city" value="<?=$school_info[0]->City?>">
										</div>
										</div>
										<div class="form-group col-md-4">
											<label class="col-sm-4 control-label" for="field-1">Mobile</label>
									
										<div class="col-sm-8">
											<input type="text" class="form-control" id="field-1"  name="mobile" value="<?=$school_info[0]->Mobile?>">
										</div>
										</div>
										
										<div class="form-group col-md-5">
											<label class="col-sm-4 control-label" for="field-1">Registration No</label>
											
											<div class="col-sm-7">
												<input type="text" class="form-control" id="field-1"  name="registration" value="<?=$school_info[0]->RegistrationNo?>">
											</div>
										</div>
										
										
										</div>
										
										<div class="row">
										<div class="form-group col-md-4">
											<label class="col-sm-4 control-label" for="field-1">District</label>
											
											<div class="col-sm-8">
												<input type="text" class="form-control" id="field-1"  name="district" value="<?=$school_info[0]->District?>">
											</div>
										</div>
										<div class="form-group col-md-4">
											<label class="col-sm-4 control-label" for="field-1">Alternate Mobile</label>
											
											<div class="col-sm-8">
												<input type="text" class="form-control" id="field-1"  name="alt_mobile" value="<?=$school_info[0]->AlternateMobile?>">
											</div>
										</div>
										<div class="form-group col-md-4">
											<label class="col-sm-4 control-label" for="field-1">Affiliation No</label>
											
											<div class="col-sm-8">
												<input type="text" class="form-control" id="field-1"  name="affi_no" value="<?=$school_info[0]->AffiliationNo?>">
											</div>
										</div>
										</div>
										
										<div class="row">
										<div class="form-group col-md-4">
											<label class="col-sm-4 control-label" for="field-1">PIN</label>
											
											<div class="col-sm-7">
												<input type="text" class="form-control" id="field-1"  name="pin" value="<?=$school_info[0]->PIN?>">
											</div>
										</div>
										<div class="form-group col-md-4">
											<label class="col-sm-4 control-label" for="field-1">Landline</label>
											
											<div class="col-sm-7">
												<input type="text" class="form-control" id="field-1"  name="landline" value="<?=$school_info[0]->Landline?>">
											</div>
										</div>
										<div class="form-group col-md-4">
											<label class="col-sm-4 control-label" for="field-1">Date of Establishment</label>
											
											<div class="col-sm-7">
												<input type="text" class="form-control" id="field-1"  name="doe" value="<?=$school_info[0]->DateOfEstablishment?>">
											</div>
										</div>
										</div>
										
										<div class="row">
										<div class="form-group col-md-4">
											<label class="col-sm-4 control-label" for="field-1">Email</label>
											
											<div class="col-sm-7">
												<input type="email" class="form-control" id="field-1"  name="email" value="<?=$school_info[0]->Email?>">
											</div>
										</div>
										<div class="form-group col-md-4">
											<label class="col-sm-4 control-label" for="field-1">FAX</label>
											
											<div class="col-sm-7">
												<input type="text" class="form-control" id="field-1"  name="fax" value="<?=$school_info[0]->Fax?>">
											</div>
										</div>
										
										<div class="form-group">
									
									<input type="submit" 
									class="btn btn-info btn-single " value="Save">
								</div>
										
										</div>
										
										<div class="form-group-separator"></div>
								</div>	
							</div>	
							</div>		
							</form>
							
						</div>
					