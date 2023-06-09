<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShortUrl extends Model
{
    use HasFactory;

    protected $fillable = [
        'org_url',
        'short_url',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
