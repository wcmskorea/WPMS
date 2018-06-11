<div class="row">
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-default">
      <span class="info-box-icon"><i class="fa fa-flag-o"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">ToDo</span>
        <span class="info-box-number text-red">{{ $todos_count }} 건</span>

        <div class="progress">
          <div class="progress-bar" style="width: {{ $todos_progress }}%"></div>
        </div>
            <span class="progress-description">
            평균 진행률 : {{ $todos_progress }}%
            </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-default">
      <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Project</span>
        <span class="info-box-number">41,410</span>

        <div class="progress">
          <div class="progress-bar" style="width: 70%"></div>
        </div>
            <span class="progress-description">
              70% Increase in 30 Days
            </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-default">
      <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Schedule</span>
        <span class="info-box-number">41,410</span>

        <div class="progress">
          <div class="progress-bar" style="width: 70%"></div>
        </div>
            <span class="progress-description">
              70% Increase in 30 Days
            </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-default">
      <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Visitors</span>
        <span class="info-box-number">41,410</span>

        <div class="progress">
          <div class="progress-bar" style="width: 70%"></div>
        </div>
            <span class="progress-description">
              70% Increase in 30 Days
            </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  </div>
  <!-- /.row -->

<div class="row">
  <div class="col-md-6">
    <!-- Box -->
    <div class="box box-danger">

      @include('manage.todo.todoWidget')

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