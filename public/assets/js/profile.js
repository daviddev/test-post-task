$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //Add post
    $('body').on('click','.add-post-submit',function () {
        let data = {
            title: $('#post-form .post-title input').val(),
            content: $('#post-form .post-content textarea').val(),
        };
        $.ajax({
            url:'/post',
            type:'post',
            dataType:'json',
            data:data,
            success:function (response) {
                $("#post-form small").html("");
                if (response.success){
                    window.location.reload();
                } else{
                    for (let field in response.errors){
                        $("#post-form .post-" + field + " small").html(response.errors[field][0]);
                    }
                }
            },
        })
    });
});
