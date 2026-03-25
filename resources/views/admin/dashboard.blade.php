<x-admin.layouts.app :title="'Dashboard'" :heading="'Executive Dashboard'" :subheading="'A refined control center for your pages, assets, and site-wide presentation.'">
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
  <style>
    .dashboard-hero {
      position: relative;
      overflow: hidden;
      border-radius: 28px;
      padding: 28px;
      background:
        radial-gradient(circle at top right, rgba(211,176,106,.28), transparent 26%),
        linear-gradient(135deg, #10263f 0%, #143b66 55%, #1f568f 100%);
      color: #fff;
      box-shadow: 0 28px 60px rgba(12, 26, 41, .18);
      margin-bottom: 24px;
    }
    .dashboard-hero::after {
      content: '';
      position: absolute;
      inset: 16px;
      border: 1px solid rgba(255,255,255,.10);
      border-radius: 22px;
      pointer-events: none;
    }
    .dashboard-hero-grid {
      position: relative;
      z-index: 1;
      display: grid;
      grid-template-columns: minmax(0, 1.4fr) minmax(300px, .9fr);
      gap: 22px;
      align-items: stretch;
    }
    .hero-kicker {
      display: inline-block;
      letter-spacing: .22em;
      text-transform: uppercase;
      font-size: .72rem;
      color: rgba(255,255,255,.64);
      margin-bottom: 10px;
    }
    .hero-title {
      margin: 0 0 12px;
      font-family: 'Cormorant Garamond', serif;
      font-size: clamp(2rem, 3vw, 2.9rem);
      line-height: .98;
      max-width: 11ch;
    }
    .hero-copy {
      max-width: 56ch;
      color: rgba(255,255,255,.76);
      line-height: 1.75;
      margin-bottom: 20px;
    }
    .hero-actions {
      display: flex;
      flex-wrap: wrap;
      gap: 12px;
    }
    .hero-btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 12px 16px;
      border-radius: 16px;
      text-decoration: none;
      font-weight: 600;
      transition: transform .25s ease, box-shadow .25s ease;
    }
    .hero-btn-primary {
      color: #10263f;
      background: linear-gradient(135deg, #f0d59d 0%, #d3b06a 100%);
      box-shadow: 0 18px 34px rgba(211,176,106,.22);
    }
    .hero-btn-secondary {
      color: #fff;
      background: rgba(255,255,255,.08);
      border: 1px solid rgba(255,255,255,.12);
    }
    .hero-btn:hover { transform: translateY(-2px); }
    .hero-side {
      display: grid;
      gap: 14px;
    }
    .hero-side-card {
      border-radius: 22px;
      padding: 18px 18px;
      background: rgba(255,255,255,.08);
      border: 1px solid rgba(255,255,255,.10);
      backdrop-filter: blur(10px);
    }
    .hero-side-card strong {
      display: block;
      font-size: .86rem;
      letter-spacing: .14em;
      text-transform: uppercase;
      color: rgba(255,255,255,.6);
      margin-bottom: 10px;
    }
    .hero-side-card .value {
      font-size: 2rem;
      font-weight: 700;
      margin-bottom: 4px;
    }
    .hero-side-card p {
      margin: 0;
      color: rgba(255,255,255,.72);
      font-size: .88rem;
      line-height: 1.6;
    }
    .stat-grid {
      display: grid;
      grid-template-columns: repeat(4, minmax(0, 1fr));
      gap: 18px;
      margin-bottom: 24px;
    }
    .stat-card {
      position: relative;
      overflow: hidden;
    }
    .stat-card::before {
      content: '';
      position: absolute;
      inset: 0 auto 0 0;
      width: 4px;
      background: linear-gradient(180deg, #d3b06a 0%, rgba(211,176,106,.2) 100%);
    }
    .stat-label {
      color: #7a8ca3;
      text-transform: uppercase;
      letter-spacing: .14em;
      font-size: .72rem;
      margin-bottom: 8px;
    }
    .stat-value {
      font-size: 2rem;
      font-weight: 700;
      color: #10263f;
      margin-bottom: 6px;
    }
    .stat-hint {
      color: #72839a;
      font-size: .86rem;
      line-height: 1.55;
    }
    .dashboard-grid {
      display: grid;
      grid-template-columns: 1.15fr .85fr;
      gap: 20px;
    }
    .chart-card {
      margin-bottom: 22px;
    }
    .chart-head {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 16px;
      margin-bottom: 18px;
    }
    .chart-head p {
      margin: 6px 0 0;
      color: #72839a;
      line-height: 1.7;
    }
    .chart-shell {
      position: relative;
      min-height: 300px;
      padding: 16px 12px 8px;
      border-radius: 24px;
      background:
        radial-gradient(circle at top right, rgba(211,176,106,.14), transparent 28%),
        linear-gradient(180deg, rgba(20,59,102,.04) 0%, rgba(255,255,255,.72) 100%);
      border: 1px solid rgba(16,38,63,.06);
    }
    .chart-caption {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 10px 12px;
      border-radius: 999px;
      background: rgba(20,59,102,.06);
      color: #143b66;
      font-size: .8rem;
      font-weight: 700;
      letter-spacing: .06em;
      text-transform: uppercase;
    }
    .section-title {
      margin: 0 0 16px;
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.65rem;
      color: #10263f;
    }
    .table-shell {
      border-radius: 22px;
      overflow: hidden;
    }
    .table-shell table th {
      color: #7a8ca3;
      text-transform: uppercase;
      letter-spacing: .12em;
      font-size: .72rem;
      border-bottom-color: rgba(16,38,63,.08);
    }
    .table-shell table td {
      vertical-align: middle;
      border-bottom-color: rgba(16,38,63,.06);
    }
    .pill {
      display: inline-flex;
      padding: 7px 10px;
      border-radius: 999px;
      font-size: .74rem;
      font-weight: 700;
      letter-spacing: .06em;
      text-transform: uppercase;
    }
    .pill-success { background: rgba(88, 180, 123, .12); color: #2b7045; }
    .pill-muted { background: rgba(115, 133, 154, .12); color: #546578; }
    .insight-stack {
      display: grid;
      gap: 16px;
    }
    .insight-card {
      display: grid;
      gap: 10px;
      padding: 18px;
    }
    .insight-card strong {
      color: #10263f;
      font-size: .98rem;
    }
    .insight-card p {
      margin: 0;
      color: #72839a;
      font-size: .88rem;
      line-height: 1.65;
    }
    .insight-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 12px;
    }
    .insight-row span:last-child {
      font-weight: 700;
      color: #10263f;
    }
    @media (max-width: 1100px) {
      .stat-grid,
      .dashboard-grid,
      .dashboard-hero-grid {
        grid-template-columns: 1fr 1fr;
      }
      .dashboard-grid {
        grid-template-columns: 1fr;
      }
    }
    @media (max-width: 760px) {
      .dashboard-hero,
      .admin-card .card-body { padding: 18px; }
      .stat-grid,
      .dashboard-hero-grid { grid-template-columns: 1fr; }
    }
  </style>

  <section class="dashboard-hero">
    <div class="dashboard-hero-grid">
      <div>
        <span class="hero-kicker">Brevity Anderson Control Center</span>
        <h2 class="hero-title">Elevate every page, asset, and brand touchpoint.</h2>
        <p class="hero-copy">Use this workspace to manage your public website with the same standard of polish, precision, and clarity that defines the Brevity Anderson brand.</p>
        <div class="hero-actions">
          <a href="{{ route('admin.pages.index') }}" class="hero-btn hero-btn-primary">Manage Pages</a>
          <a href="{{ route('admin.media.index') }}" class="hero-btn hero-btn-secondary">Open Media Library</a>
        </div>
      </div>
      <div class="hero-side">
        <div class="hero-side-card">
          <strong>Published Pages</strong>
          <div class="value">{{ $health['published_pages'] }}</div>
          <p>Live pages currently visible across the public-facing site.</p>
        </div>
        <div class="hero-side-card">
          <strong>Drafts & Hidden Content</strong>
          <div class="value">{{ $health['draft_pages'] + ($health['active_sections'] ? 0 : 0) }}</div>
          <p>{{ $health['draft_pages'] }} draft pages and {{ $health['active_sections'] }} active homepage sections available right now.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="stat-grid">
    @foreach ($stats as $stat)
      <div class="admin-card stat-card">
        <div class="card-body">
          <div class="stat-label">{{ $stat['label'] }}</div>
          <div class="stat-value">{{ $stat['value'] }}</div>
          <div class="stat-hint">{{ $stat['hint'] }}</div>
        </div>
      </div>
    @endforeach
  </section>

  <section class="admin-card chart-card">
    <div class="card-body">
      <div class="chart-head">
        <div>
          <h2 class="section-title mb-0">Recent Page Work</h2>
          <p>A live view of the pages that were worked on most recently, so editorial momentum stays visible at a glance.</p>
        </div>
        <span class="chart-caption">Last {{ count($recentPageChart['labels']) }} updates</span>
      </div>
      <div class="chart-shell">
        <canvas id="recentPagesChart"></canvas>
      </div>
    </div>
  </section>

  <section class="dashboard-grid">
    <div class="admin-card table-shell">
      <div class="card-body">
        <h2 class="section-title">Recent Page Activity</h2>
        <div class="table-responsive">
          <table class="table align-middle mb-0">
            <thead>
              <tr>
                <th>Name</th>
                <th>Slug</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($latestPages as $page)
                <tr>
                  <td>
                    <strong>{{ $page->name }}</strong><br />
                    <span class="text-muted small">{{ $page->template }}</span>
                  </td>
                  <td>{{ $page->slug }}</td>
                  <td>
                    <span class="pill {{ $page->is_published ? 'pill-success' : 'pill-muted' }}">
                      {{ $page->is_published ? 'Published' : 'Draft' }}
                    </span>
                  </td>
                </tr>
              @empty
                <tr><td colspan="3" class="text-muted">No pages available yet.</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="insight-stack">
      <div class="admin-card insight-card">
        <strong>Content Health</strong>
        <div class="insight-row"><span>Published pages</span><span>{{ $health['published_pages'] }}</span></div>
        <div class="insight-row"><span>Draft pages</span><span>{{ $health['draft_pages'] }}</span></div>
        <div class="insight-row"><span>Active homepage sections</span><span>{{ $health['active_sections'] }}</span></div>
      </div>

      <div class="admin-card insight-card">
        <strong>Recent Media Uploads</strong>
        @forelse ($latestMedia as $media)
          <div class="insight-row">
            <span>{{ $media->name }}</span>
            <span>{{ number_format($media->size / 1024, 1) }} KB</span>
          </div>
        @empty
          <p>No media uploaded yet. Add polished assets to strengthen the site presentation.</p>
        @endforelse
      </div>

      <div class="admin-card insight-card">
        <strong>Recommended Next Actions</strong>
        <p>Review page metadata, keep hero sections current, and refresh brand assets so the public site stays sharp and credible.</p>
        <div class="hero-actions">
          <a href="{{ route('admin.account.edit') }}" class="hero-btn hero-btn-secondary">Edit Profile</a>
          <a href="{{ route('admin.settings.edit') }}" class="hero-btn hero-btn-primary">Global Settings</a>
        </div>
      </div>
    </div>
  </section>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const canvas = document.getElementById('recentPagesChart');
      if (!canvas || typeof Chart === 'undefined') {
        return;
      }

      const labels = @json($recentPageChart['labels']);
      const values = @json($recentPageChart['values']);
      const formatted = @json($recentPageChart['formatted']);

      if (!labels.length) {
        return;
      }

      new Chart(canvas, {
        type: 'bar',
        data: {
          labels,
          datasets: [{
            label: 'Page activity',
            data: values,
            borderRadius: 14,
            borderSkipped: false,
            backgroundColor: [
              'rgba(20, 59, 102, 0.88)',
              'rgba(32, 87, 142, 0.82)',
              'rgba(211, 176, 106, 0.88)',
              'rgba(20, 59, 102, 0.78)',
              'rgba(32, 87, 142, 0.72)',
              'rgba(211, 176, 106, 0.76)'
            ],
            hoverBackgroundColor: '#d3b06a'
          }]
        },
        options: {
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false
            },
            tooltip: {
              backgroundColor: 'rgba(12, 25, 40, 0.96)',
              titleColor: '#ffffff',
              bodyColor: 'rgba(255,255,255,0.82)',
              displayColors: false,
              callbacks: {
                label: function (context) {
                  return 'Updated: ' + formatted[context.dataIndex];
                }
              }
            }
          },
          scales: {
            x: {
              grid: {
                display: false
              },
              ticks: {
                color: '#546578',
                font: {
                  family: 'Manrope'
                }
              }
            },
            y: {
              display: false
            }
          }
        }
      });
    });
  </script>
</x-admin.layouts.app>
