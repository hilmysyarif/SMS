<!-- login page edited on 2 july by  designer rohit thakur-->
<body class="page-body skin-white login-page login-light bg-login">
		<!--  <div class="row" style="background: url(<?=base_url();?>assets/images/4.png) repeat;">
					<div class="col-md-12">
				
							<p class="center text-black">School Mgt <span class="slogan">Login</span></p>
							
					</div>
		</div>	-->
	
	<div class=""><!-- login-container -->

		<div class="row">
			<div class="col-md-4 ">
				<!-- Default panel -->
					<div class="panel panel-color panel-gray"><!-- Add class "collapsed" to minimize the panel -->
						<div class="panel-heading">
							<h3 class="panel-title"><i class="fa fa-user"></i>Login Detail</h3>
							
							<div class="panel-options">
													
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
								
							</div>
						</div>
						
						<div class="panel-body">
							
							<h4><span class="label label-info" data-toggle="tooltip" data-placement="left" title="" data-original-title="Admin Login">Admin Login</span> </h4>
							<p><mark>Username : masteruser</mark></p>
							<p><mark>Password : 123456</mark></p>
							</br>
							<h4><span class="label label-info" data-toggle="tooltip" data-placement="left" title="" data-original-title="Parents Login :">Parents Login : </span> </h4>
							<p><mark>Username : 1@parents</mark></p>
							<p><mark>Password : 123456</mark></p>
							</br>
							<h4><span class="label label-info" data-toggle="tooltip" data-placement="left" title="" data-original-title="Parents Login :">Students Login :  </span> </h4>
							<p><mark>Username : 1@student</mark></p>
							<p><mark>Password : 123456</mark></p>
						</div>
					</div>
			</div>
			
			
			<div class="col-md-4 ">
			
				<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						// Reveal Login form
						setTimeout(function(){ $(".fade-in-effect").addClass('in'); }, 1);
						
						
						// Validation and Ajax action
						$("form#login").validate({
							rules: {
								username: {
									required: true
								},
								
								passwd: {
									required: true
								}
							},
							
							messages: {
								username: {
									required: 'Please enter your username.'
								},
								
								passwd: {
									required: 'Please enter your password.'
								}
							},
							
							// Form Processing via AJAX
							submitHandler: function(form)
							{ 
								show_loading_bar(70); // Fill progress bar to 70% (just a given value)
								
								var opts = {
									"closeButton": true,
									"debug": false,
									"positionClass": "toast-top-full-width",
									"onclick": null,
									"showDuration": "300",
									"hideDuration": "1000",
									"timeOut": "5000",
									"extendedTimeOut": "1000",
									"showEasing": "swing",
									"hideEasing": "linear",
									"showMethod": "fadeIn",
									"hideMethod": "fadeOut"
								};
									
								$.ajax({
									
									url: "login/login_user",
									method: 'POST',
									//dataType: 'json',
									data: {
										do_login: true,
										username: $(form).find('#username').val(),
										passwd: $(form).find('#passwd').val(),
										db_name: $(form).find('#db_name').val(),
										
									},
									success: function(resp)
									{ 
										show_loading_bar({
											delay: .5,
											pct: 100,
											finish: function(){
												
												// Redirect after successful login page (when progress bar reaches 100%)
												if(resp)
												{
													
													window.location.href = 'dashboard';
												}
																							else
												{  
													toastr.error("You have entered wrong password, please try again.  :)", "Invalid Login!", opts);
													$passwd.select();
												}
																						}
										});
										
																		}
								});
								
							}
						});
						
						// Set Form focus
						$("form#login .form-group:has(.form-control):first .form-control").focus();
					});
				</script>
				
			
				
				<!-- Add class "fade-in-effect" for login form effect -->
				<form method="post" role="form" id="login"  class="login-form fade-in-effect">
					
					<div class="login-header">
						<a href="javascript:;" class="logo">
							<h2 class="">School Management</h2>
							<span>log in</span>
						</a>
						
						<p>Dear user, log in to access the admin area!</p>
					</div>
					<div class="form-group">
					<select class="form-control " name="db_name" id="db_name">
					
					<option value="db_school">db_school</option>
					<option value="test1">test1</option>
					<option value="test2">test2</option>
					<option value="test3">test3</option>
					</select>
					</div>	
					<div class="form-group">
						<label class="control-label" for="username">Username</label>
						<input type="text" class="form-control " name="username" id="username" autocomplete="off" value="masteruser"/>
					</div>
					
					<div class="form-group">
						<label class="control-label" for="passwd">Password</label>
						<input type="password" class="form-control " name="passwd" id="passwd" autocomplete="off" value="123456"/>
					</div>
					
					<div class="form-group pull-right">
						<button type="submit" class="btn  btn-info  ">
							<i class="fa-sign-in"></i>
							Login
						</button>
					</div>
							</br>
					</br>
					
				</form>
				
				
				
			</div>
			
			<div class="col-md-4">
			</div>
		</div>
		
	</div>