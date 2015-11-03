<div class="page-container" ><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	<!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
		<!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
		<!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
		<div class="sidebar-menu toggle-others fixed">
			
			<div class="sidebar-menu-inner">	
				<ul id="main-menu" class="main-menu">
					<!-- add class "multiple-expanded" to allow multiple submenus to open -->
					<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
				<div>
						
								<a href="<?=base_url();?>dashboard"  class="btn btn-icon btn-gray shortcut"><i class="fa fa-home" style="font-size:2em;"></i></a>
								
								<a href="<?=base_url();?>dashboard"  class="btn btn-icon btn-gray shortcut">
									<i class="fa fa-language" style="font-size:2em;"></i>
								</a>
								<a href="<?=base_url();?>dashboard"  class="btn btn-icon btn-gray shortcut">
									<i class="fa fa-lock" style="font-size:2em;"></i>
								</a>
								<?php  if(in_array('Calendar',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
								<a href="<?=base_url();?>master/calendar" class="btn btn-icon btn-gray shortcut">
									<i class="fa fa-calendar" style="font-size:2em;"></i>
								</a>
								<?php }?>
						</div>		
		
					<?php  if(in_array('FrontOffice',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>	
					<li class="">
						<a href="javascript:;">
							<i class="fa fa-desktop"></i>
							<span class="title">Front Office</span>
						</a>
						<ul>
						<?php  if(in_array('Call',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
							<li class="active">
								<a href="<?=base_url();?>frontoffice/call">
									<span class="title">Call & Follow-up</span>
								</a>
							</li>
						<?php } if(in_array('OCall',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
							<li>
								<a href="<?=base_url();?>frontoffice/ocall">
									<span class="title">Other Call</span>
								</a>
							</li>
							<?php } if(in_array('Enquiry',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
							<li>
								<a href="<?=base_url();?>frontoffice/enquiry">
									<span class="title">Enquiry</span>
								</a>
							</li>
							<?php } if(in_array('Complaint',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
							<li>
								<a href="<?=base_url();?>frontoffice/complaint">
									<span class="title">Complaint</span>
								</a>
							</li>
							<?php } if(in_array('Visitor',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
							<li>
								<a href="<?=base_url();?>frontoffice/visitor">
									<span class="title">Visitor Book</span>
								</a>
							</li>
							<?php } ?>
							
						</ul>
					</li>
					<?php } ?>
					
					<?php  if(in_array('AdmissionMenu',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
					<li class="">
						<a href="javascript:;">
							<i class="fa fa-graduation-cap"></i>
							<span class="title">Admission</span>
						</a>
						<ul>
						<?php  if(in_array('Registration',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
							<li class="active">
								<a href="<?=base_url();?>admission/registration">
									<span class="title">Registration</span>
								</a>
							</li>
							<?php } if(in_array('Admission',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
							<li >
								<a href="<?=base_url();?>admission/admission_student">
									<span class="title">Admission</span>
								</a>
							</li>
							<?php } if(in_array('Promotion',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
							<li>
								<a href="<?=base_url();?>admission/promotion">
									<span class="title">Promotion</span>
								</a>
							</li>
							<?php } if(in_array('UpdateFee',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
							<li>
								<a href="<?=base_url();?>admission/updatefee">
									<span class="title">Update Fee</span>
								</a>
							</li>
							<?php } if(in_array('AdmissionReport',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
							
							<li class="">
						<a href="javascript:;">
							<i class="linecons-cog"></i>
							<span class="title">Reports</span>
						</a>
						<ul>
							<li class="active">
								<a href="<?=base_url();?>admission/admissionreport">
									<span class="title">Admission Report</span>
								</a>
							</li>
						</ul>
					</li>
							<?php } ?>	
						</ul>
					</li>
					<?php } if(in_array('FeePayment',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
					<li>
					<a href="<?=base_url();?>payments/payment">
							<i class="fa fa-money"></i>	
							<span class="title">Fee Payment</span>
					</a>
					</li>
					<?php } if(in_array('Transaction',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
					<li class="">
						<a href="javascript:;">
							<i class="linecons-cog"></i>
							<span class="title">Transaction</span>
						</a>
						<ul>
						<?php  if(in_array('Expense',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
							<li class="active">
								<a href="<?=base_url();?>transaction/expense">
									<span class="title">Expense</span>
								</a>
							</li>
							<?php } if(in_array('Income',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
							<li>
								<a href="<?=base_url();?>transaction/income">
									<span class="title">Income</span>
								</a>
							</li>
							<?php }?>
						</ul>
					</li>
					<?php } if(in_array('Attendance',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
					<li class="">
						<a href="javascript:;">
							<i class="fa fa-bar-chart"></i>
							<span class="title">Attendance</span>
						</a>
						<ul>
						<?php  if(in_array('StaffAttendence',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
							<li class="active">
								<a href="<?=base_url();?>attendences/staffattendence">
									<span class="title">Staff Attendance</span>
								</a>
							</li>
							<?php } if(in_array('StudentAttendence',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
							<li>
								<a href="<?=base_url();?>attendences/studentattendence">
									<span class="title">Student Attendance</span>
								</a>
							</li>
							<?php } if(in_array('AttendanceReport',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
							<li class="">
								<a href="javascript:;">
									<i class="fa fa-area-chart"></i>
									<span class="title">Reports</span>
								</a>
						<ul>
						<?php  if(in_array('StaffAttendenceReport',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
							<li class="active">
								<a href="<?=base_url();?>attendences/staffattendancereport">
									<span class="title">Staff Attendance</span>
								</a>
							</li>
							<?php } if(in_array('StudentAttendanceReport',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
							<li>
								<a href="<?=base_url();?>attendences/studentattendancereport">
									<span class="title">Student Attendance</span>
								</a>
							</li>
							<?php } ?>
						</ul>
					</li>
							<?php } ?>
						</ul>
					</li>
					<?php } if(in_array('TransportMenu',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
					<li class="">
						<a href="javascript:;">
							<i class="fa fa-bus"></i>
							<span class="title">Transport</span>
						</a>
						<ul>
						<?php  if(in_array('Transport',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
							<li class="active">
								<a href="<?=base_url();?>transports/transport">
									<span class="title">Transport</span>
								</a>
							</li>
							<?php } if(in_array('TransportRoute',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
							<li>
								<a href="<?=base_url();?>transports/route">
									<span class="title">Transport Route</span>
								</a>
							</li>
							<?php } ?>
						</ul>
					</li>
					<?php } if(in_array('ExamMenu',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
					<li class="">
						<a href="javascript:;">
							<i class="fa fa-file-text"></i>
							<span class="title">Exam</span>
						</a>
						<ul>
						<?php  if(in_array('MarksSetUp',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
							<li class="active">
								<a href="<?=base_url();?>exam/markssetup">
									<span class="title">SetUp Exam</span>
								</a>
							</li>
							<?php } if(in_array('OnlineExamMenu',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
							<li>
								<a href="javascript:;">
									<i class=""></i>
										<span class="title">Online Exam SetUp</span>
								</a>
									<ul>
									<?php  if(in_array('onlineexamcreate',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
										<li class="active">
											<a href="<?=base_url();?>onlineexam/onlineexamcreate">
												<span class="title">Create Online Exam</span>
											</a>
										</li>
										<?php } if(in_array('Qustionbank',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
										<li class="">
											<a href="<?=base_url();?>onlineexam/qustionbank">
												<span class="title">Qustion Bank</span>
											</a>
										</li>
										<?php } if(in_array('OnlineExamList',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
										<li class="">
											<a href="<?=base_url();?>onlineexam/olineexamlist">
												<span class="title">Show Exam</span>
											</a>
										</li>
										<?php } if(in_array('onlineexamreport',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
										<li class="">
											<a href="<?=base_url();?>onlineexam/onlineexamreport">
												<span class="title">Report</span>
											</a>
										</li>	
										<?php } if(in_array('OnlineExamFeedBack',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
										<li class="">
											<a href="javascript:;">
												<span class="title">Feed Back</span>
											</a>
										</li>
										<?php } if(in_array('OnlineTestLink',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
										<li class="">
											<a target="blank" href="<?=base_url();?>onlineexam/preview/1/1">
												<span class="title">Online Test Link</span>
											</a>
										</li>
										<?php } ?>
											
									</ul>
							</li>
							<?php }if(in_array('ExamReport',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
							<li class="">
						<a href="javascript:;">
							<i class="fa fa-area-chart"></i>
							<span class="title">Reports</span>
						</a>
						<ul>
							<li class="active">
								<a href="<?=base_url();?>exam/examreport">
									<span class="title">ExamReport</span>
								</a>
							</li>
							
						</ul>
					</li>
							<?php } ?>
						</ul>
					</li>
					<?php } if(in_array('ManageStaff',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
					<li><a href="<?=base_url();?>managestaffs/managestaff">
						<i class="fa fa-users"></i>
									<span class="title">Manage Staff</span>
								</a>
					</li>
					<?php } if(in_array('Library',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
					<li class=" ">			
					<a href="javascript:;">
							<i class="fa fa-book"></i>
							<span class="title">Library</span>
						</a>
						<ul>
						<?php  if(in_array('ManageBook',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
							<li class="active">
								<a href="<?=base_url();?>library/managebook">
									<span class="title">Manage Books</span>
								</a>
							</li>
							<?php } if(in_array('IssueReturn',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
							<li>
								<a href="<?=base_url();?>library/issuereturn">
									<span class="title">Issue & Return</span>
								</a>
							</li>
							<?php } ?>
						</ul>
					</li>
					<?php } if(in_array('Dispatch&Recieving',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
					<li>			
					<a href="javascript:;">
							<i class="fa fa-exchange"></i>
							<span class="title">Dispatch & Receiving</span>
						</a>
						<ul>
						<?php  if(in_array('Dispatch',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
							<li class="active">
								<a href="<?=base_url();?>dispatchreceiving/dispatch">
									<span class="title">Dispatch</span>
								</a>
							</li>
							<?php } if(in_array('Receiving',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
							<li>
								<a href="<?=base_url();?>dispatchreceiving/receiving">
									<span class="title">Receiving</span>
								</a>
							</li>
							<?php } ?>
						</ul>
					</li>
					<?php } if(in_array('Stock',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
					<li class="">
						<a href="javascript:;">
							<i class="fa fa-shopping-cart"></i>
							<span class="title">Stock</span>
						</a>
						<ul>
						<?php  if(in_array('ManageStock',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
							<li class="active">
								<a href="javascript:;">
									<span class="title">Manage Stock</span>
								</a>
							</li>
							<?php } if(in_array('StockTransfer',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
							<li>
								<a href="javascript:;">
									<span class="title">Stock Transfer</span>
								</a>
							</li>
							<?php } if(in_array('PurchaseMaterial',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
							<li>
								<a href="javascript:;">
									<span class="title">Purchase Material</span>
								</a>
							</li>
							<?php } if(in_array('Supplier',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
							<li>
								<a href="javascript:;">
									<span class="title">Supplier</span>
								</a>
							</li>
							<?php } if(in_array('Purchase',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
							<li>
								<a href="javascript:;">
									<span class="title">Purchase</span>
								</a>
							</li>
							<?php } if(in_array('IssueMaterial',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
							<li>
								<a href="javascript:;">
									<span class="title">Issue Material</span>
								</a>
							</li>
							<?php } if(in_array('StockReportMenu',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
							<li class="">
								<a href="javascript:;">
									<i class="fa fa-area-chart"></i>
									<span class="title">Reports</span>
								</a>
								<ul>
								<?php  if(in_array('StockReport',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
									<li class="active">
										<a href="javascript:;">
											<span class="title">Stock Report</span>
										</a>
									</li>
									<?php } if(in_array('SchoolMaterialReport',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
									<li>
										<a href="javascript:;">
											<span class="title">School Material</span>
										</a>
									</li>
									<?php } if(in_array('IssueReport',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
									<li>
										<a href="javascript:;">
											<span class="title">Issue Report</span>
										</a>
									</li>
									<?php } if(in_array('PurchaseReport',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
									<li>
										<a href="javascript:;">
											<span class="title">Purchase Report</span>
										</a>
									</li>
									<?php } ?>
									
								</ul>
							</li>
							<?php } ?>
						</ul>
					</li>
					<?php } if(in_array('SMS',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>
						<li><a href="javascript:;">
						<i class="fa fa-envelope"></i>
									<span class="title">SMS</span>
								</a>
					</li>
					<?php } ?>
					</ul>
			</div>
	</div>
	
	<div class="main-content bg-image" >
			<div class="page-title">
				
				<div class="title-env">
		
					<h1 class="title"><strong><?php echo($this->breadcrumb->output());?></strong>
					<span class="title pull-right"> Current Session : <?=!empty($this->currentsession[0]->CurrentSession)?$this->currentsession[0]->CurrentSession:''?></span> </h1>
				</div>
				
				
					
			</div>
			
	<?php  if($this->session->flashdata('set_session')) { ?>
<div class="row" >
<div class="alert alert-success" >
<strong><?=$this->session->flashdata('set_session')?></strong> <?php echo"<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>";?>
</div>
</div>
<?php }?>

<?php  if($this->session->flashdata('category_error')) { ?>
<div class="row" >
<div class="alert alert-danger" >
<strong><?=$this->session->flashdata('category_error')?></strong> <?php echo"<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>";?>
</div>
</div>
<?php }?>
		<!-- User Info, Notifications and Menu Bar -->