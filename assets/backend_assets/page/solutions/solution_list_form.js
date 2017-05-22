$(document).ready(function(){
    $('#px-solutions-solution_list-form').validate({
        rules: {                                            
            title: {
                required: true
            },
            content: {
                required: true
            },
            menu_title: {
                required: true
            }
                        
        },
        submitHandler: function(form) {
            var target = $(form).attr('action');
            $('#px-solutions-solution_list-form .alert-warning').removeClass('hidden');
            $('#px-solutions-solution_list-form .alert-success').addClass('hidden');
            $('#px-solutions-solution_list-form .alert-danger').addClass('hidden');
            $('.px-summernote').each(function() {
                $(this).val($(this).code());
            });
            $.ajax({
                url : target,
                type : 'POST',
                dataType : 'json',
                data : $(form).serialize(),
                success : function(response){
                    $('#px-solutions-solution_list-form .alert-warning').addClass('hidden');
                    if(response.status == 'ok'){
                        $('#px-solutions-solution_list-form .alert-success').removeClass('hidden').children('span').text(response.msg);
                        window.location.href = response.redirect;
                    }
                    else
                        $('#px-solutions-solution_list-form .alert-danger').removeClass('hidden').children('span').text(response.msg);   
                },
                error : function(jqXHR, textStatus, errorThrown) {
                    alert(textStatus, errorThrown);
                }
            });
        }
    });
    $('#px-solutions-solution_list-form-content').summernote({
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
                $('#px-solutions-solution_list-form .panel-body').after('<input type="hidden" name="images[]" value="'+url+'">');
            }
        });
    }
    $("#file-upload").fileupload({
        dataType: 'text',
        autoUpload: false,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
        maxFileSize: 5000000 // 5 MB
        }).on('fileuploadadd', function(e, data) {
            data.process();
        }).on('fileuploadprocessalways', function (e, data) {
        if (data.files.error) {
            data.abort();
            alert('Image file must be jpeg/jpg, png or gif with less than 5MB');
        } else {
            data.submit();
        }
        }).on('fileuploadprogressall', function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            var target = $('#target-file').val();
            $('#px-solutions-solution_list-fileupload-'+target+'-progress').text(progress+'%');
            $('#px-solutions-solution_list-fileupload-'+target+'-upload-button').attr('disabled',true);
        }).on('fileuploaddone', function (e, data) {
            var target = $('#target-file').val();
            $('#px-solutions-solution_list-fileupload-'+target+'-upload-button').removeAttr('disabled');
                        a = 1;
                        w = 100;
                        b = 1.66 ;
                        h = 166;
            $('#preview-'+target).removeClass('hidden');
            $('[name="'+target+'"]').val(data.result);
            $('#image-original-previews').html('<img src="'+data.result+'" alt="preview" id="original-image">');
            $('#image-crop-previews-solution_list').html('<img src="'+data.result+'" alt="preview" id="crop-image">');
            $('#image').val(data.result);
            origImageVal();
            var ratios = a / b;
            $('#original-image').Jcrop({
                onChange: showPreview,
                onSelect: showPreview,
                aspectRatio: ratios,
                setSelect:  [ 0, 12, 569, 227.6 ]
            });
        }).on('fileuploadfail', function (e, data) {
            alert('File upload failed.');
            $('#px-solutions-solution_list-fileupload-upload-button').removeAttr('disabled');
        }).on('fileuploadalways', function() {
    });
        $('.btn-upload').click(function(){
        var target = $(this).attr('data-target');
        var old_temp = $('[name="'+target+'"]').val();
        $('#file-upload #target-file').val(target);
        $('#file-upload #old-file').val(old_temp);
    })
    $('body').delegate('.btn-delete-file','click',function(){
        $(this).parent().remove();
    });
        if($('#original-image').length > 0){
        origImageVal();
        var imgwidth = $('#original-image').width();
        var imgheight = $('#original-image').height();
        $('#fakeheight').val(imgheight);
        $('#fakewidth').val(imgwidth);
        var ratios = 1/ 1.66;
        $('#original-image').Jcrop({
            onChange: showPreview,
            onSelect: showPreview,
            aspectRatio: ratios
        });
    }
    function origImageVal(){
        var origImg = new Image();
        origImg.src = $('#original-image').attr('src');
        origImg.onload = function() {
            var origheight = origImg.height;
            var origwidth = origImg.width;
            $('#origheight').val(origheight);
            $('#origwidth').val(origwidth);
        }
    }
    function showPreview(coords)
    {
        var image_asli = $('#original-image').attr('src');
        var imgwidth = $('#original-image').width();
        var imgheight = $('#original-image').height();
        $('#fakeheight').val(imgheight);
        $('#fakewidth').val(imgwidth);
        var rx = 100 / coords.w;
        var ry = 166 / coords.h;

        $('#crop-image').attr('src',image_asli).css({
            width: Math.round(rx * imgwidth) + 'px',
            height: Math.round(ry * imgheight) + 'px',
            marginLeft: '-' + Math.round(rx * coords.x) + 'px',
            marginTop: '-' + Math.round(ry * coords.y) + 'px'
        });
        $('#x').val(coords.x);
        $('#y').val(coords.y);
        $('#w').val(coords.w);
        $('#h').val(coords.h);
    }
})