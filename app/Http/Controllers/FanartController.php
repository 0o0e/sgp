<?php

namespace App\Http\Controllers;

use App\Models\Fanart;
use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FanartController extends Controller
{
    public function index()
    {
        $fanart = Fanart::with('character')->latest()->get();
        return view('fanart.index', compact('fanart'));
    }

    public function create()
    {
        $characters = Character::where('type', 'guardian')->get();
        return view('fanart.create', compact('characters'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'character_id' => 'required|exists:characters,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'artist_name' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
        ]);

        $imagePath = $request->file('image')->store('fanart', 'public');

        $fanart = Fanart::create([
            'character_id' => $validated['character_id'],
            'title' => $validated['title'],
            'description' => $validated['description'],
            'artist_name' => $validated['artist_name'],
            'image_path' => $imagePath,
        ]);

        return redirect()->route('fanart.index')
            ->with('success', 'Fanart submitted successfully.');
    }

    public function show(Fanart $fanart)
    {
        $fanart->load('character');
        return view('fanart.show', compact('fanart'));
    }

    public function destroy(Fanart $fanart)
    {
        Storage::disk('public')->delete($fanart->image_path);
        $fanart->delete();

        return redirect()->route('fanart.index')
            ->with('success', 'Fanart deleted successfully.');
    }
} 