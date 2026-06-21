<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Board;
use App\Models\Page;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $urls = collect([
            ['url' => url('/'), 'lastmod' => now()->toAtomString()],
        ]);

        $pageSlugs = Page::query()->active()->pluck('slug')
            ->merge(
                collect(Page::staticPages())
                    ->filter(fn (array $page): bool => $page['isActive'] && $page['slug'] !== '/')
                    ->pluck('slug')
            )
            ->filter(fn (?string $slug): bool => filled($slug) && $slug !== '/')
            ->unique();

        foreach ($pageSlugs as $slug) {
            $urls->push(['url' => url('/'.$slug), 'lastmod' => now()->toAtomString()]);
        }

        Announcement::query()->active()->get(['slug', 'updated_at'])->each(function (Announcement $announcement) use ($urls): void {
            $urls->push([
                'url' => url('/duyurular/'.$announcement->slug),
                'lastmod' => $announcement->updated_at?->toAtomString() ?? now()->toAtomString(),
            ]);
        });

        Board::query()->active()->get(['slug', 'updated_at'])->each(function (Board $board) use ($urls): void {
            $urls->push([
                'url' => url('/kurullar/'.$board->slug),
                'lastmod' => $board->updated_at?->toAtomString() ?? now()->toAtomString(),
            ]);
        });

        $xml = view('sitemap', ['urls' => $urls->unique('url')->values()])->render();

        return response($xml, 200)->header('Content-Type', 'text/xml');
    }
}
