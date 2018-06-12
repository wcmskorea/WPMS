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
                        toastr.success('성공적으로 저장(id:' + data.id + ') 되었습니다!', '저장완료!', {timeOut: 3000});
                    }
                    $.playSound('/js/sound/alert.mp3');
                    setTimeout(function() { location.reload(); }, 2000);
                }
            }
        });
    });
    // Todo - Ajax Done
    $('.published').change(function() {
        $(this).closest('td').toggleClass('success done');
        $.ajax({
            type: 'POST',
            url: "/manage/todo/changeStatus",
            data: {
                'id': $(this).data('id')
            },
            success: function(data) {                
                toastr.success('성공적으로 저장(id:' + data.id + ') 되었습니다!', '저장완료!', {timeOut: 3000});
                $.playSound('/js/sound/alert.mp3');
                setTimeout(function() { location.reload(); }, 2000);
            },
        });
    });
    // Todo - Ajax Add
    $('#addNewTodo').click(function() {
        $('.modal-title > span').text('할일 추가하기');
        $('#todoId').val('').prop('disabled', false);
        $('#todoTitle').val('').prop('disabled', false);
        $('#todoProgress').val('').prop('disabled', false);
        $('.modal-body > .alert').addClass('hidden');
        setTimeout(function() { $('#todoTitle').focus(); }, 1000);
    });
    // Todo - Ajax Edit
    $('.todoListEdit').click(function() {
        $('.modal-title > span').text('할일 수정하기');
        $("#todoMethod").val('POST');
        $('#todoId').val($(this).data('id')).prop('disabled', false);
        $('#todoTitle').val($(this).data('title')).prop('disabled', false);
        $('#todoProgress').val($(this).data('progress')).prop('disabled', false);
        $('.modal-body > .alert').addClass('hidden');
    });
    // Todo - Ajax Delete
    $('.todoListDel').click(function() {
        $('.modal-title > span').text('정말 삭제하시겠어요?');
        $("#todoMethod").val('DELETE');
        $('#todoId').val($(this).data('id')).prop('disabled', true);
        $('#todoTitle').val($(this).data('title')).prop('disabled', true);
        $('#todoProgress').val($(this).data('progress')).prop('disabled', true);
        $('#todoSubmit').html("삭제하기");
        $('.modal-body > .alert').addClass('hidden');
    });

    function load_notification()
    {
        $.ajax({
            url: "/manage/todo/checkNotification",
            method: "POST",
            data: {},
            success:function(data)
            {
                $('#task-list').html(data.notification);
                if(data.count > 0) {
                    $('span.count').html(data.count);
                    $('li.task-header').html('진행중인 <strong>' + data.count + ' 건</strong>');
                }
            }
        });
    }    
    load_notification();

    // Notification Alarm Sound
    $.extend({
        playSound: function () {
            return $(
                   '<audio class="sound-player" autoplay="autoplay" style="display:none;">'
                     + '<source src="' + arguments[0] + '" />'
                     + '<embed src="' + arguments[0] + '" hidden="true" autostart="true" loop="false"/>'
                   + '</audio>'
                 ).appendTo('body');
        },
        stopSound: function () {
            $(".sound-player").remove();
        }
    });

    // Tooltip 실행
    $('[data-toggle="tooltip"]').tooltip();
});