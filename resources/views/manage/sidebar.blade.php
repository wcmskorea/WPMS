<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="/bower/admin-lte/dist/img/user2-160x160.jpg" class="img-rounded" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>(주)10억홈피</p>
        <!-- Status -->
        <a href="/" target="_blank" class="text-muted"><i class="fa fa-home text-success"></i> 홈페이지 열기</a>
      </div>
    </div>

    <!-- search form (Optional) -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="검색...">
        <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
      </div>
    </form>
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Main Navigation</li>
      <!-- Optionally, you can add icons to the links -->
      <li class="treeview" id="treeConfig">
        <a href="#"><i class="fa fa-gear"></i> <span>환경설정</span>
          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('manage.config.show', 1) }}"><i class="fa fa-angle-right"></i> 사이트 정보</a></li>
          <li><a href="{{ route('manage.config.show', 2) }}"><i class="fa fa-angle-right"></i> 콘텐츠 정보</a></li>
          <li><a href="{{ route('manage.config.show', 3) }}"><i class="fa fa-angle-right"></i> 회원 정보</a></li>
          <li><a href="{{ route('manage.config.show', 4) }}"><i class="fa fa-angle-right"></i> 메일 정보</a></li>
          <li><a href="{{ route('manage.config.show', 5) }}"><i class="fa fa-angle-right"></i> API 정보</a></li>
        </ul>
      </li>
      <li class="treeview" id="treeProject">
        <a href="#"><i class="fa fa-user"></i> <span>프로젝트</span>
          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('todo.index') }}"><i class="fa fa-angle-right"></i> 할일목록</a></li>
        </ul>
      </li>
      <li class="treeview" id="treeUser">
        <a href="#"><i class="fa fa-link"></i> <span>자원관리</span>
          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#">Link in level 2</a></li>
          <li><a href="#">Link in level 2</a></li>
        </ul>
      </li>
      <li class="treeview" id="treeDocu">
        <a href="#"><i class="fa fa-link"></i> <span>문서관리</span>
          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#">Link in level 2</a></li>
          <li><a href="#">Link in level 2</a></li>
        </ul>
      </li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>