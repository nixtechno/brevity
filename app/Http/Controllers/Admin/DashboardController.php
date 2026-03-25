<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\Page;
use App\Models\Section;
use App\Models\Setting;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $pages = Page::count();
        $sections = Section::count();
        $media = Media::count();
        $settings = Setting::count();
        $recentPages = Page::query()
            ->orderByDesc('updated_at')
            ->take(6)
            ->get()
            ->reverse()
            ->values();

        return view('admin.dashboard', [
            'stats' => [
                [
                    'label' => 'Managed Pages',
                    'value' => $pages,
                    'hint' => 'Primary site pages under CMS control',
                ],
                [
                    'label' => 'Homepage Blocks',
                    'value' => $sections,
                    'hint' => 'Dynamic sections shaping the landing experience',
                ],
                [
                    'label' => 'Media Assets',
                    'value' => $media,
                    'hint' => 'Images, files, and supporting brand assets',
                ],
                [
                    'label' => 'Global Settings',
                    'value' => $settings,
                    'hint' => 'Contact, branding, and site-wide configuration',
                ],
            ],
            'health' => [
                'published_pages' => Page::where('is_published', true)->count(),
                'draft_pages' => Page::where('is_published', false)->count(),
                'active_sections' => Section::where('is_active', true)->count(),
            ],
            'latestPages' => Page::latest()->take(5)->get(),
            'latestMedia' => Media::latest()->take(5)->get(),
            'recentPageChart' => [
                'labels' => $recentPages->pluck('name')->all(),
                'values' => $recentPages->map(fn (Page $page) => $page->updated_at?->timestamp ?? now()->timestamp)->all(),
                'formatted' => $recentPages->map(fn (Page $page) => $page->updated_at?->format('d M Y, H:i') ?? 'Not updated')->all(),
            ],
        ]);
    }
}
