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
                <li class="active"><a href="{{ route('manage.config.show', 1) }}"><strong class="text-red">1. 사이트 정보</strong></a></li>
                <li><a href="{{ route('manage.config.show', 2) }}">2. 운영 정보</a></li>
                <li><a href="{{ route('manage.config.show', 3) }}">3. 사용자 정보</a></li>
                <li><a href="{{ route('manage.config.show', 4) }}">4. 메일 정보</a></li>
                <li><a href="{{ route('manage.config.show', 4) }}">5. 테마 정보</a></li>
                <li><a href="{{ route('manage.config.show', 5) }}">6. API 정보</a></li>
                <li class="pull-right box-tools" data-toggle="tooltip" data-placement="left" title="저장하기"><button type="button" class="btn btn-danger btn-sm" onClick="return $('#configForm').submit();"><i class="fa fa-arrow-circle-right"></i></button></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active">
                    
                    <form id="configForm" action="{{ route('manage.config.update') }}" method="post" class="form-horizontal">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="1">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputAdmin" class="col-sm-2 control-label">웹사이트 관리자</label>
                            <div class="col-sm-10">
                                <input name="admin" type="text" class="form-control" id="inputAdmin" value="{{ $configWebsite->admin }}" placeholder="Input ...">
                                <p class="text-muted pull-right"><i class="fa fa-exclamation"></i> 시스템 최고 관리자 계정입니다.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTitle" class="col-sm-2 control-label">웹사이트 제　목</label>
                            <div class="col-sm-10">
                                <input name="title" type="text" class="form-control" id="inputTitle" value="{{ $configWebsite->title }}" placeholder="Input ...">
                                <p class="text-muted pull-right"><i class="fa fa-exclamation"></i> 포털 사이트나 검색엔진에 노출되는 제목입니다.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="textDescription" class="col-sm-2 control-label">웹사이트 설　명</label>
                            <div class="col-sm-10">
                                <textarea name="description" class="form-control" rows="3" id="textDescription" placeholder="Enter ...">{{ $configWebsite->description }}</textarea>
                                <p class="text-muted pull-right"><i class="fa fa-exclamation"></i> 포털 사이트나 검색엔진에 노출되는 사이트 설명입니다.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="textKeywords" class="col-sm-2 control-label">웹사이트 키워드</label>
                            <div class="col-sm-10">
                                <textarea name="keywords" id="textKeywords" class="form-control" rows="3" placeholder="Enter ...">{{ $configWebsite->keywords }}</textarea>
                                <p class="text-muted pull-right"><i class="fa fa-exclamation"></i> 포털 사이트나 검색엔진에 검색되는 키워드입니다. (',' 콤마 구분 입력)</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="textMeta" class="col-sm-2 control-label">메타태그</label>
                            <div class="col-sm-10">
                                <textarea name="metatag" id="textMeta" class="form-control" rows="5" placeholder="Enter ...">{{ $configWebsite->metatag }}</textarea>
                                <p class="text-muted pull-right"><i class="fa fa-exclamation"></i> 사이트 인증이나, 기타 정보를 위한 메타 태그를 입력합니다.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="textScript" class="col-sm-2 control-label">스크립트</label>
                            <div class="col-sm-10">
                                <textarea name="script" id="textScript" class="form-control" rows="5" placeholder="Enter ...">{{ $configWebsite->script }}</textarea>
                                <p class="text-muted pull-right"><i class="fa fa-exclamation"></i> 구글이나 네이버의 Analytics와 같은 분석 스크립트를 삽입합니다.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="textScript" class="col-sm-2 control-label">CSS</label>
                            <div class="col-sm-10">
                                <textarea name="css" id="textCss" class="form-control" rows="5" placeholder="Enter ...">{{ $configWebsite->css }}</textarea>
                                <p class="text-muted pull-right"><i class="fa fa-exclamation"></i> 별도 디자인 적용을 위한 추가 Stylesheet 정보를 삽입합니다.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="textFilter" class="col-sm-2 control-label">단어 필터링</label>
                            <div class="col-sm-10">
                                <textarea name="filterwords" id="textFilter" class="form-control" rows="5" placeholder="Enter ...">{{ $configWebsite->filterwords[0] }}</textarea>
                                <p class="text-muted pull-right"><i class="fa fa-exclamation"></i> 사이트내 불법광고 및 스팸, 비방성 글을 제한하기 위한 단어를 입력하세요. (',' 콤마 구분 입력)</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="textAllow" class="col-sm-2 control-label">허용 아이피</label>
                            <div class="col-sm-10">
                                <textarea name="ipallow" id="textAllow" class="form-control" rows="3" placeholder="ex) 127.0.0,1111.222.333.444,000.000.000.000">{{ $configWebsite->ipallow[0] }}</textarea>
                                <p class="text-muted pull-right"><i class="fa fa-exclamation"></i> 접근허용 아이피는 관리자 페이지 접근에 한하여 제한됩니다. (',' 콤마 구분 입력)</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="textDeny" class="col-sm-2 control-label">차단 아이피</label>
                            <div class="col-sm-10">
                                <textarea name="ipdeny" id="textDeny" class="form-control" rows="3" placeholder="ex)  127.0.0,1111.222.333.444,000.000.000.000">{{ $configWebsite->ipdeny[0] }}</textarea>
                                <p class="text-muted pull-right"><i class="fa fa-exclamation"></i> 접근차단 아이피는 관리자 페이지 및 사용자 페이지까지 접근 제한됩니다. (',' 콤마 구분 입력)</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputFileAllow" class="col-sm-2 control-label">파일 확장자</label>
                            <div class="col-sm-10">
                                <input name="fileallow" type="text" class="form-control" id="inputFileAllow" value="{{ $configWebsite->fileallow }}" placeholder="Input ...">
                                <p class="text-muted pull-right"><i class="fa fa-exclamation"></i> 사이트내 등록 가능한 파일의 유형을 입력합니다. ('|' 구분 입력)</p>
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