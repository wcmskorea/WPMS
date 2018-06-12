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
            <h3 class="box-title"><i class="fa fa-tasks"></i> 진행중인 할일</h3>
            <div class="box-tools pull-right"></div>
          </div>
          <div class="box-body">
            <table class="table table-bordered">
              <tr>
              <th style="width: 10px">#</th>
                <th>Task</th>
                <th style="width: 40px">Tools</th>
                <th style="width: 20%">Progress</th>
                <th style="width: 40px">Label</th>
              </tr>
              @foreach($todos as $todo)
              <tr>
                <td class="danger"><input type="checkbox" class="published" data-toggle="tooltip" data-placement="bottom" title="완료하기" data-id="{{$todo->id}}" @if ($todo->done) checked @endif></td>
                <td>{{ $todo['title'] }}&nbsp;&nbsp;&nbsp;<small class="label label-default"><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $todo->updated_at)->diffForHumans() }}</small></td>
                <td class="text-center">
                  <i class="fa fa-edit todoListEdit" data-id="{{ $todo['id'] }}" data-title="{{ $todo['title'] }}" data-progress="{{ $todo['progress'] }}" data-toggle="modal" data-target="#modal-todo"></i>
                  <i class="fa fa-trash-o todoListDel" data-id="{{ $todo['id'] }}" data-title="{{ $todo['title'] }}" data-progress="{{ $todo['progress'] }}" data-toggle="modal" data-target="#modal-todo"></i>
                </td>
                <td>
                  <div class="progress progress-sm progress-striped active">
                    <div class="progress-bar progress-bar-{{ $todo['color'] }}" style="width: {{ $todo['progress'] }}%"></div>
                  </div>
                </td>
                <td><span class="badge }}">{{ $todo['progress'] }}%</span></td>                
              </tr>
              @endforeach
            </table>
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
            <table class="table table-bordered">
              <tr>
                <th style="width: 10px">#</th>
                <th>Task</th>
                <th style="width: 40px">Tools</th>
                <th style="width: 20%">Progress</th>
                <th style="width: 40px">Label</th>
              </tr>
              @foreach($done as $todo)
              <tr>
                <td class="success"><input type="checkbox" class="published" data-toggle="tooltip" data-placement="bottom" title="다시 진행하기" data-id="{{$todo->id}}" @if ($todo->done) checked @endif></td>
                <td>{{ $todo['title'] }}&nbsp;&nbsp;&nbsp;<small class="label label-default"><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $todo->updated_at)->diffForHumans() }}</small></td>
                <td class="text-center">
                  <i class="fa fa-edit todoListEdit" data-id="{{ $todo['id'] }}" data-title="{{ $todo['title'] }}" data-progress="{{ $todo['progress'] }}" data-toggle="modal" data-target="#modal-todo"></i>
                  <i class="fa fa-trash-o todoListDel" data-id="{{ $todo['id'] }}" data-title="{{ $todo['title'] }}" data-progress="{{ $todo['progress'] }}" data-toggle="modal" data-target="#modal-todo"></i>
                </td>
                <td>
                  <div class="progress progress-sm progress-striped active">
                    <div class="progress-bar progress-bar-{{ $todo['color'] }}" style="width: {{ $todo['progress'] }}%"></div>
                  </div>
                </td>
                <td><span class="badge }}">{{ $todo['progress'] }}%</span></td>
              </tr>
              @endforeach
            </table>
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