		<script type="text/javascript">
								jQuery(document).ready(function($)
								{
									var dataSource = [
										{ year: 1950, europe: 546, americas: 332, africa: 227 },
										{ year: 1960, europe: 705, americas: 417, africa: 283 },
										{ year: 1970, europe: 856, americas: 513, africa: 361 },
										{ year: 1980, europe: 1294, americas: 614, africa: 471 },
										{ year: 1990, europe: 321, americas: 721, africa: 623 },
										{ year: 2000, europe: 730, americas: 1836, africa: 1297 },
										{ year: 2010, europe: 728, americas: 935, africa: 982 },
										{ year: 2020, europe: 721, americas: 1027, africa: 1189 },
										{ year: 2030, europe: 704, americas: 1110, africa: 1416 },
										{ year: 2040, europe: 680, americas: 1178, africa: 1665 },
										{ year: 2050, europe: 650, americas: 1231, africa: 1937 }
									];
									
									$("#bar-3").dxChart({
										dataSource: dataSource,
										commonSeriesSettings: {
											argumentField: "year"
										},
										series: [
											{ valueField: "europe", name: "Europe", color: "#40bbea" },
											{ valueField: "americas", name: "Americas", color: "#cc3f44" },
											{ valueField: "africa", name: "Africa", color: "#8dc63f" }
										],
										argumentAxis:{
											grid:{
												visible: true
											}
										},
										tooltip:{
											enabled: true
										},
										title: "",
										legend: {
											verticalAlignment: "bottom",
											horizontalAlignment: "center"
										},
										commonPaneSettings: {
											border:{
												visible: true,
												right: false
											}	   
										}
									});
								});
							</script>
			
			<div class="row">
			<?php  if(in_array('IncomeExpanceGraph',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>	
				<div class="col-md-7">
				
					<div class="panel panel-color panel-gray">
						<div class="panel-heading">
							<h3 class="panel-title">Income/Expense Report</h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
								
							</div>
						</div>
						<div class="panel-body">	
							<script type="text/javascript">
								jQuery(document).ready(function($)
								{
									var dataSource = [
										<?php echo $testing;?>
										
									];
									
									$("#bar-3").dxChart({
										dataSource: dataSource,
										commonSeriesSettings: {
											argumentField: "Day"
										},
										series: [
											{ valueField: "Income", name: "Income", color: "rgb(136, 187, 200)" },
											
											{ valueField: "Expense", name: "Expense", color: "rgb(237,122,83)" }
										],
										argumentAxis:{
											grid:{
												visible: true
											}
										},
										tooltip:{
											enabled: true
										},
										
										legend: {
											verticalAlignment: "bottom",
											horizontalAlignment: "center"
										},
										
										commonPaneSettings: {
											border:{
												visible: true,
												right: false
											}	   
										}
									});
								});
							</script>
							<div id="bar-3" style="height: 400px; width: 100%;"></div>
						</div>
					</div>
						
				</div>
				<?php } ?>
				  <div class="col-md-<?php  if(in_array('IncomeExpanceGraph',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){ echo "5";}else{echo"12";} ?>">
									<script type="text/javascript">
								// Calendar Initialization
								jQuery(document).ready(function($)
								{
									// Form to add new event
									var colors = ['red', 'blue', 'primary', 'success', 'warning', 'info', 'danger', 'purple', 'black', 'gray'];
									
									$("#add_event_form").on('submit', function(ev)
									{
										ev.preventDefault();
										
										var $event = $(this).find('.form-control'),
											event_name = $event.val().trim();
										
										if(event_name.length >= 3)
										{
											var color = colors[Math.floor(Math.random()*colors.length)];
											
											// Create Event Entry
											$("#events-list").append(
												'<li>\
													<a href="#" data-event-class="event-color-' + color + '">\
														<span class="badge badge-' + color + ' badge-roundless upper">' + event_name + '</span>\
													</a>\
												</li>'
											);
											
											
											// Reset draggable
											$("#events-list li").draggable({
												revert: true,
												revertDuration: 50,
												zIndex: 999
											});
											
											// Reset input
											$event.val('').focus();
										}
										else
										{
											$event.focus();
										}
									});
									
									
									// Calendar Initialization
									$('#calendar').fullCalendar({
										header: {
											left: 'title',
											center: '',
											right: 'month,agendaWeek,agendaDay prev,next'
										},
										buttonIcons: {
											prev: 'prev fa-angle-left',
											next: 'next fa-angle-right',
										},
										defaultDate: new Date(),
										editable: true,
										eventLimit: true,
										events: [
										<?php echo $EVENTS;?>
										],
										droppable: true,
										drop: function(date) {
											
											var $event = $(this).find('a'),
												eventObject = {
													title: $event.find('.badge').text(),
													start: date,
													className: $event.data('event-class')
												};
											
											$('#calendar').fullCalendar('renderEvent', eventObject, true);
											
											// Remove event from list
											$(this).remove();
										}
									});
									
									
									$("#events-list li").draggable({
										revert: true,
										revertDuration: 50,
										zIndex: 999
									});
								});
								</script>
							<div class="panel panel-color panel-gray">
										<div class="panel-heading">
											<h3 class="panel-title">Calendar</h3>
											<div class="panel-options">
												<a href="#" data-toggle="panel">
													<span class="collapse-icon">&ndash;</span>
													<span class="expand-icon">+</span>
												</a>
												
											</div>
										</div>
										<div class="panel-body">	
											<div class="calendar-env">
												<div class="calendar-main">
															
															<div id="calendar" ></div>
															
														</div>
													</div>
										</div>
								</div>
						</div>
				</div>
				<?php  if(in_array('AdmissionPiechart',$this->session->userdata('pagename')) ==TRUE || $this->session->userdata('user_data')['UserType']==0){?>	
			<div class="row">
				<div class="col-md-12">
				
					<div class="panel panel-color panel-gray">
						<div class="panel-heading">
							<h3 class="panel-title">Student Admission Report</h3>
							<div class="panel-options">
								<a href="#" data-toggle="panel">
									<span class="collapse-icon">&ndash;</span>
									<span class="expand-icon">+</span>
								</a>
								
							</div>
						</div>
						<div class="panel-body">	
							<script type="text/javascript">
								jQuery(document).ready(function($)
								{
									var dataSource = [
										<?php echo $AdmissionData; ?>
									], timer;
									
									$("#bar-10").dxPieChart({
										dataSource: dataSource,
										
										tooltip: {
											enabled: true,
										  	
											tooltipOpts: {
												content: "%s : %y"+"",
												shifts: {
													x: -30,
													y: -50
												}
											},
											
											customizeText: function() { 
												return this.argumentText + "<br/>" +this.valueText+'%';
											}
										},
										
										
										size: {
											height: 300
										},
										
										pointClick: function(point) {
											point.showTooltip();
											//clearTimeout(timer);
											//timer = setTimeout(function() { point.hideTooltip(); }, 2000);
											$("select option:contains(" + point.argument + ")").prop("selected", true);
										},
										
										legend:{visible:false},
										grid: {
											hoverable: true,
											clickable: true
										},  
										series: [{
											type: "pie",
											
											innerRadius: 0.4,
											highlight: {
												opacity: 0.1
											},
											argumentField: "label",
											label: {
											visible: true,
											radius: 1,
											
											customizeText: function() { 
												return this.argumentText + "<br/>" +this.valueText+"%";
											}
											},
											grow: {	active: false}
											}],
										
									});
									
								});
								
							</script>
							<div id="bar-10" style="height: 300px; width: 100%;"></div>
						</div>
					</div>
						
				</div>
			</div>	
				<?php } ?>
			
	
			
		
			
			
			
			