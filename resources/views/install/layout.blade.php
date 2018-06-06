<html>
  <head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="_token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="/bower/bootstrap/dist/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="/bower/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/bower/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="/bower/admin-lte/dist/css/AdminLTE.min.css" type="text/css" />
    <link rel="stylesheet" href="/bower/admin-lte/dist/css/skins/skin-purple.min.css" type="text/css" />
    <link rel='stylesheet' href='/bower/toastr/toastr.min.css'/>
    <link rel="stylesheet" href="/css/wpms.css" type="text/css" />
    @yield('include_css')
</head>
<body>
<!-- header -->
<div id="header">
    <div class="container">
        <span class="title">{{ config('app.name') }}</span>
        <span class="install">@yield('step')</span>
    </div>
</div>
<!-- contents -->
<div id="contents">
    @yield('content')
</div>
<footer id="footer">
    <div class="container">
        <div id="ft_copy">
            <strong>{{ config('app.name') }}</strong>
            <p>GPL! OPEN SOURCE {{ config('app.name') }}</p>
        </div>
    </div>
</footer>
</body>
</html>
