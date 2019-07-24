<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    </div>
    <ul class="sidebar-menu" data-widget="tree">

      {{-- <li class="treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i>
          <span>Dashboard</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href=""><i class="fa fa-circle-o"></i> Dashboard 1</a></li>
          <li><a href=""><i class="fa fa-circle-o"></i> Dashboard 2</a></li>
          <li><a href=""><i class="fa fa-circle-o"></i> Dashboard 3</a></li>
          <li><a href=""><i class="fa fa-circle-o"></i> Dashboard 4</a></li>
          <li><a href=""><i class="fa fa-circle-o"></i> Dashboard 5</a></li>
          <li><a href=""><i class="fa fa-circle-o"></i> Dashboard 6</a></li>
        </ul>
      </li> --}}

      <li class="{{ Request::is('admin') ? 'active' : '' }}"><a  href="{{route('adminDashboard')}}"><i class="fa fa-tachometer-alt"></i> <span> Dashboard</span></a></li>
      <li class="{{ Request::is('admin/order*') ? 'active' : '' }}"><a  href="{{route('order.index')}}"><i class="fas fa-list-alt"></i> <span>Bookings</span></a></li>
      <li class="{{ Request::is('admin/referralCode*') ? 'active' : '' }}"><a  href="{{route('referralCode.showView')}}"><i class="fas fa-list-alt"></i> <span>Referral Code</span></a></li>
      <li class="{{ Request::is('admin/learners*') ? 'active' : '' }}"><a  href="/admin/learners"><i class="fa fa-user-graduate"></i> <span>Learners</span></a></li>
      <li class="{{ Request::is('admin/courseTypes*') ? 'active' : '' }}"><a  href="{{route('courseTypes.index')}}"><i class="fa fa-graduation-cap"></i> <span>Course Type</span></a></li>
      <li class="{{ Request::is('admin/courses*') ? 'active' : '' }}"><a  href="{{route('adminCourses')}}"><i class="fa fa-graduation-cap"></i> <span>Courses</span></a></li>
      <li class="{{ Request::is('admin/assignments*') ? 'active' : '' }}"><a  href="/admin/assignments"><i class="fa fa-tasks"></i> <span>Course Assignments</span></a></li>
      <li class="{{ Request::is('admin/classes*') ? 'active' : '' }}"><a  href="/admin/classes"><i class="fa fa-calendar"></i> <span>Classes</span></a></li>
      <li class="{{ Request::is('admin/pages*') ? 'active' : '' }}"><a  href="/admin/pages"><i class="far fa-file"></i> <span>Pages</span></a></li>
      <li class="{{ Request::is('admin/classTrainer*') ? 'active' : '' }}"><a  href="/admin/classTrainer"><i class="fa fa-chalkboard-teacher"></i> <span>Trainers</span></a></li>
      <li class="{{ Request::is('admin/classAddress*') ? 'active' : '' }}"><a  href="/admin/classAddress"><i class="fa fa-address-card"></i> <span>Class Address</span></a></li>
      <li class="{{ Request::is('admin/accessCodes*') ? 'active' : '' }}"><a  href="{{route('accessCode.index')}}"><i class="fa fa-hashtag"></i> <span>Access Codes</span></a></li>
      <li class="{{ Request::is('admin/emailNotification*') ? 'active' : '' }}"><a  href=""><i class="fa fa-envelope"></i> <span>Email Notifications</span></a></li>
      <li class="{{ Request::is('admin/attendance*') ? 'active' : '' }}"><a  href="/admin/attendance"><i class="fas fa-check-double"></i> <span>Attendence</span></a></li>
      <li class="{{ Request::is('admin/assignmentMarking*') ? 'active' : '' }}"><a  href=""><i class="fas fa-clipboard-check"></i> <span>Assignment Marking</span></a></li>
      <li class="{{ Request::is('admin/messages*') ? 'active' : '' }}"><a  href=""><i class="fa fa-comments"></i> <span>Messages</span></a></li>
      <li class="{{ Request::is('admin/myProfile*') ? 'active' : '' }}"><a  href="/admin/myProfile"><i class="fa fa-user-circle"></i> <span>My Profile</span></a></li>
      <li class="{{ Request::is('admin/myNotification*') ? 'active' : '' }}"><a  href=""><i class="fas fa-bell"></i> <span>My Notifications</span></a></li>
      <li class="{{ Request::is('admin/users*') ? 'active' : '' }}"><a  href="/admin/users"><i class="fas fa-users"></i> <span>Users</span></a></li>
      <li class="{{ Request::is('admin/settings*') ? 'active' : '' }}"><a  href=""><i class="fa fa-cogs"></i> <span>Settings</span></a></li>


    </ul>
  </section>
  <!-- /.sidebar -->
  <div class="sidebar-footer">
  <!-- item-->
  <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Settings"><i class="fa fa-cog fa-spin"></i></a>
  <!-- item-->
  <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="fa fa-envelope"></i></a>
  <!-- item-->
  <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="fa fa-power-off"></i></a>
</div>
</aside>
