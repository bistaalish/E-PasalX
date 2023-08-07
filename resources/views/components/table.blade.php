@props(['heads','body'])
        {{-- User Table --}}
        <table class="table-auto w-full">
            <thead>
                <tr>
                    @forelse($heads as $head)
                    <th class="px-4 py-2">{{}}</th>
                    @endforelse
                </tr>
            </thead>
            <tbody>{{ $slot }}</tbody>

        </table>
