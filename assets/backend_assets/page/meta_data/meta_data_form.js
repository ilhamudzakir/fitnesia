$(document).ready(function(){
    $('#px-admin_meta_data-meta_data-form').validate({
        rules: {
            meta_key: {
                required: true
            },
            description: {
                required: true
            }
                        
        },
        submitHandler: function(form) {
            var target = $(form).attr('action');
            $('#px-admin_meta_data-meta_data-form .alert-warning').removeClass('hidden');
            $('#px-admin_meta_data-meta_data-form .alert-success').addClass('hidden');
            $('#px-admin_meta_data-meta_data-form .alert-danger').addClass('hidden');
            $('.px-summernote').each(function() {
                $(this).val($(this).code());
            });
            $.ajax({
                url : target,
                type : 'POST',
                dataType : 'json',
                data : $(form).serialize(),
                success : function(response){
                    $('#px-admin_meta_data-meta_data-form .alert-warning').addClass('hidden');
                    if(response.status == 'ok'){
                        $('#px-admin_meta_data-meta_data-form .alert-success').removeClass('hidden').children('span').text(response.msg);
                        window.location.href = response.redirect;
                    }
                    else
                        $('#px-admin_meta_data-meta_data-form .alert-danger').removeClass('hidden').children('span').text(response.msg);   
                },
                error : function(jqXHR, textStatus, errorThrown) {
                    alert(textStatus, errorThrown);
                }
            });
        }
    });
})