@extends('layouts.install')

@section('title')OOPS! {{ config('app.name') }} 라이센스 확인@endsection

@section('body_class'){{ "hold-transition register-page" }}@endsection

@section('content')
<div class="register-box">
    <div class="register-logo">
        <a href="/"><b>WPMS</b> v1.0</a>
    </div>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1"><strong class="text-red">1. 라이센스</strong></a></li>
            <li><a href="#tab_2">2. 초기설정</a></li>
            <li><a href="#tab_3">3. 설치완료</a></li>
        </ul>
        <form action="{{ route('install.license.check') }}" method="post" onsubmit="return checkSubmit(this);">
        {{ csrf_field() }}
        <div class="tab-content">
            <div class="tab-pane active">
                <br>
                <p class="login-box-msg"><strong class="st_strong">라이센스(License) 내용을 반드시 확인하십시오.</strong><br>라이센스에 동의하시는 경우에만 설치가 진행됩니다.</p>
                <textarea class="license">
그냥 쓰세요~ 편하게~
                </textarea>
            </div>
        </div><!-- /.tab-content -->
        <div class="register-box-body">
            <p class="login-box-msg"><label><input type="checkbox" name="agree" id="checkAgree" class="flat-red" value="yes"> 동의 합니다.</label></p>
            <button type="submit" class="btn btn-danger btn-block btn-flat">다음단계</a>
        </div>
        </form>
    </div><!-- /.nav-tabs-custom -->
</div><!-- /.register-box -->

@endsection

@section('add_js')
<script>

    $(function () {
        $('input[type="checkbox"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-red',
            radioClass   : 'iradio_flat-red'
        });
    });

    function checkSubmit(f)
    {
        if (!f.agree.checked) {
            alert("라이센스 내용에 동의하셔야 설치가 가능합니다.");
            return false;
        }
        return true;
    }

</script>
@endsection