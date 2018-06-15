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
    <p class="login-box-msg">회원가입약관 및 개인정보취급방침에 동의하셔야 합니다!</p>

    <form class="col-md-12" id="userForm" name="userForm" role="form" method="POST" action="{{ route('user.register') }}">
    {{ csrf_field() }}
        <div class="form-group has-feedback">
            <input type="text" name="name" class="form-control" placeholder="이름" vlaue="{{ old('name') }}">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="email" name="email" class="form-control" placeholder="이메일" vlaue="{{ old('email') }}">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="비밀번호">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" name="password_confirmation" class="form-control" placeholder="비밀번호 확인">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                <label>
                    <input type="checkbox" class="flat-red"> I agree to the <a href="#">terms</a>
                </label>
                </div>
            </div><!-- /.col -->            
            <div class="col-xs-4">
                <button type="submit" class="btn btn-danger btn-block btn-flat">등록하기</button>
            </div><!-- /.col -->        
        </div><!-- /.col -->
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

    <a href="#">비밀번호를 잃어버리셨나요?</a>
    <a href="{{ route('login') }}" class="text-center pull-right">로그인 바로가기</a>

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