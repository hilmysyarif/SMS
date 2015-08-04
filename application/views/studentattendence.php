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
					 <form role="form" class="form-horizontal" method="post" action="<?=base_url();?>admission/add_registration">
						<div class="form-group">
														<label class="col-sm-4 control-label" for="student_name" >Class</label>
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
															<select class="form-control " id="s2example-1" name="class">
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
													<input  type="submit" name="submit" value="Get Student" class="btn btn btn-info btn-single "/>
													</div>
						</form>
					</div>
</div>
</div>
</div>

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
					<div class="panel  panel-color panel-gray">
						<div class="panel-heading">
							<h3 class="panel-title">Student Attendence</h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
							</div>
						</div>
						<div class="panel-body">
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
												<option value="8">The Missing Thorns</option>
												<option value="9">Healing of Serpent</option>
												<option value="10">The Voyagers's Girlfriend</option>
												<option value="11">The Nothing of the Gate</option>
												<option value="12">Healing in the Scent</option>
												<option value="13">Final Twins</option>
												<option value="14">The Willing Rose</option>
												<option value="15">Thorn of Emperor</option>
												<option value="16" selected>The Predator's Pirates</option>
												<option value="17">The Lord of the Girl</option>
												<option value="18" selected>Flowers in the Spirit</option>
												<option value="19" selected>Healing in the Silence</option>
												<option value="20">Planet of Bridges</option>
											</select>
											
										</div>
									</div>		
								
								<div class="form-group-separator">
								</div>
								</br>
								<div class="form-group">
								       
								        <input  type="submit" name="submit" value="Present" class="btn btn btn-info btn-single "/>   
								 <input  type="submit" name="Absent" value="Absent" class="btn btn btn-info btn-single "/>
								  <input  type="submit" name="Halfday" value="Halfday" class="btn btn btn-info btn-single "/>
								  <input  type="submit" name="Blank" value="Blank" class="btn btn btn-info btn-single "/>
								   <input  type="submit" name="Holiday" value="Holiday" class="btn btn btn-info btn-single"/>
								</div>	
						</form>
						</div>
					</div>
				</div>
			</div>	
	
<?php //} ?>