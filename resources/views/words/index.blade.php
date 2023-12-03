<x-app-layout>
    @include ('words._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($words->count())
            <x-words-grid :words="$words" />

            {{ $words->links() }}
        @else
            <p class="text-center">No words yet. Please check back later.</p>
        @endif
    </main>
</x-app-layout>
