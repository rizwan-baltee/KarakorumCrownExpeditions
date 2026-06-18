@extends('admin.layouts.app')

@section('title', 'Edit Type')

@section('content')
<div class="p-6">
    <div class="max-w-2xl mx-auto">
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Edit Type</h1>
            <p class="text-gray-600 mt-1">Update category details</p>
        </div>

        <form action="{{ route('admin.types.update', $type) }}" method="POST" class="bg-white rounded-xl shadow-md p-8">
            @csrf
            @method('PUT')
            <div class="space-y-6">
                <!-- Name -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Type Name *</label>
                    <input type="text" name="name" value="{{ old('name', $type->name) }}" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">
                    @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <!-- Icon -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Icon Class</label>
                    <input type="text" name="icon" value="{{ old('icon', $type->icon) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none" placeholder="e.g. fas fa-hiking">
                    @error('icon')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    <p class="text-gray-500 text-xs mt-1">FontAwesome icon class.</p>
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Description</label>
                    <textarea name="description" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">{{ old('description', $type->description) }}</textarea>
                    @error('description')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <!-- Order & Active -->
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Sort Order</label>
                        <input type="number" name="order" value="{{ old('order', $type->order) }}" min="0" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">
                        @error('order')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div class="flex items-end pb-1">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $type->is_active) ? 'checked' : '' }} class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                            <span class="ml-2 text-gray-700">Active</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-4 mt-8">
                <a href="{{ route('admin.types.index') }}" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 text-white rounded-lg hover:from-emerald-700 hover:to-teal-700 transition shadow-lg">
                    <i class="fas fa-save mr-2"></i>Update Type
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
