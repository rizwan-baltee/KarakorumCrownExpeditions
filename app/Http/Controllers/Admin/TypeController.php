<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::withCount('trendingTreks')
            ->orderBy('order')
            ->orderBy('name')
            ->paginate(20);

        return view('admin.types.index', compact('types'));
    }

    public function create()
    {
        return view('admin.types.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->has('is_active');

        Type::create($validated);

        return redirect()->route('admin.types.index')
            ->with('success', 'Type created successfully!');
    }

    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    public function update(Request $request, Type $type)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        if ($type->name !== $request->name) {
            $validated['slug'] = Str::slug($request->name);
        } else {
            unset($validated['slug']);
        }
        $validated['is_active'] = $request->has('is_active');

        $type->update($validated);

        return redirect()->route('admin.types.index')
            ->with('success', 'Type updated successfully!');
    }

    public function destroy(Type $type)
    {
        $type->delete();

        return redirect()->route('admin.types.index')
            ->with('success', 'Type deleted successfully!');
    }
}
