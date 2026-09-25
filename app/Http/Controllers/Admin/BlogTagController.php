<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogTag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogTagController extends Controller
{
    public function index()
    {
        $tags = BlogTag::withCount('posts')->paginate(20);
        return view('admin.blog.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.blog.tags.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        // Ensure unique slug
        $baseSlug = $validated['slug'];
        $counter = 1;
        while (BlogTag::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $baseSlug . '-' . $counter;
            $counter++;
        }

        BlogTag::create($validated);

        return redirect()->route('admin.blog.tags.index')->with('success', 'Tag created successfully!');
    }

    public function edit(BlogTag $tag)
    {
        return view('admin.blog.tags.edit', compact('tag'));
    }

    public function update(Request $request, BlogTag $tag)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        if ($tag->name !== $request->name) {
            $newSlug = Str::slug($request->name);
            $slug = $newSlug;
            $counter = 1;
            while (BlogTag::where('slug', $slug)->where('id', '!=', $tag->id)->exists()) {
                $slug = $newSlug . '-' . $counter;
                $counter++;
            }
            $validated['slug'] = $slug;
        }

        $tag->update($validated);

        return redirect()->route('admin.blog.tags.index')->with('success', 'Tag updated successfully!');
    }

    public function destroy(BlogTag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.blog.tags.index')->with('success', 'Tag deleted successfully!');
    }
}
