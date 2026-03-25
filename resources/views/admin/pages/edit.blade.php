<x-admin.layouts.app :title="'Edit ' . $page->name" :heading="$page->name . ' Page'" :subheading="'Update the content, hero area, SEO, and sections for the ' . strtolower($page->name) . ' page.'">
  <style>
    .page-identity {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 16px;
      padding: 18px 20px;
      border-radius: 24px;
      background:
        radial-gradient(circle at top right, rgba(211,176,106,.18), transparent 28%),
        linear-gradient(135deg, rgba(20,59,102,.08) 0%, rgba(255,255,255,.8) 100%);
      border: 1px solid rgba(16, 38, 63, 0.08);
      box-shadow: 0 18px 42px rgba(15, 34, 55, 0.06);
    }
    .page-identity h2 {
      margin: 0 0 6px;
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.9rem;
      color: #10263f;
    }
    .page-identity p {
      margin: 0;
      color: #72839a;
      line-height: 1.7;
      max-width: 62ch;
    }
    .page-identity-badge {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 10px 14px;
      border-radius: 999px;
      background: rgba(20,59,102,.08);
      color: #143b66;
      font-size: .78rem;
      font-weight: 700;
      letter-spacing: .08em;
      text-transform: uppercase;
      white-space: nowrap;
    }
    .page-identity-meta {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin-top: 14px;
    }
    .page-identity-chip {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 8px 12px;
      border-radius: 999px;
      background: rgba(20,59,102,.06);
      color: #143b66;
      font-size: .78rem;
      font-weight: 700;
      letter-spacing: .06em;
      text-transform: uppercase;
    }
    .page-editor-stack {
      display: grid;
      gap: 22px;
    }
    .section-manager-head {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 16px;
      margin-bottom: 18px;
    }
    .section-manager-head h2 {
      margin: 0;
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.8rem;
      color: #10263f;
    }
    .section-manager-head p {
      margin: 6px 0 0;
      color: #72839a;
    }
    .section-grid {
      display: grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: 16px;
    }
    .section-card {
      border: 1px solid rgba(16, 38, 63, 0.08);
      border-radius: 22px;
      padding: 18px;
      background: rgba(255, 255, 255, 0.72);
      box-shadow: 0 18px 40px rgba(15, 34, 55, 0.06);
    }
    .section-card strong {
      display: block;
      color: #10263f;
      font-size: 1rem;
      margin-bottom: 6px;
    }
    .section-card p {
      margin: 0 0 14px;
      color: #72839a;
      line-height: 1.65;
    }
    .section-card-meta {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      margin-bottom: 14px;
    }
    .section-chip {
      display: inline-flex;
      align-items: center;
      padding: 6px 10px;
      border-radius: 999px;
      background: rgba(20, 59, 102, 0.08);
      color: #143b66;
      font-size: 0.74rem;
      font-weight: 700;
      letter-spacing: 0.04em;
      text-transform: uppercase;
    }
    .section-actions {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
    }
    .section-btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      padding: 10px 14px;
      border-radius: 14px;
      text-decoration: none;
      font-weight: 600;
      border: 1px solid rgba(16, 38, 63, 0.08);
      color: #10263f;
      background: rgba(255, 255, 255, 0.9);
    }
    .section-btn-primary {
      color: #10263f;
      background: linear-gradient(135deg, #f0d59d 0%, #d3b06a 100%);
      border-color: rgba(211, 176, 106, 0.4);
    }
    @media (max-width: 900px) {
      .page-identity {
        align-items: flex-start;
        flex-direction: column;
      }
      .section-grid {
        grid-template-columns: 1fr;
      }
      .section-manager-head {
        align-items: flex-start;
        flex-direction: column;
      }
    }
  </style>

  <div class="page-editor-stack">
    <section class="page-identity">
      <div>
        <h2>{{ $page->name }}</h2>
        <p>
          You are editing the {{ strtolower($page->name) }} page that appears on the public website at
          <strong>{{ $page->slug === '/' ? '/' : '/' . ltrim($page->slug, '/') }}</strong>.
        </p>
        <div class="page-identity-meta">
          <span class="page-identity-chip">Page Name: {{ $page->name }}</span>
          <span class="page-identity-chip">Template: {{ $page->template }}</span>
        </div>
      </div>
      <span class="page-identity-badge">{{ $page->key }}</span>
    </section>

    <form method="POST" action="{{ route('admin.pages.update', $page) }}">
      @csrf
      @method('PUT')
      @include('admin.pages._form')
    </form>

    <section class="admin-card">
      <div class="card-body">
        <div class="section-manager-head">
          <div>
            <h2>Section Manager</h2>
            <p>Edit the dynamic sections powering the {{ $page->name }} page on the frontend.</p>
          </div>
          <a href="{{ route('admin.sections.create', ['page_id' => $page->id]) }}" class="section-btn section-btn-primary">Add Section</a>
        </div>

        <div class="section-grid">
          @forelse ($page->sections as $section)
            <article class="section-card">
              <strong>{{ $section->name }}</strong>
              <p>{{ $section->title ?: ($section->subtitle ?: 'This section is ready to be populated with frontend content.') }}</p>
              <div class="section-card-meta">
                <span class="section-chip">{{ $section->key }}</span>
                <span class="section-chip">Order {{ $section->sort_order }}</span>
                <span class="section-chip">{{ $section->is_active ? 'Active' : 'Inactive' }}</span>
              </div>
              <div class="section-actions">
                <a href="{{ route('admin.sections.edit', $section) }}" class="section-btn">Edit Section</a>
              </div>
            </article>
          @empty
            <article class="section-card">
              <strong>No sections yet</strong>
              <p>This page does not have any editable sections yet. Add one to begin connecting frontend blocks to the CMS.</p>
              <div class="section-actions">
                <a href="{{ route('admin.sections.create', ['page_id' => $page->id]) }}" class="section-btn section-btn-primary">Create First Section</a>
              </div>
            </article>
          @endforelse
        </div>
      </div>
    </section>
  </div>
</x-admin.layouts.app>
