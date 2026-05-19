<?php

namespace App\Helpers;

class ImageHelper
{
    /**
     * Clean the path before saving to DB
     * It ensures 'public/' or full URLs are stripped so it only saves relative like 'uploads/...'
     */
    public static function cleanPath($path)
    {
        if (empty($path)) {
            return null;
        }

        // Remove full app URL if exists
        $appUrl = url('/');
        if (str_starts_with($path, $appUrl)) {
            $path = str_replace($appUrl . '/', '', $path);
        }

        // Remove 'public/' prefix if exists
        if (str_starts_with($path, 'public/')) {
            $path = preg_replace('/^public\//', '', $path);
        }

        return $path;
    }

    /**
     * Get the proper URL for an image.
     * Handles existing absolute URLs, paths with 'public/', and clean paths.
     */
    public static function getImageUrl($path, $fallback = 'frontend/img/default-placeholder.jpg')
    {
        if (empty($path)) {
            return asset($fallback);
        }

        // If it's already an absolute URL (e.g. Google avatar)
        if (filter_var($path, FILTER_VALIDATE_URL)) {
            return $path;
        }

        // If it contains 'public/', we should adjust it or just let asset() handle if symlinked
        // But the best is to strip 'public/' for asset() to work correctly in most Laravel setups
        if (str_starts_with($path, 'public/')) {
            $path = preg_replace('/^public\//', '', $path);
        }

        return asset($path);
    }
}
