<?php

namespace App\Support;

class AssetPath
{
    public static function resolve(?string $path, string $fallback): string
    {
        $path = trim((string) $path);

        if ($path === '') {
            return static::rootRelative($fallback);
        }

        if (preg_match('#^(data:|https?://|//)#i', $path) === 1) {
            $parsedPath = parse_url($path, PHP_URL_PATH);

            if (is_string($parsedPath) && $parsedPath !== '') {
                return static::resolve($parsedPath, $fallback);
            }

            return $path;
        }

        $normalizedPath = '/'.ltrim($path, '/');
        $publicPath = public_path(ltrim($normalizedPath, '/'));

        if (is_file($publicPath)) {
            return $normalizedPath;
        }

        if (str_starts_with($normalizedPath, '/storage/')) {
            $storageRelativePath = ltrim(substr($normalizedPath, strlen('/storage/')), '/');

            if ($storageRelativePath !== '' && is_file(storage_path('app/public/'.$storageRelativePath))) {
                return $normalizedPath;
            }
        }

        if (is_file(storage_path('app/public/'.ltrim($path, '/')))) {
            return '/storage/'.ltrim($path, '/');
        }

        return $normalizedPath;
    }

    protected static function rootRelative(string $path): string
    {
        return '/'.ltrim($path, '/');
    }
}
