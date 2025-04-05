<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\ChildImage;
use App\Models\Guardian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChildController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $children = Child::with(['guardian', 'beforeImage', 'afterImage'])->get();
        return view('children.index', compact('children'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $guardians = Guardian::all();
        return view('children.create', compact('guardians'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nickname' => 'nullable|string|max:255',
            'age' => 'required|integer|min:0',
            'birthday' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'height' => 'required|numeric|min:0',
            'weight' => 'required|numeric|min:0',
            'nationality' => 'nullable|string|max:255',
            'eye_color' => 'nullable|string|max:255',
            'hair_color' => 'nullable|string|max:255',
            'hair_length' => 'nullable|string|max:255',
            'distinguishing_features' => 'nullable|string',
            'guardian_id' => 'required|exists:guardians,id',
            'appearance_before' => 'nullable|string',
            'appearance_after' => 'nullable|string',
            'before_image' => 'nullable|image|max:2048',
            'after_image' => 'nullable|image|max:2048',
            'family' => 'nullable|string',
            'school' => 'nullable|string',
            'abilities' => 'nullable|string',
            'backstory' => 'nullable|string',
            'likes' => 'nullable|string',
            'dislikes' => 'nullable|string',
            'personality' => 'nullable|string',
        ]);

        try {
            $child = Child::create($validated);

            if ($request->hasFile('before_image')) {
                $path = $request->file('before_image')->store('children/before', 'public');
                ChildImage::create([
                    'child_id' => $child->id,
                    'image_path' => $path,
                    'image_type' => 'before'
                ]);
            }

            if ($request->hasFile('after_image')) {
                $path = $request->file('after_image')->store('children/after', 'public');
                ChildImage::create([
                    'child_id' => $child->id,
                    'image_path' => $path,
                    'image_type' => 'after'
                ]);
            }

            return redirect()->route('children.show', $child)
                ->with('success', 'Child created successfully.');
        } catch (\Exception $e) {
            return back()->withInput()
                ->withErrors(['error' => 'Failed to create child. Please try again.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Child $child)
    {
        $child->load(['guardian', 'beforeImage', 'afterImage']);
        return view('children.show', compact('child'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Child $child)
    {
        $guardians = Guardian::all();
        return view('children.edit', compact('child', 'guardians'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Child $child)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nickname' => 'nullable|string|max:255',
            'age' => 'required|integer|min:0',
            'birthday' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'height' => 'required|numeric|min:0',
            'weight' => 'required|numeric|min:0',
            'nationality' => 'nullable|string|max:255',
            'eye_color' => 'nullable|string|max:255',
            'hair_color' => 'nullable|string|max:255',
            'hair_length' => 'nullable|string|max:255',
            'distinguishing_features' => 'nullable|string',
            'guardian_id' => 'required|exists:guardians,id',
            'appearance_before' => 'nullable|string',
            'appearance_after' => 'nullable|string',
            'before_image' => 'nullable|image|max:2048',
            'after_image' => 'nullable|image|max:2048',
            'family' => 'nullable|string',
            'school' => 'nullable|string',
            'abilities' => 'nullable|string',
            'backstory' => 'nullable|string',
            'likes' => 'nullable|string',
            'dislikes' => 'nullable|string',
            'personality' => 'nullable|string',
        ]);

        try {
            $child->update($validated);

            if ($request->hasFile('before_image')) {
                // Delete old image if exists
                if ($child->beforeImage) {
                    Storage::disk('public')->delete($child->beforeImage->image_path);
                    $child->beforeImage->delete();
                }

                $path = $request->file('before_image')->store('children/before', 'public');
                ChildImage::create([
                    'child_id' => $child->id,
                    'image_path' => $path,
                    'image_type' => 'before'
                ]);
            }

            if ($request->hasFile('after_image')) {
                // Delete old image if exists
                if ($child->afterImage) {
                    Storage::disk('public')->delete($child->afterImage->image_path);
                    $child->afterImage->delete();
                }

                $path = $request->file('after_image')->store('children/after', 'public');
                ChildImage::create([
                    'child_id' => $child->id,
                    'image_path' => $path,
                    'image_type' => 'after'
                ]);
            }

            return redirect()->route('children.show', $child)
                ->with('success', 'Child updated successfully.');
        } catch (\Exception $e) {
            return back()->withInput()
                ->withErrors(['error' => 'Failed to update child. Please try again.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Child $child)
    {
        try {
            // Delete associated images from storage
            if ($child->beforeImage) {
                Storage::disk('public')->delete($child->beforeImage->image_path);
            }
            if ($child->afterImage) {
                Storage::disk('public')->delete($child->afterImage->image_path);
            }

            // Delete the child (this will cascade delete the images records)
            $child->delete();

            return redirect()->route('children.index')
                ->with('success', 'Child deleted successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to delete child. Please try again.']);
        }
    }
}
