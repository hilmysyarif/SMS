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
				<div class="col-md-6">
				
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
										{ year: 1950, europe: 546,  africa: 227 },
										{ year: 1960, europe: 705,  africa: 283 },
										{ year: 1970, europe: 856, africa: 361 },
										{ year: 1980, europe: 1294,  africa: 471 },
										{ year: 1990, europe: 321,  africa: 623 },
										{ year: 2000, europe: 730,  africa: 1297 },
										{ year: 2010, europe: 728,  africa: 982 },
										{ year: 2020, europe: 721,  africa: 1189 },
										{ year: 2030, europe: 704,  africa: 1416 },
										{ year: 2040, europe: 680,  africa: 1665 },
										{ year: 2050, europe: 650,  africa: 1937 }
									];
									
									$("#bar-3").dxChart({
										dataSource: dataSource,
										commonSeriesSettings: {
											argumentField: "year"
										},
										series: [
											{ valueField: "europe", name: "Income", color: "rgb(136, 187, 200)" },
											
											{ valueField: "africa", name: "Expense", color: "rgb(237,122,83)" }
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
				  <div class="col-md-6">
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
										defaultDate: '2014-09-12',
										editable: true,
										eventLimit: true,
										events: [
											{
												title: 'All Day Event',
												start: '2014-09-01'
											},
											{
												title: 'Long Event',
												start: '2014-09-07',
												end: '2014-09-10'
											},
											{
												id: 999,
												title: 'Repeating Event',
												start: '2014-09-09T16:00:00'
											},
											{
												id: 999,
												title: 'Repeating Event',
												start: '2014-09-16T16:00:00'
											},
											{
												title: 'Conference',
												start: '2014-09-11',
												end: '2014-09-13'
											},
											{
												title: 'Meeting',
												start: '2014-09-12T10:30:00',
												end: '2014-09-12T12:30:00'
											},
											{
												title: 'Lunch',
												start: '2014-09-12T12:00:00'
											},
											{
												title: 'Meeting',
												start: '2014-09-12T14:30:00'
											},
											{
												title: 'Happy Hour',
												start: '2014-09-12T17:30:00'
											},
											{
												title: 'Dinner',
												start: '2014-09-12T20:00:00'
											},
											{
												title: 'Birthday Party',
												start: '2014-09-13T07:00:00'
											},
											{
												title: 'Click for Google',
												url: 'http://google.com/',
												start: '2014-09-28'
											}
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
									
									
									// Draggable Events
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
															
															<div id="calendar"></div>
															
														</div>
													</div>
										</div>
								</div>
						</div>
				</div>
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
										{region: "Asia", val: 4119626293},
										{region: "Africa", val: 1012956064},
										{region: "Northern America", val: 344124520},
										{region: "Latin America and the Caribbean", val: 590946440},
										{region: "Europe", val: 727082222},
										{region: "Oceania", val: 35104756}
									], timer;
									
									$("#bar-10").dxPieChart({
										dataSource: dataSource,
										
										tooltip: {
											enabled: false,
										  	format:"millions",
											customizeText: function() { 
												return this.argumentText + "<br/>" + this.valueText;
											}
										},
										size: {
											height: 420
										},
										pointClick: function(point) {
											point.showTooltip();
											clearTimeout(timer);
											timer = setTimeout(function() { point.hideTooltip(); }, 2000);
											$("select option:contains(" + point.argument + ")").prop("selected", true);
										},
										legend: {
											visible: false
										},  
										series: [{
											type: "doughnut",
											argumentField: "region"
										}],
									//	palette: xenonPalette
									});
									
								});
							</script>
							<div id="bar-10" style="height: 450px; width: 100%;"></div>
						</div>
					</div>
						
				</div>
			</div>	
			
			
	
			
		
			
			
			
			