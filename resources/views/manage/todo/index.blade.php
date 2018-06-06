@extends('layouts.manage')

@section('title') {{ $title or "WPMS v1.0" }} @endsection

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
                <small class="label label-default pull-right">{{ $todo['progress'] }}%</small>
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
  <div class="modal fade" id="modal-todo">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <form id="todoForm" method="post" action='/manage/todo'>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="_method" id="todoMethod" value="POST" />
        <input type="hidden" name="id" id="todoId" value="" />

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Primary Modal</h4>
        </div>
        <div class="modal-body">
          <div class="alert alert-danger alert-dismissible hidden">
            <h4><i class="icon fa fa-ban"></i>확인 하세요!</h4>
            <ul>
            </ul>
          </div>
          <div class="row">
            <div class="form-group has-warning col-xs-8 col-sm-9">
              <label class="control-label" for="title"><i class="fa fa-check"></i> 할일 제목</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-list"></i></span>
                <input type="text" name="title" class="form-control active" id="todoTitle" placeholder="할일 제목">
              </div>
            </div>
            <div class="form-group has-warning col-xs-4 col-sm-3">
              <label class="control-label" for="progress"><i class="fa fa-check"></i> 중요도 (1~100)</label>
              <div class="input-group">
                <input type="text" name="progress" class="form-control" id="todoProgress" placeholder="중요도">
                <span class="input-group-addon">%</span>
              </div>
            </div>
          </div>
          <!-- /.box-footer -->
        </div>
        <div class="modal-footer">
            <button id="todoSubmit" type="submit" class="btn btn-primary add" data-dismiss="modal">저장하기</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">취소</button>
        </div>
        
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- Footer -->
  @include('manage.footer')

  <!-- Side Panel -->
  @include('manage.sidepanel')

  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->
@endsection