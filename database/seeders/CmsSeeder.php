<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\Section;
use App\Models\Setting;
use App\Support\CmsDefaults;
use Illuminate\Database\Seeder;

class CmsSeeder extends Seeder
{
    public function run(): void
    {
        foreach (CmsDefaults::settings() as $key => $value) {
            Setting::query()->updateOrCreate(
                ['key' => $key],
                ['value' => is_array($value) ? $value : ['value' => $value]]
            );
        }

        foreach (CmsDefaults::pages() as $pageKey => $pageData) {
            $page = Page::query()->updateOrCreate(
                ['key' => $pageKey],
                $pageData
            );

            foreach (CmsDefaults::sections()[$pageKey] ?? [] as $sectionKey => $sectionData) {
                Section::query()->updateOrCreate(
                    [
                        'page_id' => $page->id,
                        'key' => $sectionKey,
                    ],
                    $sectionData + ['page_id' => $page->id]
                );
            }
        }
    }
}
