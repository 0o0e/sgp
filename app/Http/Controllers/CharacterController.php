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
        $rules = [
            'name' => 'required|string|max:255',
            'type' => 'required|in:guardian,child',
            'nickname' => 'required|string|max:255',
            'age' => 'required|integer',
            'birthday' => 'required|string',
            'gender' => 'required|string|max:255',
            'height' => 'required|string|max:255',
            'weight' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'backstory' => 'required|string',
            'personality' => 'required|string',
            'likes' => 'required|string',
            'dislikes' => 'required|string',
        ];

        // Add guardian-specific validation
        if ($request->type === 'guardian') {
            $rules = array_merge($rules, [
                'real_eye_color' => 'required|string|max:255',
                'real_hair_color' => 'required|string|max:255',
                'real_hair_length' => 'required|string|max:255',
                'real_distinguishing_features' => 'required|string',
                'real_abilities' => 'required|string',
                'human_fake_name' => 'required|string|max:255',
                'human_fake_nickname' => 'required|string|max:255',
                'human_fake_age' => 'required|integer',
                'human_fake_birthday' => 'required|string',
                'human_fake_nationality' => 'required|string|max:255',
                'human_appearance' => 'required|string',
            ]);
        }

        // Add child-specific validation
        if ($request->type === 'child') {
            $rules = array_merge($rules, [
                'paired_partner_id' => 'required|exists:characters,id',
                'school' => 'required|string|max:255',
                'family' => 'required|string',
            ]);
        }

        // Add image validation
        $rules = array_merge($rules, [
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
            'real_form_image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
            'human_form_image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
            'before_image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
            'after_image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048'
        ]);

        $validated = $request->validate($rules);

        // Handle image uploads
        if ($request->hasFile('image')) {
            try {
                $path = $request->file('image')->store('characters', 'public');
                $validated['image'] = $path;
                \Log::info('Image uploaded successfully: ' . $path);
            } catch (\Exception $e) {
                \Log::error('Failed to upload image: ' . $e->getMessage());
            }
        }
        
        if ($request->hasFile('real_form_image')) {
            try {
                $path = $request->file('real_form_image')->store('characters/real_form', 'public');
                $validated['real_form_image'] = $path;
                \Log::info('Real form image uploaded successfully: ' . $path);
            } catch (\Exception $e) {
                \Log::error('Failed to upload real form image: ' . $e->getMessage());
            }
        }
        
        if ($request->hasFile('human_form_image')) {
            try {
                $path = $request->file('human_form_image')->store('characters/human_form', 'public');
                $validated['human_form_image'] = $path;
                \Log::info('Human form image uploaded successfully: ' . $path);
            } catch (\Exception $e) {
                \Log::error('Failed to upload human form image: ' . $e->getMessage());
            }
        }
        
        if ($request->hasFile('before_image')) {
            try {
                $path = $request->file('before_image')->store('characters/before', 'public');
                $validated['before_image'] = $path;
                \Log::info('Before image uploaded successfully: ' . $path);
            } catch (\Exception $e) {
                \Log::error('Failed to upload before image: ' . $e->getMessage());
            }
        }
        
        if ($request->hasFile('after_image')) {
            try {
                $path = $request->file('after_image')->store('characters/after', 'public');
                $validated['after_image'] = $path;
                \Log::info('After image uploaded successfully: ' . $path);
            } catch (\Exception $e) {
                \Log::error('Failed to upload after image: ' . $e->getMessage());
            }
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
        if ($character->type === 'child') {
            $guardians = Character::where('type', 'guardian')->get();
            return view('characters.edit', compact('character', 'guardians'));
        }
        return view('characters.edit', compact('character'));
    }

    public function update(Request $request, Character $character)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'type' => 'required|in:guardian,child',
            'nickname' => 'required|string|max:255',
            'age' => 'required|integer',
            'birthday' => 'required|string',
            'gender' => 'required|string|max:255',
            'height' => 'required|string|max:255',
            'weight' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'backstory' => 'required|string',
            'personality' => 'required|string',
            'likes' => 'required|string',
            'dislikes' => 'required|string',
        ];

        // Add guardian-specific validation
        if ($request->type === 'guardian') {
            $rules = array_merge($rules, [
                'real_eye_color' => 'required|string|max:255',
                'real_hair_color' => 'required|string|max:255',
                'real_hair_length' => 'required|string|max:255',
                'real_distinguishing_features' => 'required|string',
                'real_abilities' => 'required|string',
                'human_fake_name' => 'required|string|max:255',
                'human_fake_nickname' => 'required|string|max:255',
                'human_fake_age' => 'required|integer',
                'human_fake_birthday' => 'required|string',
                'human_fake_nationality' => 'required|string|max:255',
                'human_appearance' => 'required|string',
            ]);
        }

        // Add child-specific validation
        if ($request->type === 'child') {
            $rules = array_merge($rules, [
                'paired_partner_id' => 'required|exists:characters,id',
                'school' => 'required|string|max:255',
                'family' => 'required|string',
            ]);
        }

        // Add image validation
        $rules = array_merge($rules, [
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
            'real_form_image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
            'human_form_image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
            'before_image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
            'after_image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048'
        ]);

        $validated = $request->validate($rules);

        // Handle image uploads
        if ($request->hasFile('image')) {
            try {
                $path = $request->file('image')->store('characters', 'public');
                $validated['image'] = $path;
                \Log::info('Image uploaded successfully: ' . $path);
            } catch (\Exception $e) {
                \Log::error('Failed to upload image: ' . $e->getMessage());
            }
        }
        
        if ($request->hasFile('real_form_image')) {
            try {
                $path = $request->file('real_form_image')->store('characters/real_form', 'public');
                $validated['real_form_image'] = $path;
                \Log::info('Real form image uploaded successfully: ' . $path);
            } catch (\Exception $e) {
                \Log::error('Failed to upload real form image: ' . $e->getMessage());
            }
        }
        
        if ($request->hasFile('human_form_image')) {
            try {
                $path = $request->file('human_form_image')->store('characters/human_form', 'public');
                $validated['human_form_image'] = $path;
                \Log::info('Human form image uploaded successfully: ' . $path);
            } catch (\Exception $e) {
                \Log::error('Failed to upload human form image: ' . $e->getMessage());
            }
        }
        
        if ($request->hasFile('before_image')) {
            try {
                $path = $request->file('before_image')->store('characters/before', 'public');
                $validated['before_image'] = $path;
                \Log::info('Before image uploaded successfully: ' . $path);
            } catch (\Exception $e) {
                \Log::error('Failed to upload before image: ' . $e->getMessage());
            }
        }
        
        if ($request->hasFile('after_image')) {
            try {
                $path = $request->file('after_image')->store('characters/after', 'public');
                $validated['after_image'] = $path;
                \Log::info('After image uploaded successfully: ' . $path);
            } catch (\Exception $e) {
                \Log::error('Failed to upload after image: ' . $e->getMessage());
            }
        }

        $character->update($validated);

        return redirect()->route('characters.show', $character)
            ->with('success', 'Character updated successfully.');
    }

    public function destroy(Character $character)
    {
        $character->delete();
        return redirect()->route('characters.index')
            ->with('success', 'Character deleted successfully.');
    }
} 