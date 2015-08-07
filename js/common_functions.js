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
