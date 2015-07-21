<div class="main-content">	
	<div class="page-title">
				
				<div class="title-env">
					<h1 class="title">Manage Header & Footer</h1>
					<p class="description">Manage your Header & footer </p>
				</div>
				
					<div class="breadcrumb-env">
					
								<ol class="breadcrumb bc-1">
									<li>
							<a href="javascript:;"><i class="fa-home"></i>Home</a>
						</li>
								
							<li class="active">
						
										<strong>Manage Header And Footer</strong>
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
					<div class="col-md-4">
						<div class="panel panel-default">
										<div class="panel-heading">
											Add 
										</div>
									<div class="panel-body">
											<form role="form" class="form-horizontal" action="<?=base_url();?>master/insert_header" method="post">
											<?php if(empty($id)==''){ ?>
														<input type="hidden" name="id" value="<?=$header_update[0]->HeaderId?>">
											<?php } ?>
																
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Type</label>
																	
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
																		<select class="form-control " id="s2example-1" name="type">
																			<option></option>
																			<optgroup label="Select">
																	<?php foreach($header_type as $headertype){ ?>
																	<option value="<?=$headertype->MasterEntryId?>" <?php if(empty($id)==''){ echo (!empty($header_update[0]->HRType==$headertype->MasterEntryId) ? "selected" : ''); } ?>><?=$headertype->MasterEntryValue?></option>
																			<?php } ?>
																		</optgroup>
																		</select>
																</div>	

																		
																</div>
																
																	<div class="form-group">
																		<label class="col-sm-4 control-label" for="field-1">Title</label>
																		
																		<div class="col-sm-8">
																			<input type="text" class="form-control" id="field-1" placeholder="Placeholder" name="title" value="<?php echo (isset($header_update[0]->HeaderTitle) ? $header_update[0]->HeaderTitle : '');?>">
																		</div>
																	</div>
																	
																	<div class="form-group">
				
					<textarea class="form-control ckeditor" rows="10" name="content">
						<?php echo (isset($header_update[0]->HeaderContent) ? $header_update[0]->HeaderContent : '');?>
					</textarea>
					
				</div>
																	
																	
																	
									<input type="submit" class="btn btn-info btn-single " value="Add">
													</form>
											
													<div class="form-group-separator"></div>
									</div>
						</div>
					</div>
	<div class="col-md-8">
		<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Header & Footer List</h3>
					
					<div class="panel-options">
						<a href="#" data-toggle="panel">
							<span class="collapse-icon">&ndash;</span>
							<span class="expand-icon">+</span>
						</a>
						<a href="#" data-toggle="remove">
							&times;
						</a>
					</div>
				</div>
				<div class="panel-body">
					
					<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						$("#example-1").dataTable({
							aLengthMenu: [
								[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]
							]
						});
					});
					</script>
					
						<table id="example-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Type</th>
											<th>Title</th>
											<th>Content</th>
											<th><i class="fa fa-edit"></i></th>
											<th><i class="fa fa-file-text-o"></th>
											
										</tr>
									</thead>
						
									<tfoot>
										<tr>
											<th>Type</th>
											<th>Title</th>
											<th>Content</th>
											<th><a href="#"><i class="fa fa-edit"></i></a></th>
											<th><a href="#"><i class="fa fa-file-text-o"></a></th>
											
										</tr>
									</tfoot>
						
									<tbody>
									<?php foreach($header as $header){ ?>
										<tr>
											<td><?=$header->MasterEntryValue?></td>
											<td><?=$header->HeaderTitle?> <?php if($header->HeaderDefault=="Yes"){?> <span class="label label-secondary"><?php  echo "Default";?></span><?php }else{?><span class="label label-red"><?php echo"Make Default";?></span><?php }?></td>
											<td><?=$header->HeaderContent?></td>
											<td><a href="<?=base_url();?>master/manageheaderandfooter/<?=$header->HeaderId?>"><i class="fa fa-edit"></a></i></td>
											<td><a href="<?=base_url();?>master/modal/<?=$header->HeaderId?>" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal-7"><i class="fa fa-file-text-o"></i></a></td>
											
										</tr>
									<?php } ?>
								</tbody>
						</table>
					
				</div>
			</div>
  </div>
</div>