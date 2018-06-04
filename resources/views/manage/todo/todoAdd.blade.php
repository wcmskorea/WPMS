<form method="post" action='/manage/todo'>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="row">
      <div class="col-xs-8 col-sm-9">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-list"></i></span>
          <input type="text" name="title" class="form-control" id="inputTodo" placeholder="할일 제목">
        </div>
      </div>
      <div class="col-xs-4 col-sm-3">
        <div class="input-group">
          <input type="text" name="progress" class="form-control" id="inputProgress" placeholder="진행률">
          <span class="input-group-addon">%</span>
        </div>
      </div>
    </div>
    <div class="box-footer text-center">
      <button type="submit" class="btn bg-purple-active color-palette">할일 저장하기</button>
    </div>
    <!-- /.box-footer -->
  </form>