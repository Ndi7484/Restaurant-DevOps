<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column px-4">
            <li class="nav-item mb-3">
                <a class="nav-link {{ Request::is('admin/admin*') ? 'active' : '' }}" aria-current="page" href="/admin/admin">
                    <span data-feather="user"></span>
                    Admin
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="nav-link {{ Request::is('admin/profile*') ? 'active' : '' }}" aria-current="page" href="/admin/profile">
                    <span data-feather="user"></span>
                    Profile
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="nav-link {{ Request::is('admin/menus', 'admin/menus*')? 'active' : '' }}" href="/admin/menus">
                    <span data-feather="book-open"></span>
                    Menu
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="nav-link {{ Request::is('admin/order', 'admin/order*')? 'active' : '' }}" href="order">
                    <span data-feather="file-text"></span>
                    Order
                </a>
            </li>
        </ul>
    </div>
    <form action="/admin/logout" method="post" class="px-4">
        @csrf
        <button type="submit" class="nav-link position-absolute absolute-bottom border-0"><span data-feather="log-out"></span> Logout</button>
    </form>
</nav>