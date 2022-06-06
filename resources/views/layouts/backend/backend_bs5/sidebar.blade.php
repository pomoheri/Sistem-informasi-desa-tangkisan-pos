

<!--begin::Sidebar-->
<aside class="main-sidebar">
    <!--begin::Sidebar Menu-->
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="menu-header">Menu Utama </li>
            <li class="menu-item">
                <a href="#" class="menu-link">
                    <span class="menu-icon ri-dashboard-line"></span>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>
            @if(Auth()->user()->level_akses == '0')
            <li class="menu-item">
                <a href="#" class="menu-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="menu-icon ri-user-unfollow-fill"></span>
                    <span class="menu-text">Data Penduduk</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><button class="dropdown-item" type="button"><a href="{{ route('admin.penduduk.index') }}" class="menu-link">Penduduk</a></button></li>
                    <li><button class="dropdown-item" type="button"><a href="{{ route('admin.penduduk.index') }}" class="menu-link">Penduduk Datang</a></button></li>
                    <li><button class="dropdown-item" type="button"><a href="{{ route('admin.penduduk.index') }}" class="menu-link">Penduduk Pindah</a></button></li>
                </ul>
            </li>
            <li class="menu-item">
                <a href="#" class="menu-link">
                    <span class="menu-icon ri-user-add-fill"></span>
                    <span class="menu-text">Kelahiran</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="#" class="menu-link">
                    <span class="menu-icon ri-user-unfollow-fill"></span>
                    <span class="menu-text">Kematian</span>
                </a>
            </li>
            <li class="menu-header">Menu Master</li>
            <li class="menu-item">
                <a href="#" class="menu-link">
                    <span class="menu-icon ri-mail-line"></span>
                    <span class="menu-text">Surat</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('admin.berita.index') }}" class="menu-link">
                    <span class="menu-icon ri-newspaper-fill"></span>
                    <span class="menu-text">Berita</span>
                </a>
            </li>
            <li class="menu-header">Menu Management</li>
            <li class="menu-item">
                <a href="{{ route('admin.user-management') }}" class="menu-link">
                    <span class="menu-icon ri-account-circle-fill"></span>
                    <span class="menu-text">User Management</span>
                </a>
            </li>
            @endif
        </ul>
        
    </div>
    <!--end::Sidebar Menu-->
</aside>
<!--end::Sidebar-->
