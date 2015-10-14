function show_student(sec_id,current_value)
{
	$.ajax({
				type: "POST",
				url : base_url+'common_functions/show_student',
				data: {sec_id: sec_id , current_value: current_value },
			})	
				.done(function(msg){
					
					$('#show_student').html(msg);					
					
					return false;	
				});
		
		return false;
}

function show_student_promo(sec_id,current_value)
{
	$.ajax({
				type: "POST",
				url : base_url+'common_functions/show_student_promo',
				data: {sec_id: sec_id , current_value: current_value },
			})	
				.done(function(msg){
					
					$('#show_student').html(msg);					
					
					return false;	
				});
		
		return false;
}

function show_student_exam(sec_id,current_value)
{
	$.ajax({
				type: "POST",
				url : base_url+'common_functions/show_student_exam',
				data: {sec_id: sec_id , current_value: current_value },
			})	
				.done(function(msg){
					
					$('#show_student').html(msg);					
					
					return false;	
				});
		
		return false;
}

function show_subject(sec_id,current_value)
{
	$.ajax({
				type: "POST",
				url : base_url+'common_functions/show_subject',
				data: {sec_id: sec_id , current_value: current_value },
			})	
				.done(function(msg){
					
					$('#show_subject').html(msg);					
					
					return false;	
				});
		
		return false;
}

function show_subject1(sec_id,current_value)
{
	$.ajax({
				type: "POST",
				url : base_url+'common_functions/show_subjectexam',
				data: {sec_id: sec_id , current_value: current_value },
			})	
				.done(function(msg){
					
					$('#show_subject').html(msg);					
					
					return false;	
				});
		
		return false;
}

function show_fee(sec_id,current_value)
{
	$.ajax({
				type: "POST",
				url : base_url+'common_functions/show_fee',
				data: {sec_id: sec_id , current_value: current_value },
			})	
				.done(function(msg){
					
					$('#show_fee').html(msg);					
					
					return false;	
				});
		
		return false;
}

function show_nextclass(next_session)
{
	$.ajax({
				type: "POST",
				url : base_url+'common_functions/show_nextclass',
				data: { next_session: next_session },
			})	
				.done(function(msg){
					
					$('#show_nextclass').html(msg);					
					
					return false;	
				});
		
		return false;
}

function addfeelist(form)
{ 
	$.ajax({
				type: "POST",
				url : base_url+'common_functions/addfeelist',
				data: {					sectionid: $('#sectionid').val(),
										admissionid: $('#admissionid').val(),
										feetype: $('#s2example-2').val(),
										amount: $('#amount').val(),
										},
			})	
				.done(function(msg){
					
					$('#showpending').html(msg);					
					
					return false;	
				});
		
		return false;
}

function showfixedsalaryhead(id)
{ 
	$.ajax({
				type: "POST",
				url : base_url+'common_functions/showfixedsalaryhead',
				data: {					id: id,
										
										},
			})	
				.done(function(msg){
					
					$('#showfixedsalaryhead').html(msg);					
					
					return false;	
				});
		
		return false;
}
