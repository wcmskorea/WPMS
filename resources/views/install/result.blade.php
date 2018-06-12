@extends('layouts.install')

@section('title')OOPS! {{ config('app.name') }} 설치완료@endsection

@section('body_class'){{ "hold-transition register-page" }}@endsection

@section('content')
<div class="register-box">
  <div class="register-logo">
    <a href="/"><b>WPMS</b> v1.0</a>
  </div>
  <div class="register-box-body">
    <p class="login-box-msg"><strong>Congratulations!!</strong></p>
    <p class="login-box-msg"><strong>{{ config('app.name') }}</strong>의 설치가 완료되었습니다.</p>
    <a href="{{ route('manage.dashboard') }}" class="btn btn-success btn-block btn-flat">새로운 홈페이지 바로가기</a>
  </div>
</div>
<!-- /.register-box -->
@endsection
