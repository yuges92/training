​<nav class="adminSideNavBar">
    <ul class="">
      <li><a class="{{ Request::is('/') ? 'active' : '' }}" href="/"><i class="fa fa-home"></i> <span> Home</span></a></li>
      <li><a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{route('adminDashboard')}}"><i class="fa fa-tachometer-alt"></i> <span> Dashboard</span></a></li>
      <li><a class="{{ Request::is('admin/order*') ? 'active' : '' }}" href="{{route('order.index')}}"><i class="fas fa-list-alt"></i> <span>Bookings</span></a></li>
      <li><a class="{{ Request::is('admin/learners*') ? 'active' : '' }}" href="/admin/learners"><i class="fa fa-user-graduate"></i> <span>Learners</span></a></li>
      <li><a class="{{ Request::is('admin/courseTypes*') ? 'active' : '' }}" href="{{route('courseTypes.index')}}"><i class="fa fa-graduation-cap"></i> <span>Course Type</span></a></li>
      <li><a class="{{ Request::is('admin/courses*') ? 'active' : '' }}" href="{{route('adminCourses')}}"><i class="fa fa-graduation-cap"></i> <span>Courses</span></a></li>
      <li><a class="{{ Request::is('admin/assignments*') ? 'active' : '' }}" href="/admin/assignments"><i class="fa fa-tasks"></i> <span>Course Assignments</span></a></li>
      <li><a class="{{ Request::is('admin/class*') ? 'active' : '' }}" href="/admin/class"><i class="fa fa-calendar"></i> <span>Classes/Events</span></a></li>
      <li><a class="{{ Request::is('admin/classTrainer*') ? 'active' : '' }}" href="/admin/classTrainer"><i class="fa fa-chalkboard-teacher"></i> <span>Trainers</span></a></li>
      <li><a class="{{ Request::is('admin/classAddress*') ? 'active' : '' }}" href="/admin/classAddress"><i class="fa fa-address-card"></i> <span>Class Address</span></a></li>
      <li><a class="{{ Request::is('admin/accessCodes*') ? 'active' : '' }}" href="{{route('accessCode.index')}}"><i class="fa fa-hashtag"></i> <span>Access Codes</span></a></li>
      <li><a class="{{ Request::is('admin/emailNotification*') ? 'active' : '' }}" href=""><i class="fa fa-envelope"></i> <span>Email Notifications</span></a></li>
      <li><a class="{{ Request::is('admin/attendance*') ? 'active' : '' }}" href="/admin/attendance"><i class="fas fa-check-double"></i> <span>Attendence</span></a></li>
      <li><a class="{{ Request::is('admin/assignmentMarking*') ? 'active' : '' }}" href=""><i class="fas fa-clipboard-check"></i> <span>Assignment Marking</span></a></li>
      <li><a class="{{ Request::is('admin/messages*') ? 'active' : '' }}" href=""><i class="fa fa-comments"></i> <span>Messages</span></a></li>
      <li><a class="{{ Request::is('admin/myProfile*') ? 'active' : '' }}" href=""><i class="fa fa-user-circle"></i> <span>My Profile</span></a></li>
      <li><a class="{{ Request::is('admin/myNotification*') ? 'active' : '' }}" href=""><i class="fas fa-bell"></i> <span>My Notifications</span></a></li>
      <li><a class="{{ Request::is('admin/users*') ? 'active' : '' }}" href="/admin/users"><i class="fas fa-users"></i> <span>Users</span></a></li>
      <li><a class="{{ Request::is('admin/settings*') ? 'active' : '' }}" href=""><i class="fa fa-cogs"></i> <span>Settings</span></a></li>
    </ul>
</nav>​
