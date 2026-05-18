<?php

use App\Models\Event;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Storage;

return new class extends Migration
{
    public function up(): void
    {
        Event::query()->each(function (Event $event): void {
            $payload = is_array($event->payload) ? $event->payload : [];
            $payload['images'] = $this->normalizeSliderImagePaths($payload['images'] ?? []);

            $event->payload = $payload;
            $event->save();
        });
    }

    public function down(): void
    {
        // Eski public asset path'lerine geri dönülmüyor.
    }

    private function normalizeSliderImagePaths(mixed $rawPaths): array
    {
        if (! is_array($rawPaths)) {
            return [];
        }

        return collect($rawPaths)
            ->map(fn (mixed $path): ?string => $this->normalizeSliderImagePath($path))
            ->filter(fn (?string $path): bool => is_string($path) && $path !== '')
            ->values()
            ->all();
    }

    private function normalizeSliderImagePath(mixed $rawPath): ?string
    {
        if (! is_string($rawPath) || trim($rawPath) === '') {
            return null;
        }

        $filename = basename(parse_url($rawPath, PHP_URL_PATH) ?? $rawPath);
        if ($filename === '' || $filename === '.' || $filename === '..') {
            return null;
        }

        $destinationPath = 'slider/'.$filename;

        if (Storage::disk('public')->exists($destinationPath)) {
            return $destinationPath;
        }

        $sourceCandidates = [
            public_path('assets/images/slider/'.$filename),
            public_path('assets/images/'.$filename),
            public_path($filename),
        ];

        foreach ($sourceCandidates as $sourcePath) {
            if (is_file($sourcePath)) {
                Storage::disk('public')->put($destinationPath, (string) file_get_contents($sourcePath));

                return $destinationPath;
            }
        }

        return str_contains($rawPath, '/') && ! str_starts_with($rawPath, '/')
            ? $rawPath
            : null;
    }
};
