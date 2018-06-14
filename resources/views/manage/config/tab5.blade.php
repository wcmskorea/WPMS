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
                <li class="active"><a href="{{ route('manage.config.show', 5) }}"><strong class="text-red">5. 테마 정보</strong></a></li>
                <li><a href="{{ route('manage.config.show', 6) }}">6. API 정보</a></li>
                <li class="pull-right box-tools" data-toggle="tooltip" data-placement="left" title="저장하기"><button type="button" class="btn btn-danger btn-sm" onClick="return $('#configForm').submit();"><i class="fa fa-arrow-circle-right"></i></button></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active">
                    
                    <form id="configForm" action="{{ route('manage.config.update') }}" method="post" class="form-horizontal">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="5">

                    <!-- Profile Image -->
                    <div class="row">
                        <div class="cell col-lg-2">
                            <div class="box box-danger">
                                <div class="box-body box-profile">
                                <img class="profile-user-img img-responsive img-rounded" src="/bower/admin-lte/dist/img/user4-128x128.jpg" alt="Theme picture">
                                <h3 class="profile-username text-center">Default</h3>
                                <p class="text-muted text-center">for Business</p>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <b>생성일</b> <a class="pull-right">2018.06.01</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>반영일</b> <a class="pull-right">2018.06.01</a>
                                    </li>
                                    <li class="list-group-item">
                                        <label><input type="radio" name="theme" class="flat-red" value="default"@if ($configTheme->theme){{ ' checked' }}@endif> 적용중</label>
                                        <label class=" pull-right"><input type="radio" name="theme" class="flat-red" value="0"@if (!$configTheme->theme){{ ' checked' }}@endif> 적용안함</label>
                                    </li>
                                </ul>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.cell -->
                    </div><!-- /.row -->

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