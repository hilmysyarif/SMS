<div class="main-content">	
	<div class="page-title">
				
				<div class="title-env">
					<h1 class="title">Permission</h1>
					<p class="description">Manage your User Permission </p>
				</div>
				
					<div class="breadcrumb-env">
					
								<ol class="breadcrumb bc-1">
									<li>
							<a href="javascript:;"><i class="fa-home"></i>Home</a>
						</li>
								
							<li class="active">
						
										<strong>Permission</strong>
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
			<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
										<div class="panel-heading">
											Set Permission
										</div>
									<div class="panel-body">
											<form role="form" class="form-horizontal" action="<?=base_url();?>master/insert_permission" method="post">
											<?php if(empty($page_name)==''){ ?>
														<input type="hidden" name="id" value="<?=$user_type?>">
											<?php } ?>
																<div class="form-group">
																	<label class="control-label col-sm-4 ">User Type</label>
																	<?php if(empty($page_name)==''){ ?><span><?php foreach($usertype as $usertype){ if($user_type==$usertype->MasterEntryId){ echo $usertype->MasterEntryValue;}else{} } ?></span> <?php }else{ ?>
																			<script type="text/javascript">
																				jQuery(document).ready(function($)
																				{
																					$("#s2example-1").select2({
																						placeholder: 'Select your country...',
																						allowClear: true
																					}).on('select2-open', function()
																					{
																						// Adding Custom Scrollbar
																						$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																					});
																					
																				});
																			</script>
																	<div class="col-sm-8">
																		<select class="form-control " id="s2example-1" name="user_type">
																			<option></option>
																			<optgroup label="Select">
																	<?php foreach($usertype as $usertype){ ?>
																	<option value="<?=$usertype->MasterEntryId?>" ><?=$usertype->MasterEntryValue?></option>
																			<?php } ?>
																		</optgroup>
																		</select>
																</div>	
<?php }?>
																		
																</div>
																<?php if(empty($page_name)==''){ ?> 
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Select Pages</label>
																	
																			<script type="text/javascript">
																				jQuery(document).ready(function($)
																				{
																					$("#s2example-1").select2({
																						placeholder: 'Select your country...',
																						allowClear: true
																					}).on('select2-open', function()
																					{
																						// Adding Custom Scrollbar
																						$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																					}); 
																					
																				});
																			</script>
																	<div class="col-sm-8">
																		<select class="form-control " id="s2example-1" name="pages[]" multiple>
																			<option></option>
																			<optgroup label="Select">
																	<?php foreach($page_name as $pagename){ ?>
																	<option value="<?=$pagename->PageNameId?>" <?php if(empty($page_name)==''){ $page_id=$permission_page[0]->PermissionString; $page_id=explode(',',$page_id); foreach($page_id as $val){ echo (!empty($val==$pagename->PageNameId) ? "selected" : ''); }} ?>><?=$pagename->PageName?></option>
																			<?php } ?>
																		</optgroup>
																		</select>
																</div>	

																		
																</div>
															<input type="submit" class="btn btn-info btn-single " value="Save">	
																<?php } else{ ?>
																	
												<input type="submit" formaction="<?=base_url();?>master/permission" class="btn btn-info btn-single " value="Get">
												<?php } ?>
													</form>
											
													<div class="form-group-separator"></div>
									</div>
						</div>
					</div>
	
</div>