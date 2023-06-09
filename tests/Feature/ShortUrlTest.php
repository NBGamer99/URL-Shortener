<?php

namespace Tests\Feature;

use App\Models\ShortUrl;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\ShortUrlController;
use App\Http\Requests\ShortRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Mockery;
use Redirect;
use Tests\TestCase;

class ShortUrlTest extends TestCase
{
    use RefreshDatabase;

    public function setUP(): void
    {
        parent::setUp();
       $this->user = User::factory()->create();
       $this->shorturl = ShortUrl::factory()->ofUser($this->user)->create();
    }

    /** @test */
    use RefreshDatabase;

    public function testShortUrlWithAuthenticatedUser()
    {
        // Mock authenticated user
        $this->actingAs($this->user);

        // Mock the ShortRequest
        $request = Mockery::mock(ShortRequest::class);
        $request->shouldReceive('orginal_url')->andReturn('https://example.com');

        // Mock the create method
        $newUrl = ShortUrl::Factory()->make();
        $this->user->shouldReceive('links')->andReturn($this->user);
        $this->user->shouldReceive('create')->andReturn($newUrl);

    }
}
