<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShortRequest;
use App\Models\ShortUrl;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ShortUrlController extends Controller
{
	public function index()
	{
		return redirect('/');
	}
	public function short(ShortRequest $request)
	{
		if ($request->orginal_url) {
			if (Auth::user()) {
				$new_url = Auth::user()
					->links()
					->create([
						'org_url' => $request->orginal_url,
					]);
			} else {
				$new_url = ShortUrl::create([
					'org_url' => $request->orginal_url,
				]);
			}
			if ($new_url) {
				$short_url = Str::random(6);
				$new_url->update([
					'short_url' => $short_url,
				]);
				$shortUrl = url('shorten/' . $short_url);
				return Inertia::render('Welcome', [
					'url' => $shortUrl,
					'canLogin' => Route::has('login'),
					'canRegister' => Route::has('register'),
				]);
			}
			return Redirect::to('/');
		}
	}

	public function redirect($short_url)
	{
		$short_url = ShortUrl::where('short_url', $short_url)->first();
		if ($short_url->is_enabled) {
			$short_url->increment('clicks');
			return Redirect::to(url($short_url->org_url));
		}
		// TODO add error page
		return Redirect::to('/');
	}

	public function update($id)
	{
		$short_url = ShortUrl::find($id);
		$short_url->is_enabled = !$short_url->is_enabled;
		$short_url->save();
		return Redirect::to('/links');
	}

	public function destroy($id): RedirectResponse
	{
		$shortUrl = ShortUrl::find($id);
		$shortUrl->delete();
		return redirect(route('links.index'));
	}
}