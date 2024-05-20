<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                @if(auth()->user()->admin)
                <li class = "{{ request()->routeIs('dashboard/admin') ? 'active' : '' }}">
                    <a href="/dashboard/admin"><i class="fas fa-home"></i> <span>Dashboard</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fas fa-user-tie"></i>
                        <span>Kelola User</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="/customer" class = "{{ request()->routeIs('customer') ? 'active' : '' }}">Kelola Customer</a></li>
                        <li><a href="/karyawan" class="{{ request()->routeIs('karyawan') ? 'active' : '' }}">Kelola karyawan</a></li>
                        <li><a href="/admin" class="{{ request()->routeIs('admin') ? 'active' : '' }}">Kelola Admin</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fas fa-tshirt"></i>
                        <span>Kategori & Layanan</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="/kategori" class = "{{ request()->routeIs('kategori') ? 'active' : '' }}">Kelola Kategori</a></li>
                        <li><a href="/layanan" class="{{ request()->routeIs('layanan') ? 'active' : '' }}">Kelola layanan</a></li>
                    </ul>
                </li>
                <li class = "{{ request()->routeIs('promo') ? 'active' : '' }}">
                    <a href="/promo"><i class="fas fa-tags mr-1"></i> <span>Data Promo</span></a>
                </li>
                <li class = "{{ request()->routeIs('pesanan_admin') ? 'active' : '' }}">
                    <a href="/pesanan_admin"><i class="fas fa-cart-plus mr-1"></i> <span>Data pesanan</span></a>
                </li>
                @endif

                @if(auth()->user()->karyawan)
                <li class = "{{ request()->routeIs('dashboard/karyawan') ? 'active' : '' }}">
                    <a href="/dashboard/karyawan"><i class="fas fa-home"></i> <span>Dashboard</span></a>
                </li>
                <li class = "{{ request()->routeIs('pesanan') ? 'active' : '' }}">
                    <a href="/pesanan"><i class="fas fa-cart-plus"></i> <span>Data Pesanan</span></a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>

