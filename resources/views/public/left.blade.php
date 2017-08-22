<div id="sidebar-nav">
    <ul id="dashboard-menu">
        <li class="{{ \Illuminate\Support\Facades\Request::path() == 'home' ? 'active' : ''}}">
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <a href="{{ url('/home') }}">
                <i class="icon-home"></i>
                <span>首页</span>
            </a>
        </li>
        <li class="{{ \Illuminate\Support\Facades\Request::path() == 'server' ? 'active' : ''}}">
            <a href="{{ url('/server') }}">
                <i class="icon-signal"></i>
                <span>服务器</span>
            </a>
        </li>
        <li class="{{ \Illuminate\Support\Facades\Request::path() == 'domain' ? 'active' : ''}}">
            <a href="{{ url('/domain') }}">
                <i class="icon-th-large"></i>
                <span>域名</span>
            </a>
        </li>
        <li class="{{ \Illuminate\Support\Facades\Request::path() == 'customer' ? 'active' : ''}}">
            <a href="{{ url('/customer') }}">
                <i class="icon-group"></i>
                <span>客户</span>
                {{--<i class="icon-chevron-down"></i>--}}
            </a>
            {{--<ul class="submenu">--}}
                {{--<li><a href="user-list.html">User list</a></li>--}}
                {{--<li><a href="new-user.html">New user form</a></li>--}}
                {{--<li><a href="user-profile.html">User profile</a></li>--}}
            {{--</ul>--}}
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-edit"></i>
                <span>Forms</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="form-showcase.html">Form showcase</a></li>
                <li><a href="form-wizard.html">Form wizard</a></li>
            </ul>
        </li>
        <li>
            <a href="gallery.html">
                <i class="icon-picture"></i>
                <span>Gallery</span>
            </a>
        </li>
        <li>
            <a href="calendar.html">
                <i class="icon-calendar-empty"></i>
                <span>Calendar</span>
            </a>
        </li>
        <li>
            <a class="dropdown-toggle ui-elements" href="#">
                <i class="icon-code-fork"></i>
                <span>UI Elements</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="ui-elements.html">UI Elements</a></li>
                <li><a href="icons.html">Icons</a></li>
            </ul>
        </li>
        <li>
            <a href="personal-info.html">
                <i class="icon-cog"></i>
                <span>My Info</span>
            </a>
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-share-alt"></i>
                <span>Extras</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="code-editor.html">Code editor</a></li>
                <li><a href="grids.html">Grids</a></li>
                <li><a href="signin.html">Sign in</a></li>
                <li><a href="signup.html">Sign up</a></li>
            </ul>
        </li>
    </ul>
</div>