<?php

namespace App\Models\Concerns;

use App\Services\ImageService;

trait HasStoredImages
{
    /**
     * Get the URL for a stored image attribute.
     *
     * @param string $attribute The database column name storing the image path.
     * @param string|null $fallback The fallback URL if no image is set.
     * @return string
     */
    public function imageUrl(string $attribute = 'main_image', ?string $fallback = null): string
    {
        return app(ImageService::class)->url($this->{$attribute}, $fallback);
    }

    /**
     * Check if a stored image exists for the given attribute.
     * Note: This hits the filesystem and should be used sparingly in loops.
     *
     * @param string $attribute The database column name storing the image path.
     * @return bool
     */
    public function hasStoredImage(string $attribute = 'main_image'): bool
    {
        return app(ImageService::class)->exists($this->{$attribute});
    }
}
