<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>{{ config('app.name') }}</title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<meta name="robots" content="index,nofollow"/>
<meta name="_token" content="{{ csrf_token() }}"/>
<link rel="stylesheet" href="/bower/bootstrap/dist/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="/bower/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="/bower/Ionicons/css/ionicons.min.css">
<link rel="stylesheet" href="/bower/admin-lte/dist/css/AdminLTE.min.css" type="text/css" />
<link rel="stylesheet" href="/bower/admin-lte/dist/css/skins/skin-purple.min.css" type="text/css" />
<link rel='stylesheet' href='/bower/admin-lte/plugins/iCheck/flat/red.css'/>
<link rel='stylesheet' href='/bower/toastr/toastr.min.css'/>
<link rel="stylesheet" href="/css/wpms.css" type="text/css" />
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
</head>
<body class="@yield('body_class')">
@yield('content')
<!-- REQUIRED JS SCRIPTS -->
<script src="/bower/jquery/dist/jquery.min.js"></script>
<script src="/bower/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/bower/admin-lte/dist/js/adminlte.min.js"></script>
<script src="/bower/admin-lte/plugins/iCheck/icheck.min.js"></script>
<script src='/bower/toastr/toastr.min.js'></script>
@yield('add_js')
</body>
</html>