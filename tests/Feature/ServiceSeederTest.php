<?php

use App\Models\Service;
use App\Models\ServiceCategory;
use Database\Seeders\ServiceSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('service seeder can run twice without duplicate slug errors', function (): void {
    $this->seed(ServiceSeeder::class);
    $this->seed(ServiceSeeder::class);

    expect(ServiceCategory::count())->toBeGreaterThan(0)
        ->and(Service::count())->toBeGreaterThan(0)
        ->and(ServiceCategory::query()->pluck('slug')->unique()->count())->toBe(ServiceCategory::count())
        ->and(Service::query()->pluck('slug')->unique()->count())->toBe(Service::count());
});
