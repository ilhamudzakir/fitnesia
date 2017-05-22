$(document).ready(function(){
	$('#px-solutions-solution_list-message-form').validate({
		ignore: [],
		rules: {                                            
			id: {
				required: true
			}
		},
		submitHandler: function(form) {
			var target = $(form).attr('action');
			$('#px-solutions-solution_list-message-form .msg-status').text('Deleting data');
			$.ajax({
				url : target,
				type : 'POST',
				dataType : 'json',
				data : $(form).serialize(),
				success : function(response){
					if(response.status == 'ok'){
						$('#px-solutions-solution_list-message-form .msg-status').text('Delete Success...');
						window.location.href = response.redirect;
					}
					else
						$('#px-solutions-solution_list-message-form .msg-status').text('Delete Failed');
				},
				error : function(jqXHR, textStatus, errorThrown) {
					alert(textStatus, errorThrown);
				}
			});
		}
	});
	$('body').delegate('.btn-delete','click',function(){
		$('#px-solutions-solution_list-message-box').addClass('open');
		var id = $(this).attr('data-target-id');
		$('#px-solutions-solution_list-message-form input[name="id"]').val('');
		$('#px-solutions-solution_list-message-form input[name="id"]').val(id);
	});
})