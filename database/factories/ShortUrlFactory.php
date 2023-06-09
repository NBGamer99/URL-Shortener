<?php
namespace Database\Factories;

use App\Models\ShortUrl;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShortUrlFactory extends Factory
{
    protected $model = ShortUrl::class;

    public function definition()
    {
        return [
            'user_id' => null,
            'org_url' => $this->faker->url,
            'short_url' => $this->faker->unique()->slug(6),
            'is_enabled' => true,
            'clicks' => 0,
        ];
    }

    function ofUser($user)
    {
        return $this->state(fn (array $attributes) => [
            'user_id' => $user->id,
        ]);
    }
}
