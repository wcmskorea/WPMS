@extends("theme.". cache('config.theme')->theme. ".layout.master")
@section('title')회원가입약관 | {{ cache("config.website")->title }}@endsection
@section('body_class'){{ "hold-transition login-page" }}@endsection

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>WCMS</b> v1.0</a>
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

    <form class="col-md-12" id="userForm" name="userForm" role="form" method="POST" action="{{ route('user.register.form') }}">
    {{ csrf_field() }}
        <section class="row">
            <h4>회원가입약관</h4>
            <div class="form-group">
                <textarea class="policy" readonly>{{ cache('config.user')->useStipulation }}</textarea>
                <fieldset class="pull-right">
                    <label for="agreeStipulation">회원가입약관의 내용에 동의합니다.</label>
                    <input type="checkbox" id="agreeStipulation" name="agreeStipulation" class="flat-red" value="1" >
                </fieldset>
            </div>
        </section>
        <section class="row">
            <h4>개인정보처리방침안내</h4>
            <div class="form-group">
                <textarea class="policy" readonly>{{ cache('config.user')->usePrivacy }}</textarea>
                <fieldset class="pull-right">
                    <label for="agreePrivacy">개인정보처리방침안내의 내용에 동의합니다.</label>
                    <input type="checkbox" id="agreePrivacy" name="agreePrivacy" class="flat-red" value="1" >
                </fieldset>
            </div>
        </section>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-block btn-danger">회원가입</button>
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