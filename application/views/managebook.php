<?php  if($this->session->flashdata('message_type')=="success") { ?>
<div class="row">
<div class="alert alert-success">
<strong><?=$this->session->flashdata('message')?></strong> 
</div>
</div>
<?php }?>
<?php  if($this->session->flashdata('message_type')=="error") { ?>
<div class="row">
<div class="alert alert-danger">
<strong><?=$this->session->flashdata('message')?></strong> 
</div>
</div>
<?php }?>

<div class="row">
	<div class="col-md-4">
		<div class="panel panel-color panel-gray">
			<div class="panel-heading">
				Add Book List
			</div>
				<div class="panel-body">
					<form role="form" class="form-horizontal" id="addbookform"  method="post">
						<div class="form-group">
							<label class="control-label col-sm-4 ">Select Book</label>
								<script type="text/javascript">
												jQuery(document).ready(function($)
												{
											   $("#s2example-3").select2({
											placeholder: 'Select book',allowClear: true
											}).on('select2-open', function()
																							{
																								// Adding Custom Scrollbar
																								$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																							});
																							
																						});
								</script>
									<div class="col-sm-8">
										<select class="form-control " id="s2example-3" name="book">
												<option></option>
																					
										<?php foreach($booklist as $books){ ?>
                                    <option value="<?=$books->BookId?>"><?=$books->BookName?>&nbsp;&nbsp;(<?=$books->AuthorName?>)&nbsp;</option>
										<?php } ?>
																				
									</optgroup></select>
									</div>
						</div>
																	
						<div class="form-group">
							<label class="control-label col-sm-4 ">Accession No</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="accessionno" value="" id="accessionno" placeholder="">
								</div>	
						</div>		
																	
						<div class="form-group pull-right">
							<input type="hidden" name="token" id="token" value="<?=$Token?>" readonly>
									
							<input type="button" class="btn btn-info btn-single" onclick="addbooklist()"  value="Add">
						</div>
					</form>
												
				</div>
		</div>
		<div class="panel panel-color panel-gray">
			<div class="panel-heading">
				<h3 class="panel-title">Add Book </h3>
			</div>
				<div class="panel-body">
					<form role="form" class="form-horizontal" action="<?=base_url();?>library/insertbook" method="post">
								<?php if(!empty($updatebook)){?>
								<input type="hidden" name="bookid" value="<?=$bookid?>" /> <?php } ?>
						<div class="form-group">
							<label class="control-label col-sm-4 ">Subject</label>
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
									<select class="form-control " id="s2example-1" name="subject">
										<option></option>
																					
											<?php foreach($subject as $subjects){ ?>
											<option value="<?=$subjects->SubjectId?>" <?php if(!empty($bookid)){ echo (!empty($updatebook[0]->SubjectId==$subjects->SubjectId) ? "selected" : ''); } ?>><?=$subjects->SubjectName?></option>	
													<?php  } ?>
																													</optgroup>
																												
									</select>
								</div>	
						</div>
																		
																		
						<div class="form-group">
																			<label class="control-label col-sm-4 ">Purpose</label>
																				<script type="text/javascript">
																						jQuery(document).ready(function($)
																						{
																							$("#s2example-2").select2({
																								placeholder: 'Select',
																								allowClear: true
																							}).on('select2-open', function()
																							{
																								// Adding Custom Scrollbar
																								$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																							});
																							
																						});
								</script>
                   <div class="col-sm-8">
					 <select class="form-control " id="s2example-2" name="purpose">
						<option></option>
																					
						  <?php foreach($purpose as $purposes){ ?>
                               <option value="<?=$purposes->MasterEntryId?>" <?php if(!empty($bookid)){ echo (!empty($updatebook[0]->Purpose==$purposes->MasterEntryId) ? "selected" : ''); } ?>><?=$purposes->MasterEntryValue?></option>
																		   
                               <?php } ?>
							      </optgroup>
					          		</select>
										</div>	
										 </div>
											<div class="form-group">
											<label class="control-label col-sm-4 ">Book Name</label>
											<div class="col-sm-8">
                                            <input type="text" class="form-control" name="bookname" value="<?=isset($updatebook[0]->BookName)?$updatebook[0]->BookName:''?>" id="bookname" placeholder="Book Name">
                                            </div>	
										    </div>
																		
						                   	<div class="form-group">
											<label class="control-label col-sm-4 ">Author Name</label>
											<div class="col-sm-8">
                                            <input type="text" class="form-control" name="authorname" value="<?=isset($updatebook[0]->AuthorName)?$updatebook[0]->AuthorName:''?>" id="authorname" placeholder="Author Name">
											</div>	
											</div>
																		
									        <div class="form-group">
											<label class="control-label col-sm-4 ">Publisher</label>
											<div class="col-sm-8">
											<input type="text" class="form-control" name="publisher" value="<?=isset($updatebook[0]->Publisher)?$updatebook[0]->Publisher:''?>" id="publisher" placeholder="Publisher">
                                             </div>	
											</div>
																						
                                              <div class="form-group">
                                                <label class="control-label col-sm-4 ">Price</label>
                                                 <div class="col-sm-8">
                                                 <input type="text" class="form-control" name="price" value="<?=isset($updatebook[0]->Price)?$updatebook[0]->Price:''?>" id="price" placeholder="Price">
                                                  </div>	
                                                  </div>
											<div class="form-group pull-right">						
											<input type="submit" class="btn btn-info btn-single " value="Add">
											</div>
									</br>
                                   </form>
																
							<tbody>
					  
						<tr>
													
																			
					    </tr>
				     
																		
                     </tbody>
                    </table>
					</div>
												
			        </div>
											
					</div>

			<div class="col-md-8">
					<div class="panel panel-color panel-gray">
										<div class="panel-heading">
										  <div class="title">
										 
											<span>Add New Book List </span>
											
										</div>
										 </div>
								<div class="panel-body" >
								<div id="showpending">
								<table class="table table-bordered table-striped" id="example-4">
                                <thead>
                                <th>Book Name</th>
                                <th>Author Name</th>
							    <th>Accession No</th>
						        <th><i class="fa fa-times"></i></th>
								</tr>
								</thead>
					            <tbody >
							    <tr>
			                    <td><?php //echo $lists->BookName;?></td>
                                <td><?php //echo $lists->AuthorName;?></td>
								<td><?php //echo $lists->AccessionNo;?></td>
                                <td></td>
								</tr>
							    </tbody>
								
								</table>
								</div>
								<form role="form" class="form-horizontal" action="<?=base_url();?>library/confirmlist" method="post">
								
							   <div class="form-group">
                               <label class="control-label col-sm-4 ">Date</label>
																	
                                <div class="col-sm-8">
								<div class="date-and-time">
                                <input type="text" required class="form-control datepicker" name="date" data-format="D, dd MM yyyy">
								 </div>	
								</div>
								<br><br><br>
								<div class="form-group">
								<label class="control-label col-sm-4 ">Remarks</label>
								<div class="col-sm-8">
								<textarea required class="form-control" name="remarks"></textarea>
							    </div>	</div>
							    <div class="form-group pull-right">
								<input type="hidden" name="token" value="<?=$Token?>">
									
                                <input type="submit" class="btn btn-info btn-single " value="confirm">
								</div>
								</form>
								</div>
						
						</div>
						<br><br>
						<div class="panel panel-color panel-gray">
								<div class="panel-heading">
									<h3 class="panel-title">List All Books</h3>
									<div class="panel-options">
									<a href="<?=base_url();?>master/prints/listbook" target="_blank"><i class="fa fa-print"></i></a>
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
											<th>Book Name</th>
											<th>Author Name</th>
											<th>Publisher</th>
											<th>Purpose</th>
											<th>Subject</th>
											<th>Total Books</th>
											<th><i class="fa fa-edit"></i></th>
											
											
										</tr>
									</thead>

									<tbody>
									
									 <?php foreach($booklist as $lists){ ?>
										<tr>
											<td><?=$lists->BookName?></td>
											<td><?=$lists->AuthorName?></td>
											<td><?=$lists->Publisher?></td>
                                             <td><?=$lists->MasterEntryValue?></td>
									         <td><?=$lists->SubjectName?></td>
											 <?php $filter=$lists->BookId; $bookcount=$this->utilities->getbooktotal($filter);?>
											 <td><?=!empty($bookcount[0]->TotalBook)?$bookcount[0]->TotalBook:0?></td>  
					                         <td><a href="<?=base_url();?>library/managebook/<?=$lists->BookId?>"><i class="fa fa-edit"></i></a></td>
									    </tr>
									<?php 
									   
									   }
									?>
									</tbody>
								</table>
						</div>
					</div>
					</div>
			</div>

    </div>
