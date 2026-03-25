<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageRequest;
use App\Models\Page;
use App\Models\Section;
use App\Support\CmsDefaults;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PageController extends Controller
{
    public function index(): View
    {
        return view('admin.pages.index', [
            'pages' => Page::query()->orderBy('name')->paginate(12),
        ]);
    }

    public function create(): View
    {
        return view('admin.pages.create', [
            'page' => new Page([
                'hero_media_type' => 'image',
                'content' => [
                    'hero_stats' => [],
                    'hero_slides' => [],
                ],
                'is_published' => true,
            ]),
        ]);
    }

    public function store(PageRequest $request): RedirectResponse
    {
        Page::create($this->payload($request));

        return redirect()
            ->route('admin.pages.index')
            ->with('status', 'Page created successfully.');
    }

    public function manage(string $key): RedirectResponse
    {
        $defaults = CmsDefaults::pages()[$key] ?? null;

        abort_unless($defaults, 404);

        $page = Page::query()->firstOrCreate(
            ['key' => $key],
            $defaults
        );

        foreach (CmsDefaults::sections()[$key] ?? [] as $sectionKey => $sectionData) {
            Section::query()->firstOrCreate(
                [
                    'page_id' => $page->id,
                    'key' => $sectionKey,
                ],
                $sectionData + ['page_id' => $page->id]
            );
        }

        return redirect()->route('admin.pages.edit', $page);
    }

    public function edit(Page $page): View
    {
        return view('admin.pages.edit', [
            'page' => $page->load('sections'),
        ]);
    }

    public function update(PageRequest $request, Page $page): RedirectResponse
    {
        $page->update($this->payload($request));

        return redirect()
            ->route('admin.pages.index')
            ->with('status', 'Page updated successfully.');
    }

    public function destroy(Page $page): RedirectResponse
    {
        $page->delete();

        return redirect()
            ->route('admin.pages.index')
            ->with('status', 'Page deleted successfully.');
    }

    protected function payload(PageRequest $request): array
    {
        $validated = $request->validated();
        $content = $validated['content'] ?? [];

        foreach (['hero_stats', 'hero_slides'] as $field) {
            $content[$field] = $this->decodeJsonField(data_get($content, $field, []));
        }

        $validated['content'] = $content;
        $validated['is_published'] = $request->boolean('is_published');

        return $validated;
    }

    protected function decodeJsonField(mixed $value): array
    {
        if (is_array($value)) {
            return $value;
        }

        if (! is_string($value) || trim($value) === '') {
            return [];
        }

        return json_decode($value, true) ?: [];
    }
}
