<x-admin.layouts.app :title="'Settings'" :heading="'Site Settings'" :subheading="'Manage site identity, contact details, social links, and footer content.'">
  <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row g-4">
      <div class="col-lg-8">
        <div class="card admin-card">
          <div class="card-body row g-3">
            <div class="col-md-6">
              <label class="form-label">Site Name</label>
              <input class="form-control" name="site_name" value="{{ old('site_name', data_get($settings, 'site_name')) }}" required />
            </div>
            <div class="col-md-6">
              <label class="form-label">Email</label>
              <input class="form-control" name="email" value="{{ old('email', data_get($settings, 'email')) }}" />
            </div>
            <div class="col-md-6">
              <label class="form-label">Phone</label>
              <input class="form-control" name="phone" value="{{ old('phone', data_get($settings, 'phone')) }}" />
            </div>
            <div class="col-md-6">
              <label class="form-label">Address</label>
              <input class="form-control" name="address" value="{{ old('address', data_get($settings, 'address')) }}" />
            </div>
            <div class="col-12">
              <label class="form-label">Footer Text</label>
              <textarea class="form-control" rows="4" name="footer_text">{{ old('footer_text', data_get($settings, 'footer_text')) }}</textarea>
            </div>
            <div class="col-md-6">
              <label class="form-label">Facebook</label>
              <input class="form-control" name="social_links[facebook]" value="{{ old('social_links.facebook', data_get($settings, 'social_links.facebook')) }}" />
            </div>
            <div class="col-md-6">
              <label class="form-label">Instagram</label>
              <input class="form-control" name="social_links[instagram]" value="{{ old('social_links.instagram', data_get($settings, 'social_links.instagram')) }}" />
            </div>
            <div class="col-md-6">
              <label class="form-label">LinkedIn</label>
              <input class="form-control" name="social_links[linkedin]" value="{{ old('social_links.linkedin', data_get($settings, 'social_links.linkedin')) }}" />
            </div>
            <div class="col-md-6">
              <label class="form-label">Twitter/X</label>
              <input class="form-control" name="social_links[twitter]" value="{{ old('social_links.twitter', data_get($settings, 'social_links.twitter')) }}" />
            </div>
            <div class="col-md-6">
              <label class="form-label">Logo</label>
              <input type="file" class="form-control" name="logo" />
              @if (data_get($settings, 'logo_path'))
                <img src="{{ data_get($settings, 'logo_path') }}" alt="Logo" class="img-fluid mt-3" style="max-height: 80px;" />
              @endif
            </div>
            <div class="col-md-6">
              <label class="form-label">Favicon</label>
              <input type="file" class="form-control" name="favicon" />
              @if (data_get($settings, 'favicon_path'))
                <div class="small text-muted mt-2">Current: {{ data_get($settings, 'favicon_path') }}</div>
              @endif
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="card admin-card">
          <div class="card-body d-grid gap-3">
            <button class="btn btn-primary" type="submit">Save Settings</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</x-admin.layouts.app>
