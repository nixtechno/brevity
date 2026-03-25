<x-admin.layouts.app :title="'Media'" :heading="'Media Library'" :subheading="'Upload and manage images, videos, and files for the CMS.'">
  <div class="card admin-card mb-4">
    <div class="card-body">
      <form method="POST" action="{{ route('admin.media.store') }}" enctype="multipart/form-data" class="row g-3 align-items-end">
        @csrf
        <div class="col-md-5">
          <label class="form-label">File</label>
          <input type="file" class="form-control" name="file" required />
        </div>
        <div class="col-md-5">
          <label class="form-label">Alt Text</label>
          <input class="form-control" name="alt_text" />
        </div>
        <div class="col-md-2 d-grid">
          <button class="btn btn-primary" type="submit">Upload</button>
        </div>
      </form>
    </div>
  </div>

  <div class="row g-4">
    @forelse ($mediaItems as $item)
      <div class="col-md-6 col-xl-4">
        <div class="card admin-card h-100">
          <div class="card-body">
            @if (str_starts_with((string) $item->mime_type, 'image/'))
              <img src="{{ $item->url }}" alt="{{ $item->alt_text }}" class="img-fluid rounded mb-3" />
            @endif
            <h2 class="h6">{{ $item->name }}</h2>
            <div class="small text-muted mb-2">{{ $item->mime_type }}</div>
            <div class="small text-muted mb-3">{{ $item->url }}</div>
            <form method="POST" action="{{ route('admin.media.destroy', $item) }}">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-outline-danger" type="submit" onclick="return confirm('Delete this file?')">Delete</button>
            </form>
          </div>
        </div>
      </div>
    @empty
      <div class="col-12">
        <div class="alert alert-info mb-0">No media uploaded yet.</div>
      </div>
    @endforelse
  </div>

  <div class="mt-4">{{ $mediaItems->links() }}</div>
</x-admin.layouts.app>
