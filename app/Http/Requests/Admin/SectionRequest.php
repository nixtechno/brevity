<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SectionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $section = $this->route('section');

        return [
            'page_id' => ['required', 'exists:pages,id'],
            'name' => ['required', 'string', 'max:255'],
            'key' => [
                'required',
                'string',
                'max:255',
                Rule::unique('sections', 'key')
                    ->where(fn ($query) => $query->where('page_id', $this->input('page_id')))
                    ->ignore($section),
            ],
            'title' => ['nullable', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:1000'],
            'body' => ['nullable', 'string'],
            'image_path' => ['nullable', 'string', 'max:1000'],
            'button_text' => ['nullable', 'string', 'max:255'],
            'button_link' => ['nullable', 'string', 'max:1000'],
            'content_json' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }
}
