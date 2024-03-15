<x-app-layout>
    <x-setting heading="Manage Suggestions">
        @if ($correctionSuggestions->count())
        <main class="max-w-7xl mx-auto mt-6 lg:mt-20 space-y-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($correctionSuggestions as $word)
                <!-- Suggestion Card -->
                <div class="flex flex-col items-center p-4 bg-white rounded-lg shadow border border-gray-200 hover:bg-gray-50" style="aspect-ratio: 1 / 1;">
                    <div class="mb-2 w-full">
                        <!-- Slangs Tags -->
                        <div class="flex flex-wrap gap-2 mb-3 justify-center">
                            @foreach(json_decode($word->slangs) as $slangId)
                            @php
                                $slang = \App\Models\Slang::find($slangId);
                            @endphp
                            @if($slang)
                            <x-slang-button :slang="$slang"/>
                            @endif
                            @endforeach
                        </div>
                        <!-- Term and Spell -->
                        <div class="text-center mb-3">
                            <a href="{{ route('admin.words.showCorrectionSuggestion', $word->id) }}" class="block">
                                <h5 class="text-lg font-bold text-gray-900 mb-1">{{ $word->term }}</h5>
                            </a>
                            <p class="text-sm font-medium text-gray-500">{{ $word->spell }}</p>
                        </div>
                        <!-- Meanings -->
                        <div class="px-2 text-center">
                            <p class="text-sm text-gray-500 overflow-hidden">{{ Str::limit($word->ar_meaning, 100) }}</p>
                            <p class="text-sm text-gray-500 overflow-hidden">{{ Str::limit($word->fr_meaning, 100) }}</p>
                            <p class="text-sm text-gray-500 overflow-hidden">{{ Str::limit($word->en_meaning, 100) }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </main>
        @else
        <p class="text-center">No edit suggestions yet.</p>
        @endif
    </x-setting>
</x-app-layout>
