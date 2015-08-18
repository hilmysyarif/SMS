 <!--php alert message-->
		<?php  if($this->session->flashdata('message_type')) { ?>
			<div class="row">
				<div class="alert alert-success">
				<strong><?=$this->session->flashdata('message')?></strong> 
				</div>
			</div>
		<?php }?>
	   <!--php alert message-->

<div class="row">
	<div class="col-sm-4">
			<div class="panel  panel-color panel-gray">
						<div class="panel-heading">
							<h3 class="panel-title">Select Option</h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
							</div>
						</div>
				<div class="panel-body">
						 <form role="form" class="form-horizontal" method="post" action="">
												<div class="form-group">
													<label class="col-sm-4 control-label" for="exam" >Exam</label>
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
																<select class="form-control " id="s2example-1" name="">
																	<option></option>
																	<?php foreach($exam as $exam){ ?>
																						<option  value="<?=$exam->ExamId?>-<?=$exam->SectionId?>" <?php if(empty($examid)==''){ echo (!empty($exam->SectionId==$examid) ? "selected" : ''); } ?> ><?=$exam->ExamName?> <?=$exam->ClassName?> <?=$exam->SectionName?></option>
																								<?php  } ?>
																
																</select>
															</div>	
												</div>
												<div class="form-group-separator"></div>
													<div class="form-group">
													<label class="col-sm-4 control-label" for="" >Co-Scholastic Area</label>
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
																<select class="form-control " id="s2example-2" name="">
																	<option></option>
																	
																
																</select>
															</div>	
												</div>
												<div class="form-group pull-right">
														<input  type="submit" name="submit" value="Get Student" class="btn btn btn-info btn-single "/>
												</div>
						</form>
				</div>
			</div>
	</div>
	
<div class="col-sm-8">
			<div class="panel  panel-color panel-gray">
						<div class="panel-heading">
							<h3 class="panel-title">Marks Entry</h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
							</div>
						</div>
				<div class="panel-body">
						 <form role="form" class="form-horizontal" method="post" action="">
												<div class="form-group">
													<label class="col-sm-4 control-label" for="exam" >Mahesh 2154652365</label>
														<script type="text/javascript">
																jQuery(document).ready(function($)
																{
																	$("#s3example-1").select2({
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
																<select class="form-control " id="s3example-1" name="">
																	<option></option>
																	<option  value="" >unit test 1st section A</option>
																
																</select>
															</div>	
												</div>
												<div class="form-group-separator"></div>
													<div class="form-group">
													<label class="col-sm-4 control-label" for="" >Ramesh 5487548754</label>
														<script type="text/javascript">
																jQuery(document).ready(function($)
																{
																	$("#s4example-2").select2({
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
																<select class="form-control " id="s4example-2" name="">
																	<option></option>
																	
																
																</select>
															</div>	
												</div>
												<div class="form-group pull-right">
														<input  type="submit" name="submit" value="Save" class="btn btn btn-info btn-single"/>
												</div>
						</form>
				</div>
			</div>
	</div>
	
</div>

	
	   
	
<?php //} ?>