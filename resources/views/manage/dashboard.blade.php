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
@include('manage.todo.todoModal')
<!-- /.modal -->