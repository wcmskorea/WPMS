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
                <li><a href="{{ route('manage.config.show', 1) }}">1. 기본 정보</a></li>
                <li><a href="{{ route('manage.config.show', 2) }}">2. 운영 정보</a></li>
                <li><a href="{{ route('manage.config.show', 3) }}">3. 회원 정보</a></li>
                <li class="active"><a href="{{ route('manage.config.show', 4) }}"><strong class="text-red">4. 메일 정보</strong></a></li>
                <li><a href="{{ route('manage.config.show', 5) }}">5. 테마 정보</a></li>
                <li><a href="{{ route('manage.config.show', 6) }}">6. API 정보</a></li>
                <li class="pull-right box-tools" data-toggle="tooltip" data-placement="left" title="저장하기"><button type="button" class="btn btn-danger btn-sm" onClick="return $('#configForm').submit();"><i class="fa fa-arrow-circle-right"></i></button></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active">
                    
                    <form id="configForm" action="{{ route('manage.config.update') }}" method="post" class="form-horizontal">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="4">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="emailUse" class="col-sm-2 control-label">메일발송 사용</label>
                            <div class="col-sm-10">
                                <label><input type="checkbox" class="flat-red" name="emailUse" id="emailUse" value="yes"@if ($configMail->emailUse){{ ' checked' }}@endif>&nbsp;&nbsp;적용</label>
                                <p class="text-muted pull-right"><i class="fa fa-exclamation"></i> 메일발송 연동 여부</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="emailMaster" class="col-sm-2 control-label">대표 이메일</label>
                            <div class="col-sm-10">
                                <input name="emailMaster" type="text" class="form-control" id="emailMaster" value="{{ $configMail->emailMaster }}" placeholder="Input ...">
                                <p class="text-muted pull-right"><i class="fa fa-exclamation"></i> 메일 발송 및 수신시 사용될 대표 이메일 주소 입력</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="emailMasterName" class="col-sm-2 control-label">대표 이메일 이름</label>
                            <div class="col-sm-10">
                                <input name="emailMasterName" type="text" class="form-control" id="emailMasterName" value="{{ $configMail->emailMasterName }}" placeholder="Input ...">
                                <p class="text-muted pull-right"><i class="fa fa-exclamation"></i> 메일 발송 및 수신시 사용될 대표 이메일의 이름 입력</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="emailSendMaster" class="col-sm-2 control-label">대표 이메일 수신여부</label>
                            <div class="col-sm-10">
                                <label><input type="radio" name="emailSendMaster" class="flat-red" value="1"@if ($configMail->emailSendMaster){{ ' checked' }}@endif> 사용함</label>
                                <label><input type="radio" name="emailSendMaster" class="flat-red" value="0"@if (!$configMail->emailSendMaster){{ ' checked' }}@endif> 사용안함</label>
                                <p class="text-muted pull-right"><i class="fa fa-exclamation"></i> 대표 이메일로 정보 수신 여부</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="emailSendWriter" class="col-sm-2 control-label">작성자 이메일 수신여부</label>
                            <div class="col-sm-10">
                                <label><input type="radio" name="emailSendWriter" class="flat-red" value="1"@if ($configMail->emailSendWriter){{ ' checked' }}@endif> 사용함</label>
                                <label><input type="radio" name="emailSendWriter" class="flat-red" value="0"@if (!$configMail->emailSendWriter){{ ' checked' }}@endif> 사용안함</label>
                                <p class="text-muted pull-right"><i class="fa fa-exclamation"></i> 정보 등록시 작성자에게 이메일 발송 여부</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="emailSendRegister" class="col-sm-2 control-label">회원등록 이메일 발송여부</label>
                            <div class="col-sm-10">
                                <label><input type="radio" name="emailSendRegister" class="flat-red" value="1"@if ($configMail->emailSendRegister){{ ' checked' }}@endif> 사용함</label>
                                <label><input type="radio" name="emailSendRegister" class="flat-red" value="0"@if (!$configMail->emailSendRegister){{ ' checked' }}@endif> 사용안함</label>
                                <p class="text-muted pull-right"><i class="fa fa-exclamation"></i> 회원등록시 등록자에게 이메일 발송 여부</p>
                            </div>
                        </div>
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
        $('input.flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-red',
            radioClass   : 'iradio_flat-red'
        })
    });
</script>
@endsection