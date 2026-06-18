@extends('admin.layouts.app')

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Manage Treks</h1>
            <p class="text-gray-600 mt-1">View and manage all trekking packages</p>
        </div>
        <a href="{{ route('admin.treks.create') }}" class="px-6 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 text-white rounded-lg hover:from-emerald-700 hover:to-teal-700 transition shadow-lg">
            <i class="fas fa-plus mr-2"></i>Add New Trek
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded">
            <p class="text-green-700">{{ session('success') }}</p>
        </div>
    @endif

    <!-- Treks Table -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Trek</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Duration</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Difficulty</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($treks as $trek)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            @if($trek->galleries->where('is_featured', true)->first())
                                <img src="{{ asset('storage/' . $trek->galleries->where('is_featured', true)->first()->image_path) }}" alt="{{ $trek->title }}" class="w-16 h-16 rounded-lg object-cover mr-4">
                            @else
                                <div class="w-16 h-16 rounded-lg bg-gray-200 mr-4 flex items-center justify-center">
                                    <i class="fas fa-image text-gray-400"></i>
                                </div>
                            @endif
                            <div>
                                <div class="font-semibold text-gray-800">{{ $trek->title }}</div>
                                <div class="text-sm text-gray-500">
                                    <i class="{{ $trek->type->icon ?? 'fas fa-tag' }} mr-1"></i>{{ $trek->type->name ?? 'N/A' }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-gray-700">{{ $trek->location }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $trek->duration_days }} days</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-xs rounded-full
                            @if($trek->difficulty_level <= 2) bg-green-100 text-green-800
                            @elseif($trek->difficulty_level == 3) bg-yellow-100 text-yellow-800
                            @else bg-red-100 text-red-800
                            @endif">
                            Level {{ $trek->difficulty_level }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex gap-2">
                            @if($trek->is_active)
                                <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Active</span>
                            @else
                                <span class="px-2 py-1 text-xs rounded-full bg-gray-100 text-gray-800">Inactive</span>
                            @endif
                            @if($trek->is_trending)
                                <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800">Trending</span>
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex gap-2">
                            <a href="{{ route('admin.treks.show', $trek) }}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.treks.edit', $trek) }}" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.treks.destroy', $trek) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this trek?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                        <i class="fas fa-hiking text-4xl text-gray-300 mb-4"></i>
                        <p class="text-lg">No treks found. Create your first trek!</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $treks->links() }}
    </div>
</div>
@endsection
