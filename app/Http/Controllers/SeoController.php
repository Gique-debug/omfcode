<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Service;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

class SeoController extends Controller
{
    public function robots(): Response
    {
        $content = implode("\n", [
            'User-agent: *',
            'Disallow: /admin',
            '',
            'Sitemap: '.url('/sitemap.xml'),
            '',
        ]);

        return response($content, 200, ['Content-Type' => 'text/plain; charset=UTF-8']);
    }

    public function sitemap(): Response
    {
        $staticRoutes = [
            'home',
            'about',
            'contact',
            'faq',
            'rendez-vous',
            'services',
            'realisations',
            'blog',
            'temoignages',
            'devis',
            'mentions-legales',
            'politique-confidentialite',
            'conditions-utilisation',
        ];

        $urls = collect($staticRoutes)
            ->filter(fn (string $name): bool => Route::has($name))
            ->map(fn (string $name): array => ['loc' => route($name), 'lastmod' => now()->toDateString()])
            ->values();

        $posts = Post::query()->orderByDesc('updated_at')->get(['slug', 'updated_at']);
        foreach ($posts as $post) {
            $urls->push([
                'loc' => route('blog.show', $post->slug),
                'lastmod' => $post->updated_at?->toDateString() ?? now()->toDateString(),
            ]);
        }

        $services = Service::query()->where('is_active', true)->orderByDesc('updated_at')->get(['slug', 'updated_at']);
        foreach ($services as $service) {
            $urls->push([
                'loc' => route('services.show', $service->slug),
                'lastmod' => $service->updated_at?->toDateString() ?? now()->toDateString(),
            ]);
        }

        return response()->view('sitemap', ['urls' => $urls], 200, [
            'Content-Type' => 'application/xml; charset=UTF-8',
        ]);
    }
}
