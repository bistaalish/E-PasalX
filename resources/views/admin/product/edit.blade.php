@extends('layouts.admin')
@section('content')

<x-editcontainer>
    <h1 class="text-2xl font-semibold mb-4">Edit Product: {{ $product->name }}</h1>
    <form action="{{ route('admin.product.update', $product) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
            <input type="text" value="{{$product->name}}" name="name" id="name" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
            <input type="text" value="{{$product->description}}" name="description" id="description" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-4">
            <label for="categories" class="block text-gray-700 text-sm font-bold mb-2">Categories:</label>
            <select multiple class="form-control" id="categories" name="category_ids[]">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price:</label>
            <input type="number" value="{{$product->price}}"  step="any"  name="price" id="price" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="mb-4">
            <label for="Quantity" class="block text-gray-700 text-sm font-bold mb-2">Quantity:</label>
            <input id="quantity" value="{{$product->quantity}}" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity', 0) }}" required>

        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active') ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">
                    {{ __('Is Active') }}
                </label>
            </div>
        </div>
        <br>
        <button type="submit" class="create-button">
            Update
        </button>
    </form>
</x-editcontainer>
@endsection
