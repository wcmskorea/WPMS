@extends('layouts.install')

@section('title')OOPS! {{ config('app.name') }} 설치하기@endsection

@section('body_class'){{ "hold-transition register-page" }}@endsection

@section('content')
<div class="register-box">
  <div class="register-logo">
    <a href="/"><b>WPMS</b> v1.0</a>
  </div>
  <div class="register-box-body">
    <p class="login-box-msg"><strong>{{ config('app.name') }}</strong>를 먼저 설치해주십시오.</p>
    <p class="login-box-msg"><strong>{{ config('app.name') }}</strong>가 현재 정상적으로 설치되지 않았습니다.</p>
    <a href="{{ route('install.license') }}" class="btn btn-danger btn-block btn-flat">지금 설치하기</a>
  </div>
</div>
<!-- /.register-box -->
@endsection
