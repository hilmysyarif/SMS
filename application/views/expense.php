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
												Expense
											</div>
										<div class="panel-body">
												<form role="form" class="form-horizontal" action="<?=base_url();?>transaction/insert_expense" method="post">
												
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
																		<label class="control-label col-sm-4 ">Supplier</label>
																		
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
																				<select class="form-control " required id="s2example-2" name="supplier">
																					<option></option>
																				
															<?php foreach($supplier as $supplier){ ?>
															<option  value="<?=$supplier->SupplierId?>" ><?=$supplier->SupplierName?> </option>
																													<?php  } ?>
																												</optgroup>
																											
																				</select>
																			</div>	
																	</div>
																	
																	<div class="form-group">
																			<label class="control-label col-sm-4 ">Amount</label>
																				<div class="col-sm-8">
																					<input type="text" required class="form-control" name="amount" value=""  placeholder="">
																				</div>	
																		</div>
																		
																		<div class="form-group">
																	<label class="control-label col-sm-4 ">Date Of Expense</label>
																	
																			<div class="col-sm-8">
																			<div class="date-and-time">
																				<input type="text" required class="form-control datepicker" data-format="D, dd MM yyyy" name="doe">
																				<input type="text" class="form-control timepicker" data-template="dropdown" data-show-seconds="true" data-default-time="11:25 AM" data-show-meridian="true" data-minute-step="5" data-second-step="5" name="toe"/>
																			</div>
																		</div>	
																</div>
																
																<div class="form-group">
																<label class="control-label col-sm-4 ">Expense Remark</label>
																<div class="col-sm-8">
																<textarea class="form-control" required name="expense_remark"></textarea>
																</div>
																</div>
																
																<div class="form-group">
																<label class="control-label col-sm-4 ">Amount Paid</label>
																<div class="col-sm-2">
																<input type="checkbox" name="amount_paid" value="Yes"/> 
																</div>
																<label class="control-label col-sm-3 ">Payment</label> 
																<div class="col-sm-3">
																<input type="text" class="form-control" name="payment" value="" id="payment" placeholder=""/>
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
																	<label class="control-label col-sm-4 ">Date Of Payment</label>
																	
																			<div class="col-sm-8">
																			<div class="date-and-time">
																				<input type="text" class="form-control datepicker" data-format="D, dd MM yyyy" name="dop">
																				<input type="text" class="form-control timepicker" data-template="dropdown" data-show-seconds="true" data-default-time="11:25 AM" data-show-meridian="true" data-minute-step="5" data-second-step="5" name="top"/>
																			</div>
																		</div>	
																</div>
																
																<div class="form-group">
																<label class="control-label col-sm-4 ">Payment Remark</label>
																<div class="col-sm-8">
																<textarea class="form-control" name="payment_remark"></textarea>
																</div>
																</div>
																		
																	<div class="form-group pull-right" >
																	<input type="submit" class="btn btn-info btn-single " name="add"value="Add">
																	</div>
														</form>
												
										</div>
							</div>
								<!--Select student ends-->
								
							
											
								
										
					</div>

			<div class="col-md-8">
					<!--Select fee list starts-->
					<?php if(isset($expenseid)){?>
						<div class="panel panel-color panel-gray">
										<div class="panel-heading">
											Payment List 
										</div>
								<div class="panel-body">
												<table class="table table-bordered table-striped" id="example-4">
														<thead>
															<tr>
																<th>Receipt No</th>
																<th>Account</th>
																<th>Amount Paid</th>
																<th>Date Of Payment</th>
																<th><i class="fa fa-times"></i></th>
																
															</tr>
														</thead>
													 
														
													 
														<tbody>
														<?php foreach($payment_list as $payment_list){?>
															<tr>
																<td><?=$payment_list->TransactionId?></td>
																<td><?=$payment_list->AccountName?></td>
																<td><?=$payment_list->TransactionAmount?> INR</td>
																<td><?=date("d M Y,h:ia",$payment_list->TransactionDate)?></td>
																<td><i class="fa fa-times"></i></td>
															
																
															</tr>
															<?php } ?>
														</tbody>
												</table>
									<?php  if($Balance>0) { ?>
			<div class="row">
				<div class="alert alert-info">
				Total Amount remaining : <?php echo "<b>$Balance INR</b>"; ?>
				</div>
			</div>
		
											<form role="form" class="form-horizontal" action="<?=base_url();?>transaction/makeexpensepayment" method="post">
											
											<input type="hidden" name="expenseid" value="<?=$expenseid?>" >
													<div class="form-group">
																			<label class="control-label col-sm-4 ">Amount</label>
																				<div class="col-sm-8">
																					<input type="text" class="form-control" name="amount" value="" id="mother_name" placeholder="">
																				</div>	
																		</div>
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Account </label>
																	
																			<script type="text/javascript">
																				jQuery(document).ready(function($)
																				{
																					$("#s2example-4").select2({
																						placeholder: 'Select Account...',
																						allowClear: true
																					}).on('select2-open', function()
																					{
																						// Adding Custom Scrollbar
																						$(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
																					});
																					
																				});
																			</script>
																				<div class="col-sm-8">
																					<select class="form-control " id="s2example-4" name="account">
																						<option></option>
																						<optgroup label="Select">
																				<?php foreach($account as $account1){ ?>
															<option  value="<?=$account1->AccountId?>"><?=$account1->AccountName?> Balance : <?=$account1->OpeningBalance+$account1->AccountBalance?> INR </option>
																													<?php } ?>
																					</optgroup>
																					</select>
																			</div>	
																</div>
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Date Of Payment</label>
																	
																			<div class="col-sm-8">
																			<div class="date-and-time">
																				<input type="text" class="form-control datepicker" data-format="D, dd MM yyyy" name="dop">
																				<input type="text" name="top" class="form-control timepicker" data-template="dropdown" data-show-seconds="true" data-default-time="11:25 AM" data-show-meridian="true" data-minute-step="5" data-second-step="5" />
																			</div>
																		</div>	
																</div>
																
																<div class="form-group">
																	<label class="control-label col-sm-4 ">Remarks</label>
																	
																			<div class="col-sm-8">
																			<textarea class="form-control" name="remark"></textarea>
																		</div>	
																</div>
															<div class="form-group pull-right">
																<input type="submit" class="btn btn-info btn-single " name="add" value="Add Payment">
															</div>
											</form>
											<?php }else{?>
											<div class="row">
				<div class="alert alert-danger">
				No amount remaining!!
				</div>
			</div>
											<?php }?>
								</div>
						
						</div>
						<?php } ?>
						<!--Select fee list paid student starts-->
						<div class="panel panel-color panel-gray">
								<div class="panel-heading">
									<h3 class="panel-title">Expense List</h3>
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
											<th>For</th>
											<th>Supplier Name</th>
											<th>Amount</th>
											<th>Paid</th>
											<th>Expense Date</th>
											<th>Remarks</th>
											<th><i class="fa fa-dollar"></th>
											<th><i class="fa fa-times"></i></th>
											<th><i class="fa fa-file-text-o"></i></th>
											
										</tr>
									</thead>
								 
									
								 
									<tbody>
									<?php foreach($expense as $expense){?>
										<tr>
											<td><?=$expense->MasterEntryValue?></td>
											<td><?=$expense->SupplierName?></td>
											<td><?=$expense->ExpenseAmount?></td>
											<td><?=$expense->AmountPaid?></td>
											<td><?=date("d M Y,h:i a",$expense->ExpenseDate)?></td>
											<td><?=$expense->ExpenseRemarks?></td>
											<td><a href="<?=base_url();?>transaction/expense/<?=$expense->ExpenseId?>"><i class="fa fa-dollar"></i></a></td>
											<td><a href="<?=base_url();?>transaction/expense"><i class="fa fa-times"></i></a></td>
											<td><i class="fa fa-file-text-o"></i></td>
										</tr>
										<?php  } ?>
									</tbody>
								</table>
						</div>
					</div>
					<!--Select fee list paid student end-->
			</div>

    </div>
