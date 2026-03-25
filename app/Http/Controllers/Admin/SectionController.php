<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SectionRequest;
use App\Models\Page;
use App\Models\Section;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SectionController extends Controller
{
    public function index(): View
    {
        return view('admin.sections.index', [
            'sections' => Section::query()->with('page')->orderBy('page_id')->orderBy('sort_order')->paginate(20),
        ]);
    }

    public function create(Request $request): View
    {
        return view('admin.sections.create', [
            'section' => new Section([
                'page_id' => $request->integer('page_id') ?: null,
                'content' => [],
                'sort_order' => 0,
                'is_active' => true,
            ]),
            'pages' => Page::query()->orderBy('name')->get(),
        ]);
    }

    public function store(SectionRequest $request): RedirectResponse
    {
        Section::create($this->payload($request));

        return redirect()
            ->route('admin.sections.index')
            ->with('status', 'Section created successfully.');
    }

    public function edit(Section $section): View
    {
        return view('admin.sections.edit', [
            'section' => $section,
            'pages' => Page::query()->orderBy('name')->get(),
        ]);
    }

    public function update(SectionRequest $request, Section $section): RedirectResponse
    {
        $section->update($this->payload($request));

        return redirect()
            ->route('admin.sections.index')
            ->with('status', 'Section updated successfully.');
    }

    public function destroy(Section $section): RedirectResponse
    {
        $section->delete();

        return redirect()
            ->route('admin.sections.index')
            ->with('status', 'Section deleted successfully.');
    }

    protected function payload(SectionRequest $request): array
    {
        $validated = $request->validated();
        $validated['content'] = $this->decodeJsonField($validated['content_json'] ?? null);
        unset($validated['content_json']);
        $validated['is_active'] = $request->boolean('is_active');

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
