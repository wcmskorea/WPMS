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
                <li class="active"><a href="{{ route('manage.config.show', 3) }}"><strong class="text-red">3. 회원 정보</strong></a></li>
                <li><a href="{{ route('manage.config.show', 4) }}">4. 메일 정보</a></li>
                <li><a href="{{ route('manage.config.show', 5) }}">5. 테마 정보</a></li>
                <li><a href="{{ route('manage.config.show', 6) }}">6. API 정보</a></li>
                <li class="pull-right box-tools" data-toggle="tooltip" data-placement="left" title="저장하기"><button type="button" class="btn btn-danger btn-sm" onClick="return $('#configForm').submit();"><i class="fa fa-arrow-circle-right"></i></button></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active">
                    
                    <form id="configForm" action="{{ route('manage.config.update') }}" method="post" class="form-horizontal">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="3">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="useSns" class="col-sm-2 control-label">SNS 로그인 적용</label>
                            <div class="col-sm-10">
                                <label><input type="checkbox" class="flat-red" name="useSns" id="useSns" value="yes"@if ($configUser->useSns){{ ' checked' }}@endif>&nbsp;&nbsp;적용</label>
                                <p class="text-muted pull-right"><i class="fa fa-exclamation"></i> SNS 계정연동 로그인 사용 여부</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="useName" class="col-sm-2 control-label">이름 입력여부</label>
                            <div class="col-sm-10">
                                <label><input type="radio" name="useName" class="flat-red" value="1"@if ($configUser->useName){{ ' checked' }}@endif> 사용함</label>
                                <label><input type="radio" name="useName" class="flat-red" value="0"@if (!$configUser->useName){{ ' checked' }}@endif> 사용안함</label>
                                <p class="text-muted pull-right"><i class="fa fa-exclamation"></i> 회원등록시 이름 입력 여부</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="useTel" class="col-sm-2 control-label">전화번호 입력여부</label>
                            <div class="col-sm-10">
                                <label><input type="radio" name="useTel" class="flat-red" value="1"@if ($configUser->useName){{ ' checked' }}@endif> 사용함</label>
                                <label><input type="radio" name="useTel" class="flat-red" value="0"@if (!$configUser->useTel){{ ' checked' }}@endif> 사용안함</label>
                                <p class="text-muted pull-right"><i class="fa fa-exclamation"></i> 회원등록시 전화번호 입력 여부</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="useMobile" class="col-sm-2 control-label">휴대전화번호 입력여부</label>
                            <div class="col-sm-10">
                                <label><input type="radio" name="useMobile" class="flat-red" value="1"@if ($configUser->useMobile){{ ' checked' }}@endif> 사용함</label>
                                <label><input type="radio" name="useMobile" class="flat-red" value="0"@if (!$configUser->useMobile){{ ' checked' }}@endif> 사용안함</label>
                                <p class="text-muted pull-right"><i class="fa fa-exclamation"></i> 회원등록시 휴대전화번호 입력 여부</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="useAddress" class="col-sm-2 control-label">주소 입력여부</label>
                            <div class="col-sm-10">
                                <label><input type="radio" name="useAddress" class="flat-red" value="1"@if ($configUser->useAddress){{ ' checked' }}@endif> 사용함</label>
                                <label><input type="radio" name="useAddress" class="flat-red" value="0"@if (!$configUser->useAddress){{ ' checked' }}@endif> 사용안함</label>
                                <p class="text-muted pull-right"><i class="fa fa-exclamation"></i> 회원등록시 주소 입력 여부</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="useCertEamil" class="col-sm-2 control-label">이메일 인증여부</label>
                            <div class="col-sm-10">
                                <label><input type="radio" name="useCertEamil" class="flat-red" value="1"@if ($configUser->useCertEamil){{ ' checked' }}@endif> 사용함</label>
                                <label><input type="radio" name="useCertEamil" class="flat-red" value="0"@if (!$configUser->useCertEamil){{ ' checked' }}@endif> 사용안함</label>
                                <p class="text-muted pull-right"><i class="fa fa-exclamation"></i> 회원등록시 이메일 인증 사용 여부</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="useProfile" class="col-sm-2 control-label">프로필 입력여부</label>
                            <div class="col-sm-10">
                                <label><input type="radio" name="useProfile" class="flat-red" value="1"@if ($configUser->useProfile){{ ' checked' }}@endif> 사용함</label>
                                <label><input type="radio" name="useProfile" class="flat-red" value="0"@if (!$configUser->useProfile){{ ' checked' }}@endif> 사용안함</label>
                                <p class="text-muted pull-right"><i class="fa fa-exclamation"></i> 회원등록시 프로필 입력 여부</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="defaultLevel" class="col-sm-2 control-label">기본 회원등급</label>
                            <div class="col-sm-10">
                                <select class="form-control defaultLevel" name="defaultLevel" id="defaultLevel" style="width: 100%;">
                                <option disabled="disabled">1 (운영자 선택불가)</option>
                                <option @if ($configUser->defaultLevel == '2'){{ 'selected="selected"' }}@endif>2</option>
                                <option @if ($configUser->defaultLevel == '3'){{ 'selected="selected"' }}@endif>3</option>
                                <option @if ($configUser->defaultLevel == '4'){{ 'selected="selected"' }}@endif>4</option>
                                <option @if ($configUser->defaultLevel == '5'){{ 'selected="selected"' }}@endif>5</option>
                                <option @if ($configUser->defaultLevel == '6'){{ 'selected="selected"' }}@endif>6</option>
                                <option @if ($configUser->defaultLevel == '7'){{ 'selected="selected"' }}@endif>7</option>
                                <option @if ($configUser->defaultLevel == '8'){{ 'selected="selected"' }}@endif>8</option>
                                <option @if ($configUser->defaultLevel == '9'){{ 'selected="selected"' }}@endif>9</option>
                                </select>
                                <p class="text-muted pull-right"><i class="fa fa-exclamation"></i> 회원등록시 기본 회원등급 설정</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="useStipulation" class="col-sm-2 control-label">회원등록약관</label>
                            <div class="col-sm-10">
                                <textarea name="useStipulation" id="useStipulation" class="form-control" rows="5" placeholder="Enter ...">{{ $configUser->useStipulation }}</textarea>
                                <p class="text-muted pull-right"><i class="fa fa-exclamation"></i> 해당 웹사이트에 맞는 회원약관을 입력합니다.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="usePrivacy" class="col-sm-2 control-label">개인정보취급방침</label>
                            <div class="col-sm-10">
                                <textarea name="usePrivacy" id="usePrivacy" class="form-control" rows="5" placeholder="Enter ...">{{ $configUser->usePrivacy }}</textarea>
                                <p class="text-muted pull-right"><i class="fa fa-exclamation"></i> 해당 웹사이트에 맞는 개인정보처리방침을 입력합니다.</p>
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