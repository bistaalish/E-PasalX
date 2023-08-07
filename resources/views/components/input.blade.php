@props(['title','name','type'])
<div class='mb-4'>
    <label for="{{$name}}" class="block text-gray-700 text-sm font-bold mb-2">{{$title}}</label>
    <input type={{$type}} name="{{$name}}" id="{{$name}}" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
</div>
