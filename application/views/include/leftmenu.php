
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
								<a href="<?=base_url();?>dashboard" class="btn btn-icon btn-gray shortcut">
									<i class="fa fa-calendar" style="font-size:2em;"></i>
								</a>
						</div>		
		
						
					<li class="">
						<a href="javascript:;">
							<i class="fa fa-desktop"></i>
							<span class="title">Front Office</span>
						</a>
						<ul>
							<li class="active">
								<a href="javascript:;">
									<span class="title">Call & Follow-up</span>
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<span class="title">Other Call</span>
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<span class="title">Enquiry</span>
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<span class="title">Complaint</span>
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<span class="title">Visitor Book</span>
								</a>
							</li>
							
						</ul>
					</li>
					
					<li class="">
						<a href="javascript:;">
							<i class="fa fa-graduation-cap"></i>
							<span class="title">Admission</span>
						</a>
						<ul>
							<li class="active">
								<a href="<?=base_url();?>admission/registration">
									<span class="title">Registration</span>
								</a>
							</li>
							<li >
								<a href="<?=base_url();?>admission/admission_student">
									<span class="title">Admission</span>
								</a>
							</li>
							<li>
								<a href="<?=base_url();?>admission/promotion">
									<span class="title">Promotion</span>
								</a>
							</li>
							<li>
								<a href="<?=base_url();?>admission/updatefee">
									<span class="title">Update Fee</span>
								</a>
							</li>
							
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
							
						</ul>
					</li>
					<li>
					<a href="<?=base_url();?>admission/payment">
							<i class="fa fa-money"></i>	
							<span class="title">Fee Payment</span>
					</a>
					</li>
					<li class="">
						<a href="javascript:;">
							<i class="linecons-cog"></i>
							<span class="title">Transaction</span>
						</a>
						<ul>
							<li class="active">
								<a href="javascript:;">
									<span class="title">Expense</span>
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<span class="title">Income</span>
								</a>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="javascript:;">
							<i class="fa fa-bar-chart"></i>
							<span class="title">Attendance</span>
						</a>
						<ul>
							<li class="active">
								<a href="<?=base_url();?>admission/staffattendence">
									<span class="title">Staff Attendance</span>
								</a>
							</li>
							<li>
								<a href="<?=base_url();?>admission/studentattendence">
									<span class="title">Student Attendance</span>
								</a>
							</li>
							<li class="">
								<a href="javascript:;">
									<i class="fa fa-area-chart"></i>
									<span class="title">Reports</span>
								</a>
						<ul>
							<li class="active">
								<a href="<?=base_url();?>admission/staffattendancereport">
									<span class="title">Staff Attendance</span>
								</a>
							</li>
							<li>
								<a href="<?=base_url();?>admission/studentattendancereport">
									<span class="title">Student Attendance</span>
								</a>
							</li>
						</ul>
					</li>
						</ul>
					</li>
					<li class="">
						<a href="javascript:;">
							<i class="fa fa-bus"></i>
							<span class="title">Transport</span>
						</a>
						<ul>
							<li class="active">
								<a href="javascript:;">
									<span class="title">Transport</span>
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<span class="title">Transport Route</span>
								</a>
							</li>
						</ul>
					</li>
					
					<li class="">
						<a href="javascript:;">
							<i class="fa fa-file-text"></i>
							<span class="title">Exam</span>
						</a>
						<ul>
							<li class="active">
								<a href="<?=base_url();?>admission/markssetup">
									<span class="title">Scholastic Grade</span>
								</a>
							</li>
							<li>
								<a href="<?=base_url();?>admission/scmarkssetup">
									<span class="title">Co Scholastic Grade</span>
								</a>
							</li>
							<li class="active opened active">
						<a href="javascript:;">
							<i class="fa fa-area-chart"></i>
							<span class="title">Reports</span>
						</a>
						<ul>
							<li class="active">
								<a href="<?=base_url();?>admission/examreport">
									<span class="title">ExamReport</span>
								</a>
							</li>
							
						</ul>
					</li>
						</ul>
					</li>
					<li><a href="<?=base_url();?>admission/managestaff">
						<i class="fa fa-users"></i>
									<span class="title">Manage Staff</span>
								</a>
					</li>
					<li class=" ">			
					<a href="javascript:;">
							<i class="fa fa-book"></i>
							<span class="title">Library</span>
						</a>
						<ul>
							<li class="active">
								<a href="javascript:;">
									<span class="title">Manage Books</span>
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<span class="title">Issue & Return</span>
								</a>
							</li>
						</ul>
					</li>
					
					<li>			
					<a href="javascript:;">
							<i class="fa fa-exchange"></i>
							<span class="title">Dispatch & Receiving</span>
						</a>
						<ul>
							<li class="active">
								<a href="javascript:;">
									<span class="title">Dispatch</span>
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<span class="title">Receiving</span>
								</a>
							</li>
						</ul>
					</li>
					
					<li class="">
						<a href="javascript:;">
							<i class="fa fa-shopping-cart"></i>
							<span class="title">Stock</span>
						</a>
						<ul>
							<li class="active">
								<a href="javascript:;">
									<span class="title">Manage Stock</span>
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<span class="title">Stock Transfer</span>
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<span class="title">Purchase Material</span>
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<span class="title">Supplier</span>
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<span class="title">Purchase</span>
								</a>
							</li>
							<li>
								<a href="javascript:;">
									<span class="title">Issue Material</span>
								</a>
							</li>
							<li class="">
								<a href="javascript:;">
									<i class="fa fa-area-chart"></i>
									<span class="title">Reports</span>
								</a>
								<ul>
									<li class="active">
										<a href="javascript:;">
											<span class="title">Stock Report</span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="title">School Material</span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="title">Issue Report</span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="title">Purchase Report</span>
										</a>
									</li>
									
									
								</ul>
							</li>
						</ul>
					</li>
						<li><a href="javascript:;">
						<i class="fa fa-envelope"></i>
									<span class="title">SMS</span>
								</a>
					</li>
					</ul>
			</div>
	</div>
	<div class="main-content bg-image" >
			<div class="page-title">
				
				<div class="title-env">
					<h1 class="title">Dashboard
					<span class="title pull-right"> Current Session : <?=$this->currentsession[0]->CurrentSession?></span> </h1>
				</div>
				
				
					
			</div>
	
		<!-- User Info, Notifications and Menu Bar -->