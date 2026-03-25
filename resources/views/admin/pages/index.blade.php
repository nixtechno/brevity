<x-admin.layouts.app :title="'Pages'" :heading="'Pages'" :subheading="'Manage page-level SEO, hero content, buttons, and publication state.'">
  <div class="d-flex justify-content-end mb-4">
    <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">Create Page</a>
  </div>

  <div class="card admin-card">
    <div class="card-body table-responsive">
      <table class="table align-middle">
        <thead>
          <tr><th>Name</th><th>Key</th><th>Slug</th><th>Template</th><th>Status</th><th></th></tr>
        </thead>
        <tbody>
          @forelse ($pages as $page)
            <tr>
              <td>{{ $page->name }}</td>
              <td>{{ $page->key }}</td>
              <td>{{ $page->slug }}</td>
              <td>{{ $page->template }}</td>
              <td>{{ $page->is_published ? 'Published' : 'Draft' }}</td>
              <td class="text-end">
                <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                <form method="POST" action="{{ route('admin.pages.destroy', $page) }}" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-sm btn-outline-danger" type="submit" onclick="return confirm('Delete this page?')">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="6" class="text-muted">No pages found.</td></tr>
          @endforelse
        </tbody>
      </table>

      {{ $pages->links() }}
    </div>
  </div>
</x-admin.layouts.app>
