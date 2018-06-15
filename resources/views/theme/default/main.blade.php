@extends("theme.default.layout.master")
@section('title'){{ cache("config.website")->title }}@endsection
@section('body_class'){{ "" }}@endsection

@section('add_css')
@endsection

@section('content')
test
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
