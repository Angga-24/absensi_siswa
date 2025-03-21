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
          <li class="menu-item {{ $menu == 'dashboard.admin' ? 'active' : '' }}">
              <a href="{{ route('dashboard.admin') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-home-circle"></i>
                  <div data-i18n="Analytics">Dashboard</div>
              </a>
          </li>
          <li class="menu-item {{ $menu == 'siswa' ? 'active' : '' }}">
              <a href="{{ route('siswa.index') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-user"></i>
                  <div data-i18n="Analytics">Siswa</div>
              </a>
          </li>
          <li class="menu-item {{ $menu == 'guru' ? 'active' : '' }}">
              <a href="{{ route('guru.index') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-chalkboard"></i>
                  <div data-i18n="Analytics">Guru</div>
              </a>
          </li>
          <li class="menu-item {{ $menu == 'local' ? 'active' : '' }}">
              <a href="{{ route('local.index') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-building-house"></i>
                  <div data-i18n="Analytics">Local</div>
              </a>
          </li>
          <li class="menu-item {{ $menu == 'ortu' ? 'active' : '' }}">
              <a href="{{ route('ortu.index') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-user-pin "></i>
                  <div data-i18n="Analytics">Orang Tua</div>
              </a>
          </li>
          <li class="menu-item {{ $menu == 'user' ? 'active' : '' }}">
              <a href="{{ route('user.index') }}" class="menu-link">
                <i class="menu-icon tf-icons fas fa-users"></i>
                <div data-i18n="Analytics">Users</div>
                </a>
          </li>
          <li class="menu-item {{ $menu == 'absenAdmin' ? 'active' : '' }}">
              <a href="{{ route('absen.index2') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar-check"></i>
                  <div data-i18n="Analytics">Data Absen</div>
              </a>
          </li>


      </ul>
  </aside>