<header class="w-full mx-0 py-4 text-center mt-5">
    {{-- <div class="max-w-screen-md mx-auto mt-auto mb-10">
        <!-- Move this div to the center -->
        <div style="width: 400px; height: 100px; margin: 0; padding: 0;" data-wordart-src="//cdn.wordart.com/json/vyccgq8ey7q8"></div>
    </div> --}}



    <h1 class="mb-4 text-6xl font-extrabold text-yellow-300 dark:text-white md:text-6xl lg:text-8xl"> AWELLE </h1>
    <p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">{{ __('messages.header') }}</p>

    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">
        <div class="relative lg:inline-flex bg-gray-100 rounded-xl">
            <x-slang-dropdown />
        </div>

        <!-- Search -->
        <div class="relative lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="/">
                @if (request('slang'))
                    <input type="hidden" name="slang" value="{{ request('slang') }}">
                @endif

                {{-- <input type="text"
                       name="search"
                       placeholder="Find a word"
                       class="bg-transparent placeholder-grey font-semibold text-sm"
                       value="{{ request('search') }}"
                > --}}

                <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" id="search" name="search" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ __('messages.Search') }}" required>
                    <button type="submit" class="absolute top-0 end-0 p-2.5 h-full text-sm font-medium text-white bg-yellow-300 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                      </svg></button>                </div>

            </form>
        </div>
    </div>

</header>
