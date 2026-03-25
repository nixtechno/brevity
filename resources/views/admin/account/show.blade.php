<x-admin.layouts.app :title="'Account'" :heading="'Account Overview'" :subheading="'Review your administrator identity and account details.'">
  <div class="row g-4">
    <div class="col-lg-5">
      <div class="admin-card h-100">
        <div class="card-body text-center">
          @php
            $initials = collect(explode(' ', $user->name))->filter()->map(fn ($part) => strtoupper(substr($part, 0, 1)))->take(2)->implode('');
          @endphp
          <div style="width:96px;height:96px;border-radius:50%;margin:0 auto 18px;display:grid;place-items:center;background:linear-gradient(135deg,#143b66,#1f568f);color:#fff;font-size:1.8rem;font-weight:700;box-shadow:0 18px 40px rgba(20,59,102,.22);">{{ $initials }}</div>
          <h2 style="font-family:'Cormorant Garamond',serif;font-size:2rem;margin-bottom:6px;">{{ $user->name }}</h2>
          <p class="text-muted mb-4">{{ $user->email }}</p>
          <a href="{{ route('admin.account.edit') }}" class="btn btn-dark" style="border-radius:16px;padding:.85rem 1.2rem;background:#143b66;border-color:#143b66;">Edit Profile</a>
        </div>
      </div>
    </div>
    <div class="col-lg-7">
      <div class="admin-card h-100">
        <div class="card-body">
          <h3 style="font-family:'Cormorant Garamond',serif;font-size:1.7rem;margin-bottom:18px;">Account Details</h3>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="p-3 rounded-4" style="background:rgba(20,59,102,.04);border:1px solid rgba(20,59,102,.08);">
                <div class="text-uppercase text-muted small mb-2">Full Name</div>
                <div class="fw-semibold">{{ $user->name }}</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="p-3 rounded-4" style="background:rgba(20,59,102,.04);border:1px solid rgba(20,59,102,.08);">
                <div class="text-uppercase text-muted small mb-2">Email Address</div>
                <div class="fw-semibold">{{ $user->email }}</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="p-3 rounded-4" style="background:rgba(211,176,106,.08);border:1px solid rgba(211,176,106,.16);">
                <div class="text-uppercase text-muted small mb-2">Access Level</div>
                <div class="fw-semibold">Administrator</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="p-3 rounded-4" style="background:rgba(20,59,102,.04);border:1px solid rgba(20,59,102,.08);">
                <div class="text-uppercase text-muted small mb-2">Account Created</div>
                <div class="fw-semibold">{{ $user->created_at?->format('d M Y') }}</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-admin.layouts.app>
