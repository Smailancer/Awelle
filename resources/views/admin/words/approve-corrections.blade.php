
<x-app-layout>
    <x-setting heading="Correction Suggestion">

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 ">
                <!-- Original Term Column -->
                <div class="bg-white p-6 border border-gray-200 rounded-lg shadow transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
                    <h3 class="text-xl font-bold dark:text-whit mb-8 text-center">Original Word</h3>
                    <div class="justify-between mb-6">
                        <div class="space-x-2">
                            @foreach($word->slang as $slang)
                                <x-slang-button :slang="$slang" />
                            @endforeach
                        </div>
                    </div>


                    <h2 class="text-2xl font-bold text-gray-900 mb-4 text-center">{{ $word->term }}</h2>
                    <p class="text-gray-700 mb-4"><strong>Spell:</strong>  {{ $word->spell }}</p>
                    <p class="text-gray-700 mb-4"><strong>Tifinagh :</strong>  {{ $word->tifinagh }}</p>
                    <p class="text-gray-700 mb-4"><strong>Arabic :</strong> {{ $word->ar_meaning }}</p>
                    <p class="text-gray-700 mb-4"><strong>French :</strong> {{ $word->fr_meaning }}</p>
                    <p class="text-gray-700 mb-4"><strong>English :</strong> {{ $word->en_meaning }}</p>
                    <p class="text-gray-700 mb-4"><strong>Type :</strong> {{ $word->type }}</p>
                    <p class="text-gray-700 mb-4"><strong>Uses :</strong>{{ $word->uses }}</p>
                    <p class="text-gray-700 mb-4"><strong>Example :</strong>{{ $word->example }}</p>
                    <p class="text-gray-700 mb-4"><strong>Username :</strong> {{ $word->user->username }}</p>
                    <!-- Add other details you want to display for the original term -->

                      <form method="post" action="{{ route('admin.words.processCorrection', $suggestion->id) }}">
                        @csrf
                        <button type="submit" name="action" value="decline" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Decline</button>
                    </form>
                </div>

                <!-- Suggested Term Column -->
                <div class="bg-white p-6 border border-gray-200 rounded-lg shadow transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
                    <h3 class="text-xl font-bold dark:text-whit mb-8 text-center">Edit Suggestion</h3>

                    <div class="space-x-2 flex flex-wrap mb-6 text-center">
                        @foreach(json_decode($suggestion->slangs) as $slangId)
                            @php
                                $slang = \App\Models\Slang::find($slangId);
                            @endphp

                            @if($slang)
                                <x-slang-button :slang="$slang" class="mb-6 mr-2 " />
                            @endif

                        @endforeach
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4 text-center">{{ $suggestion->term }}</h2>
                     <p class="text-gray-700 mb-4"><strong>Spell:</strong> {{ $suggestion->spell }}</p>
                    <p class="text-gray-700 mb-4"><strong>Tifinagh :</strong> {{ $suggestion->tifinagh }}</p>
                    <p class="text-gray-700 mb-4"><strong>Arabic :</strong>  {{ $suggestion->ar_meaning }}</p>
                    <p class="text-gray-700 mb-4"><strong>French :</strong> {{ $suggestion->fr_meaning }}</p>
                    <p class="text-gray-700 mb-4"><strong>English :</strong> {{ $suggestion->en_meaning }}</p>
                    <p class="text-gray-700 mb-4"><strong>Type :</strong> {{ $suggestion->type }}</p>
                    <p class="text-gray-700 mb-4"><strong>Uses :</strong>{{ $suggestion->uses }}</p>
                    <p class="text-gray-700 mb-4"><strong>Example :</strong>{{ $suggestion->example }}</p>
                    <p class="text-gray-700 mb-4"><strong>Username :</strong> {{ $suggestion->user->username }}</p>
                    <!-- Add other details you want to display for the suggested term -->
                      <form method="post" action="{{ route('admin.words.processCorrection', $suggestion->id) }}">
                        @csrf
                        <button type="submit" name="action" value="approve" class="text-green-500 hover:text-white border border-green-700 hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">Approve</button>
                    </form>
                </div>
            </div>
        </main>




                    <!-- Approve and Decline buttons -->
                    {{-- <form method="post" action="{{ route('admin.words.processCorrection', $suggestion->id) }}">
                        @csrf
                        <button type="submit" name="action" value="approve" class="btn btn-success">Approve</button>
                        <button type="submit" name="action" value="decline" class="btn btn-danger">Decline</button>
                    </form>
                </div>
            </div>  --}}


</x-setting>
</x-app-layout>
