<?php  if($this->session->flashdata('message_type')=='success') { ?>
			<div class="row">
				<div class="alert alert-success">
				<strong><?=$this->session->flashdata('message')?></strong><?php echo"<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>";?> 
				</div>
			</div>
<?php }?>
<?php  if($this->session->flashdata('message_type')=='error') { ?>
			<div class="row">
				<div class="alert alert-danger">
				<strong><?=$this->session->flashdata('message')?></strong><?php echo"<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>";?> 
				</div>
			</div>
<?php }?>

<div class="row">

	<div class="col-md-4">
		<?php if(!empty($id)){?>
		<div class="panel panel-color panel-gray">
			<div class="panel-heading">
			<?=ucwords($action)?> Book Return <?=isset($ReturnName)?ucwords($ReturnName):''?> (<?=isset($ReturnMobile)?ucwords($ReturnMobile):''?>)
			</div>
				<div class="panel-body">
					<form role="form" class="form-horizontal" action="<?=base_url();?>library/bookreturn" method="post">
					<input type="hidden" name="irto" value="<?=isset($action)?$action:''?>" />
					<input type="hidden" name="bookissueid" value="<?=isset($id)?$id:''?>" />
						<div class="form-group">
							<label class="control-label col-sm-4 ">Books</label>
								<script type="text/javascript">
												jQuery(document).ready(function($)
												{
											   $("#s2example-11").select2({
											placeholder: 'Select book',allowClear: true
											}).on('select2-open', function()
																							{
																								// Adding Custom Scrollbar
																								$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																							});
																							
																						});
								</script>
									
										<div class="col-sm-8">
											<select multiple class="form-control " id="s2example-11" name="bookreturnid[]">
												<option></option>
												<?php //foreach($return_booklist as $list){  ?>
												<option value=""></option>
												<?=!empty($NotReturnedBookList)?$NotReturnedBookList:''?>
											</select>
										</div>
						</div>
																	
						<div class="form-group">
							<label class="control-label col-sm-4 ">Date of Return</label>
								<div class="col-sm-8">
									
										<input type="text" required class="form-control datepicker" data-format="D, dd MM yyyy" name="dor">
										
									
								</div>	
						</div>
																							
																	
																	
						<div class="form-group pull-right">
							<input type="submit" class="btn btn-info btn-single " value="Return">
						</div>
					</form>
												
				</div>
		</div>
		<?php } ?>			
		<div class="panel panel-color panel-gray">
			<div class="panel-heading">
				Select Books To Issue To <?=ucwords($action)?>
			</div>
				<div class="panel-body">
					<form role="form" class="form-horizontal" action="<?=base_url();?>library/issuebook" method="post">
					<input type="hidden" name="to" value="<?=$action?>" />
						<div class="form-group">
							<label class="control-label col-sm-4 ">Books</label>
								<script type="text/javascript">
									jQuery(document).ready(function($)
									{
									$("#s2example-1").select2({
									placeholder: 'Select....',
									allowClear: true
									}).on('select2-open', function()
									{
									// Adding Custom Scrollbar
									$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
									});
									});
								</script>
									<div class="col-sm-8">
										<select multiple class="form-control " required id="s2example-1" name="bookid[]">
											<option></option>
												<?php foreach($book as $book){ ?>
                                                    <option value="<?=$book->BookId; ?>">(<?=$book->AccessionNo; ?>)&nbsp;&nbsp;&nbsp;<?=$book->BookName; ?> &nbsp;</option>
                                                                          <?php } ?>
										</select>
									</div>	
							</div>
																	
							<div class="form-group">
								<label class="control-label col-sm-4 ">Select <?=ucwords($action)?></label>
									<script type="text/javascript">
										jQuery(document).ready(function($)
										{
										$("#s2example-2").select2({
										placeholder: 'Select.......',
										allowClear: true
										}).on('select2-open', function()
										{
										// Adding Custom Scrollbar
										$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
										});
										});
									</script>
										<div class="col-sm-8">
											<select class="form-control " required id="s2example-2" name="issueto">
												<option></option>
													<?php foreach($selectbox as $selectbox){ ?>
						<option  value="<?=$selectbox->id?>" ><?=$selectbox->name?>&nbsp <br>( <?=isset($selectbox->FatherName)?$selectbox->FatherName:''?>&nbsp<?=$selectbox->Mobile?> )&nbsp;</option><?php } ?>
											</select>
										</div>
							</div>										
																	
																		
							<div class="form-group">
								<label class="control-label col-sm-4 ">Date of Issue</label>
									<div class="col-sm-8">
										
											<input type="text" required class="form-control datepicker" data-format="D, dd MM yyyy" name="doissue">
											
										
									</div>	
							</div>
																
							<div class="form-group">
								<label class="control-label col-sm-4 ">Remarks</label>
										<div class="col-sm-8">
											<textarea class="form-control" required name="remarks"></textarea>
										</div>
							</div>
																
																		
							<div class="form-group pull-right" >
								<input type="submit" class="btn btn-info btn-single " name="add" value="Issue">
							</div>
					</form>
												
				</div>
				
		</div>
	</div>

	<div class="col-md-8">
						
		<div class="panel panel-color panel-gray">
			<div class="panel-heading">
				<h3 class="panel-title">Listing all Issued Book To <?=ucwords($action)?></h3>
					<div class="panel-options">
						<a href="#" data-toggle="panel">
							<span class="collapse-icon">&ndash;</span>
							<span class="expand-icon">+</span>
						</a>
					</div>
			</div>
			<div class="panel-body">
				<table class="table table-bordered table-striped" id="example-4">
					<thead>
						<tr>
							<th>Issued Id</th>
							<th>Issued to</th>
							<th>Books</th>
							<th>Date of Issue</th>
							<th>Remarks</th>
							<th><i class="fa-mail-reply"></th>
							<th><i class="fa fa-times"></i></th>
						</tr>
					</thead>
									
					<tbody>
                         <?php  foreach($issuelist as $issuelist){ ?>
						<tr>
							<td><?=$issuelist->BookIssueId?></td>
							<td><?=$issuelist->Name?></br>(<?=$issuelist->Mobile?>)</td>
							<?php if(!empty($issuelist->Books)){  $listbook=explode(",",$issuelist->Books); }?>
							<td><?php foreach($listbook as $listbook1){ $filter=$listbook1; $bookname=$this->utilities->getbooks($filter); 
							     echo"(<b>";echo $bookname[0]->AccessionNo;echo"</b>)";echo"&nbsp";echo $bookname[0]->BookName; echo"&nbsp";echo"(";echo $bookname[0]->AuthorName;echo")"; if(!empty($issuelist->BookReturn)){ $listbookreturn=explode(",",$issuelist->BookReturn); foreach($listbookreturn as $listbookreturn1){ $listbookreturn2=explode("-",$listbookreturn1); $bookreturntime=date("d M Y, h:i",$listbookreturn2[1]); if($listbook1==$listbookreturn2[0]){echo"<span class=\"badge badge-success\">Returned on $bookreturntime</span>";}}} echo"<hr style=\"margin-top: 7px;margin-bottom: auto\">";}?></td>
							<td><?=date("d M Y, h:i",$issuelist->DOI)?></td>
							<td><?=$issuelist->Remarks?></td>
							<td><a href="<?=base_url();?>library/issuereturn/<?=$action?>/<?=$issuelist->BookIssueId?>"><i class="fa-mail-reply"></i></a></td>
							<td><a onClick="return confirm('Are you sure to delete this ? This will delete all the related records ')" href="<?=base_url();?>library/delete/bookissue/BookIssueId/<?=$issuelist->BookIssueId?>"  ><i class="fa fa-times"></i></a></td>
						</tr>
						 <?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
