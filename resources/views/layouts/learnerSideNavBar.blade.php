​<nav class="adminSideNavBar">
    <ul class="">
      <li><a class="{{ Request::is('/') ? 'active' : '' }}" href="/"><i class="fa fa-home"></i> <span> Home</span></a></li>
      <li><a class="{{ Request::is('learner') ? 'active' : '' }}" href=""><i class="fa fa-tachometer-alt"></i> <span>My Dashboard</span></a></li>
      <li><a class="{{ Request::is('learner/order*') ? 'active' : '' }}" href=""><i class="fas fa-list-alt"></i> <span>My Bookings</span></a></li>
      <li><a class="{{ Request::is('learner/order*') ? 'active' : '' }}" href=""><i class="fas fa-list-alt"></i> <span>My Courses</span></a></li>
      <li><a class="{{ Request::is('learner/messages*') ? 'active' : '' }}" href=""><i class="fa fa-comments"></i> <span>Messages</span></a></li>
      <li><a class="{{ Request::is('learner/myProfile*') ? 'active' : '' }}" href=""><i class="fa fa-user-circle"></i> <span>My Profile</span></a></li>
      <li><a class="{{ Request::is('learner/myNotification*') ? 'active' : '' }}" href=""><i class="fa fa-home"></i> <span>Notifications</span></a></li>
      <li><a class="{{ Request::is('learner/settings*') ? 'active' : '' }}" href=""><i class="fa fa-cogs"></i> <span>Settings</span></a></li>
      <li><a class="{{ Request::is('learner/settings*') ? 'active' : '' }}" href=""><i class="fa fa-cogs"></i> <span>Logout</span></a></li>
    </ul>
</nav>​
