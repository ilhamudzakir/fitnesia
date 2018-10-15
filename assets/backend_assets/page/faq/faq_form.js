$(document).ready(function(){
    $('#px-admin_faq-faq-form').validate({
        rules: {
            title: {
                required: true
            },
            subtitle: {
                required: true
            },
            content: {
                required: true
            }
                        
        },
        submitHandler: function(form) {
            var target = $(form).attr('action');
            $('#px-admin_faq-faq-form .alert-warning').removeClass('hidden');
            $('#px-admin_faq-faq-form .alert-success').addClass('hidden');
            $('#px-admin_faq-faq-form .alert-danger').addClass('hidden');
            $('.px-summernote').each(function() {
                $(this).val($(this).code());
            });
            $.ajax({
                url : target,
                type : 'POST',
                dataType : 'json',
                data : $(form).serialize(),
                success : function(response){
                    $('#px-admin_faq-faq-form .alert-warning').addClass('hidden');
                    if(response.status == 'ok'){
                        $('#px-admin_faq-faq-form .alert-success').removeClass('hidden').children('span').text(response.msg);
                        window.location.href = response.redirect;
                    }
                    else
                        $('#px-admin_faq-faq-form .alert-danger').removeClass('hidden').children('span').text(response.msg);   
                },
                error : function(jqXHR, textStatus, errorThrown) {
                    alert(textStatus, errorThrown);
                }
            });
        }
    });
    $('#px-admin_faq-faq-form-content').summernote({
		toolbar: [
			['style', ['style']],
			['font', ['bold', 'italic', 'underline', 'clear']],
			['fontname', ['fontname']],
			['color', ['color']],
			['para', ['ul', 'ol', 'paragraph']],
			['height', ['height']],
			['table', ['table']],
			['insert', ['link', 'picture', 'hr']],
			['view', ['fullscreen', 'codeview']],
			['help', ['help']]
		],
		height: '300px',
		onImageUpload: function(files, editor, welEditable) {
            sendFile(files[0], editor, welEditable);
        }
	});
    function sendFile(file, editor, welEditable) {
        data = new FormData();
        data.append('image', file);
        $.ajax({
            data: data,
            type: 'post',
            url: 'upload/image',
            cache: false,
            contentType: false,
            processData: false,
            success: function(url) {
                editor.insertImage(welEditable, url);
                $('#px-admin_faq-faq-form .panel-body').after('<input type="hidden" name="images[]" value="'+url+'">');
            }
        });
    }
})