<x-app-layout>
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        @foreach($wordsWithSameTerm as $word)
            <div class="py-6 px-5 h-full flex flex-col">

                <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10 block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                    <div class="col-span-8">
                        <div class="justify-between mb-6">
                            <div class="space-x-2">
                                @foreach($word->slang as $slang)
                                    <x-slang-button :slang="$slang" />
                                @endforeach
                            </div>
                        </div>

                        <h1 class="font-bold text-3xl lg:text-4xl mb-6" style="font-family: 'Amiri Quran', serif;">
                            {{ $word->term }}
                        </h1>

                        @if(isset($word->type))
                            <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded me-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                {{ $word->type }}
                            </span>
                        @endif

                        <p class="mt-4 block mb-10 text-gray-400 text-xl">
                            <time>{{ $word->slug }} @isset($word->tifinagh) | {{ $word->tifinagh }} @endisset</time>
                        </p>

                        {{-- <h6 class="text-lg font-bold dark:text-white">{{ $word->type }}</h6> --}}


                        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                            <ul class="flex -mb-px text-sm font-medium text-center overflow-x-auto" id="default-tab-{{ $word->id }}" data-tabs-toggle="#default-tab-content-{{ $word->id }}" role="tablist">
                                <li class="flex-none">
                                    <button class="inline-block px-4 py-2 border-b-2 rounded-t-lg focus:outline-none" id="profile-tab-{{ $word->id }}" data-tabs-target="#profile-{{ $word->id }}" type="button" role="tab" aria-controls="profile" aria-selected="false">Arabic meaning</button>
                                </li>
                                <li class="flex-none">
                                    <button class="inline-block px-4 py-2 border-b-2 rounded-t-lg focus:outline-none hover:text-gray-600 dark:hover:text-gray-300" id="dashboard-tab-{{ $word->id }}" data-tabs-target="#dashboard-{{ $word->id }}" type="button" role="tab" aria-controls="dashboard" aria-selected="false">French meaning</button>
                                </li>
                                <li class="flex-none">
                                    <button class="inline-block px-4 py-2 border-b-2 rounded-t-lg focus:outline-none hover:text-gray-600 dark:hover:text-gray-300" id="settings-tab-{{ $word->id }}" data-tabs-target="#settings-{{ $word->id }}" type="button" role="tab" aria-controls="settings" aria-selected="false">English meaning</button>
                                </li>
                            </ul>
                        </div>

                        <div id="default-tab-content-{{ $word->id }}">
                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile-{{ $word->id }}" role="tabpanel" aria-labelledby="profile-tab-{{ $word->id }}">
                                <div class="space-y-4 lg:text-lg leading-loose">{!! $word->ar_meaning !!}</div>
                            </div>
                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard-{{ $word->id }}" role="tabpanel" aria-labelledby="dashboard-tab-{{ $word->id }}">
                                <div class="space-y-4 lg:text-lg leading-loose">{!! $word->fr_meaning !!}</div>
                            </div>
                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings-{{ $word->id }}" role="tabpanel" aria-labelledby="settings-tab-{{ $word->id }}">
                                <div class="space-y-4 lg:text-lg leading-loose">{!! $word->en_meaning !!}</div>
                            </div>
                        </div>

                        <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800" id="defaultTab-{{ $word->id }}" data-tabs-toggle="#defaultTabContent-{{ $word->id }}" role="tablist">
                                <li class="me-2">
                                    <button id="about-tab-{{ $word->id }}" data-tabs-target="#about-{{ $word->id }}" type="button" role="tab" aria-controls="about" aria-selected="true" class="inline-block p-4 text-blue-600 rounded-ss-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">Uses and Notes</button>
                                </li>
                                <li class="me-2">
                                    <button id="services-tab-{{ $word->id }}" data-tabs-target="#services-{{ $word->id }}" type="button" role="tab" aria-controls="services" aria-selected="false" class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Exemples</button>
                                </li>
                            </ul>
                            <div id="defaultTabContent-{{ $word->id }}">
                                <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about-{{ $word->id }}" role="tabpanel" aria-labelledby="about-tab-{{ $word->id }}">
                                    <p class="mb-3 text-gray-500 dark:text-gray-400">{{ $word->uses }}</p>
                                </div>
                                <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="services-{{ $word->id }}" role="tabpanel" aria-labelledby="services-tab-{{ $word->id }}">
                                    <blockquote class="p-4 my-4 border-s-4 border-gray-300 bg-gray-50 dark:border-gray-500 dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab-{{ $word->id }}">
                                        <p class="text-xl italic font-medium leading-relaxed text-gray-900 dark:text-white">{{ $word->exemple }}</p>
                                    </blockquote>
                                </div>
                            </div>
                        </div>

                        <div class="lg:justify-center text-sm mt-6">
                            <div class="ml-3 text-left">
                                <h5 class="font-bold mb-2">
                                    <a href="/?author={{ $word->author->username }}">{{ $word->author->username }}</a>
                                </h5>
                            </div>
                        </div>

                        @can('update-word', $word)
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex space-x-2">
                                    <a href="/words/{{ $word->id }}/edit" class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:focus:ring-yellow-900">Edit</a>


                                    <form method="POST" action="/words/{{ $word->id }}" onsubmit="return confirm('Are you sure you want to delete this word ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                                    </form>

                                </div>
                            </td>
                        @endcan
                    </div>
                </article>
            </div>
        @endforeach

        <br>
        <hr>

        <section class="col-span-8 col-start-5 mt-10 space-y-6">
            <h2 class="text-4xl font-bold dark:text-white">Add a comment</h2>
            @include ('words._add-comment-form')

            @if($word->comments->count())
                <h2 class="text-4xl font-bold dark:text-white">Comments :</h2>
                @foreach ($word->comments as $comment)
                    <x-word-comment :comment="$comment" :word="$word"/>
                @endforeach
            @endif
        </section>
    </main>
</x-app-layout>
