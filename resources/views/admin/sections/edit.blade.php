<x-admin.layouts.app :title="'Edit Section'" :heading="'Edit Section'" :subheading="'Update structured CMS content without touching frontend styling.'">
  <form method="POST" action="{{ route('admin.sections.update', $section) }}">
    @csrf
    @method('PUT')
    @include('admin.sections._form')
  </form>
</x-admin.layouts.app>
