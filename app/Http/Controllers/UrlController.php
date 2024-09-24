<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Url;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $urls = Auth::user()->urls()->get();

        return view('urls.index', compact('urls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('urls.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'original_url' => 'required|url',
        ]);

        $shortUrl = Str::random(6); // Generate short URL

        $url = Url::create([
            'user_id' => Auth::id(),
            'original_url' => $request->original_url,
            'short_url' => $shortUrl,
        ]);

        return redirect()->route('urls.show', $url);
    }

    /**
     * Display the specified resource.
     */
    public function show(Url $url)
    {
        return view('urls.show', compact('url'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('urls.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // return redirect()->route('urls.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Redirect to the original URL.
    */
    public function redirect(string $shortUrl)
    {
        $url = Url::where('short_url', $shortUrl)->firstOrFail();
        $url->increment('click_count'); // Track click count

        return redirect()->away($url->original_url);
    }
}
