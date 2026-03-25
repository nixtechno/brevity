<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MediaRequest;
use App\Models\Media;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class MediaController extends Controller
{
    public function index(): View
    {
        return view('admin.media.index', [
            'mediaItems' => Media::query()->latest()->paginate(18),
        ]);
    }

    public function store(MediaRequest $request): RedirectResponse
    {
        $file = $request->file('file');
        $path = $file->store('media', 'public');

        Media::create([
            'user_id' => $request->user()->id,
            'name' => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),
            'disk' => 'public',
            'path' => $path,
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
            'alt_text' => $request->input('alt_text'),
        ]);

        return redirect()
            ->route('admin.media.index')
            ->with('status', 'Media uploaded successfully.');
    }

    public function destroy(Media $media): RedirectResponse
    {
        Storage::disk($media->disk)->delete($media->path);
        $media->delete();

        return redirect()
            ->route('admin.media.index')
            ->with('status', 'Media deleted successfully.');
    }
}
