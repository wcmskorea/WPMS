<div class="box-header with-border">
  <h3 class="box-title"><i class="fa fa-tasks"></i> ToDo</h3>
  <div class="box-tools pull-right">
    <span data-toggle="tooltip" title="{{ $todos->total() }}건 진행중" class="badge bg-light-blue">{{ $todos->total() }}</span>
    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
  </div>
</div>
<div class="box-body">
  <ul class="todo-list">
  @foreach($todos as $todo)
  <li class="item{{$todo->id}} danger">
    <!-- checkbox -->
    <input type="checkbox" class="published" data-toggle="tooltip" data-placement="bottom" title="완료하기" data-id="{{$todo->id}}" @if ($todo->done) checked @endif>
    <!-- todo text -->
    <span class="text"> {{ $todo['title'] }} </span>
    <small class="label label-default pull-right">{{ $todo['progress'] }} %</small>
    <!-- Emphasis label -->
    <small class="label label-{{ $todo['color'] }}"><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $todo->created_at)->diffForHumans() }}</small>
    <!-- General tools such as edit or delete-->
    <div class="tools">
      <i class="fa fa-edit todoListEdit" data-id="{{ $todo['id'] }}" data-title="{{ $todo['title'] }}" data-progress="{{ $todo['progress'] }}" data-toggle="modal" data-target="#modal-todo"></i>
      <i class="fa fa-trash-o todoListDel" data-id="{{ $todo['id'] }}" data-title="{{ $todo['title'] }}" data-progress="{{ $todo['progress'] }}" data-toggle="modal" data-target="#modal-todo"></i>
    </div>
  </li>
  @endforeach
  </ul>
</div><!-- /.box-body-->
<div class="box-footer clearfix no-border">
  <button type="button" class="btn btn-default pull-right" id="addNewTodo" data-toggle="modal" data-target="#modal-todo"><i class="fa fa-plus"></i>&nbsp;&nbsp;할일 추가하기</button>
  <a href="/manage/todo/" class="btn btn-default">전체보기 <i class="fa fa-arrow-circle-right"></i></a>
</div>