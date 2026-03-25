<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'Admin Panel' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
      body { background: #f5f7fb; }
      .admin-shell { min-height: 100vh; }
      .admin-sidebar { width: 280px; background: #143b66; color: #fff; }
      .admin-sidebar a { color: rgba(255,255,255,.85); text-decoration: none; }
      .admin-sidebar a.active, .admin-sidebar a:hover { color: #fff; background: rgba(255,255,255,.08); }
      .admin-topbar { background: #fff; border-bottom: 1px solid #e6ebf2; }
      .admin-card { border: 0; box-shadow: 0 10px 30px rgba(20,59,102,.08); border-radius: 18px; }
      .sidebar-link { display:block; padding: .9rem 1rem; border-radius: 12px; margin-bottom: .35rem; }
      @media (max-width: 991.98px) {
        .admin-sidebar { width: 100%; }
      }
    </style>
  </head>
  <body>
    <div class="admin-shell d-lg-flex">
      <aside class="admin-sidebar p-4">
        <div class="mb-4">
          <div class="fw-bold fs-4">Brevity CMS</div>
          <div class="small text-white-50">Admin backend</div>
        </div>

        <nav>
          <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
          <a href="{{ route('admin.pages.index') }}" class="sidebar-link {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">Pages</a>
          <a href="{{ route('admin.sections.index') }}" class="sidebar-link {{ request()->routeIs('admin.sections.*') ? 'active' : '' }}">Homepage Sections</a>
          <a href="{{ route('admin.media.index') }}" class="sidebar-link {{ request()->routeIs('admin.media.*') ? 'active' : '' }}">Media</a>
          <a href="{{ route('admin.settings.edit') }}" class="sidebar-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">Settings</a>
        </nav>
      </aside>

      <div class="flex-grow-1">
        <header class="admin-topbar px-4 py-3 d-flex justify-content-between align-items-center">
          <div>
            <h1 class="h4 mb-0">{{ $heading ?? 'Admin Panel' }}</h1>
            @isset($subheading)
              <div class="text-muted small">{{ $subheading }}</div>
            @endisset
          </div>
          <div class="d-flex align-items-center gap-3">
            <span class="text-muted small">{{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('admin.logout') }}">
              @csrf
              <button class="btn btn-outline-secondary btn-sm" type="submit">Logout</button>
            </form>
          </div>
        </header>

        <main class="p-4">
          @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
          @endif

          @if ($errors->any())
            <div class="alert alert-danger">
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
  </body>
</html>
