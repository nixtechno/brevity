<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $page = $this->route('page');

        return [
            'name' => ['required', 'string', 'max:255'],
            'key' => ['required', 'string', 'max:255', Rule::unique('pages', 'key')->ignore($page)],
            'slug' => ['required', 'string', 'max:255', Rule::unique('pages', 'slug')->ignore($page)],
            'template' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:1000'],
            'hero_badge' => ['nullable', 'string', 'max:255'],
            'hero_title' => ['nullable', 'string'],
            'hero_description' => ['nullable', 'string'],
            'hero_media_path' => ['nullable', 'string', 'max:1000'],
            'hero_media_type' => ['nullable', Rule::in(['image', 'video'])],
            'primary_button_text' => ['nullable', 'string', 'max:255'],
            'primary_button_link' => ['nullable', 'string', 'max:1000'],
            'secondary_button_text' => ['nullable', 'string', 'max:255'],
            'secondary_button_link' => ['nullable', 'string', 'max:1000'],
            'content' => ['nullable', 'array'],
            'content.hero_stats' => ['nullable'],
            'content.hero_slides' => ['nullable'],
            'is_published' => ['nullable', 'boolean'],
        ];
    }
}
