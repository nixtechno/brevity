<?php

namespace App\Services;

use App\Models\Page;
use App\Models\Section;
use App\Models\Setting;
use App\Support\CmsDefaults;
use Illuminate\Support\Arr;

class CmsService
{
    public function settings(): array
    {
        return array_replace_recursive(CmsDefaults::settings(), Setting::pairs());
    }

    public function page(string $key): array
    {
        $default = CmsDefaults::pages()[$key] ?? [];

        $page = Page::query()
            ->where('key', $key)
            ->when($key === 'home', fn ($query) => $query->orWhere('slug', '/'))
            ->first();

        if (! $page) {
            return $default;
        }

        return array_replace_recursive($default, Arr::except($page->toArray(), ['sections']));
    }

    public function pageSections(string $pageKey): array
    {
        $defaults = CmsDefaults::sections()[$pageKey] ?? [];

        $page = Page::query()->where('key', $pageKey)->first();

        if (! $page) {
            return $defaults;
        }

        $sections = $page->sections()
            ->where('is_active', true)
            ->get()
            ->keyBy('key')
            ->map(function (Section $section) use ($defaults) {
                $default = $defaults[$section->key] ?? [];

                return array_replace_recursive($default, $section->toArray());
            })
            ->all();

        foreach ($defaults as $key => $defaultSection) {
            $sections[$key] ??= $defaultSection;
        }

        return $sections;
    }

    public function siteData(string $pageKey): array
    {
        return [
            'settings' => $this->settings(),
            'page' => $this->page($pageKey),
            'sections' => $this->pageSections($pageKey),
        ];
    }
}
