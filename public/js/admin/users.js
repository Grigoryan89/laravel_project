

    $(document).on('click', '.delete-user', function () {
        $('.del').removeClass();

        var id = $(this).attr('data-id');
        let _token = $('meta[name="csrf-token"]').attr('content');
        let _url = `/admin/delete/user`
        $.ajax({
            url: _url,
            type: 'delete',
            dataType: 'json',
            data: {'user_id': id,'_token': _token},
            success: function(data) {
               location.reload()
            }, error: function (error) {

            },
        });
    });
