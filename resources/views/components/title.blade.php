@props(['route','title'])
<div class="flex justify-between mb-4">
    <h1 class="text-2xl font-semibold">{{$title}}</h1>
    <form action="{{ route($route, $user) }}" method="GET" class="inline">
        @csrf
        @method('GET')
        <button type="submit" class="create-button"><i class="fas fa-plus-circle mr-2"></i>&nbsp;Create</button>
    </form>
</div>

