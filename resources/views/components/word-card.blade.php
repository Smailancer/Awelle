@props(['word'])

<article
    {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
    <div class="py-6 px-5 h-full flex flex-col">
        {{-- <div>
            <img src="{{ asset('storage/' . $word->thumbnail) }}" alt="Blog word illustration" class="rounded-xl">
        </div> --}}

        <div class="mt-6 flex flex-col justify-between flex-1">
            <header>
                <div class="space-x-2">
                   <x-slang-button :slang="$word->slang" />
                </div>
             

                <div class="mt-4">
                    <h1 class="text-3xl clamp one-line">
                        <a href="/words/{{ $word->slug }}">
                            {{ $word->term }}
                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-x">
                        <time>{{ $word->slug }}</time>
                    </span>
                    {{-- <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $word->created_at->diffForHumans() }}</time>
                    </span> --}}
                </div>
            </header>

            <div class="text-sm mt-4 space-y-4">
                 {{ Str::limit($word->meaning, 100) }}
            </div>
{{-- 
            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3">
                        <h5 class="font-bold">
                            <a href="/?author={{ $word->author->username }}">{{ $word->author->username }}</a>
                        </h5>
                    </div>
                </div>

                <div>
                    <a href="/words/{{ $word->slug }}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >Read More</a>
                </div>
            </footer> --}}
        </div>
    </div>
</article>
