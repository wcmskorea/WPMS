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
                <li><a href="{{ route('manage.config.show', 4) }}">4. 메일 정보</a></li>
                <li><a href="{{ route('manage.config.show', 5) }}">5. 테마 정보</a></li>
                <li class="active"><a href="{{ route('manage.config.show', 6) }}"><strong class="text-red">6. API 정보</strong></a></li>
                <li class="pull-right box-tools" data-toggle="tooltip" data-placement="left" title="저장하기"><button type="button" class="btn btn-danger btn-sm" onClick="return $('#configForm').submit();"><i class="fa fa-arrow-circle-right"></i></button></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active">
                    
                    <form id="configForm" action="{{ route('manage.config.update') }}" method="post" class="form-horizontal">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="6">

                    <!-- Profile Image -->
                    <div class="box-body">
                        <div class="form-group">
                            <label for="kakaoKey" class="col-sm-2 control-label">카카오 Key</label>
                            <div class="col-sm-10">
                                <input name="kakaoKey" type="text" class="form-control" id="kakaoKey" value="{{ $configApi->kakaoKey }}" placeholder="Input ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kakaoSecret" class="col-sm-2 control-label">카카오 Secret</label>
                            <div class="col-sm-10">
                                <input name="kakaoSecret" type="text" class="form-control" id="kakaoSecret" value="{{ $configApi->kakaoSecret }}" placeholder="Input ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kakaoRedirect" class="col-sm-2 control-label">카카오 Redirect URI</label>
                            <div class="col-sm-10">
                                <input name="kakaoRedirect" type="text" class="form-control" id="kakaoRedirect" value="{{ $configApi->kakaoRedirect }}" placeholder="Input ...">
                                <a href="https://developers.kakao.com" class="btn btn-default pull-right" target="_blank"><i class="fa fa-arrow-circle-right"></i> 앱 등록하기</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="naverKey" class="col-sm-2 control-label">네이버 Key</label>
                            <div class="col-sm-10">
                                <input name="naverKey" type="text" class="form-control" id="naverKey" value="{{ $configApi->naverKey }}" placeholder="Input ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="naverSecret" class="col-sm-2 control-label">네이버 Secret</label>
                            <div class="col-sm-10">
                                <input name="naverSecret" type="text" class="form-control" id="naverSecret" value="{{ $configApi->naverSecret }}" placeholder="Input ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="naverRedirect" class="col-sm-2 control-label">네이버 Redirect URI</label>
                            <div class="col-sm-10">
                                <input name="naverRedirect" type="text" class="form-control" id="naverRedirect" value="{{ $configApi->naverRedirect }}" placeholder="Input ...">
                                <a href="https://developers.naver.com/apps/#/register" class="btn btn-default pull-right" target="_blank"><i class="fa fa-arrow-circle-right"></i> 앱 등록하기</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="facebookKey" class="col-sm-2 control-label">페이스북 Key</label>
                            <div class="col-sm-10">
                                <input name="facebookKey" type="text" class="form-control" id="facebookKey" value="{{ $configApi->facebookKey }}" placeholder="Input ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="facebookSecret" class="col-sm-2 control-label">페이스북 Secret</label>
                            <div class="col-sm-10">
                                <input name="facebookSecret" type="text" class="form-control" id="facebookSecret" value="{{ $configApi->facebookSecret }}" placeholder="Input ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="facebookRedirect" class="col-sm-2 control-label">페이스북 Redirect URI</label>
                            <div class="col-sm-10">
                                <input name="facebookRedirect" type="text" class="form-control" id="facebookRedirect" value="{{ $configApi->facebookRedirect }}" placeholder="Input ...">
                                <a href="https://developers.facebook.com" class="btn btn-default pull-right" target="_blank"><i class="fa fa-arrow-circle-right"></i> 앱 등록하기</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="googleKey" class="col-sm-2 control-label">구글 Key</label>
                            <div class="col-sm-10">
                                <input name="googleKey" type="text" class="form-control" id="googleKey" value="{{ $configApi->googleKey }}" placeholder="Input ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="googleSecret" class="col-sm-2 control-label">구글 Secret</label>
                            <div class="col-sm-10">
                                <input name="googleSecret" type="text" class="form-control" id="googleSecret" value="{{ $configApi->googleSecret }}" placeholder="Input ...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="googleRedirect" class="col-sm-2 control-label">구글 Redirect URI</label>
                            <div class="col-sm-10">
                                <input name="googleRedirect" type="text" class="form-control" id="googleRedirect" value="{{ $configApi->googleRedirect }}" placeholder="Input ...">
                                <a href="https://console.developers.google.com" class="btn btn-default pull-right" target="_blank"><i class="fa fa-arrow-circle-right"></i> 앱 등록하기</a>
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