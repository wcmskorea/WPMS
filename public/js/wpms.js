// Todo - add a new post
$(document).on('click', '#addNewTodo', function() {
    $('.modal-title').text('할일 신규 등록하기');
    $('#todoId').val('');
    $('#todoTitle').val('');
    $('#todoProgress').val('');
    $('.modal-body > .alert').addClass('hidden');
    $('#modal-todo').modal('show');
});

$(document).ready(function() 
{
    toastr.options.positionClass = 'toast-bottom-right';
    toastr.options.showMethod = 'slideDown';
toastr.options.hideMethod = 'slideUp';
toastr.options.closeMethod = 'slideUp';
toastr.options.progressBar = true;

    //Todo - ajax post
    $("#todoSubmit").click(function() {
        //$("#todoForm").submit();
        $.ajax({
            url: '/manage/todo',
            type: 'POST',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('#todoId').val(),
                'title': $('#todoTitle').val(),
                'progress': $('#todoProgress').val()
            },
            success: function (data) { 
                $('.errorTitle').addClass('hidden');
                $('.errorContent').addClass('hidden');
                if ((data.errors)) {
                    setTimeout(function () { $('#modal-todo').modal('show'); }, 500);
                    $('.alert').removeClass('hidden');
                    $('.alert > ul').text("");
                    if (data.errors.title) { $('.alert > ul').append("<li>" + data.errors.title + "</li>"); }
                    if (data.errors.progress) { $('.alert > ul').append("<li>" + data.errors.progress + "</li>"); }
                } else {
                    if(data.id) {
                        toastr.success('Successfully update(' + data.id + ') Post!', 'Success Alert', {timeOut: 5000});
                    } else {
                        toastr.success('Successfully added Post!', 'Success Alert', {timeOut: 5000});
                    }
                    setTimeout(function() { location.reload(); }, 2000);
                }
            }
        });
    });
    // Todo - Ajax Edit
    $('.todoListEdit').click(function() {
        $('.modal-title').text('할일 수정하기');
        $('#todoId').val($(this).data('id'));
        $('#todoTitle').val($(this).data('title'));
        $('#todoProgress').val($(this).data('progress'));
        $('.modal-body > .alert').addClass('hidden');
        //$.get('/manage/todo/' + $(this).data('id'))
    });
});