<x-admin.layouts.app :title="'Create Page'" :heading="'Create Page'" :subheading="'Add a new page record without changing the frontend design.'">
  <form method="POST" action="{{ route('admin.pages.store') }}">
    @csrf
    @include('admin.pages._form')
  </form>
</x-admin.layouts.app>
