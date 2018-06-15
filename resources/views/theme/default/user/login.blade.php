@extends("theme.". cache('config.theme')->theme. ".layout.master")
@section('title')회원가입약관 | {{ cache("config.website")->title }}@endsection
@section('body_class'){{ "hold-transition login-page" }}@endsection

@section('content')

<div class="login-box">
  <div class="login-logo">
    <a href="/"><b>WCMS</b> v1.0</a>
  </div>

  @if($errors->any())
  <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-warning"></i>확인 하세요!</h4>
      <ul>
      @foreach($errors->all() as $message)
          <li>{{ $message }}</li>
      @endforeach
      </ul>
  </div>
  @endif

  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">가입하신 이메일과 비밀번호로 로그인 하세요!</p>

    <form role="form" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email" vlaue="{{ old('name') }}" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember" class="flat-red" checked> 자동 로그인
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-danger btn-block btn-flat">로그인</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    @if(cache('config.api')->naverKey || cache('config.api')->kakaoKey || cache('config.api')->facebookKey || cache('config.api')->googleKey)
    <div class="social-auth-links text-center">
      <p>- OR -</p>
      @if(cache('config.api')->facebookKey)
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
      @endif
      @if(cache('config.api')->googleKey)
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
      @endif
    </div>
    <!-- /.social-auth-links -->
    @endif

    <a href="{{ route('remind.create') }}">비밀번호를 잃어버리셨나요?</a>
    <a href="{{ route('user.terms') }}" class="text-center pull-right">회원등록 바로가기</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

@endsection

@section('add_js')
<script>
  $(function () {
    $('input.flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-red',
        radioClass   : 'iradio_flat-red'
    });
  });
</script>
@endsection