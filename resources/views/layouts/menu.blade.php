<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
</li>
<li class="side-menus {{ Request::is('posts*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('posts.index') }}"><i class="fas fa-building"></i><span>Users</span></a>
</li>
<li class="side-menus {{ Request::is('posts*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('posts.index') }}"><i class="fas fa-building"></i><span>Truck</span></a>
</li>
<li class="side-menus {{ Request::is('posts*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('posts.index') }}"><i class="fas fa-building"></i><span>Posts</span></a>
</li>

