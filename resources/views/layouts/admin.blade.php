<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot> --}}
    <div class="admin-panel">
        <x-admin-sidebar>
            <div class="menu-btn" onclick="toggleNavigation()"><i class="fa fa-bars"></i><span>&nbsp; Admin Menu</span></div>
            <br>
            <x-user-card :user="$user" />
            <div class="navigation-container">
                <x-navigation>
                    <x-navigation-link route="{{ route('admin.dashboard') }}" icon="fa-tachometer-alt">Dashboard</x-navigation-link>
                    <x-navigation-link route="{{ route('admin.dashboard') }}" icon="fa-list-alt">Categories</x-navigation-link>
                    <x-navigation-link route="{{ route('admin.dashboard') }}" icon="fa-shopping-cart">Products</x-navigation-link>
                    <x-navigation-link route="{{ route('admin.dashboard') }}" icon="fa-user-lock">Roles</x-navigation-link>
                    <x-navigation-link route="{{ route('admin.dashboard') }}" icon="fa-users">Users</x-navigation-link>
                    <x-navigation-link route="{{ route('admin.dashboard') }}" icon="fa-user-circle">Profiles</x-navigation-link>
                    <x-navigation-link route="{{ route('dashboard') }}" icon="fa-sign-out-alt">Logout</x-navigation-link>
                </x-navigation>
            </div>
        </x-admin-sidebar>
        <div class="admin-content">
            @yield('content')
        </div>
    </div>
</x-app-layout>
