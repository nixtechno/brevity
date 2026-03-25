<x-admin.layouts.app :title="'Create Section'" :heading="'Create Section'" :subheading="'Add a new dynamic content block to a page.'">
  <form method="POST" action="{{ route('admin.sections.store') }}">
    @csrf
    @include('admin.sections._form')
  </form>
</x-admin.layouts.app>
