<li class="nav-item">
    <a href="{{url('/home')}}" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user-circle"></i>
        <p>User List</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{url('/user/deleted-user-list')}}" class="nav-link {{ request()->is('/user/deleted-user-list') ? 'active' : '' }}">
        <i class="nav-icon fas fa-trash-restore"></i>
        <p>Deleted User List</p>
    </a>
</li>
