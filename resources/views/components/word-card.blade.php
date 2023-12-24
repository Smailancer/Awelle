@props(['word'])

<article
    {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
    <div class="py-6 px-5 h-full flex flex-col">

        <div class="mt-6 flex flex-col justify-between flex-1">
            <header>
                <div class="space-x-2 flex flex-wrap">
                    @foreach($word->slang as $slang)
                        <x-slang-button :slang="$slang" class="mb-6 mr-2 " />
                    @endforeach
                </div>



                <div class="mt-4">
                    <h1 class="text-3xl leading-loose clamp one-line pl-2 ">
                        <a href="/words/{{ $word->spell }}" style="font-family: 'Amiri Quran', serif;">
                            {{ $word->term }}
                        </a>
                    </h1>


                    <span class="mt-2 block text-gray-700 text-x">
                        <h2>{{ $word->spell }} @isset($word->tifinagh) | {{ $word->tifinagh }} @endisset</h2>
                    </span>
                    {{-- <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $word->created_at->diffForHumans() }}</time>
                    </span> --}}
                </div>
                <div class="text-sm mt-4 space-y-4">
                     {{ Str::limit($word->ar_meaning, 100) }}
                </div>
            </header>


        </div>
    </div>
</article>
