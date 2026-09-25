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

                <!-- Starting Price (USD) -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Starting Base Price (USD)</label>
                    <input type="number" name="starting_price" value="{{ old('starting_price', $trek->starting_price) }}" step="0.01" min="0" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none" placeholder="2499">
                    @error('starting_price')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
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

                <!-- Distance -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Distance</label>
                    <input type="text" name="distance" value="{{ old('distance', $trek->distance) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none" placeholder="e.g. 90 km">
                </div>

                <!-- Best Season -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Best Season</label>
                    <input type="text" name="best_season" value="{{ old('best_season', $trek->best_season) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none" placeholder="e.g. June to September">
                </div>

                <!-- Starting Point -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Starting Point</label>
                    <input type="text" name="starting_point" value="{{ old('starting_point', $trek->starting_point) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none" placeholder="e.g. Skardu / Askole">
                    @error('starting_point')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <!-- Ending Point -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Ending Point</label>
                    <input type="text" name="ending_point" value="{{ old('ending_point', $trek->ending_point) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none" placeholder="e.g. Hushe / Skardu">
                    @error('ending_point')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <!-- Accommodation Type -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Accommodation Type</label>
                    <input type="text" name="accommodation_type" value="{{ old('accommodation_type', $trek->accommodation_type) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none" placeholder="e.g. Alpine Tents & Mountain Lodges">
                    @error('accommodation_type')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <!-- Transport Type -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Transport Type</label>
                    <input type="text" name="transport_type" value="{{ old('transport_type', $trek->transport_type) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none" placeholder="e.g. 4x4 Mountain Jeeps & Domestic Flight">
                    @error('transport_type')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <!-- Included Items -->
                <div class="md:col-span-2" x-data="{ items: {{ json_encode(old('included', $trek->included ?: [''])) }} }">
                    <label class="block text-gray-700 font-medium mb-2">Included Items</label>
                    <template x-for="(item, index) in items" :key="index">
                        <div class="flex gap-2 mb-2">
                            <input type="text" :name="'included[]'" x-model="items[index]" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none" placeholder="e.g. Professional guide">
                            <button type="button" @click="items.splice(index, 1)" class="px-3 py-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200"><i class="fas fa-trash"></i></button>
                        </div>
                    </template>
                    <button type="button" @click="items.push('')" class="text-emerald-600 text-sm font-semibold mt-1">+ Add Included Item</button>
                </div>

                <!-- Excluded Items -->
                <div class="md:col-span-2" x-data="{ items: {{ json_encode(old('excluded', $trek->excluded ?: [''])) }} }">
                    <label class="block text-gray-700 font-medium mb-2">Excluded Items</label>
                    <template x-for="(item, index) in items" :key="index">
                        <div class="flex gap-2 mb-2">
                            <input type="text" :name="'excluded[]'" x-model="items[index]" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none" placeholder="e.g. International flights">
                            <button type="button" @click="items.splice(index, 1)" class="px-3 py-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200"><i class="fas fa-trash"></i></button>
                        </div>
                    </template>
                    <button type="button" @click="items.push('')" class="text-emerald-600 text-sm font-semibold mt-1">+ Add Excluded Item</button>
                </div>

                <!-- Packing List -->
                <div class="md:col-span-2" x-data="{ items: {{ json_encode(old('packing_list', $trek->packing_list ?: [''])) }} }">
                    <label class="block text-gray-700 font-medium mb-2">Packing List</label>
                    <template x-for="(item, index) in items" :key="index">
                        <div class="flex gap-2 mb-2">
                            <input type="text" :name="'packing_list[]'" x-model="items[index]" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none" placeholder="e.g. Trekking boots">
                            <button type="button" @click="items.splice(index, 1)" class="px-3 py-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200"><i class="fas fa-trash"></i></button>
                        </div>
                    </template>
                    <button type="button" @click="items.push('')" class="text-emerald-600 text-sm font-semibold mt-1">+ Add Packing Item</button>
                </div>

                <!-- Itinerary -->
                <div class="md:col-span-2" x-data="{ items: {{ json_encode(old('itinerary', $trek->itinerary ?: [['day' => 1, 'title' => '', 'description' => '']])) }} }">
                    <label class="block text-gray-700 font-medium mb-2">Itinerary</label>
                    <template x-for="(item, index) in items" :key="index">
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 mb-3 relative">
                            <button type="button" @click="items.splice(index, 1)" class="absolute top-4 right-4 text-red-500 hover:text-red-700"><i class="fas fa-times"></i></button>
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-3">
                                <div>
                                    <label class="block text-xs font-medium text-gray-500 uppercase">Day</label>
                                    <input type="number" :name="'itinerary['+index+'][day]'" x-model="item.day" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md outline-none">
                                </div>
                                <div class="md:col-span-3">
                                    <label class="block text-xs font-medium text-gray-500 uppercase">Title</label>
                                    <input type="text" :name="'itinerary['+index+'][title]'" x-model="item.title" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md outline-none" placeholder="e.g. Arrival in Skardu">
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-500 uppercase">Description</label>
                                <textarea :name="'itinerary['+index+'][description]'" x-model="item.description" rows="2" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md outline-none"></textarea>
                            </div>
                        </div>
                    </template>
                    <button type="button" @click="items.push({day: items.length + 1, title: '', description: ''})" class="text-emerald-600 text-sm font-semibold mt-1">+ Add Itinerary Day</button>
                </div>

                <!-- FAQs -->
                <div class="md:col-span-2" x-data="{ items: {{ json_encode(old('faqs', $trek->faqs ?: [['question' => '', 'answer' => '']])) }} }">
                    <label class="block text-gray-700 font-medium mb-2">FAQs</label>
                    <template x-for="(item, index) in items" :key="index">
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 mb-3 relative">
                            <button type="button" @click="items.splice(index, 1)" class="absolute top-4 right-4 text-red-500 hover:text-red-700"><i class="fas fa-times"></i></button>
                            <div class="mb-3">
                                <label class="block text-xs font-medium text-gray-500 uppercase">Question</label>
                                <input type="text" :name="'faqs['+index+'][question]'" x-model="item.question" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-500 uppercase">Answer</label>
                                <textarea :name="'faqs['+index+'][answer]'" x-model="item.answer" rows="2" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md outline-none"></textarea>
                            </div>
                        </div>
                    </template>
                    <button type="button" @click="items.push({question: '', answer: ''})" class="text-emerald-600 text-sm font-semibold mt-1">+ Add FAQ</button>
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
