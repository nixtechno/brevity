<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
    ];

    protected function casts(): array
    {
        return [
            'value' => 'array',
        ];
    }

    public static function pairs(): array
    {
        return static::query()
            ->pluck('value', 'key')
            ->map(fn ($value) => is_array($value) && array_key_exists('value', $value) ? $value['value'] : $value)
            ->all();
    }
}
