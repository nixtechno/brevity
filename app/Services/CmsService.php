<?php

namespace App\Services;

use App\Models\Page;
use App\Models\Section;
use App\Models\Setting;
use App\Support\CmsDefaults;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class CmsService
{
    public function settings(): array
    {
        $settings = array_replace_recursive(CmsDefaults::settings(), Setting::pairs());

        $settings['logo_path'] = $this->resolveBrandAsset(
            data_get($settings, 'logo_path'),
            'BREVITY_logo.png'
        );

        $settings['favicon_path'] = $this->resolveBrandAsset(
            data_get($settings, 'favicon_path'),
            'favicon.ico'
        );

        return $settings;
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

    protected function resolveBrandAsset(mixed $path, string $defaultAsset): string
    {
        $fallback = asset($defaultAsset);

        if (! is_string($path) || trim($path) === '') {
            return $fallback;
        }

        $path = trim($path);

        if (filter_var($path, FILTER_VALIDATE_URL)) {
            return $path;
        }

        $normalizedPath = ltrim((string) (parse_url($path, PHP_URL_PATH) ?: $path), '/');

        if ($normalizedPath === '') {
            return $fallback;
        }

        if (str_starts_with($normalizedPath, 'storage/')) {
            $storagePath = substr($normalizedPath, strlen('storage/'));

            if ($storagePath !== '' && Storage::disk('public')->exists($storagePath)) {
                return Storage::disk('public')->url($storagePath);
            }

            return $fallback;
        }

        if (file_exists(public_path($normalizedPath))) {
            return asset($normalizedPath);
        }

        if (Storage::disk('public')->exists($normalizedPath)) {
            return Storage::disk('public')->url($normalizedPath);
        }

        return $fallback;
    }
}
