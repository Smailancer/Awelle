<x-layout>
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            {{-- <div class="col-span-4 lg:text-center lg:pt-14 mb-10"> --}}

            <div class="col-span-8">
                <div class="hidden lg:flex justify-between mb-6">
                
  

                    <div class="space-x-2">
                        <x-slang-button :slang="$word->slang"/>
                    </div>
                </div>

                <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                    {{ $word->term }}
                </h1>

                <p class="mt-4 block mb-10 text-gray-400 text-xl">
                    <time>{{ $word->slug }}</time>
                </p>


                <div class="space-y-4 lg:text-lg leading-loose">{!! $word->meaning !!}</div>
<br>

                <blockquote class="p-4 my-4 border-l-4 border-gray-300 bg-gray-50 dark:border-gray-500 dark:bg-gray-800">
                    <svg class="w-8 h-8 text-gray-400 dark:text-gray-600 mb-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
                        <path d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z"/>
                    </svg>
                    <p>{{ $word->exemple }}</p>
                </blockquote>

                 <div class=" lg:justify-center text-sm mt-4">
            
                    <div class="ml-3 text-left">
                        <h5 class="font-bold">
                            <a href="/?author={{ $word->author->username }}">{{ $word->author->username }}</a>
                        </h5>
                    </div>
                </div>

            <p class="mt-6 text-gray-400 text-xs">
                Published
                <time>{{ $word->created_at->diffForHumans() }}</time>
            </p>
    
<br>
<hr>
            <section class="col-span-8 col-start-5 mt-10 space-y-6">
                @include ('words._add-comment-form')

                @foreach ($word->comments as $comment)
                    <x-word-comment :comment="$comment"/>
                @endforeach
            </section>
        </article>
    </main>
</x-layout>
