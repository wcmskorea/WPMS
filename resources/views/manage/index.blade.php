@extends('layouts.manage')

@section('title') {{ $title }} @endsection

@section('content')
<div class="wrapper">

  <!-- Header -->
  @include('manage.header')

  <!-- Sidebar -->
  @include('manage.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $page_title or "Dashboard" }}
        <small>{{ $page_description or null }}</small>
      </h1>
      <!-- You can dynamically generate breadcrumbs here -->
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> wpms</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">          
      <!-- Your Page Content Here -->
      @include('manage.dashboard')
    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->

  <!-- Footer -->
  @include('manage.footer')

  <!-- Side Panel -->
  @include('manage.sidepanel')

  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->
@endsection