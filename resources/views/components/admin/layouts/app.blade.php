<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'Admin Panel' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <style>
      :root {
        --bg: #f4f7fb;
        --ink: #10263f;
        --muted: #72839a;
        --line: rgba(16, 38, 63, 0.08);
        --navy: #143b66;
        --navy-deep: #0c2239;
        --navy-soft: #1c4c80;
        --gold: #d3b06a;
        --gold-soft: rgba(211, 176, 106, 0.14);
        --card: rgba(255, 255, 255, 0.88);
        --panel: rgba(255,255,255,0.72);
        --shadow: 0 24px 60px rgba(15, 34, 55, 0.12);
      }
      * { box-sizing: border-box; }
      body {
        margin: 0;
        min-height: 100vh;
        font-family: 'Manrope', sans-serif;
        color: var(--ink);
        background:
          radial-gradient(circle at top left, rgba(211,176,106,.14), transparent 22%),
          radial-gradient(circle at bottom right, rgba(20,59,102,.10), transparent 20%),
          linear-gradient(180deg, #f8fbff 0%, var(--bg) 100%);
      }
      .admin-shell {
        min-height: 100vh;
        display: grid;
        grid-template-columns: 300px minmax(0, 1fr);
      }
      .admin-sidebar {
        position: relative;
        background:
          linear-gradient(180deg, rgba(255,255,255,.06), rgba(255,255,255,.01)),
          linear-gradient(180deg, var(--navy) 0%, var(--navy-deep) 100%);
        color: #fff;
        padding: 28px 22px;
        overflow: hidden;
      }
      .admin-sidebar::before {
        content: '';
        position: absolute;
        width: 260px;
        height: 260px;
        border-radius: 50%;
        top: -80px;
        right: -90px;
        background: radial-gradient(circle, rgba(211,176,106,.30) 0%, rgba(211,176,106,.06) 54%, transparent 72%);
      }
      .brand-wrap {
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 28px;
        padding: 10px 12px;
        border-radius: 22px;
        background: rgba(255,255,255,.06);
        border: 1px solid rgba(255,255,255,.08);
        backdrop-filter: blur(10px);
      }
      .brand-wrap img {
        width: 56px;
        height: 56px;
        object-fit: contain;
        filter: drop-shadow(0 10px 20px rgba(0,0,0,.18));
      }
      .brand-kicker {
        font-size: .72rem;
        letter-spacing: .24em;
        text-transform: uppercase;
        color: rgba(255,255,255,.62);
        display: block;
        margin-bottom: 4px;
      }
      .brand-name {
        font-family: 'Cormorant Garamond', serif;
        font-size: 1.6rem;
        line-height: .95;
      }
      .brand-name span { color: var(--gold); }
      .sidebar-label {
        position: relative;
        z-index: 1;
        font-size: .72rem;
        letter-spacing: .2em;
        text-transform: uppercase;
        color: rgba(255,255,255,.48);
        margin: 28px 10px 10px;
      }
      .sidebar-nav {
        position: relative;
        z-index: 1;
        display: grid;
        gap: 8px;
      }
      .sidebar-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 14px;
        padding: 14px 16px;
        border-radius: 18px;
        color: rgba(255,255,255,.8);
        text-decoration: none;
        background: rgba(255,255,255,.03);
        border: 1px solid transparent;
        transition: transform .25s ease, background .25s ease, color .25s ease, border-color .25s ease;
      }
      .sidebar-link-main {
        display: inline-flex;
        align-items: center;
        gap: 12px;
      }
      .sidebar-link-main i {
        font-size: 1rem;
        width: 18px;
        text-align: center;
      }
      .sidebar-toggle {
        width: 100%;
        cursor: pointer;
      }
      .sidebar-toggle-chevron {
        transition: transform .25s ease;
      }
      .sidebar-toggle.active .sidebar-toggle-chevron {
        transform: rotate(180deg);
      }
      .sidebar-submenu {
        display: grid;
        gap: 8px;
        margin: 4px 0 8px 16px;
        padding-left: 14px;
        border-left: 1px solid rgba(255,255,255,.12);
        overflow: hidden;
        max-height: 0;
        opacity: 0;
        transition: max-height .32s ease, opacity .24s ease, margin .24s ease;
      }
      .sidebar-submenu.is-open {
        max-height: 420px;
        opacity: 1;
        margin-top: 4px;
        margin-bottom: 8px;
      }
      .sidebar-sublink {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 12px;
        border-radius: 14px;
        color: rgba(255,255,255,.68);
        text-decoration: none;
        transition: background .25s ease, color .25s ease, transform .25s ease;
      }
      .sidebar-sublink i {
        width: 16px;
        text-align: center;
      }
      .sidebar-sublink:hover,
      .sidebar-sublink.active {
        background: rgba(255,255,255,.08);
        color: #fff;
        transform: translateX(4px);
      }
      .sidebar-sublink.active {
        position: relative;
        background: linear-gradient(90deg, rgba(211,176,106,.24) 0%, rgba(255,255,255,.10) 100%);
        border: 1px solid rgba(211,176,106,.28);
        box-shadow: inset 0 0 0 1px rgba(255,255,255,.03);
      }
      .sidebar-link:hover,
      .sidebar-link.active {
        transform: translateX(4px);
        color: #fff;
        background: rgba(255,255,255,.10);
        border-color: rgba(211,176,106,.22);
      }
      .sidebar-link.active {
        position: relative;
        background: linear-gradient(90deg, rgba(211,176,106,.20) 0%, rgba(255,255,255,.10) 100%);
        box-shadow: inset 0 0 0 1px rgba(255,255,255,.04);
      }
      .sidebar-link small { color: rgba(255,255,255,.46); }
      .sidebar-footer {
        position: relative;
        z-index: 1;
        margin-top: 8px;
      }
      .sidebar-logout {
        width: 100%;
        display: inline-flex;
        align-items: center;
        justify-content: space-between;
        gap: 14px;
        padding: 14px 16px;
        border-radius: 18px;
        color: rgba(255,255,255,.88);
        background: rgba(255,255,255,.06);
        border: 1px solid rgba(255,255,255,.10);
        cursor: pointer;
        font: inherit;
        transition: transform .25s ease, background .25s ease, border-color .25s ease;
      }
      .sidebar-logout:hover {
        transform: translateX(4px);
        background: rgba(255,255,255,.10);
        border-color: rgba(211,176,106,.22);
      }
      .sidebar-logout-main {
        display: inline-flex;
        align-items: center;
        gap: 12px;
      }
      .sidebar-logout-main i {
        font-size: 1rem;
        width: 18px;
        text-align: center;
      }
      .content-shell {
        min-width: 0;
        padding: 18px;
      }
      .content-frame {
        min-height: calc(100vh - 36px);
        border-radius: 28px;
        background: rgba(255,255,255,.46);
        border: 1px solid rgba(255,255,255,.75);
        box-shadow: var(--shadow);
        backdrop-filter: blur(16px);
        overflow: hidden;
      }
      .admin-topbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        padding: 22px 26px;
        border-bottom: 1px solid var(--line);
        background: rgba(255,255,255,.54);
      }
      .heading-eyebrow {
        display: inline-block;
        font-size: .72rem;
        letter-spacing: .22em;
        text-transform: uppercase;
        color: var(--gold);
        margin-bottom: 6px;
      }
      .admin-topbar h1 {
        margin: 0;
        font-size: 1.8rem;
        font-family: 'Cormorant Garamond', serif;
      }
      .admin-topbar p {
        margin: 4px 0 0;
        color: var(--muted);
        font-size: .92rem;
      }
      .topbar-actions {
        display: flex;
        align-items: center;
        gap: 14px;
      }
      .quick-action {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 11px 14px;
        border-radius: 16px;
        border: 1px solid var(--line);
        background: rgba(255,255,255,.9);
        color: var(--ink);
        text-decoration: none;
        font-size: .88rem;
        box-shadow: 0 12px 30px rgba(15, 34, 55, 0.06);
      }
      .user-menu {
        position: relative;
      }
      .user-trigger {
        border: 0;
        background: rgba(255,255,255,.92);
        padding: 8px 10px 8px 8px;
        border-radius: 999px;
        display: flex;
        align-items: center;
        gap: 12px;
        cursor: pointer;
        box-shadow: 0 14px 34px rgba(15,34,55,.10);
      }
      .avatar {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        display: grid;
        place-items: center;
        background: linear-gradient(135deg, var(--navy) 0%, var(--navy-soft) 100%);
        color: #fff;
        font-weight: 700;
        letter-spacing: .04em;
        box-shadow: inset 0 1px 0 rgba(255,255,255,.16);
      }
      .user-meta { text-align: left; }
      .user-meta strong { display:block; font-size: .92rem; }
      .user-meta span { display:block; color: var(--muted); font-size: .76rem; }
      .dropdown-panel {
        position: absolute;
        right: 0;
        top: calc(100% + 12px);
        width: 290px;
        border-radius: 22px;
        padding: 14px;
        background: rgba(12, 25, 40, 0.96);
        color: #fff;
        border: 1px solid rgba(255,255,255,.08);
        box-shadow: 0 30px 70px rgba(5, 14, 24, .38);
        opacity: 0;
        visibility: hidden;
        transform: translateY(10px);
        transition: opacity .22s ease, transform .22s ease, visibility .22s ease;
        z-index: 20;
      }
      .user-menu.open .dropdown-panel {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
      }
      .dropdown-head {
        padding: 10px 12px 14px;
        border-bottom: 1px solid rgba(255,255,255,.08);
        margin-bottom: 10px;
      }
      .dropdown-head strong { display:block; font-size: .95rem; }
      .dropdown-head span { color: rgba(255,255,255,.58); font-size: .8rem; }
      .dropdown-link,
      .dropdown-logout {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        padding: 12px 12px;
        border-radius: 16px;
        color: rgba(255,255,255,.86);
        text-decoration: none;
        background: transparent;
        border: 0;
        cursor: pointer;
        font: inherit;
      }
      .dropdown-link-main {
        display: inline-flex;
        align-items: center;
        gap: 10px;
      }
      .dropdown-link-main i {
        width: 16px;
        text-align: center;
      }
      .dropdown-link:hover,
      .dropdown-logout:hover {
        background: rgba(255,255,255,.08);
        color: #fff;
      }
      .dropdown-link small,
      .dropdown-logout small { color: rgba(255,255,255,.46); }
      .content-main {
        padding: 24px 26px 28px;
      }
      .flash {
        margin-bottom: 18px;
        padding: 16px 18px;
        border-radius: 22px;
        border: 1px solid transparent;
        font-size: .95rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 12px;
        box-shadow: 0 18px 40px rgba(15, 34, 55, 0.06);
      }
      .flash-success {
        background: linear-gradient(135deg, rgba(69, 160, 112, .12) 0%, rgba(225, 246, 236, .92) 100%);
        border-color: rgba(69,160,112,.20);
        color: #21633b;
      }
      .flash-danger {
        background: linear-gradient(135deg, rgba(202, 86, 86, .10) 0%, rgba(255, 242, 242, .96) 100%);
        border-color: rgba(202,86,86,.18);
        color: #7c2d2d;
      }
      .flash-icon {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex: 0 0 auto;
      }
      .flash-success .flash-icon {
        background: rgba(69,160,112,.14);
      }
      .flash-danger .flash-icon {
        background: rgba(202,86,86,.12);
      }
      .admin-card {
        border: 1px solid rgba(255,255,255,.72);
        box-shadow: 0 20px 50px rgba(15, 34, 55, 0.08);
        border-radius: 24px;
        background: var(--card);
        backdrop-filter: blur(14px);
      }
      .admin-card .card-body { padding: 22px; }
      table { --bs-table-bg: transparent !important; }
      @media (max-width: 1100px) {
        .admin-shell { grid-template-columns: 1fr; }
        .admin-sidebar { padding-bottom: 18px; }
        .sidebar-footer { margin-top: 8px; }
      }
      @media (max-width: 760px) {
        .content-shell { padding: 10px; }
        .content-frame { min-height: calc(100vh - 20px); border-radius: 22px; }
        .admin-topbar {
          flex-direction: column;
          align-items: stretch;
          padding: 18px;
        }
        .topbar-actions {
          justify-content: space-between;
          flex-wrap: wrap;
        }
        .quick-action { flex: 1 1 100%; justify-content: center; }
        .content-main { padding: 18px; }
      }
    </style>
  </head>
  <body>
    @php
      $user = auth()->user();
      $initials = collect(explode(' ', $user->name ?? 'Admin'))->filter()->map(fn ($part) => strtoupper(substr($part, 0, 1)))->take(2)->implode('');
      $pageMenu = [
          ['key' => 'home', 'label' => 'Home', 'icon' => 'bi-house-door'],
          ['key' => 'about', 'label' => 'About', 'icon' => 'bi-info-circle'],
          ['key' => 'services', 'label' => 'Services', 'icon' => 'bi-briefcase'],
          ['key' => 'clientele', 'label' => 'Clientele', 'icon' => 'bi-people'],
          ['key' => 'gallery', 'label' => 'Gallery', 'icon' => 'bi-images'],
          ['key' => 'contact', 'label' => 'Contact', 'icon' => 'bi-envelope'],
      ];
      $navPages = \App\Models\Page::query()
          ->whereIn('key', collect($pageMenu)->pluck('key'))
          ->get()
          ->keyBy('key');
      $pageRouteParam = request()->route('page');
      $sectionRouteParam = request()->route('section');
      $currentPageModel = $pageRouteParam instanceof \App\Models\Page
          ? $pageRouteParam
          : ($sectionRouteParam instanceof \App\Models\Section ? $sectionRouteParam->page : null);
      $currentPageId = $currentPageModel?->getKey()
          ?? (is_numeric($pageRouteParam) ? (int) $pageRouteParam : null)
          ?? (is_numeric(request('page_id')) ? (int) request('page_id') : null);
      $currentPageKey = $currentPageModel?->key
          ?? optional($navPages->first(fn ($page) => (string) $page->getKey() === (string) $currentPageId))->key
          ?? request()->route('key')
          ?? request('page_key');
      $pagesActive = request()->routeIs('admin.pages.*')
          || request()->routeIs('admin.sections.*')
          || filled($currentPageKey)
          || filled($currentPageId);
      $currentPagePath = request()->path();
    @endphp

    <div class="admin-shell">
      <aside class="admin-sidebar d-flex flex-column">
        <div class="brand-wrap">
          <img src="{{ asset('BREVITY_logo.png') }}" alt="Brevity Anderson Logo" />
          <div>
            <span class="brand-kicker">World-Class CMS</span>
            <div class="brand-name">Brevity <span>Anderson</span></div>
          </div>
        </div>

        <div class="sidebar-label">Workspace</div>
        <nav class="sidebar-nav">
          <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <span class="sidebar-link-main"><i class="bi bi-grid-1x2-fill"></i><span>Dashboard</span></span>
            <small>Overview</small>
          </a>
          <button type="button" class="sidebar-link sidebar-toggle {{ $pagesActive ? 'active' : '' }}" data-pages-toggle aria-expanded="{{ $pagesActive ? 'true' : 'false' }}" aria-current="{{ $pagesActive ? 'page' : 'false' }}">
            <span class="sidebar-link-main"><i class="bi bi-files-alt"></i><span>Pages</span></span>
            <small class="sidebar-toggle-chevron"><i class="bi bi-chevron-down"></i></small>
          </button>
          <div class="sidebar-submenu {{ $pagesActive ? 'is-open' : '' }}" data-pages-menu aria-hidden="{{ $pagesActive ? 'false' : 'true' }}">
            @foreach ($pageMenu as $menuPage)
              @php
                $linkedPage = $navPages->get($menuPage['key']);
                $childActive = $linkedPage
                    && (
                        (string) $currentPageId === (string) $linkedPage->getKey()
                        || $currentPageKey === $menuPage['key']
                        || $currentPagePath === trim(parse_url(route('admin.pages.edit', $linkedPage), PHP_URL_PATH), '/')
                    );
              @endphp
              <a
                href="{{ route('admin.pages.manage', $menuPage['key']) }}"
                class="sidebar-sublink {{ $childActive ? 'active' : '' }}"
                aria-current="{{ $childActive ? 'page' : 'false' }}"
              >
                <i class="bi {{ $menuPage['icon'] }}"></i>
                <span>{{ $menuPage['label'] }}</span>
              </a>
            @endforeach
          </div>
          <a href="{{ route('admin.media.index') }}" class="sidebar-link {{ request()->routeIs('admin.media.*') ? 'active' : '' }}">
            <span class="sidebar-link-main"><i class="bi bi-collection-play"></i><span>Media Library</span></span>
            <small>Assets</small>
          </a>
          <a href="{{ route('admin.settings.edit') }}" class="sidebar-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
            <span class="sidebar-link-main"><i class="bi bi-sliders2"></i><span>Settings</span></span>
            <small>Global controls</small>
          </a>
          <a href="{{ route('admin.account.show') }}" class="sidebar-link {{ request()->routeIs('admin.account.*') ? 'active' : '' }}">
            <span class="sidebar-link-main"><i class="bi bi-person-circle"></i><span>Account</span></span>
            <small>Profile view</small>
          </a>
        </nav>

        <div class="sidebar-footer">
          <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="sidebar-logout">
              <span class="sidebar-logout-main"><i class="bi bi-box-arrow-right"></i><span>Logout</span></span>
              <small>End session</small>
            </button>
          </form>
        </div>
      </aside>

      <div class="content-shell">
        <div class="content-frame">
          <header class="admin-topbar">
            <div>
              <span class="heading-eyebrow">Brevity Admin</span>
              <h1>{{ $heading ?? 'Admin Panel' }}</h1>
              @isset($subheading)
                <p>{{ $subheading }}</p>
              @endisset
            </div>

            <div class="topbar-actions">
              <a href="{{ route('home') }}" class="quick-action" target="_blank" rel="noreferrer">View Website</a>
              <div class="user-menu" data-user-menu>
                <button class="user-trigger" type="button" data-user-trigger aria-expanded="false">
                  <span class="avatar">{{ $initials ?: 'BA' }}</span>
                  <span class="user-meta">
                    <strong>{{ $user->name }}</strong>
                    <span>{{ $user->email }}</span>
                  </span>
                </button>

                <div class="dropdown-panel" data-user-panel>
                  <div class="dropdown-head">
                    <strong>{{ $user->name }}</strong>
                    <span>{{ $user->email }}</span>
                  </div>
                  <a class="dropdown-link" href="{{ route('admin.account.show') }}">
                    <span class="dropdown-link-main"><i class="bi bi-person-vcard"></i><span>Account</span></span>
                    <small>View profile</small>
                  </a>
                  <a class="dropdown-link" href="{{ route('admin.account.edit') }}">
                    <span class="dropdown-link-main"><i class="bi bi-pencil-square"></i><span>Edit Profile</span></span>
                    <small>Update details</small>
                  </a>
                  <a class="dropdown-link" href="{{ route('admin.settings.edit') }}">
                    <span class="dropdown-link-main"><i class="bi bi-gear"></i><span>Settings</span></span>
                    <small>Site configuration</small>
                  </a>
                  <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button class="dropdown-logout" type="submit">
                      <span class="dropdown-link-main"><i class="bi bi-box-arrow-right"></i><span>Logout</span></span>
                      <small>End session</small>
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </header>

          <main class="content-main">
            @if (session('status'))
              <div class="flash flash-success">
                <span class="flash-icon"><i class="bi bi-check2-circle"></i></span>
                <span>{{ session('status') }}</span>
              </div>
            @endif

            @if ($errors->any())
              <div class="flash flash-danger">
                <span class="flash-icon"><i class="bi bi-exclamation-octagon"></i></span>
                <ul class="mb-0 ps-3">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            {{ $slot }}
          </main>
        </div>
      </div>
    </div>

    <script>
      document.addEventListener('click', function (event) {
        const menu = document.querySelector('[data-user-menu]');
        if (menu) {
          const trigger = menu.querySelector('[data-user-trigger]');
          const isInside = menu.contains(event.target);

          if (event.target.closest('[data-user-trigger]')) {
            const open = menu.classList.toggle('open');
            trigger.setAttribute('aria-expanded', open ? 'true' : 'false');
            return;
          }

          if (!isInside) {
            menu.classList.remove('open');
            trigger.setAttribute('aria-expanded', 'false');
          }
        }
      });

      document.addEventListener('click', function (event) {
        const toggle = event.target.closest('[data-pages-toggle]');
        if (!toggle) {
          return;
        }

        const submenu = document.querySelector('[data-pages-menu]');
        const open = toggle.getAttribute('aria-expanded') === 'true';
        toggle.setAttribute('aria-expanded', open ? 'false' : 'true');
        toggle.classList.toggle('active', !open);
        if (submenu) {
          submenu.classList.toggle('is-open', !open);
          submenu.setAttribute('aria-hidden', open ? 'true' : 'false');
        }
      });
    </script>
  </body>
</html>
