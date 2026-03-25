<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Models\Setting;
use App\Support\AssetPath;
use App\Support\CmsDefaults;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function edit(): View
    {
        $settings = array_replace_recursive(CmsDefaults::settings(), Setting::pairs());
        $settings['logo_path'] = AssetPath::resolve(
            data_get($settings, 'logo_path'),
            'BREVITY_logo.png'
        );
        $settings['favicon_path'] = AssetPath::resolve(
            data_get($settings, 'favicon_path'),
            'favicon.ico'
        );

        return view('admin.settings.edit', [
            'settings' => $settings,
        ]);
    }

    public function update(SettingRequest $request): RedirectResponse
    {
        $payload = $request->safe()->except(['logo', 'favicon']);

        if ($request->hasFile('logo')) {
            $payload['logo_path'] = '/storage/'.$request->file('logo')->store('settings', 'public');
        }

        if ($request->hasFile('favicon')) {
            $payload['favicon_path'] = '/storage/'.$request->file('favicon')->store('settings', 'public');
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
