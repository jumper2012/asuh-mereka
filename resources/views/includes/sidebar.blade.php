<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
          @if(isset(auth()->user()->image))
            <img src="/images/user/tmb/kecil_{{ auth()->user()->image }}" class="img-circle" alt="User Image">
          @else
            <img src="/images/user/user-default.png" class="img-circle" alt="User Image">
          @endif
      </div>
      <div class="pull-left info">
        <p>{{ auth()->user()->name }}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      @if(auth()->user()->roles[0]["id"] == 1)
        <li>
          <a href="/anak">
            <i class="fa fa-child"></i> <span>Anak Terlantar</span>
            <small class="label pull-right bg-red"></small>
          </a>
        </li>
      @elseif(auth()->user()->roles[0]["id"] == 2)


        <li class="treeview">
          <a href="#">
            <i class="fa fa-child"></i> <span>Anak Terlantar</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/list-anak"><i class="fa fa-circle-o"></i> List Anak Terlantar</a></li>
            <li><a href="/anak-list-pengurus"><i class="fa fa-circle-o"></i> Manage Anak Terlantar</a></li>
            <li><a href="/anak/create"><i class="fa fa-circle-o"></i> Tambahkan Anak Terlantar</a></li>
          </ul>
        </li>
      @else
        <li>
          <a href="/home">
            <i class="fa fa-child"></i> <span>Anak Terlantar</span>
            <small class="label pull-right bg-red"></small>
          </a>
        </li>
      @endif      

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>