<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Absen Smart</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ $menu == 'dashboard.siswa' ? 'active' : '' }}">
            <a href="{{ route('dashboard.siswa') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Rekap Absen</div>
            </a>
        </li>
        @if(Auth::user()->role == 'siswa')
        <li class="menu-item {{ $menu == 'rekap' ? 'active' : '' }}">
            <a href="{{ route('dashboard.siswa') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar"></i>
                <div data-i18n="Analytics">Rekap Absensi</div>
            </a>
        </li>
        @endif
    </ul>
</aside>