@props(['route','placeholder'])
  <!-- Search Form -->
    <form action="{{ route($route) }}" method="GET" class="mb-4">
        <div class="search-container">
            <input type="text" name="search" placeholder="{{$placeholder}}" class="form-control" value="{{ request('search') }}">
            <button type="submit" class="search-btn ">Search</button>
        </div>
    </form>
