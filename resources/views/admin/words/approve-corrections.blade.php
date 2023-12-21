<!-- resources/views/admin/words/approve-corrections.blade.php -->

<x-app-layout>
    <x-setting heading="Manage Suggestions">

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">


        @foreach ($correctionSuggestions as $suggestion)
            <div class="lg:grid lg:grid-cols-4">
                <div class="card-body">


                    <article>
    <div class="py-6 px-5 h-full flex flex-col">

        <div class="mt-6 flex flex-col justify-between flex-1">
            <header>
                <div class="space-x-2 flex flex-wrap">
                    @foreach(json_decode($suggestion->slangs) as $slangId)
                        {{-- Assuming you have a Slang model and a method to retrieve a single slang --}}
                        @php
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
                    {{-- <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $suggestion->created_at->diffForHumans() }}</time>
                    </span> --}}
                </div>
                <div class="text-sm mt-4 space-y-4">
                     {{ Str::limit($suggestion->ar_meaning, 100) }}
                </div>
            </header>

{{--
            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3">
                        <h5 class="font-bold">
                            <a href="/?author={{ $suggestion->author->username }}">{{ $suggestion->author->username }}</a>
                        </h5>
                    </div>
                </div>

                <div>
                    <a href="/words/{{ $suggestion->slug }}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >Read More</a>
                </div>
            </footer> --}}
        </div>
    </div>
</article>




                    <!-- Approve and Decline buttons -->
                    <form method="post" action="{{ route('admin.words.processCorrection', $suggestion->id) }}">
                        @csrf
                        <button type="submit" name="action" value="approve" class="btn btn-success">Approve</button>
                        <button type="submit" name="action" value="decline" class="btn btn-danger">Decline</button>
                    </form>
                </div>
            </div>
        @endforeach
        </main>
</x-setting>
</x-app-layout>
