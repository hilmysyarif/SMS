<body class="page-body skin-white">
<nav class="navbar horizontal-menu navbar-fixed-top" style="background:url(<?=base_url();?>assets/images/4.png) repeat"><!-- set fixed position by adding class "navbar-fixed-top" -->
		
		<div class="navbar-inner">
		
			<!-- Navbar Brand -->
			<div class="navbar-brand">
				<a href="javascript:;" class="logo">
				<p class="center  text-blac">School Management</p>
					<!--<img src="<?=base_url();?>assets/images/logo-white-bg@2x.png" width="80" alt="" class="hidden-xs" />
					<img src="<?=base_url();?>assets/images/logo@2x.png" width="80" alt="" class="visible-xs" />-->
				</a>
				
			</div>
				
			<!-- Mobile Toggles Links -->
			<div class="nav navbar-mobile">
			
				<!-- This will toggle the mobile menu and will be visible only on mobile devices -->
				<div class="mobile-menu-toggle">
					<!-- This will open the popup with user profile settings, you can use for any purpose, just be creative -->
							
					<!-- data-toggle="mobile-menu-horizontal" will show horizontal menu links only -->
					<!-- data-toggle="mobile-menu" will show sidebar menu links only -->
					<!-- data-toggle="mobile-menu-both" will show sidebar and horizontal menu links -->
					<a href="javascript:;" data-toggle="mobile-menu-horizontal">
						<i class="fa-bars"></i>
					</a>
				</div>
				
			</div>
			
			<div class="navbar-mobile-clear"></div>
			
			
			
			<!-- main menu -->
					
			<ul class="navbar-nav">
				<li>
					<a href="javascript:;">
						<i class="linecons-cog"></i>
						<span class="title"> Setting </span><span class="caret"></span>
					</a>
					<ul>
						<li>
							<a href="<?=base_url();?>master/generalsetting">
								<span class="title">General Setting</span>
							</a>
						</li>
						<li>
							<a href="<?=base_url();?>master/masterentry">
								<span class="title">Master Entry</span>
							</a>
						</li>
						<li>
							<a href="<?=base_url();?>master/manageuser">
								<span class="title">Manage User</span>
							</a>
						</li>
						<li>
							<a href="<?=base_url();?>master/manageaccount">
								<span class="title">Manage Accounts</span>
							</a>
						</li>
						<li>
							<a href="<?=base_url();?>master/manageclass">
								<span class="title">Manage Class</span>
							</a>
						</li>
						<li>
							<a href="<?=base_url();?>master/managesubject">
								<span class="title">Manage Subject</span>
							</a>
						</li>
						<li>
							<a href="<?=base_url();?>master/manageexam">
								<span class="title">Manage Exam</span>
							</a>
						</li>
						<li>
							<a href="<?=base_url();?>master/managescarea">
								<span class="title">Manage SC Area</span>
							</a>
						</li>
						<li>
							<a href="<?=base_url();?>master/managescindicator">
								<span class="title">Manage SC Indicator</span>
							</a>
						</li>
						<li>
							<a href="<?=base_url();?>master/managefee">
								<span class="title">Manage Fees</span>
							</a>
						</li>
						<li>
							<a href="<?=base_url();?>master/salaryhead">
								<span class="title">Salary Head</span>
							</a>
						</li>
						<li>
							<a href="<?=base_url();?>master/structuretemplate">
								<span class="title">Salary Structure</span>
							</a>
						</li>
						<li>
							<a href="<?=base_url();?>master/manageschoolmaterial">
								<span class="title">School Material</span>
							</a>
						</li>
						<li>
							<a href="<?=base_url();?>master/managelocation">
								<span class="title">Manage Location</span>
							</a>
						</li>
						<li>
							<a href="<?=base_url();?>master/manageheaderandfooter">
								<span class="title">Header & Footer</span>
							</a>
						</li>
						<li>
							<a href="<?=base_url();?>master/printoption">
								<span class="title">Print Option</span>
							</a>
						</li>
						<li>
							<a href="<?=base_url();?>master/permission">
								<span class="title">Permission</span>
							</a>
						</li>
					</ul>
				</li>
				
				
				
			
			</ul>
			
			
			<ul class="navbar-nav">
				<li>
							<a href="javascript:;">
								<span class="title">2015-2016</span><span class="caret"></span>
							</a> 
					<ul>
						<li>
							<a href="javascript:;">
								<span class="title">2015-2016</span>
							</a>
						</li>
						<li>
							<a href="javascript:;">
								<span class="title">2016-2017</span>
							</a>
						</li>
						
					</ul>
				</li>
				
				
				
			
			</ul>
			
			
			<ul class="navbar-nav">
				<li>
				<?php $AccountBalance= $this->utilities->get_balance(); ?>
				<a href="javascript:;">
					<i class="linecons-database"></i>
						<span class="title tooltip-primary" 
						data-toggle="tooltip" data-placement="bottom" title="" data-original-title="4102010: <?=$AccountBalance[0]->AccountBalance?> INR">
						 Balance </span>
					</a>
				</li>
				
				
				
			
			</ul>
			
			<ul class="navbar-nav">
				<li>
					<a href="javascript:;">
						<i class="fa-arrows-alt title tooltip-primary" 
						data-toggle="tooltip" data-placement="bottom" title="Full-Screen" data-original-title="Full-Screen"></i>
						
					</a>
					
				</li>
				
				
				
			
			</ul>
			<ul class="navbar-nav">
				<li>
					<a href="javascript:;">
						<i class="fa-expand title tooltip-primary" 
						data-toggle="tooltip" data-placement="bottom" title="Exit Full-Screen" data-original-title="Exit Full-Screen"></i>
						
					</a>
					
				</li>
				
				
				
			
			</ul>
			
			<ul class="navbar-nav">
				<li>
				<?php $LanguageName= $this->utilities->get_language();  ?>
					<a href="javascript:;">
						<i class="fa-language"></i>
						<span class="title"> English</span> <span class="caret"></span>
					</a>
					<ul>
					 <?php foreach($LanguageName as $lang){?>
						<li>
							<a href="javascript:;">
								<span class="title"><?=$lang->LanguageName?></span>
							</a>
						</li>
						<?php } ?>
					
					</ul>
				</li>
				
				
				
			
			</ul>
					
			
			<!-- notifications and other links -->
			<ul class="nav nav-userinfo navbar-right">
				<li class="dropdown user-profile">
					<a href="javascript:;" data-toggle="dropdown">
						<img src="<?=base_url();?>assets/images/user-1.png" alt="user-image" class="img-circle img-inline userpic-32" width="28" />
						<span>
							Hi!! <?=$this->info['usermailid']?>
							<i class="fa-angle-down"></i>
						</span>
					</a>
					
					<ul class="dropdown-menu user-profile-menu list-unstyled">
						<li>
							<a href="#edit-profile">
								<i class="fa-edit"></i>
								Change Password
							</a>
						</li>
					<li class="last">
							<a href="<?=base_url();?>login/logout">
								<i class="fa-lock"></i>
								Logout
							</a>
						</li>
					</ul>
				</li>
				
			
				
			</ul>
	
		</div>
		
	</nav>