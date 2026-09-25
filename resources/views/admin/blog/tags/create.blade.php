@extends('admin.layouts.app')

@section('title', 'Add Blog Tag')

@section('content')
<div class="p-6 max-w-2xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Add Blog Tag</h2>
        <a href="{{ route('admin.blog.tags.index') }}" class="text-gray-600 hover:text-gray-900">Back to List</a>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('admin.blog.tags.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm p-2 border" required>
            </div>

            <div class="mt-6 flex justify-end">
                <button type="submit" class="bg-emerald-600 text-white px-4 py-2 rounded shadow hover:bg-emerald-700">Save Tag</button>
            </div>
        </form>
    </div>
</div>
@endsection
