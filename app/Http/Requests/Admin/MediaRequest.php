<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MediaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'file' => ['required', 'file', 'max:5120', 'mimes:jpg,jpeg,png,gif,webp,svg,mp4,pdf'],
            'alt_text' => ['nullable', 'string', 'max:255'],
        ];
    }
}
