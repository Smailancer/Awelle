<x-app-layout>
    @include ('words._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($words->count())
            <x-words-grid :words="$words" />

            {{ $words->links() }}
        @else
            <p class="text-center">The term doesnt exist yet, You can add it in case you know it .</p>
        @endif
    </main>
</x-app-layout>
