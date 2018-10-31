<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <ul class="sidebar-menu" data-widget="tree">

      <li class="{{ Request::is('learner') ? 'active' : '' }}"><a  href="{{route('learner')}}"><i class="fa fa-tachometer-alt"></i> <span>My Dashboard</span></a></li>
      <li class="{{ Request::is('learner/bookings*') ? 'active' : '' }}"><a  href="/learner/bookings"><i class="fas fa-list-alt"></i> <span>My Bookings</span></a></li>
      <li class="{{ Request::is('learner/courses*') ? 'active' : '' }}"><a  href="/learner/course"><i class="fa fa-user-graduate"></i> <span>My Courses</span></a></li>
      <li class="{{ Request::is('learner/messages*') ? 'active' : '' }}"><a  href="/learner/message"><i class="fa fa-comments"></i> <span>Messages</span></a></li>
      <li class="{{ Request::is('learner/myProfile*') ? 'active' : '' }}"><a  href="/learner/profile"><i class="fa fa-user-circle"></i> <span>My Profile</span></a></li>
      <li class="{{ Request::is('learner/myNotification*') ? 'active' : '' }}"><a  href="/learner/notification"><i class="fas fa-bell"></i> <span>My Notifications</span></a></li>
      <li class="{{ Request::is('learner/settings*') ? 'active' : '' }}"><a  href="/learner/settings"><i class="fa fa-cogs"></i> <span>Settings</span></a></li>

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
