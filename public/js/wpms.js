$(document).ready(function() 
{
    toastr.options.positionClass = 'toast-bottom-right';
    toastr.options.progressBar = true;

    // 모든 ajax 통신에 token을 자동으로 추가
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    //Todo - ajax post
    $("#todoSubmit").click(function() {
        // $("#todoForm").submit();
        var method = $("#todoMethod").val();
        var url = (method != 'POST') ? '/manage/todo/' + $('#todoId').val() : '/manage/todo';
        $.ajax({
            url: url,
            type: method,
            data: {
                'id': $('#todoId').val(),
                'title': $('#todoTitle').val(),
                'progress': $('#todoProgress').val()
            },
            success: function (data) { 
                $('.errorTitle').addClass('hidden');
                $('.errorContent').addClass('hidden');
                // console.log(data);
                if ((data.errors)) {
                    setTimeout(function () { $('#modal-todo').modal('show'); }, 500);
                    $('.alert').removeClass('hidden');
                    $('.alert > ul').text("");
                    if (data.errors.title) { $('.alert > ul').append("<li>" + data.errors.title + "</li>"); }
                    if (data.errors.progress) { $('.alert > ul').append("<li>" + data.errors.progress + "</li>"); }
                } else {
                    if(data.deleted_at) {
                        toastr.error('정상적으로 삭제(id:' + data.id + ') 되었습니다!', '삭제완료!', {timeOut: 3000});    
                    } else {
                        toastr.error('성공적으로 저장(id:' + data.id + ') 되었습니다!', '저장완료!', {timeOut: 3000});
                    }
                    setTimeout(function() { location.reload(); }, 2000);
                }
            }
        });
    });
    // Todo - Ajax Done
    $('.published').change(function() {
        $(this).closest('li').toggleClass('danger done');
        $.ajax({
            type: 'POST',
            url: "/manage/todo/changeStatus",
            data: {
                'id': $(this).data('id')
            },
            success: function(data) {                
                toastr.error('성공적으로 저장(id:' + data.id + ') 되었습니다!', '저장완료!', {timeOut: 3000});
            },
        });
    });
    // Todo - Ajax Add
    $('#addNewTodo').click(function() {
        $('.modal-title').text('할일 추가하기');
        $('#todoId').val('').prop('disabled', false);
        $('#todoTitle').val('').prop('disabled', false);
        $('#todoProgress').val('').prop('disabled', false);
        $('.modal-body > .alert').addClass('hidden');
        setTimeout(function() { $('#todoTitle').focus(); }, 1000);
    });
    // Todo - Ajax Edit
    $('.todoListEdit').click(function() {
        $('.modal-title').text('할일 수정하기');
        $("#todoMethod").val('POST');
        $('#todoId').val($(this).data('id')).prop('disabled', false);
        $('#todoTitle').val($(this).data('title')).prop('disabled', false);
        $('#todoProgress').val($(this).data('progress')).prop('disabled', false);
        $('.modal-body > .alert').addClass('hidden');
    });
    // Todo - Ajax Delete
    $('.todoListDel').click(function() {
        $('.modal-title').text('정말 삭제하시겠어요?');
        $("#todoMethod").val('DELETE');
        $('#todoId').val($(this).data('id')).prop('disabled', true);
        $('#todoTitle').val($(this).data('title')).prop('disabled', true);
        $('#todoProgress').val($(this).data('progress')).prop('disabled', true);
        $('#todoSubmit').html("삭제하기");
        $('.modal-body > .alert').addClass('hidden');
    });
});