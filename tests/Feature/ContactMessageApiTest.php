<?php

use App\Models\ContactMessage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use RyanChandler\LaravelCloudflareTurnstile\Facades\Turnstile;

uses(RefreshDatabase::class);

it('stores contact messages with a valid turnstile response', function () {
    Turnstile::fake();

    $this->postJson('/api/contact/messages', [
        'name' => 'Faruk Test',
        'email' => 'faruk@example.com',
        'subject' => 'İletişim Talebi',
        'message' => 'Bu mesaj test için yeterince uzun bir içeriktir.',
        'website' => '',
        'form_started_at' => time() - 5,
        'cf-turnstile-response' => Turnstile::dummy(),
    ])->assertNoContent();

    $this->assertDatabaseHas(ContactMessage::class, [
        'name' => 'Faruk Test',
        'email' => 'faruk@example.com',
        'subject' => 'İletişim Talebi',
        'is_read' => false,
    ]);
});

it('requires a turnstile response when storing contact messages', function () {
    Turnstile::fake();

    $this->postJson('/api/contact/messages', [
        'name' => 'Faruk Test',
        'email' => 'faruk@example.com',
        'subject' => 'İletişim Talebi',
        'message' => 'Bu mesaj test için yeterince uzun bir içeriktir.',
        'website' => '',
        'form_started_at' => time() - 5,
    ])->assertUnprocessable()
        ->assertJsonValidationErrors(['cf-turnstile-response']);

    expect(ContactMessage::query()->count())->toBe(0);
});
