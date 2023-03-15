<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item">
            <a href="{{url('/admin')}}" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span>Manage Categories</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="{{url('/admin/cattbl')}}">Categories</a>
                </li>
                

            </ul>

        </li>
       
        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span>Manage Image</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="{{url('/admin/manageimage')}}">Image</a>
                </li>
            </ul>

        </li>
       
       
        <li class="sidebar-item ">
            <a href="{{url('/admin/settings')}}" class='sidebar-link'>
                <i class="bi bi-stack"></i>
                <span>Site Settings</span>
            </a>
        </li>
        <li class="sidebar-item ">
            <a href="{{url('/logout')}}" class='sidebar-link'>

                <span>Logout</span>
            </a>
        </li>
    </ul>

</div>
