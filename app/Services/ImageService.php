<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageService
{
    /**
     * Save a single image and return its normalized relative path.
     */
    public function saveImage(UploadedFile $image, string $folder): string
    {
        $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs($folder, $filename, 'public');
        return $this->normalizePath($path);
    }

    /**
     * Save multiple images and return array of paths.
     */
    public function saveImages(array $images, string $folder): array
    {
        $paths = [];
        foreach ($images as $image) {
            if ($image instanceof UploadedFile) {
                $paths[] = $this->saveImage($image, $folder);
            }
        }
        return $paths;
    }

    /**
     * Replace an old image with a new one.
     */
    public function replaceImage(?string $oldImagePath, UploadedFile $newImage, string $folder): string
    {
        // 1. Save new image first
        $newPath = $this->saveImage($newImage, $folder);

        // 2. Delete old image if new save was successful
        if ($newPath && $oldImagePath) {
            $this->deleteImage($oldImagePath);
        }

        return $newPath;
    }

    /**
     * Delete an image securely using Storage.
     */
    public function deleteImage(?string $imagePath): bool
    {
        if (empty($imagePath)) {
            return false;
        }

        $cleanPath = $this->normalizePath($imagePath);

        if (Storage::disk('public')->exists($cleanPath)) {
            return Storage::disk('public')->delete($cleanPath);
        }

        return false;
    }

    /**
     * Check if an image exists in storage.
     */
    public function exists(?string $imagePath): bool
    {
        if (empty($imagePath)) {
            return false;
        }

        return Storage::disk('public')->exists($this->normalizePath($imagePath));
    }

    /**
     * Get the full URL for an image path, with an optional fallback.
     */
    public function url(?string $imagePath, ?string $fallback = null): string
    {
        if (empty($imagePath)) {
            return $fallback ? asset($fallback) : '';
        }

        $cleanPath = $this->normalizePath($imagePath);
        return Storage::disk('public')->url($cleanPath);
    }

    /**
     * Normalize paths to remove leading slashes, "public/", or "storage/" prefixes.
     * Ensures we only deal with relative paths like "services/uuid.jpg".
     */
    public function normalizePath(string $imagePath): string
    {
        $path = $imagePath;

        // Remove leading slash
        $path = ltrim($path, '/');

        // Remove /public/storage or public/storage
        if (Str::startsWith($path, 'public/storage/')) {
            $path = Str::replaceFirst('public/storage/', '', $path);
        }

        // Remove storage/ prefix
        if (Str::startsWith($path, 'storage/')) {
            $path = Str::replaceFirst('storage/', '', $path);
        }

        // Remove public/ prefix
        if (Str::startsWith($path, 'public/')) {
            $path = Str::replaceFirst('public/', '', $path);
        }

        return $path;
    }
}
