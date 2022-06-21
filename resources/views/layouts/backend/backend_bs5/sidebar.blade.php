

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
                <li class="menu-item has-menu is-open">
                    <a href="#" class="menu-link">
                        <span class="menu-icon ri-menu-5-line"></span>
                        <span class="menu-text">Data Penduduk</span>
                    </a>
                    <ul class="menu">
                        <li class="menu-item">
                            <a href="{{ route('admin.penduduk.index') }}" class="menu-link">Penduduk</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('admin.penduduk-datang.index') }}" class="menu-link">Penduduk Datang</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('admin.penduduk-pindah.index') }}" class="menu-link">Penduduk Pindah</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.kelahiran.index') }}" class="menu-link">
                        <span class="menu-icon ri-user-add-fill"></span>
                        <span class="menu-text">Kelahiran</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.kematian.index') }}" class="menu-link">
                        <span class="menu-icon ri-user-unfollow-fill"></span>
                        <span class="menu-text">Kematian</span>
                    </a>
                </li>
                <li class="menu-header">Menu Master</li>
                <li class="menu-item">
                    <a href="{{ route('admin.surat.index') }}" class="menu-link">
                        <span class="menu-icon ri-mail-line"></span>
                        <span class="menu-text">Surat</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.profil-desa.index') }}" class="menu-link">
                        <span class="menu-icon ri-profile-fill"></span>
                        <span class="menu-text">Profil Desa</span>
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
            @if(Auth()->user()->level_akses == '1')
                <li class="menu-item">
                    <a href="{{ route('warga.berita.index') }}" class="menu-link">
                        <span class="menu-icon ri-newspaper-fill"></span>
                        <span class="menu-text">Berita</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('warga.profil-desa.index') }}" class="menu-link">
                        <span class="menu-icon ri-profile-fill"></span>
                        <span class="menu-text">Profil Desa</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.surat.index') }}" class="menu-link">
                        <span class="menu-icon ri-mail-line"></span>
                        <span class="menu-text">Surat</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('kades.penduduk.index') }}" class="menu-link">
                        <span class="menu-icon ri-file-user-fill"></span>
                        <span class="menu-text">Penduduk</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.penduduk-datang.index') }}" class="menu-link">
                        <span class="menu-icon ri-map-pin-user-line"></span>
                        <span class="menu-text">Penduduk Datang</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.penduduk-pindah.index') }}" class="menu-link">
                        <span class="menu-icon ri-shield-user-fill"></span>
                        <span class="menu-text">Penduduk Pindah</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.kelahiran.index') }}" class="menu-link">
                        <span class="menu-icon ri-user-add-line"></span>
                        <span class="menu-text">Kelahiran</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.kematian.index') }}" class="menu-link">
                        <span class="menu-icon ri-user-unfollow-line"></span>
                        <span class="menu-text">Kematian</span>
                    </a>
                </li>
            @endif
            @if(Auth()->user()->level_akses == '2')
                <li class="menu-item">
                    <a href="{{ route('warga.kelahiran.index') }}" class="menu-link">
                        <span class="menu-icon ri-user-add-fill"></span>
                        <span class="menu-text">Permohonan Surat Kelahiran</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('warga.kematian.index') }}" class="menu-link">
                        <span class="menu-icon ri-user-unfollow-fill"></span>
                        <span class="menu-text">Permohonan Surat Kematian</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('warga.berita.index') }}" class="menu-link">
                        <span class="menu-icon ri-newspaper-fill"></span>
                        <span class="menu-text">Berita</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('warga.profil-desa.index') }}" class="menu-link">
                        <span class="menu-icon ri-profile-fill"></span>
                        <span class="menu-text">Profil Desa</span>
                    </a>
                </li>
            @endif
        </ul>
        
    </div>
    <!--end::Sidebar Menu-->
</aside>
<!--end::Sidebar-->
