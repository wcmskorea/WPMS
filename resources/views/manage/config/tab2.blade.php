@extends('layouts.manage')
@section('title') {{ $configWebsite->title or "WPMS v1.0" }} @endsection
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
      <h1>{{ $page_title or "Dashboard" }}<small>{{ $page_description or null }}</small></h1>
      <!-- You can dynamically generate breadcrumbs here -->
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> wpms</a></li>
        <li class="active">{{ $page_title or "Dashboard" }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Show Error Messages -->
        @include('manage.errors')
        <!-- Your Page Content Here -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li><a href="{{ route('manage.config.show', 1) }}">1. 사이트 정보</a></li>
                <li class="active"><a href="{{ route('manage.config.show', 2) }}"><strong class="text-red">2. 운영 정보</strong></a></li>
                <li><a href="{{ route('manage.config.show', 3) }}">3. 사용자 정보</a></li>
                <li><a href="{{ route('manage.config.show', 4) }}">4. 메일 정보</a></li>
                <li><a href="{{ route('manage.config.show', 4) }}">5. 테마 정보</a></li>
                <li><a href="{{ route('manage.config.show', 5) }}">6. API 정보</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active">
                    
                    <form action="{{ route('manage.config.update') }}" method="post" class="form-horizontal">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="2">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="checkPoint" class="col-sm-2 control-label">포인트 적용</label>
                            <div class="col-sm-10">
                                <label><input type="checkbox" class="flat-red" name="pointuse" value="yes">&nbsp;&nbsp;적용</label>
                                <p class="text-muted pull-right"><i class="fa fa-exclamation"></i> 포인트 제도 사용여부</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pointLogin" class="col-sm-2 control-label">로그인시 포인트</label>
                            <div class="col-sm-10">
                                <input name="pointlogin" type="text" class="form-control" id="pointLogin" value="{{ $configPolicy->pointLogin }}" placeholder="Input ...">
                                <p class="text-muted pull-right"><i class="fa fa-exclamation"></i> 사용자 로그인시 1일 1회 적립 포인트</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pointRegist" class="col-sm-2 control-label">회원등록 포인트</label>
                            <div class="col-sm-10">
                                <input name="pointregist" type="text" class="form-control" id="pointRegist" value="{{ $configPolicy->pointRegist }}" placeholder="Input ...">
                                <p class="text-muted pull-right"><i class="fa fa-exclamation"></i> 사용자 로그인시 1일 1회 적립 포인트</p>
                            </div>
                        </div>
                    <!-- <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <label><input type="checkbox" class="flat-red" name="agree" value="yes">&nbsp;&nbsp;데이터를 관리하는 관리자로써 정보보호 서약에 동의합니다.</label>
                            </div>
                        </div> -->
                    </div><!-- /.box-body -->    
                    <div class="box-footer">
                        <button type="submit" class="btn btn-danger btn-lg pull-right">저장하기 <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    </form><!-- /.form -->

                </div>
            </div><!-- /.tab-content -->
        </div><!-- /.nav-tabs-custom -->
      
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->

  <!-- Footer -->
  @include('manage.footer')
  <!-- Side Panel -->
  @include('manage.sidepanel')
</div><!-- ./wrapper -->
@endsection

@section('add_js')
<script>
    $(function () {
        // 사이드바 현재 위치 활성화
        $('#treeConfig').addClass("active");
        // 라디오버튼 UI
        $('input[type="checkbox"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-red',
            radioClass   : 'iradio_flat-red'
        })
    });
</script>
@endsection