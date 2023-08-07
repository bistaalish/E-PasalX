@extends('layouts.admin')
@section('content')


<x-admincontainer>
    <x-title route="admin.category.create" title='Category Management' />
    <x-search route="admin.category.index" placeholder="Search by Email Or Description or ID" />
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Description</th>
                <th class="px-4 py-2">Slug</th>
                <th class="px-4 py-2">Parent Category</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td class="border px-4 py-2">{{ $category->id }}</td>
                <td class="border px-4 py-2">{{ $category->name }}</td>
                <td class="border px-4 py-2">{{ $category->description }}</td>
                <td class="border px-4 py-2">{{ $category->slug }}</td>
                <td class="border px-4 py-2">
                    @if ($category->parentCategory)
                        {{ $category->parentCategory->name }}
                    @else
                        None
                    @endif
                </td>
                <td class="border px-4 py-2">
                    <form action="{{ route('admin.category.edit', $category) }}" method="GET" class="inline">
                        @csrf
                        @method('GET')
                        <button type="submit" class="edit-button">Edit</button>
                    </form>
                    <form action="{{ route('admin.category.delete', $category) }}" method="POST" class="inline">
                        @csrf
                        @method('POST')
                        <button type="submit" class="delete-btn">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-admincontainer>
@endsection
