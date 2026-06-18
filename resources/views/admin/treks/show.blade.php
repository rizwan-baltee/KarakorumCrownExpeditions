@extends('admin.layouts.app')

@section('title', $trek->title)

@section('content')
<div class="p-6">
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">{{ $trek->title }}</h1>
                <p class="text-gray-600 mt-1">{{ $trek->location }} • {{ $trek->duration_days }} days</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('admin.treks.edit', $trek) }}" class="px-6 py-3 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition">
                    <i class="fas fa-edit mr-2"></i>Edit Trek
                </a>
                <a href="{{ route('admin.treks.index') }}" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                    <i class="fas fa-arrow-left mr-2"></i>Back to List
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded">
                <p class="text-green-700">{{ session('success') }}</p>
            </div>
        @endif

        <!-- Trek Details -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Info -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Basic Info Card -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Trek Information</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-500">Type</p>
                            <p class="font-semibold text-gray-800">{{ $trek->type->name }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Difficulty</p>
                            <p class="font-semibold text-gray-800">Level {{ $trek->difficulty_level }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Height</p>
                            <p class="font-semibold text-gray-800">{{ $trek->height_meters ? number_format($trek->height_meters) . 'm' : 'N/A' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Max Guests</p>
                            <p class="font-semibold text-gray-800">{{ $trek->max_guests }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Min Age</p>
                            <p class="font-semibold text-gray-800">{{ $trek->min_age }} years</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Languages</p>
                            <p class="font-semibold text-gray-800">{{ $trek->languages_support }}</p>
                        </div>
                    </div>
                    
                    @if($trek->description)
                    <div class="mt-4">
                        <p class="text-sm text-gray-500 mb-1">Description</p>
                        <p class="text-gray-700">{{ $trek->description }}</p>
                    </div>
                    @endif
                    
                    @if($trek->overview)
                    <div class="mt-4">
                        <p class="text-sm text-gray-500 mb-1">Overview</p>
                        <p class="text-gray-700 whitespace-pre-line">{{ $trek->overview }}</p>
                    </div>
                    @endif
                </div>

                <!-- Gallery Section -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-bold text-gray-800">Gallery</h2>
                        <button onclick="document.getElementById('uploadForm').classList.toggle('hidden')" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 text-sm">
                            <i class="fas fa-plus mr-2"></i>Add Image
                        </button>
                    </div>

                    <!-- Upload Form -->
                    <form id="uploadForm" action="{{ route('admin.treks.upload-image', $trek) }}" method="POST" enctype="multipart/form-data" class="hidden mb-6 p-4 bg-gray-50 rounded-lg">
                        @csrf
                        <div class="space-y-3">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Select Image</label>
                                <input type="file" name="image" accept="image/*" required class="w-full">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Title (Optional)</label>
                                <input type="text" name="title" class="w-full px-3 py-2 border border-gray-300 rounded">
                            </div>
                            <label class="flex items-center">
                                <input type="checkbox" name="is_featured" value="1" class="mr-2">
                                <span class="text-sm">Set as Featured Image</span>
                            </label>
                            <button type="submit" class="px-4 py-2 bg-emerald-600 text-white rounded hover:bg-emerald-700">
                                Upload
                            </button>
                        </div>
                    </form>

                    <!-- Images Grid -->
                    <div class="grid grid-cols-3 gap-4">
                        @forelse($trek->galleries as $image)
                        <div class="relative group">
                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->title }}" class="w-full h-32 object-cover rounded-lg">
                            @if($image->is_featured)
                            <span class="absolute top-2 left-2 px-2 py-1 bg-emerald-600 text-white text-xs rounded">Featured</span>
                            @endif
                            <div class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition flex gap-1">
                                <button onclick="document.getElementById('editImageForm{{ $image->id }}').classList.toggle('hidden')" class="px-2 py-1 bg-blue-600 text-white text-xs rounded hover:bg-blue-700">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('admin.treks.delete-image', [$trek, $image]) }}" method="POST" class="inline" onsubmit="return confirm('Delete this image?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-2 py-1 bg-red-600 text-white text-xs rounded hover:bg-red-700">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                            
                            <!-- Edit Form -->
                            <div id="editImageForm{{ $image->id }}" class="hidden absolute inset-0 bg-white bg-opacity-95 rounded-lg p-3 z-10">
                                <form action="{{ route('admin.treks.update-image', [$trek, $image]) }}" method="POST" enctype="multipart/form-data" class="space-y-2">
                                    @csrf
                                    @method('PUT')
                                    <div>
                                        <label class="text-xs font-medium text-gray-700">Title</label>
                                        <input type="text" name="title" value="{{ $image->title }}" class="w-full px-2 py-1 border border-gray-300 rounded text-xs">
                                    </div>
                                    <div>
                                        <label class="text-xs font-medium text-gray-700">New Image (optional)</label>
                                        <input type="file" name="image" accept="image/*" class="w-full text-xs">
                                    </div>
                                    <div>
                                        <label class="text-xs font-medium text-gray-700">Sort Order</label>
                                        <input type="number" name="sort_order" value="{{ $image->sort_order }}" class="w-full px-2 py-1 border border-gray-300 rounded text-xs">
                                    </div>
                                    <label class="flex items-center text-xs">
                                        <input type="checkbox" name="is_featured" value="1" {{ $image->is_featured ? 'checked' : '' }} class="mr-1">
                                        Featured
                                    </label>
                                    <div class="flex gap-1">
                                        <button type="submit" class="px-3 py-1 bg-emerald-600 text-white text-xs rounded hover:bg-emerald-700">Save</button>
                                        <button type="button" onclick="document.getElementById('editImageForm{{ $image->id }}').classList.add('hidden')" class="px-3 py-1 bg-gray-400 text-white text-xs rounded hover:bg-gray-500">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @empty
                        <div class="col-span-3 text-center py-8 text-gray-500">
                            <i class="fas fa-images text-3xl mb-2"></i>
                            <p>No images uploaded yet</p>
                        </div>
                        @endforelse
                    </div>
                </div>

                <!-- Pricing Section -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-bold text-gray-800">Pricing</h2>
                        <button onclick="document.getElementById('priceForm').classList.toggle('hidden')" class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 text-sm">
                            <i class="fas fa-plus mr-2"></i>Add Price
                        </button>
                    </div>

                    <!-- Price Form -->
                    <form id="priceForm" action="{{ route('admin.treks.add-price', $trek) }}" method="POST" class="hidden mb-6 p-4 bg-gray-50 rounded-lg">
                        @csrf
                        <div class="grid grid-cols-2 gap-3">
                            <div class="col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Group Type *</label>
                                <input type="text" name="group_type" required class="w-full px-3 py-2 border border-gray-300 rounded" placeholder="Solo, 2-6 Person, etc.">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Min Persons *</label>
                                <input type="number" name="min_persons" required min="1" value="1" class="w-full px-3 py-2 border border-gray-300 rounded">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Max Persons *</label>
                                <input type="number" name="max_persons" required min="1" value="1" class="w-full px-3 py-2 border border-gray-300 rounded">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Price (USD) *</label>
                                <input type="number" name="price_usd" required step="0.01" min="0" class="w-full px-3 py-2 border border-gray-300 rounded" placeholder="2300.00">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Currency *</label>
                                <input type="text" name="currency" value="USD" required maxlength="3" class="w-full px-3 py-2 border border-gray-300 rounded">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Start Date</label>
                                <input type="date" name="start_date" class="w-full px-3 py-2 border border-gray-300 rounded">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">End Date</label>
                                <input type="date" name="end_date" class="w-full px-3 py-2 border border-gray-300 rounded">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Availability *</label>
                                <select name="availability" required class="w-full px-3 py-2 border border-gray-300 rounded">
                                    <option value="Available">Available</option>
                                    <option value="Limited">Limited</option>
                                    <option value="Not Available">Not Available</option>
                                </select>
                            </div>
                            <div class="col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Notes</label>
                                <textarea name="notes" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded" placeholder="Additional information..."></textarea>
                            </div>
                            <div class="col-span-2">
                                <button type="submit" class="px-4 py-2 bg-emerald-600 text-white rounded hover:bg-emerald-700">
                                    <i class="fas fa-plus mr-2"></i>Add Price
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Prices Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Group Type</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Persons</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Price</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Dates</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                @forelse($trek->prices as $price)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-3">
                                        <div class="font-medium text-gray-800">{{ $price->group_type }}</div>
                                        @if($price->notes)
                                        <div class="text-xs text-gray-500 mt-1">{{ Str::limit($price->notes, 30) }}</div>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-gray-700">{{ $price->min_persons }}-{{ $price->max_persons }}</td>
                                    <td class="px-4 py-3">
                                        <div class="font-semibold text-emerald-600">{{ $price->currency }} {{ number_format($price->price_usd, 2) }}</div>
                                    </td>
                                    <td class="px-4 py-3">
                                        @if($price->start_date || $price->end_date)
                                        <div class="text-sm text-gray-700">
                                            @if($price->start_date)
                                            <div><i class="fas fa-calendar-alt text-gray-400 mr-1"></i>{{ $price->start_date->format('M d, Y') }}</div>
                                            @endif
                                            @if($price->end_date)
                                            <div><i class="fas fa-calendar-check text-gray-400 mr-1"></i>{{ $price->end_date->format('M d, Y') }}</div>
                                            @endif
                                        </div>
                                        @else
                                        <span class="text-gray-400 text-xs">No dates</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3">
                                        <span class="px-2 py-1 text-xs rounded-full {{ $price->availability == 'Available' ? 'bg-green-100 text-green-800' : ($price->availability == 'Limited' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                            {{ $price->availability }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <button onclick="document.getElementById('editPriceRow{{ $price->id }}').classList.toggle('hidden'); this.closest('tr').classList.toggle('hidden')" class="text-blue-600 hover:text-blue-800 mr-2">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <form action="{{ route('admin.treks.delete-price', [$trek, $price]) }}" method="POST" class="inline" onsubmit="return confirm('Delete this price?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <!-- Edit Row -->
                                <tr id="editPriceRow{{ $price->id }}" class="hidden bg-blue-50">
                                    <td colspan="6" class="px-4 py-4">
                                        <form action="{{ route('admin.treks.update-price', [$trek, $price]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="grid grid-cols-2 gap-3">
                                                <div class="col-span-2">
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">Group Type *</label>
                                                    <input type="text" name="group_type" value="{{ $price->group_type }}" required class="w-full px-3 py-2 border border-gray-300 rounded">
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">Min Persons *</label>
                                                    <input type="number" name="min_persons" value="{{ $price->min_persons }}" required min="1" class="w-full px-3 py-2 border border-gray-300 rounded">
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">Max Persons *</label>
                                                    <input type="number" name="max_persons" value="{{ $price->max_persons }}" required min="1" class="w-full px-3 py-2 border border-gray-300 rounded">
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">Price (USD) *</label>
                                                    <input type="number" name="price_usd" value="{{ $price->price_usd }}" required step="0.01" min="0" class="w-full px-3 py-2 border border-gray-300 rounded">
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">Currency *</label>
                                                    <input type="text" name="currency" value="{{ $price->currency }}" required maxlength="3" class="w-full px-3 py-2 border border-gray-300 rounded">
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">Start Date</label>
                                                    <input type="date" name="start_date" value="{{ $price->start_date?->format('Y-m-d') }}" class="w-full px-3 py-2 border border-gray-300 rounded">
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">End Date</label>
                                                    <input type="date" name="end_date" value="{{ $price->end_date?->format('Y-m-d') }}" class="w-full px-3 py-2 border border-gray-300 rounded">
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">Availability *</label>
                                                    <select name="availability" required class="w-full px-3 py-2 border border-gray-300 rounded">
                                                        <option value="Available" {{ $price->availability == 'Available' ? 'selected' : '' }}>Available</option>
                                                        <option value="Limited" {{ $price->availability == 'Limited' ? 'selected' : '' }}>Limited</option>
                                                        <option value="Not Available" {{ $price->availability == 'Not Available' ? 'selected' : '' }}>Not Available</option>
                                                    </select>
                                                </div>
                                                <div class="col-span-2">
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">Notes</label>
                                                    <textarea name="notes" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded">{{ $price->notes }}</textarea>
                                                </div>
                                                <div class="col-span-2 flex gap-2">
                                                    <button type="submit" class="px-4 py-2 bg-emerald-600 text-white rounded hover:bg-emerald-700">
                                                        <i class="fas fa-save mr-2"></i>Update Price
                                                    </button>
                                                    <button type="button" onclick="document.getElementById('editPriceRow{{ $price->id }}').classList.add('hidden'); this.closest('tr').previousElementSibling.classList.remove('hidden')" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-8 text-center text-gray-500">
                                        <i class="fas fa-dollar-sign text-3xl text-gray-300 mb-2"></i>
                                        <p>No prices added yet</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Status Card -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="font-bold text-gray-800 mb-4">Status</h3>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Active</span>
                            <span class="px-3 py-1 rounded-full text-sm {{ $trek->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $trek->is_active ? 'Yes' : 'No' }}
                            </span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Trending</span>
                            <span class="px-3 py-1 rounded-full text-sm {{ $trek->is_trending ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ $trek->is_trending ? 'Yes' : 'No' }}
                            </span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Priority</span>
                            <span class="font-semibold text-gray-800">{{ $trek->priority }}</span>
                        </div>
                    </div>
                </div>

                <!-- Stats Card -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="font-bold text-gray-800 mb-4">Statistics</h3>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Images</span>
                            <span class="font-semibold text-gray-800">{{ $trek->galleries->count() }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Prices</span>
                            <span class="font-semibold text-gray-800">{{ $trek->prices->count() }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Bookings</span>
                            <span class="font-semibold text-gray-800">{{ $trek->bookTours->count() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
