@extends('layouts.admin')
@section('content')

{{-- resources/views/admin/users/index.blade.php --}}
<x-admincontainer>
    <x-title route="admin.users.create" title='User Management'></x-title>

    <div class="search-filter-flex ">
        {{-- Filter --}}
        <x-filter route="admin.users.index" label="Role: " :list="$roles"></x-filter>
        <!-- Search Form -->
        <x-search route="admin.users.index" placeholder="Search by Email Or Name"></x-search>
    </div>

        {{-- User Table --}}
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2"><a href="{{ route('admin.users.index', ['sort' => 'name', 'order' => request('sort') === 'name' && request('order') === 'asc' ? 'desc' : 'asc']) }}">
                                Name @if(request('sort') === 'name') @if(request('order') === 'asc') <i class="fas fa-sort-up"></i> @else <i class="fas fa-sort-down"></i> @endif @endif
                            </a></th>
                    <th class="px-4 py-2"><a href="{{ route('admin.users.index', ['sort' => 'email', 'order' => request('sort') === 'email' && request('order') === 'asc' ? 'desc' : 'asc']) }}">
                                Email @if(request('sort') === 'email') @if(request('order') === 'asc') <i class="fas fa-sort-up"></i> @else <i class="fas fa-sort-down"></i> @endif @endif
                            </a></th>
                    <th class="px-4 py-2">Roles</th>
                    <th class="px-4 py-2"><a href="{{ route('admin.users.index', ['sort' => 'phone', 'order' => request('sort') === 'phone' && request('order') === 'asc' ? 'desc' : 'asc']) }}">
                                Phone @if(request('sort') === 'roles') @if(request('order') === 'asc') <i class="fas fa-sort-up"></i> @else <i class="fas fa-sort-down"></i> @endif @endif
                            </a></th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr>
                    <td class="border px-4 py-2">{{ $user->name }}</td>
                    <td class="border px-4 py-2">{{ $user->email }}</td>
                    <td class="border px-4 py-2">{{ implode(', ', $user->roles->pluck('name')->toArray()) }}</td>
                    <td class="border px-4 py-2">{{ $user->phone }}</td>
                    <td class="border px-4 py-2 flex space">
                        <form action="{{ route('admin.users.edit', $user) }}" method="GET" class="inline">
                            @csrf
                            @method('GET')
                            <button type="submit" class="edit-button">Edit</button>
                        </form>
                        &nbsp;&nbsp;
                        <form action="{{ route('admin.users.delete', $user) }}" method="POST" class="inline">
                            @csrf
                            @method('POST')
                            <button type="submit" class="delete-btn">Delete</button>
                        </form>
                    </td>
                </tr>
                    @empty
                <tr>
                    <td class="border px-4 py-2" colspan="4">No users found.</td>
                </tr>
                    @endforelse
            </tbody>
        </table>
        <div class="mt-4">
            {{ $users->links() }}
        </div>
</x-admincontainer>
@endsection
