<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortUrl;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $link = ShortUrl::where('user_id', $userId)
        ->orderBy('clicks', 'desc')
        ->first();

        $mostClicked = $link ? strval($link->clicks) : "0";

        $shortUrl = $link ? $link->short_url : "Nothing";

        $totalShortenedLinks = strval(ShortUrl::where('user_id', $userId)
        ->count());
        return Inertia::render('Dashboard', [
            'mostClicked' => $mostClicked,
            'shortUrl' => $shortUrl,
            'totalShortenedLinks' => $totalShortenedLinks,
        ]);
    }
}


