<!-- resources/views/components/productrow.blade.php -->

@props(['products'])

<div class="product-container">
    @foreach($products as $product)
        <x-productcard :product="$product" />
    @endforeach
</div>
