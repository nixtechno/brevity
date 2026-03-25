<x-admin.layouts.app :title="'Sections'" :heading="'Homepage Sections'" :subheading="'Manage dynamic homepage and section-level content blocks with a polished editorial workflow.'">
  <style>
    .sections-shell {
      display: grid;
      gap: 22px;
    }
    .sections-hero {
      display: grid;
      grid-template-columns: minmax(0, 1.2fr) minmax(260px, .8fr);
      gap: 18px;
      padding: 24px;
      border-radius: 28px;
      background:
        radial-gradient(circle at top right, rgba(211,176,106,.20), transparent 24%),
        linear-gradient(135deg, #10263f 0%, #143b66 58%, #1d4e81 100%);
      color: #fff;
      box-shadow: 0 28px 60px rgba(12, 26, 41, .16);
    }
    .sections-hero h2 {
      margin: 0 0 10px;
      font-family: 'Cormorant Garamond', serif;
      font-size: clamp(2rem, 3vw, 2.6rem);
      line-height: 1;
      max-width: 12ch;
    }
    .sections-hero p {
      margin: 0;
      color: rgba(255,255,255,.78);
      line-height: 1.8;
      max-width: 58ch;
    }
    .sections-hero-actions {
      margin-top: 20px;
      display: flex;
      flex-wrap: wrap;
      gap: 12px;
    }
    .sections-btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      min-height: 50px;
      padding: 0 18px;
      border-radius: 16px;
      text-decoration: none;
      font-weight: 700;
      transition: transform .22s ease, box-shadow .22s ease;
    }
    .sections-btn:hover { transform: translateY(-1px); }
    .sections-btn-primary {
      color: #10263f;
      background: linear-gradient(135deg, #f0d59d 0%, #d3b06a 100%);
      box-shadow: 0 18px 30px rgba(211,176,106,.22);
    }
    .sections-btn-secondary {
      color: #fff;
      background: rgba(255,255,255,.10);
      border: 1px solid rgba(255,255,255,.14);
    }
    .sections-hero-side {
      display: grid;
      gap: 14px;
    }
    .sections-stat {
      padding: 18px;
      border-radius: 20px;
      background: rgba(255,255,255,.08);
      border: 1px solid rgba(255,255,255,.10);
      backdrop-filter: blur(8px);
    }
    .sections-stat span {
      display: block;
      color: rgba(255,255,255,.64);
      font-size: .76rem;
      letter-spacing: .12em;
      text-transform: uppercase;
      margin-bottom: 8px;
    }
    .sections-stat strong {
      font-size: 1.9rem;
      line-height: 1;
    }
    .sections-stat p {
      margin-top: 6px;
      color: rgba(255,255,255,.72);
      font-size: .88rem;
      line-height: 1.7;
    }
    .sections-card {
      border-radius: 26px;
      border: 1px solid rgba(255,255,255,.72);
      background: rgba(255,255,255,.90);
      box-shadow: 0 22px 50px rgba(15, 34, 55, 0.08);
      overflow: hidden;
    }
    .sections-card-head {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 16px;
      padding: 22px 24px 16px;
      border-bottom: 1px solid rgba(16,38,63,.06);
    }
    .sections-card-head h3 {
      margin: 0 0 6px;
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.8rem;
      color: #10263f;
    }
    .sections-card-head p {
      margin: 0;
      color: #72839a;
      line-height: 1.7;
    }
    .sections-table-wrap {
      padding: 10px 18px 18px;
    }
    .sections-table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0 12px;
    }
    .sections-table thead th {
      padding: 0 14px 8px;
      color: #72839a;
      font-size: .76rem;
      text-transform: uppercase;
      letter-spacing: .12em;
      font-weight: 800;
    }
    .sections-table tbody tr {
      background: linear-gradient(180deg, rgba(255,255,255,.98) 0%, rgba(247,250,255,.94) 100%);
      box-shadow: 0 12px 30px rgba(15, 34, 55, 0.06);
    }
    .sections-table tbody td {
      padding: 18px 14px;
      vertical-align: middle;
      color: #1f3650;
      border-top: 1px solid rgba(16,38,63,.05);
      border-bottom: 1px solid rgba(16,38,63,.05);
    }
    .sections-table tbody td:first-child {
      border-left: 1px solid rgba(16,38,63,.05);
      border-top-left-radius: 18px;
      border-bottom-left-radius: 18px;
    }
    .sections-table tbody td:last-child {
      border-right: 1px solid rgba(16,38,63,.05);
      border-top-right-radius: 18px;
      border-bottom-right-radius: 18px;
    }
    .section-page {
      display: grid;
      gap: 4px;
    }
    .section-page strong {
      color: #10263f;
    }
    .section-page span,
    .section-key,
    .section-order {
      color: #72839a;
      font-size: .9rem;
    }
    .status-pill {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 8px 12px;
      border-radius: 999px;
      font-size: .74rem;
      font-weight: 800;
      letter-spacing: .08em;
      text-transform: uppercase;
    }
    .status-pill.active {
      background: rgba(69,160,112,.12);
      color: #256946;
    }
    .status-pill.hidden {
      background: rgba(114,131,154,.14);
      color: #5e6f82;
    }
    .section-actions {
      display: flex;
      justify-content: flex-end;
      gap: 10px;
      flex-wrap: wrap;
    }
    .section-action {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      min-height: 42px;
      padding: 0 14px;
      border-radius: 14px;
      border: 1px solid transparent;
      text-decoration: none;
      font-weight: 700;
      cursor: pointer;
      font: inherit;
      transition: transform .22s ease, box-shadow .22s ease, background .22s ease;
    }
    .section-action:hover { transform: translateY(-1px); }
    .section-action-edit {
      color: #143b66;
      background: rgba(20,59,102,.06);
      border-color: rgba(20,59,102,.08);
    }
    .section-action-delete {
      color: #a14242;
      background: rgba(202,86,86,.08);
      border-color: rgba(202,86,86,.10);
    }
    .sections-empty {
      padding: 32px 24px 36px;
      text-align: center;
    }
    .sections-empty strong {
      display: block;
      color: #10263f;
      font-size: 1.08rem;
      margin-bottom: 8px;
    }
    .sections-empty p {
      margin: 0 auto 18px;
      color: #72839a;
      line-height: 1.8;
      max-width: 52ch;
    }
    @media (max-width: 1080px) {
      .sections-hero {
        grid-template-columns: 1fr;
      }
    }
    @media (max-width: 860px) {
      .sections-card-head {
        flex-direction: column;
        align-items: flex-start;
      }
      .sections-table-wrap {
        overflow-x: auto;
      }
      .sections-table {
        min-width: 760px;
      }
    }
  </style>

  <div class="sections-shell">
    <section class="sections-hero">
      <div>
        <h2>Curate every homepage section with confidence.</h2>
        <p>Organize the page flow, refine messaging, and manage the content blocks that shape the landing experience without disturbing the frontend design.</p>
        <div class="sections-hero-actions">
          <a href="{{ route('admin.sections.create') }}" class="sections-btn sections-btn-primary">
            <i class="bi bi-plus-circle"></i>
            <span>Create Section</span>
          </a>
          <a href="{{ route('admin.pages.manage', 'home') }}" class="sections-btn sections-btn-secondary">
            <i class="bi bi-house-door"></i>
            <span>Open Homepage Editor</span>
          </a>
        </div>
      </div>

      <div class="sections-hero-side">
        <div class="sections-stat">
          <span>Total Sections</span>
          <strong>{{ $sections->total() }}</strong>
          <p>All dynamic sections currently available across your CMS pages.</p>
        </div>
        <div class="sections-stat">
          <span>Active Blocks</span>
          <strong>{{ $sections->where('is_active', true)->count() }}</strong>
          <p>Content blocks currently visible on the live frontend experience.</p>
        </div>
      </div>
    </section>

    <section class="sections-card">
      <div class="sections-card-head">
        <div>
          <h3>Section Inventory</h3>
          <p>Review all section blocks, their order, and their publishing state from a single premium control surface.</p>
        </div>
      </div>

      <div class="sections-table-wrap">
        @if ($sections->count())
          <table class="sections-table">
            <thead>
              <tr>
                <th>Page</th>
                <th>Section</th>
                <th>Key</th>
                <th>Order</th>
                <th>Status</th>
                <th class="text-end">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($sections as $section)
                <tr>
                  <td>
                    <div class="section-page">
                      <strong>{{ $section->page?->name ?? 'Unassigned Page' }}</strong>
                      <span>{{ $section->page?->slug === '/' ? '/' : '/' . ltrim($section->page?->slug ?? '', '/') }}</span>
                    </div>
                  </td>
                  <td>
                    <div class="section-page">
                      <strong>{{ $section->name }}</strong>
                      <span>{{ $section->title ?: 'Section content block' }}</span>
                    </div>
                  </td>
                  <td><span class="section-key">{{ $section->key }}</span></td>
                  <td><span class="section-order">#{{ $section->sort_order }}</span></td>
                  <td>
                    <span class="status-pill {{ $section->is_active ? 'active' : 'hidden' }}">
                      {{ $section->is_active ? 'Active' : 'Hidden' }}
                    </span>
                  </td>
                  <td>
                    <div class="section-actions">
                      <a href="{{ route('admin.sections.edit', $section) }}" class="section-action section-action-edit">
                        <i class="bi bi-pencil-square"></i>
                        <span>Edit</span>
                      </a>
                      <form method="POST" action="{{ route('admin.sections.destroy', $section) }}" onsubmit="return confirm('Delete this section?')">
                        @csrf
                        @method('DELETE')
                        <button class="section-action section-action-delete" type="submit">
                          <i class="bi bi-trash3"></i>
                          <span>Delete</span>
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        @else
          <div class="sections-empty">
            <strong>No sections found yet.</strong>
            <p>Create your first content block to begin shaping the homepage and connected CMS page experiences.</p>
            <a href="{{ route('admin.sections.create') }}" class="sections-btn sections-btn-primary">
              <i class="bi bi-plus-circle"></i>
              <span>Create Section</span>
            </a>
          </div>
        @endif

        <div class="mt-3">
          {{ $sections->links() }}
        </div>
      </div>
    </section>
  </div>
</x-admin.layouts.app>
