<!-- resources/views/components/productcard.blade.php -->

@props(['product'])

<div class="product-card">
    <div class="product-images">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($product->images as $image)
                    <div class="swiper-slide">
                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $product->name }} Image">
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

    </div>
    <div class="product-details">
        <h3 class="product-title">{{ $product->name }}</h3>
        <p class="product-price">${{ $product->price }}</p>
        <p class="product-category">{{ $product->categories->pluck('name')->implode(', ') }}</p>
        <p class="product-description">{{ $product->description }}</p>
        <p class="product-quantity">Stock: {{ $product->quantity }}</p>
    </div>
</div>
