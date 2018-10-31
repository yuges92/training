<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="{{ Request::is('commissioner') ? 'active' : '' }}"><a  href="{{route('commissioner')}}"><i class="fa fa-tachometer-alt"></i> <span>My Dashboard</span></a></li>
      <li class="{{ Request::is('commissioner/bookings*') ? 'active' : '' }}"><a  href="/commissioner/bookings"><i class="fas fa-list-alt"></i> <span>My Bookings</span></a></li>
      <li class="{{ Request::is('commissioner/courses*') ? 'active' : '' }}"><a  href="/commissioner/course"><i class="fa fa-user-graduate"></i> <span>My Courses</span></a></li>
      <li class="{{ Request::is('commissioner/learners*') ? 'active' : '' }}"><a  href="/commissioner/course"><i class="fa fa-user-graduate"></i> <span>My Learners</span></a></li>
      <li class="{{ Request::is('commissioner/messages*') ? 'active' : '' }}"><a  href="/commissioner/message"><i class="fa fa-comments"></i> <span>Messages</span></a></li>
      <li class="{{ Request::is('commissioner/myProfile*') ? 'active' : '' }}"><a  href="/commissioner/profile"><i class="fa fa-user-circle"></i> <span>My Profile</span></a></li>
      <li class="{{ Request::is('commissioner/myNotification*') ? 'active' : '' }}"><a  href="/commissioner/notification"><i class="fas fa-bell"></i> <span>My Notifications</span></a></li>
      <li class="{{ Request::is('commissioner/settings*') ? 'active' : '' }}"><a  href="/commissioner/settings"><i class="fa fa-cogs"></i> <span>Settings</span></a></li>
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
