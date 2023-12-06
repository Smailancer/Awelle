<x-app-layout>
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
@foreach($wordsWithSameTerm as $word)

        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10 block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            {{-- <div class="col-span-4 lg:text-center lg:pt-14 mb-10"> --}}

            <div class="col-span-8">
                <div class="justify-between mb-6">



                    <div class="space-x-2">
                        @foreach($word->slang as $slang)
                            <x-slang-button :slang="$slang" />
                        @endforeach
                    </div>
                </div>

                <h1 class="font-bold text-3xl lg:text-4xl mb-10" style="font-family: 'Amiri Quran', serif;">
                    {{ $word->term }}
                </h1>

                <p class="mt-4 block mb-10 text-gray-400 text-xl">
                    <time>{{ $word->slug }}</time>
                </p>


                <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex -mb-px text-sm font-medium text-center overflow-x-auto" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                        <li class="flex-none">
                            <button class="inline-block px-4 py-2 border-b-2 rounded-t-lg focus:outline-none" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Arabic meaning</button>
                        </li>
                        <li class="flex-none">
                            <button class="inline-block px-4 py-2 border-b-2 rounded-t-lg focus:outline-none hover:text-gray-600 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">French meaning</button>
                        </li>
                        <li class="flex-none">
                            <button class="inline-block px-4 py-2 border-b-2 rounded-t-lg focus:outline-none hover:text-gray-600 dark:hover:text-gray-300" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">English meaning</button>
                        </li>
                    </ul>
                </div>

                <div id="default-tab-content">
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="space-y-4 lg:text-lg leading-loose">{!! $word->ar_meaning !!}</div>
                    </div>
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                        <div class="space-y-4 lg:text-lg leading-loose">{!! $word->fr_meaning !!}</div>
                    </div>
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                        <div class="space-y-4 lg:text-lg leading-loose">{!! $word->en_meaning !!}</div>
                    </div>
                </div>



                {{-- <div class="space-y-4 lg:text-lg leading-loose">{!! $word->ar_meaning !!}</div> --}}
<br>


            {{-- <p class="mb-3 text-gray-500 dark:text-gray-400">{{ $word->uses }}</p>


            <blockquote class="p-4 my-4 border-s-4 border-gray-300 bg-gray-50 dark:border-gray-500 dark:bg-gray-800"id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <p class="text-xl italic font-medium leading-relaxed text-gray-900 dark:text-white">{{ $word->exemple }}</p>
            </blockquote> --}}





            <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800" id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                    <li class="me-2">
                        <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="true" class="inline-block p-4 text-blue-600 rounded-ss-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">Uses and Notes</button>
                    </li>
                    <li class="me-2">
                        <button id="services-tab" data-tabs-target="#services" type="button" role="tab" aria-controls="services" aria-selected="false" class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Exemples</button>
                    </li>

                </ul>
                <div id="defaultTabContent">
                    <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about" role="tabpanel" aria-labelledby="about-tab">
                        <p class="mb-3 text-gray-500 dark:text-gray-400">{{ $word->uses }}</p>

                    </div>
                    <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="services" role="tabpanel" aria-labelledby="services-tab">
                        <!-- List -->
                        <blockquote class="p-4 my-4 border-s-4 border-gray-300 bg-gray-50 dark:border-gray-500 dark:bg-gray-800"id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <p class="text-xl italic font-medium leading-relaxed text-gray-900 dark:text-white">{{ $word->exemple }}</p>
                        </blockquote>

                    </div>

                </div>
            </div>


            </td>

            <div class="lg:justify-center text-sm mt-6">
                <div class="ml-3 text-left">
                    <h5 class="font-bold mb-2">
                        <a href="/?author={{ $word->author->username }}">{{ $word->author->username }}</a>
                    </h5>
                </div>
            </div>


            {{-- <p class="mt-6 text-gray-400 text-xs">
                Published
                <time>{{ $word->created_at->diffForHumans() }}</time>
            </p> --}}


{{-- Edit and delete buttons   --}}
@can('update-word', $word)

<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
    <div class="flex space-x-2">
        <a href="/words/{{ $word->id }}/edit" class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:focus:ring-yellow-900">Edit</a>

        <form method="POST" action="/words/{{ $word->slug }}">
            @csrf
            @method('DELETE')

            <button class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
        </form>
    </div>
</td>

@endcan
</article>
@endforeach


<br>
<hr>
            <section class="col-span-8 col-start-5 mt-10 space-y-6">

                @include ('words._add-comment-form')

                @foreach ($word->comments as $comment)
                    <x-word-comment :comment="$comment"/>
                @endforeach
            </section>
    </main>
</x-app-layout>
