<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\ShortUrl;
use Illuminate\Support\Facades\Auth;

class ShortUserController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        return Inertia::render('Links/Index', [
            'links' => ShortUrl::where('user_id', $userId)
                ->with('user:id,name')
                ->latest()
                ->get(),
        ]);
    }
}