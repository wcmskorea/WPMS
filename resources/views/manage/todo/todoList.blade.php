<div class="box-header with-border">
  <h3 class="box-title">To Do List</h3>
  <div class="box-tools pull-right">{{ $todos->links() }}</div>
</div>
<div class="box-body">
  
  <ul class="todo-list">
  
  @foreach($todos as $todo)
  <li>
    <!-- drag handle -->
    <span class="handle">
      <i class="fa fa-ellipsis-v"></i>
      <i class="fa fa-ellipsis-v"></i>
    </span>
    <!-- checkbox -->
    <input type="checkbox" value="">
    <!-- todo text -->
    <span class="text">{{ $todo['title'] }}</span>
    <!-- Emphasis label -->
    <small class="label label-danger">{{ $todo['progress'] }}%</small>
    <!-- General tools such as edit or delete-->
    <div class="tools">
      <i class="fa fa-edit todoListEdit" data-id="{{ $todo['id'] }}" data-title="{{ $todo['title'] }}" data-progress="{{ $todo['progress'] }}" data-toggle="modal" data-target="#modal-todo"></i>
      <i class="fa fa-trash-o todoListDel"></i>
    </div>
  </li>
  @endforeach

</div><!-- /.box-body-->
<div class="box-footer clearfix no-border">
  <button type="button" class="btn btn-default pull-right" id="addNewTodo"><i class="fa fa-plus"></i> 할일 추가하기</button>
</div>