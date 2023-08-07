@props(['route','list','label'])
<div class="filter ">
    <!-- Filter Form -->
        <form action="{{ route($route) }}" method="GET" class="mb-4">
            <label for="role" class="mr-2">{{ $label }}</label>
            <select name="role" id="role" class="form-control">
                <option value="" class="role-lbl">All</option>
                @foreach ($list as $item)
                <option value="{{ $item->name }}" @if (request('role') === $item->name) selected @endif>{{ $item->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="filter-btn">Filter</button>
        </form>
    </div>
