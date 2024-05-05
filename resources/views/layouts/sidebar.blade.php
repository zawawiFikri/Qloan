<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                <li class = "{{ request()->routeIs('dashAdmin') ? 'active' : '' }}">
                    <a href="/dashAdmin"><i class="fas fa-home"></i> <span>Dashboard</span></a>
                </li>
                <li class = "{{ request()->routeIs('users') ? 'active' : '' }}">
                    <a href="/users"><i class="fas fa-user-tie mr-1"></i> <span>Data User</span></a>
                </li>
                <li class = "{{ request()->routeIs('layanan') ? 'active' : '' }}">
                    <a href="/layanan"><i class="fas fa-user-tie mr-1"></i> <span>Data Layanan</span></a>
                </li>
                <li class = "{{ request()->routeIs('promo') ? 'active' : '' }}">
                    <a href="/promo"><i class="fas fa-user-tie mr-1"></i> <span>Data Promo</span></a>
                </li>
                <li class = "{{ request()->routeIs('pesanan') ? 'active' : '' }}">
                    <a href="/pesanan"><i class="fas fa-user-tie mr-1"></i> <span>Data pesanan</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>

