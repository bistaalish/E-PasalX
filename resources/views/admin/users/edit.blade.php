{{-- resources/views/admin/users/edit.blade.php --}}

@extends('layouts.admin')
@section('content')

<x-editcontainer>
    <h2>Edit Users</h2>
                    <form action="{{ route('admin.users.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                            <input type="text" name="name" id="name" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $user->name }}">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                            <input type="email" name="email" id="email" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $user->email }}">
                        </div>
                        <div class="mb-4">
                            <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Phone:</label>
                            <input type="name" name="phone" id="phone" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $user->phone }}">
                        </div>
                        <div class="mb-4">
                            <label for="roles" class="block text-gray-700 text-sm font-bold mb-2">Roles:</label>
                            <select name="roles[]" id="roles" multiple class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                @foreach ($roles as $role)
                                <option value="{{ $role->name }}" @if ($user->roles->contains($role)) selected @endif>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="update-btn">Update User</button>                    </form>
                    </form>
                      <div>

                      </div>

</x-editcontainer>
@endsection
