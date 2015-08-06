<div class="row">
	<div class="col-sm-12">
			<div class="panel  panel-color panel-gray">
						<div class="panel-heading">
							<h3 class="panel-title">Select Month</h3>
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
													<label class="col-sm-4 control-label" for="" >Month Year</label>
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
																	<option  value="" >04-15</option>
																
																</select>
															</div>	
												</div>
												<div class="form-group-separator"></div>
												<div class="form-group pull-right">
														<input  type="submit" name="submit" value="Get" class="btn btn btn-info btn-single "/>
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
							<h3 class="panel-title">Staff Attendance Report of 04-2015</h3>
							<div class="panel-options">
							<span class="print-icon"><i class="fa fa-print"></i></span>
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
									
								</a>
							</div>
						</div>
						<div class="panel-body">
								<form role="form" class="form-horizontal">
								<div class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">
										<table cellspacing="0" class="table table-small-font table-bordered table-striped" >
											<thead>
												<tr>
													<th>Name</th>
													<th>1</th>
													<th>2</th>
													<th>3</th>
													<th>4</th>
													<th>5</th>
													<th>6</th>
													<th>7</th>
													<th>8</th>
													<th>9</th>
													<th>10</th>
													<th>11</th>
													<th>12</th>
													<th>13</th>
													<th>14</th>
													<th>15</th>
													<th>16</th>
													<th>17</th>
													<th>18</th>
													<th>19</th>
													<th>20</th>
												</tr>
											</thead>
										 
											<tfoot>
												<tr>
													<th>Name</th>
													<th>1</th>
													<th>2</th>
													<th>3</th>
													<th>4</th>
													<th>5</th>
													<th>6</th>
													<th>7</th>
													<th>8</th>
													<th>9</th>
													<th>10</th>
													<th>11</th>
													<th>12</th>
													<th>13</th>
													<th>14</th>
													<th>15</th>
													<th>16</th>
													<th>17</th>
													<th>18</th>
													<th>19</th>
													<th>20</th>
												</tr>
											</tfoot>
										 
											<tbody>
												<tr>
													<td>Harshlata 5456987821 (faculty)</td>
													<td>-</td>
													<td><span class="badge badge-secondary pull-right">P</span></td>
													<td>-</td>
													<td>-</td>
													<td>-</td>
														<td>-</td>
													<td><span class="badge badge-secondary pull-right">P</span></td>
													<td>-</td>
													<td>-</td>
													<td>-</td>
														<td>-</td>
													<td><span class="badge badge-secondary pull-right">P</span></td>
													<td>-</td>
													<td>-</td>
													<td>-</td>
														<td>-</td>
													<td><span class="badge badge-secondary pull-right">P</span></td>
													<td>-</td>
													<td>-</td>
													<td>-</td>
												</tr>
											</tbody>
										</table>
									</div>	
								</form>
						</div>
					</div>
				</div>
		</div>	
	
<?php //} ?>