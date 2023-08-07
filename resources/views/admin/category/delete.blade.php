{{-- resources/views/admin/users/delete.blade.php --}}
@extends('layouts.admin')
@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="mb-4">Are you sure you want to delete the Category "{{ $category->name }}"?</p>
                    <form action="{{ route('admin.category.delete', $category) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Delete Category</button>
                        <a href="{{ route('admin.category.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
