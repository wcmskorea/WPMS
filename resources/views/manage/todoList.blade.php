<div class="box-header with-border">
  <h3 class="box-title">Randomly Generated Tasks</h3>
  <div class="box-tools pull-right">
    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
  </div>
</div>
<div class="box-body">
  @foreach($tasks as $task)
  <h5>
    <a href="/manage/todo/{{ $task['id'] }}">{{ $task['title'] }}</a>
    <small class="label label-danger pull-right">{{ $task['progress'] }}%</small>
  </h5>
  <div class="progress progress-xxs">
    <div class="progress-bar progress-bar-danger" style="width: {{ $task['progress'] }}%"></div>
  </div>
  @endforeach
  <form method="post" action='/manage/todo'>
  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="form-group">
      <label for="inputTask" class="control-label">Task Title</label>
      <input type="text" name="title" class="form-control" id="inputTask" placeholder="Input Task Title...">
    </div>
    <div class="form-group">
      <label for="inputProgress" class="control-label">Progress</label>
      <div class="input-group">
        <input type="text" name="progress" class="form-control" id="inputProgress" placeholder="Input Progress...">
        <span class="input-group-addon">%</span>
      </div>
    </div>
    <div class="form-group">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="done" value="2"> It's done!!
        </label>
      </div>
      </div>
    <div class="box-footer">
      <button type="submit" class="btn btn-default">Cancel</button>
      <button type="submit" class="btn btn-info pull-right">Submit</button>
    </div>
    <!-- /.box-footer -->
  </form>  
</div><!-- /.box-body-->