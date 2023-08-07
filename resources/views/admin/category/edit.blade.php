@extends('layouts.admin')
@section('content')

<x-editcontainer>
    <h1 class="text-2xl font-semibold mb-4">Edit Category: {{ $category->name }}</h1>

    <form action="{{ route('admin.category.update', $category) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
            <input type="text" name="name" id="name" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $category->name }}" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
            <textarea name="description" id="description" rows="4" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $category->description }}</textarea>
        </div>

        <div class="mb-4">
            <label for="slug" class="block text-gray-700 text-sm font-bold mb-2">Slug:</label>
            <input type="text" name="slug" id="slug" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $category->slug }}" required>
        </div>

        <div class="mb-4">
            <label for="parent_id" class="block text-gray-700 text-sm font-bold mb-2">Parent Category:</label>
            <select name="parent_id" id="parent_id" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">None</option>
                @foreach ($categories as $parentCategory)
                    <option value="{{ $parentCategory->id }}" @if($category->parent_id == $parentCategory->id) selected @endif>{{ $parentCategory->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="update-btn">Update</button>
    </form>
</x-editcontainer>
@endsection
