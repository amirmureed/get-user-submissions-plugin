jQuery(document).ready(function($) {
    $('#submit').on('click', function(e){
        e.preventDefault();
        var ajax_url = blog.ajaxurl;
        var cat = document.getElementById("catlist").value;
        if($('#title').val() == '' || $('#content').val() == ''){
            $('#checkpost').show().fadeOut(4000);
        }else if( document.getElementById("input-image").files.length == 0 ){
            $('#checkimg').show().fadeOut(4000);
        }else{
            var data = new FormData($('#postform')[0]);
            data.append( "image", $('#input-image')[0].files[0]);
            data.append( "action", 'my_ajax_handler');
            data.append( "title", $('#title').val());
            data.append( "content", $('#content').val());
            data.append( "catid", cat);
            document.getElementById("postform").reset();
            $.ajax({
                url: ajax_url,
                type: 'POST',
                data: data,
                processData: false,
                contentType: false,
                success: function(response) {
                    if(response == 'success'){
                        $('#postStatus').show().fadeOut(5000);
                    }
                },
                error: function(error){
                    console.log("error occured");
                }
              });
        }
    })
});