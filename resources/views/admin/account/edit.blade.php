<x-admin.layouts.app :title="'Edit Profile'" :heading="'Edit Profile'" :subheading="'Update your account information and password.'">
  <div class="row g-4">
    <div class="col-lg-8">
      <div class="admin-card">
        <div class="card-body">
          <form method="POST" action="{{ route('admin.account.update') }}" class="row g-3">
            @csrf
            @method('PUT')
            <div class="col-md-6">
              <label class="form-label">Full Name</label>
              <input class="form-control form-control-lg" style="border-radius:16px;" name="name" value="{{ old('name', $user->name) }}" required />
            </div>
            <div class="col-md-6">
              <label class="form-label">Email Address</label>
              <input type="email" class="form-control form-control-lg" style="border-radius:16px;" name="email" value="{{ old('email', $user->email) }}" required />
            </div>
            <div class="col-md-6">
              <label class="form-label">New Password</label>
              <input type="password" class="form-control form-control-lg" style="border-radius:16px;" name="password" placeholder="Leave blank to keep current password" />
            </div>
            <div class="col-md-6">
              <label class="form-label">Confirm Password</label>
              <input type="password" class="form-control form-control-lg" style="border-radius:16px;" name="password_confirmation" />
            </div>
            <div class="col-12 d-flex gap-2 pt-2">
              <button class="btn btn-dark" style="border-radius:16px;padding:.9rem 1.25rem;background:#143b66;border-color:#143b66;" type="submit">Save Changes</button>
              <a href="{{ route('admin.account.show') }}" class="btn btn-outline-secondary" style="border-radius:16px;padding:.9rem 1.25rem;">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="admin-card h-100">
        <div class="card-body">
          <h3 style="font-family:'Cormorant Garamond',serif;font-size:1.65rem;margin-bottom:12px;">Profile Notes</h3>
          <p class="text-muted mb-0">Use a strong password and keep your admin email current so account recovery and notifications continue working smoothly.</p>
        </div>
      </div>
    </div>
  </div>
</x-admin.layouts.app>
