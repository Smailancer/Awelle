@props(['slang'])

@php
    // Define an array of colors for each slang
    $colorMap = [
        'Kabyle' => 'bg-blue-300 text-blue-800',
        'Mozabit' => 'bg-green-300 text-green-800',
        'Chawi' => 'bg-yellow-300 text-yellow-800',
        'Chenwi' => 'bg-red-300 text-red-800',
        'Targui' => 'bg-purple-300 text-purple-800',
    ];

    // Get the color for the current slang or default to a fallback
    $colorClasses = $colorMap[$slang->name] ?? 'bg-gray-300 text-gray-800';
@endphp

<a href="/?slang={{ $slang->name }}"
   class="px-3 py-1 border rounded-full {{ $colorClasses }} text-xs uppercase font-semibold"
   style="font-size: 10px"
>{{ $slang->name }}</a>

