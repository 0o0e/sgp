<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use App\Models\GuardianImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuardianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guardians = Guardian::with('images')->get();
        return view('guardians.index', compact('guardians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guardians.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'nickname' => 'nullable|string|max:255',
                'guardian_type' => 'required|in:angel,devil',
                'age' => 'required|integer|min:0',
                'birthday' => 'required|date',
                'gender' => 'required|in:male,female,other',
                'height' => 'required|numeric|min:0',
                'weight' => 'required|numeric|min:0',
                'nationality' => 'nullable|string|max:255',
                'real_eye_color' => 'nullable|string|max:255',
                'real_hair_color' => 'nullable|string|max:255',
                'real_hair_length' => 'nullable|string|max:255',
                'real_distinguishing_features' => 'nullable|string',
                'abilities' => 'nullable|string',
                'backstory' => 'nullable|string',
                'likes' => 'nullable|string',
                'dislikes' => 'nullable|string',
                'personality' => 'nullable|string',
                'fake_name' => 'nullable|string|max:255',
                'fake_nickname' => 'nullable|string|max:255',
                'fake_age' => 'nullable|integer|min:0',
                'fake_birthday' => 'nullable|date',
                'fake_nationality' => 'nullable|string|max:255',
                'fake_eye_color' => 'nullable|string|max:255',
                'fake_hair_color' => 'nullable|string|max:255',
                'fake_hair_length' => 'nullable|string|max:255',
                'fake_height' => 'nullable|numeric|min:0',
                'fake_weight' => 'nullable|numeric|min:0',
                'fake_distinguishing_features' => 'nullable|string',
                'fake_abilities' => 'nullable|string',
                'fake_backstory' => 'nullable|string',
                'real_form_image' => 'nullable|image|max:2048',
                'human_form_image' => 'nullable|image|max:2048',
            ]);

            // Create the guardian
            $guardian = Guardian::create($validated);

            // Handle image uploads
            if ($request->hasFile('real_form_image')) {
                $realFormPath = $request->file('real_form_image')->store('guardians/real_form', 'public');
                GuardianImage::create([
                    'guardian_id' => $guardian->id,
                    'image_path' => $realFormPath,
                    'image_type' => 'real_form'
                ]);
            }

            if ($request->hasFile('human_form_image')) {
                $humanFormPath = $request->file('human_form_image')->store('guardians/human_form', 'public');
                GuardianImage::create([
                    'guardian_id' => $guardian->id,
                    'image_path' => $humanFormPath,
                    'image_type' => 'human_form'
                ]);
            }

            return redirect()->route('guardians.show', $guardian)
                ->with('success', 'Guardian created successfully.');
        } catch (\Exception $e) {
            \Log::error('Guardian creation error: ' . $e->getMessage());
            \Log::error($e->getTraceAsString());
            return redirect()->back()
                ->with('error', 'There was an error creating the guardian. Please try again.')
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Guardian $guardian)
    {
        return view('guardians.show', compact('guardian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guardian $guardian)
    {
        return view('guardians.edit', compact('guardian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guardian $guardian)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'nickname' => 'nullable|string|max:255',
                'guardian_type' => 'required|in:angel,devil',
                'age' => 'required|integer|min:0',
                'birthday' => 'required|date',
                'gender' => 'required|in:male,female,other',
                'height' => 'required|numeric|min:0',
                'weight' => 'required|numeric|min:0',
                'nationality' => 'nullable|string|max:255',
                'real_eye_color' => 'nullable|string|max:255',
                'real_hair_color' => 'nullable|string|max:255',
                'real_hair_length' => 'nullable|string|max:255',
                'real_distinguishing_features' => 'nullable|string',
                'abilities' => 'nullable|string',
                'backstory' => 'nullable|string',
                'likes' => 'nullable|string',
                'dislikes' => 'nullable|string',
                'personality' => 'nullable|string',
                'fake_name' => 'nullable|string|max:255',
                'fake_nickname' => 'nullable|string|max:255',
                'fake_age' => 'nullable|integer|min:0',
                'fake_birthday' => 'nullable|date',
                'fake_nationality' => 'nullable|string|max:255',
                'fake_eye_color' => 'nullable|string|max:255',
                'fake_hair_color' => 'nullable|string|max:255',
                'fake_hair_length' => 'nullable|string|max:255',
                'fake_height' => 'nullable|numeric|min:0',
                'fake_weight' => 'nullable|numeric|min:0',
                'fake_distinguishing_features' => 'nullable|string',
                'fake_abilities' => 'nullable|string',
                'fake_backstory' => 'nullable|string',
                'real_form_image' => 'nullable|image|max:2048',
                'human_form_image' => 'nullable|image|max:2048',
            ]);

            // Update the guardian
            $guardian->update($validated);

            // Handle image uploads
            if ($request->hasFile('real_form_image')) {
                // Delete old real form image if exists
                $oldRealFormImage = $guardian->images()->where('image_type', 'real_form')->first();
                if ($oldRealFormImage) {
                    Storage::disk('public')->delete($oldRealFormImage->image_path);
                    $oldRealFormImage->delete();
                }

                // Store new real form image
                $realFormPath = $request->file('real_form_image')->store('guardians/real_form', 'public');
                GuardianImage::create([
                    'guardian_id' => $guardian->id,
                    'image_path' => $realFormPath,
                    'image_type' => 'real_form'
                ]);
            }

            if ($request->hasFile('human_form_image')) {
                // Delete old human form image if exists
                $oldHumanFormImage = $guardian->images()->where('image_type', 'human_form')->first();
                if ($oldHumanFormImage) {
                    Storage::disk('public')->delete($oldHumanFormImage->image_path);
                    $oldHumanFormImage->delete();
                }

                // Store new human form image
                $humanFormPath = $request->file('human_form_image')->store('guardians/human_form', 'public');
                GuardianImage::create([
                    'guardian_id' => $guardian->id,
                    'image_path' => $humanFormPath,
                    'image_type' => 'human_form'
                ]);
            }

            return redirect()->route('guardians.show', $guardian)
                ->with('success', 'Guardian updated successfully.');
        } catch (\Exception $e) {
            \Log::error('Guardian update error: ' . $e->getMessage());
            \Log::error($e->getTraceAsString());
            return redirect()->back()
                ->with('error', 'There was an error updating the guardian. Please try again.')
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guardian $guardian)
    {
        try {
            // Delete all associated images from storage
            foreach ($guardian->images as $image) {
                Storage::disk('public')->delete($image->image_path);
            }

            // Delete the guardian (this will cascade delete the images records)
            $guardian->delete();

            return redirect()->route('guardians.index')
                ->with('success', 'Guardian deleted successfully.');
        } catch (\Exception $e) {
            \Log::error('Guardian deletion error: ' . $e->getMessage());
            \Log::error($e->getTraceAsString());
            return redirect()->back()
                ->with('error', 'There was an error deleting the guardian. Please try again.');
        }
    }
}
