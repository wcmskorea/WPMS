@extends('layouts.manage')

@section('title') {{ $title or "WPMS v1.0" }} @endsection

@section('body_class'){{ "hold-transition skin-purple sidebar-mini" }}@endsection

@section('content')
<div class="wrapper">

  <!-- Header -->
  @include('manage.header')

  <!-- Sidebar -->
  @include('manage.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $page_title or "Dashboard" }}
        <small>{{ $page_description or null }}</small>
      </h1>
      <!-- You can dynamically generate breadcrumbs here -->
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> wpms</a></li>
        <li class="active">Todo</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">          
      <!-- Your Page Content Here -->
      <div class="col">
        <!-- Box -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">ToDo List</h3>
            <div class="box-tools pull-right"></div>
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
              <small class="label label-default pull-right">{{ $todo['progress'] }}%</small>
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
            <button type="button" class="btn btn-primary pull-right" id="addNewTodo" data-toggle="modal" data-target="#modal-todo"><i class="fa fa-plus"></i> 할일 추가하기</button>
          </div>
        </div><!-- /.box -->
      </div><!-- /.col -->
      <div class="col">
        <!-- Box -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Done List</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <ul class="todo-list">
              @foreach($done as $todo)
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
                @if ($todo->deleted_at)<small class="label label-default pull-right">삭제됨</small>@else<small class="label label-default pull-right">{{ $todo['progress'] }}%</small>@endif
                <!-- Emphasis label -->
                <small class="label label-{{ $todo['color'] }}"><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $todo->updated_at)->diffForHumans() }}</small>                
                <!-- General tools such as edit or delete-->
                <div class="tools">
                  <i class="fa fa-edit todoListEdit" data-id="{{ $todo['id'] }}" data-title="{{ $todo['title'] }}" data-progress="{{ $todo['progress'] }}" data-toggle="modal" data-target="#modal-todo"></i>
                  @if (!$todo->deleted_at)<i class="fa fa-trash-o todoListDel" data-id="{{ $todo['id'] }}" data-title="{{ $todo['title'] }}" data-progress="{{ $todo['progress'] }}" data-toggle="modal" data-target="#modal-todo"></i>@endif
                </div>
              </li>
              @endforeach
            </ul>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
        <div class="box-tools">{{ $done->links() }}</div>
      </div><!-- /.col -->
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->

  <!-- /.modal -->
  @include('manage.todo.todoModal')
  <!-- /.modal -->

  <!-- Footer -->
  @include('manage.footer')

  <!-- Side Panel -->
  @include('manage.sidepanel')

  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->
@endsection