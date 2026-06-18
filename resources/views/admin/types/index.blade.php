@extends('admin.layouts.app')

@section('title', 'Manage Types')

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Manage Types</h1>
            <p class="text-gray-600 mt-1">Manage trek, expedition, tour, and climbing categories</p>
        </div>
        <a href="{{ route('admin.types.create') }}" class="px-6 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 text-white rounded-lg hover:from-emerald-700 hover:to-teal-700 transition shadow-lg">
            <i class="fas fa-plus mr-2"></i>Add New Type
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded">
            <p class="text-green-700">{{ session('success') }}</p>
        </div>
    @endif

    <!-- Types Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($types as $type)
        <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition">
            <div class="flex items-start justify-between mb-4">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center">
                        <i class="{{ $type->icon ?? 'fas fa-tag' }} text-emerald-600 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800">{{ $type->name }}</h3>
                        <p class="text-xs text-gray-500">Order: {{ $type->order }}</p>
                    </div>
                </div>
                <div class="flex gap-1">
                    @if($type->is_active)
                        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Active</span>
                    @else
                        <span class="px-2 py-1 text-xs rounded-full bg-gray-100 text-gray-600">Inactive</span>
                    @endif
                </div>
            </div>

            @if($type->description)
                <p class="text-gray-600 text-sm mb-4">{{ $type->description }}</p>
            @endif

            <div class="flex items-center justify-between">
                <span class="text-sm text-gray-500">
                    <i class="fas fa-hiking mr-1"></i>{{ $type->trending_treks_count }} {{ \Str::plural('trek', $type->trending_treks_count) }}
                </span>
                <div class="flex gap-2">
                    <a href="{{ route('admin.types.edit', $type) }}" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.types.destroy', $type) }}" method="POST" class="inline" onsubmit="return confirm('Delete this type? Associated treks will also be removed.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-12">
            <i class="fas fa-tags text-4xl text-gray-300 mb-4"></i>
            <p class="text-lg text-gray-500">No types found. Create your first category!</p>
        </div>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $types->links() }}
    </div>
</div>
@endsection
