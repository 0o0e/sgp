<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function index()
    {
        $characters = Character::all();
        return view('characters.index', compact('characters'));
    }

    public function create()
    {
        return view('characters.create');
    }

    public function createGuardian()
    {
        return view('characters.create-guardian');
    }

    public function createChild()
    {
        $guardians = Character::where('type', 'guardian')->get();
        return view('characters.create-child', compact('guardians'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:guardian,child',
            'nickname' => 'nullable|string|max:255',
            'age' => 'nullable|integer',
            'birthday' => 'nullable|string',
            'gender' => 'nullable|string|max:255',
            'height' => 'nullable|string|max:255',
            'weight' => 'nullable|string|max:255',
            'nationality' => 'nullable|string|max:255',
            
            // Real form (for guardians)
            'real_eye_color' => 'nullable|string|max:255',
            'real_hair_color' => 'nullable|string|max:255',
            'real_hair_length' => 'nullable|string|max:255',
            'real_distinguishing_features' => 'nullable|string',
            'real_abilities' => 'nullable|string',
            'real_form_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            
            // Human form (for guardians)
            'human_fake_name' => 'nullable|string|max:255',
            'human_fake_nickname' => 'nullable|string|max:255',
            'human_fake_age' => 'nullable|integer',
            'human_fake_birthday' => 'nullable|string',
            'human_fake_nationality' => 'nullable|string|max:255',
            'human_appearance' => 'nullable|string',
            'human_form_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            
            // Child information
            'paired_partner_id' => 'nullable|exists:characters,id',
            'school' => 'nullable|string|max:255',
            'family' => 'nullable|string',
            
            // Personality
            'likes' => 'nullable|string',
            'dislikes' => 'nullable|string',
            'personality' => 'nullable|string',
            
            // Backstory
            'backstory' => 'nullable|string',
            
            // Images
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'before_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'after_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle image uploads
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('characters', 'public');
        }
        
        if ($request->hasFile('real_form_image')) {
            $validated['real_form_image'] = $request->file('real_form_image')->store('characters/real_form', 'public');
        }
        
        if ($request->hasFile('human_form_image')) {
            $validated['human_form_image'] = $request->file('human_form_image')->store('characters/human_form', 'public');
        }
        
        if ($request->hasFile('before_image')) {
            $validated['before_image'] = $request->file('before_image')->store('characters/before', 'public');
        }
        
        if ($request->hasFile('after_image')) {
            $validated['after_image'] = $request->file('after_image')->store('characters/after', 'public');
        }

        Character::create($validated);

        return redirect()->route('characters.index')
            ->with('success', 'Character created successfully.');
    }

    public function show(Character $character)
    {
        return view('characters.show', compact('character'));
    }

    public function edit(Character $character)
    {
        return view('characters.edit', compact('character'));
    }

    public function update(Request $request, Character $character)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:guardian,child',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('characters', 'public');
            $validated['image'] = $imagePath;
        }

        $character->update($validated);

        return redirect()->route('characters.index')
            ->with('success', 'Character updated successfully.');
    }

    public function destroy(Character $character)
    {
        $character->delete();
        return redirect()->route('characters.index')
            ->with('success', 'Character deleted successfully.');
    }
} 