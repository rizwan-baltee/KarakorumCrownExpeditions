<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TrendingTrek;
use App\Models\Gallery;
use App\Models\Price;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TrekController extends Controller
{
    public function index()
    {
        $treks = TrendingTrek::with(['type', 'galleries', 'prices'])
            ->orderBy('priority', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        
        return view('admin.treks.index', compact('treks'));
    }

    public function create()
    {
        $types = Type::where('is_active', true)->orderBy('order')->get();
        return view('admin.treks.create', compact('types'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type_id' => 'required|exists:types,id',
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'duration_days' => 'required|integer|min:1',
            'description' => 'nullable|string',
            'overview' => 'nullable|string',
            'difficulty_level' => 'required|integer|min:1|max:5',
            'height_meters' => 'nullable|numeric',
            'min_age' => 'required|integer|min:1',
            'max_guests' => 'required|integer|min:1',
            'languages_support' => 'nullable|string',
            'is_trending' => 'boolean',
            'is_active' => 'boolean',
            'priority' => 'nullable|integer',
        ]);

        $validated['is_trending'] = $request->has('is_trending');
        $validated['is_active'] = $request->has('is_active');

        // Generate unique slug from title
        $baseSlug = Str::slug($validated['title']);
        $slug = $baseSlug;
        $counter = 1;
        while (TrendingTrek::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }
        $validated['slug'] = $slug;

        $trek = TrendingTrek::create($validated);

        return redirect()->route('admin.treks.show', $trek)
            ->with('success', 'Trek created successfully!');
    }

    public function show(TrendingTrek $trek)
    {
        $trek->load(['type', 'galleries', 'prices', 'bookTours']);
        return view('admin.treks.show', compact('trek'));
    }

    public function edit(TrendingTrek $trek)
    {
        $types = Type::where('is_active', true)->orderBy('order')->get();
        return view('admin.treks.edit', compact('trek', 'types'));
    }

    public function update(Request $request, TrendingTrek $trek)
    {
        $validated = $request->validate([
            'type_id' => 'required|exists:types,id',
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'duration_days' => 'required|integer|min:1',
            'description' => 'nullable|string',
            'overview' => 'nullable|string',
            'difficulty_level' => 'required|integer|min:1|max:5',
            'height_meters' => 'nullable|numeric',
            'min_age' => 'required|integer|min:1',
            'max_guests' => 'required|integer|min:1',
            'languages_support' => 'nullable|string',
            'is_trending' => 'boolean',
            'is_active' => 'boolean',
            'priority' => 'nullable|integer',
        ]);

        $validated['is_trending'] = $request->has('is_trending');
        $validated['is_active'] = $request->has('is_active');

        // Only regenerate slug if title changed
        if ($trek->title !== $request->title) {
            $newSlug = Str::slug($request->title);
            // Find unique slug
            $slug = $newSlug;
            $counter = 1;
            while (TrendingTrek::where('slug', $slug)->where('id', '!=', $trek->id)->exists()) {
                $slug = $newSlug . '-' . $counter;
                $counter++;
            }
            $validated['slug'] = $slug;
        } else {
            unset($validated['slug']);
        }

        $trek->update($validated);

        return redirect()->route('admin.treks.show', $trek)
            ->with('success', 'Trek updated successfully!');
    }

    public function destroy(TrendingTrek $trek)
    {
        $trek->delete();
        
        return redirect()->route('admin.treks.index')
            ->with('success', 'Trek deleted successfully!');
    }

    // Upload images
    public function uploadImage(Request $request, TrendingTrek $trek)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
            'title' => 'nullable|string|max:255',
            'is_featured' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('treks', 'public');
            
            $gallery = $trek->galleries()->create([
                'image_path' => $path,
                'title' => $request->title,
                'is_featured' => $request->has('is_featured'),
                'sort_order' => $trek->galleries()->count(),
            ]);

            return redirect()->back()->with('success', 'Image uploaded successfully!');
        }

        return redirect()->back()->with('error', 'Failed to upload image.');
    }

    // Update image
    public function updateImage(Request $request, TrendingTrek $trek, Gallery $gallery)
    {
        if ($gallery->trending_trek_id !== $trek->id) {
            abort(403);
        }

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'title' => 'nullable|string|max:255',
            'is_featured' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $data = [
            'title' => $request->title,
            'is_featured' => $request->has('is_featured'),
        ];

        if ($request->filled('sort_order')) {
            $data['sort_order'] = $request->sort_order;
        }

        // If new image is uploaded, replace the old one
        if ($request->hasFile('image')) {
            // Delete old image
            if ($gallery->image_path && \Storage::disk('public')->exists($gallery->image_path)) {
                \Storage::disk('public')->delete($gallery->image_path);
            }
            
            // Store new image
            $data['image_path'] = $request->file('image')->store('treks', 'public');
        }

        $gallery->update($data);

        return redirect()->back()->with('success', 'Image updated successfully!');
    }

    // Delete image
    public function deleteImage(TrendingTrek $trek, Gallery $gallery)
    {
        if ($gallery->trending_trek_id !== $trek->id) {
            abort(403);
        }

        // Delete file from storage
        if ($gallery->image_path && \Storage::disk('public')->exists($gallery->image_path)) {
            \Storage::disk('public')->delete($gallery->image_path);
        }

        $gallery->delete();

        return redirect()->back()->with('success', 'Image deleted successfully!');
    }

    // Add price
    public function addPrice(Request $request, TrendingTrek $trek)
    {
        $validated = $request->validate([
            'group_type' => 'required|string',
            'min_persons' => 'required|integer|min:1',
            'max_persons' => 'required|integer|min:1',
            'price_usd' => 'required|numeric|min:0',
            'currency' => 'required|string|max:3',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'availability' => 'required|in:Available,Not Available,Limited',
            'notes' => 'nullable|string',
        ]);

        $trek->prices()->create($validated);

        return redirect()->back()->with('success', 'Price added successfully!');
    }

    // Update price
    public function updatePrice(Request $request, TrendingTrek $trek, Price $price)
    {
        if ($price->trending_trek_id !== $trek->id) {
            abort(403);
        }

        $validated = $request->validate([
            'group_type' => 'required|string',
            'min_persons' => 'required|integer|min:1',
            'max_persons' => 'required|integer|min:1',
            'price_usd' => 'required|numeric|min:0',
            'currency' => 'required|string|max:3',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'availability' => 'required|in:Available,Not Available,Limited',
            'notes' => 'nullable|string',
        ]);

        $price->update($validated);

        return redirect()->back()->with('success', 'Price updated successfully!');
    }

    // Delete price
    public function deletePrice(TrendingTrek $trek, Price $price)
    {
        if ($price->trending_trek_id !== $trek->id) {
            abort(403);
        }

        $price->delete();

        return redirect()->back()->with('success', 'Price deleted successfully!');
    }
}
