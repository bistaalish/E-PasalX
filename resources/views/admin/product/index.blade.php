@extends('layouts.admin');
@section('content');

<x-admincontainer>
    <x-title route="admin.product.create" title="Product Management" />
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Price</th>
                <th class="px-4 py-2">Quantity</th>
                <th class="px-4 py-2">Categories</th>
                <th class="px-4 py-2">Images</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td class="border px-4 py-2">{{ $product->name }}</td>
                <td class="border px-4 py-2">{{ $product->price }}</td>
                <td class="border px-4 py-2">{{ $product->quantity }}</td>
                <td class="border px-4 py-2">
                    @foreach($product->categories as $category)
                        {{ $category->name }}@if(!$loop->last), @endif
                    @endforeach
                </td>
                <td class="border px-4 py-2">
                    @foreach($product->images as $image)
                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="Product Image" class="product-image">
                    @endforeach
                </td>
                <td class="border px-4 py-2">
                    {{-- <a href="{{ route('admin.product.show', $product->id) }}" class="btn btn-info">View</a> --}}
                    {{-- <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-primary">Edit</a> --}}
                    <form action="{{ route('admin.product.edit',$product->id) }}" method="GET" class="inline">
                        @csrf
                        @method('GET')
                        <button type="submit" class="edit-button">Edit</button>
                    </form>
                    <form action="{{ route('admin.product.delete', $product->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-admincontainer>
@endsection
