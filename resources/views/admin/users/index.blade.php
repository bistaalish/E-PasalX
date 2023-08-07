@extends('layouts.admin')
@section('content')

{{-- resources/views/admin/users/index.blade.php --}}
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">

                <div  class="flex justify-between mb-4">
                    <h1 class="text-2xl font-semibold">User Management</h1>
                    <form action="{{ route('admin.users.create', $user) }}" method="GET" class="inline">
                        @csrf
                        @method('GET')
                        <button type="submit" class="edit-button"><i class="fas fa-plus-circle mr-2"></i>&nbsp;Create</button>
                    </form>
                </div>

                                    <!-- Search Form -->
                                    <form action="{{ route('admin.users.index') }}" method="GET" class="mb-4">
                                        <div class="flex">
                                            <input type="text" name="search" placeholder="Search by name or email" class="form-control" value="{{ request('search') }}">
                                            <button type="submit" class="btn btn-primary ml-2">Search</button>
                                        </div>
                                    </form>

                                    <!-- Filter Form -->
                                    <form action="{{ route('admin.users.index') }}" method="GET" class="mb-4">
                                        <div class="flex">
                                            <label for="role" class="mr-2">Filter by Role:</label>
                                            <select name="role" id="role" class="form-control">
                                                <option value="">All</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->name }}" @if (request('role') === $role->name) selected @endif>{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                            <button type="submit" class="btn btn-primary ml-2">Filter</button>
                                        </div>
                                    </form>

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
            </div>
        </div>
    </div>
</div>

@endsection
