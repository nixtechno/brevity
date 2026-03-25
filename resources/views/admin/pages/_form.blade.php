@php
  $pageContent = old('content', $page->content ?? []);
@endphp

<style>
  .cms-editor {
    display: grid;
    grid-template-columns: minmax(0, 1.45fr) minmax(300px, .72fr);
    gap: 22px;
  }
  .cms-stack {
    display: grid;
    gap: 20px;
  }
  .cms-panel {
    border-radius: 26px;
    border: 1px solid rgba(16, 38, 63, 0.08);
    background: linear-gradient(180deg, rgba(255,255,255,.92) 0%, rgba(247,250,255,.88) 100%);
    box-shadow: 0 22px 48px rgba(15, 34, 55, 0.08);
    overflow: hidden;
  }
  .cms-panel-head {
    padding: 20px 22px 14px;
    border-bottom: 1px solid rgba(16, 38, 63, 0.06);
    background:
      radial-gradient(circle at top right, rgba(211,176,106,.16), transparent 24%),
      linear-gradient(180deg, rgba(20,59,102,.03) 0%, rgba(255,255,255,.2) 100%);
  }
  .cms-panel-head h3 {
    margin: 0 0 6px;
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.65rem;
    color: #10263f;
  }
  .cms-panel-head p {
    margin: 0;
    color: #72839a;
    line-height: 1.7;
  }
  .cms-panel-body {
    padding: 22px;
  }
  .cms-grid {
    display: grid;
    grid-template-columns: repeat(12, minmax(0, 1fr));
    gap: 16px;
  }
  .cms-field {
    display: grid;
    gap: 8px;
  }
  .cms-span-12 { grid-column: span 12; }
  .cms-span-6 { grid-column: span 6; }
  .cms-label {
    font-size: .78rem;
    font-weight: 800;
    letter-spacing: .08em;
    text-transform: uppercase;
    color: #5f7288;
  }
  .cms-help {
    margin: -2px 0 0;
    color: #8a9aae;
    font-size: .86rem;
    line-height: 1.6;
  }
  .cms-input,
  .cms-select,
  .cms-textarea {
    width: 100%;
    border: 1px solid rgba(16, 38, 63, 0.10);
    border-radius: 18px;
    background: rgba(255,255,255,.92);
    color: #10263f;
    font: inherit;
    transition: border-color .22s ease, box-shadow .22s ease, background .22s ease;
  }
  .cms-input,
  .cms-select {
    min-height: 54px;
    padding: 0 16px;
  }
  .cms-textarea {
    padding: 14px 16px;
    min-height: 130px;
    resize: vertical;
  }
  .cms-textarea.code {
    min-height: 180px;
    font-family: Consolas, Monaco, monospace;
    font-size: .9rem;
    line-height: 1.65;
  }
  .cms-input:focus,
  .cms-select:focus,
  .cms-textarea:focus {
    outline: none;
    border-color: rgba(211,176,106,.75);
    box-shadow: 0 0 0 5px rgba(211,176,106,.12);
    background: #fff;
  }
  .cms-side-card {
    display: grid;
    gap: 16px;
    padding: 20px;
    border-radius: 24px;
    border: 1px solid rgba(16, 38, 63, 0.08);
    background: rgba(255,255,255,.9);
    box-shadow: 0 18px 40px rgba(15, 34, 55, 0.07);
  }
  .cms-side-card h3 {
    margin: 0;
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.5rem;
    color: #10263f;
  }
  .cms-side-card p {
    margin: 0;
    color: #72839a;
    line-height: 1.7;
  }
  .cms-kpis {
    display: grid;
    gap: 12px;
  }
  .cms-kpi {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    padding: 12px 14px;
    border-radius: 18px;
    background: rgba(20,59,102,.05);
    border: 1px solid rgba(20,59,102,.06);
  }
  .cms-kpi span {
    color: #66798f;
    font-size: .84rem;
    font-weight: 700;
    letter-spacing: .05em;
    text-transform: uppercase;
  }
  .cms-kpi strong {
    color: #10263f;
    font-size: .95rem;
  }
  .cms-switch {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 14px;
    padding: 16px 18px;
    border-radius: 20px;
    background: linear-gradient(135deg, rgba(20,59,102,.05) 0%, rgba(211,176,106,.09) 100%);
    border: 1px solid rgba(16, 38, 63, 0.08);
  }
  .cms-switch-copy strong {
    display: block;
    color: #10263f;
    margin-bottom: 4px;
  }
  .cms-switch-copy span {
    color: #72839a;
    font-size: .9rem;
  }
  .cms-switch input {
    width: 52px;
    height: 28px;
    accent-color: #143b66;
  }
  .cms-actions {
    display: grid;
    gap: 12px;
  }
  .cms-button {
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
    transition: transform .22s ease, box-shadow .22s ease, background .22s ease;
  }
  .cms-button:hover { transform: translateY(-1px); }
  .cms-button-primary {
    color: #10263f;
    background: linear-gradient(135deg, #f0d59d 0%, #d3b06a 100%);
    box-shadow: 0 18px 34px rgba(211,176,106,.22);
  }
  .cms-button-secondary {
    color: #143b66;
    background: rgba(20,59,102,.06);
    border-color: rgba(20,59,102,.08);
  }
  @media (max-width: 1080px) {
    .cms-editor {
      grid-template-columns: 1fr;
    }
  }
  @media (max-width: 760px) {
    .cms-grid {
      grid-template-columns: 1fr;
    }
    .cms-span-6,
    .cms-span-12 {
      grid-column: auto;
    }
    .cms-panel-head,
    .cms-panel-body,
    .cms-side-card {
      padding: 18px;
    }
  }
</style>

<div class="cms-editor">
  <div class="cms-stack">
    <section class="cms-panel">
      <div class="cms-panel-head">
        <h3>Page Structure</h3>
        <p>Define the core identity of this CMS page, including the route slug, template, and internal reference fields.</p>
      </div>
      <div class="cms-panel-body">
        <div class="cms-grid">
          <div class="cms-field cms-span-6">
            <label class="cms-label">Page Name</label>
            <input class="cms-input" name="name" value="{{ old('name', $page->name) }}" required />
            <p class="cms-help">This is the human-friendly title shown in the CMS workspace.</p>
          </div>
          <div class="cms-field cms-span-6">
            <label class="cms-label">Page Key</label>
            <input class="cms-input" name="key" value="{{ old('key', $page->key) }}" required />
            <p class="cms-help">A stable internal key like <code>home</code>, <code>about</code>, or <code>services</code>.</p>
          </div>
          <div class="cms-field cms-span-6">
            <label class="cms-label">Slug</label>
            <input class="cms-input" name="slug" value="{{ old('slug', $page->slug) }}" required />
            <p class="cms-help">The public-facing path this page lives on.</p>
          </div>
          <div class="cms-field cms-span-6">
            <label class="cms-label">Template</label>
            <input class="cms-input" name="template" value="{{ old('template', $page->template) }}" required />
            <p class="cms-help">The Blade template used to render this page on the frontend.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="cms-panel">
      <div class="cms-panel-head">
        <h3>SEO And Discovery</h3>
        <p>Control how the page is represented in the browser, search engines, and link previews.</p>
      </div>
      <div class="cms-panel-body">
        <div class="cms-grid">
          <div class="cms-field cms-span-12">
            <label class="cms-label">Browser Title</label>
            <input class="cms-input" name="title" value="{{ old('title', $page->title) }}" required />
          </div>
          <div class="cms-field cms-span-6">
            <label class="cms-label">Meta Title</label>
            <input class="cms-input" name="meta_title" value="{{ old('meta_title', $page->meta_title) }}" />
          </div>
          <div class="cms-field cms-span-6">
            <label class="cms-label">Hero Badge</label>
            <input class="cms-input" name="hero_badge" value="{{ old('hero_badge', $page->hero_badge) }}" />
          </div>
          <div class="cms-field cms-span-12">
            <label class="cms-label">Meta Description</label>
            <textarea class="cms-textarea" rows="3" name="meta_description">{{ old('meta_description', $page->meta_description) }}</textarea>
          </div>
        </div>
      </div>
    </section>

    <section class="cms-panel">
      <div class="cms-panel-head">
        <h3>Hero Experience</h3>
        <p>Shape the first impression of the page with hero messaging, media, and the supporting intro content.</p>
      </div>
      <div class="cms-panel-body">
        <div class="cms-grid">
          <div class="cms-field cms-span-12">
            <label class="cms-label">Hero Title</label>
            <textarea class="cms-textarea" rows="3" name="hero_title">{{ old('hero_title', $page->hero_title) }}</textarea>
          </div>
          <div class="cms-field cms-span-12">
            <label class="cms-label">Hero Description</label>
            <textarea class="cms-textarea" rows="4" name="hero_description">{{ old('hero_description', $page->hero_description) }}</textarea>
          </div>
          <div class="cms-field cms-span-6">
            <label class="cms-label">Hero Media Path</label>
            <input class="cms-input" name="hero_media_path" value="{{ old('hero_media_path', $page->hero_media_path) }}" />
          </div>
          <div class="cms-field cms-span-6">
            <label class="cms-label">Hero Media Type</label>
            <select class="cms-select" name="hero_media_type">
              <option value="image" @selected(old('hero_media_type', $page->hero_media_type) === 'image')>Image</option>
              <option value="video" @selected(old('hero_media_type', $page->hero_media_type) === 'video')>Video</option>
            </select>
          </div>
        </div>
      </div>
    </section>

    <section class="cms-panel">
      <div class="cms-panel-head">
        <h3>Calls To Action</h3>
        <p>Guide visitors with primary and secondary actions that fit the page’s purpose and conversion goal.</p>
      </div>
      <div class="cms-panel-body">
        <div class="cms-grid">
          <div class="cms-field cms-span-6">
            <label class="cms-label">Primary Button Text</label>
            <input class="cms-input" name="primary_button_text" value="{{ old('primary_button_text', $page->primary_button_text) }}" />
          </div>
          <div class="cms-field cms-span-6">
            <label class="cms-label">Primary Button Link</label>
            <input class="cms-input" name="primary_button_link" value="{{ old('primary_button_link', $page->primary_button_link) }}" />
          </div>
          <div class="cms-field cms-span-6">
            <label class="cms-label">Secondary Button Text</label>
            <input class="cms-input" name="secondary_button_text" value="{{ old('secondary_button_text', $page->secondary_button_text) }}" />
          </div>
          <div class="cms-field cms-span-6">
            <label class="cms-label">Secondary Button Link</label>
            <input class="cms-input" name="secondary_button_link" value="{{ old('secondary_button_link', $page->secondary_button_link) }}" />
          </div>
        </div>
      </div>
    </section>

    <section class="cms-panel">
      <div class="cms-panel-head">
        <h3>Structured Hero Data</h3>
        <p>Use the advanced JSON fields below for hero statistics and rotating slides when the page design requires richer structure.</p>
      </div>
      <div class="cms-panel-body">
        <div class="cms-grid">
          <div class="cms-field cms-span-12">
            <label class="cms-label">Hero Stats JSON</label>
            <textarea class="cms-textarea code" rows="6" name="content[hero_stats]">{{ old('content.hero_stats', json_encode(data_get($pageContent, 'hero_stats', []), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)) }}</textarea>
            <p class="cms-help">Ideal for homepage metrics, counters, and other compact supporting data.</p>
          </div>
          <div class="cms-field cms-span-12">
            <label class="cms-label">Hero Slides JSON</label>
            <textarea class="cms-textarea code" rows="8" name="content[hero_slides]">{{ old('content.hero_slides', json_encode(data_get($pageContent, 'hero_slides', []), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)) }}</textarea>
            <p class="cms-help">Use this when the hero rotates through multiple messages or campaign states.</p>
          </div>
        </div>
      </div>
    </section>
  </div>

  <aside class="cms-stack">
    <section class="cms-side-card">
      <h3>Publishing</h3>
      <p>Decide whether this page should be available on the public website or remain unpublished while you work.</p>
      <label class="cms-switch">
        <span class="cms-switch-copy">
          <strong>{{ old('is_published', $page->is_published) ? 'Published' : 'Draft Mode' }}</strong>
          <span>Toggle live visibility for this page.</span>
        </span>
        <input type="checkbox" name="is_published" value="1" @checked(old('is_published', $page->is_published)) />
      </label>
      <div class="cms-actions">
        <button class="cms-button cms-button-primary" type="submit">Save Page</button>
        <a class="cms-button cms-button-secondary" href="{{ route('admin.pages.index') }}">Back To Pages</a>
      </div>
    </section>

    <section class="cms-side-card">
      <h3>Page Snapshot</h3>
      <p>A quick summary of the page you are editing so orientation never gets lost while you work.</p>
      <div class="cms-kpis">
        <div class="cms-kpi">
          <span>Name</span>
          <strong>{{ old('name', $page->name ?: 'Untitled') }}</strong>
        </div>
        <div class="cms-kpi">
          <span>Key</span>
          <strong>{{ old('key', $page->key ?: 'not-set') }}</strong>
        </div>
        <div class="cms-kpi">
          <span>Slug</span>
          <strong>{{ old('slug', $page->slug ?: '/') }}</strong>
        </div>
        <div class="cms-kpi">
          <span>Template</span>
          <strong>{{ old('template', $page->template ?: 'not-set') }}</strong>
        </div>
      </div>
    </section>
  </aside>
</div>
