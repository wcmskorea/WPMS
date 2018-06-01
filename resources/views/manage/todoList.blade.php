<div class="box-header with-border">
  <h3 class="box-title">Todo List</h3>
  <div class="box-tools pull-right">
    <a class="label label-primary" id="addNewTodo">신규 등록하기</a>
  </div>
</div>
<div class="box-body">

  @foreach($todos as $todo)
  <h5>
    <a href="/manage/todo/{{ $todo['id'] }}" data-toggle="modal" data-target="#modal-default">{{ $todo['title'] }}</a>
    <small class="label label-{{ $color }} pull-right">{{ $todo['progress'] }}%</small>
  </h5>
  <div class="progress progress-xxs">
    <div class="progress-bar progress-bar-{{ $color }}" style="width: {{ $todo['progress'] }}%"></div>
  </div>
  @endforeach

  <div class="text-center">
  {{ $todos->links() }}
  </div>

</div><!-- /.box-body-->