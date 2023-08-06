@extends('layouts.admin')
@section('content')

{{-- resources/views/admin/users/index.blade.php --}}
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">

                <div  class="flex justify-between mb-4">
                    <h2 class="text-2xl font-semibold">Users</h2>
                    <form action="{{ route('admin.users.create', $user) }}" method="GET" class="inline">
                        @csrf
                        @method('GET')
                        <button type="submit" class="edit-button"><i class="fas fa-plus-circle mr-2"></i>&nbsp;Create</button>
                    </form>
                </div>


                {{-- User Table --}}
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Roles</th>
                            <th class="px-4 py-2">Phone</th>
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
                            <td class="border px-4 py-2">
                                <form action="{{ route('admin.users.edit', $user) }}" method="GET" class="inline">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="edit-button">Edit</button>
                                </form>
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
