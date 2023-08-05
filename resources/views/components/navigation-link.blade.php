<!-- resources/views/components/navigation-link.blade.php -->
@props(['route', 'icon'])

<a href="{{ $route }}" class="navigation-link">
    <i class="fas {{ $icon }}"></i>
    <span>{{ $slot }}</span>
</a>
