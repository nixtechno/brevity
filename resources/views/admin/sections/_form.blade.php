@php
  $sectionContent = old('content', $section->content ?? []);
  $selectedPage = $pages->firstWhere('id', old('page_id', $section->page_id));
@endphp

<style>
  .section-editor {
    display: grid;
    grid-template-columns: minmax(0, 1.45fr) minmax(300px, .72fr);
    gap: 22px;
  }
  .section-stack {
    display: grid;
    gap: 20px;
  }
  .section-panel {
    border-radius: 26px;
    border: 1px solid rgba(16, 38, 63, 0.08);
    background: linear-gradient(180deg, rgba(255,255,255,.94) 0%, rgba(247,250,255,.90) 100%);
    box-shadow: 0 22px 48px rgba(15, 34, 55, 0.08);
    overflow: hidden;
  }
  .section-panel-head {
    padding: 20px 22px 14px;
    border-bottom: 1px solid rgba(16, 38, 63, 0.06);
    background:
      radial-gradient(circle at top right, rgba(211,176,106,.16), transparent 24%),
      linear-gradient(180deg, rgba(20,59,102,.03) 0%, rgba(255,255,255,.2) 100%);
  }
  .section-panel-head h3 {
    margin: 0 0 6px;
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.65rem;
    color: #10263f;
  }
  .section-panel-head p {
    margin: 0;
    color: #72839a;
    line-height: 1.7;
  }
  .section-panel-body {
    padding: 22px;
  }
  .section-grid {
    display: grid;
    grid-template-columns: repeat(12, minmax(0, 1fr));
    gap: 16px;
  }
  .section-field {
    display: grid;
    gap: 8px;
  }
  .section-span-12 { grid-column: span 12; }
  .section-span-6 { grid-column: span 6; }
  .section-span-4 { grid-column: span 4; }
  .section-label {
    font-size: .78rem;
    font-weight: 800;
    letter-spacing: .08em;
    text-transform: uppercase;
    color: #5f7288;
  }
  .section-help {
    margin: -2px 0 0;
    color: #8a9aae;
    font-size: .86rem;
    line-height: 1.6;
  }
  .section-input,
  .section-select,
  .section-textarea {
    width: 100%;
    border: 1px solid rgba(16, 38, 63, 0.10);
    border-radius: 18px;
    background: rgba(255,255,255,.94);
    color: #10263f;
    font: inherit;
    transition: border-color .22s ease, box-shadow .22s ease, background .22s ease;
  }
  .section-input,
  .section-select {
    min-height: 54px;
    padding: 0 16px;
  }
  .section-textarea {
    padding: 14px 16px;
    min-height: 124px;
    resize: vertical;
  }
  .section-textarea.code {
    min-height: 220px;
    font-family: Consolas, Monaco, monospace;
    font-size: .9rem;
    line-height: 1.65;
  }
  .section-input:focus,
  .section-select:focus,
  .section-textarea:focus {
    outline: none;
    border-color: rgba(211,176,106,.75);
    box-shadow: 0 0 0 5px rgba(211,176,106,.12);
    background: #fff;
  }
  .section-side-card {
    display: grid;
    gap: 16px;
    padding: 20px;
    border-radius: 24px;
    border: 1px solid rgba(16, 38, 63, 0.08);
    background: rgba(255,255,255,.92);
    box-shadow: 0 18px 40px rgba(15, 34, 55, 0.07);
  }
  .section-side-card h3 {
    margin: 0;
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.5rem;
    color: #10263f;
  }
  .section-side-card p {
    margin: 0;
    color: #72839a;
    line-height: 1.7;
  }
  .section-kpis {
    display: grid;
    gap: 12px;
  }
  .section-kpi {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    padding: 12px 14px;
    border-radius: 18px;
    background: rgba(20,59,102,.05);
    border: 1px solid rgba(20,59,102,.06);
  }
  .section-kpi span {
    color: #66798f;
    font-size: .84rem;
    font-weight: 700;
    letter-spacing: .05em;
    text-transform: uppercase;
  }
  .section-kpi strong {
    color: #10263f;
    font-size: .95rem;
  }
  .section-switch {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 14px;
    padding: 16px 18px;
    border-radius: 20px;
    background: linear-gradient(135deg, rgba(20,59,102,.05) 0%, rgba(211,176,106,.09) 100%);
    border: 1px solid rgba(16, 38, 63, 0.08);
  }
  .section-switch-copy strong {
    display: block;
    color: #10263f;
    margin-bottom: 4px;
  }
  .section-switch-copy span {
    color: #72839a;
    font-size: .9rem;
  }
  .section-switch input {
    width: 52px;
    height: 28px;
    accent-color: #143b66;
  }
  .section-actions {
    display: grid;
    gap: 12px;
  }
  .section-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 52px;
    padding: 0 18px;
    border-radius: 18px;
    border: 1px solid transparent;
    text-decoration: none;
    font-weight: 700;
    font-size: .95rem;
    cursor: pointer;
    transition: transform .22s ease, box-shadow .22s ease;
  }
  .section-button:hover { transform: translateY(-1px); }
  .section-button-primary {
    color: #10263f;
    background: linear-gradient(135deg, #f0d59d 0%, #d3b06a 100%);
    box-shadow: 0 18px 34px rgba(211,176,106,.22);
  }
  .section-button-secondary {
    color: #143b66;
    background: rgba(20,59,102,.06);
    border-color: rgba(20,59,102,.08);
  }
  @media (max-width: 1080px) {
    .section-editor {
      grid-template-columns: 1fr;
    }
  }
  @media (max-width: 760px) {
    .section-grid {
      grid-template-columns: 1fr;
    }
    .section-span-12,
    .section-span-6,
    .section-span-4 {
      grid-column: auto;
    }
    .section-panel-head,
    .section-panel-body,
    .section-side-card {
      padding: 18px;
    }
  }
</style>

<div class="section-editor">
  <div class="section-stack">
    <section class="section-panel">
      <div class="section-panel-head">
        <h3>Section Identity</h3>
        <p>Define where this content block belongs and how it is referenced inside the CMS and frontend template structure.</p>
      </div>
      <div class="section-panel-body">
        <div class="section-grid">
          <div class="section-field section-span-6">
            <label class="section-label">Page</label>
            <select class="section-select" name="page_id" required>
              @foreach ($pages as $pageOption)
                <option value="{{ $pageOption->id }}" @selected(old('page_id', $section->page_id) == $pageOption->id)>{{ $pageOption->name }}</option>
              @endforeach
            </select>
            <p class="section-help">Choose the page this section should power on the public site.</p>
          </div>
          <div class="section-field section-span-6">
            <label class="section-label">Section Name</label>
            <input class="section-input" name="name" value="{{ old('name', $section->name) }}" required />
            <p class="section-help">A readable name for editors managing the page structure.</p>
          </div>
          <div class="section-field section-span-6">
            <label class="section-label">Section Key</label>
            <input class="section-input" name="key" value="{{ old('key', $section->key) }}" required />
            <p class="section-help">A stable identifier used to connect this block to frontend rendering logic.</p>
          </div>
          <div class="section-field section-span-6">
            <label class="section-label">Sort Order</label>
            <input class="section-input" type="number" name="sort_order" value="{{ old('sort_order', $section->sort_order) }}" />
            <p class="section-help">Lower numbers appear earlier in the page flow.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="section-panel">
      <div class="section-panel-head">
        <h3>Editorial Copy</h3>
        <p>Write the core message for this section, including headings, supporting copy, and any lead-in content.</p>
      </div>
      <div class="section-panel-body">
        <div class="section-grid">
          <div class="section-field section-span-12">
            <label class="section-label">Title</label>
            <input class="section-input" name="title" value="{{ old('title', $section->title) }}" />
          </div>
          <div class="section-field section-span-12">
            <label class="section-label">Subtitle</label>
            <textarea class="section-textarea" rows="3" name="subtitle">{{ old('subtitle', $section->subtitle) }}</textarea>
          </div>
          <div class="section-field section-span-12">
            <label class="section-label">Body</label>
            <textarea class="section-textarea" rows="5" name="body">{{ old('body', $section->body) }}</textarea>
          </div>
        </div>
      </div>
    </section>

    <section class="section-panel">
      <div class="section-panel-head">
        <h3>Media And Calls To Action</h3>
        <p>Add supporting imagery and the action links that help users move through the experience.</p>
      </div>
      <div class="section-panel-body">
        <div class="section-grid">
          <div class="section-field section-span-12">
            <label class="section-label">Image Path</label>
            <input class="section-input" name="image_path" value="{{ old('image_path', $section->image_path) }}" />
          </div>
          <div class="section-field section-span-6">
            <label class="section-label">Button Text</label>
            <input class="section-input" name="button_text" value="{{ old('button_text', $section->button_text) }}" />
          </div>
          <div class="section-field section-span-6">
            <label class="section-label">Button Link</label>
            <input class="section-input" name="button_link" value="{{ old('button_link', $section->button_link) }}" />
          </div>
        </div>
      </div>
    </section>

    <section class="section-panel">
      <div class="section-panel-head">
        <h3>Structured Content Studio</h3>
        <p>Use the advanced JSON area for nested cards, logos, testimonials, quick links, and other rich section payloads.</p>
      </div>
      <div class="section-panel-body">
        <div class="section-grid">
          <div class="section-field section-span-12">
            <label class="section-label">Advanced Content JSON</label>
            <textarea class="section-textarea code" rows="12" name="content_json">{{ old('content_json', json_encode($sectionContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)) }}</textarea>
            <p class="section-help">This is ideal for multi-card service groups, testimonials, logo arrays, and footer link collections.</p>
          </div>
        </div>
      </div>
    </section>
  </div>

  <aside class="section-stack">
    <section class="section-side-card">
      <h3>Section Status</h3>
      <p>Control whether this section appears live on the website while keeping its data safely editable in the CMS.</p>
      <label class="section-switch">
        <span class="section-switch-copy">
          <strong>{{ old('is_active', $section->is_active) ? 'Active' : 'Hidden' }}</strong>
          <span>Toggle visibility for this section.</span>
        </span>
        <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $section->is_active)) />
      </label>
      <div class="section-actions">
        <button class="section-button section-button-primary" type="submit">Save Section</button>
        <a class="section-button section-button-secondary" href="{{ route('admin.sections.index') }}">Back To Sections</a>
      </div>
    </section>

    <section class="section-side-card">
      <h3>Section Snapshot</h3>
      <p>A quick orientation panel so editors can see where this block belongs and what kind of content it carries.</p>
      <div class="section-kpis">
        <div class="section-kpi">
          <span>Page</span>
          <strong>{{ $selectedPage?->name ?? 'Not linked' }}</strong>
        </div>
        <div class="section-kpi">
          <span>Name</span>
          <strong>{{ old('name', $section->name ?: 'Untitled') }}</strong>
        </div>
        <div class="section-kpi">
          <span>Key</span>
          <strong>{{ old('key', $section->key ?: 'not-set') }}</strong>
        </div>
        <div class="section-kpi">
          <span>Order</span>
          <strong>{{ old('sort_order', $section->sort_order ?? 0) }}</strong>
        </div>
      </div>
    </section>
  </aside>
</div>
