<?php

use App\Models\Post;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('robots.txt is served with a sitemap reference', function (): void {
    $response = $this->get('/robots.txt');

    $response->assertSuccessful();
    $response->assertHeader('Content-Type', 'text/plain; charset=UTF-8');
    $response->assertSee('User-agent: *', false);
    $response->assertSee('/sitemap.xml', false);
});

test('sitemap.xml lists public pages, posts and services', function (): void {
    $post = Post::create([
        'title' => 'Article SEO',
        'slug' => 'article-seo',
        'content' => 'Contenu de test pour le SEO.',
        'category' => 'SEO',
    ]);

    $category = ServiceCategory::create(['name' => 'Dev', 'slug' => 'dev', 'icon' => '</>']);
    Service::create([
        'service_category_id' => $category->id,
        'title' => 'Service SEO',
        'slug' => 'service-seo',
        'short_description' => 'Description courte.',
        'is_active' => true,
    ]);

    $response = $this->get('/sitemap.xml');

    $response->assertSuccessful();
    $response->assertHeader('Content-Type', 'application/xml; charset=UTF-8');
    $response->assertSee(route('home'), false);
    $response->assertSee(route('blog.show', $post->slug), false);
    $response->assertSee(route('services.show', 'service-seo'), false);
});

test('home page exposes core SEO tags', function (): void {
    $response = $this->get('/');

    $response->assertSuccessful();
    $response->assertSee('<link rel="canonical"', false);
    $response->assertSee('<meta property="og:title"', false);
    $response->assertSee('<meta name="twitter:card"', false);
    $response->assertSee('rel="icon"', false);
});

test('blog article page uses the post title in SEO tags', function (): void {
    $post = Post::create([
        'title' => 'Mon Super Article',
        'slug' => 'mon-super-article',
        'content' => 'Contenu de test pour le SEO.',
        'category' => 'SEO',
    ]);

    $response = $this->get(route('blog.show', $post->slug));

    $response->assertSuccessful();
    $response->assertSee('<title>Mon Super Article', false);
    $response->assertSee('<meta property="og:type" content="article"', false);
});
