@extends('admin.layouts.app')

@section('title', 'Edit Trek')

@section('content')
<div class="p-6">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Edit Trek</h1>
            <p class="text-gray-600 mt-1">Update trekking package details</p>
        </div>

        <!-- Form -->
        <form action="{{ route('admin.treks.update', $trek) }}" method="POST" class="bg-white rounded-xl shadow-md p-8">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Title -->
                <div class="md:col-span-2">
                    <label class="block text-gray-700 font-medium mb-2">Trek Title *</label>
                    <input type="text" name="title" value="{{ old('title', $trek->title) }}" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none" placeholder="K2 Base Camp Trek">
                    @error('title')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <!-- Location -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Location *</label>
                    <input type="text" name="location" value="{{ old('location', $trek->location) }}" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none" placeholder="Gilgit-Baltistan">
                    @error('location')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <!-- Duration -->
                <!-- Duration -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Duration (Days) *</label>
                    <input type="number" name="duration_days" value="{{ old('duration_days', $trek->duration_days) }}" required min="1" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none" placeholder="21">
                    @error('duration_days')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <!-- Type -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Type *</label>
                    <select name="type_id" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">
                        <option value="">Select Type</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}" {{ old('type_id', $trek->type_id) == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('type_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <!-- Difficulty Level -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Difficulty Level *</label>
                    <select name="difficulty_level" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">
                        <option value="1">Level 1 - Easy</option>
                        <option value="2">Level 2 - Moderate</option>
                        <option value="3">Level 3 - Challenging</option>
                        <option value="4">Level 4 - Difficult</option>
                        <option value="5">Level 5 - Extreme</option>
                    </select>
                    @error('difficulty_level')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <!-- Height -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Height (meters)</label>
                    <input type="number" name="height_meters" value="{{ old('height_meters', $trek->height_meters) }}" step="0.01" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none" placeholder="5100">
                    @error('height_meters')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <!-- Min Age -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Minimum Age *</label>
                    <input type="number" name="min_age" value="{{ old('min_age', $trek->min_age) }}" required min="1" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">
                    @error('min_age')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <!-- Max Guests -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Maximum Guests *</label>
                    <input type="number" name="max_guests" value="{{ old('max_guests', $trek->max_guests) }}" required min="1" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none">
                    @error('max_guests')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <!-- Languages Support -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Languages Support</label>
                    <input type="text" name="languages_support" value="{{ old('languages_support', $trek->languages_support) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none" placeholder="All, English, Urdu">
                    @error('languages_support')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <!-- Priority -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Priority (for sorting)</label>
                    <input type="number" name="priority" value="{{ old('priority', $trek->priority) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none" placeholder="0">
                    @error('priority')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label class="block text-gray-700 font-medium mb-2">Short Description</label>
                    <textarea name="description" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none" placeholder="Brief description...">{{ old('description', $trek->description) }}</textarea>
                    @error('description')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <!-- Overview -->
                <div class="md:col-span-2">
                    <label class="block text-gray-700 font-medium mb-2">Detailed Overview</label>
                    <textarea name="overview" rows="6" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none" placeholder="Detailed information about the trek...">{{ old('overview', $trek->overview) }}</textarea>
                    @error('overview')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <!-- Checkboxes -->
                <div class="md:col-span-2 flex gap-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_trending" value="1" {{ old('is_trending', $trek->is_trending) ? 'checked' : '' }} class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                        <span class="ml-2 text-gray-700">Mark as Trending</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $trek->is_active) ? 'checked' : '' }} class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                        <span class="ml-2 text-gray-700">Active</span>
                    </label>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-4 mt-8">
                <a href="{{ route('admin.treks.index') }}" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 text-white rounded-lg hover:from-emerald-700 hover:to-teal-700 transition shadow-lg">
                    <i class="fas fa-save mr-2"></i>Update Trek
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
