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
					<!--Select student starts-->
							<div class="panel panel-color panel-gray">
											<div class="panel-heading">
												Income
											</div>
										<div class="panel-body">
												<form role="form" class="form-horizontal" action="<?=base_url();?>transaction/insert_income" method="post">
												
												<div class="form-group">
																		<label class="control-label col-sm-4 ">For</label>
																		
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
																				<select class="form-control " required id="s2example-1" name="for">
																					<option></option>
																				
														<?php foreach($for as $for){ ?>
															<option  value="<?=$for->MasterEntryId?>"><?=$for->MasterEntryValue?> </option>
																													<?php } ?>
																												</optgroup>
																											
																				</select>
																			</div>	
																	</div>
																	
																	
																	
																	<div class="form-group">
																			<label class="control-label col-sm-4 ">Amount</label>
																				<div class="col-sm-8">
																					<input type="text" required class="form-control" name="amount" value="" id="mother_name" placeholder="">
																				</div>	
																		</div>
																	
																<div class="form-group">
																		<label class="control-label col-sm-4 ">Account</label>
																		
																			<script type="text/javascript">
																						jQuery(document).ready(function($)
																						{
																							$("#s2example-3").select2({
																								placeholder: 'Select...........',
																								allowClear: true
																							}).on('select2-open', function()
																							{
																								// Adding Custom Scrollbar
																								$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																							});
																							
																						});
																				</script>
																			<div class="col-sm-8">
																				<select class="form-control " required id="s2example-3" name="account">
																					<option></option>
																				
														<?php foreach($account as $account2){ ?>
															<option  value="<?=$account2->AccountId?>"><?=$account2->AccountName?> Balance : <?=$account2->OpeningBalance+$account2->AccountBalance?> INR </option>
																													<?php } ?>
																												</optgroup>
																											
																				</select>
																			</div>	
																	</div>
																	
																	<div class="form-group">
																	<label class="control-label col-sm-4 ">Date Of Income</label>
																	
																			<div class="col-sm-8">
																			<div class="date-and-time">
																				<input type="text" required class="form-control datepicker" data-format="D, dd MM yyyy" name="doi">
																				<input type="text" name="toi" class="form-control timepicker" data-template="dropdown" data-show-seconds="true" data-default-time="11:25 AM" data-show-meridian="true" data-minute-step="5" data-second-step="5" />
																			</div>
																		</div>	
																</div>
																
																<div class="form-group">
																<label class="control-label col-sm-4 ">Payment Remark</label>
																<div class="col-sm-8">
																<textarea class="form-control" required name="payment_remark"></textarea>
																</div>
																</div>
																		
																	<div class="form-group pull-right" >
																	<input type="submit" class="btn btn-info btn-single " name="add" value="Add">
																	</div>
														</form>
												
										</div>
							</div>
								<!--Select student ends-->
								
							
											
								
										
					</div>
<?php //if(isset($admission)){?>
			<div class="col-md-8">
					<!--Select fee list starts-->
						
						<!--Select fee list paid student starts-->
						<div class="panel panel-color panel-gray">
								<div class="panel-heading">
									<h3 class="panel-title">Income List</h3>
									<div class="panel-options">
										<a href="#" data-toggle="panel">
											<span class="collapse-icon">&ndash;</span>
											<span class="expand-icon">+</span>
										</a>
										
									</div>
								</div>
						<div class="panel-body">
							<div class="table-responsive">	
								<table class="table table-bordered table-striped" id="example-4">
									<thead>
										<tr>
											<th>Receipt No</th>
											<th>From</th>
											<th>Account</th>
											<th>Amount</th>
											<th>Date</th>
											<th>Remarks</th>
											
											<th><i class="fa fa-times"></i></th>
											<th><i class="fa fa-print"></i></th>
											
										</tr>
									</thead>
								 
									
								 
									<tbody>
									<?php foreach($income as $income){?>
										<tr>
											<td><?=$income->TransactionId?></td>
											<td><?=$income->MasterEntryValue?></td>
											<td><?=$income->AccountName?></td>
											<td><?=$income->TransactionAmount?></td>
											<td><?=date("d M Y,h:ia",$income->TransactionDate)?></td>
											<td><?=$income->TransactionRemarks?></td>
											
											<td><i class="fa fa-times"></i></td>
											<td><i class="fa fa-print"></i></td>
										</tr>
										<?php  } ?>
									</tbody>
								</table>
							</div>	
						</div>
					</div>
					<!--Select fee list paid student end-->
			</div>
<?php //} ?>
    </div>
