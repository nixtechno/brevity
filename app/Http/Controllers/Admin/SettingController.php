<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Models\Setting;
use App\Support\CmsDefaults;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function edit(): View
    {
        return view('admin.settings.edit', [
            'settings' => array_replace_recursive(CmsDefaults::settings(), Setting::pairs()),
        ]);
    }

    public function update(SettingRequest $request): RedirectResponse
    {
        $payload = $request->safe()->except(['logo', 'favicon']);

        if ($request->hasFile('logo')) {
            $payload['logo_path'] = Storage::disk('public')->url(
                $request->file('logo')->store('settings', 'public')
            );
        }

        if ($request->hasFile('favicon')) {
            $payload['favicon_path'] = Storage::disk('public')->url(
                $request->file('favicon')->store('settings', 'public')
            );
        }

        foreach ($payload as $key => $value) {
            Setting::query()->updateOrCreate(
                ['key' => $key],
                ['value' => is_array($value) ? $value : ['value' => $value]]
            );
        }

        return redirect()
            ->route('admin.settings.edit')
            ->with('status', 'Settings updated successfully.');
    }
}
