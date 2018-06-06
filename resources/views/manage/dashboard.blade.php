@if($errors->any())
<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h4><i class="icon fa fa-ban"></i>확인 하세요!</h4>
  <ul>
  @foreach($errors->all() as $message)
    <li>{{ $message }}</li>
  @endforeach
  </ul>
</div>
@endif

<div class="row">
  <div class="col-md-6">
    <!-- Box -->
    <div class="box box-primary">

      @include('manage.todo.todoList')

    </div><!-- /.box -->
  </div><!-- /.col -->
  <div class="col-md-6">
    <!-- Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Second Box</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
          <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        A separate section to add any kind of widget. Feel free
        to explore all of AdminLTE widgets by visiting the demo page
        on <a href="https://almsaeedstudio.com">Almsaeed Studio</a>.
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div><!-- /.col -->

</div><!-- /.row -->

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