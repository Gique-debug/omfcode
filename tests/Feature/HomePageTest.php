<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('home page renders successfully', function (): void {
    $response = $this->get('/');

    $response->assertStatus(200);
});
