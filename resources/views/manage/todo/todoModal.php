<div class="modal fade" id="modal-todo">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <form id="todoForm" method="post" action='/manage/todo'>
      <input type="hidden" name="_method" id="todoMethod" value="POST" />
      <input type="hidden" name="id" id="todoId" value="" />

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-navicon"></i> <span>Primary Modal</span></h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger alert-dismissible hidden">
          <h4><i class="icon fa fa-ban"></i>확인 하세요!</h4>
          <ul>
          </ul>
        </div>
        <div class="row">
          <div class="form-group has-error col-xs-8 col-sm-9">
            <label class="control-label" for="title"><i class="fa fa-check"></i> 할일 제목</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-list"></i></span>
              <input type="text" name="title" class="form-control active" id="todoTitle" placeholder="할일 제목">
            </div>
          </div>
          <div class="form-group has-error col-xs-4 col-sm-3">
            <label class="control-label" for="progress"><i class="fa fa-check"></i> 진행율 (1~100)</label>
            <div class="input-group">
              <input type="text" name="progress" class="form-control" id="todoProgress" placeholder="진행율">
              <span class="input-group-addon">%</span>
            </div>
          </div>
        </div>
        <!-- /.box-footer -->
      </div>
      <div class="modal-footer">
          <button id="todoSubmit" type="submit" class="btn btn-danger add" data-dismiss="modal">저장하기</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">취소</button>
      </div>
      
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>