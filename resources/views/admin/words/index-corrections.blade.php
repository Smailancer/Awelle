<!-- resources/views/admin/words/approve-corrections.blade.php -->

<x-app-layout>
    <x-setting heading="Manage Suggestions">
        @if ($correctionSuggestions->count())


        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">


        @foreach ($correctionSuggestions as $word)

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            <!-- Card 1 -->
            <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                <div class="space-x-2 flex flex-wrap">
                    @foreach(json_decode($word->slangs) as $slangId)
                    @php
                                $slang = \App\Models\Slang::find($slangId);
                                @endphp

                @if($slang)
                <x-slang-button :slang="$slang" class="mb-6 mr-2 " />
                @endif
                @endforeach
                </div>
                <a href="{{ route('admin.words.showCorrectionSuggestion', $word->id) }}">

                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $word->term }}</h5>
                </a>
                    <p class="font-normal text-gray-700 dark:text-gray-400">{{ Str::limit($word->ar_meaning, 100) }}</p>
                    <p class="font-normal text-gray-700 dark:text-gray-400">{{ Str::limit($word->fr_meaning, 100) }}</p>
                    <p class="font-normal text-gray-700 dark:text-gray-400">{{ Str::limit($word->en_meaning, 100) }}</p>
            </div>

            <!-- Repeat this block for the other cards -->






            {{-- <div class="lg:grid lg:grid-cols-4">
                <div class="card-body">


                    <article>
    <div class="py-6 px-5 h-full flex flex-col">

        <div class="mt-6 flex flex-col justify-between flex-1">
            <header>
                <div class="space-x-2 flex flex-wrap">
                    @foreach(json_decode($suggestion->slangs) as $slangId)
                        {{-- Assuming you have a Slang model and a method to retrieve a single slang --}}
                        {{-- @php
                            $slang = \App\Models\Slang::find($slangId);
                        @endphp

                        @if($slang)
                            <x-slang-button :slang="$slang" class="mb-6 mr-2 " />
                        @endif
                    @endforeach
                </div>




                <div class="mt-4">
                    <h1 class="text-3xl leading-loose clamp one-line pl-2 ">
                        <a href="/words/{{ $suggestion->term }}" style="font-family: 'Amiri Quran', serif;">
                            {{ $suggestion->term }}
                        </a>
                    </h1>


                    <span class="mt-2 block text-gray-700 text-x">
                        <h2>{{ $suggestion->spell }} @isset($suggestion->tifinagh) | {{ $suggestion->tifinagh }} @endisset</h2>
                    </span>
                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $suggestion->created_at->diffForHumans() }}</time>
                    </span>
                </div>
                <div class="text-sm mt-4 space-y-4">
                     {{ Str::limit($suggestion->ar_meaning, 100) }}
                </div>
            </header>

        </div>
    </div>
</article>
 --}}




                </div>
            </div>
        @endforeach
        </main>

        @else
        <p class="text-center">No edit suggestions yet .</p>
    @endif

</x-setting>
</x-app-layout>
