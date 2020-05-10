
$(document).on('click', '.delete-comment', function () {

    var id = $(this).attr('data-id');
    let _token = $('meta[name="csrf-token"]').attr('content');
    let _url = `/comments/comment`
    $.ajax({
        url: _url,
        type: 'delete',
        dataType: 'json',
        data: {'comment_id': id,'_token': _token},
        success: (data)=> {
            console.log(data)
            $(this).parents('.remove').remove()
        }, error: function (error) {

        },
    });
});
