@props(['slang'])

@php
    // Define an array of colors for each slang
    $colorMap = [
    'Kabyle' => 'bg-blue-400 text-blue-800',
    'Mozabit' => 'bg-green-400 text-green-800',
    'Chaoui' => 'bg-yellow-400 text-yellow-800',
    'Chenoui' => 'bg-red-400 text-red-800',
    'Targui' => 'bg-purple-400 text-purple-800',
    'Chleuh' => 'bg-gray-200 text-gray-800', // Add Chleuh with the desired color classes
];

    // Get the color for the current slang or default to a fallback
    $colorClasses = $colorMap[$slang->name] ?? 'bg-gray-300 text-gray-800';
@endphp

<a href="/?slang={{ $slang->name }}"
   class="px-3 py-1 border rounded-full {{ $colorClasses }} text-xs uppercase font-semibold"
   style="font-size: 10px"
>{{ $slang->name }}</a>

