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
            <li><a href="#tab_1">1. 라이센스</a></li>
            <li class="active"><a href="#tab_2"><strong class="text-red">2. 초기설정</strong></a></li>
            <li><a href="#tab_3">3. 설치완료</a></li>
        </ul>
        <div class="tab-content">
            
            <div class="box">
                
                <!-- form start -->
                <form action="{{ route('install.setup') }}" method="post" autocomplete="off" class="form-horizontal" onsubmit="return checkSubmit(this);">
                {{ csrf_field() }}

                <div class="box-header with-border">
                    <h3 class="box-title">APP</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputApp" class="col-sm-3 control-label">APP URL</label>
                        <div class="col-sm-9">
                            <input name="appUrl" type="text" class="form-control" id="inputApp" value="{{ old('appUrl') ? : env('APP_URL', Request::root()) }}" placeholder="URL...">
                            @foreach ($errors->get('appUrl') as $message)
                            <strong>{{ $message }} (URL 형태)</strong>
                            @endforeach
                        </div>
                    </div>
                </div><!-- /.box-body -->

                <div class="box-header with-border">
                    <h3 class="box-title">MySQL</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <label for="mysqlHost" class="col-sm-3 control-label">Host</label>
                        <div class="col-sm-9">
                            <input name="mysqlHost" type="text" class="form-control" value="{{ old('mysqlHost') ? : env('DB_HOST', 'localhost') }}" id="mysqlHost" placeholder="MySQL Host...">
                            @foreach ($errors->get('mysqlHost') as $message)
                            <strong>{{ $message }} (영문자, 숫자, 점(.))</strong>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mysqlPort" class="col-sm-3 control-label">Port</label>
                        <div class="col-sm-9">
                            <input name="mysqlPort" type="text" class="form-control" value="{{ old('mysqlPort') ? : env('DB_PORT', '3306') }}" id="mysqlPort" placeholder="MySQL Port...">
                            @foreach ($errors->get('mysqlPort') as $message)
                            <strong>{{ $message }}</strong>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mysqlDb" class="col-sm-3 control-label">Database</label>
                        <div class="col-sm-9">
                            <input name="mysqlDb" type="text" class="form-control" value="{{ old('mysqlDb') ? : env('DB_DATABASE', '') }}" id="mysqlDb" placeholder="MySQL Database...">
                            @foreach ($errors->get('mysqlDb') as $message)
                            <strong>{{ $message }} (영문자, 숫자, 언더스코어(_))</strong>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mysqlUser" class="col-sm-3 control-label">User</label>
                        <div class="col-sm-9">
                            <input name="mysqlUser" type="text" class="form-control" value="{{ old('mysqlUser') ? : env('DB_USERNAME', '') }}" id="mysqUser" placeholder="MySQL Username...">
                            @foreach ($errors->get('mysqlUser') as $message)
                            <strong>{{ $message }} (영문자, 숫자, 언더스코어(_))</strong>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mysqlPass" class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-9">
                            <input name="mysqlPass" type="text" class="form-control" id="mysqlPass" placeholder="MySQL Password...">
                            @foreach ($errors->get('mysqlPass') as $message)
                            <strong>{{ $message }}</strong>
                            @endforeach
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label for="mysqlPrefix" class="col-sm-3 control-label">Table Prefix</label>
                        <div class="col-sm-9">
                            <input name="mysqlPrefix" type="text" class="form-control" value="{{ old('tablePrefix') ? : env('DB_PREFIX', 'wpms_') }}" id="mysqlPrefix" placeholder="MySQL Prefix...">
                            @foreach ($errors->get('tablePrefix') as $message)
                            <p>
                                <strong>{{ $message }} (영문자로 시작하는 '영문자, 숫자, 언더스코어(_)'로 구성된 문자열)</strong>
                            </p>
                            @endforeach
                        </div>
                    </div> -->
                </div><!-- /.box-body -->

                <div class="box-header with-border">
                    <h3 class="box-title">Administrator</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <label for="adminName" class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9">
                            <input name="adminName" type="text" class="form-control" value="{{ old('adminName') ? : '10억홈피' }}" id="adminName" placeholder="Admin Name...">
                            @foreach ($errors->get('adminName') as $message)
                            <strong>{{ $message }}</strong>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="adminEmail" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <input name="adminEmail" type="text" class="form-control" value="{{ old('adminEmail') ? : 'css@wcms.kr' }}" id="mysqUser" placeholder="Admin Email...">
                            @foreach ($errors->get('adminEmail') as $message)
                            <strong>{{ $message }}</strong>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="adminPass" class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-9">
                            <input name="adminPass" type="text" class="form-control" id="adminPass" placeholder="Admin Password...">
                            @foreach ($errors->get('adminPass') as $message)
                            <strong>{{ $message }}</strong>
                            @endforeach
                        </div>
                    </div>
                </div><!-- /.box-body -->

                <p class="login-box-msg">
                <strong class="st_strong">주의! 이미 {{ config('app.name') }}가 존재한다면 데이터가 유실되므로 주의하세요.</strong><br>
                주의사항을 이해했으며, 설치를 계속 진행하시려면 다음을 누르십시오.
                </p>

                <div class="box-footer">
                    <a href="{{ route('install.license') }}" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> 이전</a>
                    <button type="submit" class="btn btn-danger pull-right">다음 <i class="fa fa-arrow-circle-right"></i></button>
                </div><!-- /.box-footer -->

                </form>
            </div><!-- /.box -->

        </div><!-- /.tab-content -->
    </div><!-- /.nav-tabs-custom -->
</div><!-- /.register-box -->
<script>
function checkSubmit(f)
{
    if (f.appUrl.value == '')
    {
        alert('App URL 을 입력하십시오.'); f.appUrl.focus(); return false;
    }
    else if (f.mysqlPort.value == '')
    {
        alert('MySQL Port 를 입력하십시오.'); f.mysqlPort.focus(); return false;
    }
    else if (f.mysqlPort.value == '')
    {
        alert('MySQL Port 를 입력하십시오.'); f.mysqlPort.focus(); return false;
    }
    else if (f.mysqlUser.value == '')
    {
        alert('MySQL User Name 을 입력하십시오.'); f.mysqlUser.focus(); return false;
    }
    else if (f.mysqlDb.value == '')
    {
        alert('MySQL Database 를 입력하십시오.'); f.mysqlDb.focus(); return false;
    }
    else if (f.adminEmail.value == '')
    {
        alert('최고관리자 Email 을 입력하십시오.'); f.adminEmail.focus(); return false;
    }
    else if (f.adminPass.value == '')
    {
        alert('최고관리자 비밀번호를 입력하십시오.'); f.adminPass.focus(); return false;
    }
    else if (f.adminNick.value == '')
    {
        alert('최고관리자 닉네임을 입력하십시오.'); f.adminNick.focus(); return false;
    }

    return true;
}
</script>
@endsection