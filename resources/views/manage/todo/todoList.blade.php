<div class="box-header with-border">
  <h3 class="box-title">To Do List</h3>
  <div class="box-tools pull-right">{{ $todos->links() }}</div>
</div>
<div class="box-body">
  
  <ul class="todo-list">
  
  @foreach($todos as $todo)
  <li class="item{{$todo->id}} @if($todo->done) danger done @endif">
    <!-- drag handle -->
    <span class="handle">
      <i class="fa fa-ellipsis-v"></i>
      <i class="fa fa-ellipsis-v"></i>
    </span>
    <!-- checkbox -->
    <input type="checkbox" class="published" data-id="{{$todo->id}}" @if ($todo->done) checked @endif>
    <!-- todo text -->
    <span class="text"> {{ $todo['title'] }} </span>
    <!-- Emphasis label -->
    <small class="label label-{{ $todo['color'] }}"><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $todo->updated_at)->diffForHumans() }}</small>
    <!-- General tools such as edit or delete-->
    <div class="tools">
      <i class="fa fa-edit todoListEdit" data-id="{{ $todo['id'] }}" data-title="{{ $todo['title'] }}" data-progress="{{ $todo['progress'] }}" data-toggle="modal" data-target="#modal-todo"></i>
      <i class="fa fa-trash-o todoListDel" data-id="{{ $todo['id'] }}" data-title="{{ $todo['title'] }}" data-progress="{{ $todo['progress'] }}" data-toggle="modal" data-target="#modal-todo"></i>
    </div>
  </li>
  @endforeach

</div><!-- /.box-body-->
<div class="box-footer clearfix no-border">
  <button type="button" class="btn btn-default pull-right" id="addNewTodo" data-toggle="modal" data-target="#modal-todo"><i class="fa fa-plus"></i> 할일 추가하기</button>
</div>