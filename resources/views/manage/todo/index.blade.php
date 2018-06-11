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
        <li class="active">{{ $page_title or "Dashboard" }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">          
      <!-- Your Page Content Here -->
      <div class="col">
        <!-- Box -->
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-folder-open"></i> 진행중인 할일</h3>
            <div class="box-tools pull-right"></div>
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
              <small class="label label-{{ $todo['color'] }}"><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $todo->updated_at)->diffForHumans() }}</small>
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
            <button type="button" class="btn btn-danger pull-right" id="addNewTodo" data-toggle="modal" data-target="#modal-todo"><i class="fa fa-plus"></i>&nbsp;&nbsp;할일 추가하기</button>
          </div>
        </div><!-- /.box -->
      </div><!-- /.col -->
      <div class="col">
        <!-- Box -->
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-navicon"></i> 완료된 할일</h3>
            <div class="pull-right box-tools">
            {{ $done->links() }}
              </div>
          </div>
          <div class="box-body">
            <ul class="todo-list">
              @foreach($done as $todo)
              <li class="item{{$todo->id}}@if($todo->deleted_at){{' done'}}@else{{' success'}}@endif">
                <!-- checkbox -->
                <input type="checkbox" class="published" data-toggle="tooltip" data-placement="bottom" title="진행하기" data-id="{{$todo->id}}" @if ($todo->done) checked @endif>
                <!-- todo text -->
                <span class="text"> {{ $todo['title'] }} </span>
                <small class="label label-default pull-right">{{ $todo['progress'] }} %</small>
                <!-- Emphasis label -->
                <small class="label label-success"><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $todo->updated_at)->diffForHumans() }}</small>                
                <!-- General tools such as edit or delete-->
                @if (!$todo->deleted_at)<div class="tools">
                  <i class="fa fa-edit todoListEdit" data-id="{{ $todo['id'] }}" data-title="{{ $todo['title'] }}" data-progress="{{ $todo['progress'] }}" data-toggle="modal" data-target="#modal-todo"></i>
                  <i class="fa fa-trash-o todoListDel" data-id="{{ $todo['id'] }}" data-title="{{ $todo['title'] }}" data-progress="{{ $todo['progress'] }}" data-toggle="modal" data-target="#modal-todo"></i>
                </div>@endif
              </li>
              @endforeach
            </ul>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->

  <!-- /.modal -->
  @include('manage.todo.todoModal')
  <!-- Footer -->
  @include('manage.footer')
  <!-- Side Panel -->
  @include('manage.sidepanel')
</div><!-- ./wrapper -->
@endsection

@section('add_js')
<script>
  $(function () {
    $('#treeProject').addClass("active");
  });
</script>
@endsection